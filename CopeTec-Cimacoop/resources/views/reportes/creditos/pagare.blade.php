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

    <div>
        <center>
            PAGARÉ <br>
            SIN PROTESTO
        </center>

        <div class="divFecha"> San miguel,
        
        {{ \Carbon\Carbon::parse($solicitud->fecha_solicitud)->format('d \d\e ') . \Carbon\Carbon::parse($solicitud->fecha_solicitud)->monthName . \Carbon\Carbon::parse($solicitud->fecha_solicitud)->format(' \d\e Y') }}
        </div>
        <div>
            <div class="">
                <table>
                    <tr>
                        <td class="datos_solicitante_pagare">
                            Por el presente PAGARÉ, me (nos) obligo (amos) a pagar Incondicionalmente a la &nbsp; <label
                                class="label-info"> ASOCIACION COOPERATIVA DE AHORRO Y CREDITO LA CIMA DE &nbsp;&nbsp;
                                RESPONSABILIDAD LIMITADA; &nbsp; &nbsp;</label>
                            Que se abrevia <label class="label-info"> -CIMACOOP DE R.L."</label>, en sus oficinas de la
                            ciudad de <b> SAN
                                MIGUEL.</b> La
                            cantidad de <label class="label-info">{{ $montoSolicitadoEnLetras }}</label> &nbsp;&nbsp;
                            EXACTOS DE LOS ESTADOS UNIDOS DE AMERICA;
                            &nbsp;&nbsp;&nbsp;
                            ({{ $solicitud->monto_solicitado }}) &nbsp;sin
                            garantía, al interés del <b> {{ $tasaEnletras }} </b> por ciento anual sobre saldos. para un
                            plazo de {{ $plazoEnLetras }} meses.
                            calculado a partir de esta fecha. que vence el día {{ $solicitud->primera_cuota }} , para
                            ser invertido en la línea de {{ $solicitud->destino }}, bajo la siguiente forma de pago:
                            &nbsp;{{ $plazoEnLetras }}
                            cuotas mensuales que comprende capital, intereses, aportación de <label
                                class="label-info">{{ $cuotaEnLetras }} &nbsp;</label>
                            &nbsp;&nbsp;DE LOS ESTADOS UNIDOS DE AMERICA EXACTOS (${{ $solicitud->cuota }}), fijas y
                            &nbsp;&nbsp;
                            sucesivas.
                            El plazo caducará y la deuda será exigible totalmente, con sus respectivos intereses como si
                            se tratase de una obligación de
                            pago de
                            plazo vencido, en caso de faltar al pago de una cuota de capital o intereses pactados de
                            este
                            crédito. - En caso de que no fueren puntualmente cubiertos el capital y los intereses,
                            reconoceremos, además, el TREINTA Y SEIS por ciento Anual adicionales a la tasa de interés
                            aplicable
                            durante la mora. La tasa de interés quedará sujeta a aumento o disminución en relación a la
                            tasa de
                            referencia. Esta última podrá ser ajustada mensualmente sobre la tasa de referencia vigente
                            a la
                            fecha que la <label class="label-info"> ASOCIACION COOPERATIVA DE AHORRO Y CREDITO LA CIMA &nbsp;
                                DE RESPONSABILIDAD LIMITADA.
                            </label> &nbsp;&nbsp;&nbsp;
                            Que se abrevia "CIMACOOP DE R.L..", establezca para su aplicación. Para los efectos legales
                            de este
                            Pagaré, fijo (amos) como domicilio Especial el de la Ciudad de San Miguel, y caso de acción
                            judicial, renunció (amos) el derecho de apelar del decreto de embargo, sentencia de remate y
                            cualquier
                            otra providencia apelable que se dictare en el juicio ejecutivo mercantil o sus incidentes,
                            renunciando al beneficio de exclusión de bienes; siendo a mi (nuestro) cargo cualquier gasto
                            que la <label class="label-info">
                                ASOCIACIÓN COOPERATIVA DE AHORRO Y CREDITO LA CIMA DE RESPONSABILIDAD LIMITADA &nbsp;&nbsp;</label>.
                            &nbsp; Que se abrevia "CIMACOOP DE R.L..", hiciere en el cobro de este Pagaré, inclusive los
                            llamados
                            personales y
                            aun cuando
                            por regla
                            general no hubiere condenación en costas. Faculto (amos) a la <label class="label-info">
                                ASOCIACIÓN COOPERATIVA DE &nbsp;&nbsp;
                                AHORRO Y &nbsp;
                                CREDITO LA CIMA DE RESPONSABILIDAD LIMITADA</label>.
                            Que se abrevia "CIMACOOP DE R.L..", para que &nbsp;
                            designe la persona depositaria de los bienes que se me (nos) embargue(n), a quien relevo
                            (amos) de la
                            obligación de rendir fianza y gastos de administración.
                            <br>
                            <br>
                            <br>

                            F:_______________________________________
                            <br>
                            Sr(a):
                            {{ $solicitud->nombre }}
                            <br> {{ $edadCliente }} años de edad
                            <br>DUI: {{ $solicitud->dui_cliente }} Ext. {{ $solicitud->dui_extendido }}
                            {{ $solicitud->fecha_expedicion }}
                            <br>
                            Dom: {{ $solicitud->direccion_personal }}
                            {{-- <br>Res: URBANIZACION SAN JOSE CL LAS VIOLETAS #21 --}}
                        </td>
                    </tr>
                </table>

            </div>
        </div>





    </div>


</body>

</html>
