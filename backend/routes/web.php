<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ExhibitionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return '안녕 친구들';
});

Route::apiResource('users', UserController::class);
Route::apiResource('gallerys', GalleryController::class);
Route::apiResource('exhibitions', ExhibitionController::class);