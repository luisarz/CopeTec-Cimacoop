<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cliente CIMA COOP</title>
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
                                Información detallada de cliente CIMA COOP
                            </h5>
                        </div>
                        {{-- Client name --}}
                        <div class="my-2" style=" display: inline-block;width: 48% ;">NOMBRE CLIENTE</div>
                        <div class="my-2" style=" display: inline-block;width: 48% ;">
                            {{ $client->nombre }}</div>
                        {{-- ID number --}}
                        <div class="my-2" style=" display: inline-block;width: 48% ;">Número de documento (DUI,
                            PASAPORTE, CARNÉ DE RESIDENTE)</div>
                        <div class="my-2" style=" display: inline-block;width: 48% ;">
                            {{ $client->dui_cliente }}</div>
                        <div class="my-2" style=" display: inline-block;width: 48% ;">GÉNERO </div>
                        <div class="my-2" style=" display: inline-block;width: 48% ;">
                            {{ $client->genero == '1' ? 'Masculino' : 'Femenino' }}</div>

                        <div class="my-2" style=" display: inline-block;width: 48% ;">DOMICILIO </div>
                        <div class="my-2" style=" display: inline-block;width: 48% ;">
                            {{ $client->direccion_personal }}</div>
                        <div class="my-2" style=" display: inline-block;width: 48% ;">TELÉFONO
                        </div>
                        <div class="my-2" style=" display: inline-block;width: 48% ;">
                            {{ $client->telefono }}</div>
                        <div class="my-2" style=" display: inline-block;width: 48% ;">ESTADO CIVIL </div>
                        <div class="my-2" style=" display: inline-block;width: 48% ;">
                            {{ $client->estado_civil }}</div>
                        <div class="my-2" style=" display: inline-block;width: 48% ;">NACIONALIDAD</div>
                        <div class="my-2" style=" display: inline-block;width: 48% ;">
                            {{ $client->nacionalidad }}</div>
                        <div class="my-2" style=" display: inline-block;width: 48% ;">PROFESIÓN </div>
                        <div class="my-2" style=" display: inline-block;width: 48% ;">
                            {{ $client->profesion }}</div>
                        <div class="my-2" style=" display: inline-block;width: 48% ;">OBSERVACIONES </div>
                        <div class="my-2" style=" display: inline-block;width: 48% ;">
                            {{ $client->observaciones }}</div>
                        <div class="col-12">
                            <div class="col-12">
                                <h5 class="my-4 text-center text-light py-2"
                                    style=" background-color: #b9c974; color: white; text-transform: uppercase;">
                                    CUENTAS CLIENTE
                                </h5>
                            </div>
                            <div class="col-12">
                                @if (count($client->cuentas) > 0)
                                    <table class="data-table-coop table table-bordered  fs-5     gy-2 gs-5">
                                        <thead>
                                            <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                                                <th class="min-w-200px"># Cuenta</th>
                                                <th class="min-w-90px">tipo cuenta</th>
                                                <th class="min-w-90px">saldo</th>
                                                <th class="min-w-200px">Monto apertura</th>
                                                <th class="min-w-100px">Estado</th>
                                                <th class="min-w-100px">Fecha Apertura</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($client->cuentas as $cuenta)
                                                <tr>
                                                    <td class="text-left">
                                                        {{ str_pad($cuenta->numero_cuenta, 10, '0', STR_PAD_LEFT) }}
                                                    </td>
                                                    <td class="text-left">
                                                        {{ $cuenta->tipo_cuenta->descripcion_cuenta }}</td>
                                                    <td class="text-left">{{ $cuenta->saldo_cuenta }}</td>
                                                    <td class="text-left">{{ $cuenta->monto_apertura }}</td>
                                                    <td class="text-left">
                                                        {{ $cuenta->estado == 1 ? 'ACTIVA' : 'INACTIVA' }}
                                                    </td>
                                                    <td class="text-left">
                                                        {{ \Carbon\Carbon::parse($cuenta->created_at)->format('d/m/Y H:i:s A') }}
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="text-center">
                                        NO POSEE CUENTAS
                                    </div>
                                @endif
                            </div>
                            <div class="col-12">
                                <h5 class="my-4 text-center text-light py-2"
                                    style=" background-color: #b9c974; color: white; text-transform: uppercase;">
                                    CRÉDITOS/PRÉSTAMOS CLIENTE
                                </h5>
                            </div>
                            <div class="col-12">
                                @if (count($client->creditos) > 0)
                                    <table class="data-table-coop table table-bordered  fs-5     gy-2 gs-5">
                                        <thead>
                                            <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                                                <th class="min-w-200px"># CRÉDITO</th>
                                                <th class="min-w-90px">monto</th>
                                                <th class="min-w-100px">fecha desembolso</th>
                                                <th class="min-w-90px">liquido recivido</th>
                                                <th class="min-w-200px">saldo capital</th>
                                                <th class="min-w-100px">plazo</th>
                                                <th class="min-w-100px">tasa interes</th>
                                                <th class="min-w-100px">cuota</th>
                                                <th class="min-w-100px">finalización crédito</th>
                                                <th class="min-w-100px">fecha pago</th>
                                                <th class="min-w-100px">Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($client->creditos as $credito)
                                                <tr>
                                                    <td class="text-left">
                                                        {{ $credito->codigo_credito }}
                                                    </td>
                                                    <td class="text-left">
                                                        @money($credito->monto_solicitado)
                                                    </td>

                                                    <td class="text-left">
                                                        {{ $credito->fecha_desembolso ? \Carbon\Carbon::parse($credito->fecha_desembolso)->format('d/m/Y') : '- -' }}
                                                    </td>
                                                    <td class="text-left">
                                                        @money($credito->liquido_recibido)
                                                    </td>
                                                    <td class="text-left">
                                                        @money($credito->saldo_capital)
                                                    </td>

                                                    <td class="text-left">
                                                        {{ $credito->plazo }} Meses
                                                    </td>
                                                    <td class="text-left">
                                                        {{ $credito->tasa }}%
                                                    </td>
                                                    <td class="text-left">
                                                        @money($credito->cuota)
                                                    </td>
                                                    <td class="text-left">
                                                        {{ \Carbon\Carbon::parse($credito->fecha_vencimiento)->format('d/m/Y') }}
                                                    </td>
                                                    <td class="text-left">
                                                        {{ \Carbon\Carbon::parse($credito->fecha_pago)->format('d') }}
                                                        c/mes
                                                    </td>
                                                    <td class="text-left">
                                                        @switch($credito->estado)
                                                            @case(1)
                                                                <span class="badge badge-info">Presentado</span>
                                                            @break

                                                            @case(2)
                                                                <span class="badge badge-success">Aprobado</span>
                                                            @break

                                                            @case(3)
                                                                <span class="badge badge-danger">Rechazado</span>
                                                            @break

                                                            @default
                                                        @endswitch
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="text-center">
                                        NO POSEE CRÉDITOS
                                    </div>
                                @endif
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
