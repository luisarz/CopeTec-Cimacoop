@extends('base.base')
@section('title')
    Modificar Proveedor
@endsection
@section('content')
    <form action="/proveedores/put" method="post" autocomplete="off">
        <input hidden name="id_proveedor" value="{{ $proveedor->id_proveedor }}">
        {!! csrf_field() !!}
         {{ method_field('PUT') }}
        <div class="input-group mb-5"></div>

        <div class="card shadow-lg">
            <div class="card-header ribbon ribbon-end ribbon-clip">
                <div class="card-toolbar">
                    <a href="/proveedores/list">

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
                    <i class="ki-duotone ki-shield-tick text-white fs-2x"><span class="path1"></span><span
                            class="path2"></span><span class="path3"></span></i>
                 Modificar Proveedor
                    <span class="ribbon-inner bg-danger"></span>
                </div>
            </div>
            <div class="card-body">

                <!--begin::row group-->
                <div class="form-group row mb-5">
                    <div class="form-floating col-lg-6">
                        <input type="text" name="razon_social" class="form-control" required value="{{ $proveedor->razon_social }}">
                        <label for="floatingPassword">Razon Social</label>
                    </div>
                    <div class="form-floating col-lg-2">
                        <input type="text" name="dui" class="form-control" value="{{ $proveedor->dui }}">
                        <label>DUI</label>
                    </div>
                    <div class="form-floating col-lg-2">
                        <input type="text" name="nit" class="form-control" value="{{ $proveedor->nit }}">
                        <label>NIT</label>
                    </div>
                    <div class="form-floating col-lg-2">
                        <input type="text" name="nrc" class="form-control" value="{{ $proveedor->nrc }}">
                        <label>NRC</label>
                    </div>
                </div>
                 <!--begin::row group-->
                <div class="form-group row mb-5">
                    <div class="form-floating col-lg-4">
                        <input type="text" name="direccion" class="form-control"  value="{{ $proveedor->direccion }}">
                        <label for="floatingPassword">Direccion</label>
                    </div>
                    <div class="form-floating col-lg-4">
                        <input type="text" name="telefono" class="form-control"  value="{{ $proveedor->telefono }}">
                        <label>Telefono</label>
                    </div>
                     <div class="form-floating col-lg-4">
                        <input type="number"  min="2" name="decimales" class="form-control"  value="0.00" value="{{ $proveedor->decimales }}">
                        <label>Decimales</label>
                    </div>
                </div>
              
                

            </div>
            <div class="card-footer d-flex justify-content-center py-6">
                <button type="submit" class="btn btn-bg-primary btn-text-white">Modificar</button>
            </div>
        </div>

    </form>
@endsection
@section('scripts')
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <script src=" {{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#id_tipo_cuenta').on('change', function() {
                let id_tipo_cuenta = $(this).val();
                let url = '/intereses/getIntereses/' + id_tipo_cuenta;
                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {
                        opcion_seleccionada: id_tipo_cuenta
                    },
                    success: function(response) {
                        $('#id_interes_tipo_cuenta').empty();
                        $.each(response, function(index, interes) {
                            $('#id_interes_tipo_cuenta').append($('<option>', {
                                value: interes.id_intereses_tipo_cuenta,
                                text: interes.interes
                            }));
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
