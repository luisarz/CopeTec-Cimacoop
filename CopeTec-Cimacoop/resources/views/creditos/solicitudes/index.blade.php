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
    <div class="card shadow-lg">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="card-toolbar">
                <a href="/creditos/solicitudes/add" class="btn btn-info">
                    <i class="ki-outline ki-electricity fs-2x"></i>
                    Nueva solicitud
                </a>
                &nbsp;
                <a href="/captaciones/solicitudsplazo/add" class="btn btn-danger">
                    <i class="ki-outline ki-calendar-add fs-2x"></i>
                    Depositar Intereses
                </a>
            </div>
            <div class="ribbon-label fs-3">
                <i class="ki-outline ki-book-square text-white fs-3x"></i>
                Administracion - Solicitudes Crédito

                <span class="ribbon-inner bg-info"></span>
            </div>


        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-row-dashed fs-5     gy-2 gs-5">
                    <thead>
                        <tr class="fw-semibold fs-5 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="min-w-300px">Acciones</th>
                            <th class="min-w-20px">No</th>
                            <th class="min-w-20px">Estado</th>
                            <th class="min-w-80px">Cliente</th>
                            <th class="min-w-50px">Monto</th>
                            <th class="min-w-10px">Tasa</th>
                            <th class="min-w-30px">Plazo</th>
                            <th class="min-w-30px">Cuota. Mensual</th>
                            <th class="min-w-30px text-center">Fecha solicitud</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($solicitudes as $solicitud)
                            <tr>
                                <td>

                                    @switch($solicitud->estado)
                                        @case(1)
                                            {{-- Editar --}}
                                            <a href="/creditos/solicitudes/edit/{{ $solicitud->id_solicitud }}"
                                                class="btn btn-warning btn-sm w-30">
                                                <i class="ki-outline ki-pencil fs-5"></i> </a>
                                            {{-- Resolver --}}
                                            <a href="/creditos/solicitud/{{ $solicitud->id_solicitud }}"
                                                class="btn btn-info btn-sm w-30">
                                                <i class="ki-outline ki-printer   fs-3"></i>
                                            </a>
                                              {{-- pagare --}}
                                            <a href="/creditos/pagare/{{ $solicitud->id_solicitud }}"
                                                class="btn btn-success btn-sm w-30">
                                                <i class="ki-outline ki-printer   fs-3"></i>
                                            </a>
                                            {{-- Anular --}}
                                            <a href="/reditos/solicitudes/cancelar/{{ $solicitud->id_solicitud }}"
                                                class="btn btn-outline btn-danger btn-sm w-30">
                                                <i class="ki-outline ki-cross-circle   fs-5"></i>
                                            </a>
                                        @break
                                        @case(2)
                                            <span class="badge badge-success">Aprobada</span>
                                        @break

                                        @case(3)
                                        @break

                                        @default
                                    @endswitch

                                </td>
                                <td>{{ $solicitud->numero_solicitud }}</td>
                                <td>
                                    @switch($solicitud->estado)
                                        @case(1)
                                            <span class="badge badge-info">Prsentada</span>
                                        @break

                                        @case(2)
                                            <span class="badge badge-success">Aprobada</span>
                                        @break

                                        @case(3)
                                            <span class="badge badge-danger">Rechazada</span>
                                        @break

                                        @default
                                    @endswitch
                                </td>
                                <td>{{ $solicitud->nombre }}</td>
                                <td>$ {{ number_format($solicitud->monto_solicitado, 2, '.', ',') }}</td>
                                <td>{{ $solicitud->tasa }}%</td>
                                <td>{{ $solicitud->plazo }} Meses</td>
                                <td><span class="badge badge-danger fs-5">
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

    <form method="post" id="deleteForm" action="/captaciones/beneficiarios/delete">
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