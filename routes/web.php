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

//Routes for Auth
Auth::routes();

//rutas protegidas
Route::middleware('auth')->group(function()
{
    //ruta al acceder al login
    Route::get('/', 'DashboardController@index');
    Route::get('/dashboard', 'DashboardController@index');

    //routes
    Route::resources([
        'deliveries' => 'DeliveryController',
        'orders' => 'OrderController',
        'salsas' => 'SalsaController',
        'stores' => 'StoreController',
        'stores.orders' => 'StoreOrderController',
        'users' => 'UserController'
    ]);

    //rutas personalizadas de Entregas
    Route::get( 'deliveries/setDelivery/{store}', 'DeliveryController@setDelivery' );
    Route::get( 'stores/getQr/{id}', 'StoreController@getStoreCode' );

});
