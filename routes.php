<?php
use Src\Router\Route;
use Src\View\View;
use Src\Controller\WebController;
use App\testcontroller;
use Src\Response\Response;
/*
 * Группа роутов для построения апи
 */
Route::ApiGroup(function (){
    return [
        Route::get('/login/([a-z]+)', function ($massage){
            return new Response(['message' => ['new massage' => $massage]], 200);
        }),

        Route::get('/auth/([0-9]+)/([0-9]+)',  [new testcontroller(), 'test']),
    ];
});

/*
 * Просто роуты
 */
Route::WebGroup(function (){
    return [
    Route::get('/', function (){
        return new View('index');
    })

    ];
});
