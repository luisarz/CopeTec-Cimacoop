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
        Creditos Activos
    </div>

    <br>
    @php
        $aportaciones = 0;
        $ahorros = 0;
        $creditos = 0;
        $total = 0;
    @endphp


    <table class="fs-6 gy-2 gs-5 table">
        <thead class="thead-dark">
            <tr class="fw-semibold fs-3 border-bottom-2 border-gray-200 text-gray-800">
                <th class="fw-bold">CUENTA</th>
                <th class="fw-bold">TIPO</th>
                <th class="fw-bold">OPERACIÓN</th>
                <th class="fw-bold">MONTO</th>
                <th class="fw-bold">CLIENTE</th>
                <th class="min-w-50px fw-bold">FECHA</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movimientos as $movimiento)
                <tr>

                    <td style="text-align:center">

                        @if ($movimiento->tipo_operacion == 7)
                            <span class="badge badge-light-danger fs-6">Abono</span>
                        @else
                            {{ $movimiento->numero_cuenta == 0 ? 'Deposito' : $movimiento->numero_cuenta }}
                        @endif

                    </td>
                    <td>

                        @if ($movimiento->tipo_operacion == 7)
                            <span class="badge badge-light-danger fs-6">Crédito</span>
                        @else
                            {{ $movimiento->numero_cuenta == 0 ? $movimiento->observacion : $movimiento->descripcion_cuenta }}
                        @endif
                    </td>
                    <td>
                        @php
                            // Define an associative array to map tipo_operacion to badges
                            $operationBadges = [
                                '1' => ['badge' => 'light-success', 'icon' => null, 'label' => 'Deposito'],
                                '7' => ['badge' => 'light-info', 'icon' => null, 'label' => 'Abono a Crédito'],
                                '9' => ['badge' => 'light-info', 'icon' => null, 'label' => 'Deposito Aportaciones'],
                                '10' => ['badge' => 'light-info', 'icon' => null, 'label' => 'Depositos a plazo'],
                            ];
                        @endphp

                        @switch($movimiento->tipo_operacion)
                            @case('1')
                            @case('2')
                                <span
                                    class="badge badge-{{ $operationBadges[$movimiento->tipo_operacion]['badge'] }} fs-6">{{ $operationBadges[$movimiento->tipo_operacion]['label'] }}</span>
                            @break

                            @default
                                <span class="badge badge-{{ $operationBadges[$movimiento->tipo_operacion]['badge'] }} fs-6">
                                    @if ($operationBadges[$movimiento->tipo_operacion]['icon'])
                                        <i class="fa {{ $operationBadges[$movimiento->tipo_operacion]['icon'] }}"></i>
                                    @endif
                                    {{ $operationBadges[$movimiento->tipo_operacion]['label'] }}
                                </span>
                        @endswitch


                    </td>
                    <td style="text-align:right" class="fw-bold">
                        ${{ number_format($movimiento->monto, 2) }}
                    </td>
                    <td>
                        {{ $movimiento->cliente_transaccion }}
                        <br>
                        DUI:{{ $movimiento->dui_transaccion }}

                    </td>
                    <td>{{ $movimiento->fecha_operacion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>
