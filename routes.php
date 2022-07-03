<?php
use Src\Router\Route;
use Src\View\View;

Route::get('/test/([0-9])', function (){
    $view = new View('index');
});