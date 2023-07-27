<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\admin\AdminsController;
use App\Http\Controllers\admin\RolesController;



use App\Http\Controllers\DashboardController;

use App\Http\Controllers\user\UsersController;
use App\Http\Controllers\user\EditUserController;
use App\Http\Controllers\user\AdduserController;
use App\Http\Controllers\user\SubscribersController;



use App\Http\Controllers\hotels\HotelsController;
use App\Http\Controllers\hotels\AddHotelController;
use App\Http\Controllers\hotels\AvailabiltyController;
use App\Http\Controllers\hotels\EditHotelController;
use App\Http\Controllers\hotels\AttributesController;
use App\Http\Controllers\hotels\TermsController;


use App\Http\Controllers\tours\TourController;
use App\Http\Controllers\tours\AddTourController;
use App\Http\Controllers\tours\EditTourController;
use App\Http\Controllers\tours\TourCategoryController;
use App\Http\Controllers\tours\TourAttrController;
use App\Http\Controllers\tours\TourTermController;

use App\Http\Controllers\booking\BookingController;







Route::get('/login', [LoginController::class,'show'])->name('login.show');
Route::post('/login', [LoginController::class,'login'])->name('login');
Route::get('/register', [RegisterController::class,'show'])->name('register.show');
Route::post('/register', [RegisterController::class,'save'])->name('register');
Route::group(['middleware' => ['auth']], function() {

    Route::get('/my-profile', [UsersController::class,'my_profile'])->name('my-profile.show');
    Route::get('/', [DashboardController::class,'index'])->name('dashboard.show');
    Route::get('/hotels', [HotelsController::class,'index'])->name('hotels.show');
    Route::get('/hotels/availabilty', [AvailabiltyController::class,'index'])->name('hotels.availabilty.show');
    Route::get('/hotels/{hotel_id}/availabilty', [AvailabiltyController::class,'hotel_availabilty'])->name('spec.hotel.availabilty.show');
    Route::get('/hotel/{hotel_id}/book', [BookingController::class,'book_hotel'])->name('hotel.book.form.show');

    Route::get('/tours', [TourController::class,'index'])->name('tours.show');


    Route::get('/logout', [LogoutController::class,'perform'])->name('logout');

    Route::group(['middleware' => ['role:1']], function() {
        Route::get('/user/role', [RolesController::class,'show'])->name('roles.show');
        Route::get('/user/role/new', [RolesController::class,'role_form'])->name('role.form.show');
        Route::post('/user/role/new', [RolesController::class,'add'])->name('role.form.save');
        Route::get('/user/role/{id}', [RolesController::class,'index'])->name('role.update.form.show');
        Route::post('/user/role/{id}', [RolesController::class,'update'])->name('role.update.form.save');

        Route::get('/user/role/edit/{id}', [RolesController::class, 'view_edit'])->name('role.edit');
        Route::post('/user/role/update/{id}', [RolesController::class, 'update'])->name('role.update');

        Route::post('/user/{edit}/role', [RolesController::class,'update'])->name('role.update.add');
        Route::delete('/user/roles/{id}', [RolesController::class,'destroy'])->name('role.destroy');


        Route::get('/users', [UsersController::class,'index'])->name('users.show');
        Route::get('/user/{user_id}', [EditUserController::class,'index'])->name('user.edit.show');
        Route::post('/user/{user_id}/edit', [EditUserController::class,'save'])->name('user.edit.save');
        Route::get('/users/new', [AdduserController::class,'show'])->name('add.user.form.show');
        Route::post('/users/new', [AdduserController::class,'save'])->name('add.user.form.save');
        Route::delete('/users/{id}',  [UsersController::class,'destroy'])->name('user.destroy');

        Route::get('/admins', [AdminsController::class,'index'])->name('admins.show');
        Route::get('/subscribers', [SubscribersController::class,'show'])->name('subscribers.show');
        Route::get('/subscribers/new', [SubscribersController::class,'add'])->name('subscriber.add.form.show');
        Route::post('/subscribers/new', [SubscribersController::class,'save'])->name('subscriber.add.form.save');

        Route::get('/subscribers/{user_id}', [SubscribersController::class,'index'])->name('subscriber.update.form.show');
        Route::post('/subscribers/{user_id}/edit', [SubscribersController::class,'update'])->name('subscriber.update.form.save');
        Route::delete('/subscribers/{user_id}/delete', [SubscribersController::class,'destroy'])->name('subscriber.destroy');




        Route::get('/hotels/attributes/new', [AttributesController::class,'add'])->name('hotel.attr.form.show');
        Route::post('/hotels/attributes/new', [AttributesController::class,'save'])->name('hotel.attr.form.save');
        Route::get('/hotels/attributes', [AttributesController::class,'index'])->name('hotel.attr.show');
        Route::get('/hotels/attributes/edit/{attr}', [AttributesController::class,'show'])->name('hotel.edit.attr.show');
        Route::post('/hotels/attributes/edit/{attr}', [AttributesController::class,'save_edit'])->name('hotel.edit.attr.save');



        Route::get('/hotels/attribute/{attr_id}/terms', [TermsController::class,'index'])->name('hotel.attr.terms.show');
        Route::get('/hotels/attribute/{attr_id}/term/new', [TermsController::class,'add'])->name('hotel.attr.terms.form.show');
        Route::post('/hotels/attribute/{attr_id}/term/new', [TermsController::class,'save'])->name('hotel.attr.terms.form.save');
        Route::get('/hotels/attribute/{attr_id}/terms', [TermsController::class,'index'])->name('hotel.attr.terms.show');

        Route::get('/hotels/attribute/{attr_id}/term/edit', [TermsController::class,'edit'])->name('hotel.attr.terms.edit.show');
        Route::post('/hotels/attribute/{attr_id}/term/edit', [TermsController::class,'save_edit'])->name('hotel.attr.terms.edit.save');
        Route::delete('/hotels/attribute/{attr_id}/term/delete', [TermsController::class,'destroy'])->name('hotel.attr.terms.destroy');





        Route::get('/hotels/new', [AddHotelController::class,'index'])->name('hotel.form.show');
        Route::post('/hotels/new', [AddHotelController::class,'save'])->name('hotel.form.save');
        Route::get('/hotels/{hotel_id}/edit', [EditHotelController::class,'show'])->name('hotel.edit.form.show');
        Route::post('/hotels/{hotel_id}/edit', [EditHotelController::class,'save'])->name('hotel.edit.form.save');
        Route::delete('/hotels/{hotel_id}/delete', [HotelsController::class,'destroy'])->name('hotel.destroy');



        Route::get('/hotels/availabilty/new', [AvailabiltyController::class,'index'])->name('hotels.availabilty.show');
        Route::get('/hotels/availabilty', [AvailabiltyController::class,'index'])->name('hotels.availabilty.show');
        Route::get('/hotels/availabilty/new', [AvailabiltyController::class,'add'])->name('hotels.availabilty.form.show');
        Route::post('/hotels/availabilty/new', [AvailabiltyController::class,'save'])->name('hotels.availabilty.form.save');
        Route::get('/hotels/availabilty/{avali_id}', [AvailabiltyController::class,'edit'])->name('hotels.availabilty.edit.form.show');
        Route::post('/hotels/availabilty/{avali_id}', [AvailabiltyController::class,'save_edit'])->name('hotels.availabilty.edit.form.save');
        Route::delete('/hotels/availabilty/{hotel_id}/delete', [AvailabiltyController::class,'destroy'])->name('hotels.availabilty.destroy');



        Route::get('/tours/attributes', [TourAttrController::class,'index'])->name('tour.attr.show');
        Route::get('/tours/attributes/new', [TourAttrController::class,'add'])->name('tour.attr.form.show');
        Route::post('/tours/attributes/new', [TourAttrController::class,'save'])->name('tour.attr.form.save');
        Route::get('/tours/attributes/edit/{attr}', [TourAttrController::class,'show'])->name('tour.attr.edit.show');
        Route::post('/tours/attributes/edit/{attr}', [TourAttrController::class,'save_edit'])->name('tour.attr.edit.save');
        Route::delete('/tours/attributes/{attr}/delete', [TourAttrController::class,'destroy'])->name('tour.attr.destroy');


        Route::get('/tours/attribute/{attr_id}/terms', [TourTermController::class,'index'])->name('tour.attr.terms.show');
        Route::get('/tours/attribute/{attr_id}/term/new', [TourTermController::class,'add'])->name('tour.attr.terms.form.show');
        Route::post('/tours/attribute/{attr_id}/term/new', [TourTermController::class,'save'])->name('tour.attr.terms.form.save');
        Route::get('/tours/attributes/edit/term/{attr}', [TourTermController::class,'show'])->name('tour.attr.terms.edit.show');
        Route::post('/tours/attributes/edit/term/{attr}', [TourTermController::class,'save_edit'])->name('tour.attr.terms.edit.save');
        Route::delete('/tours/attributes/term/{attr}/delete', [TourTermController::class,'destroy'])->name('tour.attr.term.destroy');





        Route::get('/tours/categories', [TourCategoryController::class,'index'])->name('tour.category.show');
        Route::get('/tours/categories/new', [TourCategoryController::class,'new'])->name('tour.category.form.show');
        Route::post('/tours/categories/new', [TourCategoryController::class,'save_new'])->name('tour.category.form.save');
        Route::get('/tours/categories/{category_id}/edit', [TourCategoryController::class,'edit'])->name('tour.category.edit.show');
        Route::post('/tours/categories/{category_id}/edit', [TourCategoryController::class,'save_edit'])->name('tour.category.edit.save');
        Route::delete('/tours/categories/{tour_id}/delete', [TourCategoryController::class,'destroy'])->name('tour.category.destroy');


        Route::get('/tours/new', [AddTourController::class,'index'])->name('tour.form.show');
        Route::post('/tours/new', [AddTourController::class,'save'])->name('tour.form.save');
        Route::get('/tours/{tour_id}/edit', [EditTourController::class,'show'])->name('tour.edit.form.show');
        Route::post('/tours/{tour_id}/edit', [EditTourController::class,'save'])->name('tour.edit.form.save');
        Route::delete('/tours/{tour_id}/delete', [TourController::class,'destroy'])->name('tour.destroy');


        Route::get('/booking', [BookingController::class,'index'])->name('booking.show');

    });

});

