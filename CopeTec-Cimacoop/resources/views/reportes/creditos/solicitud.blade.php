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

<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">

<div style="display: table; width: 100%;">
    <div style="display: table-cell; width: 100px; vertical-align: middle;">
        <img src="{{ public_path('assets/media/logos/cimacoop.png') }}" alt="logo" style="width: 100px; height: 100px;">
    </div>
    <div style="display: table-cell; text-align: center; vertical-align: middle;">
        <h3 style="font-size: 16px; font-family: 'verdana', serif; font-weight: bold; border-bottom: solid 1px #000000; margin-top: 35px;">
            {{ strtoupper($configuracion->nombre_comercial) }}
            <br>
            <span style="font-size: 16px;">{{ strtoupper($configuracion->nombre_empresa) }}</span>
            <br>
            <span style="font-size: 16px;"> SOLICITUD DE CRÉDITO # {{ str_pad($solicitud->numero_solicitud, 10, '0', STR_PAD_LEFT) }}  EJECUTIVO:</span>
        </h3>
    </div>
</div>
<div style="text-align: right; font-size: 16px; font-weight: bold;">
    Fecha: {{ date('d-m-Y',strtotime($solicitud->fecha_solicitud )) }}
</div>
    <div class="row" style="font-size:12px; ">
        <ul style=" list-style-type: none;">
            <li class="items_li"><span class="item-solicitud">1- DATOS GENERALES DEL SOLICITANTE:</span>
                <div class="datos_solicitante" style="font-size: 16px; line-height: 1.5">
                    Nombre según DUI: <b>{{ $solicitud->cliente->nombre }}</b> edad: <b>{{ $edadCliente }} </b> años
                    <br>
                    Profesión u oficio: <b>{{ $solicitud->cliente->profesion->name }}</b>, DUI: <b> {{ $solicitud->cliente->dui_cliente }}</b>,
                    Extendido en:
                    <b>{{ $solicitud->cliente->dui_extendido }}</b>
                    <br>
                    Fecha de expedicion: <b>{{ date('d-m-Y',strtotime($solicitud->cliente->fecha_expedicion)) }}</b>, fecha de nacimiento.
                    <b>{{ date('d-m-Y',strtotime($solicitud->cliente->fecha_nacimiento )) }}</b>
                    Nacionalidad: <b>{{ $solicitud->cliente->nacionalidad }}</b>, <br> estado Civi:
                    <b>{{ $solicitud->cliente->estado_civil }}</b>,
                    Telefono: <b> {{ $solicitud->cliente->telefono }}</b> <br>
                    Dirección personal: <b> {{ $solicitud->cliente->direccion_personal }}</b> <br>
                    Dirección del negocio: <b> {{ $solicitud->cliente->direccion_negocio }} </b>
                    <br>
                    Nombre del negocio: <b> {{ $solicitud->cliente->nombre_negocio }}</b>, Casa: <b>
                        @php
                            $casaOptions = [
                                1 => 'Propia',
                                0 => 'Alquilada',
                                2 => 'Familiar',
                            ];
                            $casaString = $casaOptions[$solicitud->cliente->tipo_vivienda] ?? '';
                        @endphp

                        {{ $casaString }}</b>
                </div>
                <br>
            <li><span class="item-solicitud">2- DATOS DEL CRÉDITO SOLICITADO:</span>
                <div class="datos_solicitante" style="font-size: 16px; line-height: 1.5">
                    Cantidad Solicitada: <b>${{ number_format($solicitud->monto_solicitado, 2, '.', ',') }}</b>
                    ({{ $montoSolicitadoEnLetras }}), plazo: &nbsp;&nbsp; <b>&nbsp;{{ $solicitud->plazo }}</b>
                    (meses),
                    Tasa de interes: <b> {{ $solicitud->tasa }}%</b>, cuota: <b>
                        ${{ number_format($solicitud->cuota +$solicitud->aportaciones??0, 2, '.', ',') }}</b>
                    ({{ $cuotaEnLetras }})
                    <br>
                    Seguro de deuda: <b>{{ $solicitud->seguro_deuda }}</b>, Destino del préstamo: <b>
                        {{ $solicitud->destinoCredito->descripcion }} ({{ $solicitud->destinoCredito->numero??'S/N' }})</b>
                    <br>
                    garantías:
                    <b>{{ $solicitud->tipoGarantia->descripcion }}</b>


                </div>
                <br>
            <li><span class="item-solicitud">3- DATOS PERSONALES DEL CONYUGUE:</span>
                <div class="datos_solicitante" style="font-size: 16px; line-height: 1.5">

                    Nombre según DUI:
                    <b>{{ $conyugue->nombre != null ? $conyugue->nombre : '___________________________________________________________' }}</b>
                    edad:
                    <b>{{ $edadConyugue != null ? $edadConyugue : '______________________________________________' }}
                    </b>

                    <br>
                    Profesión u oficio:
                    <b>{{ $conyugue->profesion != null ? $conyugue->profesion->name : '___________________________________' }}</b>, DUI:
                    <b>
                        {{ $conyugue->dui_cliente != null ? $conyugue->dui_cliente : '_________________________________' }}</b>,
                    Extendido en:
                    <b>{{ $conyugue->dui_extendido != null ? $conyugue->dui_extendido : '_______________________' }}</b>
                    <br>
                    Fecha de expedicion:
                    <b>{{ $conyugue->fecha_expedicion != null ? date('d-m-Y',strtotime($conyugue->fecha_expedicion)) : '_____________________________________________' }}</b>,
                    fecha de nacimiento.
                    <b>{{ $conyugue->fecha_nacimiento != null ? date('d-m-Y',strtotime($conyugue->fecha_nacimiento)) : '_________________________________________' }}</b>
                    <br>
                    Nacionalidad:
                    <b>{{ $conyugue->nacionalidad != null ? $conyugue->nacionalidad : '_____________________________' }}</b>,
                    estado Civi:
                    <b>{{ $conyugue->estado_civil != null ? $conyugue->estado_civil : '_____________________________' }}</b>,
                    Telefono: <b>
                        {{ $conyugue->telefono != null ? $conyugue->telefono : '__________________________________' }}</b>
                    <br>
                    Dirección personal: <b>
                        {{ $conyugue->direccion_personal != null ? $conyugue->direccion_personal : '___________________________________________________________________________________________________________________' }}</b>
                    <br>
                    Lugar de trabajo: <b>
                        {{ $conyugue->direccion_negocio != '' ? $conyugue->direccion_negocio : '____________________________________________________________________________________________________________' }}
                    </b>
                    <br>
                    Nombre del negocio: <b>
                        {{ $solicitud->empresa_labora != null ? $solicitud->empresa_labora : '__________________________________________________' }}</b>,
                    Tiempo laborando: <b>
                        {{ $solicitud->tiempo_laborando != null ? $solicitud->tiempo_laborando : '_______________________________________' }}</b>
                    <br>
                    Cargo que desempeña: <b>
                        {{ $solicitud->cargo != null ? $solicitud->cargo : '______________________________' }}</b>,
                    Salario: <b>
                        {{ $solicitud->sueldo_conyugue != null ? $solicitud->sueldo_conyugue : '___________________________' }}</b>,
                    Telefono trabajo: {{ $solicitud->telefono_trabajo!=null?$solicitud->telefono_trabajo:'_______________________' }}
                </div>
                <br>
            <li><span class="item-solicitud">4- INGRESOS Y EGRESOS MENSUALES DEL SOLICITANTE:</span>
                <div class="datos_solicitante" style="font-size: 16px; line-height: 1">
                    <table class="table w-50%" style="border: 1px solid white; height: 10px;">
                        <thead style="text-align: center; font-size:15px;">
                            <tr>
                                <th class="min-w-400px"> INGRESOS</th>
                                <th class="min-w-250"></th>
                                <th class="min-w-100"></th>
                                <th class="min-w-400px">EGRESOS</th>
                                <th class="min-w-250"></th>

                            </tr>
                        </thead>
                        <tr>
                            <td class="min-w-400px">Sueldo</td>
                            <td class="min-w-100">{{ number_format($solicitud->sueldo_solicitante, 2, '.', ',') }}</td>
                            <td class="min-w-100" style="border-left: 3px solid rgb(0, 0, 0);">&nbsp;</td>
                            <td class="min-w-400px">Gastos de vida</td>
                            <td class="min-w-100">{{ $solicitud->gastos_vida }}</td>
                        </tr>
                        <tr>
                            <td class="min-w-400px">Comisiones</td>
                            <td class="min-w-100">{{ $solicitud->comisiones }}</td>
                            <td class="min-w-100" style="border-left: 3px solid rgb(0, 0, 0);">&nbsp;</td>
                            <td class="min-w-400px">Pago de obligaciones</td>
                            <td class="min-w-100">{{ $solicitud->pagos_obligaciones }}</td>

                        </tr>
                        <tr>
                            <td class="min-w-400px">Negocio Propio</td>
                            <td class="min-w-100">{{ $solicitud->negocio_propio }}</td>
                            <td class="min-w-100" style="border-left: 3px solid rgb(0, 0, 0);">&nbsp;</td>
                            <td class="min-w-400px">Gastos de negocio</td>
                            <td class="min-w-100">{{ $solicitud->gastos_negocios }}</td>

                        </tr>
                        <tr>
                            <td class="min-w-400px">Otros Ingresos</td>
                            <td class="min-w-100">{{ $solicitud->otros_ingresos }}</td>
                            <td class="min-w-100" style="border-left: 3px solid rgb(0, 0, 0);">&nbsp;</td>

                            <td class="min-w-400px">Otros Gastos</td>
                            <td class="min-w-100">{{ $solicitud->otros_gastos }}</td>

                        </tr>
                        <tr style="border-top: 3px solid rgb(0, 0, 0);">
                            <td class="min-w-400px">TOTAL </td>
                            <td class="min-w-100"> {{ number_format($solicitud->total_ingresos,2) }}</td>
                            <td class="min-w-100" style="border-left: 3px solid rgb(0, 0, 0);">&nbsp;</td>
                            <td class="min-w-400px">TOTAL </td>
                            <td class="min-w-100">{{ number_format($solicitud->total_gasto ,2)}}</td>
                        </tr>
                        <tbody class=" fs-1 text-black-800">
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" style="border-top: 1px solid rgb(0, 0, 0); text-align: center;">DIFERENCIA ${{number_format(($solicitud->total_ingresos )- $solicitud->total_gasto,2)}}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            <li><span class="item-solicitud">5- REFERENCIAS PERSONALES Y FAMILIARES:</span>
                <div class="datos_solicitante" style="font-size: 16px; line-height: 1">
                    <table class="table table-bordered" >
                        <thead style="text-align: center; font-size:18px;">
                            <tr>
                                <th width="5%">#</th>
                                <th width="20%"> Nombre</th>
                                <th width="10%">Parentesco</th>
                                <th width="15%">Telefono</th>
                                <th width="30%">Direccion</th>
                                <th width="30%">Lugar de trabajo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($referencias as $referencia)
                                <tr>
{{--                                    {{$referencia}}--}}
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $referencia->referencias->nombre??''}}</td>
                                    <td>{{ $referencia->parentesco->parentesco??'' }}</td>
                                    <td>{{ $referencia->referencias->telefono }}</td>
                                    <td>{{ $referencia->referencias->direccion??'' }}</td>
                                    <td>{{ $referencia->referencias->lugar_trabajo??'' }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            <li><span class="item-solicitud">6- DETALLES DE BIENES:</span>
                <div class="datos_solicitante" style="font-size: 16px; line-height: 1">
                    <table class="table table-bordered">
                        <thead style="text-align: center; font-size:18px;">
                            <tr>
                                <th width="5%">#</th>
                                <th width="20%"> Clase de propiedad</th>
                                <th width="30%">Direccion</th>
                                <th width="10%">Valor</th>
                                <th width="10%">Hipotecada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bienes as $bien)
                                <tr style="padding: 10px">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bien->clase_propiedad }}</td>
                                    <td>{{ $bien->direccion }}</td>
                                    <td style="text-align: center">{{ number_format($bien->valor,2,'.',',') }}</td>
                                    <td style="text-align: center">{{ ($bien->Hipotecado_bien ==0)?'NO':'SI'}}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
        </ul>
        <br>
        F:_______________________________________
        <br>FIRMA DEL SOLICITANTE o CODEUDOR


    </div>


</body>

</html>
