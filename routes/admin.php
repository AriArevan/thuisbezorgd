<?php


//admin
Route::resource('admin', 'admin\AdminController');


//orders
Route::get('ordersadmin/showorderspage', 'admin\AdminController@showAllOrders')->middleware('admin')->name('orders');
Route::get('ordersadmin/showorders/{id}', 'admin\AdminController@showOrders')->middleware('admin')->name('adminshoworders');

