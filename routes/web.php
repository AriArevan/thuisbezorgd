<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('profile', 'UserController');
Route::get('orders/show', 'UserController@index')->name('ordersshow');

Route::resource('restaurants', 'RestaurantController');
Route::get('/search', 'RestaurantController@search')->name('search');

Route::resource('consumables', 'ConsumableController');

Route::get('addToCart/{id}', 'ConsumableController@addToCart')->name('cart.add');
Route::get('restaurant/{restaurant_id}/betalen', 'ConsumableController@pay')->name('pay');
Route::get('restaurant/{restaurant_id}/afrekenen', 'RestaurantController@checkout')->name('checkout');


/*Route::resource('restaurants/{restaurant_id}/consumables', 'ConsumableController');
*/