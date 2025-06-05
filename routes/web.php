<?php

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
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Página Sobre Mim + Portfólio
Route::get('/sobre-portfolio', function () {return view('sobre-portfolio');})->name('sobre-portfolio');

// Página admin
Route::get('/admin', function () {
    return view('admin-paste.admin');
});

Route::post('/photos', [PhotoController::class, 'store'])->name('photos.store');