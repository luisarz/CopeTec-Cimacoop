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
        ESTADO DE RESULTADO <br> AL {{ date('d-m-Y', strtotime($hasta)) }} <br>
    </div>

    <div class="double-strikethrough">
        {{-- {{ $encabezado }} --}}
    </div>

    @php
        $sumIngresos = 0;
        $sumCostos = 0;
    @endphp

    <br>

    <table class="table table-sm fs-7 mb-1 " style="border: 1px solid rgb(255, 255, 255);">
        <thead class="font-bold fs-4">

            <tr>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody class="fs-6">

            @php
                $sumActivos = 0;
                $sumPasivos = 0;
                $sumPatrimonio = 0;
                $estado;
            @endphp

            @foreach ($datosActivo as $cuentaPadre)
                <tr>
                    <td>
                        {{ $cuentaPadre['descripcion'] }}
                    </td>
                    <td>
                            @php
                                echo '<pre>';
                                print_r($cuentaPadre['movimientos']);
                                // print_r($cuentaPadre[']);
// 
                                echo '</pre>';
                            @endphp
                            @if(isset($movimiento['movimientos']))
                               {{ "si esta"}}
                            @else
                            {{ "No esta" }}
                            @endif
                    </td>

                </tr>

                {{-- <h3>{{ $cuentaPadre['cuenta_padre']['descripcion'] }}</h3> --}}
                {{-- {{-- @foreach ($cuentaPadre['cuentas_hijas_principal']['cuentasDeMayor']['datosCuenta']['movimientos_cuentas_de_mayor_hijas'] as $cuentaMayor) --}}
                {{-- // <tr> --}}
                {{-- // <td><b> {{ $cuentaMayor['numero'] }}</b></td> --}}
                {{-- // <td><b> {{ $cuentaMayor['descripcion'] }}</b></td> --}}

                {{-- // </tr> --}}
                {{-- //     @foreach ($cuentaMayor['movimientos_cuentas_de_mayor_hijas'] as $movimientos) --}}
                {{-- //         @if (isset($movimientos['cuentasDeMayor'])) --}}
                {{-- //             <tr> --}}
                {{-- //                 <td>
                //                     {{ $movimientos['cuentasDeMayor']['datosCuenta']['numero'] }}

                //                 </td>
                //                 <td class="px-6"> 
                //                     {{ $movimientos['cuentasDeMayor']['datosCuenta']['descripcion'] }}
                //                 </td>
                //                 <td>
                //                     {{ $movimientos['saldos']['saldo'] }}
                //                 </td>
                //             </tr>
                  
                //         @endif
                //     @endforeach --}}

                {{-- // @endforeach --}}
            @endforeach


        </tbody>
    </table>



</body>

</html>
