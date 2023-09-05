<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\Api\FeatureController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\booking\BookingController;
use App\Http\Controllers\OAuth\SocialAuthController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\SubscriberController;
use App\Http\Controllers\Dashboard\EventDomainController;
use App\Http\Controllers\Dashboard\BlogController as Blog;
use App\Http\Controllers\Api\SubscriberController as Subscriber;
use App\Http\Controllers\Api\SubscriberController as ApiSubscriberController;
use App\Http\Controllers\Dashboard\MealController as DashboardMealController;
use App\Http\Controllers\Dashboard\PartController as DashboardPartController;
use App\Http\Controllers\Dashboard\RoomController as DashboardRoomController;
use App\Http\Controllers\Dashboard\ZoneController as DashboardZoneController;
use App\Http\Controllers\Dashboard\HotelController as DashboardHotelController;
use App\Http\Controllers\Dashboard\CurrencyController as DashboardCurrencyController;
use App\Http\Controllers\Dashboard\SupplierController as DashboardSupplierController;
use App\Http\Controllers\Dashboard\HotelTermController as DashboardHotelTermController;
use App\Http\Controllers\Dashboard\RoomDetailController as DashboardRoomDetailController;
use App\Http\Controllers\Dashboard\DestinationController as DashboardDestinationController;
use App\Http\Controllers\Dashboard\HotelPolicyController as DashboardHotelPolicyController;
use App\Http\Controllers\Dashboard\HotelCategoryController as DashboardHotelCategoryController;
use App\Http\Controllers\Dashboard\HotelAttributeController as DashboardHotelAttributeController;


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

/** OAuth */

/*** Facebook Authentication ***/
Route::get('/login/facebook', [SocialAuthController::class, 'redirectToFacebook']);
Route::get('/login/facebook/callback', [SocialAuthController::class, 'handleFacebookCallback']);

/*** Google Authentication ***/
Route::get('/login/google', [SocialAuthController::class, 'redirectToGoogle']);
Route::get('/login/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);


/**  Dashboard  */
Route::group(['prefix' => 'dashboard'], function () {

    Route::group(['prefix' => 'auth'], function () {
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/index', [UserController::class, 'index']);
        Route::get('/index/users', [UserController::class, 'index_users']);
        Route::get('/index/admins', [UserController::class, 'index_admins']);
        Route::get('/create', [UserController::class, 'create']);
        Route::post('/store', [UserController::class, 'store']);
        Route::get('/show/{id}', [UserController::class, 'show']);
        Route::get('/edit/{id}', [UserController::class, 'edit']);
        Route::post('/update/{id}', [UserController::class, 'update']);
        Route::delete('/delete/{id}', [UserController::class, 'destroy']);
        Route::post('/bulk/delete', [UserController::class, 'bulkDelete']);
    });
    Route::group(['prefix' => 'subscriber'], function () {
        Route::get('/index', [SubscriberController::class, 'index']);
        Route::delete('/delete/{id}', [SubscriberController::class, 'destroy']);
        Route::post('/bulk/delete', [SubscriberController::class, 'bulkDelete']);
    });
    Route::group(['prefix' => 'category'], function () {
        Route::get('/index', [App\Http\Controllers\Dashboard\CategoryController::class, 'index']);
        Route::post('/store', [App\Http\Controllers\Dashboard\CategoryController::class, 'store']);
        Route::get('/show/{id}', [App\Http\Controllers\Dashboard\CategoryController::class, 'show']);
        Route::post('/update/{id}', [App\Http\Controllers\Dashboard\CategoryController::class, 'update']);
        Route::delete('/delete/{id}', [App\Http\Controllers\Dashboard\CategoryController::class, 'destroy']);
        Route::post('/bulk/delete', [App\Http\Controllers\Dashboard\CategoryController::class, 'bulkDelete']);
    });
    Route::group(['prefix' => 'blog'], function () {
        Route::get('/', [Blog::class, 'index']);
        Route::get('/create', [Blog::class, 'create']);
        Route::get('/edit', [Blog::class, 'edit']);
        Route::post('/store', [Blog::class, 'store']);
        Route::get('/{id}', [Blog::class, 'show']);
        Route::get('/{id}/edit', [Blog::class, 'edit']);
        Route::post('/{id}', [Blog::class, 'update']);
        Route::delete('/{id}', [Blog::class, 'destroy']);
        Route::post('/bulk/delete', [Blog::class, 'bulkDelete']);
    });

    Route::group(['prefix' => 'event'], function () {
        Route::get('/index', [App\Http\Controllers\Dashboard\EventController::class, 'index']);
        Route::post('/store', [App\Http\Controllers\Dashboard\EventController::class, 'store']);
        Route::get('/show/{id}', [App\Http\Controllers\Dashboard\EventController::class, 'show']);
        Route::post('/update/{id}', [App\Http\Controllers\Dashboard\EventController::class, 'update']);
        Route::delete('/delete/{id}', [App\Http\Controllers\Dashboard\EventController::class, 'destroy']);
        Route::get('/create', [App\Http\Controllers\Dashboard\EventController::class, 'create']);
        Route::get('/edit/{id}', [App\Http\Controllers\Dashboard\EventController::class, 'edit']);
        Route::post('/bulk/delete', [App\Http\Controllers\Dashboard\EventController::class, 'bulkDelete']);
    });

    Route::group(['prefix' => 'event/domain'], function () {
        Route::get('/index', [EventDomainController::class, 'index']);
        Route::post('/store', [EventDomainController::class, 'store']);
        Route::get('/show/{id}', [EventDomainController::class, 'show']);
        Route::post('/update/{id}', [EventDomainController::class, 'update']);
        Route::delete('/delete/{id}', [EventDomainController::class, 'destroy']);
        Route::post('/bulk/delete', [EventDomainController::class, 'bulkDelete']);
    });

    Route::group(['prefix' => 'page'], function () {
        Route::get('/index', [App\Http\Controllers\Dashboard\PageController::class, 'index']);
        Route::post('/store', [App\Http\Controllers\Dashboard\PageController::class, 'store']);
        Route::get('/show/{id}', [App\Http\Controllers\Dashboard\PageController::class, 'show']);
        Route::post('/update/{id}', [App\Http\Controllers\Dashboard\PageController::class, 'update']);
        Route::delete('/delete/{id}', [App\Http\Controllers\Dashboard\PageController::class, 'destroy']);
        Route::post('/rebuild/{page}', [App\Http\Controllers\Dashboard\PageController::class, 'rebuild']);
        Route::post('/bulk/delete', [App\Http\Controllers\Dashboard\PageController::class, 'bulkDelete']);
    });
    Route::group(['prefix' => 'section'], function () {
        Route::get('/index', [SectionController::class, 'index']);
        Route::post('/store', [SectionController::class, 'store']);
        Route::get('/show/{id}', [SectionController::class, 'show']);
        Route::post('/update/{id}', [SectionController::class, 'update']);
        Route::delete('/destroy/{id}', [SectionController::class, 'destroy']);
        Route::post('/bulk/delete', [SectionController::class, 'bulkDelete']);
    });

    Route::group(['prefix' => 'hotel'], function () {
        Route::get('/index', [DashboardHotelController::class, 'index']);
        Route::get('/create', [DashboardHotelController::class, 'create']);
        Route::post('/store', [DashboardHotelController::class, 'store']);
        Route::get('/{hotel}', [DashboardHotelController::class, 'show']);
        Route::get('edit/{hotel}', [DashboardHotelController::class, 'edit']);
        Route::post('/update/{hotel}', [DashboardHotelController::class, 'update']);
        Route::delete('/delete/{hotel}', [DashboardHotelController::class, 'destroy']);
    });

    Route::group(['prefix' => 'currency'], function () {
        Route::get('/index', [DashboardCurrencyController::class, 'index']);
        Route::get('/create', [DashboardCurrencyController::class, 'create']);
        Route::post('/store', [DashboardCurrencyController::class, 'store']);
        Route::get('/{currency}', [DashboardCurrencyController::class, 'show']);
        Route::get('edit/{currency}', [DashboardCurrencyController::class, 'edit']);
        Route::post('/update/{currency}', [DashboardCurrencyController::class, 'update']);
        Route::delete('/delete/{currency}', [DashboardCurrencyController::class, 'destroy']);
    });

    Route::group(['prefix' => 'destination'], function () {
        Route::get('/index', [DashboardDestinationController::class, 'index']);
        Route::get('/create', [DashboardDestinationController::class, 'create']);
        Route::post('/store', [DashboardDestinationController::class, 'store']);
        Route::get('/{destination}', [DashboardDestinationController::class, 'show']);
        Route::get('edit/{destination}', [DashboardDestinationController::class, 'edit']);
        Route::post('/update/{destination}', [DashboardDestinationController::class, 'update']);
        Route::delete('/delete/{destination}', [DashboardDestinationController::class, 'destroy']);
    });

    Route::group(['prefix' => 'hotel_category'], function () {
        Route::get('/index', [DashboardHotelCategoryController::class, 'index']);
        Route::get('/create', [DashboardHotelCategoryController::class, 'create']);
        Route::post('/store', [DashboardHotelCategoryController::class, 'store']);
        Route::get('/{hotel_category}', [DashboardHotelCategoryController::class, 'show']);
        Route::get('edit/{hotel_category}', [DashboardHotelCategoryController::class, 'edit']);
        Route::post('/update/{hotel_category}', [DashboardHotelCategoryController::class, 'update']);
        Route::delete('/delete/{hotel_category}', [DashboardHotelCategoryController::class, 'destroy']);
    });

    Route::group(['prefix' => 'meal'], function () {
        Route::get('/index', [DashboardMealController::class, 'index']);
        Route::get('/create', [DashboardMealController::class, 'create']);
        Route::post('/store', [DashboardMealController::class, 'store']);
        Route::get('/{meal}', [DashboardMealController::class, 'show']);
        Route::get('edit/{meal}', [DashboardMealController::class, 'edit']);
        Route::post('/update/{meal}', [DashboardMealController::class, 'update']);
        Route::delete('/delete/{meal}', [DashboardMealController::class, 'destroy']);
    });

    Route::group(['prefix' => 'room'], function () {
        Route::get('/index', [DashboardRoomController::class, 'index']);
        Route::get('/create', [DashboardRoomController::class, 'create']);
        Route::post('/store', [DashboardRoomController::class, 'store']);
        Route::get('/{room}', [DashboardRoomController::class, 'show']);
        Route::get('edit/{room}', [DashboardRoomController::class, 'edit']);
        Route::post('/update/{room}', [DashboardRoomController::class, 'update']);
        Route::delete('/delete/{room}', [DashboardRoomController::class, 'destroy']);
    });

    Route::group(['prefix' => 'room_detail'], function () {
        Route::get('/index', [DashboardRoomDetailController::class, 'index']);
        Route::get('/create', [DashboardRoomDetailController::class, 'create']);
        Route::post('/store', [DashboardRoomDetailController::class, 'store']);
        Route::get('/{room_detail}', [DashboardRoomDetailController::class, 'show']);
        Route::get('edit/{room_detail}', [DashboardRoomDetailController::class, 'edit']);
        Route::post('/update/{room_detail}', [DashboardRoomDetailController::class, 'update']);
        Route::delete('/delete/{room_detail}', [DashboardRoomDetailController::class, 'destroy']);
    });

    Route::group(['prefix' => 'supplier'], function () {
        Route::get('/index', [DashboardSupplierController::class, 'index']);
        Route::get('/create', [DashboardSupplierController::class, 'create']);
        Route::post('/store', [DashboardSupplierController::class, 'store']);
        Route::get('/{supplier}', [DashboardSupplierController::class, 'show']);
        Route::get('edit/{supplier}', [DashboardSupplierController::class, 'edit']);
        Route::post('/update/{supplier}', [DashboardSupplierController::class, 'update']);
        Route::delete('/delete/{supplier}', [DashboardSupplierController::class, 'destroy']);
    });

    Route::group(['prefix' => 'zone'], function () {
        Route::get('/index', [DashboardZoneController::class, 'index']);
        Route::get('/create', [DashboardZoneController::class, 'create']);
        Route::post('/store', [DashboardZoneController::class, 'store']);
        Route::get('/{zone}', [DashboardZoneController::class, 'show']);
        Route::get('edit/{zone}', [DashboardZoneController::class, 'edit']);
        Route::post('/update/{zone}', [DashboardZoneController::class, 'update']);
        Route::delete('/delete/{zone}', [DashboardZoneController::class, 'destroy']);
    });

    Route::group(['prefix' => 'part'], function () {
        Route::get('/index', [DashboardPartController::class, 'index']);
        Route::post('/store', [DashboardPartController::class, 'store']);
        Route::get('/show/{page}', [DashboardPartController::class, 'show']);
        Route::get('/edit/{page}', [DashboardPartController::class, 'edit']);
        Route::post('/update', [DashboardPartController::class, 'update']);
        Route::delete('/delete/{part}', [DashboardPartController::class, 'destroy']);
    });
    
    Route::group(['prefix' => 'hotelpolicy'], function () {
        Route::get('/index', [DashboardHotelPolicyController::class, 'index']);
        Route::post('/store', [DashboardHotelPolicyController::class, 'store']);
        Route::get('/show/{hotelpolicy}', [DashboardHotelPolicyController::class, 'show']);
        Route::get('/edit/{hotelpolicy}', [DashboardHotelPolicyController::class, 'edit']);
        Route::post('/update/{hotelpolicy}', [DashboardHotelPolicyController::class, 'update']);
        Route::delete('/delete/{hotelpolicy}', [DashboardHotelPolicyController::class, 'destroy']);
    });
    
    Route::group(['prefix' => 'hotelattribute'], function () {
        Route::get('/index', [DashboardHotelAttributeController::class, 'index']);
        Route::post('/store', [DashboardHotelAttributeController::class, 'store']);
        Route::get('/show/{hotelAttribute}', [DashboardHotelAttributeController::class, 'show']);
        Route::get('/edit/{hotelAttribute}', [DashboardHotelAttributeController::class, 'edit']);
        Route::post('/update/{hotelAttribute}', [DashboardHotelAttributeController::class, 'update']);
        Route::delete('/delete/{hotelAttribute}', [DashboardHotelAttributeController::class, 'destroy']);
    });
    
    Route::group(['prefix' => 'hotelterm'], function () {
        Route::get('/index', [DashboardHotelTermController::class, 'index']);
        Route::post('/store', [DashboardHotelTermController::class, 'store']);
        Route::get('/show/{hotelTerm}', [DashboardHotelTermController::class, 'show']);
        Route::get('/edit/{hotelTerm}', [DashboardHotelTermController::class, 'edit']);
        Route::post('/update/{hotelTerm}', [DashboardHotelTermController::class, 'update']);
        Route::delete('/delete/{hotelTerm}', [DashboardHotelTermController::class, 'destroy']);
    });
    
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

    Route::post('subscriber/store', [Subscriber::class, 'store']);
});

Route::get('page', [PageController::class, 'page_by_data']);
Route::get('page/{page}', [PageController::class, 'page']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::get('/page/{page}', [PageController::class, 'page_api']);