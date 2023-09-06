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
        créditos cancelados
        <br> desde {{ date('d-', strtotime($desde)) }}{{ $dmes }}{{ date('-Y', strtotime($desde)) }} AL
        {{ date('d-', strtotime($hasta)) }}{{ $mes }}{{ date('-Y', strtotime($hasta)) }} <br>
    </div>



    <br>

    <table class="table table-sm fs-7 mb-1 " style="border: 1px solid rgb(255, 255, 255);">
        <thead style="border-top: 1px solid black; border-bottom: 1px solid black; font-size:18px; "
            class="font-bold fs-4">
            <tr style="font-weight:bold" class="text-uppercase">
                <th style="width: 80px; text-align:rigth;" style="text-align: right;">Código crédito</th>
                <th style="width: 220px; text-align:left;">Cliente </th>
                <th style="width: 100px; ">fecha pago
                </th>
                <th style="width: 125px; ">Plazo</th>
                <th style="width: 125px; ">Cuota</th>
                <th style="width: 125px; text-align:right; ">
                    SALDO ACTUAL</th>
                <th style="width: 125px; ">Monto prestamo</th>

            </tr>
        </thead>
        <tbody>
            @if (count($creditos) > 0)
                @foreach ($creditos as $cr)
                    <tr class="fs-5 font-bold">
                        <td>{{ $cr->codigo_credito }}</td>
                        <td>{{ $cr->cliente->nombre }}</td>
                        <td>{{ \Carbon\Carbon::parse($cr->ultima_fecha_pago)->format('d/m/Y') }}</td>
                        <td>{{ $cr->plazo }} Meses</td>
                        <td>@money($cr->cuota)</td>
                        <td>@money($cr->saldo_capital)</td>
                        <td>@money($cr->monto_solicitado)</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" class="text-center">
                        <h5>No hay resultados en el rango de fechas seleccionado</h5>
                    </td>
                </tr>

            @endif
        </tbody>
    </table>


</body>

</html>
