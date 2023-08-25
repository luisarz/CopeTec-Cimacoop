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


    <br>

    <table class="table">
        <thead>

            <tr
                style="font-family: 'Courier New', Courier, monospace; border-top: 1px solid rgb(3, 3, 3);  border-bottom: 1px solid rgb(3, 3, 3); font-weight:bold;">
                <th style="width: 100px;  border-left: 1px solid rgb(255, 255, 255);">CUENTA CONTABLE </th>
                <th style="width: 220px; border-left: 1px solid rgb(255, 255, 255);"> </th>
                <th style="width: 100px; text-align: center; border-left: 1px solid rgb(255, 255, 255);">SALDO ANTERIOR
                </th>
                <th style="width: 125px; text-align: right; border-left: 1px solid rgb(255, 255, 255);">CARGOS</th>
                <th style="width: 125px; text-align: right; border-left: 1px solid rgb(255, 255, 255);">ABONOS</th>
                <th
                    style="width: 125px; text-align: right; border-left: 1px solid rgb(255, 255, 255); border-right: 1px solid rgb(255, 255, 255);">
                    SALDO ACTUAL</th>

            </tr>
        </thead>
        <tbody>



            @foreach ($catalogo as $cuenta)
                <tr style="border: 1px solid rgb(255, 255, 255); height: 10px !important;">
                    <td>{{ $cuenta['numero'] }}</td>
                    <td>{{ $cuenta['descripcion'] }}</td>
                    <td style="text-align: right;">
                        0.00
                    </td>
                    <td style="text-align: right;  border-top: 1px solid rgb(0, 0, 0);">
                     

                        @if (isset($cuenta['sumas']))
                            ${{ number_format($cuenta['sumas']->total_cargos, 2) }}
                            @else
                            $0.00

                        @endif
                    </td>
                   <td style="text-align: right;  border-top: 1px solid rgb(0, 0, 0);">
                        @if (isset($cuenta['sumas']))
                            ${{ number_format($cuenta['sumas']->total_abonos, 2) }}
                            @else
                            $0.00
                        @endif
                    </td>
                     <td style="text-align: right;">
                       @if (isset($cuenta['sumas']))
                            ${{ number_format($cuenta['sumas']->saldo, 2) }}
                            @else
                            $0.00
                        @endif
                    </td>

                </tr>

                @if (isset($cuenta['movimientos']))
                    @foreach ($cuenta['movimientos'] as $operacion)
                        <tr
                            style="border: 1px solid rgb(255, 255, 255);">
                            <td>
                            </td>
                            <td style="text-align: right; font-family: 'Courier New', Courier, monospace';">
                                MOVIMIENTOS DEL DIA {{ date('d-m-Y', strtotime($operacion['fecha_partida'])) }}
                            </td>
                            <td></td>
                            <td
                                style="text-align: right;border-top: 1px solid rgb(0, 0, 0);font-family: 'Courier New', Courier, monospace';">

                                ${{ number_format($operacion['total_cargos'], 2) }}
                            </td>
                            <td
                                style="text-align: right;border-top: 1px solid rgb(0, 0, 0);font-family: 'Courier New', Courier, monospace';">

                                ${{ number_format($operacion['total_abonos'], 2) }}

                            </td>
                          
                        </tr>
                    @endforeach
                @endif
            @endforeach

        </tbody>
    </table>


</body>

</html>
