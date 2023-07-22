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
          CIMACOOP DE R.L 
          <br>
          HOJA DE LIQUIDACION DE PRESTAMO
          <hr>
          DATOS DEL PRESTAMO
        </center>
      <div class="divFecha"> 
        Fecha de desembolso: 
        {{ \Carbon\Carbon::parse($credito->fecha_desembolso)->format('d \d\e ') . \Carbon\Carbon::parse($solicitud->fecha_solicitud)->monthName . \Carbon\Carbon::parse($solicitud->fecha_solicitud)->format(' \d\e Y') }}
        </div>
        <ul style=" list-style-type: none;">

            <li class="items_li">
                <span class="item-solicitud">1- DATOS GENERALES DEL SOLICITANTE:</span>
                <div class="datos_solicitante">
                   Asociado: <b>{{ $solicitud->nombre }}</b> Codigo: <b>{{ $solicitud->id_cliente }} </b> 
                    <br>
                   Fecha de desembolso <b>{{ $credito->fecha_desembolso }}</b>, Número prestamos: <b> {{ $credito->codigo_credito }}</b> <br>
                    Linea de Credito en:<b>{{ $solicitud->dui_extendido }}</b>
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
            <li><span class="item-solicitud">4- INGRESOS Y EGRESOS MENSUALES DEL SOLICITANTE:</span>
                <div class="datos_solicitante">
                    <table class="table w-50%" style="border: 1px solid white;">
                        <thead style="text-align: center; font-size:18px;">
                            <tr>
                                <th class="min-w-400px"> INGRESOS</th>
                                <th class="min-w-200"></th>
                                <th class="min-w-100"></th>
                                <th class="min-w-400px">EGRESOS</th>
                                <th class="min-w-200"></th>

                            </tr>
                        </thead>
                        <tr>
                            <td class="min-w-400px">Sueldo</td>
                            <td class="min-w-100">${{ number_format($solicitud->sueldo_solicitante, 2, '.', ',') }}
                            </td>
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
                            <td class="min-w-400px">TOTAL</td>
                            <td class="min-w-100">{{ $solicitud->total_ingresos }}</td>
                            <td class="min-w-100" style="border-left: 3px solid rgb(0, 0, 0);">&nbsp;</td>

                            <td class="min-w-400px">TOTAL</td>
                            <td class="min-w-100">{{ $solicitud->total_gasto }}</td>

                        </tr>


                        <tbody class=" fs-1 text-black-800">
                        </tbody>
                    </table>
                </div>

            <li><span class="item-solicitud">5- REFERENCIAS PERSONALES Y FAMILIARES:</span>
                <div class="datos_solicitante">
                    <table class="table table-bordered">
                        <thead style="text-align: center; font-size:18px;">
                            <tr>
                                <th width="5%">#</th>
                                <th width="30%"> Nombre</th>
                                <th width="10%">Parentesco</th>
                                <th width="30%">Direccion</th>
                                <th width="30%">Lugar de trabajo</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($referencias as $referencia)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $referencia->nombre }}</td>
                                    <td>{{ $referencia->parentesco }}</td>
                                    <td>{{ $referencia->direccion }}</td>
                                    <td>{{ $referencia->lugar_trabajo }}</td>
                                </tr>
                            @endforeach --}}

                        </tbody>
                    </table>

                </div>
            <li><span class="item-solicitud">6- DETALLES DE BIENES:</span>
                <div class="datos_solicitante">
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
                            {{-- @foreach ($bienes as $bien)
                                <tr style="padding: 10px">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bien->clase_propiedad }}</td>
                                    <td>{{ $bien->direccion }}</td>
                                    <td style="text-align: center">{{ number_format($bien->valor,2,'.',',') }}</td>
                                    <td style="text-align: center">{{ ($bien->Hipotecado_bien ==0)?'NO':'SI'}}</td>
                                </tr>
                            @endforeach --}}

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
