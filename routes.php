<?php
use Src\Router\Route;
use Src\View\View;
use Src\Controller\WebController;
use App\testcontroller;

/*
 * Группа роутов для построения апи
 */
Route::ApiGroup(function (){
    return [
        Route::get('/login', function (){
            echo json_encode(['message' => 'true']);
        }),

        Route::get('/auth',  [new testcontroller(), 'test']),

    ];
});

/*
 * Просто роуты
 */
Route::WebGroup(function (){
    return [
    Route::get('/', function (){
        $view = new View('index');
    })

    ];
});
