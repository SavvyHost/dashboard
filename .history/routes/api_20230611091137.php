<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\user\UsersController;
use  App\Http\Controllers\user\EditUserController;
use  App\Http\Controllers\user\AddUserController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['middleware' , 'prefix' => 'dashboard'], function () {

    Route::get('/users', [UsersController::class, 'index']);
    Route::delete('/user/delete/{user_id}', [UsersController::class, 'delete']);
    Route::put('/user/{user_id}', [EditUserController::class, 'update']);
    Route::post('/users/new', [AddUserController::class, 'save']);



    Route::get('/admins', [AdminsController::class, 'index']);


});


