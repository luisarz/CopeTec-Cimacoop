@extends('base.base')
@section('content')
    <div class="card shadow-lg">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="card-toolbar">
                <a href="/creditos/abonos">

                    <button type="button"
                        class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
                        <i class="ki-duotone ki-black-left-line  text-dark   fs-2x">
                            <i class="path1"></i>
                            <i class="path2"></i>
                        </i>
                        Cancelar
                    </button>
                </a>
                <h1> &nbsp;Informacion de Crédito</h1>

                @if ($credito->saldo_capital <= 0)
                    <span class="badge badge-success fs-2">Credito Cancelado</span>
                @else
                    &nbsp;<span class="badge badge-success fs-2">Credito Activo</span>
                @endif
                <h3>
            </div>
            <div class="ribbon-label fs-3">
                <i class="ki-outline ki-book-square text-white fs-3x"></i>
                {{ $cajaAperturada->numero_caja }} - Abono de Crédito
                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>
        <div class="card-body">
             <form action="/creditos/payment" autocomplete="off" target="_blank" method="post" id="kt_new_abono_form">
                {!! csrf_field() !!}
                {{ method_field('POST') }}
            <div class="form-group row mb-5">

                <div class="form-floating  col-lg-6">
                    <span class="form-control">{{ $credito->nombre }}</span>
                    <label>Cliente:</label>
                </div>



                <div class="form-floating  col-lg-2">
                    <span class="form-control">{{ $credito->dui_cliente }}</span>
                    <label>Dui:</label>
                </div>
                <div class="form-floating  col-lg-2">
                    <span
                        class="form-control text-danger fw-bold">${{ number_format($credito->monto_solicitado, 2) }}</span>
                    <label>Monto credito:</label>
                </div>
                <div class="form-floating  col-lg-2">
                    <span class="form-control text-danger fw-bold">
                        ${{ $credito->saldo_capital <= 0 ? 0.0 : number_format($credito->saldo_capital, 2) }}</span>
                    <label>Saldo:</label>
                </div>

            </div>
            <div class="form-group row mb-5">
                <div class="form-floating  col-lg-4">
                    <span class="form-control">{{ $credito->codigo_credito }}</span>
                    <label>Credito:</label>
                </div>
                <div class="form-floating  col-lg-2">
                    <span class="form-control">
                        {{ $credito->cuota <= 0 ? $credito->cuota : number_format(0, 2) }}

                    </span>
                    <label>Cuota:</label>
                </div>



                <div class="form-floating  col-lg-2">
                    <span class="form-control">{{ number_format($TASA * 100, 2) }}%</span>
                    <label>Tasa Mora:</label>
                </div>

                <div class="form-floating  col-lg-2">
                    <span class="form-control text-success">
                        {{ date('d-m-Y', strtotime($credito->ultima_fecha_pago)) }}
                    </span>
                    <label>Ultimo Pago:</label>
                </div>
                <div class="form-floating  col-lg-2">
                    <input type="number" name="DIAS_MORA" id="DIAS_MORA" class="form-control" value="{{ $DIAS_MORA }}">
                    <label>Dias en Mora:</label>
                </div>

            </div>


            <div class="form-group row mb-5">
                <div class="form-floating  col-lg-2">
                    <input type="number" name="INTERESES" id="INTERESES" class="form-control"
                        value="{{ number_format($INTERESES, 2) }}">
                    <label>Intereses:</label>
                </div>
                <div class="form-floating  col-lg-2">
                    <input type="number" name="CAPITAL" id="CAPITAL" class="form-control"
                        value="{{ number_format($CAPITAL, 2) }}">

                    <label>Capital:</label>
                </div>
                <div class="form-floating  col-lg-2">
                    <input type="number" name="APORTACIONES" id="APORTACIONES" class="form-control"
                        value="{{ number_format($credito->aportaciones, 2) }}">
                    <label>Aportaciones:</label>
                </div>
                <div class="form-floating  col-lg-2">
                    <input type="number" name="SEGURO_DEUDA" id="SEGURO_DEUDA" class="form-control"
                        value="{{ number_format($credito->seguro_deuda, 2) }}">

                    <label>Seguro de Deuda:</label>
                </div>
                <div class="form-floating  col-lg-2">
                    <input type="number" name="MORA" id="MORA" class="form-control"
                        value="{{ number_format($MORA, 2) }}">

                    <label>Monto Mora:</label>
                </div>
            </div>


            <!--begin::Input wrapper-->
            <div class="w-lg-50">
                <!--begin::Label-->
                <label class="fs-6 fw-semibold mb-2">
                    Total a Pagar

                    <span class="m2-1" data-bs-toggle="tooltip" title="">
                        <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span
                                class="path2"></span><span class="path3"></span></i>
                    </span>
                </label>
                <!--end::Label-->

                <!--begin::Slider-->
                <div class="d-flex flex-column text-center">
                    <div class="d-flex align-items-start justify-content-center mb-7">
                        <span class="fw-bold fs-4 mt-1 me-2">$</span>
                        @if ($credito->saldo_capital <= 0)
                            <span class="fw-bold fs-3x" id="TOTAL_PAGAR_LABEL">0.00</span>
                        @else
                            <span class="fw-bold fs-3x" id="TOTAL_PAGAR_LABEL">{{ number_format($TOTAL_PAGAR, 2) }}</span>
                        @endif
                    </div>
                    <div id="kt_modal_create_campaign_budget_slider" class="noUi-sm"></div>
                </div>
                <!--end::Slider-->
            </div>
            <!--end::Input wrapper-->

                <input type="hidden" name="id_credito" id="id_credito" value="{{ $credito->id_credito }}">
                <input type="hidden" name="id_caja" id="id_caja" value="{{ $cajaAperturada->id_caja }}">

                {{-- <input type="hidden" name="cuota" id="cuota" value="{{ $credito->id_credito }}"> --}}
                {{-- <input type="hidden" name="id_caja" value="{{ $cajaAperturada->id_caja }}"> --}}
                <input type="hidden" name="saldo_capital" id="saldo_capital"
                    value="{{ sprintf('%.2f', $credito->saldo_capital) }}">
                <input type="hidden" name="aportacion_deposito" id="aportacion_deposito"
                    value="{{ sprintf('%.2f', $credito->aportaciones) }}">
                <input type="hidden" step="any" min="{{ $TOTAL_PAGAR }}" value="{{ $TOTAL_PAGAR }}"
                    name="min_payment" id="min_payment">
{{-- Parametros para cuotas pagadas con anticipacion --}}
                <input type="hidden" name="cuota_to_val" id="cuota_to_val" value="{{ $param[0]->cuotas }}">
                <input type="hidden" name="monto_to_val" id="monto_to_val" value="{{ $param[0]->monto }}">

                <div class="form-group row mb-5">
                    <div class="form-floating fv-row col-lg-2">
                        <input type="date" name="fecha_pago" id="fecha_pago" class="form-control"
                            placeholder="Monto Abonar" value="{{ date('Y-m-d') }}">
                        <label>Fecha Pago:</label>
                    </div>
                    <div class="form-floating fv-row col-lg-4">
                        <input type="text" name="cliente_operacion" id="cliente_operacion" class="form-control"
                            placeholder="Monto Abonar">
                        <label>Cliente Deposita:</label>
                    </div>
                    <div class="form-floating fv-row col-lg-4">
                        <input type="text" name="dui_operacion" id="dui_operacion" class="form-control"
                            placeholder="Monto Abonar">
                        <label>DUI:</label>
                    </div>
                    <div class="form-floating fv-row col-lg-2">
                        @if ($credito->saldo_capital <= 0)
                            <input type="text" name="monto_abonar" id="monto_abonar" class="form-control"
                                placeholder="Monto Abonar" disabled>
                        @else
                            <input type="number" step="any" min="{{ $TOTAL_PAGAR }}" value="{{ $TOTAL_PAGAR }}"
                                name="MONTO_PAGO_MENSUAL" id="MONTO_PAGO_MENSUAL" class="form-control fw-bold text-info"
                                placeholder="Monto Abonar">
                        @endif
                        <label>Monto Abonar:</label>
                    </div>
                </div>
                <div class="form-group fv-row row mb-5">
                    <button type="submit" id="kt_new_abono_submit" class="btn btn-primary">
                        <!--begin::Indicator label-->
                        @if ($credito->saldo_capital <= 0)
                            <span class="indicator-label" disabled>Credito Cancelado 👌</span>
                        @else
                            <span class="indicator-label">Realizar Pago</span>
                        @endif

                        <!--end::Indicator label-->
                        <!--begin::Indicator progress-->
                        <span class="indicator-progress">Procesando ...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        <!--end::Indicator progress-->
                    </button>
                </div>
            </form>

            <h2>Pagos Realizados</h2>


            <div class="table-responsive">
                <table class="table table-hover  table-row-dashed fs-5     gy-2 gs-5">
                    <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>No</th>
                            <th>Caja</th>
                            <th>Capital</th>
                            <th>Intereses</th>
                            <th>Mora</th>
                            <th>Aportaciones</th>
                            <th>Seguro de Deuda</th>
                            <th>Total</th>
                            <th>Fecha de Pago</th>
                            <th>Estado</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pagos as $pago)
                            <tr>
                                <td>
                                    <a href="javascript:imprimirBoleta('{{ $pago->id_pago_credito }}')"
                                        class="btn btn-outline btn-info btn-sm w-30">
                                        <i class="ki-outline ki-printer   fs-5"></i>
                                    </a>
                                    <a href="javascript:eliminarPago('{{ $pago->id_pago_credito }}')"
                                        class="btn btn-outline btn-danger btn-sm w-30">
                                        <i class="ki-outline ki-trash fs-5"></i>
                                    </a>

                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pago->numero_caja }}</td>


                                <td>
                                    @if ($pago->capital == 0)
                                        <span class="badge badge-danger"> ${{ number_format($pago->capital, 2) }} </span>
                                    @else
                                        ${{ number_format($pago->capital, 2) }}
                                    @endif
                                </td>
                                <td>${{ number_format($pago->interes, 2) }}</td>
                                <td>

                                    @if ($pago->mora > 0)
                                        <span class="badge badge-danger"> ${{ number_format($pago->mora, 2) }} </span>
                                    @else
                                        ${{ number_format($pago->mora, 2) }}
                                    @endif

                                </td>
                                <td>${{ number_format($pago->aportacion, 2) }}</td>
                                <td>${{ number_format($pago->seguro_deuda, 2) }}</td>
                                <td>${{ number_format($pago->total_pago, 2) }}</td>
                                <td>{{ date('d-m-Y', strtotime($pago->fecha_pago)) }}</td>
                                <td>


                                    @if ($pago->capital > $credito->cuota)
                                        <i class="ki-outline ki-triangle fs-1 text-warning"alt="Warning"></i>
                                    @else
                                        <i class="ki-outline ki-check-circle fs-1 text-success"></i>
                                    @endif


                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="card-footer">
        </div>
    </div>
@endsection
@section('scripts')
    <script src=" {{ asset('assets/js/custom/abonos/abonos.js') }}"></script>
    <script>
        $(document).ready(function() {

            $("#cliente_operacion").focus();
            let saldo = $('#saldo_capital').val();

            if (saldo <= 0) {
                $('#kt_new_abono_submit').attr('disabled', true);
            } else {
                $('#kt_new_abono_submit').attr('disabled', false);
            }

            window.imprimirBoleta = function(id_pago_credito) {
                window.open('/reportes/comprobanteAbono/' + id_pago_credito, '_blank');
            }

            function getDetalles() {
                let id_credito = $("#id_credito").val();
                let fecha_pago = $("#fecha_pago").val();

                $.ajax({
                    url: '/creditos/getDetalles/' + id_credito + '/' + fecha_pago,
                    type: 'get',
                    // data: {
                    //     id_credito: id_credito,
                    //     fecha_pago: fecha_pago
                    // },
                    success: function(response) {
                        // console.log(response);
                        $("#monto_abonar").val(response.total_pagar);
                        $("#MONTO_PAGO_MENSUAL").val(response.TOTAL_PAGAR);
                        $("#INTERESES").val(response.INTERESES);
                        $("#CAPITAL").val(response.CAPITAL);
                        $("#MORA").val(response.MORA);
                        $("#APORTACIONES").val(response.APORTACION);
                        $("#SEGURO_DEUDA").val(response.SEGURO_DEUDA);
                        // $("#monto_saldo").val(response.TOTAL_PAGAR);
                        $("#min_payment").val(response.TOTAL_PAGAR);
                        $("#TOTAL_PAGAR_LABEL").text(response.TOTAL_PAGAR);
                        $("#DIAS_MORA").val(response.DIAS_MORA);
                    }
                });



            }

            getDetalles();

            $("#fecha_pago").change(function() {
                getDetalles();
                sumarTotales();
            });

            function sumarTotales() {
                let intereses = $("#INTERESES").val() || 0.0;
                let capital = $("#CAPITAL").val() || 0.0;
                let aportaciones = $("#APORTACIONES").val() || 0.0;
                let seguro_deuda = $("#SEGURO_DEUDA").val() || 0.0;
                let mora = $("#MORA").val() || 0.0;

                let total = parseFloat(intereses) + parseFloat(capital) + parseFloat(aportaciones) + parseFloat(
                    seguro_deuda) + parseFloat(mora);

                $("#MONTO_PAGO_MENSUAL").val(total);
                $("#min_payment").val(total);
                $("#TOTAL_PAGAR_LABEL").text(total);
            }

            $("#INTERESES").on('keyup', function() {
                sumarTotales();
            });

            $("#CAPITAL").on('keyup', function() {
                sumarTotales();
            });
            $("#APORTACIONES").on('keyup', function() {
                sumarTotales();
            });
            $("#SEGURO_DEUDA").on('keyup', function() {
                sumarTotales();
            });
            $("#MORA").on('keyup', function() {
                sumarTotales();
            });


            window.eliminarPago=function(id_pago){
                Swal.fire({
                    title: '¿Estas seguro de eliminar este pago?',
                    text: "No podras revertir esta acción!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, Eliminar!',
                    cancelButtonText: 'No, Cancelar!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/creditos/abono/eliminarpago/' + id_pago,
                            type: 'get',
                            success: function(response) {
                                Swal.fire(
                                    'Eliminado!',
                                    'El pago ha sido eliminado.',
                                    'success'
                                );
                                location.reload();
                            }
                        });
                    }
                });
            }



        })
    </script>
@endsection
