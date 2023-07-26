@extends('base.base')

@section('title')
    Administracion de Empleados
@endsection

@section('content')
    <div class="card shadow-lg">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="card-toolbar">
                <a href="/empleados/add" class="btn btn-info"><i class="fa-solid fa-plus"></i> Agregar Nuevo empleado</a>

            </div>
            <div class="ribbon-label fs-3">
               <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;
                Administración | {{ Session::get('name_module') }}

                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>
        <div class="card-body">
           <div class="table-responsive">
             <table class="data-table-coop table table-hover table-row-dashed fs-6     gy-2 gs-5">
                <thead>
                    <tr class="fw-semibold fs-2 text-gray-800 border-bottom-2 border-gray-200">
                        <th class="min-w-150px">Acciones</th>
                        <th class="min-w-200px">Nombre</th>
                        <th class="min-w-90px">Genero</th>
                        <th class="min-w-90px">DUI</th>
                        <th class="min-w-200px">Domicilio</th>
                        <th class="min-w-200px">Profesion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empleados as $empleado)
                        <tr>
                            <td><a href="javascript:void(0);" onclick="alertDelete({{ $empleado->id_empleado }})"
                                    class="btn btn-sm btn-danger"><i class="fa-solid fa-trash text-white"></i> &nbsp;
                                    Eliminar</a> <a href="/empleados/{{ $empleado->id_empleado }}"
                                    class="btn btn-sm btn-primary"><i class="fa-solid fa-pencil text-white"></i> &nbsp;
                                    Modificar</a></td>
                            <td>{{ $empleado->nombre_empleado }}</td>
                            <td>{{ $empleado->genero_empleado }}</td>
                            <td>{{ $empleado->dui }}</td>
                            <td>{{ $empleado->domicilio_departamento }}</td>
                            <td>{{ $empleado->profesion }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
           </div>
        </div>
        <div class="card-footer">

            {{ $empleados->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>

    <form method="post" id="deleteForm" action="/empleados/delete">
        {!! csrf_field() !!}
        {{ method_field('DELETE') }}
        <input type="hidden" name="id" id="id">
    </form>
@endsection

@section('scripts')
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script>
        function alertDelete(id) {
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
                } else if (result.isDenied) {}
            });
        }
    </script>
@endsection
