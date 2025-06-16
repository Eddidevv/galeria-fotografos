<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AuthController;
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
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        $photos = Photo::latest()->take(10)->get();
        return view('admin-paste.admin', compact('photos'));
    });

    // Outras rotas protegidas podem ficar aqui também
});

// Upload de fotos
Route::post('/photos', [PhotoController::class, 'store'])->name('photos.store');

// delete das fotos
Route::delete(uri: '/photos/{photo}', action: [PhotoController::class, 'destroy'])->name(name: 'photos.destroy');


//Login e validação     
Route::get('/admlogin', action: [AuthController::class, 'index'])->name('login');
Route::post('/admlogin', [AuthController::class, 'authenticate'])->name('auth');
Route::get('/registrar', [AuthController::class, 'registrar'])->name('registrar');
Route::post('/esqueceu-senha', [AuthController::class, 'forgotPassword'])->name('forgot-password');
