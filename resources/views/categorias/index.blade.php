@extends("layouts.plantilla")

@section('content')

@can('categorias.create')
<a href="{{route('categorias.create')}}" class="btn btn-success mb-4">CREAR</a>
@endcan

<div class="card">
 <div class="card-body">
<table class="table table-striped" id="Table">
    <thead>
      <tr>
        <th scope="col">NOMBRE</th>
          <th scope="col">DESCRIPCION</th>
          <th scope="col">BOTONES</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categoria as $category)
        <tr>
          <td>{{$category->nombre}}</td>
          <td>{{$category->descripcion}}</td>
          <td>
            <div class="row">
                @can('categorias.destroy')
                    <input type="hidden" value="{{$category->id}}">
                    <span class="btn btn-danger btn-sm eliminar">Eliminar</span>
                @endcan
                @can('categorias.edit')
                <a href="{{ route('categorias.edit',$category->id)}}" class="btn btn-primary btn-sm mr-3">editar</a>
                <input type="hidden" value="{{$category->id}}">
                @endcan
            </div>
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
                  url: "{{ route('categorias.destroy', ':id') }}".replace(':id', id),
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