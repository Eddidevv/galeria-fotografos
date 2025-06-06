<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Models\Photo;

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



// Página inicial
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Página Sobre Mim + Portfólio
Route::get('/sobre-portfolio', function () {
    return view('sobre-portfolio');
})->name('sobre-portfolio');

// Página Admin (com fotos exibidas)
Route::get('/admin', function () {
    $photos = Photo::latest()->take(10)->get();
    return view('admin-paste.admin', compact('photos'));
});

// Upload de fotos
Route::post('/photos', [PhotoController::class, 'store'])->name('photos.store');

// delete das fotos
Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');

