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
    <div class="card shadow-lg  mt-5">

        <div class="card shadow-lg">
            <div class="card-header ribbon ribbon-end ribbon-clip">

                <div class="ribbon-label fs-3">
                    <i class="ki-duotone ki-shield-tick text-white fs-2x"><span class="path1"></span><span
                            class="path2"></span><span class="path3"></span></i>
                    {{ $cajaAperturada->numero_caja }}

                    <span class="ribbon-inner bg-danger"></span>
                </div>
                <div class="d-flex flex-wrap flex-sm-nowrap mt-5">
                    <!--begin: buttons actions-->
                    <div class="flex-grow-1 me-1 mb-4">
                        <div class="symbol symbol-100px symbol-lg-100px symbol-fixed position-relative">
                            <a href="movimientos/retirar/{{ $cajaAperturada->id_caja }}" class="btn btn-danger">
                                <span><i class="fa fa-upload fa-2x"></i></span>
                                Nuevo <br>Retiro</a>
                            <a href="movimientos/depositar/{{ $cajaAperturada->id_caja }}" class="btn btn-success">
                                <span><i class="fa fa-download fa-2x"></i></span>

                                Nuevo<br> Deposito</a>

                        </div>
                    </div>
                    <!--end::buttons actions-->
                    <!--begin::Info-->
                    <div class="flex-grow-1">

                        <!--begin::Title-->
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <!--begin::Stat-->
                            <div class="border border-gray-500 border-dashed rounded min-w-105px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    <div class="fs-5 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                        data-kt-countup-prefix="$" data-kt-initialized="1">
                                        ${{ number_format($cajaAperturada->monto_apertura, 2, '.', ',') }}
                                    </div>
                                </div>
                                <div class="fw-semibold fs-6 text-gray-400">
                                    <i class="ki-duotone ki-category  text-success me-2">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                        <i class="path3"></i>
                                        <i class="path4"></i>
                                    </i>Apertura
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--begin::Stat-->
                            <div class="border border-gray-500 border-dashed rounded min-w-105px py-3 px-4 me-6 mb-3">
                                <div class="d-flex align-items-center">

                                    <div class="fs-5 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                        data-kt-countup-prefix="$" data-kt-initialized="1">
                                        ${{ number_format($totalDepositos, 2, '.', ',') }}
                                    </div>
                                </div>
                                <div class="fw-semibold fs-6 text-gray-400"><i
                                        class="ki-duotone ki-arrow-up  text-success me-2"><span class="path1"></span><span
                                            class="path2"></span></i>Deposito</div>
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="border border-gray-500 border-dashed rounded min-w-105px py-3 px-4 me-6 mb-3">
                                <div class="d-flex align-items-center">

                                    <div class="fs-5 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                        data-kt-countup-prefix="$" data-kt-initialized="1">
                                        ${{ number_format($totalRetiros, 2, '.', ',') }}

                                    </div>
                                </div>
                                <div class="fw-semibold fs-6 text-gray-400"> <i
                                        class="ki-duotone ki-arrow-down  text-danger me-2"><span class="path1"></span><span
                                            class="path2"></span></i>Retiro
                                </div>
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="border border-gray-500 border-dashed rounded min-w-105px py-3 px-4 me-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="fs-5 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                        data-kt-countup-prefix="$" data-kt-initialized="1">
                                        ${{ number_format($totalAnuladas, 2, '.', ',') }}
                                    </div>
                                </div>
                                <div class="fw-semibold fs-6 text-gray-400"> <i
                                        class="ki-duotone ki-minus-square fs-1x text-danger me-2"><span
                                            class="path1"></span><span class="path2"></span></i>Anulado</div>
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="border border-gray-500 border-dashed rounded min-w-105px py-3 px-4 me-6 mb-3">
                                <div class="d-flex align-items-center">

                                    <div class="fs-5 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                        data-kt-countup-prefix="$" data-kt-initialized="1">
                                        ${{ number_format($saldo, 2, '.', ',') }}
                                    </div>

                                </div>

                                <div class="fw-semibold fs-6 text-gray-400"><i
                                        class="ki-duotone ki-arrows-circle text-success me-2"><span
                                            class="path1"></span><span class="path2"></span></i>Saldos</div>
                            </div>
                            <!--end::Stat-->

                        </div>
                        <!--end::Title-->


                    </div>
                    <!--end::Info-->
                    <!--begin: buttons actions-->
                    <div class="flex-grow-1 me-0 mb-4">

                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                            <!--begin::Filter menu-->
                            <div class="m-0">
                                <!--begin::Menu toggle-->
                                <a href="#"
                                    class="btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info h-60px w-180px mb-3 fw-bold"
                                    data-kt-menu-trigger="hover" data-kt-menu-placement="bottom-end">
                                    <i class="fa fa-angle-double-down fs-6 text-info me-1 fa-2x"><span
                                            class="path1"></span><span class="path2"></span></i>
                                    Operar Bobeda
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
                                            <i class="fa fa-cloud-download  text-danger  fs-1x"></i>
                                            Recibir Transferencia
                                        </a>

                                        <div class="separator border-gray-200"></div>

                                        <a href="movimientos/transferenciabobeda/{{ $cajaAperturada->id_caja }}"
                                            class="btn btn-outline btn-outline-dotted btn-outline-success btn-active-light-success w-200px mb-3">
                                            <i class="fa fa-cloud-upload  text-success  fs-1x"></i>
                                            Hacer Transferencia
                                        </a>
                                        <div class="separator border-gray-200"></div>
                                        <a href="movimientos/solicitartransferencia/{{ $cajaAperturada->id_caja }}"
                                            class="btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info w-200px mb-2">
                                            <i class="fa fa-reply-all   text-info  fs-1x"></i>
                                            Solicitar Transferencia
                                        </a>

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
                    <table class=" table table-hover table-row-dashed fs-6     gy-2 gs-5">
                        <thead class="thead-dark">
                            <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
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
                                        @switch($cuenta->tipo_operacion)
                                            @case('1')
                                            @case('2')
                                                {{-- Deposito y retiro --}}
                                                @if ($cuenta->estado == 0)
                                                    <a class="btn btn-sm w-50   fs-6 btn-outline btn-outline-dashed btn-outline-danger btn-active-light-dange"
                                                        style="pointer-events: none; text-decoration: line-through "><i
                                                            class="fa-solid fa-trash text-danger"></i> &nbsp;
                                                        Anulado</a>
                                                @else
                                                    <a href="javascript:void(0);"
                                                        onclick="alertAnular({{ $cuenta->id_movimiento }},'{{ $cuenta->tipo_operacion }}','{{ number_format($cuenta->monto, 2, '.', ',') }}')"
                                                        class="btn btn-danger btn-sm w-50"><i
                                                            class="fa-solid fa-trash text-white"></i>
                                                        Anular</a>
                                                @endif
                                            @break

                                            @case('3')
                                                {{-- Recepcion de Bobeda --}}
                                                <a
                                                    class="btn btn-sm w-50 btn-outline btn-outline-dashed btn-outline-success btn-active-light-dange">
                                                    Recibido
                                                </a>
                                            @break

                                            @case('4')
                                                {{-- Traslado a Bobeda --}}
                                                @if ($cuenta->estado == 1)
                                                    <a
                                                        class="btn btn-sm w-50 btn-outline btn-outline-dashed btn-outline-success btn-active-light-dange">
                                                        Entregado
                                                    </a>
                                                @else
                                                    <a
                                                        class="btn btn-sm w-50 btn-outline btn-outline-dashed btn-outline-info btn-active-light-dange">
                                                        En cola
                                                    </a>
                                                @endif
                                            @break

                                            @case('5')
                                                {{-- Traslado a Caja --}}
                                            @break

                                            @case('6')
                                                @if ($cuenta->estado == 1)
                                                    <a
                                                        class="btn btn-sm w-50 btn-outline btn-outline-dashed btn-outline-success btn-active-light-dange">
                                                        Entregado
                                                    </a>
                                                @else
                                                    <a
                                                        class="btn btn-sm w-50 btn-outline btn-outline-dashed btn-outline-info btn-active-light-dange">
                                                        En cola
                                                    </a>
                                                @endif
                                            @break
                                        @endswitch


                                        <a href="/reportes/comprobanteMovimiento/{{ $cuenta->id_movimiento }}"
                                            target="_blank" class="btn btn-info w-40 btn-sm"><i
                                                class="fa fa-print text-white"></i>
                                            </i> &nbsp;Imprimir
                                        </a>



                                    </td>
                                    <td style="text-align:center">
                                        {{ $cuenta->numero_cuenta == 0 ? 'Bobeda' : $cuenta->numero_cuenta }}</td>
                                    <td>
                                        {{ $cuenta->numero_cuenta == 0 ? 'Bobeda' : $cuenta->descripcion_cuenta }}
                                    </td>
                                    <td>
                                        @switch($cuenta->tipo_operacion)
                                            @case('1')
                                                <span class="badge badge-light-success fs-6">Deposito</span>
                                            @break

                                            @case('2')
                                                <span class="badge badge-light-danger fs-6">Retiro</span>
                                            @break

                                            @case('3')
                                                <span class="badge badge-light-danger fs-6"><i
                                                        class="fa fa-arrow-down text-info"></i>Recepcion</span>
                                            @break

                                            @case('4')
                                                <span class="badge badge-light-danger fs-6"> <i
                                                        class="fa fa-arrow-up text-info"></i>Traslado</span>
                                            @break

                                            @case('5')
                                                <span class="badge badge-light-danger fs-6">traslado a Caja</span>
                                            @break

                                            @case('6')
                                                <span class="badge badge-light-danger fs-6">Corte Z</span>
                                            @break
                                        @endswitch


                                    </td>
                                    <td style="text-align:right">


                                        @switch($cuenta->tipo_operacion)
                                            @case('1')
                                                <span
                                                    class="badge badge-light-success fs-6">${{ number_format($cuenta->monto, 2, '.', ',') }}</span>
                                            @break

                                            @default
                                                <span
                                                    class="badge badge-light-danger fs-6">${{ number_format($cuenta->monto, 2, '.', ',') }}</span>
                                        @endswitch


                                    </td>
                                    <td>{{ $cuenta->nombre }}</td>
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
