<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CityController;

Route::redirect('/', '/admin/cities');

Route::prefix('admin')->group(function (){

    Route::get('/cities', [CityController::class, 'index']);
    Route::get('/cities/add', [CityController::class, 'formAdd']);

});

Route::get('/sobre', function (){
    return '<h1>Sobre</h1>';
});
