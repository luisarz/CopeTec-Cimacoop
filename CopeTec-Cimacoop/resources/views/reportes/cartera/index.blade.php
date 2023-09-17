@extends('base.base')

@section('title')
    Administracion de Empleados
@endsection

@section('content')
    <div class="card shadow-lg mt-5">
        <div class="card-header ribbon ribbon-end ribbon-clip">

            <div class="ribbon-label fs-3">
                <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;
                Administración | {{ Session::get('name_module') }}
                <span class="ribbon-inner bg-info"></span>
            </div>
            <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                <li class="nav-item">
                    <a class="nav-link text-active-info d-flex align-items-center  active" data-bs-toggle="tab"
                        href="#tab_empresa">
                        <i class="ki-solid ki-shop fs-2 me-2"></i>
                        Créditos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-info d-flex align-items-center" data-bs-toggle="tab" href="#tabCredito">
                        <i class="ki-solid ki-price-tag fs-2 me-2"></i>

                        Cuentas
                    </a>
                </li>


            </ul>
        </div>

        <div class="card-body">

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab_empresa" role="tabpanel">

                    <div class="card shadow-lg border-2">
                        <div class="card-header">
                            <a href="/reportes/cartera-activa" target="_blank" class="btn btn-info ">Generar Reporte</a>
                            <h3>Datos de <span class="badge badge-success fs-3">Crédito</span> activas</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover  table-row-dashed fs-5     gy-2 gs-5">
                                    <thead>
                                        <tr class="fw-semibold fs-5 text-gray-800 border-bottom-2 border-gray-200">
                                            <th class="min-w-20px">No</th>
                                            <th class="min-w-20px">Desembolso</th>
                                            <th class="min-w-80px">Codigo</th>
                                            <th class="min-w-20px">Cliente</th>
                                            <th class="min-w-30px">Plazo</th>
                                            <th class="min-w-30px">Monto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($creditos as $credito)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ date('d/m/Y h:i:s a', strtotime($credito->fecha_desembolso)) }}
                                                </td>
                                                <td>{{ $credito->codigo_credito }}</td>
                                                <td>{{ $credito->nombre }}</td>
                                                <td>{{ $credito->plazo }}</td>
                                                <td>${{ number_format($credito->monto_solicitado, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{-- {{ $creditos->links('vendor.pagination.bootstrap-5') }} --}}
                        </div>
                    </div>

                </div>

                <div class="tab-pane fade" id="tabCredito" role="tabpanel">
                    <div class="card shadow-lg border-2">
                        <div class="card-header">
                            <a href="/reportes/cuentas-activa" target="_blank" class="btn btn-info ">Generar Reporte</a>
                            <h3>Datos de <span class="badge badge-success fs-3">Cuentas</span> activas</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-row-dashed fs-6     gy-2 gs-5">
                                    <thead class="thead-dark">
                                        <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                                            <th>Cuenta</th>
                                            <th>Asociado</th>
                                            <th>Saldo</th>
                                            <th>Tipo Cuenta</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cuentas as $cuenta)
                                            <tr>

                                                <td>


                                                    <span
                                                        class="badge badge-success fs-6">{{ str_pad($cuenta->numero_cuenta, 10, '0', STR_PAD_LEFT) }}</span>
                                                </td>
                                                <td>{{ $cuenta->nombre_cliente }} ({{ $cuenta->dui_cliente }})</td>
                                                <td>
                                                    @php
                                                        $saldo_cuenta = number_format($cuenta->saldo_cuenta, 2, '.', ',');
                                                        $length = strlen($saldo_cuenta);
                                                        $halfLength = (int) ($length / 3);
                                                        $maskedValue = substr($saldo_cuenta, 0, $halfLength) . str_repeat('*', $length - $halfLength);
                                                    @endphp
                                                    <span class="fs-5 fw-bold text-gray-800 me-1 lh-3">$
                                                        {{ $maskedValue }}</span>
                                                </td>
                                                <td>
                                                    {{ $cuenta->tipo_cuenta }}
                                                </td>



                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{-- {{ $cuentas->links('vendor.pagination.bootstrap-5') }} --}}
                        </div>
                    </div>

                </div>




            </div>

        </div>

    </div>
@endsection
