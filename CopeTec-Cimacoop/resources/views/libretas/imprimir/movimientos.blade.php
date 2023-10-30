<!DOCTYPE html>
<html lang="es">

<head>
    <title>CoopeTec-Administracion de cooperativas CompuTec Consultores</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        {{ $stilosBundle }} {{ $estilos }}
    </style>

</head>

<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
    @php
        $fecha_operacion = '';
        $retiro = 0;
        $deposito = 0;
        $saldo = 0;
        $cajero = '';
        $numMovimiento = "";
    @endphp

    <br>

    <table class="table  ga-3 " style="border: 1px solid rgb(255, 255, 255);">
        <thead>
            <th style="width: 200px;"></th>
            <th style="width: 180px;"></th>
            <th style="width: 180px;"></th>
            <th style="width: 180px;"></th>
            <th style="width: 100px;"></th>


        </thead>

        <tbody class="fs-4">

            @for ($i = 0; $i <= $rows - 1; $i++)


                @foreach ($movimientos as $producto)
                    @if ($i == $producto->num_movimiento_libreta)
                        @php
                            $numMovimiento = $producto->num_movimiento_libreta;
                            $fecha_operacion = $producto->fecha_operacion;
                            $tipo_operacion = $producto->tipo_operacion;
                            $cajero= $producto->numero_caja;
                            $saldo = $producto->saldo;
                            if ($tipo_operacion == '2') {
                                $retiro = $producto->monto;
                                $deposito = '0.00';
                            } else {
                                $deposito = $producto->monto;
                                $retiro = '0.00';
                            }
                        @endphp
                    @break
                @endif
            @endforeach


            <tr class="gs-2 p-2">
                @if ($i == $numMovimiento)
                    <td>{{date('d-m-y H:s:i',strtotime( $fecha_operacion ))}}</td>
                    <td>{{ $retiro }}</td>
                    <td>{{ $deposito }}</td>
                    <td>{{ $saldo }}</td>
                    <td>{{ $cajero }}</td>
                @else
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                @endif
            </tr>
        @endfor

        @foreach ($movimientos as $producto)
            {{-- <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->cod_barra }}</td>
                    <td>{{ $producto->presentacion }}</td>
                    <td>{{ $producto->marca }}</td>


                </tr> --}}
        @endforeach
    </tbody>
</table>


</body>

</html>
