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
                <h3> | Días en Mora:</h3> <span class="badge badge-danger text-white">{{ $DIAS_MORA }}</span>
            </div>
            <div class="ribbon-label fs-3">
                <i class="ki-outline ki-book-square text-white fs-3x"></i>
                Caja - Abono de Crédito
                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group row mb-5">
                <div class="form-floating  col-lg-2">
                    <span class="form-control">{{ $credito->fecha_nacimiento }}</span>
                    <label>Fecha Nacimiento:</label>
                </div>
                <div class="form-floating  col-lg-3">
                    <span class="form-control">{{ $credito->genero == '1' ? 'Masculino' : 'Femenino' }}</span>
                    <label>Genero:</label>
                </div>


                <div class="form-floating  col-lg-3">
                    <span class="form-control">{{ $credito->dui_cliente }}</span>
                    <label>Dui:</label>
                </div>

                <div class="form-floating  col-lg-4">
                    <span class="form-control">{{ $credito->fecha_expedicion }}</span>
                    <label>Fecha Expedicion dui:</label>
                </div>
            </div>
            <div class="form-group row mb-5">
                <div class="form-floating  col-lg-2">
                    <span class="form-control">{{ number_format($credito->cuota, 2) }}</span>
                    <label>Cuota:</label>
                </div>
                <div class="form-floating  col-lg-3">
                    <span class="form-control">${{ number_format($credito->saldo_capital, 2) }}</span>
                    <label>Saldo:</label>
                </div>


                <div class="form-floating  col-lg-3">
                    <span class="form-control">${{ number_format($credito->monto_solicitado, 2) }}</span>
                    <label>Monto Credito:</label>
                </div>

                <div class="form-floating  col-lg-4">
                    <span class="form-control">{{ number_format($TASA * 100, 2) }}%</span>
                    <label>Tasa Mora:</label>
                </div>
            </div>
            <div class="form-group row mb-5">
                <div class="form-floating  col-lg-2">
                    <span class="form-control">{{ $credito->ultima_fecha_pago }}</span>
                    <label>Ultima Fecha de Pago:</label>
                </div>
                <div class="form-floating  col-lg-2">
                    <span class="form-control">{{ $credito->proxima_fecha_pago }}</span>
                    <label>Fecha de Pago:</label>
                </div>
                <div class="form-floating  col-lg-2">
                    <span class="form-control">{{ $credito->fecha_vencimiento }}</span>
                    <label>Fecha de Vencimiento:</label>
                </div>
            </div>


            <div class="form-group row mb-5">
                <div class="form-floating  col-lg-2">
                    <span class="form-control">{{ number_format($INTERESES, 2) }}</span>
                    <label>Intereses:</label>
                </div>
                <div class="form-floating  col-lg-2">
                    <span class="form-control">{{ number_format($CAPITAL, 2) }}</span>
                    <label>Capital:</label>
                </div>
                <div class="form-floating  col-lg-2">
                    <span class="form-control">{{ number_format($credito->aportaciones, 2) }}</span>
                    <label>Aportaciones:</label>
                </div>
                <div class="form-floating  col-lg-2">
                    <span class="form-control">{{ number_format($credito->seguro_deuda, 2) }}</span>
                    <label>Seguro de Deuda:</label>
                </div>
                <div class="form-floating  col-lg-2">
                    <span class="form-control">{{ number_format($MORA, 2) }}</span>
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
                        <span class="fw-bold fs-3x"
                            id="kt_modal_create_campaign_budget_label">{{ number_format($TOTAL_PAGAR, 2) }}</span>
                    </div>
                    <div id="kt_modal_create_campaign_budget_slider" class="noUi-sm"></div>
                </div>
                <!--end::Slider-->
            </div>
            <!--end::Input wrapper-->
            <form action="/creditos/payment" method="post">
                {!! csrf_field() !!}
                {{ method_field('POST') }}
                <input type="hidden" name="id_credito" value="{{ $credito->id_credito }}">
                <div class="form-group row mb-5">
                    <div class="form-floating col-lg-6">
                        <input type="number" step="any" min="{{ $TOTAL_PAGAR }}" value="{{ $TOTAL_PAGAR }}"
                            name="monto_saldo" id="monto_saldo" class="form-control" placeholder="Monto Abonar">
                        <label>Monto Abonar:</label>
                    </div>
                </div>
                <div class="form-group row mb-5">
                    <button class="btn btn-success" type="submit">Abonar</button>
                </div>
            </form>

            <h2>Pagos Realizados</h2>


            <div class="table-responsive">
                <table class="table table-hover  table-row-dashed fs-5     gy-2 gs-5">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Capital</th>
                            <th>Intereses</th>
                            <th>Mora</th>
                            <th>Aportaciones</th>
                            <th>Seguro de Deuda</th>
                            <th>Total</th>
                            <th>Fecha de Pago</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pagos as $pago)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pago->capital }}</td>
                                <td>{{ $pago->interes }}</td>
                                <td>{{ $pago->mora }}</td>
                                <td>{{ $pago->aportacion }}</td>
                                <td>{{ $pago->seguro_deuda }}</td>
                                <td>{{ $pago->total_pago }}</td>
                                <td>{{ $pago->fecha_pago }}</td>
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
