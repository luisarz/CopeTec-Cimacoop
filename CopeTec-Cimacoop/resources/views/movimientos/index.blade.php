@extends('base.base')

@section('title')
    Administracion de Clientes
@endsection
@section('formName')
    <i class="ki-duotone ki-shield-tick text-danger fs-2x"><span class="path1"></span><span class="path2"></span><span
            class="path3"></span></i>
    <div class="d-flex align-items-center mb-2">
        <div class="text-primary text-hover-primary fs-2 fw-bold me-1">
            Movimientos

        </div>
    </div>
@endsection
@section('content')
    <div class="card mt-5 shadow-lg">

        <div class="card shadow-lg">
            <div class="card-header ribbon ribbon-end ribbon-clip">

                <div class="ribbon-label fs-3">
                    <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;

                    {{ $cajaAperturada->numero_caja }}

                    <span class="ribbon-inner bg-info"></span>
                </div>
                <div class="d-flex flex-sm-nowrap mt-5 flex-wrap">
                    <!--begin: buttons actions-->
                    <div class="flex-grow-1 me-1 mb-4">
                        <div class="symbol symbol-100px symbol-lg-100px symbol-fixed position-relative">
                            <a href="movimientos/retirar/{{ $cajaAperturada->id_caja }}" class="btn btn-danger">
                                <span><i class="fa fa-upload fa-2x"></i></span>
                                Nuevo <br>Retiro
                            </a>
                            <a href="movimientos/depositar/{{ $cajaAperturada->id_caja }}" class="btn btn-success">
                                <span>
                                    <i class="fa fa-download fa-2x"></i>
                                </span>

                                Nuevo<br> Deposito</a>

                            <a href="movimientos/transferenciaTercero/{{ $cajaAperturada->id_caja }}" class="btn btn-info">
                                <span><i class="fa fa-exchange  fa-2x"></i></span>

                                Nueva<br> Transf. </a>

                        </div>
                    </div>
                    <!--end::buttons actions-->
                    <!--begin::Info-->
                    <div class="flex-grow-1">

                        <!--begin::Title-->
                        <div class="d-flex justify-content-between align-items-start mb-2 flex-wrap">
                            <!--begin::Stat-->
                            <div class="min-w-105px me-2 mb-3 rounded border border-dashed border-gray-500 py-3 px-4">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    <div class="fs-6 fw-bold ">
                                        ${{ number_format($cajaAperturada->monto_apertura, 2) }}
                                    </div>
                                </div>
                                <div class="fw-semibold fs-6 text-gray-400">
                                    <div class="separator  border-info"></div>

                                    Apertura
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--begin::Stat-->
                            <div class="min-w-105px me-2 mb-3 rounded border border-dashed border-gray-500 py-3 px-4">
                                <div class="d-flex align-items-center">

                                    <div class="fs-6 fw-bold ">
                                        ${{ number_format($totalDepositos, 2) }}
                                    </div>
                                </div>
                                <div class="fw-semibold fs-6 text-gray-400">
                                    <div class="separator  border-success"></div>

                                    Deposito
                                </div>
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="min-w-105px me-2 mb-3 rounded border border-dashed border-gray-500 py-3 px-4">
                                <div class="d-flex align-items-center">

                                    <div class="fs-6 fw-bold ">
                                        ${{ number_format($totalAbonosCreditos, 2) }}
                                    </div>
                                </div>
                                <div class="fw-semibold fs-6 text-gray-400">
                                    <div class="separator  border-success"></div>

                                    Abonos
                                </div>
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="min-w-105px me-2 mb-3 rounded border border-dashed border-gray-500 py-3 px-4">
                                <div class="d-flex align-items-center">

                                    <div class="fs-6 fw-bold ">
                                        ${{ number_format($totalRetiros, 2) }}

                                    </div>
                                </div>
                                <div class="fw-semibold fs-6 text-gray-400">
                                    <div class="separator  border-danger"></div>
                                    Retiro
                                </div>
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="min-w-105px me-2 mb-3 rounded border border-dashed border-gray-500 py-3 px-4">
                                <div class="d-flex align-items-center">
                                    <div class="fs-6 fw-bold ">
                                        ${{ number_format($totalAnuladas, 2) }}
                                    </div>
                                </div>
                                <div class="fw-semibold fs-6 text-gray-400">
                                    <div class="separator  border-danger"></div>

                                    Anulado
                                </div>
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="min-w-105px me-2 mb-3 rounded border border-dashed border-gray-500 py-3 px-4">
                                <div class="d-flex align-items-center">

                                    <div class="fs-6 fw-bold ">
                                        ${{ number_format($saldo, 2) }}
                                    </div>

                                </div>

                                <div class="fw-semibold fs-6 text-gray-400">
                                    <div class="separator  border-success"></div>

                                    Saldos
                                </div>
                            </div>
                            <!--end::Stat-->

                        </div>
                        <!--end::Title-->


                    </div>
                    <!--end::Info-->
                    <!--begin: buttons actions-->
                    <div class="flex-grow-1 me-0 mb-4">

                        <div class="d-flex align-items-center gap-lg-3 gap-2">
                            <!--begin::Filter menu-->
                            <div class="m-0">
                                <!--begin::Menu toggle-->
                                <a href="#"
                                    class="btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info h-60px w-180px fw-bold mb-3"
                                    data-kt-menu-trigger="hover" data-kt-menu-placement="bottom-end">
                                    <i class="fa fa-angle-double-down fs-6 text-info me-1 fa-2x"><span
                                            class="path1"></span><span class="path2"></span></i>
                                    Bobeda
                                </a>
                                <!--end::Menu toggle-->



                                <!--begin::Menu 1-->
                                <div class="menu menu-sub menu-sub-dropdown w-200px w-md-250px" data-kt-menu="true"
                                    id="kt_menu_648dc8aa0d0c5" style="">
                                    <!--begin::Header-->
                                    <div class="px-7 py-2">
                                        <div class="fs-5 text-dark fw-bold">Opciones de Bobeda</div>
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Menu separator-->
                                    <div class="separator border-gray-200"></div>
                                    <!--end::Menu separator-->

                                    <!--begin::Form-->
                                    <div class="px-7 py-5">

                                        <a href="movimientos/traslado/{{ $cajaAperturada->id_caja }}"
                                            class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger w-200px mb-3">
                                            <i class="fa fa-cloud-download text-danger fs-1x"></i>
                                            Recibir Transferencia
                                        </a>

                                        <div class="separator border-gray-200"></div>

                                        <a href="movimientos/transferenciabobeda/{{ $cajaAperturada->id_caja }}"
                                            class="btn btn-outline btn-outline-dotted btn-outline-success btn-active-light-success w-200px mb-3">
                                            <i class="fa fa-cloud-upload text-success fs-1x"></i>
                                            Hacer Transferencia
                                        </a>
                                        {{-- <div class="separator border-gray-200"></div>
                                        <a href="movimientos/solicitartransferencia/{{ $cajaAperturada->id_caja }}"
                                            class="btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info w-200px mb-2">
                                            <i class="fa fa-reply-all text-info fs-1x"></i>
                                            Solicitar Transferencia
                                        </a> --}}

                                    </div>
                                    <!--end::Form-->
                                </div>
                                <!--end::Menu 1-->
                            </div>
                            <!--end::Filter menu-->

                        </div>

                    </div>


                    <!--end::buttons actions-->
                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-hover table-row-dashed fs-6 gy-2 gs-5 table">
                        <thead class="thead-dark">
                            <tr class="fw-semibold fs-3 border-bottom-2 border-gray-200 text-gray-800">
                                <th style="width: 25%">Acciones</th>
                                <th>Cuenta</th>
                                <th>Tipo</th>
                                <th>Operación</th>
                                <th>Monto</th>
                                <th>Cliente</th>
                                <th class="min-w-50px">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movimientos as $cuenta)
                                <tr>
                                    <td>

                                        {{-- Validar los depositos y retiros --}}
                                        {{-- validar los traslados  a bobeda  --}}
                                        {{-- VAlidar los depositos de Bobeda --}}
                                        @php
                                            // Define an associative array to map tipo_operacion to states and labels
                                            $operationStates = [
                                                '1' => ['anulados' => ['0' => 'Anulado'], 'activos' => ['1' => 'Anular']],
                                                '2' => ['anulados' => ['0' => 'Anulado'], 'activos' => ['1' => 'Anular']],
                                                '3' => ['anulados' => [], 'activos' => ['1' => 'Recibido']],
                                                '4' => ['anulados' => [], 'activos' => ['1' => 'Entregado', '0' => 'En cola']],
                                                '5' => ['anulados' => [], 'activos' => []],
                                                '6' => ['anulados' => [], 'activos' => ['1' => 'Entregado', '0' => 'En cola']],
                                                '7' => ['anulados' => [], 'activos' => ['1' => 'Finalizado']],
                                                '8' => ['anulados' => [], 'activos' => ['1' => 'Finalizado']],
                                                '9' => ['anulados' => [], 'activos' => ['1' => 'Finalizado']],
                                            ];
                                        @endphp
 @if ($cuenta->tipo_operacion == 7)
                                            <a href="/reportes/comprobanteAbono/{{ $cuenta->id_pago_credito }}"
                                                target="_blank" class="btn btn-success btn-sm w-40"><i
                                                    class="fa fa-print text-white"></i>
                                                </i>
                                            </a>
                                        @else
                                            <a href="/reportes/comprobanteMovimiento/{{ $cuenta->id_movimiento }}"
                                                target="_blank" class="btn btn-info btn-sm w-40"><i
                                                    class="fa fa-print text-white"></i>
                                                </i>
                                            </a>
                                        @endif
                                        @switch($cuenta->tipo_operacion)
                                            @case('1')
                                            @case('2')
                                                {{-- Deposito y retiro --}}
                                                @if (array_key_exists($cuenta->estado, $operationStates[$cuenta->tipo_operacion]['anulados']))
                                                    <a class="btn btn-sm w-30 fs-6 btn-outline btn-outline-dashed btn-outline-danger btn-active-light-dange"
                                                        style="pointer-events: none; text-decoration: line-through">
                                                        <i class="fa-solid fa-trash text-danger"></i>
                                                        &nbsp;{{ $operationStates[$cuenta->tipo_operacion]['anulados'][$cuenta->estado] }}
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0);"
                                                        onclick="alertAnular({{ $cuenta->id_movimiento }},'{{ $cuenta->tipo_operacion }}','{{ number_format($cuenta->monto, 2) }}')"
                                                        class="btn btn-danger btn-sm w-50">
                                                        <i class="fa-solid fa-trash text-white"></i>
                                                        {{ $operationStates[$cuenta->tipo_operacion]['activos'][$cuenta->estado] }}
                                                    </a>
                                                @endif
                                            @break

                                            @case('3')
                                            @case('4')

                                            @case('6')
                                            @case('7')

                                            @case('8')
                                            @case('9')
                                                @if (array_key_exists($cuenta->estado, $operationStates[$cuenta->tipo_operacion]['activos']))
                                                    <a
                                                        class="btn btn-sm w-50 btn-outline btn-outline-dashed btn-outline-success btn-active-light-dange">
                                                        {{ $operationStates[$cuenta->tipo_operacion]['activos'][$cuenta->estado] }}
                                                    </a>
                                                @endif
                                            @break
                                        @endswitch



                                       


                                    </td>
                                    <td style="text-align:center">

                                        @if ($cuenta->tipo_operacion == 7)
                                            <span class="badge badge-light-danger fs-6">Crédito</span>
                                        @else
                                            {{ $cuenta->numero_cuenta == 0 ? 'Bobeda' : $cuenta->numero_cuenta }}
                                        @endif

                                    </td>
                                    <td>

                                        @if ($cuenta->tipo_operacion == 7)
                                            <span class="badge badge-light-danger fs-6">Crédito</span>
                                        @else
                                            {{ $cuenta->numero_cuenta == 0 ? 'Bobeda' : $cuenta->descripcion_cuenta }}
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            // Define an associative array to map tipo_operacion to badges
                                            $operationBadges = [
                                                '1' => ['badge' => 'light-success', 'icon' => null, 'label' => 'Deposito'],
                                                '2' => ['badge' => 'light-danger', 'icon' => null, 'label' => 'Retiro'],
                                                '3' => ['badge' => 'light-danger', 'icon' => 'fa-arrow-down text-info', 'label' => 'Recepcion'],
                                                '4' => ['badge' => 'light-danger', 'icon' => 'fa-arrow-up text-info', 'label' => 'Traslado'],
                                                '5' => ['badge' => 'light-danger', 'icon' => null, 'label' => 'Traslado a Caja'],
                                                '6' => ['badge' => 'light-danger', 'icon' => null, 'label' => 'Corte Z'],
                                                '7' => ['badge' => 'light-info', 'icon' => null, 'label' => 'Abono a Crédito'],
                                                '8' => ['badge' => 'light-info', 'icon' => null, 'label' => 'Desembolso Credito'],
                                                '9' => ['badge' => 'light-info', 'icon' => null, 'label' => 'Deposito Aportaciones'],
                                                '10' => ['badge' => 'light-info', 'icon' => null, 'label' => 'Depositos a plazo'],

                                            ];
                                        @endphp

                                        @switch($cuenta->tipo_operacion)
                                            @case('1')
                                            @case('2')
                                                <span
                                                    class="badge badge-{{ $operationBadges[$cuenta->tipo_operacion]['badge'] }} fs-6">{{ $operationBadges[$cuenta->tipo_operacion]['label'] }}</span>
                                                @if ($cuenta->id_cuenta_destino != null)
                                                    <span
                                                        class="badge badge-{{ $operationBadges[$cuenta->tipo_operacion]['badge'] }} fs-6">-Transferencia
                                                        Tercero</span>
                                                @endif
                                            @break

                                            @default
                                                <span
                                                    class="badge badge-{{ $operationBadges[$cuenta->tipo_operacion]['badge'] }} fs-6">
                                                    @if ($operationBadges[$cuenta->tipo_operacion]['icon'])
                                                        <i class="fa {{ $operationBadges[$cuenta->tipo_operacion]['icon'] }}"></i>
                                                    @endif
                                                    {{ $operationBadges[$cuenta->tipo_operacion]['label'] }}
                                                </span>
                                        @endswitch


                                    </td>
                                    <td style="text-align:right">


                                        @php
                                            // Define an associative array to map tipo_operacion to badge classes
                                            $operationBadges = [
                                                '1' => 'light-success',
                                                '7' => 'light-success',
                                            ];
                                        @endphp

                                        <span
                                            class="badge badge-light-{{ $operationBadges[$cuenta->tipo_operacion] ?? 'danger' }} fs-6">
                                            ${{ number_format($cuenta->monto, 2) }}
                                        </span>



                                    </td>
                                    <td>
                                        @if ($cuenta->tipo_operacion == 7)
                                            {{ $cuenta->cliente_transaccion }}
                                            <br>
                                            DUI:{{ $cuenta->dui_transaccion }}
                                        @else
                                            {{ $cuenta->nombre }}
                                        @endif
                                    </td>
                                    <td>{{ $cuenta->fecha_operacion }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $movimientos->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>

    <form method="post" id="deleteForm" action="/movimientos/anularmovimiento">
        {!! csrf_field() !!}
        {{ method_field('POST') }}
        <input type="hidden" name="id" id="id">
    </form>
@endsection

@section('scripts')
    <link href=" {{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script>
        function alertAnular(id, tipo_operacion, monto) {
            switch (tipo_operacion) {
                case '1':
                    tipo_operacion = '<br/><span class="badge badge-info mb-3 mt-3 fs-5">El Deposito # ' + id +
                        '</span> <br/>Por un monto de <br><span class="badge mt-3 mb-3 badge-info fs-5">$' + monto +
                        '</span>';
                    break;
                case '2':
                    tipo_operacion = 'Retiro';
                    tipo_operacion = '<br/><span class="badge badge-danger mb-3 mt-3 fs-5">El Retiro # ' + id +
                        '</span> <br/>Por un monto de <br/><span class="badge badge-danger fs-5">$' + monto + '</span>';

                    break;
                case '3':
                    tipo_operacion = '<br/><span class="badfge badge-danger fs-5">El Traslado # ' + id +
                        '</span> <br/>Por un monto de <br/><span class="badge badge-danger fs-5">$' + monto + '</span>';

                    break;
                default:
                    break;
            }
            Swal.fire({
                html: `Estas apunto de anular  <strong>` + tipo_operacion + `</strong>`,
                text: "Deseas Anular este registro" + id,
                icon: "question",
                buttonsStyling: false,
                showCancelButton: true,
                input: 'text',

                confirmButtonText: "Si, Anular Operacion",
                cancelButtonText: 'No, Cancelar',
                customClass: {
                    confirmButton: "btn btn-danger btn-block",
                    cancelButton: "btn btn-secondary btn-block"
                },
                inputValidator: (value) => {
                    if (!value) {
                        return 'Debe ingresar una contraseña';
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {




                    const password = result.value;

                    //
                    $.ajax({
                        url: '/temp/validatePassword/' + password,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            if (data.status == 'success') {
                                $("#id").val(id)
                                $("#deleteForm").submit();
                                Swal.fire({
                                    title: 'Proceso Realizado con exito',
                                    icon: 'success',
                                    showConfirmButton: true,
                                    customClass: {
                                        confirmButton: "btn btn-info",
                                    },
                                    timerProgressBar: true,
                                    timer: 5000, // 5000 milisegundos = 5 segundos
                                });
                            } else {
                                Swal.fire({
                                    title: 'Errro al Realizar proceso',
                                    text: 'El estado de la contraseña es: ' + data.status,
                                    icon: 'error',
                                    showConfirmButton: true,
                                    customClass: {
                                        confirmButton: "btn btn-info",
                                    },
                                    timerProgressBar: true,
                                    timer: 5000, // 5000 milisegundos = 5 segundos
                                });

                            }


                        }
                    });

                } else if (result.isDenied) {}
            });
        }
    </script>
@endsection
