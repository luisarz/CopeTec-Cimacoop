@extends('base.base')

@section('formName')
@endsection

@section('content')
    <div class="card shadow-lg mt-3">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="card-toolbar">



            </div>

            <div class="ribbon-label fs-3">
                <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;
                | {{ Session::get('name_module') }}
                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>


        <!--begin::Body-->
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-gray-300 border-end-dashed ">
                    <!--begin::Nav-->
                    <ul class="nav nav-pills d-block text-active-info  justify-content-left nav-pills-custom  mb-6">
                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 ">
                            <!--begin::Nav link-->
                            <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  text-active-danger "
                                href="/contabilidad/reporte/balancegeneral/" target="_blank"
                                style="width: 100%;height: 40px">
                                <!--begin::Icon-->
                                <div class="nav-icon d-flex  ">
                                    <!--begin::report icon-->
                                    <i class="ki-outline ki-search-list fs-2x"></i>
                                    <!--end::report icon-->
                                    <!--begin::Info-->
                                    <span class="fw-bold ">Balance General</span>
                                </div>
                                <!--end::Info-->
                                <!--end::Icon-->

                            </a>
                            <!--end::Nav link-->
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 ">
                            <!--begin::Nav link-->
                            <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  text-active-danger "
                                href="/contabilidad/reporte/balancegeneral/" target="_blank"
                                style="width: 100%;height: 40px">
                                <!--begin::Icon-->
                                <div class="nav-icon d-flex  ">
                                    <!--begin::report icon-->
                                    <i class="ki-outline ki-search-list fs-2x"></i>
                                    <!--end::report icon-->
                                    <!--begin::Info-->
                                    <span class="fw-bold ">Estado de Resultado</span>
                                    <!--end::Info-->
                                </div>
                                <!--end::Icon-->

                            </a>
                            <!--end::Nav link-->
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 ">
                            <!--begin::Nav link-->
                            <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  text-active-danger "
                                href="/contabilidad/reporte/balancegeneral/" target="_blank"
                                style="width: 100%;height: 40px">
                                <!--begin::Icon-->
                                <div class="nav-icon d-flex  ">
                                    <!--begin::report icon-->
                                    <i class="ki-outline ki-search-list fs-2x"></i>
                                    <!--end::report icon-->
                                    <!--begin::Info-->
                                    <span class="fw-bold ">Cambios en Patrimonio</span>
                                    <!--end::Info-->
                                </div>
                                <!--end::Icon-->

                            </a>
                            <!--end::Nav link-->
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 ">
                            <!--begin::Nav link-->
                            <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  text-active-danger "
                                href="/contabilidad/reporte/balancegeneral/" target="_blank"
                                style="width: 100%;height: 40px">
                                <!--begin::Icon-->
                                <div class="nav-icon d-flex  ">
                                    <!--begin::report icon-->
                                    <i class="ki-outline ki-search-list fs-2x"></i>
                                    <!--end::report icon-->
                                    <!--begin::Info-->
                                    <span class="fw-bold ">
                                        Flujo de efectivo</span>
                                    <!--end::Info-->
                                </div>
                                <!--end::Icon-->

                            </a>
                            <!--end::Nav link-->
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 ">
                            <!--begin::Nav link-->
                            <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  text-active-danger "
                                href="/contabilidad/reporte/balancegeneral/" target="_blank"
                                style="width: 100%;height: 40px">
                                <!--begin::Icon-->
                                <div class="nav-icon d-flex  ">
                                    <!--begin::report icon-->
                                    <i class="ki-outline ki-search-list fs-2x"></i>
                                    <!--end::report icon-->
                                    <!--begin::Info-->
                                    <span class="fw-bold ">
                                        Balance de Comprobación</span>
                                    <!--end::Info-->
                                </div>
                                <!--end::Icon-->

                            </a>
                            <!--end::Nav link-->
                        </li>
                        <!--end::Item-->
                    </ul>
                </div>
                <div class="col-md-4  border-gray-300 border-end-dashed ">
                    <ul class="nav nav-pills d-block text-active-info  justify-content-left nav-pills-custom  mb-6">
                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 ">
                            <!--begin::Nav link-->
                            <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  text-active-danger "
                                href="/contabilidad/reporte/balancegeneral/" target="_blank"
                                style="width: 100%;height: 40px">
                                <!--begin::Icon-->
                                <div class="nav-icon d-flex  ">
                                    <!--begin::report icon-->
                                    <i class="ki-outline ki-search-list fs-2x"></i>
                                    <!--end::report icon-->
                                    <!--begin::Info-->
                                    <span class=" fw-bold ">Anexo a estados financieros</span>
                                    <!--end::Info-->
                                </div>
                                <!--end::Icon-->

                            </a>
                            <!--end::Nav link-->
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 ">
                            <!--begin::Nav link-->
                            <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  text-active-danger "
                                href="/contabilidad/reporte/balancegeneral/" target="_blank"
                                style="width: 100%;height: 40px">
                                <!--begin::Icon-->
                                <div class="nav-icon d-flex  ">
                                    <!--begin::report icon-->
                                    <i class="ki-outline ki-search-list fs-2x"></i>
                                    <!--end::report icon-->
                                    <!--begin::Info-->
                                    <span class="fw-bold ">Libro Mayor</span>
                                    <!--end::Info-->
                                </div>
                                <!--end::Icon-->

                            </a>
                            <!--end::Nav link-->
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 ">
                            <!--begin::Nav link-->
                            <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  text-active-danger "
                                href="/contabilidad/reporte/balancegeneral/" target="_blank"
                                style="width: 100%;height: 40px">
                                <!--begin::Icon-->
                                <div class="nav-icon d-flex  ">
                                    <!--begin::report icon-->
                                    <i class="ki-outline ki-search-list fs-2x"></i>
                                    <!--end::report icon-->
                                    <!--begin::Info-->
                                    <span class="fw-bold ">Libro Auxiliar</span>
                                </div>
                                <!--end::Info-->
                                <!--end::Icon-->

                            </a>
                            <!--end::Nav link-->
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->

                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 ">
                            <!--begin::Nav link-->
                            <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  text-active-danger "
                                href="/contabilidad/reporte/balancegeneral/" target="_blank"
                                style="width: 100%;height: 40px">
                                <!--begin::Icon-->
                                <div class="nav-icon d-flex  ">
                                    <!--begin::report icon-->
                                    <i class="ki-outline ki-search-list fs-2x"></i>
                                    <!--end::report icon-->
                                    <!--begin::Info-->
                                    <span class="fw-bold ">Saldo por periodos
                                        mensuales</span>
                                    <!--end::Info-->
                                </div>
                                <!--end::Icon-->

                            </a>
                            <!--end::Nav link-->
                        </li>
                        <!--end::Item-->





                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="nav nav-pills d-block text-active-info  justify-content-left nav-pills-custom  mb-6 ">


                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 ">
                            <!--begin::Nav link-->
                            <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  text-active-danger "
                                href="/contabilidad/reporte/balancegeneral/" target="_blank"
                                style="width: 100%;height: 40px">
                                <!--begin::Icon-->
                                <div class="nav-icon d-flex  ">
                                    <!--begin::report icon-->
                                    <i class="ki-outline ki-search-list fs-2x"></i>
                                    <!--end::report icon-->
                                    <!--begin::Info-->
                                    <span class="fw-bold ">Partidas de Diario</span>
                                    <!--end::Info-->
                                </div>
                                <!--end::Icon-->

                            </a>
                            <!--end::Nav link-->
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 ">
                            <!--begin::Nav link-->
                            <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  text-active-danger "
                                href="/contabilidad/reporte/balancegeneral/" target="_blank"
                                style="width: 100%;height: 40px">
                                <!--begin::Icon-->
                                <div class="nav-icon d-flex  ">
                                    <!--begin::report icon-->
                                    <i class="ki-outline ki-search-list fs-2x"></i>
                                    <!--end::report icon-->
                                    <!--begin::Info-->
                                    <span class="fw-bold ">Libro Diario General</span>
                                    <!--end::Info-->
                                </div>
                                <!--end::Icon-->

                            </a>
                            <!--end::Nav link-->
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 ">
                            <!--begin::Nav link-->
                            <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  text-active-danger "
                                data-bs-toggle="modal" data-bs-target="#modalHistoricoContable"
                                style="width: 100%;height: 40px">
                                <!--begin::Icon-->
                                <div class="nav-icon d-flex  ">
                                    <!--begin::report icon-->
                                    <i class="ki-outline ki-search-list fs-2x"></i>
                                    <!--end::report icon-->
                                    <!--begin::Info-->
                                    <span class="fw-bold ">Movimientos Histórico de
                                        Cuenta</span>
                                    <!--end::Info-->
                                </div>
                                <!--end::Icon-->

                            </a>
                            <!--end::Nav link-->
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 ">
                            <!--begin::Nav link-->
                            <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  text-active-danger "
                                href="/contabilidad/reporte/balancegeneral/" target="_blank"
                                style="width: 100%;height: 40px">
                                <!--begin::Icon-->
                                <div class="nav-icon d-flex  ">
                                    <!--begin::report icon-->
                                    <i class="ki-outline ki-search-list fs-2x"></i>
                                    <!--end::report icon-->
                                    <!--begin::Info-->
                                    <span class="fw-bold ">Catalogo de Cuentas</span>
                                </div>
                                <!--end::Info-->
                                <!--end::Icon-->

                            </a>
                            <!--end::Nav link-->
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 ">
                            <!--begin::Nav link-->
                            <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  text-active-danger "
                                href="/contabilidad/reporte/balancegeneral/" target="_blank"
                                style="width: 100%;height: 40px">
                                <!--begin::Icon-->
                                <div class="nav-icon d-flex  ">
                                    <!--begin::report icon-->
                                    <i class="ki-outline ki-search-list fs-2x"></i>
                                    <!--end::report icon-->
                                    <!--begin::Info-->
                                    <span class="fw-bold ">Indice Financiero</span>
                                    <!--end::Info-->
                                </div>
                                <!--end::Icon-->

                            </a>
                            <!--end::Nav link-->
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Nav-->
                </div>
            </div>


        </div>
        <!--end: Card Body-->

    </div>

    {{-- Modal Historico Contable --}}
    <div class="modal fade" id="modalHistoricoContable" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content position-absolute">
                <div class="modal-header">
                    <h5 class="modal-title">Historico de Cuentas</h5>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <div class="form-group row mb-3">
                        <div class="col-md-12">
                            <select class="form-select" id="id_cuenta_historico" name="id_cuenta_historico"
                                data-control="select2">
                                @foreach ($cuentas as $cuenta)
                                    <option value="{{ $cuenta->id_cuenta }}">{{ $cuenta->numero }} ->
                                        {{ $cuenta->descripcion }}</option>
                                @endforeach
                            </select>
                            <label for="id_cuenta_historico">CUENTA</label>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-md-6 form-floating">
                            <select class="form-select" id="mes_historico" name="mes_historico" data-control="select2">
                                @foreach ($meses as $numeroMes => $mes)
                                    <option value="{{ $numeroMes }}">{{ $mes }}</option>
                                @endforeach
                            </select>
                            <label for="mes_historico">MES</label>
                        </div>
                        <div class="col-md-6 form-floating">
                            <select class="form-select" id="anio_historico" name="anio_historico"
                                data-control="select2">
                                @foreach ($anios as $anio)
                                    <option value="{{ $anio }}">{{ $anio }} </option>
                                @endforeach
                            </select>
                            <label for="anio_historico">AÑO</label>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-info">Generar Historico</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Catalogo de Cuentas --}}
    <script>
        const catalogoCuentas = @json($cuentas);
    </script>


    </div>
    <div class="card-footer">
    </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/app/contabilidad/reportes.js') }}"></script>

    <script>
            $('#id_cuenta_historico').select2(
                dropdownParent: $('#modalHistoricoContable .modal-content')
            );
            $('#mes_historico').select2();
            $('#anio_historico').select2();
    </script>
@endsection
