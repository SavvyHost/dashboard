<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\EventController;
use  App\Http\Controllers\auth\LoginController;
use  App\Http\Controllers\tours\TourController;
use  App\Http\Controllers\user\UsersController;
use App\Http\Controllers\Api\FeatureController;
use App\Http\Controllers\Api\PartnerController;
use  App\Http\Controllers\admin\RolesController;
use  App\Http\Controllers\auth\LogoutController;
use  App\Http\Controllers\rooms\RoomsController;
use App\Http\Controllers\Api\CategoryController;
use  App\Http\Controllers\admin\AdminsController;
use  App\Http\Controllers\hotels\TermsController;
use  App\Http\Controllers\user\AddUserController;
use  App\Http\Controllers\auth\RegisterController;
use  App\Http\Controllers\hotels\HotelsController;
use  App\Http\Controllers\rooms\AddRoomController;
use  App\Http\Controllers\tours\AddTourController;
use  App\Http\Controllers\user\EditUserController;
use  App\Http\Controllers\rooms\RoomTypeController;
use  App\Http\Controllers\tours\EditTourController;
use  App\Http\Controllers\tours\TourAttrController;
use  App\Http\Controllers\tours\TourTermController;


use  App\Http\Controllers\booking\BookingController;
use  App\Http\Controllers\hotels\AddHotelController;
use  App\Http\Controllers\hotels\EditHotelController;
use  App\Http\Controllers\user\SubscribersController;
use  App\Http\Controllers\hotels\AttributesController;

use App\Http\Controllers\Api\Dashboard\UserController;
use App\Http\Controllers\Api\Dashboard\DashboardCategoryController;
use App\Http\Controllers\Api\Dashboard\DashboardBlogController;
use App\Http\Controllers\Api\Dashboard\DashboardEventController;
use App\Http\Controllers\Api\Dashboard\DashboardPageController;




use  App\Http\Controllers\hotels\AvailabiltyController;
use  App\Http\Controllers\tours\TourCategoryController;
use  App\Http\Controllers\rooms\RoomAttributesController;


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


/**  Dashboard  */
Route::group(['prefix' => 'user'], function () {
    Route::get('/index', [UserController::class, 'index']);
    Route::get('/index/users', [UserController::class, 'index_users']);
    Route::get('/index/admins', [UserController::class, 'index_admins']);
    Route::post('/store', [UserController::class, 'store']);
    Route::get('/show/{id}', [UserController::class, 'show']);
    Route::post('/update/{id}', [UserController::class, 'update']);
    Route::delete('/delete/{id}', [UserController::class, 'destroy']);
});
Route::group(['prefix' => 'category'], function () {
    Route::get('/index', [DashboardCategoryController::class, 'index']);
    Route::post('/store', [DashboardCategoryController::class, 'store']);
    Route::get('/show/{id}', [DashboardCategoryController::class, 'show']);
    Route::post('/update/{id}', [DashboardCategoryController::class, 'update']);
    Route::get('/delete/{id}', [DashboardCategoryController::class, 'destroy']);
});
Route::group(['prefix' => 'blog'], function () {
    Route::get('/index', [DashboardBlogController::class, 'index']);
    Route::post('/store', [DashboardBlogController::class, 'store']);
    Route::get('/show/{id}', [DashboardBlogController::class, 'show']);
    Route::post('/update/{id}', [DashboardBlogController::class, 'update']);
    Route::get('/delete/{id}', [DashboardBlogController::class, 'destroy']);
});
Route::group(['prefix' => 'event'], function () {
    Route::get('/index', [DashboardEventController::class, 'index']);
    Route::post('/store', [DashboardEventController::class, 'store']);
    Route::get('/show/{id}', [DashboardEventController::class, 'show']);
    Route::post('/update/{id}', [DashboardEventController::class, 'update']);
    Route::get('/delete/{id}', [DashboardEventController::class, 'destroy']);
});
Route::group(['prefix' => 'page'], function () {
    Route::get('/index', [DashboardPageController::class, 'index']);
    Route::post('/store', [DashboardPageController::class, 'store']);
    Route::get('/show/{id}', [DashboardPageController::class, 'show']);
    Route::post('/update/{id}', [DashboardPageController::class, 'update']);
    Route::get('/delete/{id}', [DashboardPageController::class, 'destroy']);
});


/**   *********************************************************************************************************************  **/




















Route::post('/room/{id}/book', [BookingController::class, 'store_api']);
Route::post('/room/{id}/book/c', [BookingController::class, 'confirm_booking_api']);


Route::post('/register', [RegisterController::class, 'register'])/* ->name('api.register') */;
Route::post('/login', [LoginController::class, 'loginApi'])->name('api.login');
Route::post('/logout', [LogoutController::class, 'logoutApi'])->name('api.logout')->middleware('auth:sanctum');







Route::post('/room/{id}/book', [BookingController::class, 'store_api']);
Route::post('/room/{id}/book/c', [BookingController::class, 'confirm_booking_api']);


Route::group(['prefix' => 'section'], function () {
    Route::get('partner', [PartnerController::class, 'index']);
    Route::get('partner/{id}', [PartnerController::class, 'show']);

    Route::get('feature', [FeatureController::class, 'index']);
    Route::get('feature/{id}', [FeatureController::class, 'show']);

    Route::get('event', [EventController::class, 'index']);
    Route::get('event/{id}', [EventController::class, 'show']);

    Route::get('category', [CategoryController::class, 'index']);
    Route::get('category/{id}', [CategoryController::class, 'show']);

    Route::get('blog', [BlogController::class, 'index']);
    Route::get('blog/{id}', [BlogController::class, 'show']);
});

Route::get('page', [PageController::class, 'page_by_data']);
Route::get('page/{page}', [PageController::class, 'page']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/u', [AddRoomController::class, 'index2']);
Route::get('/o', [RoomTypeController::class, 'indexa']);
Route::get('/addu', [RoomAttributesController::class, 'addu']);
Route::get('/room/{id}/details', [RoomsController::class, 'details_api']);


//Route::get('/page/{page}', [PageController::class, 'page_api']);


Route::group(['middleware', 'prefix' => 'dashboard'], function () {


    Route::get('/users', [UsersController::class, 'index_api']);
    Route::delete('/user/delete/{user_id}', [UsersController::class, 'delete_api']);
    Route::put('/user/{user_id}', [EditUserController::class, 'update_api']);
    Route::post('/users/new', [AddUserController::class, 'save_api']);

    Route::get('/admins', [AdminsController::class, 'index_api']);


    ///ROLE Managment///
    Route::get('/user/role', [RolesController::class, 'index_api']);
    Route::post('/user/role/new', [RolesController::class, 'add_api']);
    Route::put('/user/role/{role_id}', [RolesController::class, 'update_api']);
    Route::delete('/user/role/delete/{user_id}', [RolesController::class, 'delete_api']);



    ///Subscribers///
    Route::get('/subscribers', [SubscribersController::class, 'show_api']);
    Route::post('/subscribers/new', [SubscribersController::class, 'add_api']);
    Route::put('/subscribers/{role_id}', [SubscribersController::class, 'update_api']);
    Route::delete('/subscribers/delete/{subscribers_id}', [SubscribersController::class, 'delete_api']);


    ///Hotels///
    Route::get('/hotels', [HotelsController::class, 'index_api']);
    Route::post('/hotels/new', [AddHotelController::class, 'save_api']);
    Route::put('/hotels/{hotel_id}', [EditHotelController::class, 'save_api']);
    Route::delete('/hotels/delete/{hotels_id}', [HotelsController::class, 'delete_api']);

    Route::get('/hotelAvailability/{hotels_id}', [AvailabiltyController::class, 'hotelAvailability_api']);

    ///Exceptions///
    Route::get('/hotels', [HotelsController::class, 'index_api']);
    Route::get('/hotels/{hotel_id}/availabilty', [AvailabiltyController::class, 'exceptions_api']);
    Route::post('/hotels/{hotel_id}/availabilty/new/{excep_id}', [AvailabiltyController::class, 'save_api']);
    Route::put('/hotels/{hotel_id}/availabilty/{excep_id}', [AvailabiltyController::class, 'save_edit_api']);
    Route::delete('hotels/availabilty/delete/{excep_id}', [AvailabiltyController::class, 'delete_api']);

    ///Attributes///
    Route::get('/hotels/attributes', [AttributesController::class, 'show_api']);
    Route::get('/hotels/{hotel_id}/availabilty', [AvailabiltyController::class, 'exceptions_api']);
    Route::post('/hotels/attributes/new', [AttributesController::class, 'save_api']);
    Route::put('/hotels/attributes/{attr_id}', [AttributesController::class, 'update_api']);
    Route::delete('hotels/attributes/delete/{attr_id}', [AttributesController::class, 'delete_api']);





    ///Terms///
    Route::get('/hotels/terms', [TermsController::class, 'index_api']);
    Route::get('/hotels/attributes/{attr_id}/terms', [TermsController::class, 'show_api']);
    Route::get('/hotels/{hotel_id}/terms', [TermsController::class, 'exceptions_api']);
    Route::post('/hotels/attributes/terms/new', [TermsController::class, 'save_api']);
    Route::put('/hotels/attributes/terms/{attr_id}', [TermsController::class, 'update_api']);
    Route::delete('hotels/attributes/terms/delete/{terms_id}', [TermsController::class, 'delete_api']);



    ///Tours///
    Route::get('/tours', [TourController::class, 'index_api']);
    Route::post('/tours/new', [AddTourController::class, 'save_api']);
    Route::put('/tours/{tour_id}', [EditTourController::class, 'save_api']);
    Route::delete('/tours/delete/{tour_id}', [TourController::class, 'delete_api']);




    ///Tour Category///
    Route::get('/tours/category', [TourCategoryController::class, 'index_api']);
    Route::post('/tours/category/new', [TourCategoryController::class, 'save_new_api']);
    Route::put('/tours/category/{category_id}', [TourCategoryController::class, 'save_edit_api']);
    Route::delete('/tours/category/delete/{category_id}', [TourCategoryController::class, 'delete_api']);


    ///Tour Attributes///
    Route::get('/tours/attributes', [TourAttrController::class, 'show_api']);
    Route::post('/tours/attributes/new', [TourAttrController::class, 'save_api']);
    Route::put('/tours/attributes/{attributes_id}', [TourAttrController::class, 'update_api']);
    Route::delete('/tours/attributes/delete/{attributes_id}', [TourAttrController::class, 'delete_api']);





    ///Tour Terms///
    Route::get('/tours/terms', [TourTermController::class, 'index_api']);
    Route::get('/tours/attributes/{attr_id}/terms', [TourTermController::class, 'show_api']);
    Route::get('/tours/{hotel_id}/terms', [TourTermController::class, 'exceptions_api']);
    Route::post('/tours/attributes/terms/new', [TourTermController::class, 'save_api']);
    Route::put('/tours/attributes/terms/{attr_id}', [TourTermController::class, 'update_api']);
    Route::delete('tours/attributes/terms/delete/{terms_id}', [TourTermController::class, 'delete_api']);
});
