<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HelpDesk; // Importa el modelo

class HelpDeskController extends Controller
{
    public function create()
    {
        return view('mesa-de-ayuda', [
            'solicitud' => null,
            'consulta_id' => null,
        ]);
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

        $helpDesk = HelpDesk::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'status' => 'pendiente',
        ]);

        return redirect()
            ->route('helpdesk.create')
            ->with('success', 'Solicitud enviada. Número de solicitud: ' . $helpDesk->id);
    }

    public function consulta(Request $request)
    {
        $request->validate([
            'consulta_id' => 'required|integer|min:1',
        ]);

        $solicitud = \App\Models\HelpDesk::find($request->consulta_id);

        return view('mesa-de-ayuda', [
            'solicitud' => $solicitud,
            'consulta_id' => $request->consulta_id,
        ]);
    }
}