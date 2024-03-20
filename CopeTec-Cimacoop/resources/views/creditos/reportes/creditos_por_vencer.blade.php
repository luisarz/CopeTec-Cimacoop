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
                <table class="table table-hover  table-row-dashed fs-5     gy-2 gs-5">
                    <thead>
                        <tr class="fw-semibold fs-5 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="min-w-20px">No</th>
                            <th class="min-w-20px">Código crédito</th>
                            <th class="min-w-80px">Cliente</th>
                            <th class="min-w-20px">Fecha Pago</th>
                            <th class="min-w-20px">Ultimo Pago Recivido</th>
                            <th class="min-w-30px">Saldo</th>
                            <th class="min-w-30px">Monto</th>
                            <th class="min-w-30px">Cuota</th>
                            <th class="min-w-30px">Días en mora</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        @if (count($creditos) > 0)
                            @foreach ($creditos as $cr)
                                <tr class="fs-5 font-bold">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cr->codigo_credito }}</td>
                                    <td>{{ $cr->cliente->nombre??'' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($cr->fecha_pago)->format('d') }} c/mes</td>
                                    <td>{{ \Carbon\Carbon::parse($cr->ultima_fecha_pago)->format('d/m/Y') }}</td>
                                    <td>@money($cr->saldo_capital)</td>
                                    <td>@money($cr->monto_solicitado)</td>
                                    <td>@money($cr->cuota)</td>
                                    <td>{{ \Carbon\Carbon::now()->diffInDays($cr->ultima_fecha_pago) }}
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
            window.open('/reportes/creditos/proximos-vencer-rep', '_blank');
        }
    </script>
@endsection
