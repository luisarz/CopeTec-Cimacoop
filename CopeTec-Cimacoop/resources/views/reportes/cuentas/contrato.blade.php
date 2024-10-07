<!DOCTYPE html>
<html lang="es">

<head>
    <title>CoopeTec-Administracion Contrato - {{ strtoupper($datosContrato->nombre) }}</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        {!! $estilos !!} 
        
        {!! $stilosBundle !!}

       ul {
            list-style: none; /* Remove default bullets */
            counter-reset: list-counter; /* Initialize the counter */
            padding-left: 0;
        }

        li {
            counter-increment: list-counter; /* Increment the counter */
            margin-bottom: 10px;
            padding-left: 30px; /* Indentation for text alignment */
            position: relative; /* Relative positioning for the numbers */
        }

        li::before {
            content: counter(list-counter) ". "; /* Use the counter before each list item */
            font-weight: bold;
            position: absolute; /* Position the number absolutely */
            left: 0; /* Align the number to the left */
            width: 20px; /* Fixed width for the number block */
            text-align: right; /* Align numbers to the right */
        }
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
            <span style="font-size: 18px;">{{ strtoupper($reporteName) }}: {{ str_pad($datosContrato->numero_cuenta, 10, '0', STR_PAD_LEFT) }} </span>
        </h3>
        <h4>Monto de apertura: ${{ number_format($datosContrato->monto_apertura, 2) }}</h4>

    </div>
</div>


    <div
        style="text-align: justify; font-size: 16px; font-family:  'arial'; line-height: 1.5; padding:25px; padding-right:35px;">


      La {{$configuracion->nombre_comercial}} Y &nbsp;&nbsp;
        <b>{{ strtoupper($datosContrato->asociado->cliente->nombre) }}</b> &nbsp; &nbsp; de
        {{ $edad }} años de edad, &nbsp;de profesión <b>{{ strtoupper($datosContrato->asociado->cliente->profesion->name??'S/N') }} </b>,
            estado civil <b>{{ $datosContrato->asociado->cliente->estado_civil }}</b>,
            Dirección: <b>{{ $datosContrato->asociado->cliente->direccion_personal }}</b>; <br>

        Portador(es) de su Documento Unico de Identidad No.(s). <b>{{ $datosContrato->asociado->cliente->dui_cliente }}</b>. Quienes en
        adelante se denominaran respectivamente: " <b> {{$configuracion->nombre_empresa}} </b>" y Ahorrante(s) celebran el siguiente contrato:
        <ul>

            <li> {{$configuracion->nombre_empresa}} acepta la cantidad inicial de &nbsp; <u> <b>{{ $numeroEnLetras }} &nbsp; &nbsp;
                            (${{ number_format($datosContrato->monto_apertura, 2) }})</b> </u> de los Estados Unidos de
                        America, como cuota de ahorro a la vista, valor que servirá para acreditarse como ahorrante y que no
                        sera un monto fijo del cual podrá retirar dejando un mínino en la cuenta de <b>un</b> Dólar ($1.00)
            </li>
            <li>El (los) ahorrante(s) podrá(n) retirar total o parcialmente sus depósitos prestando el documento de
                 retiro que será proporcionado por la Cooperativa.
            </li>
            <li>{{$configuracion->nombre_empresa}} reconocerá y pagara por saldo diario de depósito en cuenta de &nbsp;
                    <u>{{ $datosContrato->tipo_cuenta->descripcion_cuenta??'S/N'}}</u> un
                    interés del &nbsp; &nbsp;<u><b>{{ $datosContrato->interes->interes }}</b></u> &nbsp; % anual y capitalizado mensualmente.
            </li>
            <li>Los Depositos en Cuenta de Ahorro se recibiran en efectivo o cheque adjuntando el documento de
                    depósito que será proporcionado por la Cooperativa, cuando el depósito sea por cheque este se reconocerá
                    como ahorro al momento que el banco librador acredite la cantidad en efectivo.
            </li>
            <li>Si un Documento de Depósito o Retiro le falta información el cajero no podrá aceptar hasta que el
                 ahorrante lo complete y no será válido si no tiene la firma y el sello del cajero.</li>
            <li>En caso de destrucción, extravío o robo de la Libreta de Ahorro, amparado por este contrato el
                    ahorrante se compromete a dar aviso de inmediato a la Cooperativa, quien entregará una nueva con el
                    saldo registrado, previo pago de US$3.00 por gastos de reposición con los mismos datos del anterior.
            </li>
            <li>El (los) ahorrante(s) hace(n) constar que conoce(n) y aceptá(n) las condiciones de este contrato.
            </li>
            <li>Beneficiarios:</li>
        </ul>
        <table class="table table-bordered">
            <thead>

                <th>N°</th>
                <th>NOMBRES Y APPELLIDOS</th>
                <th>PARENTESCO</th>
                <th>PORCENTAJE</th>
            </thead>
            <tbody style="border: 1px solid rgb(0, 0, 0);">
                @foreach ($datosContrato->beneficiarios as $beneficiario)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td style="text-align: left;">{{ strtoupper($beneficiario->nombre )}}</td>
                        <td>{{ $beneficiario->parentesco_cliente->parentesco }}</td>
                        <td>{{ $beneficiario->porcentaje }}%</td>
                    </tr>
                @endforeach

            </tbody>

        </table>
        San Miguel,
        {{ \Carbon\Carbon::parse($datosContrato->fecha_ingreso)->format('d \d\e ') . \Carbon\Carbon::parse($datosContrato->fecha_ingreso)->monthName . \Carbon\Carbon::parse($datosContrato->fecha_ingreso)->format(' \d\e Y') }}

        <br>
        <br>
        <br>
        <b>
            <table class="table table-borderless" style="border: 1px solid rgb(255, 255, 255) !important;">
                <thead style="">
                    <th style="border-bottom: 1px solid rgb(2, 2, 2) !important;"></th>
                    <th style="border-bottom: 0px solid rgb(255, 255, 255) !important;"></th>
                    <th style="border-bottom: 1px solid rgb(0, 0, 0) !important;"></th>


                </thead>
                <tbody style="border: 1px solid rgb(255, 255, 255);">
                    <tr style="border: 1px solid rgb(255, 255, 255);">
                        <td style="border: 1px solid rgb(255, 255, 255);">CIMACOOP DE R.L. <br>FIMRA Y SELLO</td>
                        <td style="border: 1px solid rgb(255, 255, 255); width:50px;"></td>
                        <td style="border: 1px solid rgb(255, 255, 255);"> {{$datosContrato->asociado->cliente->nombre}}
                            <br> FIRMA(S) DE (LOS) AHORRANTE(S)</td>
                    </tr>
                </tbody>
            </table>
        </b>

    </div>


</body>

</html>
