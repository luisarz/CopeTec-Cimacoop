@extends('base.base')

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
    <div class="card shadow-lg mt-3">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="card-toolbar">
   <a href="/productos/add" class="btn btn-success me-5 btn-sm fs-3">
                    <i class="ki-outline ki-plus fs-2x "></i>
                    Nuevo
                </a>
                <a href="javascript:generarReporte();" class="btn btn-danger me-5 btn-sm fs-3">
                    <i class="ki-outline ki-printer fs-2x "></i>
                    Reporte
                </a>

                <div class="d-flex align-items-center border-radius">
                    <form action="/productos/list" method="post" autocomplete="off" class="d-flex align-items-center">
                        @csrf
                        @method('POST')
                        <div class="position-relative w-md-450px me-md-2">
                            <i
                                class="ki-outline ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6"></i>
                            <input type="text" class="form-control form-control-lg form-control-solid ps-10" name="filtro"
                                id="filtro" value="{{ $filtro }}" placeholder="Nombre ó código de barra">
                        </div>

                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-info me-5">Buscar</button>

                        </div>
                    </form>

                </div>
               

            </div>

            <div class="ribbon-label fs-3">
                <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;
                | {{ Session::get('name_module') }}
                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-row-dashed fs-6 gy-1 gs-1">
                    <thead class="fw-bold">
                        <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="min-w-30px text-center">Acciones</th>
                            <th class="min-w-160px ">Producto</th>
                            <th class="min-w-80px">Cod Barra</th>
                            <th class="min-w-80px">Presentación</th>
                            <th class="min-w-50px">Marca</th>
                            <th class="min-w-250px">Costo</th>
                            <th class="min-w-250px">Facturacion</th>

                        </tr>
                    </thead>
                    <tbody class="fs-4">
                        @foreach ($productos as $producto)
                            <tr>
                                <td>
                                    <a href='/productos/edit/{{ $producto->id_producto }}' class="btn btn-sm btn-success">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                   <a href="javascript:void(0);" onclick="alertDelete({{ $producto->id_producto }})"
                                    class="btn btn-danger btn-sm"><i class="fa-solid fa-trash text-white"></i></a>
                                </td>

                                <td>{{ $producto->nombre }}</td>
                                <td>{{ $producto->cod_barra }}</td>
                                <td>{{ $producto->presentacion }}</td>
                                <td>{{ $producto->marca }}</td>
                                <td>${{ number_format($producto->costo, 2) }}</td>

                                <td>
                                @if($producto->tipo_facturacion == 1)
                                    <span class="badge badge-light-danger">Compras</span>
                                @else
                                    <span class="badge badge-light-success">Facturacion</span>
                                @endif    
                                </td>



                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $productos->appends(['filtro' => $filtro])->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>

    <form method="post" id="deleteForm" action="/productos/delete">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" id="id">
    </form>
@endsection

@section('scripts')
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
                }
            });
        }

        function generarReporte(){
            let filtro =$("#filtro").val();
            if(filtro == ""){
                filtro = "all";
            }
            window.open('/productos/reporte/'+filtro, '_blank');
        }
    </script>
@endsection
