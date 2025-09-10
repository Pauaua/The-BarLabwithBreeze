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
// Mesa de ayuda 
Route::get('/helpdesk', [\App\Http\Controllers\HelpDeskController::class, 'create'])->name('helpdesk.create');
Route::post('/helpdesk', [\App\Http\Controllers\HelpDeskController::class, 'store'])->name('helpdesk.store');
Route::post('/helpdesk/consulta', [\App\Http\Controllers\HelpDeskController::class, 'consulta'])->name('helpdesk.consulta');

// CRUD de usuarios admin
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

/*
|--------------------------------------------------------------------------
| Rutas de autenticación Breeze
|--------------------------------------------------------------------------
*/
Route::resource('courses', CourseController::class);
Route::resource('enrollments', EnrollmentController::class);

require __DIR__.'/auth.php';