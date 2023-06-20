@extends('base.base')
@section('formName')
    <span id="lblSaldo" class="text-success fs-2">Seleccione Operación</span>

@endsection
@section('content')
    <form action="/movimientos/realizarTransferenciaBobeda" id="transferenciForm" method="POST" target="_blank" autocomplete="off">
        {!! csrf_field() !!}
        <div class="input-group mb-5"></div>
        <input type="hidden" id="id_caja" name="id_caja" value="{{ $cajas->id_caja }}">

        <div class="d-flex  justify-content-center">
            <div class="card shadow-lg w-lg-500px">
                <div class="card-header ribbon ribbon-end ribbon-clip">
                    <div class="card-toolbar">
                        <a href="/movimientos">
                            <button type="button" class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
                                <i class="ki-duotone ki-black-left-line  text-dark   fs-2x">
                                    <i class="path1"></i>
                                    <i class="path2"></i>
                                </i>
                            </button>
                        </a>

                    </div>
                    <div class="ribbon-label fs-3">
                        Traslado a Bobeda
                        <span class="ribbon-inner bg-success"></span>
                    </div>
                </div>

                <div class="card-body">

                    <!--begin::row group-->
                    <div class="form-group row mb-2">
                        <div class="form-floating col-lg-7">
                            <select name="id_bobeda_movimiento" id="id_bobeda_movimiento" required class="form-select "
                                data-control="select2">
                                <option value="{{ $cajas->id_caja }}">{{ $cajas->numero_caja }}</option>
                            </select>
                            <label for="floatingPassword">Caja Origen</label>
                        </div>
                        <div class="form-floating col-lg-5">
                            <input type="text" required value="{{ $cajas->saldo }}" class="form-control text-success"
                                name="saldo_diponible" id="saldo_diponible" placeholder="saldo_diponible" aria-label="saldo_diponible"
                                aria-describedby="basic-addon1" />
                            <label for="floatingPassword">Saldo Disponible</label>
                        </div>
                    </div>
                    <!--begin::row group-->
                    <div class="form-group row mb-2">
                        <div class="form-floating col-lg-12">
                            <input type="number" step="any" max="{{ $cajas->saldo }}" value="{{ $cajas->saldo }}"
                                class="form-control text-danger" name="monto" id="monto" placeholder="Saldo"
                                aria-label="monto" aria-describedby="basic-addon1" />
                            <label for="floatingPassword">Monto a transferir Disponible</label>
                        </div>
                    </div>
                             <!--begin::row group-->
                    <div class="form-group row mb-2">
                        <div class="form-floating col-lg-12">
                            <input required type="text" 
                                class="form-control text-danger" name="observacion" id="observacion" placeholder="Saldo"
                                aria-label="monto" aria-describedby="basic-addon1" />
                            <label for="floatingPassword">Observacion</label>
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
                            Enviar a Bobeda</button>
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
  $("#transferenciForm").on("submit", function(event) {
                this.submit();
                setTimeout(function() {
                    window.location.href = "/movimientos";
                }, 1000);
            });

            let saldoDisponible = '{{ $cajas->saldo }}';
            if (saldoDisponible <= 0) {
                Swal.fire({
                    title: "Transferencia a Bobeda",
                    html: `No Tiene <strong>SALDO DISPONIBLE</strong> Para poder realizar una transferencia a bobeda.
                <br>
                <a href="/movimientos" class="btn btn-info">Aceptar</a>
                `,
                    icon: "info",
                    showConfirmButton: false,

                    allowOutsideClick: false,

                });
            }

        });
    </script>
