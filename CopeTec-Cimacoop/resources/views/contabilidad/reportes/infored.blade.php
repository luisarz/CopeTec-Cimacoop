@extends('base.base')
@section('content')
    <div class="card shadow-lg mt-5">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="d-flex align-items-center">
                <form action="/creditos/abonos" method="post" autocomplete="off" class="d-flex align-items-center">
                    {!! csrf_field() !!}
                    {{ method_field('POST') }}

                    <!--begin:Action-->
                    <div class="d-flex align-items-center">
                        <button type="button" class="btn btn-success me-5">Exportar a EXCEL</button>
                    </div>
                    <!--end:Action-->
                </form>
            </div>
            <div class="ribbon-label fs-3">
                <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i>
                Reportes - INFORED

                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="fs-1">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover  table-row-dashed fs-5     gy-2 gs-5">
                    <thead>
                        <tr class="fw-semibold fs-5 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="min-w-20px">Cliente</th>
                            <th class="min-w-20px">Tipo Persona</th>
                            <th class="min-w-80px">Numero Prestamo</th>
                            <th class="min-w-80px">Inst</th>
                            <th class="min-w-80px">Fecha Desembolso</th>
                            <th class="min-w-30px">Monto</th>
                            <th class="min-w-30px">Plazo</th>
                            <th class="min-w-30px">Saldo</th>
                            <th class="min-w-30px">Mora</th>
                            <th class="min-w-30px">Forma Pago</th>
                            <th class="min-w-30px">Tipo Relacion</th>
                            <th class="min-w-30px">Línea Crédito</th>
                            <th class="min-w-30px">Días</th>
                            <th class="min-w-30px">Ultimo Pago</th>
                            <th class="min-w-30px">Tipo Gar</th>
                            <th class="min-w-30px">Tipo Moneda</th>
                            <th class="min-w-30px">Cuota</th>
                            <th class="min-w-30px">Día</th>
                            <th class="min-w-30px">Fecha Nac</th>
                            <th class="min-w-30px">DUI</th>
                            <th class="min-w-30px">NIT</th>
                            <th class="min-w-80px">Fecha Canc</th>
                            <th class="min-w-80px">Fecha Venc</th>
                            <th class="min-w-80px">Num Cuotas</th>
                            <th class="min-w-80px">calif_act</th>
                            <th class="min-w-80px">Actividad Economica</th>
                            <th class="min-w-80px">Sexo</th>

                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($creditos as $credito)
                            <tr>
                                <td>{{ $credito->cliente->nombre }}</td>
                                <td>Natural</td>
                                <td>{{ $credito->codigo_credito }}</td>
                                <td></td>
                                <td>{{ $credito->fecha_desembolso }}</td>
                                <td>@money($credito->monto_solicitado)</td>
                                <td>{{ $credito->plazo }}</td>
                                <td>
                                    ${{ $credito->saldo_capital <= 0 ? number_format(0, 2) : number_format($credito->saldo_capital, 2) }}
                                </td>
                                <td>Pendiente Confirmar</td>
                                <td>Mensual</td>
                                <td>Deudor Directo</td>
                                <td>Comercio</td>
                                <td>
                                    @php
                                        $diasMora = (strtotime(date('Y-m-d')) - strtotime($credito->ultima_fecha_pago)) / 86400;
                                    @endphp
                                    @if ($diasMora - 30 > 0)
                                        <span class="badge badge-light-danger">{{ $diasMora - 30 }} Mora</span>
                                    @else
                                        <span class="badge badge-light-success">0</span>
                                    @endif

                                </td>
                                <td>
                                    {{ date('d-m-Y', strtotime($credito->ultima_fecha_pago)) }}
                                </td>
                                <td> N/A</td>
                                <td> Dólares</td>
                                <td>${{ number_format($credito->cuota, 2) }}</td>
                                <td>31</td>
                                <td>{{ $credito->cliente->fecha_nacimiento }}</td>
                                <td>{{ $credito->cliente->dui_cliente }}</td>
                                <td></td>
                                <td>
                                    @if ($credito->saldo_capital <= 0)
                                        {{ $credito->ultima_fecha_pago }}
                                    @endif
                                </td>
                                <td>{{ $credito->fecha_vencimiento }}</td>
                                <td>
                                    {{ $credito->plazo }}
                                </td>
                                <td> {{ $credito->cliente->score->score }}</td>
                                <td>Comerciante</td>


                                <td>{{ $credito->cliente->genero==0?'Masculino':'Femenino' }}</td>
                                <td>
                                    @if ($credito->saldo_capital <= 0)
                                        Crédito Cancelado
                                    @else
                                        @if ($credito->estado == 2)
                                            Crédito Vigente
                                        @endif
                                    @endif

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
        </div>
    </div>
@endsection

