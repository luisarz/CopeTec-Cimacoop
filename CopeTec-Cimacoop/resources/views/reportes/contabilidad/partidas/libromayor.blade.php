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
        PARTIDAS DE LIBRO MAYOR
    </div>
    <?php
    $objJson = json_decode($arrFormatted, true);
    // dd($objJson);
    ?>
    <table>
        <thead>
            <tr>
                <th>Partida</th>
                <th>Numero</th>
                <th>Saldo</th>
                <th>Cargos</th>
                <th>Abonos</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($objJson as $cat => $c)
                <tr>
                    <td> {{ $c['descripcion'] }}</td>
                    <td> {{ $c['numero'] }}</td>
                    <td> {{ $c['saldo'] }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @foreach ($c['sub_array'] as $sub => $s)
                    @if (array_key_exists('id_cuenta', $s))
                        <tr>
                            <td> {{ $s['descripcion'] }}</td>
                            <td> {{ $s['numero'] }}</td>
                            <td> {{ $s['saldo'] }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @foreach ($s['movimientos'] as $mov => $m)
                            @if (array_key_exists('fecha_dia', $m))
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td> {{ $m['total_cargos'] }}</td>
                                    <td> {{ $m['total_abonos'] }}</td>
                                    <td> {{ $m['fecha_dia'] }}</td>
                                </tr>
                            @endif
                        @endforeach
                        @foreach ($s['cuentas_hijas'] as $sub2 => $s2)
                            @if (array_key_exists('id_cuenta', $s2))
                                <tr>
                                    <td> {{ $s2['descripcion'] }}</td>
                                    <td> {{ $s2['numero'] }}</td>
                                    <td> {{ $s2['saldo'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @foreach ($s2['movimientos'] as $mov2 => $m2)
                                    @if (array_key_exists('fecha_dia', $m2))
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td> {{ $m2['total_cargos'] }}</td>
                                            <td> {{ $m2['total_abonos'] }}</td>
                                            <td> {{ $m2['fecha_dia'] }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                @foreach ($s2['cuentas_hijas'] as $sub3 => $s3)
                                    @if (array_key_exists('id_cuenta', $s3))
                                        <tr>
                                            <td> {{ $s3['descripcion'] }}</td>
                                            <td> {{ $s3['numero'] }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        @foreach ($s3['movimientos'] as $mov3 => $m3)
                                            @if (array_key_exists('fecha_dia', $m3))
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td> {{ $m3['total_cargos'] }}</td>
                                                    <td> {{ $m3['total_abonos'] }}</td>
                                                    <td> {{ $m3['fecha_dia'] }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        @foreach ($s3['cuentas_hijas'] as $sub4 => $s4)
                                            @if (array_key_exists('id_cuenta', $s4))
                                                <tr>
                                                    <td> {{ $s4['descripcion'] }}</td>
                                                    <td> {{ $s4['numero'] }}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                @foreach ($s4['movimientos'] as $mov4 => $m4)
                                                    @if (array_key_exists('fecha_dia', $m4))
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td> {{ $m4['total_cargos'] }}</td>
                                                            <td> {{ $m4['total_abonos'] }}</td>
                                                            <td> {{ $m4['fecha_dia'] }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                @endforeach
            @endforeach
        </tbody>
    </table>

</body>

</html>
