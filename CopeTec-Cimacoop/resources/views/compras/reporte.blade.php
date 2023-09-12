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
        COMPRAS
    </div>

    <br>

    <table class="table  fs-6 gy-1 gs-1">
        <thead class="fw-bold">
            <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <th class="min-w-100px ">Estado</th>
                <th class="min-w-50px ">CCF</th>
                <th class="min-w-250px">Proveedor</th>
                <th class="min-w-50px">Fecha</th>
                <th class="min-w-50px">Neto</th>
                <th class="min-w-50px">IVA</th>
                <th class="min-w-50px">Percepción</th>
                <th class="min-w-50px">Total</th>

            </tr>
        </thead>
        <tbody class="fs-4">
            @foreach ($compras as $compra)
                <tr>

                    <td>
                        @if ($compra->estado == '2')
                            <span class="badge badge-light-success">Procesada</span>
                        @else
                            <span class="badge badge-light-danger">Pendiente</span>
                        @endif
                    </td>
                    <td>{{ $compra->numero_fcc }}</td>

                    <td>{{ $compra->razon_social }}</td>
                    <td>{{ date('d-m-Y',strtotime($compra->fecha_compra)) }}</td>
                    <td>${{ number_format($compra->neto, 2) }}</td>
                    <td>${{ number_format($compra->iva, 2) }}</td>
                    <td>${{ number_format($compra->percepcion, 2) }}</td>

                    <td>${{ number_format($compra->total, 2) }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>
