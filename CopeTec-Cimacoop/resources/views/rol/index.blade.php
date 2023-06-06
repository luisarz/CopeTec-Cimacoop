@extends('base.base')

@section("title")
Administracion de Roles
@endsection

@section('content')

<a href="/rol/add" class="btn btn-success"><i class="fa-solid fa-plus"></i> Agregar Roles</a>

<div class="table-responsive">
    <table class="table table-striped gy-7 gs-7">
        <thead>
            <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <th class="min-w-200px">Nombre</th>
                <th class="min-w-100px"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $rol)
            <tr>
                <td>{{$rol->name}}</td>
                <td><a href="javascript:void(0);" onclick="alertDelete({{$rol->id}})" class="badge badge-danger"><i class="fa-solid fa-trash text-white"></i> &nbsp; Eliminar</a>  <a href="/rol/{{$rol->id}}" class="badge badge-primary"><i class="fa-solid fa-pencil text-white"></i> &nbsp; Modificar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<form method="post" id="deleteForm" action="/rol/delete">
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
            icon: "warning",
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