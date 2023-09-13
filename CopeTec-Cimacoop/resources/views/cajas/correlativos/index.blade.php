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
                <a href="/cajas" class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger mx-3"><i class="ki-outline ki-black-left-line"></i> Volver</a>

                <a href="/correlativos/caja/{{ $id_caja }}/add" class="btn btn-primary"><i
                        class="fa-solid fa-plus"></i> Agregar Correlativo</a>

            </div>
            <div class="ribbon-label fs-3">
                <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;
                Administración | Correlativos

                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>
        <div class="card-body">
            <table class=" table table-hover table-row-dashed fs-6     gy-2 gs-5">
                <thead>
                    <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                        <th class="min-w-50">Acciones</th>
                        <th>Caja</th>
                        <th>Resolución</th>
                        <th>Tipo</th>
                        <th>Desde / Hasta</th>
                        <th>Ult.Emitido</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($correlativos as $correlativo)
                        <tr>
                            <td>
                                <a href="/correlativos/caja/edit-correlativo/{{ $correlativo->id_correlativo }}"
                                    class="btn btn-sm btn-info"><i class="fa-solid fa-pencil text-white"></i>Modificar</a>

                            </td>

                            <td>{{ $correlativo->numero_caja }}</td>
                            <td>{{ $correlativo->resolucion }}</td>
                            <td>{{ $correlativo->tipo_documento }}</td>
                            <td>{{ $correlativo->documento_inicial }} / {{ $correlativo->documento_final }}</td>
                            <td>
                                <span class="badge badge-danger fs-3">{{ $correlativo->ultimo_emitido }}</span>
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
                text: "La correlativo esta aperturada no se puede realizar esta accion",
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
