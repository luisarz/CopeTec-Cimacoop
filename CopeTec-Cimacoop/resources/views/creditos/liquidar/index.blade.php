@extends('base.base')
@section('formName')
    <span class="badge badge-info fs-5">Monto Aprobado: <span
            class="badge badge-success fw-bold fs-2x">${{ number_format($credito->monto_solicitado, 2) }}</span></span>
@endsection
@section('content')
    <input type="hidden" id="id_credito" name="id_credito" value="{{ $credito->id_credito }}">
    <input type="hidden" id="monto_cuota" name="monto_cuota" value="{{ $credito->cuota }}">
    <input type="hidden" id="monto_credito" name="monto_credito" value="{{ $credito->monto_solicitado }}">
    <input type="hidden" id="costoConsultaCrediticia" name="costoConsultaCrediticia"
        value="{{ $credito->costoConsultaCrediticia }}">
    <input type="hidden" id="liquido" name="liquido" value="0">
    <input type="hidden" id="aportacionMonto" name="aportacionMonto" value="0">
    <input type="hidden" name="id_caja_aperturada" id="id_caja_aperturada" value="{{ $cajaAperturada->id_caja }}">
    <input type="hidden" id="token" value="{{ csrf_token() }}">


    <div class="card shadow-lg">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="card-toolbar">
                <a href="/creditos/solicitudes/estudios">

                    <button type="button"
                        class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
                        <i class="ki-duotone ki-black-left-line  text-dark   fs-2x">
                            <i class="path1"></i>
                            <i class="path2"></i>
                        </i>
                        Cancelar
                    </button>
                </a>
                <div class="">

                </div>
            </div>
            <div class="ribbon-label fs-5">
                <i class="ki-outline ki-electricity text-white fs-3x"></i>
                Liquidar - Desembolso de Credito
                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>
        <div class="card-body">

            <div class="form-group row mb-3">
                <div class="form-floating  col-lg-2">
                    <input class="form-control fw-bold text-info" disabled
                        value="{{ date('d-m-Y', strtotime($credito->fecha_pago)) }}" />
                    <label>Fecha Aprobación:</label>

                </div>
                <div class="form-floating  col-lg-3">
                    <input class="form-control fw-bold text-info" disabled value="{{ $credito->dui_cliente }}" />
                    <label>DUI:</label>
                </div>


                <div class="form-floating  col-lg-5">
                    <input class="form-control fw-bold text-info" disabled value="{{ $credito->nombre }}" />
                    <label>Cliente:</label>
                </div>
                <div class="form-floating col-lg-2">
                    <input type="text" class="form-control fw-bold fs-3 text-info" disabled
                        value="${{ number_format($credito->cuota, 2) }}" />
                    <label>Monto Cuota:</label>
                </div>


            </div>
            <div class="form-group row mb-3">

                <div class="form-floating  col-lg-5">
                    <select class="form-select" name="destino_credito" id="destino_credito" data-control="select2" disabled>
                        @foreach ($catalogo as $tipo)
                            @if ($tipo->id_cuenta == $solicitud->destino)
                                <option value="{{ $tipo->id_cuenta }}" selected>
                                    {{ $tipo->numero }}-> {{ $tipo->descripcion }}
                                </option>
                            @else
                                <option value="{{ $tipo->id_cuenta }}">
                                    {{ $tipo->descripcion }}->
                                    {{ $tipo->numero }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    <label>Linea de Credito</label>
                </div>
                <div class="form-floating  col-lg-3">
                    <select class="form-select fw-bold text-success" id="id_cuenta_ahorro_destino"
                        name="id_cuenta_ahorro_destino">
                        @foreach ($cuentas as $cuenta)
                            <option value="{{ $cuenta->id_cuenta }}">
                                {{ $cuenta->numero_cuenta }} ->
                                {{ $cuenta->descripcion_cuenta }}
                            </option>
                        @endforeach
                    </select>
                    <label>Cuenta a depositar Liquido</label>
                </div>
                <div class="form-floating  col-lg-4">
                    <select class="form-select fw-bold text-success" id="id_cuenta_aportacion_destino"
                        name="id_cuenta_aportacion_destino">
                        @foreach ($cuentas as $cuenta)
                            <option value="{{ $cuenta->id_cuenta }}">
                                {{ $cuenta->numero_cuenta }} ->
                                {{ $cuenta->descripcion_cuenta }}
                            </option>
                        @endforeach
                    </select>
                    <label>Cuenta a depositar Aportaciones</label>
                </div>
            </div>
            <div class="form-group col mb-5">



                <div class="card card-dashed shadow-sm">

                    <div class="card-body ">
                        <h3>Detalles de liquidación</h3>
                        <hr>
                        <div class="form-group row mb-1">

                            <div class="form-floating col-lg-6">
                                <select class="form-select fs-6" name="id_cuenta" id="id_cuenta" data-control="select2">
                                    <option value="">Seleccione una cuenta</option>
                                    @foreach ($catalogo as $cuenta)
                                        @if ($cuenta->movimiento == 0)
                                            <optgroup label="{{ $cuenta->descripcion }}">
                                        @endif
                                        <option value="{{ $cuenta->id_cuenta }}">
                                            {{ $cuenta->numero }} ->
                                            {{ $cuenta->descripcion }}
                                        </option>
                                        @if ($cuenta->movimiento == 0)
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                                <label>Catalogo</label>
                            </div>
                            <div class="form-floating col-lg-3">
                                <input type="number" id="monto_debe" name="monto_debe"
                                    class="form-control fw-bold fs-3 text-info" placeholder="Movimiento 1" />
                                <label>Debe:</label>
                            </div>
                            <div class="form-floating col-lg-3">
                                <input type="number" id="monto_haber" name="monto_haber"
                                    class="form-control fw-bold fs-3 text-info" placeholder="Movimiento 2" />
                                <label>Haber:</label>
                            </div>
                          
                        </div>
                        <div class="form-group row mb-1">
                            <div class="form-floating col-lg-9">
                                <input type="text" id="comentario" name="comentario" class="form-control"
                                    placeholder="Descripcion" />
                                <label>Descripcion Cuenta:</label>
                            </div>
                              <div class="form-floating col-lg-3">
                                <button class="btn btn-danger btn w-100 fw-bold" id="btnAplicarDescuento"
                                    name="btnAplicarDescuento">
                                    <i class="ki-outline ki-brifecase-tick text-white fs-2x"></i>
                                    Aplicar
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <hr>
                            <table class="table table-hover table-rounded table-striped border gy-1 fs-2 ">

                                <thead>
                                    <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                        <th class="min-w-30px">Acciones</th>
                                        <th class="min-w-50px">Código</th>
                                        <th class="min-w-150px">Descripcion</th>
                                        <th clcass="min-w-140px" style="text-align: right">Debe</th>
                                        <th class="min-w-140px" style="text-align: right">Haber</th>
                                    </tr>
                                </thead>
                                <tbody id="tableLiquidaciones">
                                    <tr>
                                        <td colspan="5">
                                            No data
                                        </td>

                                    </tr>
                                </tbody>
                                <tfoot class="">
                                    <tr>
                                        <td colspan="3" style="text-align: right">
                                            <span class="badge badge-info">Totales</span>
                                        </td>
                                        <td style="text-align: right;">
                                            <span id="montoDebe" class="fw-bold">0.00</span>
                                        </td>
                                        <td style="text-align: right;">
                                            <span id="montoHaber" class="fw-bold">0.00</span>

                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <button class="btn btn-success btn w-100 fw-bold" id="btnLiquidar" name="btnLiquidar">
                <i class="ki-outline ki-brifecase-tick text-white fs-2x"></i>
                Realizar Liquidación
            </button>
        </div>
    </div>
@endsection
<link href=" {{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/app/credito.liquidacion.js') }}"></script>

@section('scripts')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
