<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>CoopeTec-Administracion de cooperativas CompuTec Consultores</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        {!! $estilos !!}
        {!! $stilosBundle !!}
    </style>

</head>

<body class="body">





    <div class="text-align-rigth " style="margin-right:100px; margin-top:100px; font-size: 15px !important; ">
        Cajaro : <span class="text-bold"> {{ strtoupper($movimiento->nombre_empleado) }} </span>
        <br>
        Fecha: {{ \Carbon\Carbon::parse($movimiento->fecha_operacion)->format('d/m/Y') }}
        <br>
        Hora: {{ \Carbon\Carbon::parse($movimiento->fecha_operacion)->format('H:i:s A') }}

    </div>
    <div style="margin-top: -10px; margin-left:30px; font-size: 15px !important;" class=" text-bold ">
        @php
            $tipoOperacion = $movimiento->tipo_operacion;
        @endphp

        @if (in_array($tipoOperacion, [3, 4, 6]))
            {{ strtoupper($movimiento->nombre) }}
        @else
            Titular: {{ strtoupper($movimiento->nombre) }} <br> ({{ $movimiento->dui_cliente }})
        @endif


    </div>

    <div style="margin-top: 50px; width=100px; text-align:center; font-size: 16px !important;">
        {{ strtoupper($movimiento->direccion_personal) }} <br>
        Coopetativa La Cima CIMACOOP DE RL
    </div>


    <table class="table "  style="border: solid 1px rgb(255, 255, 255) !important; font-size: 18px !important;">
        <tbody>
            <tr>
                <td></td>
                <td></td>

                <td colspan="2" style="text-align: left">
                    @if (in_array($tipoOperacion, [3, 4, 6]))
                    @else
                        {{ $movimiento->numero_cuenta }} {{ $movimiento->descripcion_cuenta }}
                    @endif
                </td>
                <td style="font-size: 15px !important;"> @switch($movimiento->tipo_operacion)
                        @case('1')
                            <span class="badge badge-light-success fs-2">Deposito</span>
                            @if ($movimiento->id_cuenta_destino != null)
                                <span class="badge badge-light-danger fs-2"> - Transferencia Tercero</span>
                            @endif
                        @break

                        @case('2')
                            <span class="badge badge-light-danger fs-2">Retiro</span>
                            @if ($movimiento->id_cuenta_destino != null)
                                <span class="badge badge-light-danger fs-2"> - Transferencia Tercero</span>
                            @endif
                        @break

                        @case('3')
                            <span class="badge badge-light-danger fs-2">Recepcion de Bobeda</span>
                        @break

                        @case('4')
                            <span class="badge badge-light-danger fs-2">Traslado a Bobeda</span>
                        @break

                        @case('5')
                            <span class="badge badge-light-danger fs-2">Corte X</span>
                        @break

                        @case('6')
                            <span class="badge badge-light-danger fs-2">Corte Z</span>
                        @break

                    @endswitch
                </td>
                <td>$ {{ number_format($movimiento->monto, 2, '.', ',') }}</td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="2" style="text-align: left">
                </td>
                <td></td>
                <td></td>
            </tr>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="2" style="text-align: left">
                    Operacion Realizada por: <br>
                    {{ $movimiento->cliente_transaccion }} <br>
                    {{ $movimiento->dui_transaccion }}
                </td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td colspan="2" style="text-align: left">
                </td>
                <td>Total: </td>

                <td>$ {{ number_format($movimiento->monto, 2, '.', ',') }}</td>
            </tr>
            <tr>

                <td></td>
                <td></td>
                <td style="text-align: left">Total en letras:<br> {{ $numeroEnLetras }}</td>
            </tr>

        </tbody>
    </table>


</body>

</html>
