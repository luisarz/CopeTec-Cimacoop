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
        $total_cargos = 0;
        $total_abonos = 0;
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
            @foreach ($CuentasContablesPadres as $item)
                <?php
                $accResult = $item;
                ?>
                <tr>
                    <td>{{ $item->numero }}</td>
                    <td>{{ $item->descripcion }}</td>
                    <td>{{ $item->saldo }}</td>
                    <td>{{ $item->tipo_saldo_normal }}</td>
                    <td></td>

                </tr>
                @if ($item->children != null)
                    @foreach ($item->children as $ch)
                        <tr>
                            <td>{{ $ch->numero }}</td>
                            <td>{{ $ch->descripcion }}</td>
                            <td>{{ $ch->saldo }}</td>
                            <td>{{ $ch->tipo_saldo_normal }}</td>
                            <td></td>
                            <td></td>
                        </tr>
                        @foreach ($ch->children as $ch2)
                            <tr>
                                <td>{{ $ch2->numero }}</td>
                                <td>{{ $ch2->descripcion }}</td>
                                <td>{{ $ch2->saldo }}</td>
                                <td>{{ $ch2->tipo_saldo_normal }}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            @foreach ($ch2->children as $ch3)
                                <tr>
                                    <td>{{ $ch3->numero }}</td>
                                    <td>{{ $ch3->descripcion }}</td>
                                    <td>{{ $ch3->saldo }}</td>
                                    <td>{{ $ch3->tipo_saldo_normal }}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @foreach ($ch3->children as $ch4)
                                    <tr>
                                        <td>{{ $ch4->numero }}</td>
                                        <td>{{ $ch4->descripcion }}</td>
                                        <td>{{ $ch4->saldo }}</td>
                                        <td>{{ $ch4->tipo_saldo_normal }}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @foreach ($ch4->children as $ch5)
                                    <tr>
                                        <td>{{ $ch5->numero }}</td>
                                        <td>{{ $ch5->descripcion }}</td>
                                        <td>{{ $ch5->saldo }}</td>
                                        <td>{{ $ch5->tipo_saldo_normal }}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                @endif
            @endforeach
            {{-- @foreach ($catalogo as $cuenta)
                @if (isset($cuenta['sumas']))
                    <tr class="fs-5 font-bold">
                        <td>{{ $cuenta['numero'] }}</td>
                        <td>{{ $cuenta['descripcion'] }}</td>
                        <td style="text-align: right;">
                            @if (isset($cuenta['sumas']))
                                $ {{ number_format($cuenta['sumas']->saldo_anterior, 2) }}
                            @else
                                $0.00
                            @endif
                        </td>
                        <td style="text-align: right; ">


                            @if (isset($cuenta['sumas']))
                                $ {{ number_format($cuenta['sumas']->total_cargos, 2) }}
                                <?php $total_cargos += $cuenta['sumas']->total_cargos; ?>
                            @else
                                $0.00
                            @endif
                        </td>
                        <td style="text-align: right;  ">
                            @if (isset($cuenta['sumas']))
                                $ {{ number_format($cuenta['sumas']->total_abonos, 2) }}
                                <?php $total_abonos += $cuenta['sumas']->total_abonos; ?>
                            @else
                                $ 0.00
                            @endif
                        </td>
                        <td style="text-align: right;">
                            @if (isset($cuenta['sumas']))
                                $ {{ number_format($cuenta['sumas']->saldo, 2) }}
                                <?php $totalG += $cuenta['sumas']->saldo; ?>
                            @else
                                $ 0.00
                            @endif
                        </td>

                    </tr>
                @endif
            @endforeach --}}
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
                    $ {{ number_format($totalG, 2) }}

                </td>
            </tr>

        </tbody>
    </table>


</body>

</html>
