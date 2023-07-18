@extends('base.base')
@section('formName')
    <span class="badge badge-info fs-5">Solicitud: <span
            class="badge badge-danger">{{ $solicitud->id_solicitud }}</span></span>
@endsection
@section('content')
    <input type="hidden" id="token" value="{{ csrf_token() }}">
    <form action="/creditos/solicitudes/create-credit" method="post" autocomplete="off">
        {!! csrf_field() !!}
        {{ method_field('POST') }}
        <input type="hidden" name="id_solicitud" id="id_solicitud" value="{{ $solicitud->id_solicitud }}">
        <input type="hidden" name="tasa_interes_deposito" id="tasa_interes_deposito">


        <div class="card card-bordered shadow-lg mt-5">
            <div class="card-header ribbon ribbon-end ribbon-clip">
                <div class="card-toolbar">

                    <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#tabSolicitante">Solicitante</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tabCredito">Crédito</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tabResolucion">Liquidación</a>
                        </li>

                    </ul>
                </div>
                <div class="ribbon-label fs-3">
                    <i class="ki-duotone ki-calendar text-white fs-3x"><span class="path1"></span><span
                            class="path2"></span><span class="path3"></span></i> &nbsp;
                    Solicitud de Credito
                    <span class="ribbon-inner bg-info"></span>
                </div>



            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tabSolicitante" role="tabpanel">
                        <!--begin::row group-->
                        <div class="form-group row mb-5">

                            <div class="form-floating col-lg-2">
                                <input type="date" value="{{ $solicitud->fecha_solicitud }}" required disabled
                                    class="form-control text-success" name="fecha_solicitud" id="fecha_solicitud" />
                                <label>Fecha Solicitud:</label>
                            </div>
                            <div class="form-floating  col-lg-2">
                                <input type="text" value="{{ $cliente->telefono }}" disabled class="form-control"
                                    name="telefono" placeholder="telefono" id="telefono" aria-label="dui"
                                    aria-describedby="basic-addon1" />
                                <label>Telefono:</label>
                            </div>

                            <div class="form-floating col-lg-8">
                                <select name="id_cliente" id="id_cliente" class="form-select" data-control="select2"
                                    data-placeholder="Seleccione un Cliente" disabled>
                                    <option value=""></option>
                                    @foreach ($clientes as $cliente)
                                        @if ($cliente->id_cliente == $solicitud->id_cliente)
                                            <option value="{{ $cliente->id_cliente }}"
                                                {{ $cliente->id_cliente == $solicitud->id_cliente ? 'selected' : '' }}>
                                                {{ $cliente->nombre }} ->
                                                {{ $cliente->dui_cliente }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <label>Cliente:</label>
                            </div>

                        </div>

                        <!--begin::row group-->
                        <div class="form-group row mb-5">

                            <div class="form-floating  col-lg-4">
                                <input type="text" value="{{ $cliente->dui_cliente }}" disabled class="form-control"
                                    placeholder="Dui Cliente" name="dui_cliente" id="dui_cliente" />
                                <label>Dui:</label>
                            </div>




                        </div>

                        <hr>

                    </div>
                    <div class="tab-pane fade show" id="tabCredito" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 p-5" style="border: 1px solid red; border-radius:5px">
                                <div class="row mb-5">
                                    <span class="badge badge-danger fs-3">Datos del Crédito</span>
                                </div>
                                <!--begin::row group-->
                                <div class="form-group row mb-5">

                                    <div class="form-floating col-lg-6">
                                        <input type="number" step="any" name="monto_solicitado"
                                            value="{{ $solicitud->monto_solicitado }}" readonline id="monto_solicitado"
                                            class="form-control" placeholder="numero_cheque" />
                                        <label>Monto Solicitado:</label>
                                    </div>
                                    <div class="form-floating col-lg-6">
                                        <input type="number" step="any" name="plazo" id="plazo"
                                            value="{{ $solicitud->plazo }}" readonline class="form-control"
                                            placeholder="numero_cheque" />
                                        <label>Plazo </label>
                                    </div>
                                </div>
                                <!--begin::row group-->
                                <div class="form-group row mb-5">
                                    <div class="form-floating col-lg-6">
                                        <input type="number" step="any" required class="form-control"
                                            value="{{ $solicitud->tasa }}" readonline placeholder="Monto a solicitar"
                                            id="tasa" name="tasa">
                                        <label>Tasa :</label>
                                    </div>
                                    <div class="form-floating col-lg-6">
                                        <input type="number" readonly required class="form-control" placeholder="Cuota"
                                            value="{{ $solicitud->cuota }}" readonline id="cuota" name="cuota" />
                                        <label>Cuota :</label>
                                    </div>
                                </div>
                                <!--begin::row group-->
                                <div class="form-group row mb-5">
                                    <div class="form-floating col-lg-6">
                                        <input type="number" step="any" name="seguro_deuda" id="seguro_deuda"
                                            value="{{ $solicitud->seguro_deuda }}" readonline class="form-control"
                                            placeholder="Seguro de deuda" />
                                        <label>Seguro de Deuda:</label>
                                    </div>
                                    <div class="form-floating col-lg-6">
                                        <input type="number" name="aportaciones" id="aportaciones" class="form-control"
                                            value="{{ $solicitud->aportaciones }}" readonline placeholder="Aportaciones">
                                        <label>Aportaciones:</label>

                                    </div>
                                </div>
                                <!--begin::row group-->
                                <div class="form-group row mb-5">
                                    <div class="form-floating col-lg-12">
                                        <input type="text" name="destino" id="destino" class="form-control"
                                            value="{{ $solicitud->destino }}" readonline placeholder="Destino Crédito" />
                                        <label>Destino:</label>
                                    </div>
                                </div>
                                <!--begin::row group-->
                                <div class="form-group row mb-5">

                                    <div class="form-floating col-lg-12">
                                        <textarea name="garantia" placeholder="Garantia" id="garantia" rows="10" class="form-control" readonline
                                            data-kt-autosize="true">{{ $solicitud->garantia }}</textarea>
                                        <label>Garantia:</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 p-5" style="border: 1px solid red; border-radius:5px">
                                <div class="row mb-5">
                                    <span class="badge badge-danger fs-3">Tabla de Amortización</span>
                                </div>
                                <!--begin::row group-->
                                <div class="form-group row mb-5">
                                    <div class="form-floating col-lg-12">
                                        <div class="table-responsive table-scrollable">
                                            <table id="kt_datatable_vertical_scroll"
                                                class="table table-striped table-row-bordered gy-5 gs-7">
                                                <thead class="th-dark">
                                                    <tr
                                                        class="fw-semibold fs-5 text-gray-800 border-bottom-2 border-gray-200">
                                                        <th>Periodo</th>
                                                        <th>fecha</th>
                                                        <th>Cuota</th>
                                                        <th>Interes</th>
                                                        <th>Capital</th>
                                                        <th>Saldo</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tablaAmortizacion">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="tab-pane fade" id="tabResolucion" role="tabpanel">
                        <div class="row table-responsive">

                            <div class="col-md-6">
                                <center>

                                    <span class="badge badge-danger fs-5">Código/Descripcion</span>
                                </center>
                                {{-- --begin gorup --}}
                                <div class="form-group row mb-2">
                                    <div class="form-floating col-lg-12">
                                        <select name="destino" id="destino" class="form-select"
                                            data-control="select2">
                                            @foreach ($destinoCredito as $destino)
                                                <option value="{{ $destino->id_cuenta }}">
                                                    {{ $destino->numero }} ->
                                                    {{ $destino->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="">Destino</label>
                                    </div>
                                </div>
                                {{-- --begin gorup --}}
                                <div class="form-group row mb-2">
                                    <div class="form-floating col-lg-12">
                                        <select name="destino" id="destino" class="form-select"
                                            data-control="select2">
                                            @foreach ($tiposCuenta as $tipoCuenta)
                                                <option value="{{ $tipoCuenta->id_cuenta }}">
                                                    {{ $tipoCuenta->numero }} ->
                                                    {{ $tipoCuenta->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="">Cuenta de Ahorro</label>
                                    </div>
                                </div>
                                {{-- End gorup --}}
                                {{-- --begin gorup --}}
                                <div class="form-group row mb-2">
                                    <div class="form-floating col-lg-12">
                                        <select name="destino" id="destino" class="form-select"
                                            data-control="select2">
                                            @foreach ($ingresosPorAplicar as $ingreso)
                                                <option value="{{ $ingreso->id_cuenta }}">
                                                    {{ $ingreso->numero }} ->
                                                    {{ $ingreso->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="">Ingresor Por Aplicar</label>
                                    </div>
                                </div>
                                {{-- End gorup --}}
                                {{-- --begin gorup --}}
                                <div class="form-group row mb-2">
                                    <div class="form-floating col-lg-12">
                                        <select name="destino" id="destino" class="form-select"
                                            data-control="select2">
                                            @foreach ($destinoCredito as $tipoCuenta)
                                                <option value="{{ $tipoCuenta->id_cuenta }}">
                                                    {{ $tipoCuenta->numero }} ->
                                                    Liq. {{ $tipoCuenta->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="">Liquidaciones</label>
                                    </div>
                                </div>
                                {{-- --End gorup --}}
                                {{-- --begin gorup --}}
                                <div class="form-group row mb-2">
                                    <div class="form-floating col-lg-12">
                                        <select name="destino" id="destino" class="form-select"
                                            data-control="select2">
                                            @foreach ($seguroDescuentos as $tipoCuenta)
                                                <option value="{{ $tipoCuenta->id_cuenta }}">
                                                    {{ $tipoCuenta->numero }} ->
                                                    {{ $tipoCuenta->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="">Otros descuentos</label>
                                    </div>
                                </div>
                                {{-- End gorup --}}
                                {{-- --begin gorup --}}
                                <div class="form-group row mb-2">
                                    <div class="form-floating col-lg-12">
                                        <select name="destino" id="destino" class="form-select"
                                            data-control="select2">
                                            @foreach ($desceuntosIVA as $tipoCuenta)
                                                <option value="{{ $tipoCuenta->id_cuenta }}">
                                                    {{ $tipoCuenta->numero }} ->
                                                    {{ $tipoCuenta->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="">Descuentos de IVA</label>
                                    </div>
                                </div>
                                {{-- --begin gorup --}}
                                <div class="form-group row mb-2">
                                    <div class="form-floating col-lg-12">
                                        <select name="destino" id="destino" class="form-select"
                                            data-control="select2">
                                            @foreach ($descuentoDeAportaciones as $tipoCuenta)
                                                <option value="{{ $tipoCuenta->id_cuenta }}">
                                                    {{ $tipoCuenta->numero }} ->
                                                    {{ $tipoCuenta->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="">Aportaciones Asociado</label>
                                    </div>
                                </div>
                               {{-- --begin gorup --}}
                                <div class="form-group row mb-2">
                                    <div class="form-floating col-lg-12">
                                        <select name="destino" id="destino" class="form-select"
                                            data-control="select2">
                                            @foreach ($descuentoComisiones as $tipoCuenta)
                                                <option value="{{ $tipoCuenta->id_cuenta }}">
                                                    {{ $tipoCuenta->numero }} ->
                                                    {{ $tipoCuenta->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="">Comisiones</label>
                                    </div>
                                </div>
                                   {{-- --begin gorup --}}
                                <div class="form-group row mb-2">
                                    <div class="form-floating col-lg-12">
                                        <select name="destino" id="destino" class="form-select"
                                            data-control="select2">
                                            @foreach ($otrosDescuentos as $tipoCuenta)
                                                <option value="{{ $tipoCuenta->id_cuenta }}">
                                                    {{ $tipoCuenta->numero }} ->
                                                    {{ $tipoCuenta->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="">Otros Descuentos</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <center>
                                    <span class="badge badge-danger fs-5">Debe</span>
                                </center>
                                <div class="form-group row mb-2">
                                    <div class="form-floating col-lg-12">
                                        <input type="number" name="destinoDebe" id="destinoDebe"
                                            value="{{ $solicitud->monto_solicitado }}"
                                            class="form-control text-success text-bold" placeholder="Debe">
                                        <label for="">Debe</label>
                                    </div>
                                </div>

                                {{-- --begin gorup --}}
                                <div class="form-group row mb-2">
                                    <div class="form-floating col-lg-12">
                                        <select name="destino" id="destino" class="form-select"
                                            data-control="select2">
                                            @foreach ($cuentas as $cuenta)
                                                <option value="{{ $cuenta->id_cuenta }}">
                                                    {{ $cuenta->numero_cuenta }} ->
                                                    {{ $cuenta->descripcion_cuenta }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="">Cuenta a depositar Liquido</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <center>
                                    <span class="badge badge-danger fs-5">Haber</span>
                                </center>
                                {{-- begin item --}}
                                <div class="form-group row mb-2">
                                    <div class="form-floating col-lg-12">
                                        <input type="number" name="destinoDebe" id="destinoDebe" value="0.00"
                                            class="form-control text-danger" placeholder="Debe">
                                        <label for="">Haber</label>
                                    </div>
                                </div>
                                {{-- end item --}}
                                {{-- begin item --}}
                                <div class="form-group row mb-2">
                                    <div class="form-floating col-lg-12">
                                        <input type="number" name="destinoDebe" id="destinoDebe" value="0.00"
                                            class="form-control text-danger" placeholder="Debe">
                                        <label for="">Haber</label>
                                    </div>
                                </div>
                                {{-- end item --}}

                            </div>




                        </div>


                    </div>


                </div>


            </div>
            <div class="card-footer d-flex justify-content-center py-6">
                <div class="form-floating col-lg-6">

                    <a href="/creditos/solicitudes">

                        <button type="button"
                            class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
                            <i class="ki-duotone ki-black-left-line  text-dark   fs-2x">
                                <i class="path1"></i>
                                <i class="path2"></i>
                            </i>
                            Cancelar
                        </button>
                    </a>
                    <button type="submit" class="btn btn-bg-info btn-text-white">
                        <i class="fa-solid fa-save fs-2 text-white"></i>
                        Desembolsar Credito
                    </button>
                </div>
            </div>
        </div>
        <div class="input-group mb-5"></div>




    </form>
@endsection
@section('scripts')
    <link href=" {{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/app/credito.solicitud.js') }}"></script>
    <script>
        $(document).ready(function() {



            calcularPago();





            $("#monto_solicitado").on('keyup', function() {
                calcularPago();
            });
            $("#plazo").on('keyup', function() {
                calcularPago();
            });
            $("#tasa").on('keyup', function() {
                calcularPago();
            });
            $("#cuota").on('keyup', function() {
                calcularPago();
            });
            $("#seguro_deuda").on('keyup', function() {
                calcularPago();
            });





            function calcularPago() {
                let tasa = $("#tasa").val() / 100;
                let periodos = $("#plazo").val();
                let monto = $("#monto_solicitado").val();
                let valorFuturo = 0;
                let tipo = 0;
                var fecha_solicitud = $("#fecha_solicitud").val() === "" ? new Date() : new Date($(
                    "#fecha_solicitud").val());

                if (isNaN(fecha_solicitud.getTime())) {
                    fecha_solicitud = new Date(); // Si el valor no es una fecha válida, utilizar la fecha actual
                } else {
                    fecha_solicitud.setMonth(fecha_solicitud.getMonth() + 1);
                }




                let tasaPeriodo = tasa / 12
                let pago;
                if (tasaPeriodo === 0) {
                    pago = (monto + valorFuturo) / periodos;
                } else {
                    let denominador = Math.pow(1 + tasaPeriodo, periodos) - 1;
                    pago = (monto * tasaPeriodo * Math.pow(1 + tasaPeriodo, periodos)) / denominador +
                        (valorFuturo * tasaPeriodo) / denominador;
                }

                $("#cuota").val(pago.toFixed(2));

                // Generar la tabla de amortización
                let tablaAmortizacion = $("#tablaAmortizacion");
                tablaAmortizacion.empty();
                let saldoPendiente = monto;

                for (let i = 1; i <= periodos; i++) {
                    fecha_solicitud.setMonth(fecha_solicitud.getMonth() + 1);
                    var options = {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric'
                    };
                    var fecha_formateada = fecha_solicitud.toLocaleDateString('es-ES', options);

                    let interes = saldoPendiente * tasaPeriodo;
                    let principal = pago - interes;
                    saldoPendiente -= principal;

                    let fila = $("<tr>").append(
                        $("<td>").text(i),
                        $("<td>").text(fecha_formateada),
                        $("<td>").text(pago.toFixed(2)),
                        $("<td>").text(interes.toFixed(2)),
                        $("<td>").text(principal.toFixed(2)),
                        $("<td>").text(saldoPendiente.toFixed(2))

                    );

                    tablaAmortizacion.append(fila);
                }

            }






        });
    </script>
@endsection
