@extends('base.base')
@section('title')
    Agregar Cliente
@endsection
@section('content')
    <form action="/cuentas/add" method="post" autocomplete="off">
        {!! csrf_field() !!}
        <div class="input-group mb-5"></div>

        <div class="card shadow-lg">
            <div class="card-header ribbon ribbon-end ribbon-clip">
                <div class="card-toolbar">
                    <a href="/cuentas">

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
                    {{-- {{ $cajaAperturada->numero_caja }} --}}
                    Aperturar Nueva Cuenta

                    <span class="ribbon-inner bg-danger"></span>
                </div>
            </div>
            <div class="card-body">


                <!--begin::row group-->
                <div class="form-group row mb-5">
                    <div class="form-floating col-lg-8">
                        <select name="id_asociado" required data-control="select2" class="form-select">
                            <option value="">Seleccione un asociado</option>
                            @foreach ($asociados as $asociado)
                                <option value="{{ $asociado->id_asociado }}">{{ $asociado->nombre }} ->
                                    {{ $asociado->dui_cliente }}</option>
                            @endforeach
                        </select>
                        <label for="floatingPassword">Asociado</label>
                    </div>
                    <div class="form-floating col-lg-4">
                        <input type="date" required value="{{ old('fecha_apertura') }}" max="{{ date('Y-m-d') }}"
                            class="form-control" name="fecha_apertura" placeholder="fecha_nacimiento"
                            aria-label="fecha_apertura" aria-describedby="basic-addon1" />
                        <label>Fecha Apertura:</label>
                    </div>
                </div>
                <!--begin::row group-->
                <div class="form-group row mb-5">
                   
                    <div class="form-floating col-lg-3">
                        <select name="id_tipo_cuenta" id="id_tipo_cuenta" required data-control="select2"
                            class="form-select">
                            <option value="">Seleccione el tipo de producto </option>
                            @foreach ($tiposcuentas as $tipoCuenta)
                                <option value="{{ $tipoCuenta->id_tipo_cuenta }}">
                                    {{ $tipoCuenta->descripcion_cuenta }}
                                </option>
                            @endforeach
                        </select>
                        <label>Tipo de Cuenta:</label>
                    </div>
                     <div class="form-floating col-lg-3">
                        <select name="id_interes_tipo_cuenta" id="id_interes_tipo_cuenta" required data-control="select2"
                            class="form-select">
                        </select>
                        <label>Interes aplicar:</label>
                    </div>
                   
                   

            
                      <div class="form-floating col-lg-3">

                        <input type="text" required value="{{ old('numero_cuenta') }}" class="form-control text-danger form-control-solid"
                            name="numero_cuenta" id="numero_cuenta" placeholder="Numero de cuenta" aria-label="numero_cuenta"
                            aria-describedby="basic-addon1" is-valid />
                        <label for="floatingPassword">Numero cuenta:</label>
                    </div>
                    <div class="form-floating col-lg-3">
                        <input type="number" step="any" required value="{{ old('monto_apertura') }}" class="form-control text-danger"
                            name="monto_apertura" placeholder="monto_apertura" aria-label="dui"
                            aria-describedby="basic-addon1" />
                        <label>Monto Apertura:</label>
                    </div>
                </div>

                @if ($errors->has('dui_cliente'))
                    <div class="alert alert-danger">
                        {{ $errors->first('dui_cliente') }}
                    </div>
                @endif
            </div>
            <div class="card-footer d-flex justify-content-center py-6">
                <button type="submit" class="btn btn-bg-primary btn-text-white">Aperturar Nueva Cuenta</button>
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
                        let numeroCuenta=response.numero_cuenta;
                        $('#numero_cuenta').val(numeroCuenta);
                        $.each(response[0], function(index, interes) {
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
