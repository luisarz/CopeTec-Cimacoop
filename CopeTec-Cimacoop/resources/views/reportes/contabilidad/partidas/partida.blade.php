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
 <div class="double-strikethrough"> &nbsp;</div>

    <table class="" style="border: 0px solid white;">
        <tr class="parent-row">
            <td>Número de Partida</td>
            <td>{{ date('d-m-Y',strtotime($partida->num_partida))  }}</td>
        </tr>
        <tr class="parent-row">

            <td>Fecha</td>
            <td>{{ $partida->fecha_partida }}</td>
        </tr>
        <tr class="parent-row">

            <td>Tipo Partida</td>
            <td>{{ $partida->descripcion }}</td>
        </tr>
        <tr class="parent-row">

            <td>Concepto general</td>
            <td>{{ $partida->concepto }}</td>
        </tr>
    </table>

    <table class="table" style="border: 1px solid white;">
        <thead style="border-top: 1px solid black; border-bottom: 1px solid black; font-size:18px; " class="font-bold">
            <tr>
                <th>Cuenta Contable</th>
                <th>Cuenta</th>
                <th>Parcial</th>
                <th>Cargos</th>
                <th>Abonos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($formattedResults as $parentAccountName => $accountData)
                {{-- <tr class="parent-row" style="border-top: 1px solid black; border-bottom: 1px solid black;"> --}}
                <tr class="parent-row">
                    <td>{{ $accountData['cuenta_padre'] }}</td>
                    <td>{{ $parentAccountName }}</td>
                    <td>
                        {{ $accountData['total_parcial'] > 0 ? $accountData['total_parcial'] : '' }}


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
                    <tr class="child-row">
                        <td>{{ $cuentaHija['cuenta'] }}</td>
                        <td>{{ $cuentaHija['descripcion_cuenta_hija'] }}</td>

                        <td>
                            @if ($cuentaHija['abonos'] > 0)
                                $ {{ number_format($cuentaHija['abonos'], 2) }}
                            @endif

                        </td>
                        <td>
                            {{-- {{ $cuentaHija['cargos'] > 0 ? $cuentaHija['cargos'] : '' }} --}}
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
                <td class="double-strikethrough">${{  number_format( $totalCargos,2) }}</td>
                <td class="double-strikethrough">${{ number_format( $totalAbonos,2) }}</td>

            </tr>
        </tfoot>
    </table>




</body>

</html>
