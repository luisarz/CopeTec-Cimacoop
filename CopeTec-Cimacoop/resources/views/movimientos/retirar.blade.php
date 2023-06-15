@extends('base.base')
@section('formName')
    <span id="lblSaldo" class="text-success fs-2">Seleccione Cuenta</span>
@endsection
@section('content')
    <form action="/movimientos/realizarretiro" method="POST" autocomplete="nope">
        {!! csrf_field() !!}
        <div class="input-group mb-5"></div>
        <input type="hidden" id="id_caja" name="id_caja" value="{{ $aperturaCaja }}">

        <div class="d-flex justify-content-center">
            <div class="card shadow-lg mx-auto">

                <div class="card shadow-lg">
                    <div class="card-header ribbon ribbon-end ribbon-clip">
                        <div class="card-toolbar">
                            <a href="/movimientos" cla>

                                <button type="button" class="btn btn-sm btn-light">
                                    <i class="ki-duotone ki-black-left-line  text-dark   fs-2x">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                    </i>
                                </button>
                            </a>

                        </div>
                        <div class="ribbon-label fs-3">
                            Nuevo Retiro
                            <span class="ribbon-inner bg-danger"></span>
                        </div>
                    </div>

                    <div class="card-body">

                        <!--begin::row group-->
                        <div class="form-group row mb-5">
                            <div class="form-floating col-lg-8">
                                <select name="id_cuenta" id="id_cuenta" required class="form-select "
                                    data-control="select2">
                                    <option value="">Seleccione Cuenta Origen</option>
                                    @foreach ($cuentas as $cuenta)
                                        <option value="{{ $cuenta->id_cuenta }}">{{ $cuenta->numero_cuenta }} ->
                                            {{ $cuenta->nombre }}
                                            -> {{ $cuenta->descripcion_cuenta }}

                                        </option>
                                    @endforeach
                                </select>
                                <label for="floatingPassword">Cuenta Origen</label>
                            </div>
                            <div class="form-floating col-lg-4">
                                <input type="text" required value="0.00" class="form-control text-success"
                                    name="saldo" id="saldo" placeholder="Saldo" aria-label="saldo"
                                    aria-describedby="basic-addon1" />
                                <label for="floatingPassword">Saldo Disponible</label>
                            </div>

                        </div>
                        <!--begin::row group-->

                        <div class="form-group row mb-5">
                            <div class="form-floating col-lg-12">
                                <input type="number" id="monto" required value="{{ old('monto') }}"
                                    class="form-control text-danger" name="monto" placeholder="Monto a depositar"
                                    aria-label="monto" aria-describedby="basic-addon1" />
                                <label>Monto Retirar:</label>
                            </div>
                            <div class="card-footer d-flex justify-content-center py-6">
                                <button type="submit" class="btn btn-block btn-bg-danger btn-text-white">
                                    <i class="ki-duotone ki-dollar    text-white fs-2x                   ">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                        <i class="path3"></i>
                                    </i>
                                    Realizar Retiro</button>
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

            $('#id_cuenta').on('change', function() {
                let id_cuenta = $(this).val();
                let url = '/cuentas/getcuenta/' + id_cuenta;
                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {
                        // opcion_seleccionada: id_cuenta
                    },
                    success: function(response) {
                        $('#saldo').val(response);
                        $("#lblSaldo").text("Saldo Disponible: " + response.toLocaleString(
                            undefined, {
                                useGrouping: true
                            }));
                        $("#monto").attr({
                            "max": response, // substitute your own
                            "min": 1 // values (or variables) here
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
