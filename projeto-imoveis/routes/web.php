<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CityController;

Route::redirect('/', '/admin/cities');

Route::prefix('admin')->name('admin.')->group(function (){

    Route::resource('cities', CityController::class)->except(['show']);

});

Route::get('/sobre', function (){
    return '<h1>Sobre</h1>';
});
