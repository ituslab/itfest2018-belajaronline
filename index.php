<?php

use Felis\Silvestris\Database;
use Felis\Silvestris\Session;
use Models\WebDb;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/utils.php';

$router = new \Bramus\Router\Router();

$router->get('/',function(){
    loadView("landing-page.php");
});

$router->get("/signout",function(){
    Session::destroy();
    header("Location: /it-a");
});


$router->get("/dashboard/buat-soal",function(){
    $sessionUserId = Session::get("user_id");
    $sessionLoginSebagai = Session::get("login_sebagai");

    if($sessionUserId && $sessionLoginSebagai && $sessionLoginSebagai === "pengajar") {
        loadView("pengajar/buat-soal.php");
    } else {
        loadViewAndModel("error.php",array(
            'title'=>'Warning',
            'desc'=>'Anda tidak berhak mengakses halaman ini'
        ));
    }
});

$router->get("/dashboard/list-matkul",function(){
    $sessionUserId = Session::get("user_id");
    $sessionLoginSebagai = Session::get("login_sebagai");

    if($sessionUserId && $sessionLoginSebagai && $sessionLoginSebagai === "pengajar") {
        loadView("pengajar/list-matkul.php");
    } else {
        loadViewAndModel("error.php",array(
            'title'=>'Warning',
            'desc'=>'Anda tidak berhak mengakses halaman ini'
        ));
    }
});

$router->get("/dashboard/tambah-matkul",function(){
    $sessionUserId = Session::get("user_id");
    $sessionLoginSebagai = Session::get("login_sebagai");

    if($sessionUserId && $sessionLoginSebagai && $sessionLoginSebagai === "pengajar") {
        loadView("pengajar/tambah-matkul.php");
    } else {
        loadViewAndModel("error.php",array(
            'title'=>'Warning',
            'desc'=>'Anda tidak berhak mengakses halaman ini'
        ));
    }
});



$router->get("/dashboard",function(){
    $userIdSession = Session::get("user_id");
    $loginSebagai = Session::get("login_sebagai");
    if($userIdSession && $loginSebagai){
        $colArray = array(
            $loginSebagai. "_id",
            $loginSebagai. "_nama",
            $loginSebagai. "_nohp"
        );
        $whereArray = array(
            $loginSebagai. "_id"=>['=' => $userIdSession]
        );
        $getUser = WebDb::getDb()
            ->select($loginSebagai , implode(",",$colArray))
            ->where($whereArray)
            ->fetch()
            ->get();

        

        if($loginSebagai === "pengajar") {
            loadViewAndModel("dashboard-new.php",array(
                'pengajar_id'=>$getUser->pengajar_id,
                'pengajar_nama'=>$getUser->pengajar_nama,
                'pengajar_nohp'=>$getUser->pengajar_nohp
            ));
        } else if($loginSebagai === "siswa") {
            loadViewAndModel("dashboard-siswa.php",array(
                'siswa_nama'=>$getUser->siswa_nama,
                'siswa_nohp'=>$getUser->siswa_nohp
            ));
        }

    }else{
        loadViewAndModel("error.php",array(
            'title'=>'Informasi',
            'desc'=>'Anda belum login , <a href="/it-a">Silahkan Login</a>'
        ));
    }
});

$router->get('/daftar',function(){
    loadView("daftar.php");
});


$router->get('/jawab-soal',function(){
    loadView("jawab-soal.php");
});

$router->get('/api/jawab-soal/(\w+)',function($matkulId){
    $result = WebDb::listSoalByMatkulId($matkulId);
    $toJson = json_encode([
        'code'=>200,
        'data'=>$result
    ]);
    header('Content-type: application/json');
    echo $toJson;
});



$router->post('/login',"Controllers\WebController@handleLogin");
$router->post("/daftar","Controllers\WebController@handleDaftar");




$router->run();
