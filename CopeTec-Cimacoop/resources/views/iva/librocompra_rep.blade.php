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
@php
    $iva = 0;
    $neto = 0;
    $total = 0;
    $percepcion = 0;
    $excento = 0;
    $gravado = 0;
    $fovial = 0;
@endphp

<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
    <div class="double-strikethrough">
        ASOCIACION COOPERATIVA DE AHORRO Y CREDITO LA CIMA - "CIMACOOP, DE R.L." <br>
        LIBRO DE COMPRAS
        <br>
        <table style="border: 1px solid white;">
            <tr>
                <td>MES: </td>
                <td style="text-align: right">{{ $mes }}</td>
                <td>NIT:
                <td style="text-align: right">
                    1217-060522-103-1</td>
            </tr>
            <tr>
                <td>AÑO:
                <td style="text-align: right"> {{ $year }}</td>
                <td>N.R.C:
                <td style="text-align: right">
                    316936-2
                </td>
            </tr>
        </table>
        <br>
    </div>
    <br>

    <table class="table  fs-6 gy-1 gs-1" style="border: 1px solid rgb(255, 255, 255);">
        <thead class="fw-bold">
            <tr class="fw-semibold fs-7 text-gray-800 border-top-2 border-black"
                style="border-bottom: 0px solid rgb(255, 255, 255);">
                <th class="min-w-50px ">#</th>
                <th class="min-w-100px ">FECHA</th>
                <th class="min-w-50px">No </th>
                <th class="min-w-250px">NOMBRE DEL PROVEEDOR</th>
                <th class="min-w-120px" colspan="2" style="border-bottom: 1px solid rgb(0, 0, 0);">COMPRAS EXENTAS
                </th>
                <th class="min-w-120px" colspan="2" style="border-bottom: 1px solid rgb(0, 0, 0);">COMPRAS GRAVADAS
                </th>
                <th class="min-w-50px">FOVIAL </th>
                <th class="min-w-50px">CREDITO </th>
                <th class="min-w-50px">TOTAL COMPRA</th>
                <th class="min-w-50px">PERCEPCION </th>
                <th class="min-w-50px">RETENCION</th>
                <th class="min-w-50px">RETENCION </th>
                <th class="min-w-50px">SUJETOS </th>
            </tr>
            <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200"
                style="border-bottom: 0px solid rgb(0, 0, 0);">
                <th class="min-w-50px "></th>
                <th class="min-w-100px "></th>
                <th class="min-w-50px">DOCUMENTO</th>
                <th class="min-w-50px"></th>
                <th class="min-w-50px">INTERNAS</th>
                <th class="min-w-50px">IMPORT</th>
                <th class="min-w-50px">INTERNAS</th>
                <th class="min-w-50px">IMPORT</th>
                <th class="min-w-50px">COTRANS</th>
                <th class="min-w-50px">FISCAL</th>
                <th class="min-w-50px"></th>
                <th class="min-w-50px">IVA</th>
                <th class="min-w-50px">IVA</th>
                <th class="min-w-50px">TERCEROS</th>
                <th class="min-w-50px">EXCLUIDOS</th>
            </tr>
        </thead>
        <tbody class="fs-4">
            @foreach ($compras as $compra)
                <tr class="fs-6" style="border: 1px solid rgb(255, 255, 255);">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date('d-m-Y', strtotime($compra->fecha_compra)) }}</td>
                    <td>{{ $compra->numero_fcc }}</td>
                    <td>{{ $compra->razon_social }}</td>
                    <td style="text-align: right">${{ number_format(0, 2) }}</td>
                    <td style="text-align: right">${{ number_format(0, 2) }}</td>

                    <td style="text-align: right">${{ number_format($compra->neto, 2) }}</td>
                    <td style="text-align: right">${{ number_format(0, 2) }}</td>
                    <td style="text-align: right">${{ number_format(0, 2) }}</td>

                    <td style="text-align: right">${{ number_format($compra->iva, 2) }}</td>
                    <td style="text-align: right">${{ number_format($compra->total, 2) }}</td>
                    <td style="text-align: right">${{ number_format($compra->percepcion, 2) }}</td>
                    <td style="text-align: right">${{ number_format(0, 2) }}</td>
                    <td style="text-align: right">${{ number_format(0, 2) }}</td>
                    <td style="text-align: right">${{ number_format(0, 2) }}</td>

                    @php
                        $iva = $iva + $compra->iva;
                        $neto = $neto + $compra->neto;
                        $total = $total + $compra->total;
                        $percepcion = $percepcion + $compra->percepcion;
                    @endphp


                </tr>
            @endforeach
        </tbody>

    </table>

    <table class="  fs-2 gy-1 gs-1" style="border: 1px solid rgb(0, 0, 0);">

        <tbody class="fs-4">
            <tr class="fs-6 fw-bold">
                <td colspan="4" style="width: 525px;">TOTALES</td>
                <td style="text-align: right; width: 50px;">${{ number_format(0, 2) }}</td>
                <td style="text-align: right; width: 60px; ">${{ number_format(0, 2) }}</td>
                <td style="text-align: right; width:80px !important; ">${{ number_format($neto, 2) }}</td>
                <td style="text-align: right;width:60px !important; " >${{ number_format(0, 2) }}</td>
                <td style="text-align: right; width:70px !important;">${{ number_format(0, 2) }}</td>
                <td style="text-align: right; width:75px !important;">${{ number_format($iva, 2) }}</td>
                <td style="text-align: right; width:80px !important;">${{ number_format($total, 2) }}</td>
                <td style="text-align: right; width:80px !important;">${{ number_format($percepcion, 2) }}</td>
                <td style="text-align: right; width:80px !important;">${{ number_format(0, 2) }}</td>
                <td style="text-align: right; width:72px !important;">${{ number_format(0, 2) }}</td>
                <td style="text-align: right; width:75px !important;">${{ number_format(0, 2) }}</td>

            </tr>

            
        </tbody>
    </table>


</body>

</html>
