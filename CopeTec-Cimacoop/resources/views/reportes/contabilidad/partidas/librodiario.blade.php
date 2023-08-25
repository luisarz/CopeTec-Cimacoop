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

<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
    @foreach ($resultSet as $res)
        <div class="double-strikethrough">
            ASOCIACION COOPERATIVA DE AHORRO Y CREDITO LA CIMA - "CIMACOOP, DE R.L." <br>
            PARTIDAS DE {{ $res['partida']->descripcion }}
        </div>

        <table class="mb-5" style="border: 0px solid white;">
            <tr class="parent-row">
                <td>Número de Partida</td>
                <td>{{ $res['partida']->num_partida }}</td>
            </tr>
            <tr class="parent-row">

                <td>Fecha</td>
                <td>{{ $res['partida']->fecha_partida }}</td>
            </tr>
            <tr class="parent-row">

                <td>Tipo Partida</td>
                <td>{{ $res['partida']->descripcion }}</td>
            </tr>
            <tr class="parent-row">

                <td>Concepto general</td>
                <td>{{ strtoupper($res['partida']->concepto) }}</td>
            </tr>
        </table>

        <table class="table table-sm fs-5 mb-4 pb-5" style="border: 1px solid rgb(255, 255, 255);">
            <thead style="border-top: 1px solid black; border-bottom: 1px solid black; font-size:18px; "
                class="font-bold">
                <tr>
                    <th>Cuenta Contable</th>
                    <th>Cuenta</th>
                    <th>Parcial</th>
                    <th>Cargos</th>
                    <th>Abonos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($res['formattedResults'] as $parentAccountName => $accountData)
                    <tr class="parent-row" style="height: 8px !important;">
                        <td>{{ $accountData['cuenta_padre'] }}</td>
                        <td>{{ $parentAccountName }}</td>
                        <td>


                        <td style="{{ $accountData['total_cargos'] > 0 ? 'border-bottom: 1px solid black;' : '' }}">
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
                <tr class="parent-row">
                    <td colspan="3" style="text-align: center"><b>TOTAL DE CARGOS Y ABONOS</b></td>
                    <td class="double-strikethrough">${{ number_format($res['totalCargos'], 2) }}</td>
                    <td class="double-strikethrough">${{ number_format($res['totalAbonos'], 2) }}</td>

                </tr>
            </tfoot>
        </table>
        <table class="table table-sm fs-5 mt-4 pt-4" style="border: 1px solid rgb(255, 255, 255);">
            <tr>
                <td class="text-center">
                    <p>__________________</p>
                    <p>Hecho por</p>
                </td>
                <td class="text-center">
                    <p>__________________</p>
                    <p>Revisado por</p>
                </td>
                <td class="text-center">
                    <p>__________________</p>
                    <p>Autorizado por</p>
                </td>
            </tr>
        </table>
        <div class="page-break"></div>
    @endforeach





</body>

</html>
