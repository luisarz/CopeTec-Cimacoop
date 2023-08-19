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
        BITACORA {{ date('d-m-Y',strtotime($desde)) }} AL {{  date('d-m-Y',strtotime($hasta)) }}
    </div>

<br>

        <table>
            <thead>
                <tr style="font-family: 'Courier New', Courier, monospace; font-size:16px; font-weigh:bold;">
                     <th class="min-w-50px text-center">#</th>
                            <th class="min-w-175px text-center">fecha</th>
                            <th class="min-w-100px">Usuario</th>
                            <th class="min-w-50px">Ruta</th>
                            <th class="min-w-100px">Metodo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bitacora as $accion)
                    <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d-m-Y h:i:s A', strtotime($accion->fecha))  }}</td>
                                <td>{{ $accion->nombre }}</td>
                                <td>{{ $accion->route }}</td>
                                <td style="text-align: left;">
                                    @if (is_string($accion->request))
                                        @php
                                            $decodedData = json_decode($accion->request, true);
                                        @endphp
                                        @if ($decodedData !== null && json_last_error() === JSON_ERROR_NONE)
                                            @if (array_key_exists('_token', $decodedData))
                                                @php
                                                    unset($decodedData['_token']);
                                                    unset($decodedData['password_user']);

                                                @endphp
                                                <pre>
                                                    {{ print_r($decodedData, true) }}
                                                </pre>
                                            @else
                                                Consulta
                                            @endif
                                        @endif
                                    @endif
                                </td>
                            </tr>
                @endforeach
            </tbody>
        </table>


</body>

</html>
