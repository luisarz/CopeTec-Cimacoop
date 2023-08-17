@extends('base.base')

@section('formName')
@endsection

@section('content')
    <form action="/contabilidad/Reportes/historicodecuenta" method="post" autocomplete="off">
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
                <div class="form-floating col-lg-6">
                    <input type="text" name="encabezado" id="encabezado" class="form-control" 
                        placeholder="Ingrese el encabezado del reporte">
                    <label>ENCABEZADO:</label>
                </div>
                <div class="form-floating col-lg-6">
                    <select class="form-select " name="id_cuenta" id="id_cuenta" data-control="select2" required>
                            <option value="">Seleccione la cuenta a generar reporte</option>
                    
                        @foreach ($cuentas as $cuenta)
                            <option value="{{ $cuenta->id_cuenta }}">{{ $cuenta->numero }}-->{{ $cuenta->descripcion }}
                            </option>
                        @endforeach
                    </select>
                    <label>TIPO CUENTA:</label>
                </div>
            </div>
            <div class="form-group row mb-5">
                <div class="form-floating col-lg-6">
                    <input type="date" id="desde" name="desde" class="form-control" required>


                    <label>Periodo Inicial:</label>
                </div>
                <div class="form-floating col-lg-6">
                    <input type="date" id="hasta" name="hasta" class="form-control" required>


                    <label>Periodo Inicial:</label>
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

