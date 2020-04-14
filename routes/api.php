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
//Login and Register of new user
Route::post('/login', 'api\LoginController@login');
Route::post('/register', 'api\LoginController@register');

//need access
Route::middleware('auth:api')->group(function()
{
  //Users
  Route::prefix('/user')->group(function()
  {
    //profile
    Route::get('/profile', 'api\UserController@myProfile');

  });

  //Stores
  Route::prefix('/store')->group(function()
  {
    //profile
    Route::get('/profile', 'api\UserController@myProfile');
  });
});
