@extends('base.base')
@section("title")
@endsection
@section('formName')
Administracion de Usuarios
@endsection
@section('content')

<a href="/user/add" class="btn btn-success"><i class="fa-solid fa-plus"></i> Agregar Usuario</a>

<div class="table-responsive">
    <table class="table table-striped gy-7 gs-7">
        <thead>
            <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <th class="min-w-200px">Nombre</th>
                <th class="min-w-400px">Email</th>
                <th class="min-w-100px"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><a href="javascript:void(0);" onclick="alertDelete({{$user->id}})" class="badge badge-danger"><i class="fa-solid fa-trash text-white"></i> &nbsp; Eliminar</a>  <a href="/user/{{$user->id}}" class="badge badge-primary"><i class="fa-solid fa-pencil text-white"></i> &nbsp; Modificar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<form method="post" id="deleteForm" action="/user/delete">
    {!! csrf_field() !!}
    {{ method_field('DELETE') }}
    <input type="hidden" name="id" id="userid">
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
                $("#userid").val(id)
                $("#deleteForm").submit();
            } else if (result.isDenied) {
            }
        });
    }
</script>
@endsection