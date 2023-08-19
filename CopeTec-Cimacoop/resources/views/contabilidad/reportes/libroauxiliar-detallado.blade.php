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
        LIBRO AUXILIAR <br> AL {{ date('d-m-Y', strtotime($hasta)) }} <br>
    </div>

    <div class="double-strikethrough">
        {{ $encabezado }}
    </div>


    <br>

    <table class="table">
        <thead>

            <tr
                style="font-family: 'Courier New', Courier, monospace; border-top: 1px solid rgb(3, 3, 3);  border-bottom: 1px solid rgb(3, 3, 3); font-weight:bold;">
                <th style="width: 130px;  border-left: 1px solid rgb(255, 255, 255);">CUENTA CONTABLE </th>
                <th style="width: 210px; border-left: 1px solid rgb(255, 255, 255);"> </th>
                <th style="width: 150px; text-align: center; border-left: 1px solid rgb(255, 255, 255);">SALDO ANTERIOR
                </th>
                <th style="width: 125px; text-align: right; border-left: 1px solid rgb(255, 255, 255);">CARGOS</th>
                <th style="width: 125px; text-align: right; border-left: 1px solid rgb(255, 255, 255);">ABONOS</th>
                <th
                    style="width: 125px; text-align: right; border-left: 1px solid rgb(255, 255, 255); border-right: 1px solid rgb(255, 255, 255);">
                    SALDO ACTUAL</th>

            </tr>
        </thead>
        <tbody>




            @foreach ($catalogo as $cuenta)
                <tr style="border: 1px solid rgb(255, 255, 255);font-family: 'Courier New', Courier, monospace';">
                    <td>{{ $cuenta['numero_cuenta'] }}</td>
                    <td>{{ $cuenta['descripcion'] }}</td>
                    <td style="text-align: right;">${{ number_format($cuenta['saldo_anterior'], 2) }}</td>
                    <td
                        style="text-align: right; {{ isset($cuenta['operaciones']) ? 'border-bottom: 1px solid black;' : '' }}">
                        ${{ number_format($cuenta['cargos'], 2) }}
                    </td>
                    <td
                        style="text-align: right; {{ isset($cuenta['operaciones']) ? 'border-bottom: 1px solid blackVa;' : '' }}">
                        ${{ number_format($cuenta['abonos'], 2) }}
                    </td>

                    <td style="text-align: right;">${{ number_format($cuenta['saldo'], 2) }}</td>
                </tr>
                @if ($cuenta['operaciones'])
                    @foreach ($cuenta['operaciones'] as $operacion)
                        <tr
                            style="border: 1px solid rgb(255, 255, 255);font-family: 'Courier New', Courier, monospace';">

                            <td style="text-align: right;">
                                {{ $operacion['num_partida'] }} &nbsp;
                                {{ date('d-m-Y', strtotime($operacion['fecha_partida'])) }}

                            </td>
                            <td>
                            </td>
                            <td></td>
                            <td style="text-align: right;">
                                {{ $operacion['cargos'] > 0 ? '$' . number_format($operacion['cargos'], 2) : '' }}</td>
                            <td style="text-align: right;">
                                {{ $operacion['abonos'] > 0 ? '$' . number_format($operacion['abonos'], 2) : '' }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                @endif
            @endforeach

        </tbody>
    </table>


</body>

</html>
