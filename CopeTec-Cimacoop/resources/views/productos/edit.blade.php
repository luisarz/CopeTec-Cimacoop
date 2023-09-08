@extends('base.base')
@section('title')
    Agregar Cliente
@endsection
@section('content')
    <form action="/productos/add" method="post" autocomplete="off">
        <input hidden name="id_producto" value="{{ $producto->id_producto }}">
        {!! csrf_field() !!}
        <div class="input-group mb-5"></div>

        <div class="card shadow-lg">
            <div class="card-header ribbon ribbon-end ribbon-clip">
                <div class="card-toolbar">
                    <a href="/productos/list">

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
                  Nuevo Prodúcto

                    <span class="ribbon-inner bg-danger"></span>
                </div>
            </div>
            <div class="card-body">

                <!--begin::row group-->
                <div class="form-group row mb-5">
                    <div class="form-floating col-lg-8">
                        <input type="text" name="nombre" class="form-control" required value="{{ $producto->nombre }}">
                        <label for="floatingPassword">Producto</label>
                    </div>
                    <div class="form-floating col-lg-4">
                        <input type="text" name="cod_barra" class="form-control">

                        <label>Código de Barra</label>
                    </div>
                </div>
                 <!--begin::row group-->
                <div class="form-group row mb-5">
                    <div class="form-floating col-lg-4">
                        <input type="text" name="presentacion" class="form-control" required value="{{ $producto->presentacion }}">
                        <label for="floatingPassword">Presentación</label>
                    </div>
                    <div class="form-floating col-lg-4">
                        <input type="text" name="marca" class="form-control" required value="{{ $producto->marca }}">
                        <label>Marca</label>
                    </div>
                     <div class="form-floating col-lg-4">
                        <input type="number" step="any" min="0" name="costo" class="form-control" required value="0.00" value="{{ $producto->costo }}">
                        <label>Costo</label>
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
