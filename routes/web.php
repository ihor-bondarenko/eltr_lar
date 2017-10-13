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
  if(Auth::check()){
    return view('trainer');
  }else{
    return view('main');
  }
})->name('startpage');

Auth::routes();

Route::get('/trainer', 'TrainerController@index')->name('trainer');
//Route::get('/viewer', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/api-login', 'Auth\ApiLoginController@apiLogin');
