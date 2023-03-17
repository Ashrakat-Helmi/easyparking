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
Route::post("register" , "AuthController@register");
Route::post("login" , "AuthController@login");
Route::group(['middleware' => ["auth:sanctum"]], function () {
    Route::resources([
        "prices" => "PricesController",
        "bookings" => "BookingsController",
        "corners" => "CornersController",
        "garages" => "GaragesController"
    ]);
    Route::get(
        'corners/show/empty',"CornersController@showEmpty"
    );
    Route::get(
        'corners/show/{garage_id}',"CornersController@showByGrage"
    );
    Route::get(
        'corners/showEmpty/{garage_id}',"CornersController@showEmptyByGrage"
    );
    Route::get(
        'bookings/showByUser/{user_id}',"BookingsController@showByUser"
    );
    Route::get(
        'bookings/showByGarage/{garage_id}',"BookingsController@showByGarage"
    );
    Route::post("logout" , "AuthController@logout");

});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
