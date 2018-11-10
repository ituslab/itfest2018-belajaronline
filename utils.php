<?php
define("VIEW_DIR" , __DIR__);

function loadView($viewName){
    include_once VIEW_DIR . '/views/' . $viewName;
}


function loadViewAndModel($viewName , $modelName) {
    extract($modelName);
    include_once VIEW_DIR . '/views/' . $viewName;
}
