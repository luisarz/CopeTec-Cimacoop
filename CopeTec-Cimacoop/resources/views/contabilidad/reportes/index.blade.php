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
            <!--begin::Nav-->
            <ul class="nav nav-pills d-flex text-active-info  justify-content-left nav-pills-custom  mb-6 mt-5">
                <!--begin::Item-->
                <li class="nav-item mb-3 me-3 ">
                    <!--begin::Nav link-->
                    <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  flex-stack pt-3 pb-3 text-active-danger "
                        href="/contabilidad/reporte/balancegeneral/" target="_blank" style="width: 130px;height: 120px">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                            <!--begin::report icon-->
                            <i class="ki-outline ki-search-list fs-3x"></i>
                            <!--end::report icon-->
                            <!--begin::Info-->
                            <div class="">
                                <span class="text-gray-800 fw-bold  text-active-info ">Balance General</span>
                            </div>
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
                    <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  flex-stack pt-3 pb-3 text-active-danger "
                        href="/contabilidad/reporte/balancegeneral/" target="_blank" style="width: 130px;height: 120px">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                            <!--begin::report icon-->
                            <i class="ki-outline ki-search-list fs-3x"></i>
                            <!--end::report icon-->
                            <!--begin::Info-->
                            <div class="">
                                <span class="text-gray-800 fw-bold  text-active-info ">Estado de Resultado</span>
                            </div>
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
                    <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  flex-stack pt-3 pb-3 text-active-danger "
                        href="/contabilidad/reporte/balancegeneral/" target="_blank" style="width: 130px;height: 120px">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                            <!--begin::report icon-->
                            <i class="ki-outline ki-search-list fs-3x"></i>
                            <!--end::report icon-->
                            <!--begin::Info-->
                            <div class="">
                                <span class="text-gray-800 fw-bold  text-active-info ">Cambios en Patrimonio</span>
                            </div>
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
                    <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  flex-stack pt-3 pb-3 text-active-danger "
                        href="/contabilidad/reporte/balancegeneral/" target="_blank" style="width: 130px;height: 120px">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                            <!--begin::report icon-->
                            <i class="ki-outline ki-search-list fs-3x"></i>
                            <!--end::report icon-->
                            <!--begin::Info-->
                            <div class="">
                                <span class="text-gray-800 fw-bold  text-active-info ">
                                    Flujo de efectivo</span>
                            </div>
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
                    <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  flex-stack pt-3 pb-3 text-active-danger "
                        href="/contabilidad/reporte/balancegeneral/" target="_blank" style="width: 130px;height: 120px">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                            <!--begin::report icon-->
                            <i class="ki-outline ki-search-list fs-3x"></i>
                            <!--end::report icon-->
                            <!--begin::Info-->
                            <div class="">
                                <span class="text-gray-800 fw-bold  text-active-info ">
                                    Balance de Comprobación</span>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Icon-->

                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Item-->
            </ul>
            <hr>
            <ul class="nav nav-pills d-flex text-active-info  justify-content-left nav-pills-custom  mb-6 mt-5">
                <!--begin::Item-->
                <li class="nav-item mb-3 me-3 ">
                    <!--begin::Nav link-->
                    <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  flex-stack pt-3 pb-3 text-active-danger "
                        href="/contabilidad/reporte/balancegeneral/" target="_blank" style="width: 180px;height: 120px">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                            <!--begin::report icon-->
                            <i class="ki-outline ki-search-list fs-3x"></i>
                            <!--end::report icon-->
                            <!--begin::Info-->
                            <div class="">
                                <span class="text-gray-800 fw-bold  text-active-info ">Anexo a estados
                                    financieros</span>
                            </div>
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
                    <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  flex-stack pt-3 pb-3 text-active-danger "
                        href="/contabilidad/reporte/balancegeneral/" target="_blank" style="width: 130px;height: 120px">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                            <!--begin::report icon-->
                            <i class="ki-outline ki-search-list fs-3x"></i>
                            <!--end::report icon-->
                            <!--begin::Info-->
                            <div class="">
                                <span class="text-gray-800 fw-bold  text-active-info ">Estado de Resultado</span>
                            </div>
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
                    <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  flex-stack pt-3 pb-3 text-active-danger "
                        href="/contabilidad/reporte/balancegeneral/" target="_blank" style="width: 130px;height: 120px">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                            <!--begin::report icon-->
                            <i class="ki-outline ki-search-list fs-3x"></i>
                            <!--end::report icon-->
                            <!--begin::Info-->
                            <div class="">
                                <span class="text-gray-800 fw-bold  text-active-info ">Estado de Resultado</span>
                            </div>
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
                    <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  flex-stack pt-3 pb-3 text-active-danger "
                        href="/contabilidad/reporte/balancegeneral/" target="_blank" style="width: 130px;height: 120px">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                            <!--begin::report icon-->
                            <i class="ki-outline ki-search-list fs-3x"></i>
                            <!--end::report icon-->
                            <!--begin::Info-->
                            <div class="">
                                <span class="text-gray-800 fw-bold  text-active-info ">Estado de Resultado</span>
                            </div>
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
                    <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  flex-stack pt-3 pb-3 text-active-danger "
                        href="/contabilidad/reporte/balancegeneral/" target="_blank" style="width: 130px;height: 120px">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                            <!--begin::report icon-->
                            <i class="ki-outline ki-search-list fs-3x"></i>
                            <!--end::report icon-->
                            <!--begin::Info-->
                            <div class="">
                                <span class="text-gray-800 fw-bold  text-active-info ">Estado de Resultado</span>
                            </div>
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
                    <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  flex-stack pt-3 pb-3 text-active-danger "
                        href="/contabilidad/reporte/balancegeneral/" target="_blank" style="width: 130px;height: 120px">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                            <!--begin::report icon-->
                            <i class="ki-outline ki-search-list fs-3x"></i>
                            <!--end::report icon-->
                            <!--begin::Info-->
                            <div class="">
                                <span class="text-gray-800 fw-bold  text-active-info ">Estado de Resultado</span>
                            </div>
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
                    <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  flex-stack pt-3 pb-3 text-active-danger "
                        href="/contabilidad/reporte/balancegeneral/" target="_blank" style="width: 130px;height: 120px">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                            <!--begin::report icon-->
                            <i class="ki-outline ki-search-list fs-3x"></i>
                            <!--end::report icon-->
                            <!--begin::Info-->
                            <div class="">
                                <span class="text-gray-800 fw-bold  text-active-info ">Estado de Resultado</span>
                            </div>
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
                    <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  flex-stack pt-3 pb-3 text-active-danger "
                        href="/contabilidad/reporte/balancegeneral/" target="_blank" style="width: 130px;height: 120px">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                            <!--begin::report icon-->
                            <i class="ki-outline ki-search-list fs-3x"></i>
                            <!--end::report icon-->
                            <!--begin::Info-->
                            <div class="">
                                <span class="text-gray-800 fw-bold  text-active-info ">Estado de Resultado</span>
                            </div>
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
                    <a class=" btn-border-solid btn btn-outline btn-flex btn-active-color-info  flex-stack pt-3 pb-3 text-active-danger "
                        href="/contabilidad/reporte/balancegeneral/" target="_blank" style="width: 130px;height: 120px">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                            <!--begin::report icon-->
                            <i class="ki-outline ki-search-list fs-3x"></i>
                            <!--end::report icon-->
                            <!--begin::Info-->
                            <div class="">
                                <span class="text-gray-800 fw-bold  text-active-info ">Estado de Resultado</span>
                            </div>
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
        <!--end: Card Body-->

    </div>
    


    </div>
    <div class="card-footer">
    </div>
    </div>
@endsection
