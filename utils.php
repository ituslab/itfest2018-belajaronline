<?php

use Ramsey\Uuid\Uuid;
use Felis\Silvestris\Session;
define("VIEW_DIR" , __DIR__);
define("ASSETS_DIR", "/it-/assets");
define("JS_DIR", ASSETS_DIR . "/js");
define("CSS_DIR",ASSETS_DIR . "/css");

function loadView($viewName){
    include_once VIEW_DIR . '/views/' . $viewName;
}


function verifyCsrf($formInput) {
    return hash_equals(Session::get('csrf_token'),$formInput);
}

function csrfToken($doReset = false) {
    $uuid4 = Uuid::uuid4()->toString();
    $csrfToken = hash('sha256',$uuid4);

    if($doReset) {
        Session::set('csrf_token',$csrfToken);
    } else if (!Session::get('csrf_token')){
        Session::set('csrf_token',$csrfToken);    
    }

    return Session::get('csrf_token');
}


function loadSiswaNavbar() {
    include_once VIEW_DIR . '/views/siswa/navbar.php';
}
function loadPengajarNavbar() {
    include_once VIEW_DIR . '/views/pengajar/navbar.php';
}

function loadTop() {
    include_once VIEW_DIR . '/views/includes/top.php';
}

function loadBottom() {
    include_once VIEW_DIR . '/views/includes/bottom.php';
}

function loadCSS($cssFileName) {
    echo("<link rel='stylesheet' href='/it-a/assets/css/$cssFileName'/>");
}

function redirect($url) {
    if(!headers_sent()) {
        header('Location: '.$url);
        exit();
    }else{
        die("
            <script type='text/javascript'>window.location.href = {$url}</script>
            <noscript> <meta http-equiv='refresh' content='0; url={$url}'></noscript>
        ");
    }
}

function loadJS($jsFileName) {
    echo("<script type='text/javascript' src='/it-a/assets/js/$jsFileName'></script>");
}

function loadViewAndModel($viewName , $modelName) {
    extract($modelName);
    include_once VIEW_DIR . '/views/' . $viewName;
}
