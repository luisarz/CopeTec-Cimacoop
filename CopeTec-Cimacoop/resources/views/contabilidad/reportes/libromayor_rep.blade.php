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
        LIBRO MAYOR <br> AL {{ date('d-m-Y', strtotime($hasta)) }} <br>
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



            @foreach ($catalogo as $cuenta)
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
                        @else
                            $ 0.00
                        @endif
                    </td>

                </tr>

                @if (isset($cuenta['movimientos']))
                    @foreach ($cuenta['movimientos'] as $operacion)
                        <tr class="fs-5 mb-1 ">
                            <td>
                            </td>
                            <td style="text-align: right; ">
                                MOVIMIENTOS DEL DIA {{ date('d-m-Y', strtotime($operacion['fecha_partida'])) }}
                            </td>
                            <td></td>
                            <td style="text-align: right;">

                                $ {{ number_format($operacion['total_cargos'], 2) }}
                            </td>
                            <td style="text-align: right;">

                                $ {{ number_format($operacion['total_abonos'], 2) }}

                            </td>

                        </tr>
                        @if ($loop->last)
                            <tr class="fs-5 border-top">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: right; border-top: 1px solid rgb(0, 0, 0) !important;">
                                    @if (isset($cuenta['sumas']))
                                        $ {{ number_format($cuenta['sumas']->total_cargos, 2) }}
                                    @endif
                                </td>
                                <td style="text-align: right; border-top: 1px solid rgb(0, 0, 0);">
                                    @if (isset($cuenta['sumas']))
                                        $ {{ number_format($cuenta['sumas']->total_abonos, 2) }}
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
            @endforeach
            <tr class="fs-5 border-top py-6 font-bold">
                <td></td>
                <td>TOTALES</td>
                <td></td>
                <td style="text-align: right; border-bottom: 2px double rgb(0, 0, 0) !important;">
                    $ {{ number_format($total_cargos, 2) }}

                </td>
                <td style="text-align: right; border-bottom: 2px double rgb(0, 0, 0) !important;">
                    $ {{ number_format($total_abonos, 2) }}

                </td>
            </tr>

        </tbody>
    </table>


</body>

</html>
