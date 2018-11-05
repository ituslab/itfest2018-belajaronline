<?php
require_once __DIR__ . '/vendor/autoload.php';

$router = new \Bramus\Router\Router();

$router->get('/',function(){
    include_once __DIR__ . '/views/landing-page.html';
});




$router->run();
