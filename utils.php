<?php
define("VIEW_DIR" , __DIR__);
define("ASSETS_DIR", "/it-/assets");
define("JS_DIR", ASSETS_DIR . "/js");
define("CSS_DIR",ASSETS_DIR . "/css");

function loadView($viewName){
    include_once VIEW_DIR . '/views/' . $viewName;
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

function loadJS($jsFileName) {
    echo("<script type='text/javascript' src='/it-a/assets/js/$jsFileName'></script>");
}

function loadViewAndModel($viewName , $modelName) {
    extract($modelName);
    include_once VIEW_DIR . '/views/' . $viewName;
}
