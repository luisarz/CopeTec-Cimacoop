<!DOCTYPE html>
<html lang="es">
<?php
$totalC = 0;
$totalA = 0;
$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
if (count($resultSet) > 0) {
    $mes = $meses[\Carbon\Carbon::parse($resultSet[0]['partida']->fecha_partida)->format('n') - 1];
}
?>

<head>
    <title>CoopeTec-Administracion de cooperativas CompuTec Consultores</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        {{ $estilos }} {{ $stilosBundle }}
    </style>
    <style>
        .page-break {
            page-break-after: always !important;
        }
    </style>
</head>

<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
    <div class="double-strikethrough text-uppercase">
        ASOCIACION COOPERATIVA DE AHORRO Y CREDITO LA CIMA - "CIMACOOP, DE R.L." <br>
        PARTIDAS DE DIARIO GENERAL
        <br>
        {{ $mes }}
        {{ \Carbon\Carbon::parse($resultSet[0]['partida']->fecha_partida)->format('Y') }}
    </div>


    <table class="table table-sm fs-5 mb-4 pb-5" style="border: 1px solid rgb(255, 255, 255);">
        <thead style="border-top: 1px solid black; border-bottom: 1px solid black; font-size:18px; " class="font-bold">
            <tr>
                <th style="width:20%">Cuenta Contable</th>
                <th style="width:30%">Cuenta</th>
                <th>Parcial</th>
                <th>Cargos</th>
                <th>Abonos</th>
            </tr>
        </thead>
    </table>
    @foreach ($resultSet as $res)
        <table class="table table-sm fs-5 mb-4 pb-5" style="border: 1px solid rgb(255, 255, 255);">
            <tbody>
                <tr>
                    <td><b>Número de Partida: {{ $res['partida']->num_partida }}</b></td>
                    <td colspan="4"><b>Fecha: {{ $res['partida']->fecha_partida }}</b></td>
                </tr>
                @foreach ($res['formattedResults'] as $parentAccountName => $accountData)
                    <tr class="parent-row" style="height: 8px !important;">
                        <td style="width:20%">{{ $accountData['cuenta_padre'] }}</td>
                        <td style="width:30%">{{ $parentAccountName }}</td>
                        <td class="text-right" style="width:120px">


                        <td style="{{ $accountData['total_cargos'] > 0 ? 'border-bottom: 1px solid black;' : '' }}">
                            <?php
                            $totalC += $accountData['total_cargos'];
                            
                            $totalA += $accountData['total_abonos'];
                            ?>
                            @if ($accountData['total_cargos'] > 0)
                                $ {{ number_format($accountData['total_cargos'], 2) }}
                            @endif
                        </td>

                        <td style="{{ $accountData['total_abonos'] > 0 ? 'border-bottom: 1px solid black;' : '' }}">
                            @if ($accountData['total_abonos'] > 0)
                                $ {{ number_format($accountData['total_abonos'], 2) }}
                            @endif

                        </td>


                    </tr>
                    @foreach ($accountData['descripcion_cuenta_hija'] as $cuentaHija)
                        <tr class="child-row" style="height: 8px !important;">

                            <td>{{ $cuentaHija['cuenta'] }}</td>
                            <td>{{ $cuentaHija['descripcion_cuenta_hija'] }}</td>

                            <td>
                                $ {{ number_format($cuentaHija['parcial'], 2) }}

                            </td>
                            <td>
                            </td>
                            <td>

                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" style="text-align: center">TOTAL DE CARGOS Y ABONOS</td>
                    <td>${{ number_format($res['totalCargos'], 2) }}</td>
                    <td>${{ number_format($res['totalAbonos'], 2) }}</td>
                </tr>
            </tfoot>
        </table>
    @endforeach
    <table class="table table-sm fs-5 mb-4 pb-5" style="border: 1px solid rgb(255, 255, 255);">
        <tr style="border-bottom: 2px solid #000">
            <td style="width:20%" style="text-align: center"></td>
            <td colspan="2"><b>TOTAL GENERAL</b></td>
            <td class="double-strikethrough">${{ number_format($totalC, 2) }}</td>
            <td class="double-strikethrough">${{ number_format($totalA, 2) }}</td>
        </tr>
    </table>




</body>

</html>
