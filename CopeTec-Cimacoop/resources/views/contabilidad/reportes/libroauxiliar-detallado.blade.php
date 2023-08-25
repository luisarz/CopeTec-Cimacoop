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

  <table class="table table-sm fs-7 mb-1 pb-1" style="border: 1px solid rgb(255, 255, 255);">
        <thead style="border-top: 1px solid black; border-bottom: 1px solid black; font-size:18px; "
                class="font-bold fs-4">

          <tr>
                <th style="width: 130px;  ">CUENTA CONTABLE </th>
                <th > </th>
                <th style="width: 100px; text-align: center;">SALDO ANTERIOR
                </th>
                <th style="width: 125px; text-align: right; ">CARGOS</th>
                <th style="width: 125px; text-align: right;">ABONOS</th>
                <th
                    style="width: 125px; text-align: right;">
                    SALDO ACTUAL</th>

            </tr>
        </thead>
        <tbody>




            @foreach ($catalogo as $cuenta)
                <tr style="border: 1px solid rgb(255, 255, 255);" class="fs-5 mb-1 ">
                    <td>{{ $cuenta['numero_cuenta'] }}</td>
                    <td>{{ $cuenta['descripcion'] }}</td>
                    <td style="text-align: right;">${{ number_format($cuenta['saldo_anterior'], 2) }}</td>
                   <td style="text-align: right; {{ (isset($cuenta['operaciones']) && count($cuenta['operaciones']) > 0) ? 'border-bottom: 1px solid black;' : '' }}">

                        ${{ number_format($cuenta['cargos'], 2) }}
                    </td>
                 <td style="text-align: right; {{ (isset($cuenta['operaciones']) && count($cuenta['operaciones']) > 0) ? 'border-bottom: 1px solid black;' : '' }}">

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
