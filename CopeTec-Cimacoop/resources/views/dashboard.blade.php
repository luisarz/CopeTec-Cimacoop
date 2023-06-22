@extends('base.base')
@section('title')
    Dashboard
@endsection


@section('content')
    <div class="col-xl-6 mb-5 mb-xl-10">

        <!--begin::Tables widget 16-->
        <div class="card card-flush h-xl-100">
            <!--begin::Header-->
            <div class="card-header pt-5">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">Ultimas Operaciones</span>

                    {{-- <span class="text-gray-400 mt-1 fw-semibold fs-6">Avg. 69.34% Conv. Rate</span> --}}
                </h3>
                <!--end::Title-->

            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body pt-6">
                <!--begin::Nav-->
                <ul class="nav nav-pills nav-pills-custom mb-3" role="tablist">
                    <!--begin::Item-->
                    <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                        <!--begin::Link-->
                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2 active"
                            id="kt_stats_widget_16_tab_link_1" data-bs-toggle="pill" href="#kt_stats_widget_16_tab_1"
                            aria-selected="true" role="tab">
                            <!--begin::Icon-->
                            <div class="nav-icon mb-3">
                                <i class="ki-duotone ki-bank fs-1"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span class="path4"></span><span
                                        class="path5"></span></i>
                            </div>
                            <!--end::Icon-->

                            <!--begin::Title-->
                            <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">
                                Depositos </span>
                            <!--end::Title-->

                            <!--begin::Bullet-->
                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                            <!--end::Bullet-->
                        </a>
                        <!--end::Link-->
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                        <!--begin::Link-->
                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2"
                            id="kt_stats_widget_16_tab_link_2" data-bs-toggle="pill" href="#kt_stats_widget_16_tab_2"
                            aria-selected="false" role="tab" tabindex="-1">
                            <!--begin::Icon-->
                            <div class="nav-icon mb-3">
                                <i class="ki-duotone ki-double-up fs-1"><span class="path1"></span><span
                                        class="path2"></span></i>
                            </div>
                            <!--end::Icon-->

                            <!--begin::Title-->
                            <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">
                                Retiros </span>
                            <!--end::Title-->

                            <!--begin::Bullet-->
                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                            <!--end::Bullet-->
                        </a>
                        <!--end::Link-->
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                        <!--begin::Link-->
                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2"
                            id="kt_stats_widget_16_tab_link_3" data-bs-toggle="pill" href="#kt_stats_widget_16_tab_3"
                            aria-selected="false" role="tab" tabindex="-1">
                            <!--begin::Icon-->
                            <div class="nav-icon mb-3">
                                <i class="ki-duotone ki-user-tick fs-1"><span class="path1"></span><span
                                        class="path2"></span></i>
                            </div>
                            <!--end::Icon-->

                            <!--begin::Title-->
                            <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">
                                Clientes </span>
                            <!--end::Title-->

                            <!--begin::Bullet-->
                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                            <!--end::Bullet-->
                        </a>
                        <!--end::Link-->
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                        <!--begin::Link-->
                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2"
                            id="kt_stats_widget_16_tab_link_4" data-bs-toggle="pill" href="#kt_stats_widget_16_tab_4"
                            aria-selected="false" role="tab" tabindex="-1">
                            <!--begin::Icon-->
                            <div class="nav-icon mb-3">
                                <i class="ki-duotone ki-tablet fs-1"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span></i>
                            </div>
                            <!--end::Icon-->

                            <!--begin::Title-->
                            <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">
                                Socios </span>
                            <!--end::Title-->

                            <!--begin::Bullet-->
                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                            <!--end::Bullet-->
                        </a>
                        <!--end::Link-->
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                        <!--begin::Link-->
                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2"
                            id="kt_stats_widget_16_tab_link_5" data-bs-toggle="pill" href="#kt_stats_widget_16_tab_5"
                            aria-selected="false" role="tab" tabindex="-1">
                            <!--begin::Icon-->
                            <div class="nav-icon mb-3">
                                <i class="ki-duotone ki-send fs-1"><span class="path1"></span><span
                                        class="path2"></span></i>
                            </div>
                            <!--end::Icon-->

                            <!--begin::Title-->
                            <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">
                                Others </span>
                            <!--end::Title-->

                            <!--begin::Bullet-->
                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                            <!--end::Bullet-->
                        </a>
                        <!--end::Link-->
                    </li>
                    <!--end::Item-->

                </ul>
                <!--end::Nav-->

                <!--begin::Tab Content-->
                <div class="tab-content">

                    <!--begin::Tap pane-->
                    <div class="tab-pane fade active show" id="kt_stats_widget_16_tab_1" role="tabpanel"
                        aria-labelledby="#kt_stats_widget_16_tab_link_1">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                        <th class="p-0 pb-3 min-w-100px text-start">Cliente</th>
                                        <th class="p-0 pb-3 min-w-100px text-end pe-13">Cuenta.</th>
                                        <th class="p-0 pb-3 w-125px text-end pe-7">Monto</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->

                                <!--begin::Table body-->
                                <tbody>
                                    <tr>
                                        <td>
                                            Luis Màrqeuz
                                        </td>

                                        <td class="text-end pe-13">
                                            Cuenta # 01
                                        </td>

                                        <td class="text-end">
                                            $ 10,000.00
                                    </tr>

                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--end::Tap pane-->

                    <!--begin::Tap pane-->
                    <div class="tab-pane fade" id="kt_stats_widget_16_tab_2" role="tabpanel"
                        aria-labelledby="#kt_stats_widget_16_tab_link_2">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                        <th class="p-0 pb-3 min-w-100px text-start">Cliente</th>
                                        <th class="p-0 pb-3 min-w-100px text-end pe-13">Cuenta.</th>
                                        <th class="p-0 pb-3 w-125px text-end pe-7">Monto</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->

                                <!--begin::Table body-->
                                <tbody>
                                    <tr>
                                        <td>
                                            Luis Màrqeuz
                                        </td>

                                        <td class="text-end pe-13">
                                            Cuenta # 01
                                        </td>

                                        <td class="text-end">
                                            $ 10,000.00
                                    </tr>

                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--end::Tap pane-->

                    <!--begin::Tap pane-->
                    <div class="tab-pane fade" id="kt_stats_widget_16_tab_3" role="tabpanel"
                        aria-labelledby="#kt_stats_widget_16_tab_link_3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                        <th class="p-0 pb-3 min-w-100px text-start">Cliente</th>
                                        <th class="p-0 pb-3 min-w-100px text-end pe-13">Cuenta.</th>
                                        <th class="p-0 pb-3 w-125px text-end pe-7">Monto</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->

                                <!--begin::Table body-->
                                <tbody>
                                    <tr>
                                        <td>
                                            Luis Màrqeuz
                                        </td>

                                        <td class="text-end pe-13">
                                            Cuenta # 01
                                        </td>

                                        <td class="text-end">
                                            $ 10,000.00
                                    </tr>

                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--end::Tap pane-->

                    <!--begin::Tap pane-->
                    <div class="tab-pane fade" id="kt_stats_widget_16_tab_4" role="tabpanel"
                        aria-labelledby="#kt_stats_widget_16_tab_link_4">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                        <th class="p-0 pb-3 min-w-100px text-start">Cliente</th>
                                        <th class="p-0 pb-3 min-w-100px text-end pe-13">Cuenta.</th>
                                        <th class="p-0 pb-3 w-125px text-end pe-7">Monto</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->

                                <!--begin::Table body-->
                                <tbody>
                                    <tr>
                                        <td>
                                            Luis Màrqeuz
                                        </td>

                                        <td class="text-end pe-13">
                                            Cuenta # 01
                                        </td>

                                        <td class="text-end">
                                            $ 10,000.00
                                    </tr>

                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table container-->
                        </div>
                        <!--end::Tap pane-->

                        <!--begin::Tap pane-->
                        <div class="tab-pane fade" id="kt_stats_widget_16_tab_5" role="tabpanel"
                            aria-labelledby="#kt_stats_widget_16_tab_link_5">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                            <th class="p-0 pb-3 min-w-150px text-start">AUTHOR</th>
                                            <th class="p-0 pb-3 min-w-100px text-end pe-13">CONV.</th>
                                            <th class="p-0 pb-3 w-125px text-end pe-7">CHART</th>
                                            <th class="p-0 pb-3 w-50px text-end">VIEW</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->

                                    <!--begin::Table body-->
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-3">
                                                        <img src="/metronic8/demo1/assets/media/avatars/300-6.jpg"
                                                            class="" alt="">
                                                    </div>


                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Jane
                                                            Cooper</a>
                                                        <span class="text-gray-400 fw-semibold d-block fs-7">Haiti</span>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-end pe-13">
                                                <span class="text-gray-600 fw-bold fs-6">68.54%</span>
                                            </td>

                                            <td class="text-end pe-0">
                                                <div id="kt_table_widget_16_chart_5_1" class="h-50px mt-n8 pe-7"
                                                    data-kt-chart-color="success" style="min-height: 50px;">
                                                    <div id="apexchartshd63ssh9"
                                                        class="apexcharts-canvas apexchartshd63ssh9"
                                                        style="width: 0px; height: 50px;"><svg id="SvgjsSvg4963"
                                                            width="0" height="50"
                                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                            xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                            style="background: transparent;">
                                                            <g id="SvgjsG4966" class="apexcharts-annotations"></g>
                                                            <g id="SvgjsG4965"
                                                                class="apexcharts-inner apexcharts-graphical">
                                                                <defs id="SvgjsDefs4964"></defs>
                                                            </g>
                                                        </svg>
                                                        <div class="apexcharts-legend"></div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-end">
                                                <a href="#"
                                                    class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                                    <i class="ki-duotone ki-black-right fs-2 text-gray-500"></i> </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-3">
                                                        <img src="/metronic8/demo1/assets/media/avatars/300-10.jpg"
                                                            class="" alt="">
                                                    </div>


                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Esther
                                                            Howard</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold d-block fs-7">Kiribati</span>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-end pe-13">
                                                <span class="text-gray-600 fw-bold fs-6">55.83%</span>
                                            </td>

                                            <td class="text-end pe-0">
                                                <div id="kt_table_widget_16_chart_5_2" class="h-50px mt-n8 pe-7"
                                                    data-kt-chart-color="danger" style="min-height: 50px;">
                                                    <div id="apexchartstohsdhsm"
                                                        class="apexcharts-canvas apexchartstohsdhsm"
                                                        style="width: 0px; height: 50px;"><svg id="SvgjsSvg4967"
                                                            width="0" height="50"
                                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                            xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                            style="background: transparent;">
                                                            <g id="SvgjsG4970" class="apexcharts-annotations"></g>
                                                            <g id="SvgjsG4969"
                                                                class="apexcharts-inner apexcharts-graphical">
                                                                <defs id="SvgjsDefs4968"></defs>
                                                            </g>
                                                        </svg>
                                                        <div class="apexcharts-legend"></div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-end">
                                                <a href="#"
                                                    class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                                    <i class="ki-duotone ki-black-right fs-2 text-gray-500"></i> </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-3">
                                                        <img src="/metronic8/demo1/assets/media/avatars/300-9.jpg"
                                                            class="" alt="">
                                                    </div>


                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Jacob
                                                            Jones</a>
                                                        <span class="text-gray-400 fw-semibold d-block fs-7">Poland</span>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-end pe-13">
                                                <span class="text-gray-600 fw-bold fs-6">93.46%</span>
                                            </td>

                                            <td class="text-end pe-0">
                                                <div id="kt_table_widget_16_chart_5_3" class="h-50px mt-n8 pe-7"
                                                    data-kt-chart-color="success" style="min-height: 50px;">
                                                    <div id="apexchartstihvnabx"
                                                        class="apexcharts-canvas apexchartstihvnabx"
                                                        style="width: 0px; height: 50px;"><svg id="SvgjsSvg4971"
                                                            width="0" height="50"
                                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                            xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                            style="background: transparent;">
                                                            <g id="SvgjsG4974" class="apexcharts-annotations"></g>
                                                            <g id="SvgjsG4973"
                                                                class="apexcharts-inner apexcharts-graphical">
                                                                <defs id="SvgjsDefs4972"></defs>
                                                            </g>
                                                        </svg>
                                                        <div class="apexcharts-legend"></div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-end">
                                                <a href="#"
                                                    class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                                    <i class="ki-duotone ki-black-right fs-2 text-gray-500"></i> </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-3">
                                                        <img src="/metronic8/demo1/assets/media/avatars/300-3.jpg"
                                                            class="" alt="">
                                                    </div>


                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Ralph
                                                            Edwards</a>
                                                        <span class="text-gray-400 fw-semibold d-block fs-7">Mexico</span>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-end pe-13">
                                                <span class="text-gray-600 fw-bold fs-6">64.48%</span>
                                            </td>

                                            <td class="text-end pe-0">
                                                <div id="kt_table_widget_16_chart_5_4" class="h-50px mt-n8 pe-7"
                                                    data-kt-chart-color="success" style="min-height: 50px;">
                                                    <div id="apexchartse89f753v"
                                                        class="apexcharts-canvas apexchartse89f753v"
                                                        style="width: 0px; height: 50px;"><svg id="SvgjsSvg4975"
                                                            width="0" height="50"
                                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                            xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                            style="background: transparent;">
                                                            <g id="SvgjsG4978" class="apexcharts-annotations"></g>
                                                            <g id="SvgjsG4977"
                                                                class="apexcharts-inner apexcharts-graphical">
                                                                <defs id="SvgjsDefs4976"></defs>
                                                            </g>
                                                        </svg>
                                                        <div class="apexcharts-legend"></div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-end">
                                                <a href="#"
                                                    class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                                    <i class="ki-duotone ki-black-right fs-2 text-gray-500"></i> </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--end::Tap pane-->
                        <!--end::Table container-->
                    </div>
                    <!--end::Tab Content-->
                </div>
                <!--end: Card Body-->
            </div>
            <!--end::Tables widget 16-->
        </div>
    @endsection
