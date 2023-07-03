@extends('base.base')
@section('title')
    Editar Rol
@endsection
@section('content')
    <form action="/captaciones/depositosplazo/add" method="post" autocomplete="off">
        {!! csrf_field() !!}
        {{ method_field('POST') }}
        <input type="hidden" name="periodo_en_dias" id="periodo_en_dias">
        <input type="hidden" name="tasa" id="tasa">


        <div class="card card-bordered shadow-lg mt-5">
            <div class="card-header ribbon ribbon-end ribbon-clip">
                <div class="card-toolbar">
                    <a href="/captaciones/depositosplazo">

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
                    <i class="ki-duotone ki-calendar text-white fs-3x"><span class="path1"></span><span
                            class="path2"></span><span class="path3"></span></i> &nbsp;
                    Aperturar Deposito a Plazo
                    <span class="ribbon-inner bg-info"></span>
                </div>
            </div>
            <div class="card-body">
                <!--begin::row group-->
                <div class="form-group row mb-5">
                    <div class="form-floating col-lg-6">
                        <select name="id_asociado" id="id_asociado" class="form-select" data-control="select2"
                            data-placeholder="Seleccione un asociado" required>
                            <option value=""></option>
                            @foreach ($asociados as $asociado)
                                <option value="{{ $asociado->id_asociado }}">{{ $asociado->nombre }} ->
                                    {{ $asociado->dui_cliente }}</option>
                            @endforeach
                        </select>
                        <label>Asociado:</label>
                    </div>
                    <div class="form-floating col-lg-3">
                        <input type="number" step="1" min="6" value="{{ $certificado }}" required
                            class="form-control text-info text-bold" placeholder="Numero Certificado"
                            name="numero_certificado" />
                        <label># Certificado:</label>
                    </div>
                    <div class="form-floating col-lg-3">
                        <input type="date" value="{{ $fecha }}" max="{{ date('Y-m-d') }}" required
                            class="form-control text-success" placeholder="fecha_deposito" name="fecha_deposito"
                            id="fecha_deposito" />
                        <label>Fecha Deposito:</label>

                    </div>
                </div>
                <!--begin::row group-->
                <div class="form-group row mb-5">

                    <div class="form-floating col-lg-3">
                        <select name="forma_pago" class="form-select" data-control="select2"
                            data-placeholder="Select an option" required>
                            <option value="Cheque">Cheque</option>
                            <option value="Efectivo" selected>Efectivo</option>
                            <option value="Transferencia">Transferencia</option>
                            <option value="Efectivo y Cheque">Efectivo y Cheque</option>
                        </select>
                        <label>Forma Deposito:</label>
                    </div>
                    <div class="form-floating col-lg-3">
                        <input type="number" step="1"   class="form-control"
                            placeholder="numero_cheque" name="numero_cheque" />
                        <label>Cheque Número</label>
                    </div>
                    <div class="form-floating col-lg-6">
                        <input type="number" step="1" min="6" required class="form-control"
                            placeholder="monto_deposito" id="monto_deposito" name="monto_deposito" />
                        <label>Monto Deposito:</label>
                    </div>
                </div>
                <!--begin::row group-->
                <div class="form-group row mb-5">

                    <div class="form-floating col-lg-6">
                        <select name="id_cuenta_depositar" id="id_cuenta_depositar" class="form-select"
                            data-control="select2" data-placeholder="Select an option" required>
                            <option value="">Seleccione cuenta</option>

                        </select>
                        <label>Cuenta a Depositar:</label>
                    </div>
                    <div class="form-floating col-lg-6">
                        <select name="plazo_deposito" id="plazo_deposito" class="form-select" data-control="select2"
                            required>
                            <option value="">Seleccione un plazo</option>
                            @foreach ($plazos as $plazo)
                                <option value="{{ $plazo->id_plazo }}">{{ $plazo->descripcion }} ->
                                    {{ $plazo->meses }} Meses</option>
                            @endforeach

                        </select>
                        <label>Plazo Deposito:</label>
                    </div>
                </div>
                <!--begin::row group-->
                <div class="form-group row mb-5">
                    <div class="form-floating col-lg-4">
                        <select name="interes_deposito" id="interes_deposito" class="form-select" data-control="select2"
                            data-placeholder="Select an option" required>
                            <option value="">Seleccione un asociado</option>
                        </select>
                        <label>Interes Anual:</label>
                    </div>
                    <div class="form-floating col-lg-4">
                        <select name="interes_deposito" id="interes_deposito" class="form-select" data-control="select2"
                            data-placeholder="Select an option" required>
                            <option value="0">Anticipado</option>
                            <option value="1">Semanal</option>
                            <option value="2" selected>Mensual</option>
                            <option value="3">Fin de Plazo</option>

                        </select>
                        <label>Forma de Pago:</label>
                    </div>
                    <div class="form-floating col-lg-4">
                        <input type="date" min="{{ date('Y-m-d') }}" required class="form-control text-danger"
                            placeholder="fecha_vencimiento" name="fecha_vencimiento" id="fecha_vencimiento" />
                        <label>Fecha Vencimiento:</label>
                    </div>
                </div>
                <!--begin::row group-->
                <div class="form-group row mb-5">
                    <div class="form-floating col-lg-6">
                        <input type="number" name="interes_total" id="interes_total" class="form-control" require readonly>
                        <label>Interes Total:</label>
                    </div>
                    <div class="form-floating col-lg-6">
                        <input type="number" name="interes_mensual" id="interes_mensual" class="form-control" require readonly>
                        <label>Interes Mensual:</label>
                    </div>

                </div>

            </div>
            <div class="card-footer d-flex justify-content-center py-6">
                <div class="form-floating col-lg-4">

                    <a href="/captaciones/depositosplazo">

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
                        Abrir Deposito a Plazo
                    </button>
                </div>
            </div>
        </div>
        <div class="input-group mb-5"></div>




    </form>
@endsection
@section('scripts')
    <link href=" {{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/app/depositoplazo.js') }}"></script>
    <script>
        $(document).ready(function() {

            $("#id_asociado").on('change', function() {
                let id_asociado = $(this).val();
                swalProcessing();
                $.ajax({
                    url: '/cuentas/getCuentasByAsociado/' + id_asociado,
                    type: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        swalProcessing();
                    },
                    success: function(data) {
                        Swal.close();
                        $("#id_cuenta_depositar").empty();
                        $("#id_cuenta_depositar").append(
                            '<option value="">Seleccione una cuenta</option>');

                        $.each(data.cuentas, function(index, element) {
                            $("#id_cuenta_depositar").append('<option value="' + element
                                .id_cuenta + '">' + element.numero_cuenta + ' ->' +
                                element.tipo_cuenta + ' -> ' + element
                                .nombre_cliente +
                                '</option>');
                        });
                    },
                    error: function() {
                        Swal.close();
                    }
                });

            });


            $("#plazo_deposito").on('change', function() {
                let id_plazo_deposito = $(this).val();
                swalProcessing();
                $.ajax({
                    url: '/captaciones/tasas/getTasasByPlazoid/' + id_plazo_deposito,
                    type: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Cargando...',
                            text: 'Espere un momento por favor.',
                            allowOutsideClick: false,
                            showCancelButton: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            allowEnterKey: false,

                        });
                    },
                    success: function(data) {
                        Swal.close();

                        $("#interes_deposito").empty();
                        $("#interes_deposito").append(
                            '<option value="">Seleccione una cuenta</option>');

                        $.each(data.tasasInteres, function(index, element) {
                            $("#interes_deposito").append('<option value="' + element
                                .id_tasa + '">' + element.valor + '% ->' + element
                                .descripcion +
                                '</option>');
                        });

                        //fecha de vencimiento
                        $("#periodo_en_dias").val(data.diasDeposito);
                        let fecha = new Date($("#fecha_deposito").val());
                        let fecha_vencimiento = new Date(fecha.setDate(fecha.getDate() +
                            parseInt(data.diasDeposito)));

                        let fecha_vencimiento_formateada = fecha_vencimiento.toISOString()
                            .split('T')[0];
                        $("#fecha_vencimiento").val(fecha_vencimiento_formateada);


                    },
                    error: function() {
                        Swal.close();
                    }
                });


            });

            $("#interes_deposito").on('change', function() {
                let id_tasa = $(this).val();
                swalProcessing();
                $.ajax({
                    url: '/captaciones/tasas/getTasaById/' + id_tasa,
                    type: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Cargando...',
                            text: 'Espere un momento por favor.',
                            allowOutsideClick: false,
                            showCancelButton: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            allowEnterKey: false,

                        });
                    },
                    success: function(data) {
                        Swal.close();
                        $("#tasa").val(data.tasa_interes);
                        let monto = $("#monto_deposito").val();

                        let periodo_en_dias = $("#periodo_en_dias").val();
                        let periodo_en_meses = $("#periodo_en_dias").val()/30;


                        let interes = ((monto * periodo_en_dias * (data.tasa_interes/100) ) / 365);
                        $("#interes_total").val(interes.toFixed(2));
                        let interes_mensual=$("#interes_total").val()/periodo_en_meses
                        $("#interes_mensual").val(interes_mensual.toFixed(2));

                    },
                    error: function() {
                        Swal.close();
                    }
                });

            });
        });
    </script>
@endsection
