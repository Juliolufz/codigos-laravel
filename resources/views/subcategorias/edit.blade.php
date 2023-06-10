@extends('layouts.plantilla')

@section('title')
    <h1>Editar Subcategorias</h1>
@endsection

@section('content')

<form action="{{route('subcategorias.update',$subcategorias->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3 mt-3">
      <label for="" class="form-label">NOMBRE</label>
      <input type="text" class="form-control" id="nombre" name="nombre" required  value="{{$subcategorias->nombre}}">
    </div>

    <div class="mt-3">
        <label for="" class="form-label" >DESCRIPCION</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" required value="{{$subcategorias->precio}}">
    </div>

    <div class="mb-3 mt-3">
        <label for="" class="form-label">CATEGORIA</label>
        <select class="form-control" id="categoria" name="categoria" required>
          <option value="" disabled selected>Selecciona una categoría</option>
        @foreach ($categorias as $categoria)
            <option value="{{$categoria->id}}" required>{{$categoria->nombre}}</option>
        @endforeach
        </select>
    </div>

    <div class="mt-5">
        <button type="submit" class="btn btn-success mr -4 ">GUARDAR</button>
        <a href="{{route('subcategorias.index')}}" class="btn btn-danger">CANCELAR</a>
    </div>

  </form>

@endsection