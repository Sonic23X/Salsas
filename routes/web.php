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

//redireccionar cuando se llama al proyecto
Route::get('/', function()
{
  return redirect('dashboard');
});

//rutas protegidas
/*Route::middleware('auth')->group(function()
{

});*/
//ruta al acceder al login
Route::get('/dashboard', 'DashboardController@index');

//routes
Route::resources([
    'deliveries' => 'DeliveryController',
    'orders' => 'OrderController',
    'salsas' => 'SalsaController',
    'stores' => 'StoreController',
    'users' => 'UserController'
]);

//rutas temporales
Route::get('/listaSalsa', function()
{
    return view('admin.salsas.listaSalsa');

});

Route::get('/crearSalsa', function()
{
    return view('admin.salsas.crearSalsa');

});

Route::get('/editarSalsa', function()
{
    return view('admin.salsas.editarSalsa');

});

//Rutas temporales usuario
Route::get('/listaUsuario', function()
{
    return view('admin.usuario.listaUsuario');

});

Route::get('/crearUsuario', function()
{
    return view('admin.usuario.crearUsuario');

});

Route::get('/editarUsuario', function()
{
    return view('admin.usuario.editarUsuario');

});

//rutas temporales tienda

Route::get('/crearTienda', function()
{
    return view('admin.tienda.crearTienda');

});

Route::get('/editarTienda', function()
{
    return view('admin.tienda.editarTienda');

});

//Rutas temporales pedidos de una  tienda en específico dentro del admin

Route::get('/tiendaPedido', function()
{
    return view('admin.tienda.tiendaPedido');

});

Route::get('/crearPedido', function()
{
    return view('admin.tienda.crearPedido');

});

//Rutas temporales entregas en administrador
Route::get('/entregaDashAdmin', function()
{
    return view('admin.entregas.listaEntrega');

});

//rutas temporales de la lista de pedidos general dentro del admin

Route::get('/listaPedidosAdmin', function()
{
    return view('admin.pedido.listaPedidosAdmin');

});

Route::get('/detallePedidoAdmin', function()
{
    return view('admin.pedido.detallePedidoAdmin');

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



