<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CityController;

Route::redirect('/', '/admin/cities');

Route::prefix('admin')->name('admin.')->group(function (){

    Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
    Route::get('/cities/create', [CityController::class, 'create'])->name('cities.create');
    Route::post('/cities/create', [CityController::class, 'add'])->name('cities.add');

});

Route::get('/sobre', function (){
    return '<h1>Sobre</h1>';
});
