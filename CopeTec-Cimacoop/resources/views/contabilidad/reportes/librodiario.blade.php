@extends('base.base')

@section('formName')
@endsection

@section('content')
    <form action="/contabilidad/Reporte/partidasdediario" method="post" autocomplete="off" target="_blank" >
        {!! csrf_field() !!}
        {{ method_field('POST') }}
        <div class="card shadow-lg mt-3">
            <div class="card-header ribbon ribbon-end ribbon-clip">
                <div class="card-toolbar">

                </div>

                <div class="ribbon-label fs-3">
                    <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;
                    | {{ Session::get('name_module') }}
                    <span class="ribbon-inner bg-info"></span>
                </div>
            </div>


            <!--begin::Body-->
            <div class="card-body">
                <h3>Complete los siguientes parametros del informe</h3>
                <hr>
                <div class="form-group row mb-5">
                </div>
                <div class="form-group row mb-5">
                    <div class="form-floating">
                        <input type="month" id="desde" name="desde" class="form-control" required
                            value="{{ date('Y-m') }}">

                        <label>Seleccionar Periodo</label>
                    </div>
                </div>

            </div>
            <!--end: Card Body-->
            <div class="card-footer">
                <!--begin::Action-->
                <div class="d-grid mb-10">
                    <button type="submit" class="btn btn-bg-info btn-text-white">
                        <i class="fa-solid fa-save fs-2 text-white"></i>
                        Generar Reporte
                    </button>
                </div>
                <!--end::Action-->
            </div>

        </div>
    </form>
@endsection
