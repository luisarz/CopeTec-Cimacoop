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
                <a href="/contabilidad/cierre-mensual/cierre" class="btn btn-danger me-5 btn-sm">
                    <i class="ki-outline ki-abstract-27 fs-2x"></i>
                    Nuevo Cierre
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
                            <th class="min-w-250px">Acciones</th>
                            <th class="min-w-50px text-center">Estado</th>
                            <th class="min-w-100px">Mes</th>
                            <th class="min-w-100px">Año</th>
                            <th class="min-w-100px">Fecha de Cierre</th>
                            <th class="min-w-100px">Fecha Reversion</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cierres as $cuenta)
                            <tr>
                                <td>
                                    @if ($cuenta->estado == 1)
                                        <a href="javascript:alertDelete({{ $cuenta->id }})"
                                            class="btn btn-danger btn-sm w-30">
                                            <i class="ki-outline ki-trash fs-4"></i>
                                            Revertir
                                        </a>

                                        <a href="/contabilidad/cierre-mensual/imprimir/{{ $cuenta->id }}" target="_blank"
                                            class="btn btn-info btn-sm w-30"><i class="ki-outline ki-pencil fs-4"></i>
                                            Imprimir</a>
                                    @else
                                        <a href="javascript:showMessageRevertido({{ $cuenta->id }})"
                                            class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger btn-sm w-30">
                                            <i class="ki-outline ki-trash fs-4"></i>
                                            Revertir
                                        </a>

                                        <a href="/contabilidad/cierre-mensual/imprimir/{{ $cuenta->id }}" target="_blank"
                                            class="btn btn-info btn-sm w-30"><i class="ki-outline ki-pencil fs-4"></i>
                                            Imprimir</a>
                                    @endif
                                </td>
                                <td style="text-align: center">
                                    @if ($cuenta->estado == 1)
                                        <span class="badge badge-light-success fs-5">Cerrado</span>
                                    @else
                                        <span class="badge badge-light-danger">Revertido</span>
                                    @endif
                                </td>
                                <td>
                                    @foreach ($meses as $numero_mes => $nombre_mes)
                                        @if ($numero_mes == $cuenta->mes)
                                            {{ $nombre_mes }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $cuenta->year }}</td>
                                <td>{{ date('m-d-Y h:m:s A', strtotime($cuenta->fecha_cierre)) }}</td>
                                <td>{{ $cuenta->fecha_reversion != null ? date('m-d-Y h:m:s A', strtotime($cuenta->fecha_reversion)) : '' }}
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-danger">No se encontraron Cierres.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $cierres->appends(['filtro' => $filtro])->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>

    <form method="post" id="deleteForm" action="/contabilidad/cierre-mensual/revertir">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" id="id">
        <input type="hidden" name="password_user" id="password_user">

    </form>
@endsection

@section('scripts')
    <script>
        function alertDelete(id) {

            Swal.fire({
                title: "Revertir Cierre mensual",
                html: `
                    <div>
                        <p>Deseas eliminar este registro. Por favor, ingresa tu contraseña para confirmar:</p>
                        <input type="password" id="password_validate" class="swal2-input" placeholder="Contraseña">
                    </div>
                `,
                icon: "question",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Revertir Cierrre",
                cancelButtonText: "Cancelar",
                customClass: {
                    confirmButton: "btn btn-danger",
                    cancelButton: "btn btn-secondary"
                },
                preConfirm: () => {
                    const password = document.getElementById('password_validate').value;
                    if (!password) {
                        Swal.showValidationMessage('Por favor, ingresa tu contraseña');
                    }
                    return password;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    let password = result.value;
                    $("#id").val(id)
                    $("#password_user").val(password)
                    $("#deleteForm").submit();
                }
            });

        }

        function showMessageRevertido() {
            Swal.fire({
                title: "Cierre mensual",
                html: `
                        <div>
                            <p>El cierre mensual ya ha sido revertido.</p>
                        </div>
                    `,
                icon: "error",
                buttonsStyling: false,
                showCancelButton: false,
                showConfirmButton: true,
                confirmButtonText: "Volver",
                customClass: {
                    confirmButton: "btn btn-info"
                }
            });

        }
    </script>
@endsection
