<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use Illuminate\Http\Request;
use App\Http\Requests\UnidadRequest;

class UnidadController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $registros = Unidad::where('nombre', 'like', '%' . $texto . '%')
                            ->orWhere('codigo', 'like', '%' . $texto . '%')
                            ->paginate(10);
        return view('unidad.index', compact('registros', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidad = new Unidad();
        return view('unidad.action', ['unidad' => $unidad]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UnidadRequest $request)
    {
        $unidad = new Unidad;
        $unidad->codigo = $request->input('codigo');
        $unidad->nombre = $request->input('nombre');
        $unidad->descripcion = $request->input('descripcion');
        $unidad->precio = $request->input('precio');
        $unidad->stock = $request->input('stock');
        $unidad->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Producto creado satisfactoriamente'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Unidad $unidad)
    {
        return view('unidad.show', compact('unidad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $unidad = Unidad::findOrFail($id);
        return view('unidad.action', compact('unidad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UnidadRequest $request, $id)
    {
        $unidad = Unidad::findOrFail($id);
        $unidad->codigo = $request->codigo;
        $unidad->nombre = $request->nombre;
        $unidad->descripcion = $request->descripcion;
        $unidad->precio = $request->precio;
        $unidad->stock = $request->stock;
        $unidad->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Producto actualizado satisfactoriamente'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $unidad = Unidad::findOrFail($id);
        $unidad->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Producto eliminado satisfactoriamente'
        ]);
    }
}
