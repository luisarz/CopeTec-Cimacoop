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
    <div class="card shadow-lg">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="card-toolbar">
                <a href="/contabilidad/partidas/add" class="btn btn-info">
                    <i class="ki-outline ki-add-item fs-3"></i>
                    Nueva
                </a>


                <div class="d-flex align-items-center border-active-dark ">
                    <form action="/partidas/catalogo" method="post" autocomplete="off" class="d-flex align-items-center">
                        {!! csrf_field() !!}
                        {{ method_field('POST') }}
                        <!--start::Input group-->
                        <div class="position-relative w-md-350px me-md-2">
                            <i
                                class="ki-outline ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6">
                            </i>
                            <input type="text" class="form-control form-control-solid ps-10" name="filtro"
                                value="" placeholder="Numero de cuenta,  Cuenta o código">
                        </div>
                         <div class="position-relative w-md-200px me-md-2">
                            <i
                                class="ki-outline ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6">
                            </i>
                            <input type="date" class="form-control form-control-solid ps-10" name="filtro"
                                value="" placeholder="Numero de cuenta,  Cuenta o código">
                        </div>
                        <!--begin:Action-->
                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-info me-5">Buscar</button>
                        </div>
                        <!--end:Action-->
                    </form>
                </div>
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
                            <th class="min-w-100px">Acciones</th>
                            <th class="min-w-100px text-center">PARTIDA</th>
                            <th class="min-w-100px text-center">TIPO PARTIDA</th>
                            <th class="min-w-50px">FECHA</th>
                            <th class="min-w-150px text-center">CONCEPTO</th>
                            <th class="min-w-100px text-rigth" style="text-align: right">MONTO</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cuentas as $partida)
                            <tr>
                                <td>
                                    <a href="/contabilidad/partidas/edit/{{ $partida->id_partida_contable }}"
                                        class="btn btn-info btn-sm w-30">
                                        <i class="ki-outline ki-pencil fs-4"></i> </a>

                                    <a href="/contabilidad/catalogo/{{ $partida->id_partida_contable }}/beneficiarios"
                                        class="btn btn-success btn-sm w-30">
                                        <i class="ki-outline ki-security-user   fs-4"></i>
                                    </a>

                                    <a href="javascript:alertDelete({{ $partida->id_partida_contable }})"
                                        class="btn btn-danger btn-sm w-30">
                                        <i class="ki-outline ki-cross-circle   fs-4"></i>
                                    </a>

                                </td>
                               <td style="text-align: right">
                                   <span class="badge badge-light-info fs-5">
                                     {{ str_pad( $partida->num_partida,10,0,STR_PAD_LEFT) }}


                                    </span> -
                                     <span class="badge badge-light-danger fs-5">{{ $partida->year_contable }}</span> 
                                    </td>
                                <td class="text-center">
                                    {{  $partida->descripcion }}
                                </td>
                                <td>{{ date('d-m-Y',strtotime($partida->fecha_partida))  }}</td>
                              
                                <td style="text-align: center">
                                    {{ Str::limit($partida->concepto, 20) }}

                                </td>

                               
                                 <td style="text-align: right">
                                    $ {{ number_format($partida->monto, 2) }}
                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $cuentas->appends(['filtro' => $filtro])->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>

    <form method="post" id="deleteForm" action="/contabilidad/partidas/delete">
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
