<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\admin\AdminsController;
use  App\Http\Controllers\admin\RolesController;
use  App\Http\Controllers\user\UsersController;
use  App\Http\Controllers\user\SubscribersController;
use  App\Http\Controllers\user\EditUserController;
use  App\Http\Controllers\user\AddUserController;
use  App\Http\Controllers\hotels\HotelsController;
use  App\Http\Controllers\hotels\AddHotelController;
use  App\Http\Controllers\hotels\AttributesController;
use  App\Http\Controllers\hotels\AvailabiltyController;
use  App\Http\Controllers\hotels\EditHotelController;
use  App\Http\Controllers\hotels\TermsController;



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


    ///ROLE Managment///
    Route::get('/user/role', [RolesController::class, 'index']);
    Route::post('/user/role/new', [RolesController::class, 'add']);
    Route::put('/user/role/{role_id}', [RolesController::class, 'update']);
    Route::delete('/user/role/delete/{user_id}', [RolesController::class, 'delete']);



    ///Subscribers///
    Route::get('/subscribers', [SubscribersController::class, 'show']);
    Route::post('/subscribers/new', [SubscribersController::class, 'add']);
    Route::put('/subscribers/{role_id}', [SubscribersController::class, 'update']);
    Route::delete('/subscribers/delete/{subscribers_id}', [SubscribersController::class, 'delete']);


    ///Hotels///
    Route::get('/hotels', [HotelsController::class, 'index']);
    Route::post('/subscribers/new', [AddHotelController::class, 'add']);
    Route::put('/subscribers/{role_id}', [EditHotelController::class, 'update']);
    Route::delete('/subscribers/delete/{subscribers_id}', [HotelsController::class, 'delete']);















});




