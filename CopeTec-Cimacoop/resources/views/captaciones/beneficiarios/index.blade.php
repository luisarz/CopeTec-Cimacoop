@extends('base.base')

@section('formName')
    <i class="ki-duotone ki-profile-user text-success fs-2x"><span class="path1"></span><span class="path2"></span><span
            class="path3"></span></i>

    Administracion de depositoPlazos
@endsection

@section('content')

<input type="hidden" name="tieneBeneficiarios" id="tieneBeneficiarios" value="{{ $tieneBeneficiarios }}">
    <div class="card mb-5 mb-xl-10">
        <div class="card-body pt-9 pb-0">
            <!--begin::Details-->
            <div class="d-flex flex-wrap flex-sm-nowrap">
                <!--begin: Pic-->
                <div class="me-7 mb-4">
                    <div class="symbol symbol-100px symbol-lg-100px symbol-fixed position-relative">
                        <img src="/assets/media/avatars/300-1.jpg" alt="user">
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
                        <!--begin::User-->
                        <div class="d-flex flex-column">
                            <!--begin::Name-->
                            <div class="d-flex align-items-center mb-2">
                                <span class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">
                                    {{ $depositoPlazo->nombre }}
                                </span>
                            </div>
                            <!--end::Name-->

                        </div>
                        <!--end::User-->
                        <!--begin::Stat-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <!--begin::Number-->
                            <div class="d-flex align-items-center">
                                <i class="ki-duotone ki-flag fs-2x text-success me-2"><span class="path1"></span><span
                                        class="path2"></span></i>
                                <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                    data-kt-countup-prefix="$" data-kt-initialized="1">
                                    {{ $totalAsignado }}%
                                </div>
                            </div>
                            <!--end::Number-->
                            <!--begin::Label-->
                            <div class="fw-semibold fs-6 text-gray-400">% Distribuido</div>
                            <!--end::Label-->
                        </div>
                        <!--begin::Stat-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <!--begin::Number-->
                            <div class="d-flex align-items-center">
                                <i class="ki-duotone ki-arrow-up fs-2x text-success me-2"><span class="path1"></span><span
                                        class="path2"></span></i>
                                <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                    data-kt-countup-prefix="$" data-kt-initialized="1">
                                    ${{ number_format($depositoPlazo->monto_deposito, 2, '.', ',') }}
                                </div>
                            </div>
                            <!--end::Number-->

                            <!--begin::Label-->
                            <div class="fw-semibold fs-6 text-gray-400">Deposito</div>
                            <!--end::Label-->
                        </div>
                        <!--end::Stat-->
                        <!--begin::Stat-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <!--begin::Number-->
                            <div class="d-flex align-items-center">
                                <i class="ki-duotone ki-like-shapes fs-2x text-success me-2"><span
                                        class="path1"></span><span class="path2"></span></i>
                                <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                    data-kt-countup-prefix="$" data-kt-initialized="1">
                                    ${{ number_format($depositoPlazo->valor, 2, '.', ',') }}%

                                </div>
                            </div>
                            <!--end::Number-->

                            <!--begin::Label-->
                            <div class="fw-semibold fs-6 text-gray-400"> Tasa Deposito</div>
                            <!--end::Label-->
                        </div>
                        <!--end::Stat-->
                        <!--begin::Stat-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <!--begin::Number-->
                            <div class="d-flex align-items-center">
                                <i class="ki-duotone ki-calendar fs-2x text-success me-2"><span class="path1"></span><span
                                        class="path2"></span></i>
                                <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                    data-kt-countup-prefix="$" data-kt-initialized="1">
                                    {{ \Carbon\Carbon::parse($depositoPlazo->fecha_deposito)->format('d-m-Y') }}
                                </div>

                            </div>
                            <!--end::Number-->

                            <!--begin::Label-->
                            <div class="fw-semibold fs-6 text-gray-400">Fecha Deposito</div>
                            <!--end::Label-->
                        </div>
                        <!--end::Stat-->

                    </div>
                    <!--end::Title-->


                </div>
                <!--end::Info-->
            </div>
            <!--end::Details-->

            <a href="/beneficiarios/add/{{ $depositoPlazo->id_depositoPlazo }}" class="btn btn-success btn-sm">
                <i class="ki-outline ki-user-tick fs-1"></i> Agregar Beneficiario
            </a>
            <a a href="javascript:void(0);" onclick="imprimirCertificado({{ $depositoPlazo->id_deposito_plazo_fijo}})"  class="btn btn-info btn-sm w-30">
                <i class="ki-outline ki-printer fs-1"></i>
                Certificado
            </a>


        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-row-dashed fs-6 gy-5 my-0 dataTable  gy-4 gs-7">
            <thead class="thead-dark">
                <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <th class="min-w-90px">Acciones</th>
                    <th class="min-w-200px">depositoPlazo</th>
                    <th class="min-w-100px">parentesco</th>
                    <th class="min-w-200px">porcentaje</th>
                </tr>
            </thead>
            <tbody>

                @if ($beneficiarios == null)
                    <tr>
                        <td colspan="4" class="text-center">
                            <div class="alert alert-danger">
                                No hay Beneficiaarios Registrados
                            </div>
                        </td>
                    </tr>
                @else
                    @foreach ($beneficiarios as $beneficiario)
                        <tr>
                            <td><a href="javascript:void(0);" onclick="alertDelete({{ $beneficiario->id_beneficiario }})"
                                    class="badge badge-danger"><i class="fa-solid fa-trash text-white"></i> &nbsp;
                                    Eliminar</a>
                                <a href="/beneficiarios/edit/{{ $beneficiario->id_beneficiario }}"
                                    class="badge badge-primary"><i class="fa-solid fa-pencil text-white"></i> &nbsp;
                                    Modificar</a>



                            </td>
                            <td>{{ $beneficiario->nombre }}</td>
                            <td>{{ $beneficiario->parentesco }}</td>
                            <td>{{ $beneficiario->porcentaje }}%</td>
                            <td>{{ $beneficiario->direccion }}</td>

                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>
    <form method="post" id="deleteForm" action="/intereses/delete">
        {!! csrf_field() !!}
        {{ method_field('DELETE') }}
        <input type="hidden" name="id" id="id">
    </form>
@endsection

@section('scripts')
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script>
        $("#table_depositoPlazos").DataTable();
        function imprimirCertificado(id){
            let tieneBeneficiarios=$("#tieneBeneficiarios").val();
            if (tieneBeneficiarios){
                window.open('/reportes/depositoplazo/'+id, '_blank');
            }else{
                Swal.fire({
                text: "Agregue al menos un beneficiario para poder imprimir el certificado",
                icon: "info",
                buttonsStyling: false,
                showCancelButton: false,
                showConfirmButton: true,
                confirmButtonText: "Volver",
                customClass: {
                    confirmButton: "btn btn-info"
                }
            })
            }
        }

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
