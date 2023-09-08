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
<?php
$totalG = 0;
$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
if (isset($hasta) > 0) {
    $mes = $meses[\Carbon\Carbon::parse($hasta)->format('n') - 1];
}
if (isset($desde) > 0) {
    $dmes = $meses[\Carbon\Carbon::parse($desde)->format('n') - 1];
}
?>

<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
    <div class="double-strikethrough text-uppercase">
        ASOCIACION COOPERATIVA DE AHORRO Y CREDITO LA CIMA - "CIMACOOP, DE R.L." <br>
        Cartera en mora
        <br> AL {{ date('d-m-Y') }} <br>

    </div>



    <br>

    <table class="table table-sm fs-7 mb-1 " style="border: 1px solid rgb(255, 255, 255);">
        <thead style="border-top: 1px solid black; border-bottom: 1px solid black; font-size:18px; "
            class="font-bold fs-4">
            <tr style="font-weight:bold" class="text-uppercase">
                <th class="min-w-20px">No</th>
                <th class="min-w-20px">Código crédito</th>
                <th class="min-w-80px">Cliente</th>
                <th class="min-w-20px">Fecha Pago</th>
                <th class="min-w-20px">Ultimo Pago Recivido</th>
                <th class="min-w-30px">Saldo</th>
                <th class="min-w-30px">Monto</th>
                <th class="min-w-30px">Días en mora</th>
            </tr>
        </thead>
        <tbody>
            @if (count($creditos) > 0)
                @foreach ($creditos as $cr)
                    <tr class="fs-5 font-bold">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cr->codigo_credito }}</td>
                        <td>{{ $cr->cliente->nombre }}</td>
                        <td>{{ \Carbon\Carbon::parse($cr->fecha_pago)->format('d') }} c/mes</td>
                        <td>{{ \Carbon\Carbon::parse($cr->ultima_fecha_pago)->format('d/m/Y') }}</td>
                        <td>@money($cr->saldo_capital)</td>
                        <td>@money($cr->monto_solicitado)</td>
                        <td>{{ \Carbon\Carbon::now()->diffInDays($cr->ultima_fecha_pago) }}
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" class="text-center">
                        <h5>No hay cuentas en mora</h5>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>


</body>

</html>
