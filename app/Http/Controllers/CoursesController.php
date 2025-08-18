<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CoursesController extends Controller
{
    public function index()
    {
    $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'duration_weeks' => 'nullable|integer',
            'instructor_id' => 'nullable|integer|exists:users,id',
            'published_status' => 'nullable|boolean',
        ]);
        Course::create($validated);
        return redirect()->route('courses.index')->with('success', 'Curso creado correctamente.');
    }

    public function show($id)
    {
    $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'duration_weeks' => 'nullable|integer',
            'instructor_id' => 'nullable|integer|exists:users,id',
            'published_status' => 'nullable|boolean',
        ]);
        $course = Course::findOrFail($id);
        $course->update($validated);
        return redirect()->route('courses.index')->with('success', 'Curso actualizado correctamente.');
    }

    public function destroy($id)
    {
    $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Curso eliminado correctamente.');
    }
}