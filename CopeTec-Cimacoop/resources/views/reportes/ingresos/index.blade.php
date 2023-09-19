@extends('base.base')

@section('title')
    Administracion de Empleados
@endsection

@section('content')
    <div class="card mt-5 shadow-lg">

        <div class="card shadow-lg">
            <div class="card-header ribbon ribbon-end ribbon-clip">
                <div class="ribbon-label fs-3 no-wrap" style="white-space: nowrap">
                    <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i>
                    Historial | {{ Session::get('name_module') }}
                    <span class="ribbon-inner bg-info"></span>
                </div>

                <div class="card-toolbar">
                    <form action="/reportes/ingresos" method="post" autocomplete="off">
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
                                    <a href="javascript:generarReporte()" class="btn btn-primary my-1">Reporte</a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-hover table-row-dashed fs-6 gy-2 gs-5 table">
                        <thead class="thead-dark">
                            <tr class="fw-semibold fs-3 border-bottom-2 border-gray-200 text-gray-800">
                                <th>Cuenta</th>
                                <th>Tipo</th>
                                <th>Operación</th>
                                <th>Monto</th>
                                <th>Cliente</th>
                                <th class="min-w-50px">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movimientos as $movimiento)
                                @if ($movimiento->monto > 0)
                                    <tr>
                                        <td>
                                            @if ($movimiento->tipo_operacion == 7)
                                                Abono
                                            @else
                                                {{ $movimiento->numero_cuenta == 0 ? 'Deposito' : $movimiento->numero_cuenta }}
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                                $operationBadges = [
                                                    '1' => ['badge' => 'light-info text-info', 'icon' => null, 'label' => 'Deposito'],
                                                    '7' => ['badge' => 'light-info text-info', 'icon' => null, 'label' => 'Abono a Crédito'],
                                                    '9' => ['badge' => 'light-info text-info', 'icon' => null, 'label' => 'Deposito Aportaciones'],
                                                    '10' => ['badge' => 'light-info text-info', 'icon' => null, 'label' => 'Depositos a plazo'],
                                                ];
                                            @endphp

                                            {{ $operationBadges[$movimiento->tipo_operacion]['label'] }}


                                        </td>
                                        <td>
                                            @if ($movimiento->tipo_operacion == 7)
                                                <span class="badge badge-light-success fs-6">Crédito</span>
                                            @else
                                                {{ $movimiento->numero_cuenta == 0 ? $movimiento->observacion : $movimiento->descripcion_cuenta }}
                                            @endif
                                        </td>
                                        <td style="text-align:right" class="fw-bold">
                                            ${{ number_format($movimiento->monto, 2) }}
                                        </td>
                                        <td>
                                            {{ $movimiento->cliente_transaccion }} &nbsp;
                                            ({{ $movimiento->dui_transaccion }})
                                        </td>
                                        <td>{{ date('m-d-Y h:i a', strtotime($movimiento->fecha_operacion)) }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $movimientos->appends(['desde' => $desde, 'hasta' => $hasta])->links('vendor.pagination.bootstrap-5') }}

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function generarReporte() {

            let desde = $("#desde").val();
            let hasta = $("#hasta").val();
            if (desde == '' || hasta == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Debe seleccionar un rango de fechas',
                })
                return false;
            }
            window.open('/reportes/ingresos/' + desde + '/' + hasta, '_blank');
        }
    </script>
@endsection
