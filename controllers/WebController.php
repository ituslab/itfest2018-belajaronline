<?php
namespace Controllers;
use Models\WebDb;
use Felis\Silvestris\Database;
use Felis\Silvestris\Session;

class WebController { 


    // belum divalidasi...
    // login gagal belum diperbaiki
    public function handleLogin(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $loginSebagai = $_POST['login_sebagai'];

        $loginResult = WebDb::handleLogin($username,$password, $loginSebagai);

        if(!$loginResult) {
            Session::set("login_gagal","Username atau password salah");
            header("Location: /it-a");
            die();
        }
        Session::set("user_id",$username);
        Session::set("login_sebagai",$loginSebagai);
        header("Location: /it-a/dashboard");
    }




    // handle gagal belum diperbaiki
    public function handleDaftar() {
        $nama = $_POST['nama'];
        $daftarSebagai = $_POST['daftar_sebagai'];
        $userId = $_POST['user_id'];
        $userPassword = $_POST['user_password'];
        $noHp = $_POST['no_hp'];

        $result = substr($daftarSebagai , 1 );
        $toLower = strtolower($daftarSebagai[0]);
        $daftarSebagai = $toLower . $result;

        $saveResult = WebDb::handleSaveDaftar($daftarSebagai,$nama,$userId,$userPassword,$noHp);

        if($saveResult) {
            header("Location: /it-a/daftar");
            return;
        }
        echo("Pendaftaran gagal...");
    }
}


