@extends('base.base')
@section('title')
    Editar Cliente
@endsection
@section('content')
    <form action="/bobeda/recibirTransferencia" id="recibirTrasladoForm" target="_blank" method="POST" autocomplete="nope">
        {!! csrf_field() !!}
        <input type="hidden" id="id_movimiento" name="id_movimiento">
        <div class="input-group mb-5"></div>
        <div class="d-flex justify-content-center">
            <div class="card shadow-lg mx-auto">

                <div class="card shadow-lg">
                    <div class="card-header ribbon ribbon-end ribbon-clip">
                        <div class="card-toolbar">
                            <a href="/bobeda" cla>

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
                            Recibir Transferencia de Caja
                            <span class="ribbon-inner bg-success"></span>
                        </div>
                    </div>

                    <div class="card-body">

                        <!--begin::row group-->
                        <div class="form-group row mb-5">
                            <div class="form-floating col-lg-8">
                                <select name="id_caja" id="id_caja" required class="form-select " data-control="select2">
                                    <option value="">Seleccione La Caja de Origen</option>
                                    @foreach ($cajas as $caja)
                                        <option value="{{ $caja->id_caja }}">{{ $caja->numero_caja }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="floatingPassword">Cuenta Origen</label>
                            </div>
                            <div class="form-floating col-lg-4">
                                <input type="text" required readonly value="0.00" min="0.01"
                                    class="form-control text-success" name="monto_envia" id="monto_envia"
                                    placeholder="monto_envia" aria-label="monto_envia" aria-describedby="basic-addon1" />
                                <label for="floatingPassword">Monto envia</label>
                            </div>

                        </div>
                        <!--begin::row group-->
                        <div class="form-group row mb-5">
                            <div class="form-floating col-lg-12">
                                <input type="number" id="monto" step="any" required value="{{ old('monto') }}"
                                    class="form-control text-danger" name="monto" placeholder="Monto a depositar"
                                    aria-label="monto" aria-describedby="basic-addon1" />
                                <label>Monto Recibe:</label>
                            </div>

                        </div>

                    </div>
                    <div class="card-footer d-flex justify-content-center py-6">
                        <button type="submit" class="btn btn-block btn-bg-success btn-text-white">
                            <i class="ki-duotone ki-dollar    text-white fs-2x                   ">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                            </i>
                            Recibir Transferencia</button>
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

            $("#recibirTrasladoForm").on("submit", function(event) {
                this.submit();
                setTimeout(function() {
                    window.location.href = "/bobeda";
                }, 1000);
            });

            $('#id_caja').on('change', function() {
                let id = $(this).val();
                $('#monto_envia').val(0.00);
                $('#monto').val(0.00);
                let url = '/bobeda/getTrasladoPendiente/' + id;
                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        let montoTransfiere = data.monto;
                        $('#monto_envia').val(montoTransfiere);
                        $('#monto').val(montoTransfiere);
                        $("#id_movimiento").val(data.id_movimiento);
                        if (typeof montoTransfiere === "undefined") {
                            Swal.fire({
                                title: '¡Error!',
                                text: 'La caja seleccionada no tiene monto disponible para transferir',
                                icon: 'error',
                                timer: 1500, // Tiempo en milisegundos (1.5 segundos)
                                timerProgressBar: true, // Muestra una barra de progreso durante el tiempo de cierre
                                showConfirmButton: false // No muestra el botón de confirmación
                            });
                        }


                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
