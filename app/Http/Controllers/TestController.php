<?php

namespace App\Http\Controllers;

use App\Models\Test; // Asegúrate de importar el modelo Test
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $data = Test::all(); // Obtiene todos los registros
        return response()->json($data); // Devuelve los datos en formato JSON
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric' // Cambia 'string' a 'numeric' si 'price' es un número
        ]);

        $test = Test::create($data); // Crea el nuevo registro
        return response()->json($test, 201); // Devuelve el registro creado con código 201
    }

    public function show(Test $test)
    {
        return response()->json($test); // Devuelve el registro específico en formato JSON
    }

    public function edit(Test $test)
    {
        // No es necesario devolver nada en este método, o puedes devolver el registro para editar
        return response()->json($test); // Esto puede ser útil si estás usando un front-end
    }

    public function update(Request $request, Test $test)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric' // Cambia 'string' a 'numeric' si 'price' es un número
        ]);

        $test->update($data); // Actualiza el registro
        return response()->json($test); 
    }

    public function destroy(Test $test)
    {
        $test->delete();
        return response()->json(null, 204); 
    }
}
