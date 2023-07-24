@extends('base.base')

@section('title')
    Administracion de Roles
@endsection

@section('content')
    <div class="card shadow-lg">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="card-toolbar">
                <a href="/rol/add" class="btn btn-info"><i class="fa-solid fa-plus"></i> Agregar Rol</a>

            </div>
            <div class="ribbon-label fs-3">
                <i class="ki-duotone ki-shield-tick text-white fs-2x"><span class="path1"></span><span
                        class="path2"></span><span class="path3"></span></i>
                Administracion de Roles

                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>
        <div class="card-body">
            <table class="data-table-coop table table-hover table-row-dashed fs-6     gy-2 gs-5">
                <thead>
                    <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                        <th class="min-w-10px">Acciones</th>
                        <th class="min-w-600px">Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $rol)
                        <tr>
                            <td>
                                <a href="javascript:void(0);" onclick="alertDelete({{ $rol->id }})"
                                    class="btn btn-sm btn-danger"><i class="fa-solid fa-trash text-white"></i>
                                    </a> 
                                    <a href="/rol/{{ $rol->id }}" class="btn btn-sm btn-info"><i
                                        class="fa-solid fa-pencil text-white"></i>
                                    </a>
                                </td>
                            <td>{{ $rol->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $roles->links('vendor.pagination.bootstrap-5') }}
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
