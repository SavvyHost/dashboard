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
use  App\Http\Controllers\tours\TourController;
use  App\Http\Controllers\tours\AddToursController;



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
    Route::post('/hotels/new', [AddHotelController::class, 'save']);
    Route::put('/hotels/{hotel_id}', [EditHotelController::class, 'save']);
    Route::delete('/hotels/delete/{hotels_id}', [HotelsController::class, 'delete']);

    Route::get('/hotelAvailability/{hotels_id}', [AvailabiltyController::class, 'hotelAvailability']);

    ///Exceptions///
    Route::get('/hotels', [HotelsController::class, 'index']);
    Route::get('/hotels/{hotel_id}/availabilty', [AvailabiltyController::class, 'exceptions']);
    Route::post('/hotels/{hotel_id}/availabilty/new/{excep_id}', [AvailabiltyController::class, 'save']);
    Route::put('/hotels/{hotel_id}/availabilty/{excep_id}', [AvailabiltyController::class, 'save_edit']);
    Route::delete('hotels/availabilty/delete/{excep_id}', [AvailabiltyController::class, 'delete']);

    ///Attributes///
    Route::get('/hotels/attributes', [AttributesController::class, 'show']);
    Route::get('/hotels/{hotel_id}/availabilty', [AvailabiltyController::class, 'exceptions']);
    Route::post('/hotels/attributes/new', [AttributesController::class, 'save']);
    Route::put('/hotels/attributes/{attr_id}', [AttributesController::class, 'update']);
    Route::delete('hotels/attributes/delete/{attr_id}', [AttributesController::class, 'delete']);



    ///Tours///
    Route::get('/tours', [TourController::class, 'index']);
    // Route::get('/hotels/attributes/{attr_id}/terms', [TermsController::class, 'show']);
    Route::get('/tours/new', [AddToursController::class, 'save']);
    Route::post('/hotels/attributes/terms/new', [TermsController::class, 'save']);
    Route::put('/hotels/attributes/terms/{attr_id}', [TermsController::class, 'update']);
    Route::delete('hotels/attributes/terms/delete/{terms_id}', [TermsController::class, 'delete']);



    ///Terms///
    Route::get('/hotels/terms', [TermsController::class, 'index']);
    Route::get('/hotels/attributes/{attr_id}/terms', [TermsController::class, 'show']);
    Route::get('/hotels/{hotel_id}/terms', [TermsController::class, 'exceptions']);
    Route::post('/hotels/attributes/terms/new', [TermsController::class, 'save']);
    Route::put('/hotels/attributes/terms/{attr_id}', [TermsController::class, 'update']);
    Route::delete('hotels/attributes/terms/delete/{terms_id}', [TermsController::class, 'delete']);











});




