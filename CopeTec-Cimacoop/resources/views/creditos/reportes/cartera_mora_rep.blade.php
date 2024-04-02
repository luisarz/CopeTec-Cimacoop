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
<?php
$totalG = 0;
$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
if (isset($hasta) > 0) {
    $mes = $meses[\Carbon\Carbon::parse($hasta)->format('n') - 1];
}
if (isset($desde) > 0) {
    $dmes = $meses[\Carbon\Carbon::parse($desde)->format('n') - 1];
}
?>

<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
    <div class="double-strikethrough text-uppercase">
        ASOCIACION COOPERATIVA DE AHORRO Y CREDITO LA CIMA - "CIMACOOP, DE R.L." <br>
        Cartera en mora
        <br> AL {{ date('d-m-Y') }} <br>

    </div>



    <br>

    <table class="table table-sm fs-7 mb-1 " style="border: 1px solid rgb(255, 255, 255);">
        <thead style="border-top: 1px solid black; border-bottom: 1px solid black; font-size:18px; "
            class="font-bold fs-4">
                        <tr>
                            <td colspan="7"></td>
                            <td colspan="8" class="text-center table-bordered">Calificacion Crediticia en días</td>
                        </tr>
                        <tr class="fw-semibold fs-5 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="min-w-20px">No</th>
                            <th class="min-w-20px">Código crédito</th>
                            <th class="min-w-80px">Cliente</th>
                            <th class="min-w-20px">Fecha Pago</th>
                            <th class="min-w-20px">Ultimo Pago</th>
                            <th class="min-w-30px">Saldo</th>
                            <th class="min-w-30px">Monto Mora</th>
                            <th class="min-w-30px">A1 -7 </th>
                            <th class="min-w-30px">A2 -30 </th>
                            <th class="min-w-30px">B -60 </th>
                            <th class="min-w-30px">C1 -90 </th>
                            <th class="min-w-30px">C2 -120 </th>
                            <th class="min-w-30px">D1 -150 </th>
                            <th class="min-w-30px">D2 -180 </th>
                            <th class="min-w-30px">E -180 </th>



                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        @if (count($data) > 0)
                            @foreach ($data as $cr)
                            {{-- {{ dd($cr['dias_mora']) }} --}}
                                @php
                                    $dias_mora = $cr['dias_mora'];// \Carbon\Carbon::now()->diffInDays($cr->dias_mora);
                                @endphp
                                <tr class="fs-5 font-bold">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cr['codigo_credito'] }}</td>
                                    <td>{{ $cr['cliente->nombre'] ?? '' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($cr['fecha_pago'])->format('d') }} c/mes</td>
                                    <td>{{ \Carbon\Carbon::parse($cr['ultima_fecha_pago'])->format('d/m/Y') }}</td>
                                    <td>@money($cr['saldo_capital'])</td>
                                    <td class="text-danger">@money($cr['total_pagar'])</td>
                                    <td>
                                       {{ ($dias_mora <= 7 )? $dias_mora : '-' }}
                                    </td>
                                    <td>
                                      {{ ($dias_mora > 7 && $dias_mora <=30 )? $dias_mora : '-' }}
                                    </td>
                                    <td>
                                        {{ $dias_mora > 30 && $dias_mora <= 60 ? $dias_mora : '-' }}
                                    </td>
                                    <td>
                                      {{ $dias_mora >60 && $dias_mora <= 90 ? $dias_mora : '-' }}
                                    </td>
                                    <td>
                                        {{ $dias_mora > 90 && $dias_mora <= 120 ? $dias_mora : '-' }}
                                    </td>
                                  <td>
                                        {{ $dias_mora > 120 && $dias_mora <= 150 ? $dias_mora : '-' }}
                                    </td>
                                    <td>
                                        {{ $dias_mora > 150 && $dias_mora <= 180 ? $dias_mora : '-' }}
                                    </td>
                                    <td>
                                        {{ $dias_mora > 180  ? $dias_mora : '-' }}
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center">
                                    <h5>No hay cuentas en mora</h5>
                                </td>
                            </tr>
                        @endif
                    </tbody>
    </table>


</body>

</html>
