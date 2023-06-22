@extends('base.base')

@section('title')
    Administracion de Clientes
@endsection

@section('content')
    <div>
        <a href="apertura/aperturarcaja" type="button" class="btn btn-primary">
            <i class="fa fa-opencart"></i> &nbsp; Apertuar Caja</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="table-responsive">
        <table class=" data-table-coop table table-hover table-row-dashed fs-3  my-0 dataTable  gy-2 gs-5">
            <thead class="thead-dark">
                <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                    <th >Acciones</th>
                    <th class="min-w-50px ">Caja</th>
                    <th class="min-w-50px">Monto Apertura</th>
                    <th class="min-w-100px">Fecha Apertura</th>
                    <th class="min-w-120px">Aperturó</th>
                    <th class="min-w-50px">H. Cierre</th>
                    <th class="min-w-50px">H. Aceptado</th>
                    <th class="min-w-100px">Monto Cierre</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cajasApertuaradas as $apertura)
                    <tr>
                        <td>
                            @switch($apertura->estado)
                                @case(0)
                                    <a class="w-100 btn btn-sm btn-outline btn-outline-dashed btn-outline-success ">
                                        <span class="badge badge-success fs-5 ">Recibido -> Bobeda</span>
                                    </a>
                                @break

                                @case(1)
                                    <a href="/apertura/cortez/{{ $apertura->id_apertura_caja }}"
                                        class="btn-sm btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
                                        <i class="fa fa-check   fs-5  ">
                                        </i>
                                        Corte
                                        <span class="badge badge-success fs-5"> X</span>
                                    </a>
                                    <a href="/apertura/cortez/{{ $apertura->id_apertura_caja }}"
                                        class="btn-sm btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
                                        <i class="fa fa-check-double   text-danger  ">
                                        </i>
                                        Corte
                                        <span class="badge badge-danger fs-5"> Z</span>
                                    </a>
                                @break

                                @case(3)
                                    <a class="w-100 btn-sm btn btn-outline btn-outline-dashed btn-outline-info ">
                                        <span class="badge badge-info fs-5 ">Enviado - bobeda</span>
                                    </a>
                                @break
                            @endswitch

                        </td>
                        <td>{{ $apertura->numero_caja }}</td>
                        <td style="text-align:center">
                            <span class="badge badge-light-success fs-5">${{ $apertura->monto_apertura }}</span>
                        </td>
                        <td>{{ $apertura->fecha_apertura }}</td>
                        <td>{{ $apertura->nombre_empleado }}</td>
                        <td style="text-align: center">
                            @if ($apertura->hora_cierre == null)
                                <span class="badge badge-light-danger fs-5">-</span>
                            @else
                                <span class="badge badge-info fs-5">{{ $apertura->hora_cierre }}</span>
                            @endif
                        </td>
                        <td style="text-align: center">
                            @if ($apertura->hora_aceptado == null)
                                <span class="badge badge-light-danger fs-5">-</span>
                            @else
                                <span class="badge badge-success fs-5">{{ $apertura->hora_aceptado }}</span>
                            @endif
                        </td>
                        <td style="text-align: center">
                            @if ($apertura->monto_cierre == null)
                                <span class="badge badge-light-danger fs-5">-</span>
                            @else
                                <span class="badge badge-light-success fs-5">${{ $apertura->monto_cierre }}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $cajasApertuaradas->links('vendor.pagination.bootstrap-5') }}

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
