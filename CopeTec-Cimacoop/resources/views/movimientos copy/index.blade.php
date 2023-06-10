@extends('base.base')

@section('title')
    Administracion de Clientes
@endsection

@section('content')
    <div class="card mb-5 mb-xl-10">
        <div class="card-body pt-9 pb-0">
            <!--begin::Details-->
            
            <div class="d-flex flex-wrap flex-sm-nowrap">
                
                <!--begin: Pic-->
                <div class="me-7 mb-4">
                    <div class="symbol symbol-100px symbol-lg-100px symbol-fixed position-relative">
                        <button class="btn btn-primary">Nuevo Movimiento</button>
                        <div
                            class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px">
                        </div>
                    </div>

                </div>
                <!--end::Pic-->

                <!--begin::Info-->
                <div class="flex-grow-1">

                    <!--begin::Title-->
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                        <!--begin::Name-->
                        <div class="d-flex align-items-center mb-2">
                            <div class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">
                                Caja #1
                            </div>
                            <div><i class="ki-duotone ki-verify fs-2 text-primary"><span class="path1"></span><span
                                        class="path2"></span></i></div>
                        </div>
                        <!--end::Name-->
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
                                    {{-- ${{ number_format($saldoDisponible, 2, '.', ',') }} --}}
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
                                    $4,500</div>
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
                                <i class="ki-duotone ki-minus-square fs-1x text-danger me-2"><span class="path1"></span><span
                                        class="path2"></span></i>
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
                                    {{-- ${{ number_format($saldoAportaciones, 2, '.', ',') }} --}}
                                </div>

                            </div>
                            <!--end::Number-->

                            <!--begin::Label-->
                            <div class="fw-semibold fs-6 text-gray-400">Saldos</div>
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
                    <th class="min-w-50px"># Cuenta</th>
                    <th class="min-w-50px">Tipo</th>
                    <th class="min-w-100px">Tipo</th>
                    <th class="min-w-100px">Monto</th>
                    <th class="min-w-50px">Cliente</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movimientos as $cuenta)
                    <tr>
                        <td>
                            <a href="/clientes/{{ $cuenta->id_cliente }}" class="badge badge-danger "><i
                                    class="fa-solid fa-pencil text-white "></i> &nbsp; Anular</a>
                        </td>
                        <td style="text-align:right">{{ $cuenta->numero_cuenta }}</td>
                        <td>{{ $cuenta->descripcion_cuenta }}</td>
                        <td> {{ $cuenta->tipo_operacion == '1' ? 'Deposito' : 'Retiro' }}</span> </td>
                        <td style="text-align:right">
                            @if ($cuenta->tipo_operacion == '1')
                                <span class="badge badge-light-success fs-5">${{ $cuenta->monto }}</span>
                            @else
                                <span class="badge badge-light-danger fs-5"> $ {{number_format( $cuenta->monto,2,'.',',')}}</span>
                            @endif
                        </td>

                        </td>

                        <td>{{ $cuenta->nombre }}</td>


                        <td>

                        </td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $movimientos->links('vendor.pagination.bootstrap-5') }}

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
