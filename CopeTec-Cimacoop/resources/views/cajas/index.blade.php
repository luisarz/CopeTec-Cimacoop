@extends('base.base')
@section('title')
@endsection
@section('formName')
    Administracion de Usuarios
@endsection
@section('content')
    <div class="card shadow-lg mt-3">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="card-toolbar">
                <a href="/cajas/add" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Agregar Caja</a>

            </div>
            <div class="ribbon-label fs-3">
                <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;
                Administración | {{ Session::get('name_module') }}

                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-row-dashed fs-6     gy-2 gs-5">
                <thead>
                    <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                        <th>Acciones</th>
                        <th># Caja</th>
                        <th>Saldo Disponible</th>
                        <th>Cajero Asignado</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cajas as $caja)
                        <tr>
                            <td>
                                {{-- Caja Aperturada --}}
                                @if ($caja->estado_caja == 1)
                                    <a href="javascript:void(0);" onclick="alertCajaAperturada()"
                                        class="btn btn-sm btn-danger"><i class="fa-solid fa-trash text-white"></i></a>
                                    <a href="javascript:void(0);" onclick="alertCajaAperturada()"
                                        class="btn btn-sm btn-warning"><i class="fa-solid fa-pencil text-white"></i></a>

                                    <a href="javascript:void(0);" onclick="alertCajaAperturada()"
                                        class="btn btn-sm btn-info"><i class="ki-outline ki-rocket"></i>
                                        Correlativos</a>
                                @else
                                    <a href="javascript:void(0);" onclick="alertDelete({{ $caja->id_caja }})"
                                        class="btn btn-sm btn-danger"><i class="fa-solid fa-trash text-white"></i></a>

                                    <a href="/cajas/edit/{{ $caja->id_caja }}" class="btn btn-sm btn-info"><i
                                            class="fa-solid fa-pencil text-white"></i></a>

                                    <a href="/correlativos/caja/{{ $caja->id_caja }}/list" class="btn btn-sm btn-info"><i
                                            class="ki-outline ki-rocket"></i>Correlativos</a>
                                @endif
                            </td>

                            <td>{{ $caja->numero_caja }}</td>
                            <td>
                                @if ($caja->estado_caja == 1)
                                    <span
                                        class="badge badge-success  text-white fs-6">${{ number_format($caja->saldo, 2, '.', ',') }}</span>
                                @else
                                    <span class="badge badge-danger  text-white fs-6">$ 0.00</span>
                                @endif
                            </td>
                            <td>{{ $caja->nombre_empleado }}</td>
                            <td>
                                @if ($caja->estado_caja == 1)
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
    </div>
    <form method="post" id="deleteForm" action="/cajas/delete">
        {!! csrf_field() !!}
        {{ method_field('DELETE') }}
        <input type="hidden" name="id_caja" id="id_caja">
    </form>
@endsection

@section('scripts')
    <link href="asset('assets/plugins/global/plugins.bundle.css')" rel="stylesheet" type="text/css" />
    <script src="asset('assets/plugins/global/plugins.bundle.js')"></script>
    <script>
        function alertDelete(id_caja) {
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
                } else if (result.isDenied) {}
            });
        }

        function alertCajaAperturada() {
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
