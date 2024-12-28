<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProveedoresController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [Controller::class, 'index'])->name('index');

//Rutas de categorias
Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias.index');
Route::get('/create-categoria', [CategoriasController::class, 'create'])->name('categorias.create');
Route::post('/store-categoria', [CategoriasController::class, 'store'])->name('categorias.store');
Route::get('/show-categoria/{id}', [CategoriasController::class, 'show'])->name('categorias.show');
Route::put('/update-categoria/{id}', [CategoriasController::class, 'update'])->name('categorias.update');
Route::delete('/delete-categorias/{id}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');

//Rutas de proveedores
Route::get('/proveedores', [ProveedoresController::class, 'index'])->name('proveedores.index');
Route::get('/create-proveedor', [ProveedoresController::class, 'create'])->name('proveedores.create');
Route::post('/store-proveedor', [ProveedoresController::class, 'store'])->name('proveedores.store');
Route::get('/show-proveedor/{id}', [ProveedoresController::class, 'show'])->name('proveedores.show');
Route::put('update-proveedor/{id}', [ProveedoresController::class, 'update'])->name('proveedores.update');
Route::delete('/destroy-proveedor/{id}', [ProveedoresController::class, 'destroy'])->name('proveedores.destroy');

//Rutas de productos
Route::get('/productos', [ProductosController::class, 'index'])->name('productos.index');
Route::get('/create-producto', [ProductosController::class, 'create'])->name('producto.create');
Route::post('/store-producto', [ProductosController::class, 'store'])->name('producto.store');
Route::get('/show-producto/{id}', [ProductosController::class, 'show'])->name('producto.show');
Route::put('/update-producto/{id}', [ProductosController::class, 'update'])->name('producto.update');
Route::delete('/destroy-producto/{id}', [ProductosController::class, 'destroy'])->name('producto.destroy');
