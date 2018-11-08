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
    $userIdSession = Session::get("user_id");
    if($userIdSession) {
        Session::destroy();
    }
    header("Location: /it-a");
});

$router->get("/dashboard",function(){
    $userIdSession = Session::get("user_id");
    $loginSebagai = Session::get("login_sebagai");
    if($userIdSession && $loginSebagai){
        $colArray = array(
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

        loadViewAndModel("dashboard.php",array(
            'nama'=>$getUser->{$loginSebagai. "_nama"},
            'noHp'=>$getUser->{$loginSebagai. "_nohp"}
        ));
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


$router->post('/login',"Controllers\WebController@handleLogin");
$router->post("/daftar","Controllers\WebController@handleDaftar");




$router->run();
