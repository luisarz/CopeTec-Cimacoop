@extends('base.base')

@section('formName')
    <i class="ki-duotone ki-profile-user text-success fs-2x"><span class="path1"></span><span class="path2"></span><span
            class="path3"></span></i>

    Administracion de Asociados
@endsection

@section('content')
    <a href="/asociados/add" class="btn btn-success"><i class="fa-solid fa-plus"></i> Solcitud de Asociado</a>

    <div class="table-responsive">
        <table id="table_asociados" class="table table-striped table-row-bordered gy-5 gs-7">
            <thead >
                <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <th class="min-w-150px">Acciones</th>
                    <th class="min-w-200px">Asociado</th>
                    <th class="min-w-100px">Estado</th>
                    <th class="min-w-200px">Telefo</th>
                    <th class="min-w-200px">DUI</th>
                    <th class="min-w-100px">Aportacion</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($asociados as $asociado)
                    <tr>
                        <td><a href="javascript:void(0);" onclick="alertDelete({{ $asociado->id_asociado }})"
                                class="badge badge-danger"><i class="fa-solid fa-trash text-white"></i> &nbsp; Eliminar</a>
                            <a href="/asociados/{{ $asociado->id_asociado }}" class="badge badge-primary"><i
                                    class="fa-solid fa-pencil text-white"></i> &nbsp; Modificar</a>

                            @if ($asociado->estado_solicitud != '3')
                                <a href="/beneficiarios/{{ $asociado->id_asociado }}" class="badge badge-success"><i
                                        class="fa-solid fa-user-plus text-white"></i> &nbsp; Beneficiarios</a>
                            @else
                                <a class="badge badge-success"
                                    style="pointer-events: none; text-decoration: line-through "><i
                                        class="fa-solid fa-user-plus text-white"></i> &nbsp; Beneficiarios</a>
                            @endif

                        </td>
                        <td>{{ $asociado->nombre }}</td>
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
    <form method="post" id="deleteForm" action="/asociados/delete">
        {!! csrf_field() !!}
        {{ method_field('DELETE') }}
        <input type="hidden" name="id" id="id">
    </form>
@endsection

@section('scripts')
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>
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
