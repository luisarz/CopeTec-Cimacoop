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
    $retencion = 0;
    $excento = 0;
    $gravado = 0;
    $fovial = 0;
@endphp

<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
    <div class="double-strikethrough">
        ASOCIACION COOPERATIVA DE AHORRO Y CREDITO LA CIMA - "CIMACOOP, DE R.L." <br>
        LIBRO DE VENTAS A CONSUMIDORES
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
                <th class="min-w-50px "></th>
                <th class="min-w-100px "></th>
                <th class="min-w-100px"></th>
                <th class="min-w-100px"></th>
                <th class="min-w-50px"></th>
                <th class="min-w-200px fw-bold" colspan="4" style="border-bottom: 1px solid rgb(0, 0, 0);">VENTAS
                    CONSUMIDORES
                </th>
                </th>
                <th class="min-w-100px"> </th>
                <th class="min-w-100px"></th>
            </tr>
            <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200"
                style="border-bottom: 0px solid rgb(0, 0, 0);">
                <th class="min-w-50px ">#</th>
                <th class="min-w-100px ">FECHA</th>
                <th class="min-w-50px">DEL NO</th>
                <th class="min-w-50px">AL NO</th>
                <th class="min-w-50px">No MAQUINA</th>
                <th class="min-w-50px">EXENTAS</th>
                <th class="min-w-50px">GRAVADAS</th>
                <th class="min-w-50px">EXPORT.</th>
                <th class="min-w-50px">TERCEROS</th>
                <th class="min-w-50px">TOTAL VENTA</th>
                <th class="min-w-50px">RETENCION</th>
            </tr>
        </thead>
        <tbody class="fs-4">
            @foreach ($compras as $compra)
                <tr class="fs-6 text-center" style="border: 1px solid rgb(255, 255, 255);">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date('d-m-Y', strtotime($compra->fecha_factura)) }}</td>
                    <td class="text-center">{{ $compra->inicial }}</td>
                    <td class="text-center">{{ $compra->final }}</td>
                    <td style="text-align: right"></td>
                    <td style="text-align: right">${{ number_format(0, 2) }}</td>
                    <td style="text-align: right">${{ number_format($compra->total, 2) }}</td>
                    <td style="text-align: right">${{ number_format(0, 2) }}</td>
                    <td style="text-align: right">${{ number_format(0, 2) }}</td>

                    <td style="text-align: right">${{ number_format($compra->total, 2) }}</td>
                    <td style="text-align: right">${{ number_format($compra->retencion, 2) }}</td>

                    @php
                        // $iva = $iva + $compra->iva;
                        $neto = $neto + $compra->neto;
                        $total = $total + $compra->total;
                        $retencion = $retencion + $compra->retencion;
                    @endphp


                </tr>
            @endforeach
        </tbody>

    </table>

    <table class="table  fs-5 gy-1 gs-1">

        <tbody class="fs-4">
            <tr class="fs-6 fw-bold" style="border: 1px solid rgb(255, 255, 255);">
                <td style="text-align: right; width:255px style="border: 1px solid rgb(255, 255, 255);" colspan="5">
                    TOTALES</td>
                <td style="text-align: right; width:70px; border: 1px solid rgb(255, 255, 255);">
                    ${{ number_format(0, 2) }}
                </td>
                <td style="text-align: right; width:80px">${{ number_format($total, 2) }}</td>
                <td style="text-align: right; width:65px">${{ number_format(0, 2) }}</td>
                <td style="text-align: right; width:78px">${{ number_format(0, 2) }}</td>
                <td style="text-align: right; width:100px">${{ number_format($total, 2) }}</td>
                <td style="text-align: right; width:100px">${{ number_format($retencion, 2) }}</td>

            </tr>


        </tbody>
    </table>
  <div class="double-strikethrough">
    <table class="table  fs-6 gy-1 gs-1">
         @php
         $neto= $total / 1.13;
                    $iva = $total - ($total / 1.13);
                    $total= $neto + $iva;
                @endphp

        <tbody class="fs-4"  style="border: 1px solid rgb(255, 255, 255);">
            <tr class="fs-6 ">
                <td width="250"></td>
                <td style="text-align: left; width:350px" >VENTAS LOCALES GRAVADAS NETAS</td>
                <td style="text-align: right; width:150px; ">${{ number_format($neto, 2) }}</td>
                <td style="text-align: right; width:100px; "></td>
            </tr>
              <tr class="fs-6 ">
                 <td width="250"></td>
                <td style="text-align: left; width:350px" >IMPUESTO AL VALOR AGREGADO</td>
               
                <td style="text-align: right; width:200px; ">${{ number_format($iva, 2) }}</td>
                <td style="text-align: right; width:300px; "></td>
            </tr>
             <tr class="fs-6 ">
                <td width="250"></td>
                <td style="text-align: left; width:350px">TOTAL VENTAS LOCALES GRAVADAS</td>
               
                <td style="text-align: right; width:200px; ">${{ number_format($total, 2) }}</td>
                <td style="text-align: right; width:300px; "></td>
            </tr>
            


        </tbody>
    </table>
  </div>

</body>

</html>
