<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\categoria;
use App\Models\subcategoria;


class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::select('c.nombre as cnombre','sub.nombre as subnombre','productos.*')
        ->join('categorias as c','productos.categorias_id','c.id')
        ->join('subcategorias as sub','productos.subcategorias_id','sub.id')
        ->where('productos.estado',1)->get();
        return view(('productos.index'),compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = categoria::where('categorias.estado',1)->get();
        $subcategorias = subcategoria::where('subcategorias.estado',1)->get();
        return view('productos.create',compact('categorias','subcategorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productos = new Producto();
        $productos->nombre = $request->input('nombre');
        $productos->cantidad = $request->input('cantidad');
        $productos->precio = $request->input('precio');
        $productos->categorias_id = $request->input('categoria');
        $productos->subcategorias_id = $request->input('subcategoria');
        $productos->estado = 1;
        $productos->save();

        return redirect(route('productos.index'));
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
        $categorias = categoria::where('categorias.estado',1)->get();
        $subcategorias = subcategoria::where('subcategorias.estado',1)->get();
        $producto = Producto::find($id);
        return view(('productos.edit'),compact('producto','categorias','subcategorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $producto = Producto::find($id);
        $producto->nombre = $request->input('nombre');
        $producto->cantidad = $request->input('cantidad');
        $producto->precio = $request->input('precio');
        $producto->categorias_id = $request->input('categoria');
        $producto->subcategorias_id = $request->input('subcategoria');
        $producto->save();

        return redirect(route('productos.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::find($id);
        $producto->estado = 0;
        $producto->save();
        return $resulta = "ok";
    }
}