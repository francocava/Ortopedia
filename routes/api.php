<?php

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\UsuarioController;
use App\Pedido;
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


Route::apiResource('/cliente', 'ClienteController');
Route::apiResource('/obraSocial', 'ObraSocialController');
Route::apiResource('/rol', 'RolController');
Route::apiResource('/sucursal', 'SucursalController');
Route::apiResource('/usuario', 'UsuarioController');
Route::apiResource('/proveedor', 'ProveedorController');
Route::apiResource('/accesorio', 'AccesorioController');
Route::apiResource('/producto', 'ProductoController');
Route::apiResource('/formaPago', 'FormaPagoController');
Route::apiResource('/pago', 'PagoController');
Route::apiResource('/cobro', 'CobroController');
Route::apiResource('/pedido', 'PedidoController');
Route::apiResource('/pedidoItem', 'PedidoItemController');
Route::apiResource('/factura','FacturaController');
