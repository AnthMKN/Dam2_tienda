<?php

use App\Http\Controllers\AmigoController;
use App\Http\Controllers\GrupoAmigoController;
use App\Http\Controllers\GrupoController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Grupo;
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

Route::get('/', function () {
    if (auth()->user()) {
        return view("home");
    } else {
        return view('welcome'); // Venía con welcome
    }
});

Auth::routes();


//Lista de Usuarios de ejemplo
// resources/views/usuarios/lista.blade.app
// https://laravel.com/docs/9.x/views
// Proteccion middleware
// https://spatie.be/docs/laravel-permission/v5/basic-usage/middleware
// Añadimos los 3 middleware en la variable $routeMiddleware del archivo app/Http/Kernel.php

Route::group(['middleware' => ['role:admin']], function () {
    Route::get("listausuarios", function () {
        return view("usuarios.todos", ["usuarios" => User::all()]);
    })->name("usuariostodos");
    Route::get("listagrupos", function () {
        return view("grupos.todos", ["grupos" => Grupo::all()]);
    });
 });

Route::group(['middleware' => ['auth']], function (){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get("grupos/{grupoid}/sortear", [SorteoController::class, 'sortear'])->name("grupos.sortear");
    Route::get("grupos/{grupoid}/anularsorteo", [SorteoController::class, 'anularsorteo'])->name("grupos.anularsorteo");
    Route::resource("grupos", GrupoController::class);
    Route::resource('grupos.participantes',GrupoAmigoController::class);
    Route::resource("amigos", AmigoController::class);
});

Route::get('grupos/{grupoid}/intromasiva', [IntromasivaController::class,"intro"])->name("grupos.intromasiva");
Route::post('grupos/{grupoid}/store', [IntromasivaController::class, "store"])->name("grupos.storemasiva");

Route::get('about', function () {
    return view("about.index");
});
