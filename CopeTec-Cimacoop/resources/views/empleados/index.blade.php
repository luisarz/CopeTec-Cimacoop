@extends('base.base')

@section("title")
Administracion de Empleados
@endsection

@section('content')

<a href="/empleados/add" class="btn btn-success"><i class="fa-solid fa-plus"></i> Agregar Empleado</a>

<div class="table-responsive">
    <table class="table table-hover table-row-dashed fs-6 gy-5 my-0 dataTable  gy-4 gs-7">
        <thead class="thead-dark">
            <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <th class="min-w-100px">Acciones</th>
                <th class="min-w-200px">Nombre</th>
                <th class="min-w-90px">Genero</th>
                <th class="min-w-90px">DUI</th>
                <th class="min-w-200px">Domicilio</th>
                <th class="min-w-200px">Profesion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
            <tr>
                <td><a href="javascript:void(0);" onclick="alertDelete({{$empleado->id_empleado}})" class="badge badge-danger"><i class="fa-solid fa-trash text-white"></i> &nbsp; Eliminar</a>  <a href="/empleados/{{$empleado->id_empleado}}" class="badge badge-primary"><i class="fa-solid fa-pencil text-white"></i> &nbsp; Modificar</a></td>
                <td>{{$empleado->nombre_empleado}}</td>
                <td>{{$empleado->genero_empleado}}</td>
                <td>{{$empleado->dui}}</td>
                <td>{{$empleado->domicilio_departamento}}</td>
                <td>{{$empleado->profesion}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    {{ $empleados->links('vendor.pagination.bootstrap-5') }} 

<form method="post" id="deleteForm" action="/empleados/delete">
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