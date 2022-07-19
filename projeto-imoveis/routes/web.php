<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\PictureController;
use App\Http\Controllers\UserController;

Route::prefix('admin')->name('admin.')->group(function (){

    Route::resource('cities', CityController::class)->except(['show']);
    Route::resource('properties', PropertyController::class);
    Route::resource('properties.pictures', PictureController::class)->except(['show', 'edit', 'update']);

});

// Route for client

Route::resource('/', App\Http\Controllers\Site\CityController::class)->only('index');
Route::resource('cities.properties', App\Http\Controllers\Site\PropertyController::class)->only(['index', 'show']);

// Route for auth

//Route::match(['get', 'post'],, [UserController::class, 'index']);
//Route::post('/form', [UserController::class, 'form'])->name('form');
//Route::get('/logout', [UserController::class, 'logout'])->name('logout');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
