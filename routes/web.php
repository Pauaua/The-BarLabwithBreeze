<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Rutas públicas (Frontend)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cursos', fn() => view('cursos'))->name('cursos');
Route::get('/curso-detalle', fn() => view('bartenderprofesional'))->name('curso.detalle');
Route::get('/nosotros', fn() => view('nosotros'))->name('nosotros');
Route::get('/contacto', fn() => view('contacto'))->name('contacto');

/*
|--------------------------------------------------------------------------
| Rutas privadas (requieren autenticación)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



/*
|--------------------------------------------------------------------------
| Rutas de autenticación Breeze
|--------------------------------------------------------------------------
| Breeze instala login, register, logout, forgot password, reset password, etc.
*/

require __DIR__.'/auth.php';
