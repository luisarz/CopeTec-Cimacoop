@extends('base.base')

@section('formName')
    <i class="ki-duotone ki-profile-user text-success fs-2x"><span class="path1"></span><span class="path2"></span><span
            class="path3"></span></i>

    Administracion de Intereses 
@endsection

@section('content')
    <a href="/intereses/add/{{$id_tipo_cuenta}}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Nueva tasa de interes</a>

    <div class="table-responsive">
        <table id="table_asociados" class="table table-hover  fs-6 gy-5 my-0 dataTable  gy-4 gs-7">
            <thead>
                <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <th class="min-w-150px">Acciones</th>
                    <th class="min-w-300px">Cuenta</th>
                    <th class="min-w-100px">Tasa de interes</th>
                </tr>
            </thead>
            <tbody>
               @if ($interesesAsignados == null)
                    <tr>
                        <td colspan="6" class="text-center">No hay registros</td>
                    </tr>
                @else
                @foreach ($interesesAsignados as $interes)
                        <tr>
                            <td><a href="javascript:void(0);" onclick="alertDelete({{ $interes->id_intereses_tipo_cuenta }})"
                                    class="btn btn-sm btn-danger"><i class="fa-solid fa-trash text-white"></i> &nbsp;
                                    Eliminar</a>
                                <a href="/intereses/edit/{{ $interes->id_intereses_tipo_cuenta }}"
                                    class="btn btn-sm btn-primary"><i class="fa-solid fa-pencil text-white"></i> &nbsp;
                                    Modificar</a>
                            </td>
                            <td>{{ $interes->descripcion_cuenta }}</td>
                            <td>{{ $interes->interes }}%</td>

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
    {{-- <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> --}}
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
