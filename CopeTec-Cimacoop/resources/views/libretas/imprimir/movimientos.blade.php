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
        PRODUCTOS
    </div>

    <br>

     <table class="table  fs-6 gy-1 gs-1">
                    <thead class="fw-bold">
                        <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                            <th>#</th>
                            <th class="min-w-250px ">Producto</th>
                            <th class="min-w-80px">Cod Barra</th>
                            <th class="min-w-80px">Presentación</th>
                            <th class="min-w-50px">Marca</th>
                            <th class="min-w-50px">Costo</th>
                            <th class="min-w-100px">Facturacion</th>

                        </tr>
                    </thead>
                    <tbody class="fs-4">
                        @foreach ($movimientos as $producto)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $producto->nombre }}</td>
                                <td>{{ $producto->cod_barra }}</td>
                                <td>{{ $producto->presentacion }}</td>
                                <td>{{ $producto->marca }}</td>
                                <td>${{ number_format($producto->costo, 2) }}</td>
                                    <td>
                                @if($producto->tipo_facturacion == 1)
                                    <span class="badge badge-light-danger">Compras</span>
                                @else
                                    <span class="badge badge-light-success">Facturacion</span>
                                @endif    
                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>


</body>

</html>
