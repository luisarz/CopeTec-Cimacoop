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
    <div class="card shadow-lg mt-5">
        <div class="card-header ribbon ribbon-end ribbon-clip ">
            <div class="card-toolbar">


                <div class="d-flex align-items-center border-active-dark">
                    <form action="contabilidad/partidas" method="post" autocomplete="off" class="d-flex align-items-center">
                        {!! csrf_field() !!}
                        {{ method_field('POST') }}
                        <!--start::Input group-->
                        <div class="position-relative w-md-300px me-md-2">
                            <i
                                class="ki-outline ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6"></i>
                            <input type="text" class="form-control form-control-solid ps-10" name="filtro"
                                value="{{ old('filtro') }}" placeholder="Numero de cuenta,  Cuenta o código">
                        </div>
                        <div class="position-relative w-md-200px me-md-2">
                            <i
                                class="ki-outline ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6"></i>
                            <input type="date" class="form-control form-control-solid ps-10" name="fecha_partida"
                                value="{{ old('fecha_partida', date('Y-m-d')) }}" placeholder="Fecha de partida">
                        </div>
                        <!--begin:Action-->
                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-info me-5">Buscar</button>
                        </div>
                        <!--end:Action-->
                    </form>
                    <a href="/contabilidad/partidas/add" class="btn btn-success">
                        <i class="ki-outline ki-add-item fs-3"></i>
                        Nueva
                    </a>
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
                <table class="table table-hover table-striped table-row-dashed fs-5 gy-1 gs-1">
                    <thead>
                        <tr class="fw-semibold fs-5 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="min-w-100%">Acciones</th>
                            <th class="min-w-50px text-center">Procesada</th>
                            <th class="min-w-50px text-center">PARTIDA</th>
                            <th class="min-w-50px text-center">TIPO PARTIDA</th>
                            <th class="min-w-50px">FECHA</th>
                            <th class="min-w-600px text-left">CONCEPTO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cuentas as $partida)
                            <tr>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info btn-flex btn-center"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">
                                        Acciones
                                        <i class="ki-outline ki-dots-vertical fs-2"></i>
                                    </a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-175px py-3"
                                        data-kt-menu="true" style="">
                                        @if($partida->estado==2)
                                         <div class="menu-item px-3">
                                                    <a href="/reportes/partidaContable/{{ $partida->id_partida_contable }}"
                                                        target="_blank" class="menu-link px-3">
                                                        <i class="ki-outline ki-printer fs-3"></i>
                                                        <span class="px-2"> Imprimir partida</span>
                                                    </a>
                                                </div>
                                           @else
                                               
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-2">
                                                    <a href="/contabilidad/partidas/edit/{{ $partida->id_partida_contable }}"
                                                        class="menu-link px-3">
                                                        <i class="ki-outline ki-pencil fs-3"></i>
                                                        <span class="px-2"> Editar</span>
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="/reportes/partidaContable/{{ $partida->id_partida_contable }}"
                                                        target="_blank" class="menu-link px-3">
                                                        <i class="ki-outline ki-printer fs-3"></i>
                                                        <span class="px-2"> Imprimir partida</span>
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="javascript:alertDelete('{{ $partida->id_partida_contable }}')"
                                                        class="menu-link px-3">
                                                        <i class="ki-outline ki-cross-circle fs-3"></i>
                                                        <span class="px-2 badge badge-light-danger"> Eliminar partida</span>
                                                    </a>
                                                </div>
                                                <!--end::Menu item--> 
                                          @endif
                                    </div>
                                    <!-- ... Rest of the code ... -->
                                </td>
                                <td>
                                    @if ($partida->estado == 2)
                                    <span class="badge badge-light-success">Procesada</span>
                                    @else
                                    <span class="badge badge-light-danger">Pendiente</span>
                                    @endif

                                </td>
                                <td style="text-align: left">
                                    <span class="badge badge-light-info fs-5">
                                        {{ $partida->num_partida }}
                                        {{-- {{ str_pad($partida->num_partida, 10, 0, STR_PAD_LEFT) }} --}}

                                    </span>
                                    {{-- <span class="badge badge-light-danger fs-5">{{ $partida->year_contable }}</span> --}}
                                </td>
                                <td class="text-center">
                                    {{ $partida->descripcion }}
                                </td>
                                <td>{{ date('d-m-Y', strtotime($partida->fecha_partida)) }}</td>
                                <td>
                                    {{ $partida->concepto }}
                                    {{-- {{ Str::limit($partida->concepto, 50) }} --}}

                                </td>

                            </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No se encontraron partidas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $cuentas->appends(['filtro' => $filtro, 'fecha_partida' => $fecha_partida])->links('vendor.pagination.bootstrap-5') }}
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
                // ... Rest of the code ...
            }
        </script>
    @endsection
