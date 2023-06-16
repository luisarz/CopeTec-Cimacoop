@extends('base.base')

@section('title')
    Administracion de Clientes
@endsection
@section('formName')
    <i class="ki-duotone ki-shield-tick text-success fs-2x"><span class="path1"></span><span class="path2"></span><span
            class="path3"></span></i>
    <div class="d-flex align-items-center mb-2">
        <div class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">
            {{ $bobeda->nombre }}
        </div>
        <!--begin: buttons actions-->

        <div class="me-1 mb-1">
            <div class="symbol symbol-100px symbol-lg-100px symbol-fixed position-relative ">
                <a href="/bobeda/transferir/{{ $bobeda->id_bobeda }}"
                    class="btn btn-sm btn-outline btn-outline-dashed btn-outline-danger btn-active-light-dange fs-3 {{ $bobeda->estado_bobeda == 0 ? ' d-none ' : '' }}">
                    <i class="ki-duotone ki-abstract-26 fs-2x text-white">
                        <i class="path1"></i>
                        <i class="path2"></i>
                    </i>
                    Cerrar Bobeda</a>
            </div>
        </div>
        <!--end::buttons actions-->

    </div>
@endsection

@section('content')
    <div class="card shadow-lg  mt-2">

        <div class="card card-bordered   shadow-lg">
            <div class="card-header ribbon ribbon-end ribbon-clip">

                <div class="ribbon-label fs-3">
                    {{ $bobeda->nombre }}

                    <i class="ki-duotone ki-book-square text-white fs-2x                      ">
                        <i class="path1"></i>
                        <i class="path2"></i>
                        <i class="path3"></i>
                        <i class="path4"></i>
                        <i class="path5"></i>
                    </i>

                    <span class="ribbon-inner bg-info"></span>
                </div>
                <div class="d-flex flex-wrap flex-sm-nowrap mt-5">
                    <!--begin: buttons actions-->
                    <div class="me-7 mb-4">
                      
                        <div class="symbol symbol-100px symbol-lg-100px symbol-fixed position-relative ">

                                <a href="/bobeda/aperturar/{{ $bobeda->id_bobeda }}"
                                    class="btn btn-sm btn-outline btn-outline-dashed btn-outline-success  fs-5 {{ $bobeda->estado_bobeda == 1 ? ' d-none ' : '' }}">
                                    <i class="ki-duotone ki-abstract-26 fs-2x text-">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                    </i>
                                    Aperturar <br/>Bobeda
                                </a>
                               

                            <a href="/bobeda/transferir/{{ $bobeda->id_bobeda }}"
                                class="btn btn-danger border-dashed {{ $bobeda->estado_bobeda == 0 ? ' d-none ' : '' }}">Enviar
                                <br>a Caja
                            </a>
                            <div
                                class="position-absolute translate-middle bottom-0 start-10 mb-6 bg-danger rounded-circle border border-4 border-body h-20px w-20px {{ $bobeda->estado_bobeda == 0 ? ' d-none ' : '' }}">
                            </div>
                            <a href="/bobeda/recibir/{{ $bobeda->id_bobeda }}"
                                class="btn btn-success {{ $bobeda->estado_bobeda == 0 ? ' d-none ' : '' }}">Recibir <br>de
                                Caja</a>

                            <div
                                class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px {{ $bobeda->estado_bobeda == 0 ? ' d-none ' : '' }}">
                            </div>
                        </div>
                    </div>
                    <!--end::buttons actions-->
                    <!--begin::Info-->
                    <div class="flex-grow-1">

                        <!--begin::Title-->
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">

                            <!--begin::Stat-->
                            <div class="border border-gray-500 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">

                                    <div class="fs-5 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                        data-kt-countup-prefix="$" data-kt-initialized="1">

                                        @if ($bobeda->estado_bobeda == 1)
                                            ${{ number_format($trasladoACaja, 2, '.', ',') }}
                                        @else
                                            <span class="badge badge-light-danger fs-5">Cerrada</span>
                                        @endif
                                    </div>
                                </div>
                                <!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-400">

                                    <span class="badge badge-info">Apertura</span>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--begin::Stat-->
                            <div class="border border-gray-500 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    <div class="fs-5 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                        data-kt-countup-prefix="$" data-kt-initialized="1">

                                        @if ($bobeda->estado_bobeda == 1)
                                            ${{ number_format($recibidoDeCaja, 2, '.', ',') }}
                                        @else
                                            <span class="badge badge-light-danger fs-5">Cerrada</span>
                                        @endif
                                    </div>
                                </div>
                                <!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-400">
                                    <span class="badge badge-info">Traslado <-Caja< /span>

                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="border border-gray-500 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">

                                    <div class="fs-5 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                        data-kt-countup-prefix="$" data-kt-initialized="1">
                                        @if ($bobeda->estado_bobeda == 1)
                                            ${{ number_format($trasladoACaja, 2, '.', ',') }}
                                        @else
                                            <span class="badge badge-light-danger fs-5">Cerrada</span>
                                        @endif

                                    </div>
                                </div>
                                <!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-400">
                                    <span class="badge badge-info">Traslado -> Caja</span>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="border border-gray-500 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">

                                    <div class="fs-5 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                        data-kt-countup-prefix="$" data-kt-initialized="1">
                                        @if ($bobeda->estado_bobeda == 1)
                                            0.00
                                            {{-- ${{ number_format($trasladoACaja, 2, '.', ',') }} --}}
                                        @else
                                            <span class="badge badge-light-danger fs-5">Cerrada</span>
                                        @endif

                                    </div>
                                </div>
                                <!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-400">
                                    <span class="badge badge-info">Traslado Cancelado</span>

                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="border border-gray-500 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">

                                    <div class="fs-5 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                        data-kt-countup-prefix="$" data-kt-initialized="1">
                                        @if ($bobeda->estado_bobeda == 1)
                                            ${{ number_format($bobeda->saldo_bobeda, 2, '.', ',') }}
                                        @else
                                            <span class="badge badge-light-danger fs-5">Cerrada</span>
                                        @endif
                                    </div>

                                </div>
                                <!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-400">
                                    <span class="badge badge-info">Saldo en Bobeda</span>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->

                        </div>
                        <!--end::Title-->


                    </div>
                    <!--end::Info-->
                </div>
            </div>

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
                                    <td> {{ $movimiento->tipo_operacion == '1' ? 'Traslado' : 'Recepcion' }}</span> </td>
                                    <td>
                                        @if ($movimiento->tipo_operacion == '1')
                                            <span
                                                class="badge badge-light-info fs-5">${{ number_format($movimiento->monto, 2, '.', ',') }}</span>
                                        @else
                                            <span class="badge badge-light-info fs-5"> $
                                                {{ number_format($movimiento->monto, 2, '.', ',') }}</span>
                                        @endif
                                    </td>
                                    <td style="text-align: center">{{ $movimiento->numero_caja }}</td>
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
            {{-- End card body --}}
            {{-- Start footer card --}}
            <div class="card-footer">
                {{ $movimientoBobeda->links('vendor.pagination.bootstrap-5') }}

            </div>
        </div>
    </div>




    <form method="post" id="anularForm" action="/bobeda/anularTraslado">
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
        function alertAnular(id, monto, caja) {
            Swal.fire({
                html: `¿Deseas Eliminar este Traslado, con los siguientes detalles?<br/><br/>
                        <span class="badge badge-primary">Caja: ` + caja + `</span><br/>
                        <span class="badge badge-secondary">Monto: $` + monto + `</span>`,
                icon: "question",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Si, Cancelar el traslado",
                cancelButtonText: 'No',
                customClass: {
                    confirmButton: "btn btn-danger",
                    cancelButton: "btn btn-secondary"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#id").val(id)
                    $("#anularForm").submit();
                } else if (result.isDenied) {}
            });

        }
    </script>
@endsection
