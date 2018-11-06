<?php
function loadView($viewName){
    include_once __DIR__ . '/views/' . $viewName;
}


function loadViewAndModel($viewName , $modelName) {
    extract($modelName);
    loadView($viewName);
}