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
                <a href="/contabilidad/catalogo/add" class="btn btn-info">
                    <i class="ki-outline ki-abstract-27 fs-2x"></i>
                    Nueva Cuenta
                </a>
              
            </div>
            <div class="ribbon-label fs-3">
                <i class="ki-outline ki-medal-star text-white fs-3x"><span class="path1"></span><span
                        class="path2"></span><span class="path3"></span></i>
                Administracion - Catalogo Contable

                <span class="ribbon-inner bg-info"></span>
            </div>

          
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-row-dashed fs-5     gy-2 gs-5">
                    <thead>
                        <tr class="fw-semibold fs-5 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="min-w-150px">Acciones</th>
                            <th class="min-w-100px">Catalogo</th>
                            <th class="min-w-50px">Cuenta</th>
                            <th class="min-w-80px">Descripcion</th>
                            <th class="min-w-100px">Saldo</th>
                            <th class="min-w-150px text-center">Estado</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cuentas as $cuenta)
                            <tr>
                                <td>

                                    <a href="/contabilidad/catalogo/edit/{{ $cuenta->id_cuenta }}"
                                        class="btn btn-warning btn-sm w-30">
                                        <i class="ki-outline ki-pencil fs-4"></i> </a>
                               
                                    <a href="/contabilidad/catalogo/{{ $cuenta->id_cuenta }}/beneficiarios"
                                        class="btn btn-info btn-sm w-30">
                                        <i class="ki-outline ki-security-user   fs-4"></i>
                                    </a>

                                    <a href="javascript:alertDelete({{ $cuenta->id_cuenta }})"
                                        class="btn btn-danger btn-sm w-30">
                                        <i class="ki-outline ki-cross-circle   fs-4"></i>
                                    </a>

                                </td>
                                <td>{{ $cuenta->catalogo }}</td>
                                <td>{{ $cuenta->numero }}</td>
                                <td>{{ $cuenta->descripcion }}</td>
                                <td>$ {{ number_format($cuenta->saldo, 2, '.', ',') }}</td>
                                <td style="text-align: center">

                                        @if($cuenta->estado == 1)
                                            <span class="badge badge-light-success fs-5">Activa</span>
                                        @else
                                            <span class="badge badge-light-danger fs-5">Inactiva</span>
                                        @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $cuentas->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>

    <form method="post" id="deleteForm" action="/contabilidad/catalogo/delete">
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
