<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments = \App\Models\Enrollment::with('course')->get();
        return view('enrollments.index', compact('enrollments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        if (!$user) {
            abort(403, 'Debes iniciar sesión para inscribirte.');
        }
        $courses = \App\Models\Course::all();
        return view('enrollments.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            abort(403, 'Debes iniciar sesión para inscribirte.');
        }
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'enrollment_date' => 'required|date',
        ]);
        $validated['user_id'] = auth()->id();
        $validated['status'] = 'en curso';
        \App\Models\Enrollment::create($validated);
        return redirect()->route('enrollments.index')->with('success', 'Inscripción realizada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $enrollment = \App\Models\Enrollment::with('course')->findOrFail($id);
        return view('enrollments.show', compact('enrollment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = auth()->user();
        if (!$user || !in_array($user->role, ['admin', 'instructor'])) {
            abort(403, 'Solo un administrador o instructor puede editar la inscripción.');
        }
        $enrollment = \App\Models\Enrollment::findOrFail($id);
        $courses = \App\Models\Course::all();
        return view('enrollments.edit', compact('enrollment', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = auth()->user();
        if (!$user || !in_array($user->role, ['admin', 'instructor'])) {
            abort(403, 'Solo un administrador o instructor puede actualizar la inscripción.');
        }
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'enrollment_date' => 'required|date',
            'status' => 'required|string|max:255',
            'completed_at' => 'nullable|date',
        ]);
        $enrollment = \App\Models\Enrollment::findOrFail($id);
        $enrollment->update($validated);
        return redirect()->route('enrollments.index')->with('success', 'Inscripción actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $enrollment = \App\Models\Enrollment::findOrFail($id);
        $enrollment->delete();
        return redirect()->route('enrollments.index')->with('success', 'Inscripción eliminada correctamente.');
    }
}
