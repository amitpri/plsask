<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('password', 'Auth\UpdatePasswordController@password'); 
Route::post('password', 'Auth\UpdatePasswordController@update');

Route::get('/hotel', 'HotelController@index'); 
Route::get('/hotel/edit', 'HotelController@edit'); 

Route::get('/hotel/rooms', 'HotelRoomsController@index'); 
Route::get('/hotel/rooms/get', 'HotelRoomsController@get'); 
Route::get('/hotel/rooms/save', 'HotelRoomsController@save'); 
Route::get('/hotel/rooms/list/{key}', 'HotelRoomsController@list'); 

Route::get('/hotel/pictures', 'HotelPicsController@index');

Route::get('/dashboard', 'DashboardController@index');
Route::get('/bookings', 'BookingsController@index');
Route::get('/listings', 'ListingsController@index');
Route::get('/listings/active', 'ListingsController@active');

Route::get('/reservations', 'ReservationsController@index');


Route::get('/listing/save', 'ListingsController@save');
Route::get('/payments', 'PaymentsController@index');
Route::get('/reviews', 'ReviewsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
 
Route::get('/mypictures', 'HomeController@mypictures');

Route::get('/settings', 'HomeController@settings');