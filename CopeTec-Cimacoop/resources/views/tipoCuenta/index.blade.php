@extends('base.base')

@section("title")
Administracion de tipos de Cuentas
@endsection

@section('content')

<a href="/tipoCuenta/add" class="btn btn-success"><i class="fa-solid fa-plus"></i> Agregar Tipo Cuenta</a>

<div class="table-responsive">
    <table class="data-table-coop table table-hover table-row-dashed fs-6 gy-5 my-0 dataTable  gy-4 gs-7">
        <thead class="thead-dark">
            <tr class="fw-semibold fs-0 text-gray-800 border-bottom-2 border-green-700">
                <th class="min-w-50px">Acciones</th>
                <th class="min-w-650px">Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipoCuentas as $tipoCuenta)
            <tr>
                <td>
                    <a href="javascript:void(0);" onclick="alertDelete({{$tipoCuenta->id_tipo_cuenta}})" class="badge badge-danger"><i class="fa-solid fa-trash text-white"></i> &nbsp; Eliminar</a>  
                    <a href="/tipoCuenta/{{$tipoCuenta->id_tipo_cuenta}}" class="badge badge-primary"><i class="fa-solid fa-pencil text-white"></i> &nbsp; Modificar</a>
                    <a href="/intereses/{{$tipoCuenta->id_tipo_cuenta}}" class="badge badge-success"><i class="fa-solid fa-bank text-white"></i>&nbsp;Intereses</a>
                
                </td>

                <td>{{$tipoCuenta->descripcion_cuenta}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


    {{ $tipoCuentas->links('vendor.pagination.bootstrap-5') }} 

<form method="post" id="deleteForm" action="/tipoCuenta/delete">
    {!! csrf_field() !!}
    {{ method_field('DELETE') }}
    <input type="hidden" name="id" id="id">
</form>
@endsection

@section("scripts")
{{-- <link href="{{asset(' assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/> --}}
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