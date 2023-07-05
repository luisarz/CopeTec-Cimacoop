<!DOCTYPE html>
<html lang="es">

<head>
    <title>CoopeTec-Administracion de cooperativas CompuTec Consultores</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        {{ $estilos }}
    </style>

</head>

<body>


    <div style="position: relative; color:#333683">
        <img src="{{ $fondo }}" alt="Image" style="width: 1350px; height: 950px;">
        <div style="position: absolute; top: 200px; left: 150px; width: 80%; height: 100%; z-index: 1;">
            <div style=" font-family: 'Segoe UI' !important; font-size:28px !important;">

                <center>La asociación Cooperativa de Ahorro y Crédito La Cima de Responsabilidad Limitada CIMACOOP DE
                    R.L. Hace
                    Constar que en esta fecha ha abonado. </center><br>
            </div>
            <div
                style=" font-family: 'Segoe UI' !important; font-size:20px !important; line-height: 1.5; text-align: justify;">

                A favor de: <b><u> {{ strtoupper($datosContrato->nombre) }}</u></b> <br>
                En su cuenta de Deposito a Plazo fijo,la suma de: <b>
                    {{ $numeroEnLetras }} , $ {{ number_format($datosContrato->monto_deposito, 2, '.', ',') }},
                    &nbsp;</b>
                Para el plazo de
                {{ $datosContrato->plazo_deposito * 30 }} días, al {{ $datosContrato->valor }}% de interes anual, por
                periodos iguales, salvo aviso por escrito, dado a la fecha de vencimiento:<br>

                VENCE: <b><u>
                        {{ \Carbon\Carbon::parse($datosContrato->fecha_vencimiento)->format('d \d\e ') . \Carbon\Carbon::parse($datosContrato->fecha_vencimiento)->monthName . \Carbon\Carbon::parse($datosContrato->fecha_vencimiento)->format(' \d\e Y') }}.</u></b>
                No. de cuenta: <b><u> {{ str_pad($datosContrato->numero_cuenta, 10, '0', STR_PAD_LEFT) }}</u></b>
            </div>
            <div
                style=" font-family: 'Segoe UI' !important; font-size:20px !important;  line-height: 1.5; text-align: justify;">

                Este deposito está sujeto a las condiciones siguientes.
                <ul style=" list-style-type: none;">
                    <li>1. Los intereses devengados poor el presente certificado se abonarán a la cuenta de ahorro.

                    </li>
                    <li>2. Los intereses serán pagados de forma:

                        @php
                            $anticipado = 'Anticipado  <b>&#10696;</b>';
                            $semanal = 'Semanal <b>&#10696;</b>';
                            $mensual = 'Mensual <b>&#10696;</b>';
                            $finPlazo = 'A fin de plazo <b>&#10696;</b>';
                        @endphp

                        @switch($datosContrato->forma_pago_interes)
                            @case(0)
                                @php
                                    $anticipado = '<b>Anticipado &#9745;</b>';
                                @endphp
                            @break

                            @case(1)
                                @php
                                    $semanal = '<b>Semanal &#9745;</b>';
                                @endphp
                            @break

                            @case(2)
                                @php
                                    $mensual = '<b>Mensual &#9745;</b>';
                                @endphp
                            @break

                            @case(3)
                                @php
                                    $finPlazo = '<b>A fin de plazo &#9745;</b>';
                                @endphp
                            @break
                        @endswitch

                        {!! $anticipado !!}, {!! $semanal !!}, {!! $mensual !!},
                        {!! $finPlazo !!}.

                    </li>
                    <li>3. Si el presente certificado no fuese presentado para su cancelación a la fecha de su
                        vencimiento
                        el asociado tendrá 5 días adicionales para realizar algún cambio en el mismo, caso contrario se
                        renovara automaticame por un periodo igual, sujeto a la tasa de interes vigentre por la
                        asociación
                        Coopertiva.
                </ul>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <table class="table">
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>

                <tbody>
                    <tr>
                        <td style=" font-family: 'Segoe UI' !important; font-size:20px !important;  line-height: 1.5;">
                            San Miguel,
                            {{ \Carbon\Carbon::parse($datosContrato->fecha_deposito)->format('d \d\e ') . \Carbon\Carbon::parse($datosContrato->fecha_deposito)->monthName . \Carbon\Carbon::parse($datosContrato->fecha_deposito)->format(' \d\e Y') }}
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td
                            style="width:30%; font-family: 'Segoe UI' !important; font-size:20px !important;  line-height: 1.5; text-align: justify; border-top: 1px solid #333683; text-align:center">
                            Lugar y fecha</td>
                        <td></td>
                        <td
                            style=" font-family: 'Segoe UI' !important; font-size:20px !important;  line-height: 1.5; text-align: justify; border-top: 1px solid #333683; text-align:center">
                            Autoriza</td>
                        <td></td>
                        <td
                            style=" font-family: 'Segoe UI' !important; font-size:20px !important;  line-height: 1.5; text-align: justify; border-top: 1px solid #333683; text-align:center">
                            Cajero/a</td>
                        <td></td>
                        <td
                            style=" font-family: 'Segoe UI' !important; font-size:20px !important;  line-height: 1.5; text-align: justify; border-top: 1px solid #333683; text-align:center">
                            Sello</td>
                        <td></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <div>

        <table class="table">
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>

            <tbody>
                <tr>
                    <td style=" font-family: 'Segoe UI' !important; font-size:20px !important;  line-height: 1.5;">San
                        Miguel,
                        {{ \Carbon\Carbon::parse($datosContrato->fecha_deposito)->format('d \d\e ') . \Carbon\Carbon::parse($datosContrato->fecha_deposito)->monthName . \Carbon\Carbon::parse($datosContrato->fecha_deposito)->format(' \d\e Y') }}
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td
                        style="width:30%; font-family: 'Segoe UI' !important; font-size:20px !important;  line-height: 1.5; text-align: justify; border-top: 1px solid #333683; text-align:center">
                        Lugar y fecha</td>
                    <td></td>
                    <td
                        style=" font-family: 'Segoe UI' !important; font-size:20px !important;  line-height: 1.5; text-align: justify; border-top: 1px solid #333683; text-align:center">
                        Autoriza</td>
                    <td></td>
                    <td
                        style=" font-family: 'Segoe UI' !important; font-size:20px !important;  line-height: 1.5; text-align: justify; border-top: 1px solid #333683; text-align:center">
                        Cajero/a</td>
                    <td></td>
                    <td
                        style=" font-family: 'Segoe UI' !important; font-size:20px !important;  line-height: 1.5; text-align: justify; border-top: 1px solid #333683; text-align:center">
                        Sello</td>
                    <td></td>
                </tr>

            </tbody>
        </table>
    </div>
</body>

</html>
