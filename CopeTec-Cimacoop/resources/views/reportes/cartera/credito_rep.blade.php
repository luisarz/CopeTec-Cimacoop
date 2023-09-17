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

    <table class="table  fs-5     gy-2 gs-5">
        <thead>
            <tr class="fw-semibold fs-5 text-gray-800 border-bottom-2 border-gray-200">
                <th class="min-w-20px">No</th>
                <th class="min-w-20px">Desembolso</th>
                <th class="min-w-80px">Codigo</th>
                <th class="min-w-20px">Cliente</th>
                <th class="min-w-30px">Plazo</th>
                <th class="min-w-30px">Monto</th>
                <th class="min-w-30px">Saldo</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($creditos as $credito)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date('d/m/Y h:i:s a', strtotime($credito->fecha_desembolso)) }}
                    </td>
                    <td>{{ $credito->codigo_credito }}</td>
                    <td>{{ $credito->nombre }}</td>
                    <td>{{ $credito->plazo }} Mes(es)</td>
                    <td>${{ number_format($credito->monto_solicitado, 2) }}</td>
                    <td>${{ number_format($credito->saldo_capital, 2) }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>
