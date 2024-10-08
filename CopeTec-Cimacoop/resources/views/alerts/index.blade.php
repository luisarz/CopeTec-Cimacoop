@extends('base.base')

@section('title')
    Lavado de dinero
@endsection

@section('formName')
@endsection
@section('content')
    <div class="card shadow-lg">
        <div class="card-header ribbon ribbon-end ribbon-clip">

            <div class="ribbon-label fs-3">
                <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;
                Alertas | {{ Session::get('name_module') }}
                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="fs-1">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
        <div class="mx-4">
            <div class="table-responsive">
                <table class="data-table-coop table table-hover table-row-dashed fs-6     gy-2 gs-5">
                    <thead class="thead-dark">
                        <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                            {{-- <th class="min-w-150px">Acciones</th> --}}
                            <th>Id Credito</th>
                            <th>Cliente</th>
                            <th>Monto transacción </th>
                            <th># Caja</th>
                            <th>Atendido por: </th>
                            <th>Justificante</th>
                            <th>Se recibió comprobante</th>
                            <th>Fecha/Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notifications as $n)
                            <tr>
                                {{-- <td>
                                    <div class="d-flex">
                                        @if (!$n->read_at)
                                            <a n="javascript:void(0);" tol-tip="Marcar como leída" data-offset="20px 20px"
                                                data-toggle="popover" data-placement="top" data-content="Example content"
                                                class="btn btn-primary btn-sm w-50px"><i class="fa fa-check text-white"></i>
                                            </a>
                                        @else
                                            <a class="btn btn-outline btn-outline-dashed btn-outline-danger btn-sm">
                                                Leida
                                            </a>
                                        @endif
                                    </div>

                                </td> --}}
                                <td>
                                    <?php
                                    $info = json_decode($n->data);
                                    print_r($info->codigo_credito);
                                    ?>
                                </td>
                                <td> {{ $info->cliente }}</td>
                                <td>
                                    ${{ $info->monto_saldo }}
                                </td>
                                <td>
                                    {{ $info->numero_caja }}
                                </td>
                                <td style="text-align: center">
                                    {{ $info->cobrado_por }}
                                </td>
                                <td style="text-align: center">
                                    {{ $info->justificante }}
                                </td>
                                <td style="text-align: center">
                                    {{ $info->comprobante }}
                                </td>
                                <td class="text-start">
                                    {{ \Carbon\Carbon::parse($n->created_at)->format('d/m/Y h:i:s A') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    {{-- <link href=" {{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" /> --}}

    {{-- <script src="assets/plugins/global/plugins.bundle.js"></script> --}}
    <script>
        function printDiv() {
            var divContents = document.getElementById("GFG").innerHTML;
            var a = window.open('_blank', '', '');
            a.document.write(divContents);
            a.document.close();
            a.print();
        }
    </script>
@endsection
