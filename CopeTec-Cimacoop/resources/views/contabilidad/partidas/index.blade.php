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
    <div class="card shadow-lg">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="card-toolbar">
                <a href="/contabilidad/partidas/add" class="btn btn-info">
                    <i class="ki-outline ki-add-item fs-2x"></i>
                    Nueva Partida
                </a>


                <div class="d-flex align-items-center border-active-dark ">
                    <form action="/partidas/catalogo" method="post" autocomplete="off" class="d-flex align-items-center">
                        {!! csrf_field() !!}
                        {{ method_field('POST') }}
                        <!--end::Input group-->
                        <div class="position-relative w-md-350px me-md-2">
                            <i
                                class="ki-outline ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6">
                            </i>
                            <input type="text" class="form-control form-control-solid ps-10" name="filtro"
                                value="" placeholder="Nombre Cuenta o código">
                        </div>
                        <!--begin:Action-->
                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-info me-5">Buscar</button>
                        </div>
                        <!--end:Action-->
                    </form>
                </div>
            </div>

            <div class="ribbon-label fs-3">
                <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;
                Administración | {{ Session::get('name_module') }}

                <span class="ribbon-inner bg-info"></span>
            </div>


        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-row-dashed fs-5     gy-2 gs-5">
                    <thead>
                        <tr class="fw-semibold fs-5 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="min-w-250px">Acciones</th>
                            <th class="min-w-50px">Número</th>
                            <th class="min-w-100px">TIPO PARTIDA</th>
                            <th class="min-w-80px">FECHA</th>
                            <th class="min-w-50px text-center">CONCETO</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cuentas as $cuenta)
                            <tr>
                                <td>
                                    <a href="/contabilidad/catalogo/edit/{{ $cuenta->id_cuenta }}"
                                        class="btn btn-info btn-sm w-30">
                                        <i class="ki-outline ki-pencil fs-4"></i> </a>

                                    <a href="/contabilidad/catalogo/{{ $cuenta->id_cuenta }}/beneficiarios"
                                        class="btn btn-success btn-sm w-30">
                                        <i class="ki-outline ki-security-user   fs-4"></i>
                                    </a>

                                    <a href="javascript:alertDelete({{ $cuenta->id_cuenta }})"
                                        class="btn btn-danger btn-sm w-30">
                                        <i class="ki-outline ki-cross-circle   fs-4"></i>
                                    </a>

                                </td>
                                <td>{{ $cuenta->numero }}</td>
                                <td>{{ $cuenta->catalogo }}</td>
                                <td>{{ $cuenta->descripcion }}</td>
                                <td style="text-align: center">
                                    @if ($cuenta->movimiento == 1)
                                        <span class="badge badge-light-danger fs-5">Si</span>
                                    @else
                                        <span class="badge badge-light-info fs-5">No</span>
                                    @endif
                                </td>
                                <td style="text-align: center">
                                    @if ($cuenta->iva == 1)
                                        <span class="badge badge-light-danger fs-5">Si</span>
                                    @else
                                        <span class="badge badge-light-success fs-5">No</span>
                                    @endif
                                </td>

                                <td style="text-align: center">

                                    @if ($cuenta->estado == 1)
                                        <span class="badge badge-light-success fs-5">Activa</span>
                                    @else
                                        <span class="badge badge-light-danger fs-5">Inactiva</span>
                                    @endif
                                </td>
                                <td>$ {{ number_format($cuenta->saldo, 2) }}</td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $cuentas->appends(['filtro' => $filtro])->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>

    <form method="post" id="deleteForm" action="/contabilidad/partidas/delete">
        {!! csrf_field() !!}
        {{ method_field('DELETE') }}
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
                    confirmButton: "btn btn-warning",
                    cancelButton: "btn btn-secondary"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#id").val(id)
                    $("#deleteForm").submit();
                }
            });
        }
    </script>
@endsection
