@extends('base.base')

@section('title')
    Administracion de Roles
@endsection

@section('content')
    <div class="card shadow-lg">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="card-toolbar">
                <a href="/captaciones/depositosplazo/add" class="btn btn-info">
                    <i class="ki-outline ki-calendar-add fs-2x"></i>
                    Nuevo Deposito
                </a>
                &nbsp;
                <a href="/captaciones/depositosplazo/add" class="btn btn-info">
                    <i class="ki-outline ki-calendar-add fs-2x"></i>
                    Nuevo Deposito
                </a>
            </div>
            <div class="ribbon-label fs-3">
                <i class="ki-outline ki-verify text-white fs-3x"><span class="path1"></span><span
                        class="path2"></span><span class="path3"></span></i>
                Administracion - Deposito a Plazo

                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-row-dashed fs-5     gy-2 gs-5">
                    <thead>
                        <tr class="fw-semibold fs-5 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="min-w-200px">Acciones</th>
                            <th class="min-w-20px">Certificado</th>
                            <th class="min-w-80px">Asociado</th>
                            <th class="min-w-50px">Monto</th>
                            <th class="min-w-10px">Tasa</th>
                            <th class="min-w-30px">Plazo</th>
                            <th class="min-w-30px">D. Mensual</th>
                            <th class="min-w-30px text-center">Apertura</th>



                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($depositosplazo as $plazo)
                            <tr>
                                <td>
                                    <a href="/captaciones/plazos/edit/{{ $plazo->id_plazo }}"
                                        class="btn btn-warning btn-sm w-30">
                                        <i class="ki-outline ki-pencil fs-5"></i> </a>

                                    <a href="/captaciones/tasas/{{ $plazo->id_plazo }}" class="btn btn-info btn-sm w-30">
                                        <i class="ki-outline ki-printer fs-5"></i>
                                    </a>

                                    <a href="/captaciones/tasas/{{ $plazo->id_plazo }}" class="btn btn-danger btn-sm w-30">
                                        <i class="ki-outline ki-cross-circle   fs-5"></i>
                                    </a>




                                </td>
                                <td>{{ $plazo->numero_certificado }}</td>
                                <td>{{ $plazo->nombre }}</td>
                                <td>$ {{ number_format($plazo->monto_deposito, 2, '.', ',') }}</td>
                                <td>{{ $plazo->valor }}%</td>
                                <td>{{ $plazo->plazo_deposito }} Meses</td>
                                <td><span class="badge badge-info"> ${{ number_format($plazo->interes_mensual,2,'.',',') }}</span>
                                {{-- <span class="badge badge-info"> ${{ number_format($plazo->interes_total,2,'.',',') }}</span> --}}
                                </td>

                                <td><span class="badge badge-success"> {{ \Carbon\Carbon::parse($plazo->fecha_deposito)->format('d-m-Y') }}</span>
                                <span class="badge badge-danger">{{ \Carbon\Carbon::parse($plazo->fecha_vencimiento)->format('d-m-Y') }}</span>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $depositosplazo->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>

    <form method="post" id="deleteForm" action="/rol/delete">
        {!! csrf_field() !!}
        {{ method_field('DELETE') }}
        <input type="hidden" name="id" id="id">
    </form>
@endsection

@section('scripts')
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <script src="assets/plugins/global/plugins.bundle.js"></script>
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
                } else if (result.isDenied) {}
            });
        }
    </script>
@endsection
