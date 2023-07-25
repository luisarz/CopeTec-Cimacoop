@extends('base.base')

@section('title')
    Administracion de tipos de Cuentas
@endsection

@section('content')
    <div class="card shadow-lg">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="card-toolbar">
                <a href="/tipoCuenta/add" class="btn btn-info"><i class="fa-solid fa-plus"></i> Agregar tipo Cuenta</a>

            </div>
            <div class="ribbon-label fs-3">
                <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;
                Administración | {{ Session::get('name_module') }}

                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>
        <div class="card-body">
            <table class="data-table-coop table table-hover table-row-dashed fs-6     gy-2 gs-5">
                <thead>
                    <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                        <th class="min-w-150px">Acciones</th>
                        <th class="min-w-350px">Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipoCuentas as $tipoCuenta)
                        <tr>
                            <td>
                                <a href="javascript:void(0);" onclick="alertDelete({{ $tipoCuenta->id_tipo_cuenta }})"
                                    class=" btn btn-sm btn-danger"><i class="fa-solid fa-trash text-white"></i> &nbsp;
                                    Eliminar</a>
                                <a href="/tipoCuenta/{{ $tipoCuenta->id_tipo_cuenta }}" class="btn btn-sm btn-primary"><i
                                        class="fa-solid fa-pencil text-white"></i> &nbsp; Modificar</a>
                                <a href="/intereses/{{ $tipoCuenta->id_tipo_cuenta }}" class="btn btn-sm  btn-success"><i
                                        class="fa-solid fa-bank text-white"></i>&nbsp;Intereses</a>

                            </td>

                            <td>{{ $tipoCuenta->descripcion_cuenta }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">

            {{ $tipoCuentas->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>



    <form method="post" id="deleteForm" action="/tipoCuenta/delete">
        {!! csrf_field() !!}
        {{ method_field('DELETE') }}
        <input type="hidden" name="id" id="id">
    </form>
@endsection

@section('scripts')
    {{-- <link href="{{asset(' assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/> --}}
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
