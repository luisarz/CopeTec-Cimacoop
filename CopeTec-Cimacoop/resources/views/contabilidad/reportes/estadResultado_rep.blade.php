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
        ESTADO DE RESULTADO <br> AL {{ date('d-m-Y', strtotime($hasta)) }} <br>
    </div>

    <div class="double-strikethrough">
        {{-- {{ $encabezado }} --}}
    </div>

    @php
        $sumIngresos = 0;
        $sumCostos = 0;
    @endphp

    <br>

    <table class="table table-sm fs-7 mb-1 " style="border: 1px solid rgb(255, 255, 255);">
        <thead class="font-bold fs-4">

            <tr>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($catalogo as $item)
                @if ($item['cuenta_padre']['descripcion'] == 'INGRESOS')
                    <tr class="fs-5">
                        <td><b> {{ $item['cuenta_padre']['descripcion'] }}</b></td>
                        <td></td>
                    </tr>
                    @foreach ($item['cuenta_hija'] as $cuentaHija)
                        <tr class="fs-4">
                            <td><b> {{ $cuentaHija['cuenta']['descripcion'] }}</b></td>
                            <td></td>
                        </tr>
                        @foreach ($cuentaHija['movimientos'] as $movimiento)
                            <tr class="fs-4">
                                <td style="padding-left: 20px"> &nbsp;{{ $movimiento['descripcion'] }}</td>
                                <td style="text-align: right">${{ number_format($movimiento['sum_abonos'], 2) }}</td>
                            </tr>
                        @endforeach
                        <tr class="fs-4">
                            <td style="padding-left: 20px"> TOTAL</td>
                            <td style="text-align: right; border-top:1px solid black;">
                                ${{ number_format($cuentaHija['totalAbonos'], 2) }}
                                @php
                                    $sumIngresos += $cuentaHija['totalAbonos'];
                                @endphp
                            </td>
                        </tr>
                    @endforeach
                    <tr class="fs-4 font-bold">
                        <td style="padding-left: 20px"> <b> TOTAL INGRESOS</b></td>
                        <td style="text-align: right; border-top:1px solid black;">
                            <b>${{ number_format($sumIngresos, 2) }}</b>
                        </td>
                    </tr>
                @else
                    <tr class="fs-5">
                        <td><b> {{ $item['cuenta_padre']['descripcion'] }}</b></td>
                        <td></td>
                    </tr>
                    @foreach ($item['cuenta_hija'] as $cuentaHija)
                        <tr class="fs-4">
                            <td><b> {{ $cuentaHija['cuenta']['descripcion'] }}</b></td>
                            <td></td>
                        </tr>
                        @foreach ($cuentaHija['movimientos'] as $movimiento)
                            <tr class="fs-4">
                                <td style="padding-left: 20px"> &nbsp;{{ $movimiento['descripcion'] }}</td>
                                <td style="text-align: right">${{ number_format($movimiento['sum_cargos'], 2) }}</td>
                            </tr>
                        @endforeach
                        <tr class="fs-4">
                            <td style="padding-left: 20px"> TOTAL</td>
                            <td style="text-align: right; border-top:1px solid black;">
                                ${{ number_format($cuentaHija['totalCargos'], 2) }}
                                @php
                                    $sumCostos += $cuentaHija['totalCargos'];
                                @endphp
                            </td>
                        </tr>
                    @endforeach
                    <tr class="fs-4 font-bold">
                        <td> <b>TOTAL DE COSTOS</b></td>
                        <td style="text-align: right; border-top:1px solid black;">
                            <b> ${{ number_format($sumCostos, 2) }} </b>
                        </td>
                    </tr>
                @endif
            @endforeach
            <tr class="fs-4 font-bold">
                <td><b> MARGEN BRUTO</b></td>
                <td style="text-align: right; border-top:1px doble black;">
                    <b> ${{ number_format($sumIngresos - $sumCostos, 2) }} </b>
                </td>
            </tr>
        </tbody>
    </table>



</body>

</html>
