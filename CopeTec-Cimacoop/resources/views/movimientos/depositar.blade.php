@extends('base.base')
@section('title')
    Agregar Cliente
@endsection
@section('content')
    <form action="/movimientos/realizardeposito" id="depositoform" target="_blank" method="POST" autocomplete="nope">
        {!! csrf_field() !!}
        <div class="input-group mb-5"></div>
        <input type="hidden" id="id_caja" name="id_caja" value="{{ $aperturaCaja }}">

        <div class="d-flex justify-content-center">
            <div class="card shadow-lg mx-auto">

                <div class="card shadow-lg">
                    <div class="card-header ribbon ribbon-end ribbon-clip">
                        <div class="card-toolbar">
                            <a href="/movimientos" cla>

                                <button type="button" class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
                                    <i class="ki-duotone ki-black-left-line  text-dark   fs-2x">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                    </i>
                                </button>
                            </a>

                        </div>
                        <div class="ribbon-label fs-3">
                            Nuevo Deposito
                            <span class="ribbon-inner bg-success"></span>
                        </div>
                    </div>

                    <div class="card-body">

                        <!--begin::row group-->
                        <div class="form-group row mb-5">
                            <div class="form-floating col-lg-12">
                                <select name="id_cuenta" required class="form-select " data-control="select2">
                                    <option value="">Seleccione Cuenta destino</option>
                                    @foreach ($cuentas as $cuenta)
                                        <option value="{{ $cuenta->id_cuenta }}">{{ $cuenta->numero_cuenta }} ->
                                            {{ $cuenta->nombre }}
                                            -> {{ $cuenta->descripcion_cuenta }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingPassword">Cuenta Destino</label>
                            </div>

                        </div>
                        <!--begin::row group-->

                        <div class="form-group row mb-5">
                            <div class="form-floating col-lg-12">
                                <input type="number" required value="{{ old('monto') }}" class="form-control"
                                    name="monto" placeholder="Monto a depositar" aria-label="monto"
                                    aria-describedby="basic-addon1" />
                                <label>Monto deposito:</label>
                            </div>
                            <div class="card-footer d-flex justify-content-center py-6">
                                <button type="submit" class="btn btn-bg-success btn-text-white">
                                    <i class="ki-duotone ki-dollar    text-white fs-2x                   ">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                        <i class="path3"></i>
                                    </i>
                                    Realizar Deposito</button>
                            </div>
                        </div>

                        @if ($errors->has('dui_cliente'))
                            <div class="alert alert-danger">
                                {{ $errors->first('dui_cliente') }}
                            </div>
                        @endif
                    </div>
                </div>
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

            
            $("#depositoform").on("submit", function(event) {
                this.submit();
                setTimeout(function() {
                    window.location.href = "/movimientos";
                }, 1000);
            });

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
