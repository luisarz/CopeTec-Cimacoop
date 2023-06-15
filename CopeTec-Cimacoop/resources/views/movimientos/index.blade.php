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
                                Realizar <br>Retiro</a>
                            <a href="movimientos/depositar/{{ $cajaAperturada->id_caja }}" class="btn btn-success">
                                <span><i class="fa fa-download fa-2x"></i></span>

                                Realizar<br> Deposito</a>

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
                                        ${{ number_format($cajaAperturada->monto_apertura, 2, '.', ',') }}
                                    </div>
                                </div>
                                <!--end::Number-->

                                <!--begin::Label-->
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
                            <div class="border border-gray-500 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">

                                    <div class="fs-5 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                        data-kt-countup-prefix="$" data-kt-initialized="1">
                                        ${{ number_format($totalDepositos, 2, '.', ',') }}
                                    </div>
                                </div>
                                <!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-400"><i
                                        class="ki-duotone ki-arrow-up  text-success me-2"><span class="path1"></span><span
                                            class="path2"></span></i>Deposito</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="border border-gray-500 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">

                                    <div class="fs-5 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                        data-kt-countup-prefix="$" data-kt-initialized="1">
                                        ${{ number_format($totalRetiros, 2, '.', ',') }}

                                    </div>
                                </div>
                                <!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-400"> <i
                                        class="ki-duotone ki-arrow-down  text-danger me-2"><span class="path1"></span><span
                                            class="path2"></span></i>Retiro</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="border border-gray-500 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">

                                    <div class="fs-5 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                        data-kt-countup-prefix="$" data-kt-initialized="1">
                                        ${{ number_format($totalAnuladas, 2, '.', ',') }}
                                    </div>
                                </div>
                                <!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-400"> <i
                                        class="ki-duotone ki-minus-square fs-1x text-danger me-2"><span
                                            class="path1"></span><span class="path2"></span></i>Anulado</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="border border-gray-500 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">

                                    <div class="fs-5 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                        data-kt-countup-prefix="$" data-kt-initialized="1">
                                        ${{ number_format($saldo, 2, '.', ',') }}
                                    </div>

                                </div>
                                <!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-400"><i
                                        class="ki-duotone ki-arrows-circle text-success me-2"><span
                                            class="path1"></span><span class="path2"></span></i>Saldos</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->

                        </div>
                        <!--end::Title-->


                    </div>
                    <!--end::Info-->
                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class=" table table-hover table-row-dashed fs-6     gy-2 gs-5">
                        <thead class="thead-dark">
                            <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                                <th class="min-w-50px">Acciones</th>
                                <th class="min-w-50px"># Cuenta</th>
                                <th class="min-w-50px">Tipo</th>
                                <th class="min-w-100px">Tipo</th>
                                <th class="min-w-100px ">Monto</th>
                                <th class="min-w-50px">Cliente</th>
                                <th class="min-w-50px">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movimientos as $cuenta)
                                <tr @if ($cuenta->estado == 0) class="btn-outline-dashed" @endif>
                                    <td>
                                        @if ($cuenta->estado == 0)
                                            <a class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-dange"
                                                style="pointer-events: none; text-decoration: line-through "><i
                                                    class="fa-solid fa-trash text-danger"></i> &nbsp; Anulado</a>
                                        @else
                                            <a href="javascript:void(0);"
                                                onclick="alertAnular({{ $cuenta->id_movimiento }})"
                                                class="btn btn-danger"><i class="fa-solid fa-trash text-white"></i>
                                                </i> &nbsp;
                                                Anular</a>
                                        @endif



                                    </td>
                                    <td style="text-align:center">{{ $cuenta->numero_cuenta }}</td>
                                    <td>{{ $cuenta->descripcion_cuenta }}</td>
                                    <td>
                                        @switch($cuenta->tipo_operacion)
                                            @case('1')
                                                <span class="badge badge-light-success fs-6">Deposito</span>
                                            @break

                                            @case('2')
                                                <span class="badge badge-light-danger fs-6">Retiro</span>
                                            @break

                                            @case('3')
                                                <span class="badge badge-light-danger fs-6">traslado Caja</span>
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
        function alertAnular(id) {
            Swal.fire({
                text: "Deseas Anular este registro" + id,
                icon: "question",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Si",
                cancelButtonText: 'No',
                customClass: {
                    confirmButton: "btn btn-danger btn-block",
                    cancelButton: "btn btn-secondary"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#id").val(id)
                    $("#deleteForm").submit();
                } else if (result.isDenied) {}
            });
        }
    </script>
@endsection
