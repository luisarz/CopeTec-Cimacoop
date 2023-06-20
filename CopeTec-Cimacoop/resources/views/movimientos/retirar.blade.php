@extends('base.base')
@section('formName')
    Saldo Disponible: <span id="lblSaldo" class=" badge badge-info text-white fs-6"></span>
@endsection
@section('content')
    <form action="/movimientos/realizarretiro" id="trasladoform" target="_blank" method="POST" autocomplete="off">
        {!! csrf_field() !!}
        <div class="input-group mb-5"></div>
        <input type="hidden" id="id_caja" name="id_caja" value="{{ $aperturaCaja }}">

        <div class="d-flex justify-content-center">

            <div class="card shadow-lg">
                <div class="card-header ribbon ribbon-end ribbon-clip">
                    <div class="card-toolbar">
                        <a href="/movimientos" cla>

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
                        Nuevo Retiro
                        <span class="ribbon-inner bg-danger"></span>
                    </div>
                </div>

                <div class="card-body">

                    <!--begin::row group-->
                    <div class="form-group row mb-5">
                        <div class="form-floating col-lg-8">
                            <select name="id_cuenta" id="id_cuenta" required class="form-select " data-control="select2">
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
                            <input type="text" required value="0.00" class="form-control text-success" name="saldo"
                                id="saldo" placeholder="Saldo" aria-label="saldo" aria-describedby="basic-addon1" />
                            <label for="floatingPassword">Saldo Disponible</label>
                        </div>

                    </div>
                    <!--begin::row group-->
                    <div class="form-group row mb-5">
                        <div class="form-floating col-lg-12">
                            <input type="number" id="monto" step="any" required value="{{ old('monto') }}"
                                class="form-control text-danger" name="monto" placeholder="Monto a depositar"
                                aria-label="monto" aria-describedby="basic-addon1" />
                            <label>Monto Retirar:</label>
                        </div>
                    </div>
                     <!--begin::row group-->
                    <div class="form-group row mb-5">
                        <div class="form-floating col-lg-12">
                            <input type="text" id="cliente_transaccion"  required value="{{ old('cliente_transaccion') }}"
                                class="form-control text-danger" name="cliente_transaccion" placeholder="Cliente Retira"
                                aria-label="cliente_transaccion" aria-describedby="basic-addon1" />
                            <label>Cliente Retira:</label>
                        </div>
                    </div>
                     <!--begin::row group-->
                    <div class="form-group row mb-5">
                        <div class="form-floating col-lg-12">
                            <input type="text" id="dui_transaccion" required  value="{{ old('dui_transaccion') }}"
                                class="form-control text-danger" name="dui_transaccion" placeholder="Dui de persona que retira"
                                aria-label="dui_transaccion" aria-describedby="basic-addon1" />
                            <label>DUI:</label>
                        </div>
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
                    @if ($errors->has('dui_cliente'))
                        <div class="alert alert-danger">
                            {{ $errors->first('dui_cliente') }}
                        </div>
                    @endif
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

            $("#trasladoform").on("submit", function(event) {
                this.submit();
                setTimeout(function() {
                    window.location.href = "/movimientos";
                }, 1000);
            });

            $('#id_cuenta').on('change', function() {
                let id_cuenta = $(this).val();
                if (id_cuenta == "") {
                    $('#saldo').val(0.0);
                    $("#lblSaldo").text('Seleccione Cuenta');
                    return;
                }
                let url = '/cuentas/getcuenta/' + id_cuenta;
                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {
                        // opcion_seleccionada: id_cuenta
                    },
                    success: function(response) {
                        $('#saldo').val(response.saldo_cuenta_sin_formato);
                        $("#lblSaldo").text('$' + response.saldo_cuenta_formateado);
                        $("#monto").attr({
                            "max": response
                            .saldo_cuenta_sin_formato, // substitute your own
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
