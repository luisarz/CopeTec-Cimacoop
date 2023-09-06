@extends('base.base')

@section('formName')
    <i class="ki-duotone ki-profile-user text-success fs-2x"><span class="path1"></span><span class="path2"></span><span
            class="path3"></span></i>

    Administracion de Intereses
@endsection

@section('content')

    <div class="card shadow-lg">
        <div class="card-header ribbon ribbon-end ribbon-clip">


            <div class="card-toolbar">


                <a href="/tipoCuenta" class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
                    <i class="fa fa-arrow-alt-circle-left"></i>
                </a>

                &nbsp;
                <a href="/intereses/add/{{ $id_tipo_cuenta }}" class="btn btn-success"><i class="fa-solid fa-plus"></i>
                    Nueva tasa
                    de interes</a>
            </div>
            <div class="ribbon-label fs-3">
                <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;
                Administración | Tipo de intereses

                <span class="ribbon-inner bg-info"></span>
            </div>

        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table id="table_asociados" class="table table-hover  fs-6 gy-1  dataTable  gy-2 gs-2">
                    <thead>
                        <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="min-w-100px">Acciones</th>
                            <th class="min-w-300px">Cuenta</th>
                            <th class="min-w-100px">Tasa de interes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($interesesAsignados == null)
                            <tr>
                                <td colspan="6" class="text-center">No hay registros</td>
                            </tr>
                        @else
                            @foreach ($interesesAsignados as $interes)
                                <tr>
                                    <td><a href="javascript:void(0);"
                                            onclick="alertDelete({{ $interes->id_intereses_tipo_cuenta }})"
                                            class="btn btn-sm btn-danger"><i class="fa-solid fa-trash text-white"></i>
                                        </a>
                                        <a href="/intereses/edit/{{ $interes->id_intereses_tipo_cuenta }}"
                                            class="btn btn-sm btn-info"><i class="fa-solid fa-pencil text-white"></i>
                                        </a>
                                    </td>
                                    <td>{{ $interes->descripcion_cuenta }}</td>
                                    <td>{{ $interes->interes }}%</td>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <form method="post" id="deleteForm" action="/intereses/delete">
        {!! csrf_field() !!}
        {{ method_field('DELETE') }}
        <input type="hidden" name="id" id="id">
    </form>
@endsection

@section('scripts')
    {{-- <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> --}}
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
