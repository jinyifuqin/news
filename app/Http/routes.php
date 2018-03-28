<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(array('prefix' => 'admin'), function()
{
    Route::get('user','Admin\UserController@index');
    Route::post('login','Admin\UserController@login');
    Route::get('register','Admin\UserController@register');
    Route::post('save','Admin\UserController@save');
    Route::get('pic','Admin\UserController@piclist');
    Route::post('picsave','Admin\UserController@picsave');
    Route::get('picdelete/{id}','Admin\UserController@picdelete');
    Route::get('piccontent/{id}','Admin\UserController@piccontent');
});
