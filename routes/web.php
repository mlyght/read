<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
 
Auth::routes();
//User Dashboard
Route::get('/', 'user_controller@index');
Route::get('user/dashboard', 'user_controller@dashboard');


//meters 
Route::get('user/newMeter', 'user_controller@addMeter');
Route::post('user/addnewMeter/', 'user_controller@addnewMeter');
Route::get('user/AllReads', 'user_controller@allReads');
Route::get('user/validateRead', 'user_controller@validate');
   

//Mobile Api
Route::group(['prefix' => '/api/v1'], function()
{

	Route::resource('mobile', 'MobileAPI' );
});
