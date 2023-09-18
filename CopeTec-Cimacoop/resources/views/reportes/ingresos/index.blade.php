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
                                <a href="javascript:generarReporte()" class="btn btn-primary my-1"> Imprimir</a>
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
                            @foreach ($movimientos as $cuenta)
                                <tr>
                               
                                    <td style="text-align:center">

                                        @if ($cuenta->tipo_operacion == 7)
                                            <span class="badge badge-light-danger fs-6">Crédito</span>
                                        @else
                                            {{ $cuenta->numero_cuenta == 0 ? 'Bobeda' : $cuenta->numero_cuenta }}
                                        @endif

                                    </td>
                                    <td>

                                        @if ($cuenta->tipo_operacion == 7)
                                            <span class="badge badge-light-danger fs-6">Crédito</span>
                                        @else
                                            {{ $cuenta->numero_cuenta == 0 ? 'Bobeda' : $cuenta->descripcion_cuenta }}
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            // Define an associative array to map tipo_operacion to badges
                                            $operationBadges = [
                                                '1' => ['badge' => 'light-success', 'icon' => null, 'label' => 'Deposito'],
                                                '2' => ['badge' => 'light-danger', 'icon' => null, 'label' => 'Retiro'],
                                                '3' => ['badge' => 'light-danger', 'icon' => 'fa-arrow-down text-info', 'label' => 'Recepcion'],
                                                '4' => ['badge' => 'light-danger', 'icon' => 'fa-arrow-up text-info', 'label' => 'Traslado'],
                                                '5' => ['badge' => 'light-danger', 'icon' => null, 'label' => 'Traslado a Caja'],
                                                '6' => ['badge' => 'light-danger', 'icon' => null, 'label' => 'Corte Z'],
                                                '7' => ['badge' => 'light-info', 'icon' => null, 'label' => 'Abono a Crédito'],
                                                '8' => ['badge' => 'light-info', 'icon' => null, 'label' => 'Desembolso Credito'],
                                                '9' => ['badge' => 'light-info', 'icon' => null, 'label' => 'Aportaciones'],
                                                '10' => ['badge' => 'light-info', 'icon' => null, 'label' => 'Depositos a plazo'],

                                            ];
                                        @endphp

                                        @switch($cuenta->tipo_operacion)
                                            @case('1')
                                            @case('2')
                                                <span
                                                    class="badge badge-{{ $operationBadges[$cuenta->tipo_operacion]['badge'] }} fs-6">{{ $operationBadges[$cuenta->tipo_operacion]['label'] }}</span>
                                                @if ($cuenta->id_cuenta_destino != null)
                                                    <span
                                                        class="badge badge-{{ $operationBadges[$cuenta->tipo_operacion]['badge'] }} fs-6">-Transferencia
                                                        Tercero</span>
                                                @endif
                                            @break

                                            @default
                                                <span
                                                    class="badge badge-{{ $operationBadges[$cuenta->tipo_operacion]['badge'] }} fs-6">
                                                    @if ($operationBadges[$cuenta->tipo_operacion]['icon'])
                                                        <i class="fa {{ $operationBadges[$cuenta->tipo_operacion]['icon'] }}"></i>
                                                    @endif
                                                    {{ $operationBadges[$cuenta->tipo_operacion]['label'] }}
                                                </span>
                                        @endswitch


                                    </td>
                                    <td style="text-align:right">


                                        @php
                                            // Define an associative array to map tipo_operacion to badge classes
                                            $operationBadges = [
                                                '1' => 'light-success',
                                                '7' => 'light-success',
                                            ];
                                        @endphp

                                        <span
                                            class="badge badge-light-{{ $operationBadges[$cuenta->tipo_operacion] ?? 'danger' }} fs-6">
                                            ${{ number_format($cuenta->monto, 2) }}
                                        </span>



                                    </td>
                                    <td>
                                        @if ($cuenta->tipo_operacion == 7)
                                            {{ $cuenta->cliente_transaccion }}
                                            <br>
                                            DUI:{{ $cuenta->dui_transaccion }}
                                        @else
                                            {{ $cuenta->nombre }}
                                        @endif
                                    </td>
                                    <td>{{ $cuenta->fecha_operacion }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $movimientos->appends(['desde'=>$desde,'hasta'=>$hasta])->links('vendor.pagination.bootstrap-5') }}

            </div>
        </div>
    </div>
@endsection
