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
                                                    <img src="/metronic8/demo1/assets/media/avatars/300-3.jpg"
                                                        class="" alt="">
                                                </div>


                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Guy
                                                        Hawkins</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Haiti</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-end pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">78.34%</span>
                                        </td>

                                        <td class="text-end pe-0">
                                            <div id="kt_table_widget_16_chart_1_1" class="h-50px mt-n8 pe-7"
                                                data-kt-chart-color="success" style="min-height: 50px;">
                                                <div id="apexcharts3xlk7wmf"
                                                    class="apexcharts-canvas apexcharts3xlk7wmf apexcharts-theme-light"
                                                    style="width: 95px; height: 50px;"><svg id="SvgjsSvg4723"
                                                        width="95" height="50" xmlns="http://www.w3.org/2000/svg"
                                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG4725" class="apexcharts-inner apexcharts-graphical"
                                                            transform="translate(0, 0)">
                                                            <defs id="SvgjsDefs4724">
                                                                <clipPath id="gridRectMask3xlk7wmf">
                                                                    <rect id="SvgjsRect4729" width="101"
                                                                        height="52" x="-3" y="-1"
                                                                        rx="0" ry="0" opacity="1"
                                                                        stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMask3xlk7wmf"></clipPath>
                                                                <clipPath id="nonForecastMask3xlk7wmf"></clipPath>
                                                                <clipPath id="gridRectMarkerMask3xlk7wmf">
                                                                    <rect id="SvgjsRect4730" width="99"
                                                                        height="54" x="-2" y="-2"
                                                                        rx="0" ry="0" opacity="1"
                                                                        stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG4737" class="apexcharts-xaxis"
                                                                transform="translate(0, 0)">
                                                                <g id="SvgjsG4738" class="apexcharts-xaxis-texts-g"
                                                                    transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG4754" class="apexcharts-grid">
                                                                <g id="SvgjsG4755" class="apexcharts-gridlines-horizontal"
                                                                    style="display: none;">
                                                                    <line id="SvgjsLine4757" x1="0"
                                                                        y1="0" x2="95" y2="0"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4758" x1="0"
                                                                        y1="5" x2="95" y2="5"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4759" x1="0"
                                                                        y1="10" x2="95" y2="10"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4760" x1="0"
                                                                        y1="15" x2="95" y2="15"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4761" x1="0"
                                                                        y1="20" x2="95" y2="20"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4762" x1="0"
                                                                        y1="25" x2="95" y2="25"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4763" x1="0"
                                                                        y1="30" x2="95" y2="30"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4764" x1="0"
                                                                        y1="35" x2="95" y2="35"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4765" x1="0"
                                                                        y1="40" x2="95" y2="40"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4766" x1="0"
                                                                        y1="45" x2="95" y2="45"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4767" x1="0"
                                                                        y1="50" x2="95" y2="50"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                </g>
                                                                <g id="SvgjsG4756" class="apexcharts-gridlines-vertical"
                                                                    style="display: none;"></g>
                                                                <line id="SvgjsLine4769" x1="0" y1="50"
                                                                    x2="95" y2="50" stroke="transparent"
                                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine4768" x1="0" y1="1"
                                                                    x2="0" y2="50" stroke="transparent"
                                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG4731"
                                                                class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG4732" class="apexcharts-series"
                                                                    seriesName="NetxProfit" data:longestSeries="true"
                                                                    rel="1" data:realIndex="0">
                                                                    <path id="SvgjsPath4735"
                                                                        d="M 0 50L 0 36.666666666666664C 2.5576923076923075 36.666666666666664 4.75 41.666666666666664 7.3076923076923075 41.666666666666664C 9.865384615384615 41.666666666666664 12.057692307692307 37.5 14.615384615384615 37.5C 17.173076923076923 37.5 19.365384615384617 32.5 21.923076923076923 32.5C 24.48076923076923 32.5 26.673076923076923 45 29.23076923076923 45C 31.788461538461537 45 33.980769230769226 40.83333333333333 36.53846153846153 40.83333333333333C 39.09615384615384 40.83333333333333 41.28846153846154 45.833333333333336 43.84615384615385 45.833333333333336C 46.40384615384615 45.833333333333336 48.59615384615385 30.833333333333332 51.15384615384615 30.833333333333332C 53.71153846153846 30.833333333333332 55.90384615384615 45.833333333333336 58.46153846153846 45.833333333333336C 61.01923076923077 45.833333333333336 63.21153846153845 40.83333333333333 65.76923076923076 40.83333333333333C 68.32692307692307 40.83333333333333 70.51923076923076 35 73.07692307692307 35C 75.63461538461537 35 77.82692307692307 44.166666666666664 80.38461538461537 44.166666666666664C 82.94230769230768 44.166666666666664 85.13461538461539 32.5 87.6923076923077 32.5C 90.25 32.5 92.4423076923077 39.166666666666664 95 39.166666666666664C 95 39.166666666666664 95 39.166666666666664 95 50M 95 39.166666666666664z"
                                                                        fill="rgba(255,255,255,1)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="butt"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-area" index="0"
                                                                        clip-path="url(#gridRectMask3xlk7wmf)"
                                                                        pathTo="M 0 50L 0 36.666666666666664C 2.5576923076923075 36.666666666666664 4.75 41.666666666666664 7.3076923076923075 41.666666666666664C 9.865384615384615 41.666666666666664 12.057692307692307 37.5 14.615384615384615 37.5C 17.173076923076923 37.5 19.365384615384617 32.5 21.923076923076923 32.5C 24.48076923076923 32.5 26.673076923076923 45 29.23076923076923 45C 31.788461538461537 45 33.980769230769226 40.83333333333333 36.53846153846153 40.83333333333333C 39.09615384615384 40.83333333333333 41.28846153846154 45.833333333333336 43.84615384615385 45.833333333333336C 46.40384615384615 45.833333333333336 48.59615384615385 30.833333333333332 51.15384615384615 30.833333333333332C 53.71153846153846 30.833333333333332 55.90384615384615 45.833333333333336 58.46153846153846 45.833333333333336C 61.01923076923077 45.833333333333336 63.21153846153845 40.83333333333333 65.76923076923076 40.83333333333333C 68.32692307692307 40.83333333333333 70.51923076923076 35 73.07692307692307 35C 75.63461538461537 35 77.82692307692307 44.166666666666664 80.38461538461537 44.166666666666664C 82.94230769230768 44.166666666666664 85.13461538461539 32.5 87.6923076923077 32.5C 90.25 32.5 92.4423076923077 39.166666666666664 95 39.166666666666664C 95 39.166666666666664 95 39.166666666666664 95 50M 95 39.166666666666664z"
                                                                        pathFrom="M -1 50L -1 50L 7.3076923076923075 50L 14.615384615384615 50L 21.923076923076923 50L 29.23076923076923 50L 36.53846153846153 50L 43.84615384615385 50L 51.15384615384615 50L 58.46153846153846 50L 65.76923076923076 50L 73.07692307692307 50L 80.38461538461537 50L 87.6923076923077 50L 95 50">
                                                                    </path>
                                                                    <path id="SvgjsPath4736"
                                                                        d="M 0 36.666666666666664C 2.5576923076923075 36.666666666666664 4.75 41.666666666666664 7.3076923076923075 41.666666666666664C 9.865384615384615 41.666666666666664 12.057692307692307 37.5 14.615384615384615 37.5C 17.173076923076923 37.5 19.365384615384617 32.5 21.923076923076923 32.5C 24.48076923076923 32.5 26.673076923076923 45 29.23076923076923 45C 31.788461538461537 45 33.980769230769226 40.83333333333333 36.53846153846153 40.83333333333333C 39.09615384615384 40.83333333333333 41.28846153846154 45.833333333333336 43.84615384615385 45.833333333333336C 46.40384615384615 45.833333333333336 48.59615384615385 30.833333333333332 51.15384615384615 30.833333333333332C 53.71153846153846 30.833333333333332 55.90384615384615 45.833333333333336 58.46153846153846 45.833333333333336C 61.01923076923077 45.833333333333336 63.21153846153845 40.83333333333333 65.76923076923076 40.83333333333333C 68.32692307692307 40.83333333333333 70.51923076923076 35 73.07692307692307 35C 75.63461538461537 35 77.82692307692307 44.166666666666664 80.38461538461537 44.166666666666664C 82.94230769230768 44.166666666666664 85.13461538461539 32.5 87.6923076923077 32.5C 90.25 32.5 92.4423076923077 39.166666666666664 95 39.166666666666664"
                                                                        fill="none" fill-opacity="1" stroke="#50cd89"
                                                                        stroke-opacity="1" stroke-linecap="butt"
                                                                        stroke-width="2" stroke-dasharray="0"
                                                                        class="apexcharts-area" index="0"
                                                                        clip-path="url(#gridRectMask3xlk7wmf)"
                                                                        pathTo="M 0 36.666666666666664C 2.5576923076923075 36.666666666666664 4.75 41.666666666666664 7.3076923076923075 41.666666666666664C 9.865384615384615 41.666666666666664 12.057692307692307 37.5 14.615384615384615 37.5C 17.173076923076923 37.5 19.365384615384617 32.5 21.923076923076923 32.5C 24.48076923076923 32.5 26.673076923076923 45 29.23076923076923 45C 31.788461538461537 45 33.980769230769226 40.83333333333333 36.53846153846153 40.83333333333333C 39.09615384615384 40.83333333333333 41.28846153846154 45.833333333333336 43.84615384615385 45.833333333333336C 46.40384615384615 45.833333333333336 48.59615384615385 30.833333333333332 51.15384615384615 30.833333333333332C 53.71153846153846 30.833333333333332 55.90384615384615 45.833333333333336 58.46153846153846 45.833333333333336C 61.01923076923077 45.833333333333336 63.21153846153845 40.83333333333333 65.76923076923076 40.83333333333333C 68.32692307692307 40.83333333333333 70.51923076923076 35 73.07692307692307 35C 75.63461538461537 35 77.82692307692307 44.166666666666664 80.38461538461537 44.166666666666664C 82.94230769230768 44.166666666666664 85.13461538461539 32.5 87.6923076923077 32.5C 90.25 32.5 92.4423076923077 39.166666666666664 95 39.166666666666664"
                                                                        pathFrom="M -1 50L -1 50L 7.3076923076923075 50L 14.615384615384615 50L 21.923076923076923 50L 29.23076923076923 50L 36.53846153846153 50L 43.84615384615385 50L 51.15384615384615 50L 58.46153846153846 50L 65.76923076923076 50L 73.07692307692307 50L 80.38461538461537 50L 87.6923076923077 50L 95 50"
                                                                        fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG4733"
                                                                        class="apexcharts-series-markers-wrap"
                                                                        data:realIndex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG4734" class="apexcharts-datalabels"
                                                                    data:realIndex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine4770" x1="0" y1="0"
                                                                x2="95" y2="0" stroke="#b6b6b6"
                                                                stroke-dasharray="0" stroke-width="1"
                                                                stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                            </line>
                                                            <line id="SvgjsLine4771" x1="0" y1="0"
                                                                x2="95" y2="0" stroke-dasharray="0"
                                                                stroke-width="0" stroke-linecap="butt"
                                                                class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG4772" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG4773" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG4774" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                        <g id="SvgjsG4753" class="apexcharts-yaxis" rel="0"
                                                            transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG4726" class="apexcharts-annotations"></g>
                                                    </svg>
                                                    <div class="apexcharts-legend" style="max-height: 25px;"></div>
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
                                                    <img src="/metronic8/demo1/assets/media/avatars/300-2.jpg"
                                                        class="" alt="">
                                                </div>


                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Jane
                                                        Cooper</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Monaco</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-end pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">63.83%</span>
                                        </td>

                                        <td class="text-end pe-0">
                                            <div id="kt_table_widget_16_chart_1_2" class="h-50px mt-n8 pe-7"
                                                data-kt-chart-color="danger" style="min-height: 50px;">
                                                <div id="apexcharts0413663v"
                                                    class="apexcharts-canvas apexcharts0413663v apexcharts-theme-light"
                                                    style="width: 95px; height: 50px;"><svg id="SvgjsSvg4775"
                                                        width="95" height="50" xmlns="http://www.w3.org/2000/svg"
                                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG4777" class="apexcharts-inner apexcharts-graphical"
                                                            transform="translate(0, 0)">
                                                            <defs id="SvgjsDefs4776">
                                                                <clipPath id="gridRectMask0413663v">
                                                                    <rect id="SvgjsRect4781" width="101"
                                                                        height="52" x="-3" y="-1"
                                                                        rx="0" ry="0" opacity="1"
                                                                        stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMask0413663v"></clipPath>
                                                                <clipPath id="nonForecastMask0413663v"></clipPath>
                                                                <clipPath id="gridRectMarkerMask0413663v">
                                                                    <rect id="SvgjsRect4782" width="99"
                                                                        height="54" x="-2" y="-2"
                                                                        rx="0" ry="0" opacity="1"
                                                                        stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG4789" class="apexcharts-xaxis"
                                                                transform="translate(0, 0)">
                                                                <g id="SvgjsG4790" class="apexcharts-xaxis-texts-g"
                                                                    transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG4806" class="apexcharts-grid">
                                                                <g id="SvgjsG4807" class="apexcharts-gridlines-horizontal"
                                                                    style="display: none;">
                                                                    <line id="SvgjsLine4809" x1="0"
                                                                        y1="0" x2="95" y2="0"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4810" x1="0"
                                                                        y1="5" x2="95" y2="5"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4811" x1="0"
                                                                        y1="10" x2="95" y2="10"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4812" x1="0"
                                                                        y1="15" x2="95" y2="15"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4813" x1="0"
                                                                        y1="20" x2="95" y2="20"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4814" x1="0"
                                                                        y1="25" x2="95" y2="25"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4815" x1="0"
                                                                        y1="30" x2="95" y2="30"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4816" x1="0"
                                                                        y1="35" x2="95" y2="35"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4817" x1="0"
                                                                        y1="40" x2="95" y2="40"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4818" x1="0"
                                                                        y1="45" x2="95" y2="45"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4819" x1="0"
                                                                        y1="50" x2="95" y2="50"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                </g>
                                                                <g id="SvgjsG4808" class="apexcharts-gridlines-vertical"
                                                                    style="display: none;"></g>
                                                                <line id="SvgjsLine4821" x1="0" y1="50"
                                                                    x2="95" y2="50" stroke="transparent"
                                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine4820" x1="0" y1="1"
                                                                    x2="0" y2="50" stroke="transparent"
                                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG4783"
                                                                class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG4784" class="apexcharts-series"
                                                                    seriesName="NetxProfit" data:longestSeries="true"
                                                                    rel="1" data:realIndex="0">
                                                                    <path id="SvgjsPath4787"
                                                                        d="M 0 50L 0 43.333333333333336C 2.5576923076923075 43.333333333333336 4.75 45.833333333333336 7.3076923076923075 45.833333333333336C 9.865384615384615 45.833333333333336 12.057692307692307 36.666666666666664 14.615384615384615 36.666666666666664C 17.173076923076923 36.666666666666664 19.365384615384617 47.5 21.923076923076923 47.5C 24.48076923076923 47.5 26.673076923076923 30.833333333333332 29.23076923076923 30.833333333333332C 31.788461538461537 30.833333333333332 33.980769230769226 36.666666666666664 36.53846153846153 36.666666666666664C 39.09615384615384 36.666666666666664 41.28846153846154 40.83333333333333 43.84615384615385 40.83333333333333C 46.40384615384615 40.83333333333333 48.59615384615385 37.5 51.15384615384615 37.5C 53.71153846153846 37.5 55.90384615384615 47.5 58.46153846153846 47.5C 61.01923076923077 47.5 63.21153846153845 40.83333333333333 65.76923076923076 40.83333333333333C 68.32692307692307 40.83333333333333 70.51923076923076 37.5 73.07692307692307 37.5C 75.63461538461537 37.5 77.82692307692307 44.166666666666664 80.38461538461537 44.166666666666664C 82.94230769230768 44.166666666666664 85.13461538461539 35.83333333333333 87.6923076923077 35.83333333333333C 90.25 35.83333333333333 92.4423076923077 42.5 95 42.5C 95 42.5 95 42.5 95 50M 95 42.5z"
                                                                        fill="rgba(255,255,255,1)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="butt"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-area" index="0"
                                                                        clip-path="url(#gridRectMask0413663v)"
                                                                        pathTo="M 0 50L 0 43.333333333333336C 2.5576923076923075 43.333333333333336 4.75 45.833333333333336 7.3076923076923075 45.833333333333336C 9.865384615384615 45.833333333333336 12.057692307692307 36.666666666666664 14.615384615384615 36.666666666666664C 17.173076923076923 36.666666666666664 19.365384615384617 47.5 21.923076923076923 47.5C 24.48076923076923 47.5 26.673076923076923 30.833333333333332 29.23076923076923 30.833333333333332C 31.788461538461537 30.833333333333332 33.980769230769226 36.666666666666664 36.53846153846153 36.666666666666664C 39.09615384615384 36.666666666666664 41.28846153846154 40.83333333333333 43.84615384615385 40.83333333333333C 46.40384615384615 40.83333333333333 48.59615384615385 37.5 51.15384615384615 37.5C 53.71153846153846 37.5 55.90384615384615 47.5 58.46153846153846 47.5C 61.01923076923077 47.5 63.21153846153845 40.83333333333333 65.76923076923076 40.83333333333333C 68.32692307692307 40.83333333333333 70.51923076923076 37.5 73.07692307692307 37.5C 75.63461538461537 37.5 77.82692307692307 44.166666666666664 80.38461538461537 44.166666666666664C 82.94230769230768 44.166666666666664 85.13461538461539 35.83333333333333 87.6923076923077 35.83333333333333C 90.25 35.83333333333333 92.4423076923077 42.5 95 42.5C 95 42.5 95 42.5 95 50M 95 42.5z"
                                                                        pathFrom="M -1 50L -1 50L 7.3076923076923075 50L 14.615384615384615 50L 21.923076923076923 50L 29.23076923076923 50L 36.53846153846153 50L 43.84615384615385 50L 51.15384615384615 50L 58.46153846153846 50L 65.76923076923076 50L 73.07692307692307 50L 80.38461538461537 50L 87.6923076923077 50L 95 50">
                                                                    </path>
                                                                    <path id="SvgjsPath4788"
                                                                        d="M 0 43.333333333333336C 2.5576923076923075 43.333333333333336 4.75 45.833333333333336 7.3076923076923075 45.833333333333336C 9.865384615384615 45.833333333333336 12.057692307692307 36.666666666666664 14.615384615384615 36.666666666666664C 17.173076923076923 36.666666666666664 19.365384615384617 47.5 21.923076923076923 47.5C 24.48076923076923 47.5 26.673076923076923 30.833333333333332 29.23076923076923 30.833333333333332C 31.788461538461537 30.833333333333332 33.980769230769226 36.666666666666664 36.53846153846153 36.666666666666664C 39.09615384615384 36.666666666666664 41.28846153846154 40.83333333333333 43.84615384615385 40.83333333333333C 46.40384615384615 40.83333333333333 48.59615384615385 37.5 51.15384615384615 37.5C 53.71153846153846 37.5 55.90384615384615 47.5 58.46153846153846 47.5C 61.01923076923077 47.5 63.21153846153845 40.83333333333333 65.76923076923076 40.83333333333333C 68.32692307692307 40.83333333333333 70.51923076923076 37.5 73.07692307692307 37.5C 75.63461538461537 37.5 77.82692307692307 44.166666666666664 80.38461538461537 44.166666666666664C 82.94230769230768 44.166666666666664 85.13461538461539 35.83333333333333 87.6923076923077 35.83333333333333C 90.25 35.83333333333333 92.4423076923077 42.5 95 42.5"
                                                                        fill="none" fill-opacity="1" stroke="#f1416c"
                                                                        stroke-opacity="1" stroke-linecap="butt"
                                                                        stroke-width="2" stroke-dasharray="0"
                                                                        class="apexcharts-area" index="0"
                                                                        clip-path="url(#gridRectMask0413663v)"
                                                                        pathTo="M 0 43.333333333333336C 2.5576923076923075 43.333333333333336 4.75 45.833333333333336 7.3076923076923075 45.833333333333336C 9.865384615384615 45.833333333333336 12.057692307692307 36.666666666666664 14.615384615384615 36.666666666666664C 17.173076923076923 36.666666666666664 19.365384615384617 47.5 21.923076923076923 47.5C 24.48076923076923 47.5 26.673076923076923 30.833333333333332 29.23076923076923 30.833333333333332C 31.788461538461537 30.833333333333332 33.980769230769226 36.666666666666664 36.53846153846153 36.666666666666664C 39.09615384615384 36.666666666666664 41.28846153846154 40.83333333333333 43.84615384615385 40.83333333333333C 46.40384615384615 40.83333333333333 48.59615384615385 37.5 51.15384615384615 37.5C 53.71153846153846 37.5 55.90384615384615 47.5 58.46153846153846 47.5C 61.01923076923077 47.5 63.21153846153845 40.83333333333333 65.76923076923076 40.83333333333333C 68.32692307692307 40.83333333333333 70.51923076923076 37.5 73.07692307692307 37.5C 75.63461538461537 37.5 77.82692307692307 44.166666666666664 80.38461538461537 44.166666666666664C 82.94230769230768 44.166666666666664 85.13461538461539 35.83333333333333 87.6923076923077 35.83333333333333C 90.25 35.83333333333333 92.4423076923077 42.5 95 42.5"
                                                                        pathFrom="M -1 50L -1 50L 7.3076923076923075 50L 14.615384615384615 50L 21.923076923076923 50L 29.23076923076923 50L 36.53846153846153 50L 43.84615384615385 50L 51.15384615384615 50L 58.46153846153846 50L 65.76923076923076 50L 73.07692307692307 50L 80.38461538461537 50L 87.6923076923077 50L 95 50"
                                                                        fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG4785"
                                                                        class="apexcharts-series-markers-wrap"
                                                                        data:realIndex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG4786" class="apexcharts-datalabels"
                                                                    data:realIndex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine4822" x1="0" y1="0"
                                                                x2="95" y2="0" stroke="#b6b6b6"
                                                                stroke-dasharray="0" stroke-width="1"
                                                                stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                            </line>
                                                            <line id="SvgjsLine4823" x1="0" y1="0"
                                                                x2="95" y2="0" stroke-dasharray="0"
                                                                stroke-width="0" stroke-linecap="butt"
                                                                class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG4824" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG4825" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG4826" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                        <g id="SvgjsG4805" class="apexcharts-yaxis" rel="0"
                                                            transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG4778" class="apexcharts-annotations"></g>
                                                    </svg>
                                                    <div class="apexcharts-legend" style="max-height: 25px;"></div>
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
                                            <span class="text-gray-600 fw-bold fs-6">92.56%</span>
                                        </td>

                                        <td class="text-end pe-0">
                                            <div id="kt_table_widget_16_chart_1_3" class="h-50px mt-n8 pe-7"
                                                data-kt-chart-color="success" style="min-height: 50px;">
                                                <div id="apexchartsn85vbi2ij"
                                                    class="apexcharts-canvas apexchartsn85vbi2ij apexcharts-theme-light"
                                                    style="width: 95px; height: 50px;"><svg id="SvgjsSvg4827"
                                                        width="95" height="50" xmlns="http://www.w3.org/2000/svg"
                                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG4829" class="apexcharts-inner apexcharts-graphical"
                                                            transform="translate(0, 0)">
                                                            <defs id="SvgjsDefs4828">
                                                                <clipPath id="gridRectMaskn85vbi2ij">
                                                                    <rect id="SvgjsRect4833" width="101"
                                                                        height="52" x="-3" y="-1"
                                                                        rx="0" ry="0" opacity="1"
                                                                        stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMaskn85vbi2ij"></clipPath>
                                                                <clipPath id="nonForecastMaskn85vbi2ij"></clipPath>
                                                                <clipPath id="gridRectMarkerMaskn85vbi2ij">
                                                                    <rect id="SvgjsRect4834" width="99"
                                                                        height="54" x="-2" y="-2"
                                                                        rx="0" ry="0" opacity="1"
                                                                        stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG4841" class="apexcharts-xaxis"
                                                                transform="translate(0, 0)">
                                                                <g id="SvgjsG4842" class="apexcharts-xaxis-texts-g"
                                                                    transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG4858" class="apexcharts-grid">
                                                                <g id="SvgjsG4859" class="apexcharts-gridlines-horizontal"
                                                                    style="display: none;">
                                                                    <line id="SvgjsLine4861" x1="0"
                                                                        y1="0" x2="95" y2="0"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4862" x1="0"
                                                                        y1="5" x2="95" y2="5"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4863" x1="0"
                                                                        y1="10" x2="95" y2="10"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4864" x1="0"
                                                                        y1="15" x2="95" y2="15"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4865" x1="0"
                                                                        y1="20" x2="95" y2="20"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4866" x1="0"
                                                                        y1="25" x2="95" y2="25"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4867" x1="0"
                                                                        y1="30" x2="95" y2="30"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4868" x1="0"
                                                                        y1="35" x2="95" y2="35"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4869" x1="0"
                                                                        y1="40" x2="95" y2="40"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4870" x1="0"
                                                                        y1="45" x2="95" y2="45"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4871" x1="0"
                                                                        y1="50" x2="95" y2="50"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                </g>
                                                                <g id="SvgjsG4860" class="apexcharts-gridlines-vertical"
                                                                    style="display: none;"></g>
                                                                <line id="SvgjsLine4873" x1="0" y1="50"
                                                                    x2="95" y2="50" stroke="transparent"
                                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine4872" x1="0" y1="1"
                                                                    x2="0" y2="50" stroke="transparent"
                                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG4835"
                                                                class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG4836" class="apexcharts-series"
                                                                    seriesName="NetxProfit" data:longestSeries="true"
                                                                    rel="1" data:realIndex="0">
                                                                    <path id="SvgjsPath4839"
                                                                        d="M 0 50L 0 43.333333333333336C 2.5576923076923075 43.333333333333336 4.75 45 7.3076923076923075 45C 9.865384615384615 45 12.057692307692307 36.666666666666664 14.615384615384615 36.666666666666664C 17.173076923076923 36.666666666666664 19.365384615384617 47.5 21.923076923076923 47.5C 24.48076923076923 47.5 26.673076923076923 30.833333333333332 29.23076923076923 30.833333333333332C 31.788461538461537 30.833333333333332 33.980769230769226 36.666666666666664 36.53846153846153 36.666666666666664C 39.09615384615384 36.666666666666664 41.28846153846154 40.83333333333333 43.84615384615385 40.83333333333333C 46.40384615384615 40.83333333333333 48.59615384615385 38.33333333333333 51.15384615384615 38.33333333333333C 53.71153846153846 38.33333333333333 55.90384615384615 47.5 58.46153846153846 47.5C 61.01923076923077 47.5 63.21153846153845 40.83333333333333 65.76923076923076 40.83333333333333C 68.32692307692307 40.83333333333333 70.51923076923076 37.5 73.07692307692307 37.5C 75.63461538461537 37.5 77.82692307692307 43.333333333333336 80.38461538461537 43.333333333333336C 82.94230769230768 43.333333333333336 85.13461538461539 35.83333333333333 87.6923076923077 35.83333333333333C 90.25 35.83333333333333 92.4423076923077 42.5 95 42.5C 95 42.5 95 42.5 95 50M 95 42.5z"
                                                                        fill="rgba(255,255,255,1)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="butt"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-area" index="0"
                                                                        clip-path="url(#gridRectMaskn85vbi2ij)"
                                                                        pathTo="M 0 50L 0 43.333333333333336C 2.5576923076923075 43.333333333333336 4.75 45 7.3076923076923075 45C 9.865384615384615 45 12.057692307692307 36.666666666666664 14.615384615384615 36.666666666666664C 17.173076923076923 36.666666666666664 19.365384615384617 47.5 21.923076923076923 47.5C 24.48076923076923 47.5 26.673076923076923 30.833333333333332 29.23076923076923 30.833333333333332C 31.788461538461537 30.833333333333332 33.980769230769226 36.666666666666664 36.53846153846153 36.666666666666664C 39.09615384615384 36.666666666666664 41.28846153846154 40.83333333333333 43.84615384615385 40.83333333333333C 46.40384615384615 40.83333333333333 48.59615384615385 38.33333333333333 51.15384615384615 38.33333333333333C 53.71153846153846 38.33333333333333 55.90384615384615 47.5 58.46153846153846 47.5C 61.01923076923077 47.5 63.21153846153845 40.83333333333333 65.76923076923076 40.83333333333333C 68.32692307692307 40.83333333333333 70.51923076923076 37.5 73.07692307692307 37.5C 75.63461538461537 37.5 77.82692307692307 43.333333333333336 80.38461538461537 43.333333333333336C 82.94230769230768 43.333333333333336 85.13461538461539 35.83333333333333 87.6923076923077 35.83333333333333C 90.25 35.83333333333333 92.4423076923077 42.5 95 42.5C 95 42.5 95 42.5 95 50M 95 42.5z"
                                                                        pathFrom="M -1 50L -1 50L 7.3076923076923075 50L 14.615384615384615 50L 21.923076923076923 50L 29.23076923076923 50L 36.53846153846153 50L 43.84615384615385 50L 51.15384615384615 50L 58.46153846153846 50L 65.76923076923076 50L 73.07692307692307 50L 80.38461538461537 50L 87.6923076923077 50L 95 50">
                                                                    </path>
                                                                    <path id="SvgjsPath4840"
                                                                        d="M 0 43.333333333333336C 2.5576923076923075 43.333333333333336 4.75 45 7.3076923076923075 45C 9.865384615384615 45 12.057692307692307 36.666666666666664 14.615384615384615 36.666666666666664C 17.173076923076923 36.666666666666664 19.365384615384617 47.5 21.923076923076923 47.5C 24.48076923076923 47.5 26.673076923076923 30.833333333333332 29.23076923076923 30.833333333333332C 31.788461538461537 30.833333333333332 33.980769230769226 36.666666666666664 36.53846153846153 36.666666666666664C 39.09615384615384 36.666666666666664 41.28846153846154 40.83333333333333 43.84615384615385 40.83333333333333C 46.40384615384615 40.83333333333333 48.59615384615385 38.33333333333333 51.15384615384615 38.33333333333333C 53.71153846153846 38.33333333333333 55.90384615384615 47.5 58.46153846153846 47.5C 61.01923076923077 47.5 63.21153846153845 40.83333333333333 65.76923076923076 40.83333333333333C 68.32692307692307 40.83333333333333 70.51923076923076 37.5 73.07692307692307 37.5C 75.63461538461537 37.5 77.82692307692307 43.333333333333336 80.38461538461537 43.333333333333336C 82.94230769230768 43.333333333333336 85.13461538461539 35.83333333333333 87.6923076923077 35.83333333333333C 90.25 35.83333333333333 92.4423076923077 42.5 95 42.5"
                                                                        fill="none" fill-opacity="1" stroke="#50cd89"
                                                                        stroke-opacity="1" stroke-linecap="butt"
                                                                        stroke-width="2" stroke-dasharray="0"
                                                                        class="apexcharts-area" index="0"
                                                                        clip-path="url(#gridRectMaskn85vbi2ij)"
                                                                        pathTo="M 0 43.333333333333336C 2.5576923076923075 43.333333333333336 4.75 45 7.3076923076923075 45C 9.865384615384615 45 12.057692307692307 36.666666666666664 14.615384615384615 36.666666666666664C 17.173076923076923 36.666666666666664 19.365384615384617 47.5 21.923076923076923 47.5C 24.48076923076923 47.5 26.673076923076923 30.833333333333332 29.23076923076923 30.833333333333332C 31.788461538461537 30.833333333333332 33.980769230769226 36.666666666666664 36.53846153846153 36.666666666666664C 39.09615384615384 36.666666666666664 41.28846153846154 40.83333333333333 43.84615384615385 40.83333333333333C 46.40384615384615 40.83333333333333 48.59615384615385 38.33333333333333 51.15384615384615 38.33333333333333C 53.71153846153846 38.33333333333333 55.90384615384615 47.5 58.46153846153846 47.5C 61.01923076923077 47.5 63.21153846153845 40.83333333333333 65.76923076923076 40.83333333333333C 68.32692307692307 40.83333333333333 70.51923076923076 37.5 73.07692307692307 37.5C 75.63461538461537 37.5 77.82692307692307 43.333333333333336 80.38461538461537 43.333333333333336C 82.94230769230768 43.333333333333336 85.13461538461539 35.83333333333333 87.6923076923077 35.83333333333333C 90.25 35.83333333333333 92.4423076923077 42.5 95 42.5"
                                                                        pathFrom="M -1 50L -1 50L 7.3076923076923075 50L 14.615384615384615 50L 21.923076923076923 50L 29.23076923076923 50L 36.53846153846153 50L 43.84615384615385 50L 51.15384615384615 50L 58.46153846153846 50L 65.76923076923076 50L 73.07692307692307 50L 80.38461538461537 50L 87.6923076923077 50L 95 50"
                                                                        fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG4837"
                                                                        class="apexcharts-series-markers-wrap"
                                                                        data:realIndex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG4838" class="apexcharts-datalabels"
                                                                    data:realIndex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine4874" x1="0" y1="0"
                                                                x2="95" y2="0" stroke="#b6b6b6"
                                                                stroke-dasharray="0" stroke-width="1"
                                                                stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                            </line>
                                                            <line id="SvgjsLine4875" x1="0" y1="0"
                                                                x2="95" y2="0" stroke-dasharray="0"
                                                                stroke-width="0" stroke-linecap="butt"
                                                                class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG4876" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG4877" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG4878" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                        <g id="SvgjsG4857" class="apexcharts-yaxis" rel="0"
                                                            transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG4830" class="apexcharts-annotations"></g>
                                                    </svg>
                                                    <div class="apexcharts-legend" style="max-height: 25px;"></div>
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
                                                    <img src="/metronic8/demo1/assets/media/avatars/300-7.jpg"
                                                        class="" alt="">
                                                </div>


                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Cody
                                                        Fishers</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Mexico</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-end pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">63.08%</span>
                                        </td>

                                        <td class="text-end pe-0">
                                            <div id="kt_table_widget_16_chart_1_4" class="h-50px mt-n8 pe-7"
                                                data-kt-chart-color="success" style="min-height: 50px;">
                                                <div id="apexchartsjt4mihv8"
                                                    class="apexcharts-canvas apexchartsjt4mihv8 apexcharts-theme-light"
                                                    style="width: 95px; height: 50px;"><svg id="SvgjsSvg4879"
                                                        width="95" height="50" xmlns="http://www.w3.org/2000/svg"
                                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG4881" class="apexcharts-inner apexcharts-graphical"
                                                            transform="translate(0, 0)">
                                                            <defs id="SvgjsDefs4880">
                                                                <clipPath id="gridRectMaskjt4mihv8">
                                                                    <rect id="SvgjsRect4885" width="101"
                                                                        height="52" x="-3" y="-1"
                                                                        rx="0" ry="0" opacity="1"
                                                                        stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMaskjt4mihv8"></clipPath>
                                                                <clipPath id="nonForecastMaskjt4mihv8"></clipPath>
                                                                <clipPath id="gridRectMarkerMaskjt4mihv8">
                                                                    <rect id="SvgjsRect4886" width="99"
                                                                        height="54" x="-2" y="-2"
                                                                        rx="0" ry="0" opacity="1"
                                                                        stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="SvgjsG4893" class="apexcharts-xaxis"
                                                                transform="translate(0, 0)">
                                                                <g id="SvgjsG4894" class="apexcharts-xaxis-texts-g"
                                                                    transform="translate(0, 4)"></g>
                                                            </g>
                                                            <g id="SvgjsG4910" class="apexcharts-grid">
                                                                <g id="SvgjsG4911" class="apexcharts-gridlines-horizontal"
                                                                    style="display: none;">
                                                                    <line id="SvgjsLine4913" x1="0"
                                                                        y1="0" x2="95" y2="0"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4914" x1="0"
                                                                        y1="5" x2="95" y2="5"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine4915" x1="0"
                                                                        y1="10" x2="95" y2="10"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine4916" x1="0"
                                                                        y1="15" x2="95" y2="15"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine4917" x1="0"
                                                                        y1="20" x2="95" y2="20"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine4918" x1="0"
                                                                        y1="25" x2="95" y2="25"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine4919" x1="0"
                                                                        y1="30" x2="95" y2="30"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine4920" x1="0"
                                                                        y1="35" x2="95" y2="35"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine4921" x1="0"
                                                                        y1="40" x2="95" y2="40"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine4922" x1="0"
                                                                        y1="45" x2="95" y2="45"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine4923" x1="0"
                                                                        y1="50" x2="95" y2="50"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG4912" class="apexcharts-gridlines-vertical"
                                                                    style="display: none;"></g>
                                                                <line id="SvgjsLine4925" x1="0" y1="50"
                                                                    x2="95" y2="50" stroke="transparent"
                                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine4924" x1="0" y1="1"
                                                                    x2="0" y2="50" stroke="transparent"
                                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG4887"
                                                                class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG4888" class="apexcharts-series"
                                                                    seriesName="NetxProfit" data:longestSeries="true"
                                                                    rel="1" data:realIndex="0">
                                                                    <path id="SvgjsPath4891"
                                                                        d="M 0 50L 0 40C 2.5576923076923075 40 4.75 45.833333333333336 7.3076923076923075 45.833333333333336C 9.865384615384615 45.833333333333336 12.057692307692307 30.833333333333332 14.615384615384615 30.833333333333332C 17.173076923076923 30.833333333333332 19.365384615384617 40 21.923076923076923 40C 24.48076923076923 40 26.673076923076923 32.5 29.23076923076923 32.5C 31.788461538461537 32.5 33.980769230769226 42.5 36.53846153846153 42.5C 39.09615384615384 42.5 41.28846153846154 35.83333333333333 43.84615384615385 35.83333333333333C 46.40384615384615 35.83333333333333 48.59615384615385 33.33333333333333 51.15384615384615 33.33333333333333C 53.71153846153846 33.33333333333333 55.90384615384615 46.666666666666664 58.46153846153846 46.666666666666664C 61.01923076923077 46.666666666666664 63.21153846153845 30 65.76923076923076 30C 68.32692307692307 30 70.51923076923076 42.5 73.07692307692307 42.5C 75.63461538461537 42.5 77.82692307692307 39.166666666666664 80.38461538461537 39.166666666666664C 82.94230769230768 39.166666666666664 85.13461538461539 35 87.6923076923077 35C 90.25 35 92.4423076923077 42.5 95 42.5C 95 42.5 95 42.5 95 50M 95 42.5z"
                                                                        fill="rgba(255,255,255,1)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="butt"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-area" index="0"
                                                                        clip-path="url(#gridRectMaskjt4mihv8)"
                                                                        pathTo="M 0 50L 0 40C 2.5576923076923075 40 4.75 45.833333333333336 7.3076923076923075 45.833333333333336C 9.865384615384615 45.833333333333336 12.057692307692307 30.833333333333332 14.615384615384615 30.833333333333332C 17.173076923076923 30.833333333333332 19.365384615384617 40 21.923076923076923 40C 24.48076923076923 40 26.673076923076923 32.5 29.23076923076923 32.5C 31.788461538461537 32.5 33.980769230769226 42.5 36.53846153846153 42.5C 39.09615384615384 42.5 41.28846153846154 35.83333333333333 43.84615384615385 35.83333333333333C 46.40384615384615 35.83333333333333 48.59615384615385 33.33333333333333 51.15384615384615 33.33333333333333C 53.71153846153846 33.33333333333333 55.90384615384615 46.666666666666664 58.46153846153846 46.666666666666664C 61.01923076923077 46.666666666666664 63.21153846153845 30 65.76923076923076 30C 68.32692307692307 30 70.51923076923076 42.5 73.07692307692307 42.5C 75.63461538461537 42.5 77.82692307692307 39.166666666666664 80.38461538461537 39.166666666666664C 82.94230769230768 39.166666666666664 85.13461538461539 35 87.6923076923077 35C 90.25 35 92.4423076923077 42.5 95 42.5C 95 42.5 95 42.5 95 50M 95 42.5z"
                                                                        pathFrom="M -1 50L -1 50L 7.3076923076923075 50L 14.615384615384615 50L 21.923076923076923 50L 29.23076923076923 50L 36.53846153846153 50L 43.84615384615385 50L 51.15384615384615 50L 58.46153846153846 50L 65.76923076923076 50L 73.07692307692307 50L 80.38461538461537 50L 87.6923076923077 50L 95 50">
                                                                    </path>
                                                                    <path id="SvgjsPath4892"
                                                                        d="M 0 40C 2.5576923076923075 40 4.75 45.833333333333336 7.3076923076923075 45.833333333333336C 9.865384615384615 45.833333333333336 12.057692307692307 30.833333333333332 14.615384615384615 30.833333333333332C 17.173076923076923 30.833333333333332 19.365384615384617 40 21.923076923076923 40C 24.48076923076923 40 26.673076923076923 32.5 29.23076923076923 32.5C 31.788461538461537 32.5 33.980769230769226 42.5 36.53846153846153 42.5C 39.09615384615384 42.5 41.28846153846154 35.83333333333333 43.84615384615385 35.83333333333333C 46.40384615384615 35.83333333333333 48.59615384615385 33.33333333333333 51.15384615384615 33.33333333333333C 53.71153846153846 33.33333333333333 55.90384615384615 46.666666666666664 58.46153846153846 46.666666666666664C 61.01923076923077 46.666666666666664 63.21153846153845 30 65.76923076923076 30C 68.32692307692307 30 70.51923076923076 42.5 73.07692307692307 42.5C 75.63461538461537 42.5 77.82692307692307 39.166666666666664 80.38461538461537 39.166666666666664C 82.94230769230768 39.166666666666664 85.13461538461539 35 87.6923076923077 35C 90.25 35 92.4423076923077 42.5 95 42.5"
                                                                        fill="none" fill-opacity="1"
                                                                        stroke="#50cd89" stroke-opacity="1"
                                                                        stroke-linecap="butt" stroke-width="2"
                                                                        stroke-dasharray="0" class="apexcharts-area"
                                                                        index="0"
                                                                        clip-path="url(#gridRectMaskjt4mihv8)"
                                                                        pathTo="M 0 40C 2.5576923076923075 40 4.75 45.833333333333336 7.3076923076923075 45.833333333333336C 9.865384615384615 45.833333333333336 12.057692307692307 30.833333333333332 14.615384615384615 30.833333333333332C 17.173076923076923 30.833333333333332 19.365384615384617 40 21.923076923076923 40C 24.48076923076923 40 26.673076923076923 32.5 29.23076923076923 32.5C 31.788461538461537 32.5 33.980769230769226 42.5 36.53846153846153 42.5C 39.09615384615384 42.5 41.28846153846154 35.83333333333333 43.84615384615385 35.83333333333333C 46.40384615384615 35.83333333333333 48.59615384615385 33.33333333333333 51.15384615384615 33.33333333333333C 53.71153846153846 33.33333333333333 55.90384615384615 46.666666666666664 58.46153846153846 46.666666666666664C 61.01923076923077 46.666666666666664 63.21153846153845 30 65.76923076923076 30C 68.32692307692307 30 70.51923076923076 42.5 73.07692307692307 42.5C 75.63461538461537 42.5 77.82692307692307 39.166666666666664 80.38461538461537 39.166666666666664C 82.94230769230768 39.166666666666664 85.13461538461539 35 87.6923076923077 35C 90.25 35 92.4423076923077 42.5 95 42.5"
                                                                        pathFrom="M -1 50L -1 50L 7.3076923076923075 50L 14.615384615384615 50L 21.923076923076923 50L 29.23076923076923 50L 36.53846153846153 50L 43.84615384615385 50L 51.15384615384615 50L 58.46153846153846 50L 65.76923076923076 50L 73.07692307692307 50L 80.38461538461537 50L 87.6923076923077 50L 95 50"
                                                                        fill-rule="evenodd"></path>
                                                                    <g id="SvgjsG4889"
                                                                        class="apexcharts-series-markers-wrap"
                                                                        data:realIndex="0"></g>
                                                                </g>
                                                                <g id="SvgjsG4890" class="apexcharts-datalabels"
                                                                    data:realIndex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine4926" x1="0" y1="0"
                                                                x2="95" y2="0" stroke="#b6b6b6"
                                                                stroke-dasharray="0" stroke-width="1"
                                                                stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                            </line>
                                                            <line id="SvgjsLine4927" x1="0" y1="0"
                                                                x2="95" y2="0" stroke-dasharray="0"
                                                                stroke-width="0" stroke-linecap="butt"
                                                                class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG4928" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG4929" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG4930" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                        <g id="SvgjsG4909" class="apexcharts-yaxis" rel="0"
                                                            transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG4882" class="apexcharts-annotations"></g>
                                                    </svg>
                                                    <div class="apexcharts-legend" style="max-height: 25px;"></div>
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
                                                    <img src="/metronic8/demo1/assets/media/avatars/300-25.jpg"
                                                        class="" alt="">
                                                </div>


                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Brooklyn
                                                        Simmons</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Poland</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-end pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">85.23%</span>
                                        </td>

                                        <td class="text-end pe-0">
                                            <div id="kt_table_widget_16_chart_2_1" class="h-50px mt-n8 pe-7"
                                                data-kt-chart-color="success" style="min-height: 50px;">
                                                <div id="apexcharts1kmnjt5y"
                                                    class="apexcharts-canvas apexcharts1kmnjt5y"
                                                    style="width: 0px; height: 50px;"><svg id="SvgjsSvg4979"
                                                        width="0" height="50"
                                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG4982" class="apexcharts-annotations"></g>
                                                        <g id="SvgjsG4981"
                                                            class="apexcharts-inner apexcharts-graphical">
                                                            <defs id="SvgjsDefs4980"></defs>
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
                                                    <img src="/metronic8/demo1/assets/media/avatars/300-24.jpg"
                                                        class="" alt="">
                                                </div>


                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Esther
                                                        Howard</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Mexico</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-end pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">74.83%</span>
                                        </td>

                                        <td class="text-end pe-0">
                                            <div id="kt_table_widget_16_chart_2_2" class="h-50px mt-n8 pe-7"
                                                data-kt-chart-color="danger" style="min-height: 50px;">
                                                <div id="apexchartswvzmco5i"
                                                    class="apexcharts-canvas apexchartswvzmco5i"
                                                    style="width: 0px; height: 50px;"><svg id="SvgjsSvg4983"
                                                        width="0" height="50"
                                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG4986" class="apexcharts-annotations"></g>
                                                        <g id="SvgjsG4985"
                                                            class="apexcharts-inner apexcharts-graphical">
                                                            <defs id="SvgjsDefs4984"></defs>
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
                                                    <img src="/metronic8/demo1/assets/media/avatars/300-20.jpg"
                                                        class="" alt="">
                                                </div>


                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Annette
                                                        Black</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Haiti</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-end pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">90.06%</span>
                                        </td>

                                        <td class="text-end pe-0">
                                            <div id="kt_table_widget_16_chart_2_3" class="h-50px mt-n8 pe-7"
                                                data-kt-chart-color="success" style="min-height: 50px;">
                                                <div id="apexcharts2zydibot"
                                                    class="apexcharts-canvas apexcharts2zydibot"
                                                    style="width: 0px; height: 50px;"><svg id="SvgjsSvg4987"
                                                        width="0" height="50"
                                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG4990" class="apexcharts-annotations"></g>
                                                        <g id="SvgjsG4989"
                                                            class="apexcharts-inner apexcharts-graphical">
                                                            <defs id="SvgjsDefs4988"></defs>
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
                                                    <img src="/metronic8/demo1/assets/media/avatars/300-17.jpg"
                                                        class="" alt="">
                                                </div>


                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Marvin
                                                        McKinney</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Monaco</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-end pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">54.08%</span>
                                        </td>

                                        <td class="text-end pe-0">
                                            <div id="kt_table_widget_16_chart_2_4" class="h-50px mt-n8 pe-7"
                                                data-kt-chart-color="success" style="min-height: 50px;">
                                                <div id="apexcharts3pypd3zp"
                                                    class="apexcharts-canvas apexcharts3pypd3zp"
                                                    style="width: 0px; height: 50px;"><svg id="SvgjsSvg4991"
                                                        width="0" height="50"
                                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG4994" class="apexcharts-annotations"></g>
                                                        <g id="SvgjsG4993"
                                                            class="apexcharts-inner apexcharts-graphical">
                                                            <defs id="SvgjsDefs4992"></defs>
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
                                                    <img src="/metronic8/demo1/assets/media/avatars/300-11.jpg"
                                                        class="" alt="">
                                                </div>


                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Jacob
                                                        Jones</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">New York</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-end pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">52.34%</span>
                                        </td>

                                        <td class="text-end pe-0">
                                            <div id="kt_table_widget_16_chart_3_1" class="h-50px mt-n8 pe-7"
                                                data-kt-chart-color="success" style="min-height: 50px;">
                                                <div id="apexchartsbyh0egtll"
                                                    class="apexcharts-canvas apexchartsbyh0egtll"
                                                    style="width: 0px; height: 50px;"><svg id="SvgjsSvg4931"
                                                        width="0" height="50"
                                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG4934" class="apexcharts-annotations"></g>
                                                        <g id="SvgjsG4933"
                                                            class="apexcharts-inner apexcharts-graphical">
                                                            <defs id="SvgjsDefs4932"></defs>
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
                                                    <img src="/metronic8/demo1/assets/media/avatars/300-23.jpg"
                                                        class="" alt="">
                                                </div>


                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Ronald
                                                        Richards</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Madrid</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-end pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">77.65%</span>
                                        </td>

                                        <td class="text-end pe-0">
                                            <div id="kt_table_widget_16_chart_3_2" class="h-50px mt-n8 pe-7"
                                                data-kt-chart-color="danger" style="min-height: 50px;">
                                                <div id="apexchartssmegdzpxi"
                                                    class="apexcharts-canvas apexchartssmegdzpxi"
                                                    style="width: 0px; height: 50px;"><svg id="SvgjsSvg4935"
                                                        width="0" height="50"
                                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG4938" class="apexcharts-annotations"></g>
                                                        <g id="SvgjsG4937"
                                                            class="apexcharts-inner apexcharts-graphical">
                                                            <defs id="SvgjsDefs4936"></defs>
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
                                                    <img src="/metronic8/demo1/assets/media/avatars/300-4.jpg"
                                                        class="" alt="">
                                                </div>


                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Leslie
                                                        Alexander</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Pune</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-end pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">82.47%</span>
                                        </td>

                                        <td class="text-end pe-0">
                                            <div id="kt_table_widget_16_chart_3_3" class="h-50px mt-n8 pe-7"
                                                data-kt-chart-color="success" style="min-height: 50px;">
                                                <div id="apexchartsqpc5ggdl"
                                                    class="apexcharts-canvas apexchartsqpc5ggdl"
                                                    style="width: 0px; height: 50px;"><svg id="SvgjsSvg4939"
                                                        width="0" height="50"
                                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG4942" class="apexcharts-annotations"></g>
                                                        <g id="SvgjsG4941"
                                                            class="apexcharts-inner apexcharts-graphical">
                                                            <defs id="SvgjsDefs4940"></defs>
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
                                                    <img src="/metronic8/demo1/assets/media/avatars/300-1.jpg"
                                                        class="" alt="">
                                                </div>


                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Courtney
                                                        Henry</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Mexico</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-end pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">67.84%</span>
                                        </td>

                                        <td class="text-end pe-0">
                                            <div id="kt_table_widget_16_chart_3_4" class="h-50px mt-n8 pe-7"
                                                data-kt-chart-color="success" style="min-height: 50px;">
                                                <div id="apexcharts6s58wl1c"
                                                    class="apexcharts-canvas apexcharts6s58wl1c"
                                                    style="width: 0px; height: 50px;"><svg id="SvgjsSvg4943"
                                                        width="0" height="50"
                                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG4946" class="apexcharts-annotations"></g>
                                                        <g id="SvgjsG4945"
                                                            class="apexcharts-inner apexcharts-graphical">
                                                            <defs id="SvgjsDefs4944"></defs>
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
                                                    <img src="/metronic8/demo1/assets/media/avatars/300-12.jpg"
                                                        class="" alt="">
                                                </div>


                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Arlene
                                                        McCoy</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">London</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-end pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">53.44%</span>
                                        </td>

                                        <td class="text-end pe-0">
                                            <div id="kt_table_widget_16_chart_4_1" class="h-50px mt-n8 pe-7"
                                                data-kt-chart-color="success" style="min-height: 50px;">
                                                <div id="apexchartsde8ockxj"
                                                    class="apexcharts-canvas apexchartsde8ockxj"
                                                    style="width: 0px; height: 50px;"><svg id="SvgjsSvg4947"
                                                        width="0" height="50"
                                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG4950" class="apexcharts-annotations"></g>
                                                        <g id="SvgjsG4949"
                                                            class="apexcharts-inner apexcharts-graphical">
                                                            <defs id="SvgjsDefs4948"></defs>
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
                                                    <img src="/metronic8/demo1/assets/media/avatars/300-21.jpg"
                                                        class="" alt="">
                                                </div>


                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Marvin
                                                        McKinneyr</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Monaco</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-end pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">74.64%</span>
                                        </td>

                                        <td class="text-end pe-0">
                                            <div id="kt_table_widget_16_chart_4_2" class="h-50px mt-n8 pe-7"
                                                data-kt-chart-color="danger" style="min-height: 50px;">
                                                <div id="apexcharts8pyuya6y"
                                                    class="apexcharts-canvas apexcharts8pyuya6y"
                                                    style="width: 0px; height: 50px;"><svg id="SvgjsSvg4951"
                                                        width="0" height="50"
                                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG4954" class="apexcharts-annotations"></g>
                                                        <g id="SvgjsG4953"
                                                            class="apexcharts-inner apexcharts-graphical">
                                                            <defs id="SvgjsDefs4952"></defs>
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
                                                    <img src="/metronic8/demo1/assets/media/avatars/300-30.jpg"
                                                        class="" alt="">
                                                </div>


                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Jacob
                                                        Jones</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">PManila</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-end pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">88.56%</span>
                                        </td>

                                        <td class="text-end pe-0">
                                            <div id="kt_table_widget_16_chart_4_3" class="h-50px mt-n8 pe-7"
                                                data-kt-chart-color="success" style="min-height: 50px;">
                                                <div id="apexcharts0z4yu6swk"
                                                    class="apexcharts-canvas apexcharts0z4yu6swk"
                                                    style="width: 0px; height: 50px;"><svg id="SvgjsSvg4955"
                                                        width="0" height="50"
                                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG4958" class="apexcharts-annotations"></g>
                                                        <g id="SvgjsG4957"
                                                            class="apexcharts-inner apexcharts-graphical">
                                                            <defs id="SvgjsDefs4956"></defs>
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
                                                    <img src="/metronic8/demo1/assets/media/avatars/300-14.jpg"
                                                        class="" alt="">
                                                </div>


                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                                        class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Esther
                                                        Howard</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Iceland</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-end pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">63.16%</span>
                                        </td>

                                        <td class="text-end pe-0">
                                            <div id="kt_table_widget_16_chart_4_4" class="h-50px mt-n8 pe-7"
                                                data-kt-chart-color="success" style="min-height: 50px;">
                                                <div id="apexchartsunz0mnln"
                                                    class="apexcharts-canvas apexchartsunz0mnln"
                                                    style="width: 0px; height: 50px;"><svg id="SvgjsSvg4959"
                                                        width="0" height="50"
                                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG4962" class="apexcharts-annotations"></g>
                                                        <g id="SvgjsG4961"
                                                            class="apexcharts-inner apexcharts-graphical">
                                                            <defs id="SvgjsDefs4960"></defs>
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
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Kiribati</span>
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
