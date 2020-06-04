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
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//admin routes
Route::prefix('admin')->namespace('BackEnd')->group(function (){
    Route::resource('users','UsersController')->except('show');
    Route::resource('categories','Categories')->except('show');
    Route::resource('subcategories','Subcategories')->except('show');
    Route::resource('ads','Adds')->except('store','create','show');
    Route::get('getsuspendedadds','Adds@indexSusbended')->name('ads.sus');
    Route::post('ads/{ad}/publish','Adds@publish')->name('ads.publish')->middleware('auth');
});
