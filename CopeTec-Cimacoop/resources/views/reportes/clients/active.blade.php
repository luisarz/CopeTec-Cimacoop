<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clientes CIMA COOP</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ public_path('assets\css\style.bundle.css') }}" media="all" />
    <link rel="stylesheet" href="{{ public_path('assets\css\css.css') }}" media="all" />
</head>

<body style="text-transform: uppercase">
    <div class="">
        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="fs-1">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div id="GFG">
                <div class="container">
                    <img alt="Logo" class="my-5" style="max-height: 100px;"
                        src=" {{ public_path('assets/media/logos/cimacoop.png') }}" />
                    <div class="row">
                        <div class="col-12">
                            <h5 class="my-4 text-center text-light py-2"
                                style=" background-color: #b9c974; color: white; text-transform: uppercase;">
                                Clientes Activos en CIMA COOP
                            </h5>
                        </div>
                        <div class="col-12">
                            <table class="data-table-coop table table-bordered  fs-5     gy-2 gs-5">
                                <thead>
                                    <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                                        <th class="min-w-200px">Nombre</th>
                                        <th class="min-w-90px">Género</th>
                                        <th class="min-w-90px">DUI</th>
                                        <th class="min-w-200px">Domicilio</th>
                                        <th class="min-w-100px">Teléfono</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $cliente)
                                        @if ($cliente->estado == 1)
                                            <tr>
                                                <td class="text-left" style="text-align: start">{{ $cliente->nombre }}
                                                </td>
                                                <td class="text-left">
                                                    {{ $cliente->genero == '1' ? 'Masculino' : 'Femenino' }}</td>
                                                <td class="text-left">{{ $cliente->dui_cliente }}</td>
                                                <td class="text-left">{{ $cliente->direccion_personal }}</td>
                                                <td class="text-left">{{ $cliente->telefono }}</td>

                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12">
                            <div class="d-flex">
                                <label for="date" class="mr-2">Lugar y Fecha reporte:</label>
                                <p class="mx-1">San Miguel,
                                    {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h5 class="my-4 text-center text-light py-2"
                                style=" background-color: #b9c974; color: white; text-transform: uppercase;">
                                Clientes Inactivos en CIMA COOP
                            </h5>
                        </div>
                        <div class="col-12">
                            <table class="data-table-coop table table-bordered  fs-5     gy-2 gs-5">
                                <thead>
                                    <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                                        <th class="min-w-200px">Nombre</th>
                                        <th class="min-w-90px">Género</th>
                                        <th class="min-w-90px">DUI</th>
                                        <th class="min-w-200px">Domicilio</th>
                                        <th class="min-w-100px">Teléfono</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $cliente)
                                        @if ($cliente->estado != 1)
                                            <tr>
                                                <td class="text-left" style="text-align: start">{{ $cliente->nombre }}
                                                </td>
                                                <td class="text-left">
                                                    {{ $cliente->genero == '1' ? 'Masculino' : 'Femenino' }}</td>
                                                <td class="text-left">{{ $cliente->dui_cliente }}</td>
                                                <td class="text-left">{{ $cliente->direccion_personal }}</td>
                                                <td class="text-left">{{ $cliente->telefono }}</td>

                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12">
                            <div class="d-flex">
                                <label for="date" class="mr-2">Lugar y Fecha reporte:</label>
                                <p class="mx-1">San Miguel,
                                    {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</body>

</html>
