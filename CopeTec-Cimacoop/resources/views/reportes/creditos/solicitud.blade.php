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

<body>


    <div style="position: relative; color:#333683">
        <img src="{{ $fondo }}" alt="Image" style="width: 1350px; height: 930px;">
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
                    <li>1. Los intereses devengados por el presente certificado se abonarán a la cuenta de ahorro.

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
            <table class="table table-borderless">

                <tbody style="border: 1px solid white;">
                    <tr style="border: 1px solid white;">
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
                    <tr style="border: 1px solid white;">
                        <td
                            style="width:35%; font-family: 'Segoe UI' !important; font-size:20px !important;  line-height: 1.5; text-align: justify; border-top: 2px solid #333683 !important; text-align:center">
                            Lugar y fecha
                        <td>
                        <td
                            style=" font-family: 'Segoe UI' !important; font-size:20px !important;  line-height: 1.5; text-align: justify; border-top: 2px solid #333683 !important; text-align:center">
                            Autoriza
                        <td>
                        <td
                            style=" font-family: 'Segoe UI' !important; font-size:20px !important;  line-height: 1.5; text-align: justify; border-top: 2px solid #333683 !important; text-align:center">
                            Cajero/a</td>
                        <td></td>
                        <td
                            style=" font-family: 'Segoe UI' !important; font-size:20px !important;  line-height: 1.5; text-align: justify; border-top: 2px solid #333683 !important; text-align:center">
                            Sello</td>

                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <div>
        <br>
        <span class="description"> BENEFICIARIOS </span>
        <br>
        <br>

        <div class="w-80%">
            <table class="table table-bordered w-80%">
                <thead style="text-align: center; font-size:18px;">
                    <tr>
                        <th class="min-w-90px">No</th>
                        <th class="min-w-200px"> BENEFICIRIO</th>
                        <th class="min-w-100">PORCENTAJE</th>
                        <th class="min-w-100px">PARENTESCO</th>
                        <th class="min-w-200px">EDAD</th>
                        <th class="min-w-200px">DIRECCION</th>

                    </tr>
                </thead>

                <tbody class=" fs-1 text-black-800">

                    @foreach ($beneficiarios as $beneficiario)
                        <tr style="text-align: center; font-size:18px;">
                            <td>{{ $loop->iteration }}</td>

                            <td style="text-align: center;">{{ $beneficiario->nombre_beneficiario }}</td>
                            <td>{{ $beneficiario->porcentaje }}%</td>
                            <td>{{ $beneficiario->parentesco }}</td>
                            <td>{{ $beneficiario->edad }}-Años</td>
                            <td>{{ $beneficiario->direccion }}</td>


                        </tr>
                    @endforeach

                </tbody>
            </table>
            <br />
            <br />
            <br />

            <div style="font-size: 18px;">
                F:____________________________________________<br>
                Asociado

            </div>
        </div>
    </div>
</body>

</html>
