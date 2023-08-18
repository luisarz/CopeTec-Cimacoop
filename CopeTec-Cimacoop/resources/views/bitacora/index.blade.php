@extends('base.base')

@section('formName')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

@section('content')
    <div class="card shadow-lg mt-3">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="card-toolbar">


                <div class="d-flex align-items-center border-active-dark">
                    <form action="/bitacora" method="post" autocomplete="off" class="d-flex align-items-center">
                        @csrf
                        @method('POST')
                        <div class="position-relative w-md-250px me-md-2">
                            <i
                                class="ki-outline ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6"></i>
                            <input type="date" class="form-control form-control-solid ps-10" name="desde"
                                value="{{ date('Y-m-d') }}" placeholder="Nombre accion o código">
                        </div>
                          <div class="position-relative w-md-250px me-md-2">
                            <i
                                class="ki-outline ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6"></i>
                            <input type="date" class="form-control form-control-solid ps-10" name="hasta"
                                value="{{ date('Y-m-d') }}" placeholder="Nombre accion o código">
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-info me-5">Buscar</button>

                        </div>
                    </form>

                </div>
                <a href="/contabilidad/catalogo/add" class="btn btn-danger me-5 btn-sm">
                    <i class="ki-outline ki-abstract-27 fs-2x"></i>
                   Descargar Reporte
                </a>
              
            </div>

            <div class="ribbon-label fs-3">
                <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;
                | {{ Session::get('name_module') }}
                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-row-dashed fs-6 gy-2 gs-5">
                    <thead>
                        <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="min-w-50px text-center">#</th>
                            <th class="min-w-50px text-center">fecha</th>
                            <th class="min-w-80px">Usuario</th>
                            <th class="min-w-50px">Ruta</th>
                            <th class="min-w-150px">Metodo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bitacora as $accion)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $accion->fecha }}</td>
                                <td>{{ $accion->nombre }}</td>


                                <td>{{ $accion->route }}</td>
                                <td style="text-align: left;">
                                    @if (is_string($accion->request))
                                        @php
                                            $decodedData = json_decode($accion->request, true);
                                        @endphp
                                        @if ($decodedData !== null && json_last_error() === JSON_ERROR_NONE)
                                              @if (array_key_exists('_token', $decodedData))
                                                <pre>
                                                    {{ print_r($decodedData, true) }}
                                                </pre>
                                            @else
                                               Consulta
                                            @endif

                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $bitacora->appends(['desde' => $desde,'hasta'=>$hasta])->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>

    <form method="post" id="deleteForm" action="/contabilidad/catalogo/delete">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" id="id">
    </form>
@endsection

@section('scripts')
    <script>
        function alertDelete(id) {
            Swal.fire({
                text: "Deseas Eliminar este registro",
                icon: "warning",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Si",
                cancelButtonText: 'No',
                customClass: {
                    confirmButton: "btn btn-danger",
                    cancelButton: "btn btn-secondary"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#id").val(id)
                    $("#deleteForm").submit();
                }
            });
        }

        function historicoaccion(id) {
            Swal.fire({
                text: "Ingresa las fechas para ver el histórico de la accion",
                icon: "question",
                buttonsStyling: false,
                showCancelButton: true,
                allowOutsideClick: false,
                confirmButtonText: "Generar Historial",
                html: `
                    <div class="form-group mb-2">
                        <label for="fecha_inicio">Desde</label>
                        <input class="form-control" type="date" id="fecha_inicio" name="fecha_inicio" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="fecha_fin">Hasta</label>
                        <input class="form-control" type="date" id="fecha_fin" name="fecha_fin" value="{{ date('Y-m-d') }}" required>
                    </div>
                    `,
                customClass: {
                    confirmButton: "btn btn-danger",
                    cancelButton: "btn btn-secondary"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    let desde = $("#fecha_inicio").val();
                    let hasta = $("#fecha_fin").val();
                    if (desde && hasta) {
                        // Aquí puedes realizar la acción de generación de historial
                        alert("Generando historial desde " + desde + " hasta " + hasta);
                    } else {
                        Swal.fire({
                            text: "Por favor, selecciona ambas fechas para generar el historial.",
                            icon: "error",
                            buttonsStyling: false,
                            customClass: {
                                confirmButton: "btn btn-danger"
                            }
                        });
                    }
                }
            });


        }
    </script>
@endsection
