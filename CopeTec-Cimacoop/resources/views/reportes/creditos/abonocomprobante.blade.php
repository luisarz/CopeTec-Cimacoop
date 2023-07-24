<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>CoopeTec-Administracion de cooperativas CompuTec Consultores</title>
    {{-- <meta charset="utf-8" /> --}}
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        {!! $estilos !!}
    </style>

</head>

<body class="body">





    <div class="text-align-rigth " style="margin-right:100px; margin-top:100px; ">
        Cajaro : <span class="text-bold"> {{ strtoupper($abonoCredito->nombre_empleado) }} </span>
        <br>
        Fecha: {{ date('d-m-Y', strtotime($abonoCredito->fecha_pago)) }}
        <br>
        Hora: {{ date('h:m:s a', strtotime($abonoCredito->fecha_pago)) }}

    </div>
    <div style="margin-top: -10px; margin-left:30px; " class=" text-bold ">



        RECIBIMOS DE: {{ strtoupper($abonoCredito->nombre) }}
        <br>
        ({{ $abonoCredito->dui_cliente }})
        <br>
        {{ strtoupper($abonoCredito->direccion_personal) }}




    </div>

    <div style="margin-top: 50px; width=100px; text-align:center;">

        Cooperativa La Cima CIMACOOP DE RL
    </div>



    <span class="badge badge-success">Credito N°:<b> {{ $abonoCredito->codigo_credito }}</b> </span>
    <br>
    <span>Tasa Int:{{ number_format($abonoCredito->tasa, 2) }}%</span>

    {{ $abonoCredito->cliente_operacion }} {{ $abonoCredito->dui_operacion }}

    <table class="table w-90">
        <thead>
            <th class="min-w-150px fw-bold ta-left"> DESCRIPCION</th>
            <th class="min-w-200px fw-bold">ANTERIOR</th>
            <th class="min-w-150px fw-bold">NUEVO</th>
        </thead>

        <tbody>
            <tr>
                <td style="text-align: left;">SEGURO DE DEUDA</td>
                <td style="text-align: rigth;">${{ number_format($abonoCredito->seguro_deuda, 2) }}</td>
                <td style="text-align: rigth;">${{ number_format($abonoCredito->seguro_deuda, 2) }}</td>
            </tr>
            <tr>
                <td style="text-align: left;">INTERES SOBRE PRESTAMO</td>
                <td style="text-align: rigth;">${{ number_format($abonoCredito->interes, 2) }}</td>
                <td style="text-align: rigth;">${{ number_format($abonoCredito->interes, 2) }}</td>
            </tr>

            <tr>
                <td style="text-align: left;">INTERES MORATORIO</td>
                <td style="text-align: rigth;">${{ number_format($abonoCredito->mora, 2) }}</td>
                <td style="text-align: rigth;">${{ number_format($abonoCredito->mora, 2) }}</td>
            </tr>
            <tr>
                <td style="text-align: left;">APORTACION</td>
                <td style="text-align: rigth;">${{ number_format($abonoCredito->aportacion, 2) }}</td>
                <td style="text-align: rigth;">${{ number_format($abonoCredito->aportacion, 2) }}</td>
            </tr>
            <tr>
                <td style="text-align: left;">CAPITAL PAGADO</td>
                <td style="text-align: rigth;">${{ number_format($abonoCredito->capital, 2) }}</td>
                <td style="text-align: rigth;">${{ number_format($abonoCredito->capital, 2) }}</td>
            </tr>
            </tr>
            <tr>
                <td style="text-align: left;"></td>
                <td style="text-align: rigth;">TOTAL</td>
                <td style="text-align: rigth;">${{ number_format($abonoCredito->total_pago, 2) }}</td>
            </tr>
            <tr>
                <td style="text-align: left;"></td>
                <td style="text-align: left;">{{ $numeroEnLetras }}</td>
            </tr>

        </tbody>

    </table>


</body>

</html>
