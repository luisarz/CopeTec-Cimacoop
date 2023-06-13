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

    </div>
@endsection

@section('content')
    <div class="card mb-5 mb-xl-10">
        <div class="card-body pt-9 pb-0">
            <!--begin::Details-->

            <div class="d-flex flex-wrap flex-sm-nowrap">

                <!--begin: buttons actions-->
                <div class="me-7 mb-4">
                    <div class="symbol symbol-100px symbol-lg-100px symbol-fixed position-relative ">
                        <a href="/bobeda/transferir/{{ $bobeda->id_bobeda }}" class="btn btn-danger border-dashed">Enviar
                            <br>a Caja</a>
                        <div
                            class="position-absolute translate-middle bottom-0 start-10 mb-6 bg-danger rounded-circle border border-4 border-body h-20px w-20px">
                        </div>
                        <a href="/bobeda/recibir/{{ $bobeda->id_bobeda }}" class="btn btn-success">Recibir <br>de Caja</a>

                        <div
                            class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px">
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
                                <i class="ki-duotone ki-flag fs-2x text-success me-2"><span class="path1"></span><span
                                        class="path2"></span></i>
                                <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                    data-kt-countup-prefix="$" data-kt-initialized="1">
                                    {{-- {{ $totalAsignado}}% --}}
                                </div>
                            </div>
                            <!--end::Number-->

                            <!--begin::Label-->
                            <div class="fw-semibold fs-6 text-gray-400">$ Apertura</div>
                            <!--end::Label-->
                        </div>
                        <!--begin::Stat-->
                        <div class="border border-gray-500 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <!--begin::Number-->
                            <div class="d-flex align-items-center">
                                <i class="ki-duotone ki-arrow-up fs-2x text-success me-2"><span class="path1"></span><span
                                        class="path2"></span></i>
                                <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                    data-kt-countup-prefix="$" data-kt-initialized="1">
                                    ${{ number_format($recibidoDeCaja, 2, '.', ',') }}
                                </div>
                            </div>
                            <!--end::Number-->

                            <!--begin::Label-->
                            <div class="fw-semibold fs-6 text-gray-400">Depositos</div>
                            <!--end::Label-->
                        </div>
                        <!--end::Stat-->
                        <!--begin::Stat-->
                        <div class="border border-gray-500 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <!--begin::Number-->
                            <div class="d-flex align-items-center">
                                <i class="ki-duotone ki-arrow-down fs-2x text-danger me-2"><span class="path1"></span><span
                                        class="path2"></span></i>
                                <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                    data-kt-countup-prefix="$" data-kt-initialized="1">
                                                                      ${{ number_format($trasladoACaja, 2, '.', ',') }}

                                </div>
                            </div>
                            <!--end::Number-->

                            <!--begin::Label-->
                            <div class="fw-semibold fs-6 text-gray-400"> Retiros</div>
                            <!--end::Label-->
                        </div>
                        <!--end::Stat-->
                        <!--begin::Stat-->
                        <div class="border border-gray-500 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <!--begin::Number-->
                            <div class="d-flex align-items-center">
                                <i class="ki-duotone ki-minus-square fs-1x text-danger me-2"><span
                                        class="path1"></span><span class="path2"></span></i>
                                <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                    data-kt-countup-prefix="$" data-kt-initialized="1">
                                    $4,500</div>
                            </div>
                            <!--end::Number-->

                            <!--begin::Label-->
                            <div class="fw-semibold fs-6 text-gray-400"> Anulaciones</div>
                            <!--end::Label-->
                        </div>
                        <!--end::Stat-->
                        <!--begin::Stat-->
                        <div class="border border-gray-500 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <!--begin::Number-->
                            <div class="d-flex align-items-center">
                                <i class="ki-duotone ki-arrows-circle fs-2x text-success me-2"><span
                                        class="path1"></span><span class="path2"></span></i>
                                <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                    data-kt-countup-prefix="$" data-kt-initialized="1">
                                    ${{ number_format($bobeda->saldo_bobeda, 2, '.', ',') }}
                                </div>

                            </div>
                            <!--end::Number-->

                            <!--begin::Label-->
                            <div class="fw-semibold fs-6 text-gray-400">Saldo Disponible </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Stat-->

                    </div>
                    <!--end::Title-->


                </div>
                <!--end::Info-->
            </div>
            <!--end::Details-->

            {{-- <a href="/beneficiarios/add/{{$asociado->id_asociado}}" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i> Agregar Beneficiario</a> --}}


        </div>
    </div>

    <div class="table-responsive">
        <table class=" table table-hover table-row-dashed fs-3  my-0 dataTable  gy-2 gs-5">
            <thead class="thead-dark">
                <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                    <th class="min-w-50px">Acciones</th>
                    <th class="min-w-50px">Operacion</th>
                    <th class="min-w-50px">Monto</th>
                    <th class="min-w-100px">Origen/Destino</th>
                    <th class="min-w-100px">Fecha</th>
                    <th class="min-w-50px">Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movimientoBobeda as $movimiento)
                    <tr>
                        <td>
                            @if ($movimiento->estado == '1')
                                <a href="/bobeda/cancelar/{{ $movimiento->id_bobeda_movimiento }}"
                                    class="badge badge-warning "><i class="ki-duotone ki-minus-square  text-white fs-1x">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                    </i> &nbsp;
                                    Cancelar</a>
                            @elseif($movimiento->estado == '2')
                                <a href="/bobeda/anular/{{ $movimiento->id_bobeda_movimiento }}"
                                    class="badge badge-danger "><i
                                        class="ki-duotone ki-cross-square  text-white   fs-1x">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                    </i> &nbsp;
                                    Anular</a>
                            @endif


                        </td>
                        <td> {{ $movimiento->tipo_operacion == '1' ? 'Traslado' : 'Recepcion' }}</span> </td>
                        <td>
                            @if ($movimiento->tipo_operacion == '1')
                                <span class="badge badge-light-danger fs-5">${{ $movimiento->monto }}</span>
                            @else
                                <span class="badge badge-light-success fs-5"> $
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
                                <span class="badge badge-light-success fs-5">Cancelado</span>
                            @else
                                <span class="badge badge-light-success fs-5">Anulada</span>
                            @endif


                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $movimientoBobeda->links('vendor.pagination.bootstrap-5') }}

    <form method="post" id="deleteForm" action="/clientes/delete">
        {!! csrf_field() !!}
        {{ method_field('DELETE') }}
        <input type="hidden" name="id" id="id">
    </form>
@endsection

@section('scripts')
    <link href=" {{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />

    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script>
        function alertDelete(id) {
            Swal.fire({
                text: "Deseas Eliminar este registro",
                icon: "question",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Si",
                cancelButtonText: 'No',
                customClass: {
                    confirmButton: "btn btn-warning",
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
