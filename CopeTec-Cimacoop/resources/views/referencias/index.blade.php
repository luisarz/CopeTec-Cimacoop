@extends('base.base')
@section('formName')
    Administracion de Referencias
@endsection
@section('content')
    <div class="card shadow-lg">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="card-toolbar">
                <a href="/referencias/add" class="btn btn-info"><i class="fa-solid fa-plus"></i> Agregar Nueva Referencia</a>

            </div>
            <div class="ribbon-label fs-3">
                <i class="ki-duotone ki-shield-tick text-white fs-2x"><span class="path1"></span><span
                        class="path2"></span><span class="path3"></span></i>
                Administracion de Clientes

                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>
        <div class="card-body">
            <table class=" table table-hover table-row-dashed fs-5     gy-2 gs-5">
                <thead>
                    <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                        <th >Acciones</th>
                        <th >Nombre</th>
                        <th >Parentesco</th>
                        <th >Telefono</th>
                        <th >Direccion</th>
                        <th >Trabajo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($referencias as $referencia)
                        <tr>
                            <td><a href="javascript:void(0);" onclick="alertDelete({{ $referencia->id_referencia }})"
                                    class="badge badge-danger"><i class="fa-solid fa-trash text-white"></i> &nbsp;
                                    Eliminar</a> <a href="/referencias/{{ $referencia->id_referencia }}"
                                    class="badge badge-primary"><i class="fa-solid fa-pencil text-white"></i> &nbsp;
                                    Modificar</a></td>
                            <td>{{ $referencia->nombre }}</td>
                            <td>{{ $referencia->parentesco }}</td>
                            <td>{{ $referencia->telefono }}</td>
                            <td>{{ $referencia->direccion }}</td>
                            <td>{{ $referencia->lugar_trabajo }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <form method="post" id="deleteForm" action="/referencias/delete">
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
