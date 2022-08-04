<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\superAdmin\CityController;
use App\Http\Controllers\superAdmin\PropertyController;
use App\Http\Controllers\superAdmin\PictureController;
use App\Http\Controllers\UserController;

require __DIR__.'/auth.php';

Route::prefix('admin')->name('admin.')->group(function (){

    Route::resource('cities', CityController::class)->except(['show'])->middleware('auth');
    Route::resource('properties', PropertyController::class)->middleware('auth');
    Route::resource('properties.pictures', PictureController::class)->except(['show', 'edit', 'update'])->middleware('auth');

});

// Route for client

Route::resource('/', App\Http\Controllers\Site\CityController::class)->only('index');
Route::resource('cities.properties', App\Http\Controllers\Site\PropertyController::class)->only(['index', 'show']);


