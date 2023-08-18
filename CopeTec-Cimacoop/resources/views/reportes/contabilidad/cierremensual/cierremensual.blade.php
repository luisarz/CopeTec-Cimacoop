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
        CIERRE MENSUAL {{ $cierreMensual->mes }}-{{ $cierreMensual->year }}
    </div>

<br>

        <table>
            <thead>
                <tr style="font-family: 'Courier New', Courier, monospace; font-size:16px; font-weigh:bold;">
                    <th style="width: 80px;">CODIGO</th>
                    <th style="width: 600px;">NOMBRE DE CUENTA</th>
                    <th style="width: 150px; text-align: center;">SALDO ANTERIOR</th>
                    <th style="width: 150px; text-align: center;">TOTAL CARGO</th>
                    <th style="width: 150px; text-align: center;">TOTAL ABONOS</th>
                    <th style="width: 150px; text-align: right;">SALDOS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detalles_cierre as $cuenta)
                    <tr style="font-family: 'Courier New', Courier, monospace; font-size:14px;">
                        <td>{{ $cuenta->numero }}</td>
                        <td>{{ $cuenta->descripcion }} /  {{ $cuenta->tipo_cuenta }}</td>

                        <td style="text-align: right;">
                           $ {{ number_format($cuenta->saldo_anterior, 2)  }}
                        </td>
                        <td style="text-align: right;">
                            $ {{ number_format($cuenta->total_cargos, 2)  }}
                        </td>
                        <td style="text-align: right;">
                           $ {{ number_format($cuenta->total_abonos, 2)  }}
                        </td>
                      
                        <td style="text-align: right;">
                            $ {{ number_format($cuenta->saldo_cierre, 2)  }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


</body>

</html>
