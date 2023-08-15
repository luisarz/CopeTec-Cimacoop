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
                                href="/contabilidad/reporte/balancegeneral/" target="_blank"
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



    </div>
    <div class="card-footer">
    </div>
    </div>
@endsection
