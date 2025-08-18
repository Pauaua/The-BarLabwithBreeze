<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HelpDesk; // Importa el modelo

class HelpDeskController extends Controller
{
    public function create()
    {
        return view('mesa-de-ayuda');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'telefono' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        HelpDesk::create($request->all());

        return redirect()->route('helpdesk.create')->with('success', 'Solicitud enviada.');
    }
}