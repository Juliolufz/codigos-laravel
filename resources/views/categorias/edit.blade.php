@extends('layouts.plantilla')


@section('title')
    <h1>Editar Categoria</h1>
@endsection

@section('content')

<form action="{{route('categorias.update',$categoria->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3 mt-3">
      <label for="" class="form-label">NOMBRE</label>
      <input type="text" class="form-control" id="nombre" name="nombre" required  value="{{$categoria->nombre}}">
    </div>
    <div class="mt-3">
      <label for="" class="form-label">DESCRIPCION</label>
      <input type="text" class="form-control" id="descripcion" name="descripcion" required value="{{$categoria->descripcion}}">
    </div>

    <div class="mt-5">
        <button type="submit" class="btn btn-success mr -4 ">GUARDAR</button>
        <a href="{{route('categorias.index')}}" class="btn btn-danger">CANCELAR</a>
    </div>

  </form>

@endsection