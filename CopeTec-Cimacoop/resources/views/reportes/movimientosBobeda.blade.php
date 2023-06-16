<!DOCTYPE html>
<html lang="es">

<head>
    <title>CoopeTec-Administracion de cooperativas CompuTec Consultores</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />


</head>

<body>
    <div class="card-body ">
        <div class="table-responsive  table-loading">
            <table class="table table-hover table-rounded fs-4 table-striped border gy-2
                     gs-2">
                <thead class="thead-dark">
                    <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                        <th class="min-w-50px">Acciones</th>
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
                                @switch($movimiento->estado)
                                    @case(1)
                                        {{-- Enviada --}}
                                        <a href="javascript:void(0);"
                                            onclick="alertAnular('{{ $movimiento->id_bobeda_movimiento }}','{{ number_format($movimiento->monto, 2, '.', ',') }}','{{ $movimiento->numero_caja }}')"
                                            class="btn btn-danger btn-sm"><i class="fa-solid fa-trash text-white"></i>
                                            </i> &nbsp;
                                            Anular</a>
                                    @break

                                    @case(2)
                                        {{-- Recibida en caja --}}
                                        <span
                                            class="btn btn-sm btn-outline btn-outline-dashed btn-outline-success btn-active-light-dange"><i
                                                class="fa-solid fa-check text-success"></i> &nbsp; Finalizado</span>
                                    @break

                                    @case(3)
                                        {{-- Anulada --}}
                                        <span
                                            class="btn btn-sm btn-outline btn-outline-dashed btn-outline-danger btn-active-light-dange"><i
                                                class="fa-solid fa-check text-danger"></i> &nbsp; Cancelada</span>
                                    @break
                                @endswitch



                            </td>
                            <td>
                                @switch($movimiento->tipo_operacion)
                                    @case(1)
                                        <span class=" badge badge-light-danger">Traslado</span>
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
                            <td>{{ $movimiento->fecha_operacion }}</td>

                            <td>
                                @if ($movimiento->estado == '1')
                                    <span class="badge badge-light-warning fs-5">Enviada</span>
                                @elseif($movimiento->estado == '2')
                                    <span class="badge badge-light-success fs-5">Finalizada</span>
                                @elseif($movimiento->estado == '3')
                                    <span class="badge badge-light-danger fs-5">Cancelado</span>
                                @endif


                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
