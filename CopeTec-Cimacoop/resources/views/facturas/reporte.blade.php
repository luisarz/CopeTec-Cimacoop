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
        FACTURAS
    </div>
    <br>

    <table class="table  fs-6 gy-1 gs-1">
        <thead class="fw-bold">
            <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <th class="min-w-100px ">Estado</th>
                <th class="min-w-100px ">Numero</th>
                <th class="min-w-180px">Cliente</th>
                <th class="min-w-50px">Fecha</th>
                <th class="min-w-50px">Neto</th>
                <th class="min-w-50px">IVA</th>
                <th class="min-w-50px">Total</th>

            </tr>
        </thead>
        <tbody class="fs-4">
            @foreach ($facturas as $factura)
                <tr>

                    <td>
                        @if ($factura->estado == 2)
                            <span class="badge badge-light-success">Procesada</span>
                        @else
                            <span class="badge badge-light-info">Pendiente</span>
                        @endif
                    </td>
                    <td>
                        <span class="badge badge-light-success">
                            <span class="badge badge-light-info">{{ $factura->tipo_documento }}
                            </span>
                            {{ $factura->numero_factura }}
                        </span>

                    </td>

                    <td>{{ $factura->nombre }}</td>
                    <td>{{ date('d-m-Y', strtotime($factura->fecha_factura)) }}</td>
                    <td>${{ number_format($factura->neto, 2) }}</td>
                    <td>{{ ($factura->iva>0?'$'.number_format($factura->iva, 2):'-') }}</td>

                    <td>${{ number_format($factura->total, 2) }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
