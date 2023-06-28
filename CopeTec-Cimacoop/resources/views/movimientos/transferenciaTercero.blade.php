@extends('base.base')
@section('formName')
    <span id="lblSaldo" class="text-success fs-2">Seleccione Operación</span>

@endsection
@section('content')
    <form action="/movimientos/realizarTransferenciaTerceros" target="_blank" method="POST" id="transferenciaForm"
        autocomplete="off">
        {!! csrf_field() !!}
        <div class="input-group mb-5"></div>
        <input type="hidden" id="id_caja" name="id_caja" value="{{ $aperturaCaja }}">

        <div class="d-flex justify-content-center">
            <div class="card shadow-lg mx-auto">

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
                            Realizar Transferencia a Terceros
                            <span class="ribbon-inner bg-success"></span>
                        </div>
                    </div>

                    <div class="card-body">

                        <!--begin::row group-->
                        <div class="form-group row mb-5">
                            <div class="form-floating col-lg-8">
                                <select name="id_cuenta_origen" id="id_cuenta_origen" required class="form-select "
                                    data-control="select2">
                                    <option value="">Seleccione La Cuenta Origen</option>
                                    @foreach ($cuentas as $cuenta)
                                        <option value="{{ $cuenta->id_cuenta }}">{{ $cuenta->numero_cuenta }} ->
                                            {{ $cuenta->nombre }}
                                            -> {{ $cuenta->descripcion_cuenta }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingPassword">Cuenta Origen</label>
                            </div>
                            <div class="form-floating col-lg-4">
                                <input type="text" required value="0.00" class="form-control text-success"
                                    name="saldo_disponible" id="saldo_disponible" placeholder="Saldo" aria-label="monto"
                                    aria-describedby="basic-addon1" />
                                <label for="floatingPassword">Saldo Disponible</label>
                            </div>

                        </div>
                        <!--begin::row group-->
                        <div class="form-group row mb-5">
                            <div class="form-floating col-lg-8">
                                <select name="id_cuenta_destino" id="id_cuenta_destino" required class="form-select "
                                    data-control="select2">
                                    <option value="">Seleccione la cuenta destino</option>

                                </select>
                                <label for="floatingPassword">Cuenta Destino</label>
                            </div>
                            <div class="form-floating col-lg-4">
                                <input type="text" required class="form-control text-success"
                                    name="monto" id="monto" placeholder="Saldo" aria-label="monto"
                                    aria-describedby="basic-addon1" />
                                <label for="floatingPassword">Cantidad Transferir</label>
                            </div>
                        </div>



                        @if ($errors->has('dui_cliente'))
                            <div class="alert alert-danger">
                                {{ $errors->first('dui_cliente') }}
                            </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="form-group row mb-5">
                            <div class="card-footer d-flex justify-content-center py-6">
                                <button type="submit" class="btn btn-block btn-bg-success btn-text-white">
                                    <i class="ki-duotone ki-dollar    text-white fs-2x                   ">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                        <i class="path3"></i>
                                    </i>
                                    Recibir a Traslado</button>
                            </div>
                        </div>
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

            $("#trasladoForm").on("submit", function(event) {
                this.submit();
                setTimeout(function() {
                    window.location.href = "/movimientos";
                }, 1000);
            });


       

            $('#id_cuenta_origen').on('change', function() {
                let id = $(this).val();
                let url = '/cuentas/getCuentasDisponibles/' + id;
                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        let id_cuenta_destino = $("#id_cuenta_destino");
                        id_cuenta_destino.empty();

                        $("#saldo_disponible").val(response.saldo_disponible).val()

                        $("#monto").attr({
                            "max": response
                            .saldo_cuenta_sin_formato, // substitute your own
                            "min": 1 // values (or variables) here
                        });


                        $.each(response.cuentas, function(index, obj) {
                            id_cuenta_destino.append('<option value="' + obj.id_cuenta +
                                '">' +
                                obj.numero_cuenta + ' -> ' + obj.nombre_cliente +
                                ' -> ' + obj.tipo_cuenta + '</option>');

                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
