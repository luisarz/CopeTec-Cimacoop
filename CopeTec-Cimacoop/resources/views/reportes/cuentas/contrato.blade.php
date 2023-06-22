<!DOCTYPE html>
<html lang="es">

<head>
    <title>CoopeTec-Administracion de cooperativas CompuTec Consultores</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        {!! $estilos !!}
    </style>

</head>

<body>




    <div
        style="text-align: center; font-size: 18px; font-family: 'verdana'; font-weight: bold;border-bottom: solid 1px #000000; margin-top:35px;">
        CONTRATO DE CUENTA DE AHORRO Nº {{ str_pad($datosContrato->numero_cuenta, 10, '0', STR_PAD_LEFT) }} <br>
        SALDO DE APERTURA: ${{ number_format($datosContrato->monto_apertura, 2) }}

    </div>

    <div
        style="text-align: justify; font-size: 16px; font-family:  'arial'; line-height: 1.5; padding:25px; padding-right:30px;">


        La Asociación. Cooperativa de Ahorro Y Crédito LA CIMA DE Responsabilidad Limitada" Y &nbsp; <b>
            {{ strtoupper($datosContrato->nombre) }}</b> &nbsp; &nbsp; de
        {{ $edad }} años, &nbsp; <b>{{ strtoupper($datosContrato->profesion) }}</b> &nbsp;&nbsp;
        de profesión, &nbsp;<b>{{ $datosContrato->estado_civil }}</b>, Dirección,
        <b>{{ $datosContrato->direccion_personal }}</b>,
        <b>{{ $datosContrato->direccion_personal }}</b>, ;
        Portador(es) de su Documento Unico de Identidad No. (s). <b>{{ $datosContrato->dui_cliente }}</b>. Quienes en
        adelante se denominaran
        respectivamente: "CIMACOOP DE R.L." y Ahorrante(s) celebran el siguiente contrato:
        <ul style=" list-style-type: none;">
            <li>1. CIMACOOP, DE R.L. acepta la cantidad inicial de de &nbsp; <u> {{ $numeroEnLetras }}
                    (${{ number_format($datosContrato->monto_apertura, 2) }}) </u> de los Estados Unidos de
                America, como cuota de ahorro a la vista, valor que servira para acreditarse como ahorrante y que no
                sera un monto fijo del cual podra retirar dejando un rninirno en la cuenta de <b>UN</b> Dólar ($1.00)
            </li>
            <li>2. El (los) ahorrante(s) podra(n) retirar total o parcialmente sus Deóositos prestando el documento de
                retiro de sere proporcionado por la Cooperativa.</li>
            <li>3. CIMACOOP, de R.L. reconocera y pagara por saldo diario de Deposito en Cuenta de
                {{ $datosContrato->tipo_cuenta }} un
                interes del {{ $datosContrato->interes }} % anual y capitalizado mensualmente.</li>
            <li>4. Los DepOsitos en Cuenta de Ahorro se recibiran en efectivo o cheque adjuntando el documento de
                depósito que sere proporcionado por la Cooperativa, cuando el depositó sea por cheque este se reconocera
                como ahorro al momento que el banco librador acredite la cantidad en efectivo.</li>
            <li>5. Si un Documento de Depósito o Retiro le falta información el cajero no podra aceptar hasta que el
                ahorrante lo complete y no sera valido si no tiene la firma y el sello del cajero.</li>
            <li>6. En caso de destrucción, extravio o robo de la Libreta de Ahorro, amparado por este contrato el
                ahorrante se compromete a dar aviso de inmediato a la Cooperativa, quien entregaran una nueva con el
                saldo registrado, previo pago de US$3.00 por gastos de reposition con los mismos datos del anterior.
            </li>
            <li>7. El (los) ahorrante(s) hace(n) constar que conoce(n) y acepta(n) las condiciones de este contrato.
            </li>
            <li>8. Beneficiarios:</li>
        </ul>
        <table class="table table-bordered">
            <thead>

                <th>N°</th>
                <th>NOMBRES Y APPELLIDOS</th>
                <th>PARENTESCO</th>
                <th>PORCENTAJE</th>
            </thead>
            <tbody style="border: 1px solid rgb(0, 0, 0);">
                @foreach ($beneficiarios as $beneficiario)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $beneficiario->nombre }}</td>
                        <td>{{ $beneficiario->parentesco }}</td>
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
        <table class="table">
            <thead >
                <th style="border-bottom: 1px solid rgb(0, 0, 0) !important;"></th>
                <th style="border-bottom: 0px solid red !important;"></th>
                <th style="border-bottom: 1px solid rgb(0, 0, 0) !important;"></th>


            </thead>
            <tbody>
                <tr>
                    <td>CIMACOOP DE R.L. <br>FIMRA Y SELLO</td>
                    <td style="border: 0px solid red; width:50px;"></td>
                    <td> FIRMA(S) DE (LOS) AHORRANTE(S)</td>
                </tr>
            </tbody>
        </table>
</b>

    </div>













</body>

</html>
