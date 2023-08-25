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
                    <form action="/contabilidad/catalogo" method="post" autocomplete="off" class="d-flex align-items-center">
                        @csrf
                        @method('POST')
                        <div class="position-relative w-md-350px me-md-2">
                            <i
                                class="ki-outline ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6"></i>
                            <input type="text" class="form-control form-control-solid ps-10" name="filtro"
                                value="{{ old('filtro') }}" placeholder="Nombre Cuenta o código">
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-info me-5">Buscar</button>

                        </div>
                    </form>

                </div>
                <a href="/contabilidad/catalogo/add" class="btn btn-success me-5 btn-sm">
                    <i class="ki-outline ki-abstract-27 fs-2x"></i>
                    Nueva Cuenta
                </a>
                {{-- <a href="/contabilidad/catalogo/reporte" class="btn btn-info me-5" target="_blank">
                    <i class="ki-outline ki-cheque fs-2"></i>
                    Reporte Catalogo
                </a> --}}
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
                            <th class="min-w-250px">Acciones</th>
                            <th class="min-w-50px">CODIGO</th>
                            <th class="min-w-50px">AGRUPADOR</th>
                            <th class="min-w-100px">TIPO CUENTA</th>
                            <th class="min-w-80px">NOMBRE CUENTA</th>
                            <th class="min-w-50px text-center">MOVIMIENTO</th>
                            <th class="min-w-50px text-center">IVA</th>
                            <th class="min-w-50px text-center">ESTADO</th>
                            <th class="min-w-100px text-center">SALDO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cuentas as $cuenta)
                            <tr>
                                <td>
                                    <a href="/contabilidad/catalogo/edit/{{ $cuenta->id_cuenta }}"
                                        class="btn btn-info btn-sm w-30"><i class="ki-outline ki-pencil fs-4"></i></a>

                                    <a href="javascript:historicoCuenta({{ $cuenta->id_cuenta }})"
                                        class="btn btn-success btn-sm w-30"><i
                                            class="ki-outline ki-security-user fs-4"></i></a>

                                    <a href="javascript:alertDelete({{ $cuenta->id_cuenta }})"
                                        class="btn btn-danger btn-sm w-30"><i
                                            class="ki-outline ki-cross-circle fs-4"></i></a>
                                </td>
                                <td>{{ $cuenta->numero }}</td>
                                <td>{{ $cuenta->codigo_agrupador }}</td>

                                <td>{{ $cuenta->catalogo }}</td>
                                <td>{{ $cuenta->descripcion }}</td>
                                <td style="text-align: center">
                                    <span class="badge badge-light-{{ $cuenta->movimiento ? 'danger' : 'info' }} fs-5">
                                        {{ $cuenta->movimiento ? 'Si' : 'No' }}
                                    </span>
                                </td>
                                <td style="text-align: center">
                                    <span class="badge badge-light-{{ $cuenta->iva ? 'danger' : 'success' }} fs-5">
                                        {{ $cuenta->iva ? 'Si' : 'No' }}
                                    </span>
                                </td>
                                <td style="text-align: center">
                                    <span class="badge badge-light-{{ $cuenta->estado ? 'success' : 'danger' }} fs-5">
                                        {{ $cuenta->estado ? 'Activa' : 'Inactiva' }}
                                    </span>
                                </td>
                                <td>$ {{ number_format($cuenta->saldo, 2) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No se encontraron cuentas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $cuentas->appends(['filtro' => $filtro])->links('vendor.pagination.bootstrap-5') }}
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

        function historicoCuenta(id) {
            Swal.fire({
                text: "Ingresa las fechas para ver el histórico de la cuenta",
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
