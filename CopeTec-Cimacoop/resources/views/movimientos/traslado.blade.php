@extends('base.base')
@section('formName')
    <span id="lblSaldo" class="text-success fs-2">Seleccione Cuenta</span>

@endsection
@section('content')
    <form action="/movimientos/recibirtraslado" method="POST" autocomplete="nope">
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
                            Reibir traslado de efectivo
                            <span class="ribbon-inner bg-success"></span>
                        </div>
                    </div>

                    <div class="card-body">

                        <!--begin::row group-->
                        <div class="form-group row mb-5">
                            <div class="form-floating col-lg-8">
                                <select name="id_bobeda_movimiento" id="id_bobeda_movimiento" required class="form-select "
                                    data-control="select2">
                                    <option value="">Seleccione El traslado a recibir</option>
                                    @foreach ($trasladoPendiente as $traslado)
                                        <option value="{{ $traslado->id_bobeda_movimiento }}">
                                            Traslado #{{ $traslado->id_bobeda_movimiento }}-->{{ $traslado->observacion }}

                                        </option>
                                    @endforeach
                                </select>
                                <label for="floatingPassword">Cuenta Origen</label>
                            </div>
                            <div class="form-floating col-lg-4">
                                <input type="text" required value="0.00" class="form-control text-success"
                                    name="monto" id="monto" placeholder="Saldo" aria-label="monto"
                                    aria-describedby="basic-addon1" />
                                <label for="floatingPassword">Monto a recibir</label>
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
            let tienePendiente = '{{ $tienePendientes }}';
            if (!tienePendiente == 0) {
                Swal.fire({
                    title: "Traslados Pendientes",
                    html: `No Tiene <strong>traslados</strong> pendientes de recibir Solicite a Bobeda uno antes de intentar recibir.
                <br>
                <a href="/movimientos" class="btn btn-info">Aceptar</a>
                `,
                    icon: "info",
                    showConfirmButton: false,

                    allowOutsideClick: false,

                });
            }


            $('#id_bobeda_movimiento').on('change', function() {
                let id = $(this).val();
                let url = '/movimientos/getTrasladoPendiente/' + id;
                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        let montoTransfiere = data.monto;
                        $('#monto').val(montoTransfiere);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
