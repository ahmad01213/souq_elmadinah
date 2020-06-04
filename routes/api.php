<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::namespace('API')->group(function (){
    Route::get('ads','Categories@index');
    Route::post('login', 'Users@login');
    Route::post('register', 'Users@register');
    Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'Users@details');
    Route::post('ads','Ads@store')->middleware('auth')->named('ads.store');
    Route::post('ads/{ad}/bids','Bids@store')->middleware('auth')->named('bids.store');
    Route::post('ads/{ad}/delete','Ads@destroy')->middleware('auth')->named('ads.destroy');
    Route::post('bids','Bids@store')->middleware('auth');
    });
});
//ads
Route::get('ads/{ad}','API\Ads@showAdd')->named('ads.show');
Route::get('subcategory/{subcatigory}/ads','API\Ads@showSubAds');
Route::get('category/{category}/ads','API\Ads@catigoryAdds');






