<?php

use Felis\Silvestris\Database;
use Felis\Silvestris\Session;
use Models\WebDb;
use Ramsey\Uuid\Uuid;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/utils.php';

$router = new \Bramus\Router\Router();

$router->get('/',function(){
    loadView("landing-page.php");
});

$router->set404(function(){
  loadView("404.php");
});

$router->get("/signout",function(){
    Session::destroy();
    header("Location: /it-a");
});

$router->get('/dashboard/hasil-matkul',function(){
    $sessionUserId = Session::get('user_id');
    $sessionLoginSebagai = Session::get('login_sebagai');

    if($sessionUserId && $sessionLoginSebagai && $sessionLoginSebagai === 'siswa') {
        $listSesi = WebDb::listSesiYangSudahDijawabSiswa($sessionUserId);
        $listSesiEssay = WebDb::listSesiEssayYangSudahDijawabSiswa($sessionUserId);

        loadViewAndModel('siswa/hasil-matkul.php',[
            'list_sesi'=>$listSesi,
            'list_sesi_essay'=>$listSesiEssay    
        ]);
    } else {
        loadViewAndModel("error.php",array(
            'title'=>'Warning',
            'desc'=>'Anda tidak berhak mengakses halaman ini'
        ));
    }
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

$router->get('/dashboard/matkul-saya',function(){
    $sessionUserId = Session::get('user_id');
    $loginSebagai = Session::get('login_sebagai');

    if($sessionUserId && $loginSebagai && $loginSebagai === 'siswa') {
        $result = WebDb::listMatkulYangDiambilSiswa($sessionUserId);
        loadViewAndModel("siswa/list-matkul.php",[
            'list_matkul'=>$result
        ]);
    }else {
        loadViewAndModel('error.php',[
            'title'=>'Warning',
            'desc'=>'Anda tidak berhak mengakses halaman ini'
        ]);
    }
});

$router->get('/dashboard/jawab-soal/(\w+)/(\w+)',function($sesiId,$tipeSoal){
    $sessionUserId = Session::get('user_id');
    $loginSebagai = Session::get('login_sebagai');




    if($sessionUserId 
        && $loginSebagai 
        && $loginSebagai === 'siswa'
    ){
        $result = false;

        // cek apakah siswa ini telah menjawab soal dengan sesi ini
        if($tipeSoal === 'pilgan') {
            $result = WebDb::listSiswaJawabanBySiswaIdAndSoalSesiId($sessionUserId , $sesiId);
        } else {
            $result = WebDb::countListJawabanEssayDariSiswaDanSesiId($sessionUserId , $sesiId);    
        }

        $getInfo = WebDb::getDb()
            ->query(
                " select sk.sesi_nama,sm.matkul_nama from sesi_kuliah sk
                inner join mata_kuliah sm 
                on sk.matkul_id = sm.matkul_id 
                where sk.sesi_id = :sesi_id "
            ,[
                ':sesi_id'=>$sesiId
            ])
            ->fetch()
            ->get();
        

        loadViewAndModel('siswa/jawab-soal.php',[
            'list_siswa_jawaban'=>$result,
            'tipe_soal'=>$tipeSoal,
            'getInfo'=>$getInfo
        ]);
    } else {
        loadViewAndModel('error.php',[
            'title'=>'Warning',
            'desc'=>'Anda tidak berhak mengakses halaman ini'
        ]);
    }
});


$router->get('/dashboard/cari-matkul',function(){
    $sessionUserId = Session::get('user_id');
    $loginSebagai = Session::get('login_sebagai');

    if($sessionUserId && $loginSebagai && $loginSebagai === 'siswa') {
        $result = WebDb::listMatkul();
        
        loadViewAndModel("siswa/cari-matkul.php",[
            'cari_matkul'=>$result
        ]);
    }else {
        loadViewAndModel('error.php',[
            'title'=>'Warning',
            'desc'=>'Anda tidak berhak mengakses halaman ini'
        ]);
    }
});

$router->get("/dashboard/list-matkul",function(){
    $sessionUserId = Session::get("user_id");
    $sessionLoginSebagai = Session::get("login_sebagai");

    if($sessionUserId && $sessionLoginSebagai && $sessionLoginSebagai === "pengajar") {
        $listMatkul = WebDb::listMatkulByPengajar($sessionUserId); 

        loadViewAndModel("pengajar/list-matkul.php",[
            'list_matkul'=>$listMatkul
        ]);
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


$router->get('/dashboard/essay-siswa',function(){
    $sessionUserId = Session::get("user_id");
    $sessionLoginSebagai = Session::get("login_sebagai");

    if($sessionUserId && $sessionLoginSebagai && $sessionLoginSebagai === "pengajar") {
        
        loadView("pengajar/essay-siswa.php");
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
            $loginSebagai. "_nohp",
            $loginSebagai. "_email",
            $loginSebagai. "_alamat",
            $loginSebagai. "_gender"
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
                'pengajar_nohp'=>$getUser->pengajar_nohp,
                'pengajar_email'=>$getUser->pengajar_email,
                'pengajar_alamat'=>$getUser->pengajar_alamat,
                'pengajar_gender'=>$getUser->pengajar_gender
            ));
        } else if($loginSebagai === "siswa") {
            loadViewAndModel("siswa/dashboard-siswa.php",array(
                'siswa_id'=>$getUser->siswa_id,
                'siswa_nama'=>$getUser->siswa_nama,
                'siswa_nohp'=>$getUser->siswa_nohp,
                'siswa_email'=>$getUser->siswa_email,
                'siswa_alamat'=>$getUser->siswa_alamat,
                'siswa_gender'=>$getUser->siswa_gender
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



// APIs endpoint

$router->post('/api/buat-matkul',function(){
    $userIdSession = Session::get("user_id");
    $loginSebagai = Session::get("login_sebagai");

    header('Content-type: application/json');

    if($userIdSession && $loginSebagai && $loginSebagai === "pengajar") {
        http_response_code(200);
        $jsonString = file_get_contents('php://input');
        $toObj = json_decode($jsonString);

        $result = WebDb::buatMatkul($toObj->matkul_nama , $userIdSession);

        if($result) {
            echo json_encode([
                'code'=>200,
                'data'=>$toObj->matkul_nama . ' berhasil ditambahkan'
            ]);
        } else {
            echo json_encode([
                'code'=>200,
                'data'=>'gagal menambahkan ' .$toObj->matkul_nama . ' matakuliah'
            ]);
        }

    } else {
        http_response_code(403);
        echo json_encode([
            'code'=>403,
            'data'=>'Akses ditolak'
        ]);
    }
});
$router->get('/api/list-matkul',function(){
    $userIdSession = Session::get('user_id');
    $loginSebagai = Session::get('login_sebagai');

    header('Content-type: application/json');

    if($userIdSession && $loginSebagai && $loginSebagai === 'pengajar') {
        http_response_code(200);
        $result = WebDb::listMatkulByPengajar($userIdSession);
        $toJson = json_encode([
            'code'=>200,
            'data'=>$result
        ]);
        echo $toJson;
    }else {
        http_response_code(403);
        echo json_encode([
            'code'=>403,
            'data'=>'Akses ditolak'
        ]);
    }
});

$router->post('/api/buat-soal',function(){
    $userIdSession = Session::get("user_id");
    $loginSebagai = Session::get("login_sebagai");
    header('Content-type: application/json');


    if($userIdSession && $loginSebagai && $loginSebagai === 'pengajar') {
        $jsonString = file_get_contents('php://input');
        $toObj = json_decode($jsonString);
        
        $csrfToken = $toObj->csrf_token;
        $soalInput = $toObj->soal_input;
        $matkulId = $toObj->matkul_id;


        $newSesi = [
            'sesi_id'=>substr('SS_'.Uuid::uuid4()->toString(), 0 , 10),
            'sesi_nama'=>$toObj->sesi_nama,
            'matkul_id'=>$matkulId,
            'tipe_soal'=>$toObj->tipe_soal
        ];
        
        if(!isset($csrfToken)){
            http_response_code(403);
            echo json_encode([
                'code'=>403,
                'data'=>'Invalid token'
            ]);
            return;
        }
        $result = verifyCsrf($csrfToken);
        
        if($result) {
            http_response_code(200);
            
            $result = WebDb::buatSoal($soalInput,$matkulId,$newSesi);

            echo json_encode([
                'code'=>200,
                'data'=>'Soal berhasil dibuat'
            ]);

        } else {
            http_response_code(403);
            echo json_encode([
                'code'=>403,
                'data'=>'Akses ditolak'
            ]);
        }



    }else{
        http_response_code(403);
        echo json_encode([
            'code'=>403,
            'data'=>"Akses Ditolak"
        ]);
    }
});


$router->post('/api/tambah-matkul',function(){
    $userIdSession = Session::get('user_id');
    $loginSebagai = Session::get('login_sebagai');

    header('Content-type: application/json');

    if($userIdSession  && $loginSebagai && $loginSebagai === 'siswa') {
        http_response_code(200);

        $jsonString = file_get_contents('php://input');
        $toObj = json_decode($jsonString);

        $matkulId = $toObj->matkul_id;

        $result = WebDb::addNewMatkulToSiswa($matkulId , $userIdSession);
        if($result) {
            echo json_encode([
                'code'=>200,
                'data'=>'Mata kuliah berhasil ditambahkan'
            ]);
        } else {
            echo json_encode([
                'code'=>200,
                'data'=>'Mata kuliah ini sudah ada di dalam daftar matakuliah anda'
            ]);
        }
    }else{
        http_response_code(403);
        echo json_encode([
            'code'=>403,
            'data'=>'Akses ditolak'
        ]);
    }
});



$router->get('/dashboard/finish',function(){
    Session::unset('matkul_id_session');
    header('Location: /it-a/dashboard');
});


$router->get('/api/ambil-jawaban/(\w+)',function($matkulId){
    $userIdSession = Session::get('user_id');
    $loginSebagai = Session::get('login_sebagai');

    header('Content-type: application/json');

    if($userIdSession && $loginSebagai && $loginSebagai === 'siswa') {
        http_response_code(200);
        $result = WebDb::ambilJawabanSiswaDanPengajar($userIdSession , $matkulId);

        echo json_encode([
            'code'=>200,
            'data'=>$result
        ]);

    }else{
        http_response_code(403);
        echo json_encode([
            'code'=>403,
            'data'=>'Akses ditolak'
        ]);
    }
});


$router->get('/api/list-sesi/(\w+)',function($matkulId){
    $userIdSession = Session::get('user_id');
    $loginSebagai = Session::get('login_sebagai');
    Session::set('matkul_id_session',$matkulId);

    header('Content-type: application/json');
    if($userIdSession && $loginSebagai && $loginSebagai === 'siswa') {
        http_response_code(200);
        $result = WebDb::listSesiByMatkul($matkulId);
        
        echo json_encode([
            'code'=>200,
            'data'=>$result
        ]);
    } else {
        http_response_code(403);
        echo json_encode([
            'code'=>403,
            'data'=>'Akses ditolak'
        ]);
    }
});


$router->post('/api/jawab-soal',function(){
    $userIdSession = Session::get('user_id');
    $loginSebagai = Session::get('login_sebagai');
    $matkulIdSession = Session::get('matkul_id_session');

    header('Content-type: application/json');

    if($userIdSession && $loginSebagai && $loginSebagai === 'siswa' && $matkulIdSession) {
        http_response_code(200);
        $jsonString = file_get_contents('php://input');
        $toObj = json_decode($jsonString);

        $sesiId = $toObj->sesi_id;
        $tipeSoal = $toObj->tipe_soal;

        if($tipeSoal === 'pilgan') {
            foreach ($toObj->soal_jawab as $v) {
                $v->siswa_id = $userIdSession;
    
                WebDb::jawabSoal(
                    $v->siswa_id, 
                    $matkulIdSession , 
                    $v->siswa_soalid , 
                    $v->siswa_jawaban,
                    $toObj->sesi_id
                );
            }
        } else if($tipeSoal === 'essay') {
            foreach ($toObj->soal_jawab as $v) {
                $v->siswa_id = $userIdSession;
                WebDb::jawabEssay($v);
            }
        }




        echo json_encode([
            'code'=>200,
            'data'=>'Jawab soal berhasil'
        ]);

    }else {
        http_response_code(403);
        echo json_encode([
            'code'=>403,
            'data'=>'Akses ditolak'
        ]);
    }
});

$router->get('/api/jawab-soal/(\w+)/(\w+)',function($sesiId , $tipeSoal){
    $userIdSession = Session::get('user_id');
    $loginSebagai = Session::get('login_sebagai');

    header('Content-type: application/json');


    if($userIdSession && $loginSebagai && $loginSebagai === 'siswa') {
        http_response_code(200);
        $result = false;
        if($tipeSoal === 'pilgan') {
            $result = WebDb::listSoalBySesi($sesiId);
        } else {
            $result = WebDb::listSoalEssayBySesi($sesiId);
        }
        
        echo json_encode([
            'code'=>200,
            'data'=>$result
        ]);
    } else {
        http_response_code(403);
        echo json_encode([
            'code'=>403,
            'data'=>'Akses ditolak'
        ]);
    }

});


$router->get('/api/jawab-benar/(\w+)',function($sesiId){
    $sessionUserId = Session::get('user_id');
    $loginSebagai = Session::get('login_sebagai');
    header('Content-type: application/json');

    if($sessionUserId && $loginSebagai && $loginSebagai === 'siswa') {
        http_response_code(200);
        $result = WebDb::ambilJawabanYangBenar($sessionUserId , $sesiId);
        echo json_encode([
            'code'=>200,
            'data'=>$result
        ]);
    }else {
        http_response_code(403);
        echo json_encode([
            'code'=>403,
            'data'=>'Akses ditolak'
        ]);
    }
});
$router->get('/api/jawab-salah/(\w+)',function($sesiId){
    $sessionUserId = Session::get('user_id');
    $loginSebagai = Session::get('login_sebagai');
    header('Content-type: application/json');

    if($sessionUserId && $loginSebagai && $loginSebagai === 'siswa') {
        http_response_code(200);
        $result = WebDb::ambilJawabanYangSalah($sessionUserId , $sesiId);
        echo json_encode([
            'code'=>200,
            'data'=>$result
        ]);
    }else {
        http_response_code(403);
        echo json_encode([
            'code'=>403,
            'data'=>'Akses ditolak'
        ]);
    }
});

// APIs endpoint

$router->post('/buat-matkul','Controllers\WebController@handleBuatMatkul');
$router->post('/login',"Controllers\WebController@handleLogin");
$router->post("/daftar","Controllers\WebController@handleDaftar");




$router->run();
