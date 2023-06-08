@extends('base.base')

@section("title")
Administracion de Clientes
@endsection

@section('content')

<a href="/clientes/add" class="btn btn-success"><i class="fa-solid fa-plus"></i> Agregar Cliente</a>

<div class="table-responsive">
    <table class="table table-hover table-row-dashed fs-6 gy-5 my-0 dataTable  gy-4 gs-7">
        <thead class="thead-dark">
            <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <th class="min-w-140px">Acciones</th>
                <th class="min-w-200px">Nombre</th>
                <th class="min-w-90px">Genero</th>
                <th class="min-w-90px">DUI</th>
                <th class="min-w-200px">Domicilio</th>
                <th class="min-w-200px">Telefono</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td><a href="javascript:void(0);" onclick="alertDelete({{$cliente->id_cliente}})" class="badge badge-danger"><i class="fa-solid fa-trash text-white"></i> &nbsp; Eliminar</a>  <a href="/clientes/{{$cliente->id_cliente}}" class="badge badge-primary"><i class="fa-solid fa-pencil text-white"></i> &nbsp; Modificar</a></td>
                <td>{{$cliente->nombre}}</td>
                <td>{{$cliente->genero=='1'?'Masculino':'Femenino'}}</td>
                <td>{{$cliente->dui_cliente}}</td>
                <td>{{$cliente->direccion_personal}}</td>
                <td>{{$cliente->telefono}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    {{ $clientes->links('vendor.pagination.bootstrap-5') }} 

<form method="post" id="deleteForm" action="/clientes/delete">
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