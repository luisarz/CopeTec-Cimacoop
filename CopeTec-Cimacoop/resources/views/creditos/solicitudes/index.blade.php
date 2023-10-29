@extends('base.base')

@section('title')
    Administracion de Roles
@endsection

@section('formName')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection

@section('content')
    <div class="card shadow-lg pt-4">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="card-toolbar">
                <a href="/creditos/solicitudes/add" class="btn btn-info">
                    <i class="ki-outline ki-electricity fs-2x"></i>
                    Nueva solicitud
                </a>

            </div>
            <div class="ribbon-label fs-3">
                <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;
                Administración | {{ Session::get('name_module') }}

                <span class="ribbon-inner bg-info"></span>
            </div>


        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-row-dashed fs-6     gy-2 gs-5">
                    <thead>
                        <tr class="fw-semibold fs-5 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="min-w-50px">Acciones</th>
                            <th class="min-w-30px">No</th>
                            <th class="min-w-10px">Estado</th>
                            <th class="min-w-150px">Cliente</th>
                            <th class="min-w-100px">Monto</th>
                            <th class="min-w-30px">Tasa</th>
                            <th class="min-w-50px">Plazo</th>
                            <th class="min-w-100px">Cuota. Mensual</th>
                            <th class="min-w-30px text-center">Fecha solicitud</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($solicitudes as $solicitud)
                            <tr>
                                <td class="text-end">
                                    <a href="#" class="btn btn-sm btn-info btn-flex btn-center "
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">
                                        Acciones
                                        <i class="ki-outline ki-dots-vertical fs-5 ms-1"></i></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded  menu-state-bg-light-primary fw-semibold fs-7 w-250px py-3"
                                        data-kt-menu="true" style="">
                                        @switch($solicitud->estado)
                                            @case(1)
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-2">
                                                    <a href="/creditos/solicitudes/edit/{{ $solicitud->id_solicitud }}"
                                                        class="menu-link px-3">
                                                        <i class="ki-outline ki-pencil fs-3">
                                                        </i>
                                                        <span class="px-2"> Editar</span>
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="/creditos/solicitud/{{ $solicitud->id_solicitud }}" target="_blank"
                                                        class="menu-link px-3">
                                                        <i class="ki-outline ki-printer   fs-3"></i>

                                                        <span class="px-2"> Imprimir Solicitud</span>
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="/creditos/pagare/{{ $solicitud->id_solicitud }}" target="_blank"
                                                        class="menu-link px-3">
                                                        <i class="ki-outline ki-printer   fs-3"></i>
                                                        <span class="px-2"> Imprimir Pagaré</span>
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="javascript:alertDelete('{{ $solicitud->id_solicitud }}')"
                                                        class="menu-link px-3">
                                                        <i class="ki-outline ki-cross-circle   fs-3"></i>
                                                        <span class="px-2 badge badge-light-danger "> Eliminar Solicitud</span>
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="/creditos/solicitudes/send_comite/{{ $solicitud->id_solicitud }}"
                                                        class="menu-link px-3">
                                                        <i class="ki-outline ki-crown  fs-3"></i>
                                                        <span class="px-2 badge badge-light-info"> Enviar a Comite</span>
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                            @break

                                            @case(2)
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="/creditos/solicitud/{{ $solicitud->id_solicitud }}" target="_blank"
                                                        class="menu-link px-3">
                                                        <i class="ki-outline ki-printer   fs-3"></i>
                                                        Imprimir Solicitud  <span class="badge badge-light-success">(Aprobada)</span>
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                            @break
                                              @case(4)
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="/creditos/solicitud/{{ $solicitud->id_solicitud }}" target="_blank"
                                                        class="menu-link px-3">
                                                        <i class="ki-outline ki-printer   fs-3"></i>
                                                        Imprimir Solicitud  <span class="badge badge-light-info">(Comite)</span>
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                            @break


                                        

                                            @default
                                        @endswitch
                                    </div>
                                    <!--end::Menu-->
                                </td>
                                <td>{{ $solicitud->numero_solicitud }}</td>
                                <td>
                                    @switch($solicitud->estado)
                                        @case(1)
                                            <span class="badge badge-info">Presentada</span>
                                        @break

                                        @case(2)
                                            <span class="badge badge-success">Aprobada</span>
                                        @break

                                        @case(3)
                                            <span class="badge badge-danger">Rechazada</span>
                                        @break

                                        @case(4)
                                            <span class="badge badge-warning">En Comite</span>
                                        @break

                                        @default
                                    @endswitch
                                </td>
                                <td>{{ $solicitud->nombre }}</td>
                                <td>$ {{ number_format($solicitud->monto_solicitado, 2, '.', ',') }}</td>
                                <td>{{ $solicitud->tasa }}%</td>
                                <td>{{ $solicitud->plazo }} Meses</td>
                                <td><span class="badge badge-danger fs-6">
                                        ${{ number_format($solicitud->cuota, 2, '.', ',') }}</span>
                                </td>
                                <td><span class="badge badge-success">
                                        {{ \Carbon\Carbon::parse($solicitud->fecha_solicitud)->format('d-m-Y') }}</span>
                                    <br />
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $solicitudes->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>

    <form method="post" id="deleteForm" action="/creditos/solicitudes/delete">
        {!! csrf_field() !!}
        {{ method_field('DELETE') }}
        <input type="hidden" name="id" id="id">
    </form>
@endsection

@section('scripts')
    <script>
      

        function alertDelete(id) {
            Swal.fire({
                text: "Deseas Eliminar este registro",
                icon: "warning",
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
                }
            });
        }
    </script>
@endsection
