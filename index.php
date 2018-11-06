<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/utils.php';

$router = new \Bramus\Router\Router();

$router->get('/',function(){
    loadView("landing-page.php");
});

$router->get("/dashboard",function(){
    loadView("dashboard.php");
});

$router->get('/daftar',function(){
    loadView("daftar.php");
});




$router->run();
