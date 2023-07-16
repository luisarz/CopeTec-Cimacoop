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

    <div class="row" style="font-size:20px; ">
        <center>
            SOLICITUD DE CRÉDITO # {{ str_pad($solicitud->numero_solicitud, 10, '0', STR_PAD_LEFT) }}
        </center>
        {{ $solicitud->fecha_solicitud }}
        <ul style=" list-style-type: none;">

            <li class="items_li"><span class="item-solicitud">1- DATOS GENERALES DEL SOLICITANTE:</span>
                <div class="datos_solicitante">
                    Nombre según DUI: <b>{{ $solicitud->nombre }}</b> edad: <b>{{ $edadCliente }} </b> años
                    <br>
                    Profesión u oficio: <b>{{ $solicitud->profesion }}</b>, DUI: <b> {{ $solicitud->dui_cliente }}</b>,
                    Extendido en:
                    <b>{{ $solicitud->dui_extendido }}</b>
                    <br>
                    Fecha de expedicion: <b>{{ $solicitud->fecha_expedicion }}</b>, fecha de nacimiento.
                    <b>{{ $solicitud->fecha_nacimiento }}</b>
                    <br>
                    Nacionalidad: <b>{{ $solicitud->nacionalidad }}</b>, estado Civi:
                    <b>{{ $solicitud->estado_civil }}</b>,
                    Telefono: <b> {{ $solicitud->telefono }}</b>
                    <br>
                    Dirección personal: <b> {{ $solicitud->direccion_personal }}</b>
                    <br>
                    Dirección del negocio: <b> {{ $solicitud->direccion_negocio }} </b>
                    <br>
                    Nombre del negocio: <b> {{ $solicitud->nombre_negocio }}</b>, Casa: <b>
                        {{ $solicitud->tipo_vivienda }}</b>
                </div>
            <li><span class="item-solicitud">2- DATOS DEL CRÉDITO SOLICITADO:</span>
                <div class="datos_solicitante">
                    Cantidad Solicitada: <b>${{ number_format($solicitud->monto_solicitado, 2, '.', ',') }}</b>
                    ({{ $montoSolicitadoEnLetras }}), plazo: &nbsp;&nbsp; <b>&nbsp;{{ $solicitud->plazo }}</b>
                    (meses),
                    Tasa de interes: <b> {{ $solicitud->tasa }}%</b>, cuota: <b>
                        ${{ number_format($solicitud->cuota, 2, '.', ',') }}</b>
                    ({{ $cuotaEnLetras }})
                    <br>
                    Seguro de deuda: <b>{{ $solicitud->seguro_deuda }}</b>, Destino del préstamo: <b>
                        {{ $solicitud->destino }}</b>
                    <br>
                    garantías:
                    <b>{{ $solicitud->garantia }}</b>


                </div>
            <li><span class="item-solicitud">3- DATOS PERSONALES DEL CONYUGUE:</span>
                <div class="datos_solicitante">

                    Nombre según DUI:
                    <b>{{ $conyugue->nombre != null ? $conyugue->nombre : '_______________________________________' }}</b>
                    edad:
                    <b>{{ $edadConyugue != null ? $edadConyugue : '______________________________________________' }} </b>
                    años
                    <br>
                    Profesión u oficio:
                    <b>{{ $conyugue->profesion != null ? $conyugue->profesion : '________________' }}</b>, DUI:
                    <b>
                        {{ $conyugue->dui_cliente != null ? $conyugue->dui_cliente : '_____________________________________' }}</b>,
                    Extendido en:
                    <b>{{ $conyugue->dui_extendido != null ? $conyugue->dui_extendido : '_________________________' }}</b>
                    <br>
                    Fecha de expedicion: <b>{{ ($conyugue->fecha_expedicion!=null)?$conyugue->fecha_expedicion:'______________________________________' }}</b>, fecha de nacimiento.
                    <b>{{ ($conyugue->fecha_nacimiento!=null)?$conyugue->fecha_nacimiento:'____________________________________' }}</b>
                    <br>
                    Nacionalidad: <b>{{( $conyugue->nacionalidad !=null)? $conyugue->nacionalidad :'__________________________'}}</b>, estado Civi:
                    <b>{{ ($conyugue->estado_civil!=null)?$conyugue->estado_civil:'__________________________' }}</b>,
                    Telefono: <b> {{( $conyugue->telefono!=null)? $conyugue->telefono:'____________________________' }}</b>
                    <br>
                    Dirección personal: <b> {{( $conyugue->direccion_personal!=null)? $conyugue->direccion_personal:'_____________________________________________________________________________________________________' }}</b>
                    <br>
                    Lugar de trabajo: <b> {{ $conyugue->direccion_negocio  }} </b>
                    <br>
                    Nombre del negocio: <b> {{ ($conyugue->nombre_negocio !=null)?$conyugue->nombre_negocio :'____________________________________________________'}}</b>, Casa: <b>
                        {{ ($conyugue->tipo_vivienda!=null)?$conyugue->tipo_vivienda:'_______________________________________' }}</b>
                </div>
            <li><span class="item-solicitud">4- INGRESOS Y EGRESOS MENSUALES DEL SOLICITANTE:</span>
            <li><span class="item-solicitud">5- REFERENCIAS PERSONALES Y FAMILIARES:</span>
        </ul>


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

                    @foreach ($referencias as $beneficiario)
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
