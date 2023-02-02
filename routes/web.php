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
use App\Http\Controllers\IntromasivaController;
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
        return view('home'); 
    } else {
        return view('welcome'); 
    }
});
//Rutas de articulo

//Prototipo parece que funciona
Route::middleware(['SessionCheck'])->group(function ()  {
    Route::get('/index', [\App\Http\Controllers\ArticuloController::class, 'index'])->name("home");
    Route::get('/home', [\App\Http\Controllers\ArticuloController::class, 'index'])->name("home");
    Route::resource("articulo", \App\Http\Controllers\ArticuloController::class);

    //Esto para empezar, por ir quitando cosas pendientes
    //Rutas de cliente
    Route::resource("cliente", \App\Http\Controllers\ClienteController::class);

    //Rutas de proveedores
    Route::resource("proveedor", \App\Http\Controllers\ProveedorController::class);

    //Rutas de pedidos
    Route::resource("pedido", \App\Http\Controllers\PedidoController::class);
 });


//Esta era una prueba, no es necesaria teniendo index
//Route::get('/articulos/inicio', [\App\Http\Controllers\ArticuloController::class, 'index'])->name("articulos.inicio");





//Lista de Usuarios de ejemplo
// resources/views/usuarios/lista.blade.app
// https://laravel.com/docs/9.x/views
// Proteccion middleware
// https://spatie.be/docs/laravel-permission/v5/basic-usage/middleware
// Añadimos los 3 middleware en la variable $routeMiddleware del archivo app/Http/Kernel.php

/*Route::group(['middleware' => ['role:admin']], function () {
    Route::get("listausuarios", function () {
        return view("usuarios.todos", ["usuarios" => User::all()]);
    })->name("usuariostodos");
    Route::get("listagrupos", function () {
        return view("grupos.todos", ["grupos" => Grupo::all()]);
    });
 });*/

/*Route::group(['middleware' => ['auth']], function (){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get("grupos/{grupoid}/sortear", [SorteoController::class, 'sortear'])->name("grupos.sortear");
    Route::get("grupos/{grupoid}/anularsorteo", [SorteoController::class, 'anularsorteo'])->name("grupos.anularsorteo");
    Route::resource("grupos", GrupoController::class);
    Route::resource('grupos.participantes',GrupoAmigoController::class);
    Route::resource("amigos", AmigoController::class);
});*/

//Route::get('grupos/{grupoid}/intromasiva', [IntromasivaController::class,"intro"])->name("grupos.intromasiva");
//Route::post('grupos/{grupoid}/store', [IntromasivaController::class, "store"])->name("grupos.storemasiva");

Route::get('about', function () {
    return view("about.index");
});
