@extends('base.base')

@section('formName')
@endsection

@section('content')
    <div class="card shadow-lg">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="card-toolbar">
                    <a href="/captaciones/plazos">

                        <button type="button"
                            class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
                            <i class="ki-duotone ki-black-left-line  text-dark   fs-2x">
                                <i class="path1"></i>
                                <i class="path2"></i>
                            </i>
                        </button>
                    </a>
                    &nbsp;

                {{-- </div>
            <div class="card-toolbar"> --}}
                <a href="/captaciones/tasas/add/{{ $id }}" class="btn btn-success"><i class="fa-solid fa-plus"></i>Nueva Tasa</a>
            </div>
            <div class="ribbon-label fs-3">
                <i class="ki-duotone ki-calendar text-white fs-3x"><span class="path1"></span><span
                        class="path2"></span><span class="path3"></span></i>
                Administracion de Tasas: &nbsp;
                <span class="badge badge-success fs-5"> Plazo {{ $plazo->descripcion }}</span>
                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>
        <div class="card-body">
            <table class="data-table-coop table table-hover table-row-dashed fs-6     gy-2 gs-5">
                <thead>
                    <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                        <th class="min-w-25px">Acciones</th>
                        <th class="min-w-300px">Descripcion</th>
                        <th class="min-w-300px">Interes</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasasEnPlazo as $tasa)
                        <tr>
                            <td>
                                <a href="/captaciones/tasas/edit/{{ $tasa->id_tasa }}" class="btn btn-info btn-sm"><i
                                        class="fa-solid fa-pencil text-white"></i> &nbsp; Modificar</a>
                            </td>
                            <td>{{ $tasa->descripcion }}</td>
                            <td>{{ $tasa->valor }} %</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $tasasEnPlazo->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>

@endsection

@section('scripts')
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script>
     
    </script>
@endsection
