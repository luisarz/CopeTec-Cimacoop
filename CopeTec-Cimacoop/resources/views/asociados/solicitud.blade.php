<!DOCTYPE html>
<html lang="es">

<head>
    <title>CoopeTec-Administracion Solicitud Ingreso - {{ strtoupper($asociado->cliente->nombre) }}</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        {!! $estilos !!}
        {!! $stilosBundle !!}
    </style>

</head>

<body>
<div style="display: table; width: 100%;">
    <div style="display: table-cell; width: 100px; vertical-align: middle;">
        <img src="{{ public_path('assets/media/logos/cimacoop.png') }}" alt="logo" style="width: 100px; height: 100px;">
    </div>
    <div style="display: table-cell; text-align: center; vertical-align: middle;">
        <h3 style="font-size: 22px; font-family: 'verdana', serif; font-weight: bold; border-bottom: solid 1px #000000; margin-top: 35px;">
            {{ strtoupper($configuracion->nombre_comercial) }}
            <br>
            <span style="font-size: 18px;">{{ strtoupper($configuracion->nombre_empresa) }}</span>
            <br>
            <span style="font-size: 18px;">{{ strtoupper($reporteName) }}</span>
        </h3>
    </div>
</div>






    <div
        style="text-align: justify; font-size: 16px; font-family:  'arial',serif; line-height: 1.5; padding: 25px 30px 25px 25px;">


             Sres. Consejo de Administraicon&nbsp;&nbsp; <br>
           <b>{{ strtoupper($configuracion->nombre_empresa) }}</b> <br>
            Presente. <br>
        <br>
            Solicito a ustedes con todo respeto se me admita como Asociado (a) de su Cooperativa, comprometiéndome
            a acatar todo lo estipulado en los estatutos que rigen su Cooperativa. <br>
            Al ser admitio como Asociado (a) me comprometo a cumplir con todos los requisitos exigidos: Recibir el Curso Básico
            sobre Cooperativismo, Pagar la cuota de ingreso de  <b> ${{ number_format($asociado->couta_ingreso, 2) }} </b>
            y una aportación de <b>${{ number_format($asociado->monto_aportacion, 2) }}</b>.
            y seguir aportando en forma mensual.

        <div style="border: black solid 2px; padding: 3px; font-size: 18px; word-wrap: break-word; overflow-wrap: break-word; max-width: 100%; overflow: hidden;">
            <b>NOMBRE: </b> <u> {{ strtoupper($asociado->cliente->nombre) }}</u><br>
            <b>DUI No: </b> <u>{{ $asociado->cliente->dui_cliente }}</u> <b>Fecha de nacimiento:</b> <u>, {{ date('d-m-Y',strtotime($asociado->cliente->fecha_nacimiento)) }}</u><br>
            <b>Profesión u Oficio: </b> <u>{{$asociado->cliente->profesion->name??'S/N' }} </u> &nbsp;&nbsp;&nbsp;&nbsp; <b>Estado Civil: </b> <u>{{ $asociado->cliente->estado_civil }}</u><br>
            <b>Direcció:</b> <u>{{$asociado->cliente->direccion_personal}}</u> <br>
            <b>Nombre del esposo (a):</b> <u> {{ $asociado->cliente->conyugue??'S/N' }}</u><br>
            <b>Lugar de trabajo:</b> <u> {{ strtoupper( $asociado->cliente->nombre_negocio) }}, {{strtoupper($asociado->cliente->direccion_negocio)}}</u><br>
            <b>Sueldo Quincenal:</b> <u> ${{ number_format($asociado->sueldo_quincenal,2) }}</u>,
            <b>Sueldo Mensual:</b> <u> ${{ number_format($asociado->sueldo_mensual,2) }}</u>
            <b>Otros Ingresos:</b> <u> ${{ number_format($asociado->otros_ingresos,2) }}</u> <br>
            <b>Número de personas que dependen económicamente:</b> <u> {{ $asociado->dependientes_economicamente }}</u><br>
        </div>
        <br>
        <b>ASOCIADOS QUE PUEDEN DAR REFERENCIAS</b> <br>
        <b>NOMBRE:</b>  {{strtoupper( $asociadoReferencia1->cliente->nombre??str_pad("", 82, "_", STR_PAD_LEFT)) }}  <br>
        <b>DIRECCIÓN:</b> {{strtoupper($asociadoReferencia1->cliente->direccion_personal??str_pad("", 80, "_", STR_PAD_LEFT))}} <br>
        <b>TELÉFONO:</b> {{ $asociadoReferencia1->cliente->telefono??str_pad("", 80, "_", STR_PAD_LEFT) }} <br>
        <b>NOMBRE:</b>  {{strtoupper( $asociadoReferencia2->cliente->nombre??str_pad("", 82, "_", STR_PAD_LEFT)) }}  <br>
        <b>DIRECCIÓN:</b> {{strtoupper($asociadoReferencia2->cliente->direccion_personal??str_pad("", 80, "_", STR_PAD_LEFT))}} <br>
        <b>TELÉFONO:</b> {{ $asociadoReferencia2->cliente->telefono??str_pad("", 80, "_", STR_PAD_LEFT) }} <br>
        <br>
        <b>  EN CASO DE MUERTE DESIGNO COMO BENEFICIARIOS: </b>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Parentesco</th>
                    <th>Porcentaje</th>
                    <th>Direccion</th>
                </tr>
            </thead>
            <tbody>
            @if ($beneficiarios->isEmpty())
                <tr>
                    <td colspan="4">No hay beneficiarios registrados</td>
                </tr>
            @else
                @foreach ($beneficiarios as $beneficiario)
                    <tr>
                        <td>{{ $beneficiario->nombre }}</td>
                        <td>{{ $beneficiario->parentesco }}</td>
                        <td>{{ $beneficiario->porcentaje }}%</td>
                        <td>{{ $beneficiario->direccion }}</td>
                    </tr>
                @endforeach
            @endif



            </tbody>
        </table>


        <p>
            <u>
            San Miguel,
            {{ \Carbon\Carbon::parse($asociado->fecha_ingreso)->format('d \d\e ') . \Carbon\Carbon::parse($asociado->fecha_ingreso)->monthName . \Carbon\Carbon::parse($asociado->fecha_ingreso)->format(' \d\e Y') }}
            </u>

            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; F:_____________________________
            <br>
            Lugar y fecha
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Solicitante
        </p>


        <br>
        <br>
        <br>
        <b>
            <div style="border: black solid 2px; padding: 3px; font-size: 16px; ">
                @php
                $estado="";
                switch ($asociado->estado_solicitud) {
                    case '1':
                        $estado= "  SIN DEFINIR ";
                        break;
                    case '3':
                          $estado= " RECHAZAR ";
                        break;
                    default:
                          $estado=" APROBAR  ";
                        break;
                }
                @endphp
                EN SESIÓN CELEBRADA POR EL CONSEJO DE ADMINISTRACIÓN EL DÍA &nbsp;&nbsp;&nbsp;
                {{ date('d/m/Y', strtotime($asociado->fecha_ingreso))  }} <br/> ACORDAMOS &nbsp; <b> <u>  {{$estado}}   </u> </b> &nbsp; LA PRESENTE SOLICITUD DE ADMINISIÓN. <br>
                <table class="table table-borderless" style="width: 100%; border: 1px solid rgb(255, 255, 255) !important;">
                    <thead>
                    <tr>
                        <th style="border-bottom: 1px solid rgb(0, 0, 0); text-align: left;">F:</th>
                        <th style="border-bottom: 0 solid rgb(255, 255, 255);"></th>
                        <th style="border-bottom: 1px solid rgb(0, 0, 0); text-align: left;">F:</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="text-align: center; padding-top: 20px;">PRESIDENTE DEL CONSEJO</td>
                        <td></td>
                        <td style="text-align: center; padding-top: 20px;">SECRETARIO DEL CONSEJO</td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </b>

    </div>


</body>

</html>
