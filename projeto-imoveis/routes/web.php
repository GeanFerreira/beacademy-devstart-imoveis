<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\PropertyController;

Route::redirect('/', '/admin/cities');

Route::prefix('admin')->name('admin.')->group(function (){

    Route::resource('cities', CityController::class)->except(['show']);
    Route::resource('properties', PropertyController::class);

});

Route::get('/sobre', function (){
    return '<h1>Sobre</h1>';
});
