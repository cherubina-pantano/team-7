<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Route::get('guests/contatti', function(){
    return view('guests.contatti');
})->name('contatti');

Route::resource('guests', 'GuestController');



// Area riservata -- rotte
Auth::routes();

Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('/', 'HomeController@index')->name('home');

    //rotte crud
    Route::resource('restaurants', 'RestaurantController');

    Route::resource('dishes', 'DishController');

    Route::resource('orders', 'OrderController');
});

//Route::get('/home', 'HomeController@index')->name('home');
