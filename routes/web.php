<?php

use App\Http\Controllers\AmigoController;
use App\Http\Controllers\GrupoAmigoController;
use App\Http\Controllers\GrupoController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Grupo;
use App\Models\Articulo;
use App\Models\Cliente;
use App\Models\Proveedor;
use App\Models\Pedido;
use App\Models\DetallePedido;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SorteoController;

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
Auth::routes();


Route::get('/', function () {
    if (auth()->user()) {
        return redirect('/home');
    } else {
        return view('welcome'); 
    }
});

Route::get('pedido/pdf/{id_pedido}', [\App\Http\Controllers\PedidoController::class, 'pdf'])->name('pedido.pdf');

Route::middleware(['SessionCheck'])->group(function ()  {
    Route::get('/index', [\App\Http\Controllers\ArticuloController::class, 'index'])->name("home");
    Route::get('/home', [\App\Http\Controllers\ArticuloController::class, 'index'])->name("home");
    Route::resource("articulo", \App\Http\Controllers\ArticuloController::class);

    Route::resource("cliente", \App\Http\Controllers\ClienteController::class);

    Route::resource("proveedor", \App\Http\Controllers\ProveedorController::class);

    Route::resource("pedido", \App\Http\Controllers\PedidoController::class);

    Route::resource("detallePedido", \App\Http\Controllers\DetallePedidoController::class);

    Route::get("detallePedido/{id_pedido}", [\App\Http\Controllers\DetallePedidoController::class, 'list'])->name("list");

    Route::resource("session", \App\Http\Controllers\SessionController::class);

    
 });

Route::get('about', function () {
    return view("about.index");
});
