@extends('base.base')
@section('title')
    Editar Rol
@endsection
@section('formName')
    <span class="badge badge-info fs-5">Solicitud: <span class="badge badge-danger">{{ $idSolicitud }}</span></span>
@endsection
@section('content')
    <form action="/captaciones/depositosplazo/add" method="post" autocomplete="off">
        {!! csrf_field() !!}
        {{ method_field('POST') }}
        <input type="hidden" name="periodo_en_dias" id="periodo_en_dias">
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
                            <a class="nav-link" data-bs-toggle="tab" href="#tabConyugue">Conyugue</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tabConyugue">Ingresos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tabConyugue">Referencias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tabConyugue">Bienes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tabConyugue">Resolución</a>
                        </li>

                    </ul>
                </div>
                <div class="ribbon-label fs-3">
                    <i class="ki-duotone ki-calendar text-white fs-3x"><span class="path1"></span><span
                            class="path2"></span><span class="path3"></span></i> &nbsp;
                    Aperturar Deposito a Plazo
                    <span class="ribbon-inner bg-info"></span>
                </div>



            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tabSolicitante" role="tabpanel">
                        <!--begin::row group-->
                        <div class="form-group row mb-5">

                            <div class="form-floating col-lg-2">
                                <input type="date" value="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}" required
                                    class="form-control text-success" name="fecha_solicitud" id="fecha_solicitud" />
                                <label>Fecha Solicitud:</label>
                            </div>

                            <div class="form-floating col-lg-10">
                                <select name="id_cliente" id="id_cliente" class="form-select" data-control="select2"
                                    data-placeholder="Seleccione un Cliente" required>
                                    <option value=""></option>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }} ->
                                            {{ $cliente->dui_cliente }}</option>
                                    @endforeach
                                </select>
                                <label>Cliente:</label>
                            </div>

                        </div>

                        <!--begin::row group-->
                        <div class="form-group row mb-5">
                            <div class="form-floating  col-lg-2">
                                <input type="date" disabled class="form-control" name="fecha_nacimiento"
                                    id="fecha_nacimiento" placeholder="fecha_nacimiento" />
                                <label>Fecha Nacimiento:</label>
                            </div>
                            <div class="form-floating  col-lg-3">
                                <select name="genero" disabled required class="form-control">
                                    @if ($cliente->genero == 1)
                                        <option selected value="1">Masculino</option>
                                        <option value="0">Femenino</option>
                                    @else
                                        <option value="1">Masculino</option>
                                        <option selected value="0">Femenino</option>
                                    @endif

                                </select>
                                <label>Genero:</label>
                            </div>


                            <div class="form-floating  col-lg-3">
                                <input type="text" required value="{{ $cliente->dui_cliente }}" disabled
                                    class="form-control" name="dui_cliente" id="dui_cliente" />
                                <label>Dui:</label>
                            </div>

                            <div class="form-floating  col-lg-4">
                                <input type="date" max="{{ date('Y-m-d') }}" disabled
                                    value="{{ $cliente->fecha_expedicion }}" class="form-control" name="fecha_expedicion"
                                    id="fecha_expedicion" />
                                <label>Fecha Expedicion dui:</label>
                            </div>
                        </div>
                        <!--begin::row group-->
                        <div class="form-group row mb-5">

                            <div class="form-floating  col-lg-3">
                                <input type="text" disabled value="{{ $cliente->telefono }}" class="form-control"
                                    name="telefono" placeholder="telefono" id="telefono" aria-label="dui"
                                    aria-describedby="basic-addon1" />
                                <label>Telefono:</label>
                            </div>
                            <div class="form-floating  col-lg-5">
                                <input type="text" disabled value="{{ $cliente->nacionalidad }}" class="form-control"
                                    name="nacionalidad" id="nacionalidad" placeholder="Nacionalidad del cliente"
                                    aria-label="nacionalidad" aria-describedby="basic-addon1" />
                                <label>Nacionalidad:</label>
                            </div>
                            <div class="form-floating  col-lg-4">
                                <input type="text" disabled value="{{ $cliente->estado_civil }}" class="form-control"
                                    name="estado_civil" id="estado_civil" />
                                <label>Estado civil:</label>

                            </div>
                        </div>
                        <!--begin::row group-->
                        <div class="form-group row mb-5">

                            <div class="form-floating  col-lg-3">
                                <input type="text" disabled value="{{ $cliente->direccion_personal }}"
                                    class="form-control" name="direccion_personal" disabled id="direccion_personal" />
                                <label>Direccion Personal:</label>
                            </div>
                            <div class="form-floating  col-lg-5">
                                <input type="text" value="{{ $cliente->nombre_negocio }}" disabled
                                    class="form-control" name="nombre_negocio" id="nombre_negocio" />
                                <label>Nombre del negocio:</label>
                            </div>
                            <div class="form-floating  col-lg-4">
                                <input type="text" value="{{ $cliente->direccion_negocio }}" disabled
                                    class="form-control" name="direccion_negocio"id="direccion_negocio" />
                                <label>Direccion del negocio:</label>
                            </div>

                        </div>
                        <!--begin::row group-->

                        <div class="form-group row mb-5">
                            <div class="form-floating  col-lg-3">
                                <select name="tipo_vivienda" disabled class="form-control">
                                    @if ($cliente->tipo_vivienda == 1)
                                        <option selected value="1">Propia</option>
                                        <option value="0">Alquilada</option>
                                    @else
                                        <option value="1">Propia</option>
                                        <option selected value="0">Alquilada</option>
                                    @endif
                                </select>
                                <label>Tipo de vivienda:</label>

                            </div>
                            <div class="form-floating  col-lg-9">
                                <input type="text" disabled value="{{ $cliente->observaciones }}"
                                    class="form-control" name="observaciones" placeholder="Observaciones" />
                                <label>Observaciones:</label>

                            </div>
                        </div>


                        <hr>


                    </div>
                    <div class="tab-pane fade show" id="tabCredito" role="tabpanel">
                        <!--begin::row group-->
                        <div class="form-group row mb-5">

                            <div class="form-floating col-lg-3">
                                <input type="number" step="any" name="monto_solicitado" class="form-control"
                                    placeholder="numero_cheque" />
                                <label>Monto Solicitado:</label>
                            </div>
                            <div class="form-floating col-lg-3">
                                <input type="number" step="any" name="plazo" id="plazo" class="form-control"
                                    placeholder="numero_cheque" />
                                <label>Plazo </label>
                            </div>
                            <div class="form-floating col-lg-3">
                                <input type="number" step="any" required class="form-control"
                                    placeholder="Monto a solicitar" id="monto_deposito" name="monto_deposito" />
                                <label>Tasa :</label>
                            </div>
                            <div class="form-floating col-lg-3">
                                <input type="number" readonly required class="form-control" placeholder="Cuota"
                                    id="cuota" name="cuota" />
                                <label>Cuota :</label>
                            </div>
                        </div>
                        <!--begin::row group-->
                        <div class="form-group row mb-5">
                            <div class="form-floating col-lg-3">
                                <input type="number" step="any" name="seguro_deuda" class="form-control"
                                    placeholder="Seguro de deuda" />
                                <label>Seguro de Deuda:</label>
                            </div>
                            <div class="form-floating col-lg-9">
                                <input type="text" name="destino" id="destino" class="form-control"
                                    placeholder="Destino Crédito" />
                                <label>Destino:</label>
                            </div>
                        </div>
                        <!--begin::row group-->
                        <div class="form-group row mb-5">

                            <div class="form-floating col-lg-12">
                                <textarea name="garantia" id="garantia" rows="10" class="form-control" data-kt-autosize="true"></textarea>
                                <label>Garantia:</label>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="tabConyugue" role="tabpanel">
                        asdasdasd
                    </div>

                    <div class="tab-pane fade" id="tabCorreo" role="tabpanel">
                        ...
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

            $("#id_cliente").on('change', function() {
                let id_cliente = $(this).val();
                swalProcessing();
                $.ajax({
                    url: '/clientes/getClienteData/' + id_cliente,
                    type: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        swalProcessing();
                    },
                    success: function(data) {
                        Swal.close();
                        if (data.estado == true) {
                            let cliente = data.cliente;
                            $("#genero").val(cliente.genero);
                            $("#fecha_nacimiento").val(cliente.fecha_nacimiento);
                            $("#dui_cliente").val(cliente.dui_cliente);
                            $("#fecha_expedicion").val(cliente.fecha_expedicion);
                            $("#telefono").val(cliente.telefono);
                            $("#nacionalidad").val(cliente.nacionalidad);
                            $("#estado_civil").val(cliente.estado_civil);
                            $("#direccion_personal").val(cliente.direccion_personal);
                            $("#nombre_negocio").val(cliente.nombre_negocio);
                            $("#direccion_negocio").val(cliente.direccion_negocio);
                            $("#tipo_vivienda").val(cliente.tipo_vivienda).change();
                            $("#observaciones").val(cliente.observaciones);
                        }


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
                            '<option value="">Seleccione una Tasa</option>');

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
                let id_interes_deposito = $(this).val();
                swalProcessing();
                $.ajax({
                    url: '/captaciones/tasas/getTasaById/' + id_interes_deposito,
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
                        $("#tasa_interes_deposito").val(data.tasa_interes);
                        let monto = $("#monto_deposito").val();

                        let periodo_en_dias = $("#periodo_en_dias").val();
                        let periodo_en_meses = $("#periodo_en_dias").val() / 30;

                        // alert(monto +" "+ periodo_en_dias +" "+ data.tasa_interes)

                        let interes = ((monto * periodo_en_dias * (data.tasa_interes / 100)) /
                            365);
                        $("#interes_total").val(interes.toFixed(2));
                        let interes_mensual = $("#interes_total").val() / periodo_en_meses
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
