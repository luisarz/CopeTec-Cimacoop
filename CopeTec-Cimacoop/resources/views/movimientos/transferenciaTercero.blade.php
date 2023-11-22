@extends('base.base')
@section('formName')
    <span id="lblSaldo" class="text-success fs-2">Seleccione Operación</span>

@endsection
@section('content')
    {{-- action="/movimientos/realizarTransferenciaTerceros" method="POST" --}}
    <form id="transferenciaForm" autocomplete="off">
        {!! csrf_field() !!}
        <div class="input-group mb-5"></div>
        <input type="hidden" id="id_caja" name="id_caja" value="{{ $aperturaCaja }}">

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
                        Realizar Transferencias entre Cuentas
                        <span class="ribbon-inner bg-info"></span>
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
                         <div class="form-floating col-lg-2">
                            <input type="text" required value="0.00" class="form-control text-success"
                                name="id_libreta" id="id_libreta" placeholder="Saldo" aria-label="monto" readonly
                                aria-describedby="basic-addon1" />
                            <label for="floatingPassword">Libreta</label>
                        </div>
                        <div class="form-floating col-lg-2">
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
                          <div class="form-floating col-lg-2">
                            <input type="text" required value="0.00" class="form-control text-success"
                                name="id_libreta_destino" id="id_libreta_destino" placeholder="Saldo" aria-label="monto" readonly
                                aria-describedby="basic-addon1" />
                            <label for="floatingPassword">Libreta Destino</label>
                        </div>
                        <div class="form-floating col-lg-2">
                            <input type="text" required class="form-control text-danger" name="monto" id="monto"
                                placeholder="Saldo" aria-label="monto" aria-describedby="basic-addon1" />
                            <label for="floatingPassword">Cantidad Transferir</label>
                        </div>
                    </div>
                    <!--begin::row group-->
                    <div class="form-group row mb-5">
                        <div class="form-floating col-lg-4">
                            <input type="text" required class="form-control text-danger" name="dui_transaccion"
                                id="dui_transaccion" placeholder="Saldo" />
                            <label for="floatingPassword">DUI</label>
                        </div>
                        <div class="form-floating col-lg-8">
                            <input type="text" required class="form-control text-danger text-bold" name="cliente_transaccion"
                                id="cliente_transaccion" placeholder="Saldo" />
                            <label for="floatingPassword">Cliente Transfiere</label>
                        </div>
                    </div>



                    <div id="error-container" class="alert alert-danger" style="display: none;"></div>

                </div>
                <div class="card-footer">
                    <div class="form-group row mb-5">
                        <div class="card-footer d-flex justify-content-center py-6">
                            <button type="submit" class="btn btn-block btn-bg-info btn-text-white">
                                <i class="ki-duotone ki-dollar    text-white fs-2x                   ">
                                    <i class="path1"></i>
                                    <i class="path2"></i>
                                    <i class="path3"></i>
                                </i>
                                Realizar Transferencia
                            </button>
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

            $("#transferenciaForm").on("submit", function(event) {
                event.preventDefault();

                let id_cuenta_origen = $("#id_cuenta_origen").val();
                let id_cuenta_destino = $("#id_cuenta_destino").val();
                if (id_cuenta_origen == id_cuenta_destino) {
                    Swal.fire({
                        title: 'Error',
                        text: 'No puede transferir a la misma cuenta',
                        icon: 'error',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        timer: 3000, // Tiempo en milisegundos (3 segundos en este caso)
                        timerProgressBar: true,
                        onBeforeOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    return false;
                }


                let id_movimiento = "";
                Swal.fire({
                    title: 'Cargando',
                    text: 'Por favor, espere...',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    }
                });
                var form = this;
                let url = "/movimientos/realizarTransferenciaTerceros";
                let formData = $(form).serialize();
                $.ajax({
                    url: url,
                    method: "post",
                    data: formData,
                    success: function(response) {
                        Swal.close();
                        if (response.success == false) {
                            $("#error-container").html(response.error);
                            $("#error-container").show();
                        } else {
                            id_movimiento = response.id_transaccion;
                            Swal.fire({
                                title: 'Transferencia Realizada',
                                text: 'La transferencia se realizó con éxito',
                                icon: 'success',
                                showConfirmButton: false,
                                allowOutsideClick: false,
                                timer: 3000, // Tiempo en milisegundos (3 segundos en este caso)
                                timerProgressBar: true,
                                onBeforeOpen: () => {
                                    Swal.showLoading();
                                }
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer ||
                                    result.dismiss === Swal.DismissReason.close) {
                                    window.open("/reportes/comprobanteMovimiento/" +
                                        id_movimiento, "_blank");

                                    window.location.href = "/movimientos";


                                }
                            });


                        }

                        // window.location.href = "/movimientos";
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        Swal.close();

                    }
                });
            });





            $('#id_cuenta_origen').on('change', function() {

                Swal.fire({
                    title: 'Cargando',
                    text: 'Por favor, espere...',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    }
                });

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
                        id_cuenta_destino.append(
                            '<option value="">Seleccione la cuenta destino</option>');

                        $("#saldo_disponible").val(response.saldo_disponible).val()
                        $("#id_libreta").val(response.id_libreta).val()

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
                        Swal.close();

                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                        Swal.close();

                    }
                });
            });

            
            $('#id_cuenta_destino').on('change', function() {

                Swal.fire({
                    title: 'Cargando',
                    text: 'Por favor, espere...',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    }
                });

                let id = $(this).val();
                let url = '/cuentas/getCuentasDisponibles/' + id;
                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        $("#id_libreta_destino").val(response.id_libreta).val()
                        Swal.close();

                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                        Swal.close();

                    }
                });
            });
        });
    </script>
