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
        MOVIMIENTOS HISTORICOS DE CUENTAS <br>
    </div>

    <div class="double-strikethrough">
        {{ $encabezado }}
    </div>


    <br>

    <table>
        <thead>
            <tr style="font-family: 'Courier New', Courier, monospace; font-size:16px; font-weigh:bold;">
                <th style="width: 110px;"># PDA</th>
                <th style="width: 150px;">Fecha</th>
                <th style="width: 250px; text-align: center;">CONCEPTO</th>
                <th style="width: 200px; text-align: center;">SALDO ANTERIOR</th>
                <th style="width: 200px; text-align: right;">CARGOS</th>
                <th style="width: 200px; text-align: right;">ABONOS</th>
                <th style="width: 250px; text-align: right;">SALDO ACTUAL</th>

            </tr>
        </thead>
        <tbody>

            <tr style="font-family: 'Courier New', Courier, monospace; font-size:14px; border: 1px solid white; ">
                <td colspan="3" style="border-top: 1px solid rgb(0, 0, 0);">
                    PERIODO: {{ $desde }} - {{ $hasta }}
                </td>
                <td style="border-top: 1px solid rgb(0, 0, 0);text-align: right;">
                    $ {{ number_format($saldo_anterior, 2) }}
                </td>
                <td style="border-top: 1px solid rgb(0, 0, 0); border-bottom: 1px solid rgb(0, 0, 0); text-align: right;">
                    $ {{ number_format($totalCargos, 2) }}
                </td>
                <td style="border-top: 1px solid rgb(0, 0, 0); border-bottom: 1px solid rgb(0, 0, 0); text-align: right;">
                    $ {{ number_format($totalAbonos, 2) }}
                </td>
                <td style="border-top: 1px solid rgb(0, 0, 0); text-align: right;">
                    $ {{ number_format($nuevoSaldo, 2) }}
                </td>
            </tr>
            @foreach ($resultado as $partida)
                <tr style="font-family: 'Courier New', Courier, monospace; font-size:14px; border: 1px solid white;">
                    <td>{{ $partida->num_partida }}</td>
                    <td>{{ date('d-m-Y', strtotime($partida->fecha_partida)) }}</td>
                    <td style="text-align: center;">
                    </td>
                    <td style="text-align: center;">
                
                    </td>

                    <td style="text-align: right;">
                        @if ($partida->cargos > 0)
                            ${{ number_format($partida->cargos, 2) }}
                        @endif
                    </td>
                    <td style="text-align: right;">

                        @if ($partida->abonos > 0)
                            ${{ number_format($partida->abonos, 2) }}
                        @endif
                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>
