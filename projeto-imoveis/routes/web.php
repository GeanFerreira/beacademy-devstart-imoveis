<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\PictureController;

Route::prefix('admin')->name('admin.')->group(function (){

    Route::resource('cities', CityController::class)->except(['show']);
    Route::resource('properties', PropertyController::class);
    Route::resource('properties.pictures', PictureController::class)->except(['show', 'edit', 'update']);

});

Route::resource('/', App\Http\Controllers\Site\CityController::class)->only('index');
Route::resource('cities.properties', App\Http\Controllers\Site\PropertyController::class)->only(['index', 'show']);
