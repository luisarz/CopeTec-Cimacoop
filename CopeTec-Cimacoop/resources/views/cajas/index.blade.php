@extends('base.base')
@section("title")
@endsection
@section('formName')
Administracion de Usuarios
@endsection
@section('content')

<a href="/cajas/add" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Agregar Caja</a>

<div class="table-responsive">
    <table class="table table-hover table-row-dashed fs-6 gy-5 my-0 dataTable  gy-4 gs-7">
        <thead>
            <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <th class="min-w-100px">Acciones</th>
                <th class="min-w-200px"># Caja</th>
                <th class="min-w-200px">Cajero Asignado</th>
                <th class="min-w-400px">Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cajas as $caja)
            <tr>
                <td>
                    @if($caja->estado_caja == 1)
                        <a href="javascript:void(0);" onclick="alertCajaAperturada()" class="badge badge-danger"><i class="fa-solid fa-trash text-white"></i> &nbsp; Eliminar</a> 
                        <a href="javascript:void(0);" onclick="alertCajaAperturada()" class="badge badge-primary"><i class="fa-solid fa-pencil text-white"></i> &nbsp; Modificar</a></td>
                    @else
                        <a href="javascript:void(0);" onclick="alertDelete({{$caja->id_caja }})" class="badge badge-danger"><i class="fa-solid fa-trash text-white"></i> &nbsp; Eliminar</a> 
                        <a href="/cajas/{{$caja->id_caja}}" class="badge badge-primary"><i class="fa-solid fa-pencil text-white"></i> &nbsp; Modificar</a></td>
                    @endif
                   
                <td>{{$caja->numero_caja}}</td>
                <td>{{$caja->nombre_empleado }}</td>
                <td>
                    @if($caja->estado_caja == 1)
                    <span class="text-success fs-4">Aperturada</span>
                    @else
                    <span class=" text-danger fs-4">Cerrada</span>
                    @endif
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<form method="post" id="deleteForm" action="/cajas/delete">
    {!! csrf_field() !!}
    {{ method_field('DELETE') }}
    <input type="hidden" name="id_caja" id="id_caja">
</form>
@endsection

@section("scripts")
<link href="asset('assets/plugins/global/plugins.bundle.css')" rel="stylesheet" type="text/css"/>
<script src="asset('assets/plugins/global/plugins.bundle.js')"></script>
<script>
    function alertDelete(id_caja)
    {
        Swal.fire({
            text: "Deseas Eliminar este registro",
            icon: "question",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "Si",
            cancelButtonText: 'No',
            customClass: {
                confirmButton: "btn btn-danger btn-block",
                cancelButton: "btn btn-secondary"
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $("#id_caja").val(id_caja)
                $("#deleteForm").submit();
            } else if (result.isDenied) {
            }
        });
    }

    function alertCajaAperturada(){
        Swal.fire({
            text: "La caja esta aperturada no se puede realizar esta accion",
            icon: "info",
            buttonsStyling: false,
            confirmButtonText: "Salir",
            customClass: {
                confirmButton: "btn btn-primary",
            }
        });
    }
</script>
@endsection