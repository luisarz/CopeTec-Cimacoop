@extends('base.base')

@section('formName')
    <i class="ki-duotone ki-profile-user text-success fs-2x"><span class="path1"></span><span class="path2"></span><span
            class="path3"></span></i>

    Administracion de Asociados
@endsection

@section('content')
    <div class="card shadow-lg">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="card-toolbar">
                <a href="/asociados/add" class="btn btn-info"><i class="fa-solid fa-plus"></i> Nuevo Asociado</a>

            </div>
            <div class="ribbon-label fs-3">
                <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;
                Administración | {{ Session::get('name_module') }}

                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>
        <div class="card-body">
            <table class="data-table-coop table table-hover table-row-dashed fs-5     gy-2 gs-5">
                <thead>
                    <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                        <th>Acciones</th>
                        <th>Asociado</th>
                        <th>Estado</th>
                        <th>Telefo</th>
                        <th>DUI</th>
                        <th>Aportacion</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($asociados as $asociado)
                        <tr>
                            <td>
                                <a href="javascript:void(0);" onclick="alertDelete({{ $asociado->id_asociado }})"
                                    class="btn w-10 btn-danger btn-sm ">
                                    <i class="fa-solid fa-trash text-white"></i>
                                </a>
                                <a href="/asociados/{{ $asociado->id_asociado }}" class="btn w-10 btn-info btn-sm">
                                    <i class="fa-solid fa-pencil text-white"></i>
                                </a>

                                @if ($asociado->estado_solicitud != '3')
                                    <a href="/beneficiarios/{{ $asociado->id_asociado }}"
                                        class="btn w-10 btn-success btn-sm fs-8">
                                        <i class="fa-solid fa-user-plus text-white"></i>
                                        &nbsp; Beneficiarios
                                    </a>
                                @else
                                    <a class="btn btn-success w-10 btn-sm"
                                        style="pointer-events: none; text-decoration: line-through "><i
                                            class="fa-solid fa-user-plus text-white"></i> &nbsp; Beneficiarios
                                    </a>
                                @endif

                            </td>
                            <td>
                                <span class="badge badge-info fs-5">{{ str_pad($asociado->numero_asociado ,10,'0',STR_PAD_LEFT)}}</span>
                                {{strtoupper( $asociado->nombre) }}
                            </td>
                            <td>
                                @if ($asociado->estado_solicitud == '1')
                                    <span class="badge badge-warning">Presentada</span>
                                @elseif($asociado->estado_solicitud == '2')
                                    <span class="badge badge-success">Aceptado</span>
                                @else
                                    <span class="badge badge-danger">Rechazado</span>
                                @endif
                            </td>
                            <td>{{ $asociado->telefono }}</td>
                            <td>{{ $asociado->dui_cliente }}</td>
                            <td>$ {{ $asociado->monto_aportacion }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">

            {{ $asociados->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>

    <form method="post" id="deleteForm" action="/asociados/delete">
        {!! csrf_field() !!}
        {{ method_field('DELETE') }}
        <input type="hidden" name="id" id="id">
    </form>
@endsection

@section('scripts')
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
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
