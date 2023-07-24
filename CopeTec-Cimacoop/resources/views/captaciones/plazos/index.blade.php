@extends('base.base')

@section('title')
    Administracion de Roles
@endsection

@section('content')
    <div class="card shadow-lg">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="card-toolbar">
                <a href="/captaciones/plazos/add" class="btn btn-success"><i class="fa-solid fa-plus"></i>Nuevo Plazo</a>
            </div>
            <div class="ribbon-label fs-3">
                <i class="ki-duotone ki-calendar text-white fs-3x"><span class="path1"></span><span
                        class="path2"></span><span class="path3"></span></i>
                Administracion de Plazos para Deposito

                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>
        <div class="card-body">
            <table class="data-table-coop table table-hover table-row-dashed fs-6     gy-2 gs-5">
                <thead>
                    <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                        <th class="min-w-25px">Acciones</th>
                        <th class="min-w-300px">Descripcion</th>
                        <th class="min-w-300px">Plazo</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($plazos as $plazo)
                        <tr>
                            <td>
                                <a href="/captaciones/plazos/edit/{{ $plazo->id_plazo }}" class="btn btn-info btn-sm"><i
                                        class="fa-solid fa-pencil text-white"></i>
                                    </a>
                                         <a href="/captaciones/tasas/{{ $plazo->id_plazo }}" class="btn btn-success btn-sm"><i
                                        class="fa-solid fa-pencil text-white"></i> &nbsp; Tasas</a>


                            </td>
                            <td>{{ $plazo->descripcion }}</td>
                            <td>{{ $plazo->meses }} Meses</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $plazos->links('vendor.pagination.bootstrap-5') }}
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
