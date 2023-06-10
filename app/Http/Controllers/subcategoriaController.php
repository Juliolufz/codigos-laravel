<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\SubCategoria;

class subcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subcategorias = SubCategoria::select('c.nombre as cnombre', 'subcategorias.*')
                                        ->join('categorias as c', 'subcategorias.categorias_id', 'c.id')
                                        ->where('subcategorias.estado', 1)
                                        ->get();
        return view('subcategorias.index', compact('subcategorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categoria = Categoria::where('estado', 1)->get();
        return view('subcategorias.create', compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $subcategorias = new SubCategoria();
        $subcategorias->nombre = $request->input('nombre');
        $subcategorias->descripcion = $request->input('descripcion');
        $subcategorias->estado = 1;
        $subcategorias->categorias_id = $request->input('categoria');
        $subcategorias->save();
        return redirect(route('subcategorias.index'));
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
        $categoria = Categoria::where('estado', 1)->get();
        $subcategorias = SubCategoria::find($id);
        return view('subcategorias.edit', compact('categoria', 'subcategorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $subcategorias = SubCategoria::find($id);
        $subcategorias->nombre = $request->input('nombre');
        $subcategorias->descripcion = $request->input('descripcion');
        $subcategorias->categorias_id = $request->input('categoria');
        $subcategorias->save();
        return redirect(route('subcategorias.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $subcategorias = SubCategoria::find($id);
        $subcategorias->estado = 0;
        $subcategorias->save();
        return redirect(route('subcategorias.index'));
    }
}
