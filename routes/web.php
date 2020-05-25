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

    //routes
    Route::resources([
        'deliveries' => 'DeliveryController',
        'orders' => 'OrderController',
        'salsas' => 'SalsaController',
        'stores' => 'StoreController',
        'stores.orders' => 'StoreOrderController',
        'users' => 'UserController'
    ]);
});



//Rutas temporales pedidos de una  tienda en específico dentro del admin


Route::get('/crearPedido', function()
{
    return view('admin.tienda.crearPedido');

});

//Rutas temporales entregas en administrador
Route::get('/entregaDashAdmin', function()
{
    return view('admin.entregas.listaEntrega');

});



//Rutas Temporales lista de pedidos de tienda

Route::get('/tiendaListaPedidos', function()
{
    return view('tienda.listaPedidos');

});

Route::get('/detallePedidoTienda', function()
{
    return view('tienda.pedidoTiendaDetalle');

});

//Rutas temporales de repartidor

Route::get('/dashRepartidor', function ()
{
   return view('repartidor.entregas.dashrepartidor');
});

Route::get('/registrarEntregaRepartidor', function ()
{
    return view('repartidor.entregas.registrarEntrega');
});
