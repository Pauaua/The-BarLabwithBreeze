<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = \App\Models\Course::all();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        if (!$user || $user->role !== 'admin') {
            abort(403, 'Solo el administrador puede crear cursos.');
        }
        $instructors = \App\Models\User::where('role', 'instructor')->get();
        return view('courses.create', compact('instructors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        if (!$user || $user->role !== 'admin') {
            abort(403, 'Solo el administrador puede crear cursos.');
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'duration_weeks' => 'required|integer',
            'instructor_id' => [
                'required',
                'integer',
                'exists:users,id',
                function ($attribute, $value, $fail) {
                    $user = \App\Models\User::find($value);
                    if (!$user || $user->role !== 'instructor') {
                        $fail('El ID de instructor debe pertenecer a un usuario con rol instructor.');
                    }
                }
            ],
            'published_status' => 'required|boolean',
        ]);
        \App\Models\Course::create($validated);
        return redirect()->route('courses.index')->with('success', 'Curso creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = \App\Models\Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = \App\Models\Course::findOrFail($id);
        $instructors = \App\Models\User::where('role', 'instructor')->get();
        return view('courses.edit', compact('course', 'instructors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'duration_weeks' => 'required|integer',
            'instructor_id' => [
                'required',
                'integer',
                'exists:users,id',
                function ($attribute, $value, $fail) {
                    $user = \App\Models\User::find($value);
                    if (!$user || $user->role !== 'instructor') {
                        $fail('El ID de instructor debe pertenecer a un usuario con rol instructor.');
                    }
                }
            ],
            'published_status' => 'required|boolean',
        ]);
        $course = \App\Models\Course::findOrFail($id);
        $course->update($validated);
        return redirect()->route('courses.index')->with('success', 'Curso actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = \App\Models\Course::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Curso eliminado correctamente.');
    }
}
