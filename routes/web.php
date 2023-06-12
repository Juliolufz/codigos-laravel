<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\productosController;
use App\Http\Controllers\categoriaController;
use App\Http\Controllers\subcategoriaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('productos', productosController::class)->names('productos');
Route::resource('categorias', categoriaController::class)->names('categorias');
Route::resource('subcategorias', subcategoriaController::class)->names('subcategorias');
