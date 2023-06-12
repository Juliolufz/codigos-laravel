<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;
use App\Models\subcategoria;

class subcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategorias = subcategoria::select('c.nombre as cnombre','subcategorias.*')
                                       ->join('categorias as  c','subcategorias.categorias_id','c.id')
                                       ->where('subcategorias.estado',1)->get();
        return view('subcategorias.index',compact('subcategorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = categoria::where('estado',1)->get();
        return view('subcategorias.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subcategorias = new subcategoria();
        $subcategorias->nombre = $request->input('nombre');
        $subcategorias->descripcion = $request->input('descripcion');
        $subcategorias->categorias_id = $request->input('categoria');
        $subcategorias->estado = 1;
        $subcategorias->save();

        return redirect(route('subcategorias.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorias = categoria::where('estado',1)->get();
        $subcategoria = subcategoria::find($id);
        return view('subcategorias.edit',compact('subcategoria','categorias'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subcategoria = subcategoria::find($id);
        $subcategoria->nombre = $request->input('nombre');
        $subcategoria->descripcion = $request->input('descripcion');
        $subcategoria->categorias_id = $request->input('categoria');
        $subcategoria->save();

        return redirect(route('subcategorias.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategoria = subcategoria::find($id);
        $subcategoria->estado = 0;
        $subcategoria->save();
        return $resulta = "ok";
    }
}
