@extends('base.base')

@section('formName')
<i class="ki-duotone ki-profile-user text-success fs-2x"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>

Administracion de Asociados
@endsection

@section('content')

<a href="/asociados/add" class="btn btn-success"><i class="fa-solid fa-plus"></i> Agregar Asociado</a>

<div class="table-responsive">
    <table class="table  table-hover table-striped gy-7 gs-7">
        <thead class="thead-dark">
            <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <th class="min-w-100px">Acciones</th>
                <th class="min-w-200px">Asociado</th>
                <th class="min-w-200px">Sueldo</th>
                <th class="min-w-200px">DUI</th>
                <th class="min-w-200px">Domicilio</th>
                <th class="min-w-200px">Telefono</th>
            </tr>
        </thead>
        <tbody>
          
            @foreach($asociados as $asociado)
            <tr>
                <td><a href="javascript:void(0);" onclick="alertDelete({{$asociado->id_asociado}})" class="badge badge-danger"><i class="fa-solid fa-trash text-white"></i> &nbsp; Eliminar</a>  <a href="/asociados/{{$asociado->id_asociado}}" class="badge badge-primary"><i class="fa-solid fa-pencil text-white"></i> &nbsp; Modificar</a></td>
                <td>{{$asociado->nombre}}</td>
                <td>{{$asociado->sueldo_quincenal}}</td>
                <td>{{$asociado->sueldo_mensual}}</td>
                <td>{{$asociado->couta_ingreso}}</td>
                <td>{{$asociado->monto_aportacion}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<form method="post" id="deleteForm" action="/asociados/delete">
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