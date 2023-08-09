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

    <div class="row" style="font-size:20px; " class="reportName">
        <div class="col-md-12 fw-bold" style="padding-left: 30px;">
            <center>
                CIMACOOP DE R.L
                <br>
                HOJA DE LIQUIDACION DE PRESTAMO
                <div class="linea-horizontal"></div>

                <div class="linea-horizontal">
                    DATOS DEL PRESTAMO
                </div>



            </center>
        </div>
        <div class="divFecha ">
            Fecha de desembolso:
            {{ \Carbon\Carbon::parse($credito->fecha_desembolso)->format('d \d\e ') . \Carbon\Carbon::parse($solicitud->fecha_solicitud)->monthName . \Carbon\Carbon::parse($solicitud->fecha_solicitud)->format(' \d\e Y') }}
        </div>
        <ul style=" list-style-type: none;">

            <li class="items_li">
                <div class="datos_solicitante_liquidacion">
                    <table class="table">

                        <tbody>
                            <tr>
                                <td>
                                    Asociado: <b> <i> {{ $solicitud->nombre }} </i><br> </b>
                                </td>
                                <td>
                                    Codigo: <b>{{ $credito->id_credito }} </b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Fecha de desembolso <b>{{ $credito->fecha_desembolso }}</b>
                                </td>
                                <td>
                                    Número prestamos: <b>{{ $credito->codigo_credito }}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Linea de Credito: &nbsp;<b>{{ $destino }}</b>
                                </td>
                                <td>
                                    Tipo garantia: <b>{{ $garantiaTipo }}</b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    Garantia: <b>{{ $solicitud->garantia }}</b>
                            </tr>
                            <tr>
                                <td>
                                    Monto: &nbsp;<b>${{ number_format($credito->monto_solicitado, 2) }}</b>
                                </td>
                                <td>
                                    Tasa: <b>{{ $solicitud->tasa }}%</b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    Plazo: &nbsp;<b>{{ $solicitud->plazo }} mes(es)</b>
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    Cuenta de ahorro Deposito:
                                    &nbsp;<b>{{ str_pad($numero_cuenta_ahorro, 10, '0', STR_PAD_LEFT) }}</b>
                                </td>
                                <td>
                                    Monto Deposito:
                                    <b>{{ str_pad('$ ' . number_format($liquido, 2), 15, '*', STR_PAD_LEFT) }}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Cuenta Aportacion:
                                    &nbsp;<b>{{ str_pad($numero_cuenta_aportacion, 10, '0', STR_PAD_LEFT) }}</b>
                                </td>
                                <td>
                                    Monto Deposito:
                                    <b>{{ str_pad('$ ' . number_format($credito->aportacion_credito, 2), 15, '*', STR_PAD_LEFT) }}</b>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            <li>

            <li>
                <div class="linea-horizontal">
                    Detalles liquidación
                </div>
                <hr>
                <span class="item-solicitud"></span>
                <div class="datos_solicitante_liquidacion">
                    <table class="table w-100">
                        <thead style="text-align: center; font-size:18px;">
                            <tr>
                                <th class="min-w-150px fw-bold"> CODIGO</th>
                                <th class="min-w-200px fw-bold">DESCRIPCION</th>
                                <th class="min-w-150px fw-bold">MOV.1</th>
                                <th class="min-w-150px fw-bold">MOV.2</th>
                            </tr>
                        </thead>

                        <tbody class=" fs-1 text-black-800">
                            @foreach ($liquidaciones as $decuento)
                                <tr>
                                    <td style="text-align: left; padding-left:5px;">
                                        {{ $decuento->numero != 0 ? $decuento->numero : '' }}</td>
                                    <td style="text-align: left; padding-left:5px;">{{ $decuento->descripcion }}</td>
                                    <td style="text-align: right;  padding-right:5px;">
                                        {{ $decuento->monto_debe != 0 ? '$ ' . number_format($decuento->monto_debe, 2) : '-' }}
                                    </td>

                                    @if ($liquido == $decuento->monto_haber)
                                        <td style="text-align: right; padding-right:5px;" class="fw-bold">
                                            {{ $decuento->monto_haber != 0 ? '$ ' . number_format($decuento->monto_haber, 2) : '-' }}
                                        </td>
                                    @else
                                        <td style="text-align: right; padding-right:5px;">
                                            {{ $decuento->monto_haber != 0 ? '$ ' . number_format($decuento->monto_haber, 2) : '-' }}
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" style="text-align: right;  padding-right:5px;">TOTAL</td>
                                <td style="text-align: right; padding-right:5px;" class="fw-bold">
                                    ${{ number_format($sumMontoDebe, 2) }}
                                </td>
                                <td style="text-align: right; padding-right:5px;" class="fw-bold">
                                    ${{ number_format($sumMontoHaber, 2) }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <br>
                <br>
                <div class="datos_solicitante_liquidacion">
                    <table class="table w-100" style="border: 1px solid white;">
                        <thead style="text-align: center; font-size:18px;">
                            <tr>
                                <th class="min-w-250px fw-bold"> <u>&nbsp;&nbsp;&nbsp; {{ $empleadoLiquido }}
                                        &nbsp;&nbsp;&nbsp;</u> </th>
                                <th class="min-w-50px fw-bold"></th>
                                <th class="min-w-150px fw-bold">F:____________________________________</th>
                                <th class="min-w-50px fw-bold"></th>
                                <th class="min-w-150px fw-bold">F:____________________________________</th>


                            </tr>
                        </thead>

                        <tbody style="text-align: center; font-size:18px;">
                            <tr>
                                <td>
                                    Elaboró
                                </td>
                                <td></td>
                                <td>
                                    Revisa y autoriza
                                </td>
                                <td></td>
                                <td>
                                    Firma de Asociado
                                </td>

                            </tr>
                        </tbody>

                    </table>
                </div>

        </ul>

    </div>


</body>

</html>
