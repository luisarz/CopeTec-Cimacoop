@extends('base.base')

@section("title")
Administracion de Refrencias
@endsection

@section('content')

<a href="/referencias/add" class="btn btn-success"><i class="fa-solid fa-plus"></i> Agregar Referencias</a>

<div class="table-responsive">
    <table class="table  table-hover table-striped gy-7 gs-7">
        <thead class="thead-dark">
            <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <th class="min-w-100px">Acciones</th>
                <th class="min-w-200px">Nombre</th>
                <th class="min-w-200px">Parentesco</th>
                <th class="min-w-200px">Telefono</th>
                <th class="min-w-200px">Direccion</th>
                <th class="min-w-200px">Trabajo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($referencias as $referencia)
            <tr>
                <td><a href="javascript:void(0);" onclick="alertDelete({{$referencia->id_referencia}})" class="badge badge-danger"><i class="fa-solid fa-trash text-white"></i> &nbsp; Eliminar</a>  <a href="/referencias/{{$referencia->id_referencia}}" class="badge badge-primary"><i class="fa-solid fa-pencil text-white"></i> &nbsp; Modificar</a></td>
                <td>{{$referencia->nombre}}</td>
                <td>{{$referencia->parentesco}}</td>
                <td>{{$referencia->telefono}}</td>
                <td>{{$referencia->direccion}}</td>
                <td>{{$referencia->lugar_trabajo}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<form method="post" id="deleteForm" action="/referencias/delete">
    {!! csrf_field() !!}
    {{ method_field('DELETE') }}
    <input type="hidden" name="id" id="id">
</form>
@endsection

@section("scripts")
<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script>
    function alertDelete(id)
    {
        Swal.fire({
            text: "Deseas Eliminar este registro",
            icon: "question",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "Si",
            cancelButtonText: 'No',
            customClass: {
                confirmButton: "btn btn-warning",
                cancelButton: "btn btn-secondary"
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $("#id").val(id)
                $("#deleteForm").submit();
            } else if (result.isDenied) {
            }
        });
    }
</script>
@endsection