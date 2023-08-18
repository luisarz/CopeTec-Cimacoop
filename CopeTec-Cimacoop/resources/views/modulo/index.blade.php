@extends('base.base')
@section('content')
    <div class="card shadow-sm">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="card-toolbar">
                <a href="/modulo/add" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Agregar Modulo</a>
            </div>
            <div class="ribbon-label fs-3">
                 <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;
                Administración | {{ Session::get('name_module') }}
                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>
        <div class="card-body">
            <table class="data-table-coop table table-hover table-row-dashed fs-6     gy-2 gs-5">
                <thead class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                    <tr>
                        <th>Acciones</th>
                        <th>Modulo</th>
                        <th>Icono</th>
                        <th>Minizado</th>
                        <th>Target</th>
                        <th>Ruta</th>
                        <th>Es Padre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($modulos as $modulo)
                        <tr>
                            <td><a href="javascript:void(0);" onclick="alertDelete({{ $modulo->id_modulo }})"
                                    class="badge badge-danger"><i class="fa-solid fa-trash text-white"></i> &nbsp;
                                    Eliminar</a> <a href="/modulo/{{ $modulo->id_modulo }}" class="badge badge-primary"><i
                                        class="fa-solid fa-pencil text-white"></i> &nbsp;
                                    Modificar</a></td>
                            <td>{{ $modulo->nombre }}</td>
                            <td style="text-align: center">
                                <i class="ki-outline {{ $modulo->icono }} fs-2"></i>


                            </td>
                              <td style="text-align: center">
                                {{ $modulo->is_minimazed == 1 ? 'Si' : 'No' }}</td>
                            <td style="text-align: center">
                                {{ $modulo->target == 1 ? 'Nueva' : 'Misma' }}</td>
                            <td>{{ $modulo->ruta }}</td>
                            <td>{{ $modulo->is_padre == true ? 'Si' : 'No' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <form method="post" id="deleteForm" action="/modulo/delete">
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
