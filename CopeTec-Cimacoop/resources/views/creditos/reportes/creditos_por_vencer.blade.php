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
                <form action="/reportes/creditos/proximos-vencer" method="post" autocomplete="off">
                    {!! csrf_field() !!}
                    {{ method_field('POST') }}
                    <!--begin::Input group-->
                    <div class="row">
                        <div class="form-group row ">

                            <div class="form-floating col-lg-4">
                                <input type="date" value="{{ $desde }}" name="desde" id="desde"
                                    class="form-control">
                                <label>Fecha Inicio:</label>
                            </div>
                            <div class="form-floating col-lg-4">
                                <input type="date" value="{{ $hasta }}" name="hasta" id="hasta"
                                    class="form-control">
                                <label>Fecha Fin:</label>
                            </div>
                            <div class="form-floating col-lg-2">
                                <button type="submit" class="btn btn-info my-1">
                                    Buscar
                                </button>
                            </div>
                            <div class="form-floating col-lg-2">
                                {{-- <a href="javascript:generarReporte()" class="btn btn-primary my-1">Reporte</a> --}}
                                <a href="javascript:generarReporte()" class="btn btn-primary my-1"> Reporte</a>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="form-floating col-lg-2">
                </div>
            </div>
        </div>
        <!--begin::Body-->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover  table-row-dashed fs-5     gy-2 gs-5">
                    <thead>
                        <tr class="fw-semibold fs-5 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="min-w-20px">No</th>
                            <th class="min-w-20px">Código crédito</th>
                            <th class="min-w-80px">Cliente</th>
                            <th class="min-w-20px">Fecha Pago</th>
                            <th class="min-w-20px">Ultimo Pago</th>
                            <th class="min-w-20px">Hoy</th>
                            <th class="min-w-30px">Saldo</th>
                            <th class="min-w-30px">Monto</th>
                            <th class="min-w-30px">Cuota</th>
                            <th class="min-w-30px">Dias para vencer</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        @if (count($creditos) > 0)
                            @foreach ($creditos as $cr)
                                @php
                                    $diasParaVencimiento = \Carbon\Carbon::parse($cr->ultima_fecha_pago)->diffInDays($hasta);
                                    if ($diasParaVencimiento > $days) {
                                        $diasParaVencimiento = ($diasParaVencimiento + $days) * -1;
                                    }
                                @endphp
                                @if ($diasParaVencimiento <= 1)
                                    <tr class="fs-5 font-bold">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cr->codigo_credito }}</td>
                                        <td>{{ $cr->cliente->nombre ?? '' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($cr->fecha_pago)->format('d') }} c/mes</td>
                                        <td>{{ \Carbon\Carbon::parse($cr->ultima_fecha_pago)->format('d/m/Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($cr->proxima_fecha_pago)->format('d/m/Y') }}</td>

                                        <td>@money($cr->saldo_capital)</td>
                                        <td>@money($cr->monto_solicitado)</td>
                                        <td>@money($cr->cuota)</td>
                                        <td> {{ $diasParaVencimiento }} </td>
                                    </tr>
                                @endif
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
            window.open('/reportes/creditos/proximos-vencer-rep', '_blank');
        }
    </script>
@endsection
