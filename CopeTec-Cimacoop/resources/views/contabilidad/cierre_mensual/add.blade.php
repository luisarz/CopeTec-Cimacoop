@extends('base.base')
@section('title')
    Editar Rol
@endsection
@section('content')
    <div class="card card-bordered shadow-lg mt-5">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="card-toolbar">
                <a href="/contabilidad/cierre-mensual">

                    <button type="button"
                        class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
                        <i class="ki-duotone ki-black-left-line  text-dark   fs-2x">
                            <i class="path1"></i>
                            <i class="path2"></i>
                        </i>
                    </button>
                </a>

            </div>
            <div class="ribbon-label fs-3">
                <i class="ki-duotone ki-calendar text-white fs-3x"><span class="path1"></span><span
                        class="path2"></span><span class="path3"></span></i> &nbsp;
                Nuevo - Cierre Contable Mensual
                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>
        <div class="card-body">



            <!--begin::row group-->
            <div class="form-group row mb-5 justify-content-center">
                <div class="form-floating col-lg-4">
                    <select class="form-select form-select-solid" name="mes" id="mes" data-control="">
                            <option value="">SELECCIONE EL MES A CERRAR</option>

                        @foreach ($meses as $numero => $nombre)
                            <option value="{{ $numero }}">{{ $nombre }}</option>
                        @endforeach
                    </select>

                    <label>SELECCIONE EL MES:</label>
                </div>

                <div class="form-floating col-lg-4">
                    <select class="form-select form-select-solid" name="year" id="year" data-control="">
                            <option value="">SELECCIONE EL AÑO A CERRAR</option>

                        @foreach ($anios as $numero => $nombre)
                            <option value="{{ $numero }}">{{ $nombre }}</option>
                        @endforeach
                    </select>

                    <label>SELECCIONE EL AÑO:</label>
                </div>



            </div>
            <div class="form-group  row mb-5">
                <button id="btnCerrarMes" class="btn btn-danger">
                    <span class="indicator-label" disabled>Cerrar Mes Contable</span>

                </button>
            </div>

        </div>

    </div>
@endsection
@section('scripts')
    <link href=" {{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/app/contabilidad/cerrar-mes.js') }}"></script>

    <script></script>
@endsection
