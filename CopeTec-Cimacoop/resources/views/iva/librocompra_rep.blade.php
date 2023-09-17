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
    <div class="double-strikethrough">
        ASOCIACION COOPERATIVA DE AHORRO Y CREDITO LA CIMA - "CIMACOOP, DE R.L." <br>
        LIBRO DE COMPRAS
        <br>
        <table>
            <tr>
                <td>MES: </td>
                <td>{{ $mes }}</td>
                <td>NIT:
                <td>
                    1217-060522-103-1</td>
            </tr>
            <tr>
                <td>AÑO:
                <td> {{ $year }}</td>
                <td>N.R.C:
                <td>316936-2</td>
            </tr>
        </table>
        <br>
    </div>
    <br>

    <table class="table  fs-6 gy-1 gs-1" style="border: 1px solid rgb(0, 0, 0);">
        <thead class="fw-bold">
            <tr class="fw-semibold fs-7 text-gray-800 border-top-2 border-black"  style="border-bottom: 0px solid white;">
                <th class="min-w-50px ">#</th>
                <th class="min-w-100px ">FECHA</th>
                <th class="min-w-50px">No </th>
                <th class="min-w-250px">NOMBRE DEL PROVEEDOR</th>
                <th class="min-w-120px" colspan="2" style="border-bottom: 1px solid rgb(0, 0, 0);">COMPRAS EXENTAS</th>
                <th class="min-w-120px" colspan="2" style="border-bottom: 1px solid rgb(0, 0, 0);">COMPRAS GRAVADAS</th>
                <th class="min-w-50px">FOVIAL </th>
                <th class="min-w-50px">CREDITO </th>
                <th class="min-w-50px">TOTAL COMPRA</th>
                <th class="min-w-50px">PERCEPCION </th>
                <th class="min-w-50px">RETENCION</th>
                <th class="min-w-50px">RETENCION </th>
                <th class="min-w-50px">SUJETOS </th>
            </tr>
             <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
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
                <tr class="fs-6">
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
                    <td style="text-align: right">${{ number_format($compra->percepcion, 2) }}</td>
                    <td style="text-align: right">${{ number_format(0, 2) }}</td>


                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
