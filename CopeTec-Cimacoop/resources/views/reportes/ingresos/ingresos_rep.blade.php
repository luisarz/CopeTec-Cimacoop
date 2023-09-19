<!DOCTYPE html>
<html lang="es">

<head>
    <title>CoopeTec-Administracion de cooperativas CompuTec Consultores</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        {{ $estilos }} {{ $stilosBundle }}
    </style>

</head>

<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
    <div class="double-strikethrough">
        ASOCIACION COOPERATIVA DE AHORRO Y CREDITO LA CIMA - "CIMACOOP, DE R.L." <br>
        REPORTE DE INGRESOS DEL <span class="badge badge-success"> <b> {{ date('d-m-Y h:i A', strtotime($desde)) }}
            </b><span> AL {{ date('d-m-Y h:i A', strtotime($hasta)) }}
    </div>
    <br>
    @php
        $aportaciones = 0;
        $ahorros = 0;
        $creditos = 0;
        $total = 0;
    @endphp

    <div class="container">
        <div class="alinea">
            <div class="item" style="width: 19%; height:10%">
                <div class="price" style="text-align: right">${{ number_format($sumaIngresos, 2, '.', ',') }}</div>
                <div class="description">Depositos</div>
            </div>
            <div class="item" style="width: 19%; height:10%">
                <div class="price" style="text-align: right">${{ number_format($sumaAbonoCredito, 2, '.', ',') }}</div>
                <div class="description">Abonos Créditos</div>
            </div>
            <div class="item" style="width: 20%; height:10%">
                <div class="price" style="text-align: right">
                    ${{ number_format($sumaDepositoAportaciones, 2, '.', ',') }}</div>
                <div class="description">Aportaciones</div>
            </div>
            <div class="item" style="width: 20%; height:10%">
                <div class="price" style="text-align: right">${{ number_format($sumaDepositoPlazoFijo, 2, '.', ',') }}
                </div>
                <div class="description">Dep.Plazo</div>
            </div>
            <div class="item" style="width: 20%; height:10%">
                <div class="price" style="text-align: right">
                    ${{ number_format($sumaIngresos + $sumaAbonoCredito + $sumaDepositoAportaciones + $sumaDepositoPlazoFijo, 2) }}
                </div>
                <div class="description">Total Ingresos</div>
            </div>
        </div>
    </div>
    <table class=" fs-6 gy-2 gs-5 table">
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
                                <span class="badge badge-light-danger fs-6">Abono</span>
                            @else
                                {{ $movimiento->numero_cuenta == 0 ? 'Deposito' : $movimiento->numero_cuenta }}
                            @endif
                        </td>
                        <td>
                            @php
                                $operationBadges = [
                                    '1' => ['badge' => 'light-success', 'icon' => null, 'label' => 'Deposito'],
                                    '7' => ['badge' => 'light-info', 'icon' => null, 'label' => 'Abono a Crédito'],
                                    '9' => ['badge' => 'light-info', 'icon' => null, 'label' => 'Deposito Aportaciones'],
                                    '10' => ['badge' => 'light-info', 'icon' => null, 'label' => 'Depositos a plazo'],
                                ];
                            @endphp
                            <span
                                class="badge badge-{{ $operationBadges[$movimiento->tipo_operacion]['badge'] }} fs-6">
                                @if ($operationBadges[$movimiento->tipo_operacion]['icon'])
                                    <i class="fa {{ $operationBadges[$movimiento->tipo_operacion]['icon'] }}"></i>
                                @endif
                                {{ $operationBadges[$movimiento->tipo_operacion]['label'] }}
                            </span>
                        </td>
                        <td>
                            @if ($movimiento->tipo_operacion == 7)
                                <span class="badge badge-light-danger fs-6">Crédito</span>
                            @else
                                {{ $movimiento->numero_cuenta == 0 ? $movimiento->observacion : $movimiento->descripcion_cuenta }}
                            @endif
                        </td>
                        <td style="text-align:right">
                            ${{ number_format($movimiento->monto, 2) }}
                        </td>
                        <td>
                            {{ $movimiento->cliente_transaccion }}
                            <br>
                            Dui:{{ $movimiento->dui_transaccion }}
                        </td>
                        <td>{{ date('m-d-Y h:i a', strtotime($movimiento->fecha_operacion)) }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</body>
</html>
