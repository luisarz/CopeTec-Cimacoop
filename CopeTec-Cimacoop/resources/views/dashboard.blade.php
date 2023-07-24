@extends('base.base')
@section('title')
    Dashboard
@endsection


@section('content')
    <div class="row mt-5">

        <div class="col-xl-8 ">

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
                                            class="path2"></span><span class="path3"></span><span
                                            class="path4"></span><span class="path5"></span></i>
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
                                    Aprobados </span>
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
                                    Creditos </span>
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
                                    Abonos </span>
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
                                <table class="table table-hover  align-middle ">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                            <th class="p-0 pb-3 min-w-10px text-center">#</th>
                                            <th class="p-0 pb-3 min-w-170px text-center">Fecha</th>
                                            <th class="p-0 pb-3 min-w-100px text-center">Cliente</th>
                                            <th class="p-0 pb-3 min-w-50px text-center">Cuenta.</th>
                                            <th class="p-0 pb-3 w-105px text-end pe-7">Monto</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->

                                    <!--begin::Table body-->
                                    <tbody>

                                        @foreach ($depositos as $deposito)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="p-0 pb-3 min-w-10px text-start">
                                                    {{ date('d-m-Y h:m:s', strtotime($deposito->fecha_operacion)) }}
                                                </td>
                                                <td>
                                                    {{ $deposito->nombre }}
                                                </td>

                                                <td class="text-end pe-13">
                                                    {{ $deposito->descripcion_cuenta }} <br>
                                                    {{ str_pad($deposito->numero_cuenta, 10, '*', STR_PAD_LEFT) }}


                                                </td>

                                                <td class="text-end">
                                                    ${{ number_format($deposito->monto, 2) }}

                                            </tr>
                                        @endforeach


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
                                <table class="table table-hover align-middle fs-6">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                            <th class="p-0 pb-3 min-w-10px text-center">#</th>
                                            <th class="p-0 pb-3 min-w-120px text-center">Fecha</th>
                                            <th class="p-0 pb-3 min-w-100px text-center">Cliente</th>
                                            <th class="p-0 pb-3 min-w-200px text-center">Cuenta</th>
                                            <th class="p-0 pb-3 w-50px text-end pe-7">Monto</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->

                                    <!--begin::Table body-->
                                    <tbody>

                                        @foreach ($retiros as $retiro)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="p-0 pb-3 min-w-10px text-start">
                                                    {{ date('d-m-Y h:m:s', strtotime($retiro->fecha_operacion)) }}
                                                </td>
                                                <td>
                                                    Cliente{{ $retiro->cliente_transaccion }}
                                                    <br>
                                                    DUI:{{ $retiro->dui_transaccion }}

                                                </td>

                                                <td class="text-end pe-13">
                                                    {{ $retiro->descripcion_cuenta }} <br>
                                                    {{ str_pad($retiro->numero_cuenta, 10, '*', STR_PAD_LEFT) }}


                                                </td>

                                                <td class="text-end">
                                                    ${{ number_format($retiro->monto, 2) }}

                                            </tr>
                                        @endforeach


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
                                <table class="table table-hover align-middle fs-6">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                            <th class="p-0 pb-3 min-w-10px text-center">#</th>
                                            <th class="p-0 pb-3 min-w-120px text-center">Fecha Aprobacion</th>
                                            <th class="p-0 pb-3 min-w-100px text-center">Cliente</th>
                                            <th class="p-0 pb-3 min-w-200px text-center">Credito</th>
                                            <th class="p-0 pb-3 w-120px text-end pe-7">Monto Aprobado</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->

                                    <!--begin::Table body-->
                                    <tbody>

                                        @foreach ($desembolsosPendientes as $desembolsoPendiente)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="p-0 pb-3 min-w-10px text-start">
                                                    {{ date('d-m-Y h:m:s', strtotime($desembolsoPendiente->fecha_pago)) }}
                                                </td>
                                                <td>
                                                    {{ $desembolsoPendiente->nombre }}
                                                    <br>
                                                    DUI: {{ $desembolsoPendiente->dui_cliente }} <br>
                                                    Telefono: {{ $desembolsoPendiente->telefono }} <br>


                                                </td>

                                                <td class="text-end pe-13">
                                                    {{ $desembolsoPendiente->codigo_credito }} <br>
                                                </td>

                                                <td class="text-end">
                                                    ${{ number_format($desembolsoPendiente->monto_solicitado, 2) }}

                                            </tr>
                                        @endforeach


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
                                <table class="table table-hover align-middle fs-6">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                            <th class="p-0 pb-3 min-w-10px text-center">#</th>
                                            <th class="p-0 pb-3 min-w-120px text-center">Fecha Desembolso</th>
                                            <th class="p-0 pb-3 min-w-100px text-center">Cliente</th>
                                            <th class="p-0 pb-3 min-w-200px text-center">Credito</th>
                                            <th class="p-0 pb-3 w-120px text-end pe-7">Liquido</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->

                                    <!--begin::Table body-->
                                    <tbody>

                                        @foreach ($creditos as $desembolsoPendiente)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="p-0 pb-3 min-w-10px text-start">
                                                    {{ date('d-m-Y h:m:s', strtotime($desembolsoPendiente->fecha_desembolso)) }}
                                                </td>
                                                <td>
                                                    {{ $desembolsoPendiente->nombre }}
                                                    <br>
                                                    DUI: {{ $desembolsoPendiente->dui_cliente }} <br>
                                                    Telefono: {{ $desembolsoPendiente->telefono }} <br>


                                                </td>

                                                <td class="text-end pe-13">
                                                    {{ $desembolsoPendiente->codigo_credito }} <br>
                                                </td>

                                                <td class="text-end">
                                                    ${{ number_format($desembolsoPendiente->liquido_recibido, 2) }}

                                            </tr>
                                        @endforeach


                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table container-->
                            </div>
                            <!--end::Tap pane-->


                            <!--end::Table container-->
                        </div>
                        <!--end::Tab Content-->

                        <!--begin::Tap pane-->
                        <div class="tab-pane fade" id="kt_stats_widget_16_tab_5" role="tabpanel"
                            aria-labelledby="#kt_stats_widget_16_tab_link_5">
                            <!--begin::Table container-->
                            <div class="card shadow-lg">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Ultimos 5 depositos a creditos
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table table-hover align-middle fs-6">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                                    <th class="p-0 pb-0 min-w-10px text-center">#</th>
                                                    <th class="p-0 pb-0 min-w-120px text-center">Fecha Abono</th>
                                                    <th class="p-0 pb-0 min-w-100px text-center">Cliente</th>
                                                    <th class="p-0 pb-0 min-w-200px text-center">Credito</th>
                                                    <th class="p-0 pb-0 w-120px text-end pe-7">Liquido</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->

                                            <!--begin::Table body-->
                                            <tbody>

                                                @foreach ($abonos as $desembolsoPendiente)
                                                    <tr>
                                                        <td>
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td class="p-0 pb-3 min-w-10px text-start">
                                                            {{ date('d-m-Y h:m:s', strtotime($desembolsoPendiente->fecha_desembolso)) }}
                                                        </td>
                                                        <td>
                                                            {{ $desembolsoPendiente->cliente_operacion }}
                                                            <br>
                                                            <span class="badge badge-danger fs-9">
                                                                {{ $desembolsoPendiente->dui_operacion }}</span>



                                                        </td>

                                                        <td class="text-end pe-13">
                                                            {{ $desembolsoPendiente->codigo_credito }}
                                                        </td>

                                                        <td class="text-end">
                                                            ${{ number_format($desembolsoPendiente->total_pago, 2) }}

                                                    </tr>
                                                @endforeach


                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table container-->
                                    </div>
                                </div>
                                <div class="card-footer">

                                </div>
                            </div>

                            <!--end::Tap pane-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--end::Tap pane-->
                </div>
                <!--end: Card Body-->
            </div>
            <!--end::Tables widget 16-->
        </div>

        <div class="col-xl-4 mb-5 mb-xl-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Ultimos accessos al sistema
                    </h3>
                </div>
                <div class="card-body">
                    @foreach ($bitacora as $evento)
                        <!--begin::Alert-->
                        <div class="alert alert-danger d-flex align-items-center p-5">
                            <!--begin::Icon-->
                            <i class="ki-outline ki-shield-tick fs-2hx text-success me-1">
                            </i>
                            <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column">
                                <!--begin::Title-->
                                <h6 class="mb-1 text-dark">
                                    {{ $evento->fecha }}
                                </h6>
                                <!--end::Title-->
                                <!--begin::Content-->
                                <span>{{ $evento->route }}</span>
                                <div>
                                  {{ $evento->nombre }}
                                </div>

                                {{-- {{ $evento->request }} --}}

                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Alert-->
                    @endforeach

                </div>
                <div class="card-footer">
                    {{-- {{ $bitacora->links('vendor.pagination.bootstrap-5') }} --}}

                    <div class="pagination">
                        @if ($bitacora->currentPage() > 1)
                            <a href="{{ $bitacora->previousPageUrl() }}" class="page-link" aria-label="Previous">‹</a>
                        @endif

                        @for ($i = max(1, $bitacora->currentPage() - 1); $i <= min($bitacora->lastPage(), $bitacora->currentPage() + 1); $i++)
                            <a href="{{ $bitacora->url($i) }}"
                                class="page-link{{ $i === $bitacora->currentPage() ? ' active' : '' }}">{{ $i }}</a>
                        @endfor

                        @if ($bitacora->currentPage() < $bitacora->lastPage())
                            <a href="{{ $bitacora->nextPageUrl() }}" class="page-link" aria-label="Next">›</a>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
