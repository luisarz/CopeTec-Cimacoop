@extends('base.base')

@section('formName')
@endsection

@section('content')
    <div class="card shadow-lg my-3">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="ribbon-label fs-3 no-wrap" style="white-space: nowrap">
                <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i>
                | {{ Session::get('name_module') }}
                <span class="ribbon-inner bg-info"></span>
            </div>

            <div class="card-toolbar">
                <div class="form-floating col-lg-2">
                    <a href="javascript:generarReporte()" class="btn btn-primary my-1"> Imprimir</a>
                </div>
            </div>
        </div>
        <!--begin::Body-->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered   fs-5     gy-2 gs-5">
                    <thead>
                        <tr>
                            <td colspan="7"></td>
                            <td colspan="8" class="text-center table-bordered">Calificacion Crediticia en días</td>
                        </tr>
                        <tr class="fw-semibold fs-5 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="min-w-20px">No</th>
                            <th class="min-w-20px">Código crédito</th>
                            <th class="min-w-80px">Cliente</th>
                            <th class="min-w-20px">Fecha Pago</th>
                            <th class="min-w-20px">Ultimo Pago</th>
                            <th class="min-w-30px">Saldo</th>
                            <th class="min-w-30px">Monto</th>
                            <th class="min-w-30px">A1 -7 </th>
                            <th class="min-w-30px">A2 -30 </th>
                            <th class="min-w-30px">B -60 </th>
                            <th class="min-w-30px">C1 -90 </th>
                            <th class="min-w-30px">C2 -120 </th>
                            <th class="min-w-30px">D1 -150 </th>
                            <th class="min-w-30px">D2 -180 </th>
                            <th class="min-w-30px">E -180 </th>



                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        @if (count($creditos) > 0)
                            @foreach ($creditos as $cr)
                                @php
                                    $dias_mora = \Carbon\Carbon::now()->diffInDays($cr->ultima_fecha_pago);
                                @endphp
                                <tr class="fs-5 font-bold">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cr->codigo_credito }}</td>
                                    <td>{{ $cr->cliente->nombre ?? '' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($cr->fecha_pago)->format('d') }} c/mes</td>
                                    <td>{{ \Carbon\Carbon::parse($cr->ultima_fecha_pago)->format('d/m/Y') }}</td>
                                    <td>@money($cr->saldo_capital)</td>
                                    <td>@money($cr->monto_solicitado)</td>
                                    <td>
                                       {{ ($dias_mora <= 7 )? $dias_mora : '-' }}
                                    </td>
                                    <td>
                                      {{ ($dias_mora > 7 && $dias_mora <=30 )? $dias_mora : '-' }}
                                    </td>
                                    <td>
                                        {{ $dias_mora > 30 && $dias_mora <= 60 ? $dias_mora : '-' }}
                                    </td>
                                    <td>
                                      {{ $dias_mora >60 && $dias_mora <= 90 ? $dias_mora : '-' }}
                                    </td>
                                    <td>
                                        {{ $dias_mora > 90 && $dias_mora <= 120 ? $dias_mora : '-' }}
                                    </td>
                                  <td>
                                        {{ $dias_mora > 120 && $dias_mora <= 150 ? $dias_mora : '-' }}
                                    </td>
                                    <td>
                                        {{ $dias_mora > 150 && $dias_mora <= 180 ? $dias_mora : '-' }}
                                    </td>
                                    <td>
                                        {{ $dias_mora > 180  ? $dias_mora : '-' }}
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center">
                                    <h5>No hay cuentas en mora</h5>
                                </td>
                            </tr>
                        @endif
                    </tbody>

                </table>
            </div>
        </div>
        <!--end: Card Body-->
    </div>
@endsection
@section('scripts')
    <script>
        function generarReporte() {
            window.open('/reportes/cartera-mora-rep', '_blank');
        }
    </script>
@endsection
