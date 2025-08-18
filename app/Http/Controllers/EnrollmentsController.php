<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class EnrollmentsController extends Controller
{
    public function index()
    {
        // Solo mostrar inscripciones del usuario autenticado
        $enrollments = Enrollment::where('user_id', Auth::id())->with('course')->get();
        return view('enrollments.index', compact('enrollments'));
    }

    public function create($course_id = null)
    {
        $courses = Course::all();
        return view('enrollments.create', compact('courses', 'course_id'));
    }

    public function store(Request $request)
    {
        // Solo permitir a usuarios con rol alumno
        if (!Auth::check() || Auth::user()->role !== 'alumno') {
            abort(403, 'Solo los alumnos pueden inscribirse.');
        }
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'enrollment_date' => 'required|date',
            'status' => 'required|string|max:255',
        ]);
        $validated['user_id'] = Auth::id();
        Enrollment::create($validated);
        return redirect()->route('enrollments.index')->with('success', 'Inscripción realizada correctamente.');
    }

    public function show($id)
    {
        $enrollment = Enrollment::where('id', $id)->where('user_id', Auth::id())->with('course')->firstOrFail();
        return view('enrollments.show', compact('enrollment'));
    }

    public function destroy($id)
    {
        $enrollment = Enrollment::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $enrollment->delete();
        return redirect()->route('enrollments.index')->with('success', 'Inscripción eliminada correctamente.');
    }
}