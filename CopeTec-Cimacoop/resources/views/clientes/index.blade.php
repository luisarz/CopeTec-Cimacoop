@extends('base.base')

@section('formName')
    Administración de Clientes
@endsection


@section('content')
    <div class="card shadow-lg">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="card-toolbar">
                <a href="/clientes/add" class="btn btn-info"><i class="fa-solid fa-plus"></i>Nuevo Cliente</a>
                &nbsp;
                <a href="/alerts/clients" target="_blank" class="btn btn-success"> <span>
                        <i class="fa fa-upload fa-2x"></i>
                    </span>Exportar Clientes a PDF</a>
                &nbsp;
                <a href="/alerts/active" target="_blank" class="btn btn-success"> <span>
                        <i class="fa fa-file fa-2x"></i>
                    </span>Reporte Clientes Activos</a>
            </div>
            <div class="ribbon-label fs-3">
                <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;
                Administración | {{ Session::get('name_module') }}

                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>
        <div class="card-body">
            <div class="table table-responsive">
                <table class="data-table-coop-serve-side table table-hover table-row-dashed fs-5     gy-2 gs-5">
                    <thead>
                        <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="min-w-200px">Acciones</th>
                            <th class="min-w-200px">Nombre</th>
                            <th class="min-w-90px">Género</th>
                            <th class="min-w-90px">DUI</th>
                            <th class="min-w-200px">Domicilio</th>
                            <th class="min-w-100px">Teléfono</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
        </div>
    </div>

    <form method="post" id="deleteForm" action="/clientes/delete">
        {!! csrf_field() !!}
        {{ method_field('DELETE') }}
        <input type="hidden" name="id" id="id">
    </form>
@endsection

@section('scripts')
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script>
        $(function() {
            let table = new DataTable('.data-table-coop-serve-side', {
                // "dom": 'frtip',
                select: true,
                "dom": "<'row'" +
                    "<'col-sm-6 d-flex align-items-center text-info input-solid justify-conten-start'f>" +
                    "<'col-sm-6 d-flex align-items-center justify-content-end'lB>" +


                    ">" +

                    "<'table-responsive'tr>" +

                    "<'row'" +
                    "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                    "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                    ">",
                "searching": true,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('clientes.list') }}",
                "language": {
                    "search": "Buscar",
                    "searchPlaceholder": "Escribe Aqui ...",
                },
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    ['5 registros', '10 registros', '25 registros', '50 registros', 'Todos']
                ],
                buttons: [{
                        extend: 'csv',
                        className: 'btn btn-info',
                        columns: [1, 2, 3, 4, 5],

                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-info',
                        columns: [1, 2, 3, 4, 5],
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-info',
                        columns: [1, 2, 3, 4, 5],

                    },
                    {
                        extend: 'print',
                        className: 'btn btn-info',
                        columns: [1, 2, 3, 4, 5],

                    }
                ],

                columns: [{
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'nombre',
                        name: 'nombre'
                    },
                    {
                        data: 'genero_row',
                        name: 'genero_row'
                    },
                    {
                        data: 'dui_cliente',
                        name: 'dui_cliente'
                    },
                    {
                        data: 'direccion_personal',
                        name: 'direccion_personal'
                    },
                    {
                        data: 'telefono',
                        name: 'telefono'
                    }
                ]
            });
        })

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
