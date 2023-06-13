@extends('base.base')

@section('title')
    Administracion de Clientes
@endsection

@section('content')
    <div>
        <a href="apertura/aperturarcaja" type="button" class="btn btn-primary">
            <i class="fa fa-opencart"></i> &nbsp; Apertuar Caja</a>
    </div>
    <div class="table-responsive">
        <table class=" table table-hover table-row-dashed fs-3  my-0 dataTable  gy-2 gs-5">
            <thead class="thead-dark">
                <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                    <th class="min-w-50px">Acciones</th>
                    <th class="min-w-50px ki-text-align-center"># Cuenta</th>
                    <th class="min-w-50px">Monto Apertura</th>
                    <th class="min-w-100px">Fecha Apertura</th>
                    <th class="min-w-100px">Aperturó</th>
                    <th class="min-w-100px">Fecha Cierre</th>
                    <th class="min-w-100px">Monto Cierre</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cajasApertuaradas as $apertura)
                    <tr>
                        <td>
                            <a href="/apertura/cortex/{{ $apertura->id_apertura_caja }}" class="badge badge-success "><i
                                    class="ki-duotone ki-basket-ok   text-white fs-2x                     ">
                                    <i class="path1"></i>
                                    <i class="path2"></i>
                                    <i class="path3"></i>
                                    <i class="path4"></i>
                                </i> Corte X</a>
                            <a href="/apertura/cortez/{{ $apertura->id_apertura_caja }}" class="badge badge-danger "><i
                                    class="ki-duotone ki-cheque     text-white fs-2x                   ">
                                    <i class="path1"></i>
                                    <i class="path2"></i>
                                    <i class="path3"></i>
                                    <i class="path4"></i>
                                    <i class="path5"></i>
                                    <i class="path6"></i>
                                    <i class="path7"></i>
                                </i> &nbsp; Corte Z</a>
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
                                {{ $apertura->hora_cierre }}
                            @endif
                        </td>
                        <td style="text-align: center">
                            @if ($apertura->monto_cierre == null)
                                <span class="badge badge-light-danger fs-5">-</span>
                            @else
                                <span class="badge badge-light-success fs-5">${{ $apertura->monto_cierre }}</span>
                            @endif






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
