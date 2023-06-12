@extends("layouts.plantilla")

@section('content')

@can('productos.create')
<a href="{{route('productos.create')}}" class="btn btn-success mb-4">CREAR</a>
@endcan

<div class="card">
 <div class="card-body">
<table class="table table-striped" id="Table">
    <thead>
      <tr>
        <th scope="col">NOMBRE</th>
          <th scope="col">CANTIDAD</th>
          <th scope="col">PRECIO</th>
          <th scope="col">CATEGORIA</th>
          <th scope="col">SUBCATEGORIA</th>
          <th scope="col">BOTONES</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
        <tr>
          <td>{{$producto->nombre}}</td>
          <td>{{$producto->cantidad}}</td>
          <td>{{$producto->precio}}</td>
          <td>{{$producto->cnombre}}</td>
          <td>{{$producto->subnombre}}</td>
          <td>
            @can('productos.edit')
            <a href="{{ route('productos.edit',$producto->id)}}" class="btn btn-primary btn-sm mr-3">editar</a>
            <input type="hidden" value="{{$producto->id}}">
            @endcan
            @can('productos.destroy')
            <span class="btn btn-danger btn-sm eliminar">eliminar</span>
            @endcan
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
</div>

  @endsection
  @section('jst')
  <script>

    $('.eliminar').click(function() {

      tabla = $('#Table').DataTable();
      fila = $(this);


      Swal.fire({
        title: 'Estas seguro de hacer eso?',
        text: "Recuerda esta Accion no se puede recuperar le cobro 50 millones de pesos",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrar!'
      }).then((result) => {
          if (result.isConfirmed) {

            let id = $(this).closest('td').find('input[type=hidden]').val();


            $.ajax({
                  type: 'DELETE',
                  url: "{{ route('productos.destroy', ':id') }}".replace(':id', id),
                  data: {
                      _token: '{{ csrf_token() }}'
                  },
                  success: function(respuesta) {
                      Swal.fire(
                          'Éxito',
                          'Cambios efectuados correctamente',
                          'success'
                      )
                      tabla.row(fila.parents('tr')).remove().draw();

                  },
                  error: function(respuesta) {
                      Swal.fire(
                          'Error',
                          'Error desconocido',
                          'error'
                      )
                  }
              });
          }
      })
    });
</script>

<script>
    $(document).ready(function () {
     $('#Table').DataTable();
    });

</script>

@stop
