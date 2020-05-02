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
