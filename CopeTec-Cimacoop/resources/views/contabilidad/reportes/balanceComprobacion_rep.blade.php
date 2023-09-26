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
    <style>
        .page-break {
            page-break-after: always !important;
        }
    </style>
</head>
<?php
$totalG = 0;
$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
if (isset($hasta) > 0) {
    $mes = $meses[\Carbon\Carbon::parse($hasta)->format('n') - 1];
}
?>

<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
    <div class="double-strikethrough text-uppercase">
        ASOCIACION COOPERATIVA DE AHORRO Y CREDITO LA CIMA - "CIMACOOP, DE R.L." <br>
        BALANCE DE COMPROBACION
        <br> AL {{ date('d-', strtotime($hasta)) }}{{ $mes }}{{ date('-Y', strtotime($hasta)) }} <br>
    </div>

    <div class="double-strikethrough">
        {{-- {{ $encabezado }} --}}
    </div>

    @php
        $total_pasivos_ingresos = 0;
        $saldo_activos_egresos = 0;
    @endphp

    <br>

    <table class="table table-sm fs-7 mb-1 " style="border: 1px solid rgb(255, 255, 255);">
        <thead style="border-top: 1px solid black; border-bottom: 1px solid black; font-size:18px; "
            class="font-bold fs-4">
            <tr style="font-weight:bold">
                <th style="width: 80px; text-align:rigth;" style="text-align: right;">CUENTA</th>
                <th style="width: 220px; text-align:left;">DE MAYOR </th>
                <th style="width: 100px; ">SALDO ANTERIOR
                </th>
                <th style="width: 125px; ">CARGOS</th>
                <th style="width: 125px; ">ABONOS</th>
                <th style="width: 125px; text-align:right; ">
                    SALDO ACTUAL</th>

            </tr>
        </thead>
        <tbody>

            {{-- @dd($CuentasContablesPadres); --}}
            @foreach ($formattedParents as $item)
                @if (substr($item->numero, 0, 1) == 1 || substr($item->numero, 0, 1) == '5')
                    @if ($item->totalCargos != 0 || $item->totalAbonos != 0 || $item->saldo != 0)
                        <?php
                        if (is_null($item->id_cuenta_padre)) {
                            $saldo_activos_egresos += $item->saldo;
                        }
                        ?>
                        <tr>
                            <td>{{ $item->numero }}</td>
                            <td>{{ $item->descripcion }}</td>
                            <td> @money($item->saldo_anterior) </td>
                            <td>@money($item->totalCargos)</td>
                            <td> @money($item->totalAbonos)</td>
                            <td> @money($item->saldo)</td>
                        </tr>
                    @endif
                @endif
            @endforeach
            <tr class="fs-5 border-top py-6 font-bold">
                <td></td>
                <td colspan="2" class="text-center"><b>TOTAL ACTIVOS Y EGRESOS</b></td>
                <td>
                </td>
                <td>
                </td>
                <td
                    style="text-align: right; border-bottom: 2px solid rgb(0, 0, 0) !important; border-top: 2px solid rgb(0, 0, 0) !important;
                border-style: double;">
                    @money($saldo_activos_egresos)

                </td>
            </tr>

        </tbody>
    </table>
    <div class="page-break"></div>
    <div class="double-strikethrough text-uppercase">
        ASOCIACION COOPERATIVA DE AHORRO Y CREDITO LA CIMA - "CIMACOOP, DE R.L." <br>
        BALANCE DE COMPROBACION
        <br> AL {{ date('d-', strtotime($hasta)) }}{{ $mes }}{{ date('-Y', strtotime($hasta)) }} <br>
    </div>

    <div class="double-strikethrough">
        {{-- {{ $encabezado }} --}}
    </div>

    <table class="table table-sm fs-7 mb-1 " style="border: 1px solid rgb(255, 255, 255);">
        <thead style="border-top: 1px solid black; border-bottom: 1px solid black; font-size:18px; "
            class="font-bold fs-4">
            <tr style="font-weight:bold">
                <th style="width: 80px; text-align:rigth;" style="text-align: right;">CUENTA</th>
                <th style="width: 220px; text-align:left;">DE MAYOR </th>
                <th style="width: 100px; ">SALDO ANTERIOR
                </th>
                <th style="width: 125px; ">CARGOS</th>
                <th style="width: 125px; ">ABONOS</th>
                <th style="width: 125px; text-align:right; ">
                    SALDO ACTUAL</th>

            </tr>
        </thead>
        <tbody>

            {{-- @dd($CuentasContablesPadres); --}}
            @foreach ($formattedParents as $item)
                <?php
                $accResult = $item;
                ?>
                @if (substr($item->numero, 0, 1) == 2 || substr($item->numero, 0, 1) == '3' || substr($item->numero, 0, 1) == '4')
                    @if ($item->totalCargos != 0 || $item->totalAbonos != 0 || $item->saldo != 0)
                        <?php
                        if (is_null($item->id_cuenta_padre)) {
                            $total_pasivos_ingresos += $item->saldo;
                        }
                        ?>
                        <tr>
                            <td>{{ $item->numero }}</td>
                            <td>{{ $item->descripcion }}</td>
                            <td> @money($item->saldo_anterior) </td>
                            <td>@money($item->totalCargos)</td>
                            <td> @money($item->totalAbonos)</td>
                            <td> @money($item->saldo)</td>
                        </tr>
                    @endif
                @endif
            @endforeach
            <tr class="fs-5 border-top py-6 font-bold">
                <td></td>
                <td colspan="2" class="text-center"><b>TOTAL PASIVOS E INGRESOS</b></td>
                <td>
                </td>
                <td>
                </td>
                <td
                    style="text-align: right; border-bottom: 2px solid rgb(0, 0, 0) !important; border-top: 2px solid rgb(0, 0, 0) !important;
                border-style: double;">
                    @money($total_pasivos_ingresos)

                </td>
            </tr>

        </tbody>
    </table>

</body>

</html>
