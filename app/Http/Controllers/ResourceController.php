<?php
namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::with('course')->latest()->paginate(10);
        return view('resources.index', compact('resources'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('resources.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'archivo' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,zip,jpg,png',
            'course_id' => 'nullable|exists:courses,id',
        ]);

        $path = $request->file('archivo')->store('recursos', 'public');

        Resource::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'archivo' => $path,
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('resources.index')->with('success', 'Recurso creado correctamente.');
    }

    public function show(Resource $resource)
    {
        return view('resources.show', compact('resource'));
    }

    public function edit(Resource $resource)
    {
        $courses = Course::all();
        return view('resources.edit', compact('resource', 'courses'));
    }

    public function update(Request $request, Resource $resource)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'archivo' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,zip,jpg,png',
            'course_id' => 'nullable|exists:courses,id',
        ]);

        $data = $request->only('titulo', 'descripcion', 'course_id');

        if ($request->hasFile('archivo')) {
            // Borra el archivo anterior
            Storage::disk('public')->delete($resource->archivo);
            $data['archivo'] = $request->file('archivo')->store('recursos', 'public');
        }

        $resource->update($data);

        return redirect()->route('resources.index')->with('success', 'Recurso actualizado correctamente.');
    }

    public function destroy(Resource $resource)
    {
        Storage::disk('public')->delete($resource->archivo);
        $resource->delete();
        return redirect()->route('resources.index')->with('success', 'Recurso eliminado correctamente.');
    }
}