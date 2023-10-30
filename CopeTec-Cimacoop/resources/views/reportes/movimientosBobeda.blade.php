<!DOCTYPE html>
<html lang="es">

<head>
    <title>CoopeTec-Administracion de cooperativas CompuTec Consultores</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        {!! $estilos !!}
    </style>

</head>

<body>
    <div>
        <img
            src=" data:image/png;base64,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">
    </div>



    <div class="reportName">

        Reporte de movimientos - {{ $bobeda->nombre }}
        <br>
        Fecha de Apertura.
        {{ isset($aperturaCaja->fecha_apertura)
            ? date('m-d-Y H:i:s', strtotime($aperturaCaja->fecha_apertura))
            : 'No disponible' }}
    </div>








    <div class="container">
        <div class="alinea">
            <div class="item">
                <div class="price">
                    ${{ isset($aperturaCaja->monto) ? number_format($aperturaCaja->monto, 2, '.') : '0.00' }}
                </div>

                <div class="description">Apertura</div>
            </div>
            <div class="item">
                <div class="price">${{ number_format($trasladoACaja, 2, '.') }}</div>
                <div class="description">Traslado a Caja</div>
            </div>
            <div class="item">
                <div class="price">${{ number_format($recibidoDeCaja, 2, '.') }}</div>
                <div class="description">Traslado de Caja</div>
            </div>
            <div class="item">
                <div class="price">${{ number_format($cancelados, 2, '.') }}</div>
                <div class="description">Tras. Cancelado</div>
            </div>
            <div class="item">
                <div class="price">$ {{ number_format($bobeda->saldo_bobeda, 2, '.') }}</div>
                <div class="description">Saldo Caja</div>
            </div>
        </div>
    </div>






    <div class="card shadow-lg  mt-2">
        <div class="card card-bordered   shadow-lg">
            <div class="card-header ribbon ribbon-end ribbon-clip">

                <div class="ribbon-label fs-3">

                    <i class="ki-duotone ki-book-square text-white fs-2x                      ">
                        <i class="path1"></i>
                        <i class="path2"></i>
                        <i class="path3"></i>
                        <i class="path4"></i>
                        <i class="path5"></i>
                    </i>

                    <span class="ribbon-inner bg-info"></span>
                </div>
            </div>
        </div>

    </div>

    <table class="table table-responsive">
        <thead class="thead">
            <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                <th class="min-w-50px">Operacion</th>
                <th class="min-w-50px">Monto</th>
                <th class="min-w-100px">Caja</th>
                <th class="min-w-100px">Fecha</th>
                <th class="min-w-50px">Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movimientoBobeda as $movimiento)
                <tr>

                    <td>
                        @switch($movimiento->tipo_operacion)
                            @case(1)
                                <span class=" badge badge-light-danger sf-2">Traslado</span>
                            @break

                            @case(2)
                                <span class=" badge badge-light-success">Recepcion</span>
                            @break

                            @case(3)
                                <span class=" badge badge-light-info">Apertura bobeda</span>
                            @break
                        @endswitch

                    <td>

                        @if ($movimiento->tipo_operacion == '1')
                            <span
                                class="badge badge-light-info fs-5">${{ number_format($movimiento->monto, 2, '.', ',') }}</span>
                        @else
                            <span class="badge badge-light-info fs-5"> $
                                {{ number_format($movimiento->monto, 2, '.', ',') }}</span>
                        @endif
                    </td>
                    <td style="text-align: center">
                        @if ($movimiento->tipo_operacion == '3')
                            <span class="badge badge-light-info fs-5">
                                Bobeda</span>
                        @else
                            {{ $movimiento->numero_caja }}
                        @endif
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($movimiento->fecha_operacion)->format('d/m/Y H:i:s') }}

                    <td>
                        @if ($movimiento->estado == '1')
                            <span class="text-color-warning">Enviada</span>
                        @elseif($movimiento->estado == '2')
                            <span class="text-color-success">Finalizada</span>
                        @elseif($movimiento->estado == '3')
                            <span class="text-color-danger">Cancelado</span>
                        @endif


                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>
