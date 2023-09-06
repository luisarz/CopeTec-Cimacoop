@extends('base.base')

@section('formName')
    <i class="ki-duotone ki-profile-user text-success fs-2x"><span class="path1"></span><span class="path2"></span><span
            class="path3"></span></i>

    Administracion de Asociados
@endsection

@section('content')

    <div class="card mb-5 mb-xl-10 my-3">
        <div class="card-body pt-9 pb-0 mb-5 m">
            <!--begin::Details-->
            <div class="d-flex flex-wrap flex-sm-nowrap">
                <!--begin: Pic-->
            
                <!--end::Pic-->

                <!--begin::Info-->
                <div class="flex-grow-1">
                    <!--begin::Title-->
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                        <!--begin::User-->
                        <div class="d-flex flex-column">
                            <!--begin::Name-->
                            <div class="d-flex align-items-center mb-2">
                              <h3> {{ $asociado->nombre }}</h3>
                               <i class="ki-outline ki-verify fs-2 text-primary"></i>
                            </div>
                            <!--end::Name-->

                            <!--begin::Info-->
                            <div class=" flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                   
                                    <i class="ki-outline ki-profile-circle fs-4 me-1"></i>
                                    {{ $asociado->profesion }}
                              <br>
                                
                                    <i class="ki-outline ki-geolocation fs-4 me-1"></i> 
                                        {{ $asociado->direccion_personal }}
                                <br>
                                    <i class="ki-outline ki-sms fs-4 me-1"></i>
                                     {{ $asociado->telefono }}
                               
                            </div>

                            <!--end::Info-->
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
                                    {{ number_format( $totalAsignado,2) }}%
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
                                 ${{ number_format($saldoDisponible, 2) }}
                                </div>
                            </div>
                            <!--end::Number-->

                            <!--begin::Label-->
                            <div class="fw-semibold fs-6 text-gray-400">Cuentas</div>
                            <!--end::Label-->
                        </div>
                        <!--end::Stat-->
                        <!--begin::Stat-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
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
                            <div class="fw-semibold fs-6 text-gray-400"> Prestamos</div>
                            <!--end::Label-->
                        </div>
                        <!--end::Stat-->
                        <!--begin::Stat-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <!--begin::Number-->
                            <div class="d-flex align-items-center">
                                <i class="ki-duotone ki-arrows-circle fs-2x text-success me-2"><span
                                        class="path1"></span><span class="path2"></span></i>
                                <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                    data-kt-countup-prefix="$" data-kt-initialized="1">
                                    ${{ number_format($saldoAportaciones, 2, '.', ',') }}</div>

                            </div>
                            <!--end::Number-->

                            <!--begin::Label-->
                            <div class="fw-semibold fs-6 text-gray-400">Aportaciones</div>
                            <!--end::Label-->
                        </div>
                        <!--end::Stat-->

                    </div>
                    <!--end::Title-->


                </div>
                <!--end::Info-->
            </div>
            <!--end::Details-->
            <a href="/asociados" class="btn btn-info btn-sm"><i class="fa-solid fa-arrow-left"></i> Ir a Asociados</a>

            <a href="/beneficiarios/add/{{$asociado->id_asociado}}" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i> Agregar Beneficiario</a>
            

        </div>
    </div>

    <div class="table-responsive">
        <table id="table_asociados" class="table table-hover table-row-dashed fs-6 gy-1  dataTable  gy-1 gs-1">
            <thead class="thead-dark">
                <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <th class="min-w-90px">Acciones</th>
                    <th class="min-w-200px">Asociado</th>
                    <th class="min-w-100px">parentesco</th>
                    <th class="min-w-200px">porcentaje</th>
                    <th class="min-w-200px">Direccion</th>
                </tr>
            </thead>
            <tbody>

                @if ($beneficiarios == null)
                    <tr>
                        <td colspan="6" class="text-center">No hay registros</td>
                    </tr>
                @else
                    @foreach ($beneficiarios as $beneficiario)
                        <tr>
                            <td><a href="javascript:void(0);" onclick="alertDelete({{ $beneficiario->id_beneficiario }})"
                                    class="btn btn-danger btn-sm"><i class="fa-solid fa-trash text-white"></i></a>
                                <a href="/beneficiarios/edit/{{ $beneficiario->id_beneficiario }}"
                                    class="btn btn-info btn-sm"><i class="fa-solid fa-pencil text-white"></i> </a>



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
        $("#table_asociados").DataTable();

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
