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
        CUENTAS ACTIVAS
    </div>

    <br>

    @php
        $total = 0;
        $totalAportaciones = 0;
    @endphp
    <table class="table fs-6     gy-2 gs-5">
        <thead class="thead-dark">
            <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                <th>#</th>
                <th>Cuenta</th>
                <th>Asociado</th>
                <th>Apertura</th>
                <th>Saldo</th>
                <th>Tipo Cuenta</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cuentas as $cuenta)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <span
                            class="badge badge-success fs-6">{{ str_pad($cuenta->numero_cuenta, 10, '0', STR_PAD_LEFT) }}</span>
                    </td>
                    <td>{{ $cuenta->nombre_cliente }} ({{ $cuenta->dui_cliente }})</td>
                    <td>{{ date('d-m-Y', strtotime($cuenta->fecha_apertura)) }}</td>

                    <td style="text-align: right">
                        <span class="fs-5 fw-bold text-gray-800 me-1 lh-3">$
                            {{ number_format($cuenta->saldo_cuenta, 2) }}</span>
                    </td>
                    <td>
                        {{ $cuenta->tipo_cuenta }}
                    </td>

                    @if ($cuenta->tipo_cuenta == 'Aportaciones')
                        @php
                            $totalAportaciones += $cuenta->saldo_cuenta;
                        @endphp
                    @else
                        @php
                            $total += $cuenta->saldo_cuenta;
                        @endphp
                    @endif

                </tr>
            @endforeach
        </tbody>
    </table>
    <table>
        <tr>
            <td>
                <div class="double-strikethrough">
                    Total en cuentas de Ahorro: ${{ number_format($total, 2) }}
                </div>
            </td>
            <td>
                <div class="double-strikethrough">
                    Total en cuentas Aportaciones: ${{ number_format($totalAportaciones, 2) }}
                </div>
            </td>
                
                <td>
                    <div class="double-strikethrough">
                        Total En Cuentas: ${{ number_format($totalAportaciones + $total, 2) }}
                    </div>
                </td>
        </tr>
    </table>

  
</body>

</html>
