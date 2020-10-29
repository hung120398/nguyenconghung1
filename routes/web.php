<?php

use Illuminate\Support\Facades\Route;


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
    return view('layouts/app');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin', 'Admin\UsersController@getUsers')->name('admin.users.getUsers');
Route::namespace('Thuthu')->prefix('thuthu')->name('thuthu.')->middleware(['can:xem-sach'])->group(function(){
    Route::resource('/users','BookController');

});

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-user')->group(function(){
    Route::resource('/users','UsersController',['except'=>['show','create','store']]);

});
Route::namespace('User')->prefix('user')->name('user.')->group(function(){
    Route::resource('/users','cartController');

});
Route::post('user/users/{user}', 'User\cartController@update1')->name('user.users.update1');

    