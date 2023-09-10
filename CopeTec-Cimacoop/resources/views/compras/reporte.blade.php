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
        PROVEEDORES
    </div>

    <br>

     <table class="table table-bordered fs-6 gy-1 gs-1">
                    <thead class="fw-bold">
                        <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                            <th>#</th>
                            <th class="min-w-200px ">Proveedor</th>
                            <th class="min-w-80px">DUI</th>
                            <th class="min-w-80px">NRC</th>
                            <th class="min-w-50px">NIT</th>
                            <th class="min-w-250px">TELEFONO</th>
                            <th class="min-w-50px">DECIMALES</th>

                        </tr>
                    </thead>
                    <tbody class="fs-4">
                        @foreach ($proveedores as $producto)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>{{ $producto->razon_social }}</td>
                                <td>{{ $producto->dui }}</td>
                                <td>{{ $producto->nrc }}</td>
                                <td>{{ $producto->nit }}</td>
                                <td>{{ $producto->telefono }}</td>
                                <td>{{ $producto->decimales }}</td>




                            </tr>
                        @endforeach
                    </tbody>
                </table>


</body>

</html>
