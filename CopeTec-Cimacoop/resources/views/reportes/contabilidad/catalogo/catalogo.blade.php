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
        CATALOGO DE CUENTAS
    </div>

<br>

        <table>
            <thead>
                <tr style="font-family: 'Courier New', Courier, monospace; font-size:16px; font-weigh:bold;">
                    <th style="width: 80px;">CODIGO</th>
                    <th style="width: 600px;">NOMBRE DE CUENTA</th>
                    <th style="width: 150px; text-align: center;">TIPO CUENTA</th>
                    <th style="width: 100px; text-align: center;">MOVIMIENTO</th>
                    <th style="width: 250px; text-align: right;">SALDO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($catalogo as $cuenta)
                    <tr style="font-family: 'Courier New', Courier, monospace; font-size:16px;">
                        <td>{{ $cuenta->numero }}</td>
                        <td>{{ $cuenta->descripcion }}</td>
                        <td style="text-align: center;">{{ $cuenta->tipoCuenta }}</td>
                        <td style="text-align: center;">{{ $cuenta->movimiento == 1 ? 'SI' : 'NO' }}</td>

                        <td style="text-align: right;">
                            @if ($cuenta->saldoHijas > 0)
                                <b>${{ number_format($cuenta->saldoHijas, 2) }}</b>
                            @else
                                ${{ number_format($cuenta->saldo, 2) }}
                            @endif
                    </tr>
                @endforeach
            </tbody>
        </table>


</body>

</html>
