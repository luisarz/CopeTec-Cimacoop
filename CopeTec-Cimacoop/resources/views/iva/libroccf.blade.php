@extends('base.base')

@section('formName')
@endsection

@section('content')
    <form action="/iva/facturas-contribuyente" method="post" autocomplete="off" target="_blank" >
        {!! csrf_field() !!}
        {{ method_field('POST') }}
        <div class="card shadow-lg mt-3">
            <div class="card-header ribbon ribbon-end ribbon-clip">
                <div class="card-toolbar">

                </div>

                <div class="ribbon-label fs-3">
                     <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;

                    IVA | Libro ventas Contribuyente
                    <span class="ribbon-inner bg-info"></span>
                </div>
            </div>


            <!--begin::Body-->
            <div class="card-body">
                <h3>Complete los siguientes parametros del informe</h3>
                <hr>
                <div class="form-group row mb-5">
                    <div class="form-floating col-lg-12">
                        <input type="hidden" name="encabezado" id="encabezado" class="form-control text-info"
                            placeholder="Ingrese el encabezado del reporte"
                            value="BALANCE DE COMPROBACION a fecha {{ date('d-m-Y') }}">
                    </div>


                </div>
                <div class="form-group row mb-5">
                    <div class="form-floating col-lg-6">
                        <input type="date" id="desde" name="desde" class="form-control" required
                            value="{{ date('Y-m-01') }}">

                        <label>Desde Inicial:</label>
                    </div>
                    <div class="form-floating col-lg-6">
                        <input type="date" id="hasta" name="hasta" class="form-control" required
                            value="{{ date('Y-m-d') }}">

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
                        Generar Libro de Ventas Consumidor
                    </button>
                </div>
                <!--end::Action-->
            </div>

        </div>
    </form>
@endsection
