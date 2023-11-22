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
                <a href="/captaciones/depositosplazo/add" class="btn btn-info">
                    <i class="ki-outline ki-calendar-add fs-2x"></i>
                    Nuevo Deposito
                </a>
                &nbsp;
                <a href="/captaciones/interes/deposito" class="btn btn-danger">
                    <i class="ki-outline ki-paintbucket fs-2x"></i>
                        Depositar Intereses
                </a>
            </div>
            <div class="ribbon-label fs-3">
               <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;
                Administración | {{ Session::get('name_module') }}

                <span class="ribbon-inner bg-info"></span>
            </div>

          
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-row-dashed fs-5     gy-2 gs-5">
                    <thead>
                        <tr class="fw-semibold fs-5 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="min-w-230px">Acciones</th>
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
                        @foreach ($depositosplazo as $deposito)
                            <tr>
                                <td>



                                    <a href="/captaciones/depositosplazo/edit/{{ $deposito->id_deposito_plazo_fijo }}"
                                        class="btn btn-info btn-sm w-30">
                                        <i class="ki-outline ki-pencil fs-5"></i> </a>

                               
                                    <a href="/captaciones/depositosplazo/{{ $deposito->id_deposito_plazo_fijo }}/beneficiarios"
                                        class="btn btn-success btn-sm w-30">
                                        <i class="ki-outline ki-security-user   fs-3"></i>
                                    </a>

                                    <a href="javascript:alertDelete({{$deposito->id_deposito_plazo_fijo }})"
                                        class="btn btn-danger btn-sm w-30">
                                        <i class="ki-outline ki-cross-circle   fs-5"></i>
                                    </a>




                                </td>
                                <td>{{ $deposito->numero_certificado }}</td>
                                <td>{{ $deposito->nombre }}</td>
                                <td>$ {{ number_format($deposito->monto_deposito, 2, '.', ',') }}</td>
                                <td>{{ $deposito->valor }}%</td>
                                <td>{{ $deposito->meses }} Meses</td>
                                <td><span class="badge badge-info">
                                        ${{ number_format($deposito->interes_mensual, 2, '.', ',') }}</span>
                                    {{-- <span class="badge badge-info"> ${{ number_format($plazo->interes_total,2,'.',',') }}</span> --}}
                                </td>

                                <td><span class="badge badge-success">
                                        {{ \Carbon\Carbon::parse($deposito->fecha_deposito)->format('d-m-Y') }}</span>
                                    <br />
                                    <span
                                        class="badge badge-danger">{{ \Carbon\Carbon::parse($deposito->fecha_vencimiento)->format('d-m-Y') }}</span>
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

    <form method="post" id="deleteForm" action="/captaciones/depositosplazo/delete">
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
