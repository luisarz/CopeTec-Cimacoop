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
     <style>
        .double-border-top {
            border-top: 1px double #000 !important; /* You can adjust the thickness and color */
            padding-top: 10px !important; /* Add padding to separate content from the border */
        }
    </style>

</head>
<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
    <div class="double-strikethrough">
        ASOCIACION COOPERATIVA DE AHORRO Y CREDITO LA CIMA - "CIMACOOP, DE R.L." <br>
        BALANCE GENERAL <br> AL {{ date('d-m-Y', strtotime($hasta)) }} <br>
    </div>
    <br>
    @php
        $totalActivos = 0;
        $totalPasivos = 0;
        $totalPatrimonio = 0;
        $estado;
    @endphp


    <table class="table table-sm gs-2 gy-1" style="border: 1px solid rgb(255, 255, 255);">
        <thead class="font-bold fs-4">
            <tr>
                <th style="width: 80%"></th>
                <th></th>
            </tr>
        </thead>
        <tbody class="fs-4">
            <tr>
                <td>
                    <b> ACTIVO</b>
                </td>
                <td></td>
            </tr>
            @foreach ($datosActivo as $item)
                @php
                    $totalCuentanivelDos = 0;
                @endphp

                {{-- Iterate through cuenta_hija and movimientos --}}
                @foreach ($item as $index => $element)
                    @if (is_array($element) && isset($element['cuenta_hija']))
                        @if ($index == 0)
                            <tr class="height:10px !important;">
                                <td>
                                    <b> {{ $item['cuenta_padre']['descripcion'] }} </b>
                                </td>
                                <td></td>
                            </tr>
                        @endif
                        <tr style="height: 10px !important;">
                            <td style="padding-left: 20px;">
                                {{ $element['cuenta_hija']['descripcion'] }}
                            </td>
                            <td style="text-align: right;">
                                @foreach ($element['movimientos'] as $movimiento)
                                    $ {{ number_format($movimiento->saldo, 2) }}
                                    @php
                                        $totalActivos += $movimiento->saldo;
                                        $totalCuentanivelDos += $movimiento->saldo;
                                    @endphp
                                @endforeach
                            </td>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <td>
                    </td>
                    <td style="text-align: right;" class="double-border-top">
                        <b>$ {{ number_format($totalCuentanivelDos, 2) }}</b>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td>
                    <b>TOTAL ACTIVOS</b>
                </td>
                <td style="text-align: right; border-top:1px double black !important;">
                    <b>$ {{ number_format($totalActivos, 2) }}</b>
                </td>
            </tr>
        </tbody>
    </table>

    {{-- Pasivos --}}
    @php
        $totalCuentanivelDos = 0;
    @endphp
    <table class="table table-sm gs-2 gy-1" style="border: 1px solid rgb(255, 255, 255);">
        <thead class="font-bold fs-4">
            <tr>
                <th style="width: 80%"></th>
                <th></th>
            </tr>
        </thead>
        <tbody class="fs-4">
            <tr>
                <td>
                    <b> PASIVO</b>
                </td>
                <td></td>
            </tr>
            @foreach ($datosPasivo as $item)
                {{-- Iterate through cuenta_hija and movimientos --}}
                @foreach ($item as $index => $element)
                    @if (is_array($element) && isset($element['cuenta_hija']))
                        @if ($index == 0)
                            <tr class="height:10px !important;">
                                <td>
                                    <b> {{ $item['cuenta_padre']['descripcion'] }} </b>
                                </td>
                                <td>
                                </td>
                            </tr>
                        @endif
                        <tr style="height: 10px !important;">
                            <td style="padding-left: 20px;">
                                {{ $element['cuenta_hija']['descripcion'] }}
                            </td>
                            <td style="text-align: right;">
                                @foreach ($element['movimientos'] as $movimiento)
                                    $ {{ number_format($movimiento->saldo, 2) }}
                                    @php
                                        $totalPasivos += $movimiento->saldo;
                                        $totalCuentanivelDos += $movimiento->saldo;
                                    @endphp
                                @endforeach
                            </td>
                        </tr>
                    @endif
                @endforeach
                @if ($loop->last)
                    <tr>
                        <td>
                        </td>
                        <td style="text-align: right; border-top:1px dotted black !important;">
                            <b>$ {{ number_format($totalCuentanivelDos, 2) }}</b>
                        </td>
                    </tr>
                @endif
            @endforeach
            <tr>
                <td>
                    <b>TOTAL PASIVOS</b>
                </td>
                <td style="text-align: right; border-top:1px double black !important;">
                    <b>$ {{ number_format($totalPasivos, 2) }}</b>
                </td>
            </tr>
        </tbody>
    </table>


     {{-- Patrimonio --}}
    @php
        $totalCuentanivelDos = 0;
    @endphp
    <table class="table table-sm gs-2 gy-1" style="border: 1px solid rgb(255, 255, 255);">
        <thead class="font-bold fs-4">
            <tr>
                <th style="width: 80%"></th>
                <th></th>
            </tr>
        </thead>
        <tbody class="fs-4">
            <tr>
                <td>
                    <b> PATRIMONIO</b>
                </td>
                <td></td>
            </tr>
            @foreach ($datosPatrimonio as $item)
                {{-- Iterate through cuenta_hija and movimientos --}}
                @foreach ($item as $index => $element)
                    @if (is_array($element) && isset($element['cuenta_hija']))
                        @if ($index == 0)
                            <tr class="height:10px !important;">
                                <td>
                                    <b> {{ $item['cuenta_padre']['descripcion'] }} </b>
                                </td>
                                <td>
                                </td>
                            </tr>
                        @endif
                        <tr style="height: 10px !important;">
                            <td style="padding-left: 20px;">
                                {{ $element['cuenta_hija']['descripcion'] }}
                            </td>
                            <td style="text-align: right;">
                                @foreach ($element['movimientos'] as $movimiento)
                                    $ {{ number_format($movimiento->saldo, 2) }}
                                    @php
                                        $totalPatrimonio += $movimiento->saldo;
                                        $totalCuentanivelDos += $movimiento->saldo;
                                    @endphp
                                @endforeach
                            </td>
                        </tr>
                    @endif
                @endforeach
                @if ($loop->last)
                    <tr>
                        <td>
                        </td>
                        <td style="text-align: right; border-top:1px dotted black !important;">
                            <b>$ {{ number_format($totalCuentanivelDos, 2) }}</b>
                        </td>
                    </tr>
                @endif
            @endforeach
           
        </tbody>
    </table>

       <table class="table table-sm gs-2 gy-1" style="border: 1px solid rgb(255, 255, 255);">
        <thead class="font-bold fs-4">
            <tr>
                <th style="width: 80%"></th>
                <th></th>
            </tr>
        </thead>
           <tbody class="fs-4">
            <tr>
                <td style="width: 80%;">
                    UTILIDAD/PERDIDA DEL PERIODO
                </td>
                <td style="text-align: right;">
                    $ {{ number_format($estadoResultado, 2) }}
                </td>
            </tr>
             <tr>
                <td>
                    <b>TOTAL DEL PASIVO Y PATRIMONIO</b>
                </td>
                <td style="text-align: right; border-top:1px double black !important;">
                    <b>$ {{ number_format($totalPatrimonio +$estadoResultado + $totalPasivos, 2) }}</b>
                </td>
            </tr>
        </tbody>
    </table>



</body>

</html>
