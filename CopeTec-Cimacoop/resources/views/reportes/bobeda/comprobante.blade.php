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
        {{ $stilosBundle }}
    </style>

</head>

<body  style="font-size: 14px;">


{{-- Datos del Bobeda --}}
   <div class="text-align-rigth " style="margin-right:80px; margin-top:100px; font-size: 15px !important; ">
        Empleado Bobeda  : <span class="text-bold"> {{ strtoupper($bobeda_empleado) }} </span>
        <br>
        Fecha: {{ \Carbon\Carbon::parse($movimiento->fecha_operacion)->format('d/m/Y') }}
        <br>
        Hora: {{ \Carbon\Carbon::parse($movimiento->fecha_operacion)->format('h:i:s A') }}

    </div>

    {{-- Datos de Bobeda --}}
    <div class="text-align-left " style="margin-left:30px; margin-top:-70px; font-size: 15px !important; ">
        Cajaro : <span class="text-bold"> {{ $movimiento->numero_caja!=0? strtoupper($movimiento->nombre_empleado):'--' }} </span>
    </div>

    <div style="margin-top: -10px; margin-left:30px; margin-top:10px;  font-size: 15px !important; " class=" text-bold ">
        @php
            $tipoOperacion = $movimiento->tipo_operacion;
        @endphp

        @switch($movimiento->tipo_operacion)
            @case(1)
                Traslado  
            @break

            @case(2)
                <span class=" badge badge-light-success">Recepcion - </span>
            @break

            @case(3)
                <span class=" badge badge-light-info">Apertura - </span>
            @break

            @case(6)
                <span class=" badge badge-info">Corte Z - </span>
            @break
        @endswitch
        {{ strtoupper($movimiento->numero_caja == 0 ? 'Bobeda General' : $movimiento->numero_caja) }} <br />
        Estado:
        @if ($movimiento->estado == '1')
            <span class="badge badge-light-warning fs-5">Enviada</span>
        @elseif($movimiento->estado == '2')
            <span class="badge badge-light-success fs-5">Finalizada</span>
        @elseif($movimiento->estado == '3')
            <span class="badge badge-light-danger fs-5">Cancelado</span>
        @endif
        <br />
        Observaciones: {{ $movimiento->observacion }}

    </div>

    <div style="margin-top: 50px; width=100px; text-align:center;  font-size: 16px !important;">
        {{ strtoupper($movimiento->direccion_personal) }} <br>
        Coopetativa La Cima CIMACOOP DE RL
    </div>


    <table class="table table-borderless fs-2" style="border: 1px solid rgb(255, 255, 255);  font-size: 16px !important;" >
        <thead>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>


        </thead>
        <tbody style="width: 100% !important;">
            <tr>
                <td></td>
                <td></td>

                <td class="text-bold" style=" font-size: 15px !important;">
                    @switch($movimiento->tipo_operacion)
                        @case(1)
                            <span class=" text-bold">Traslado</span>
                        @break

                        @case(2)
                            <span class="text-bold">Recepcion</span>
                        @break

                        @case(3)
                            <span class="text-bold">Apertura bobeda</span>
                        @break

                        @case(6)
                            <span class=" text-bold">Corte Z</span>
                        @break
                    @endswitch

                </td>
                <td colspan="4">$ {{ number_format($movimiento->monto, 2, '.', ',') }}</td>
                <td></td>
                <td></td>

            </tr>
            <tr>
                <td></td>
                <td></td>
                <td> </td>
                <td colspan="4"></td>
                <td></td>
                <td></td>

            </tr>
             <tr>
                <td></td>
                <td></td>
                <td> </td>
                <td colspan="4"></td>
                <td></td>
                <td></td>

            </tr>
             <tr>
                <td></td>
                <td></td>
                <td>Total </td>
                <td colspan="4">$ {{ number_format($movimiento->monto, 2, '.', ',') }}</td>
                <td></td>
                <td></td>

            </tr>
      
      
         
            <tr>

                <td></td>
                <td colspan="2" style="text-align: left">Total en letras:<br> {{ $numeroEnLetras }}</td>
                <td></td>
                <td></td>

            </tr>

        </tbody>
    </table>


</body>

</html>
