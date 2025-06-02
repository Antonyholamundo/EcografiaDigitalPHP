<?php

namespace App\Http\Controllers;
use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    

    public function index()
    {
        $citas = Cita::all();
    return view('logica.citas', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
        'paciente' => 'required|string|max:255',
        'tipo'     => 'required|string',
        'fecha'    => 'required|date',
        'hora'     => 'required',
        'precio'   => 'required|numeric',
        'estado'   => 'required|string'
    ]);

    // Guardar la cita
    Cita::create($validated);

    // Redirigir o retornar respuesta
    return redirect()->route('logica.citas')->with('success', 'Cita registrada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cita = Cita::findOrFail($id);
        $cita->update($request->all());
        return redirect()->route('logica.citas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
   
    }
}
