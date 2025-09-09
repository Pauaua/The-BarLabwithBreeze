<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelpDeskController;

// Controladores adicionales
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;

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
    $role = auth()->user()->role;

    $data = [];

    if ($role === 'admin') {
        $data['users'] = \App\Models\User::all();
        $data['courses'] = \App\Models\Course::with('user')->latest()->get();
        $data['enrollments'] = \App\Models\Enrollment::with('user', 'course')->latest()->get();
        $data['helpdesk'] = \App\Models\HelpDesk::latest()->get(); // Cambia si tu modelo se llama diferente
    } elseif ($role === 'instructor') {
        $data['courses'] = \App\Models\Course::where('instructor_id', auth()->id())->get();
    } elseif ($role === 'student') {
        $data['courses'] = \App\Models\Course::whereHas('enrollments', function ($q) {
            $q->where('user_id', auth()->id());
        })->get();
    }

    return view('dashboard', $data);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/mesa-de-ayuda', [HelpDeskController::class, 'create'])->name('helpdesk.create');
Route::post('/mesa-de-ayuda', [HelpDeskController::class, 'store'])->name('helpdesk.store');
Route::post('/consulta-solicitud', [HelpDeskController::class, 'consulta'])->name('helpdesk.consulta');

// Rutas de administrador
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])
         ->name('admin.users.index')
         ->middleware('role.admin');
});

/*
|--------------------------------------------------------------------------
| Rutas de autenticación Breeze
|--------------------------------------------------------------------------
*/

Route::resource('courses', CourseController::class);
Route::resource('enrollments', EnrollmentController::class);

require __DIR__.'/auth.php';