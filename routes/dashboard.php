<?php

use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\EventController;
use App\Http\Controllers\Dashboard\PageController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user'], function () {
    Route::get('/index', [UserController::class, 'index']);
    Route::get('/index/users', [UserController::class, 'index_users']);
    Route::get('/index/admins', [UserController::class, 'index_admins']);
    Route::post('/store', [UserController::class, 'store']);
    Route::post('/create', [UserController::class, 'create']);
    Route::get('/show/{id}', [UserController::class, 'show']);
    Route::post('/update/{id}', [UserController::class, 'update']);
    Route::delete('/delete/{id}', [UserController::class, 'destroy']);
    Route::get('/create', [UserController::class, 'create']);
    Route::get('/edit', [UserController::class, 'edit']);
});

Route::group(['prefix' => 'category'], function () {
    Route::get('/index', [CategoryController::class, 'index']);
    Route::post('/store', [CategoryController::class, 'store']);
    Route::get('/show/{id}', [CategoryController::class, 'show']);
    Route::post('/update/{id}', [CategoryController::class, 'update']);
    Route::get('/delete/{id}', [CategoryController::class, 'destroy']);
});

Route::group(['prefix' => 'blog'], function () {
    Route::get('/', [BlogController::class, 'index']);
    Route::get('/create', [BlogController::class, 'create']);
    Route::get('/edit', [BlogController::class, 'edit']);
    Route::post('/store', [BlogController::class, 'store']);
    Route::get('/{id}', [BlogController::class, 'show']);
    Route::get('/{id}/edit', [BlogController::class, 'edit']);
    Route::post('/{id}', [BlogController::class, 'update']);
    Route::delete('/{id}', [BlogController::class, 'destroy']);
});

Route::group(['prefix' => 'event'], function () {
    Route::get('/index', [EventController::class, 'index']);
    Route::post('/store', [EventController::class, 'store']);
    Route::get('/show/{id}', [EventController::class, 'show']);
    Route::post('/update/{id}', [EventController::class, 'update']);
    Route::get('/delete/{id}', [EventController::class, 'destroy']);
});

Route::group(['prefix' => 'page'], function () {
    Route::get('/index', [PageController::class, 'index']);
    Route::post('/store', [PageController::class, 'store']);
    Route::get('/show/{id}', [PageController::class, 'show']);
    Route::post('/update/{id}', [PageController::class, 'update']);
    Route::get('/delete/{id}', [PageController::class, 'destroy']);
});
