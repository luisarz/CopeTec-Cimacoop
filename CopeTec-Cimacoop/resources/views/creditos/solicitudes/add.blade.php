@extends('base.base')
@section('title')
    Editar Rol
@endsection
@section('formName')
    <span class="badge badge-info fs-5">Solicitud: <span class="badge badge-danger">{{ $idSolicitud }}</span></span>
@endsection
@section('content')
    <input type="hidden" id="token" value="{{ csrf_token() }}">



    <form action="/creditos/solicitudes/add" method="post" autocomplete="off">
        {!! csrf_field() !!}
        {{ method_field('POST') }}
        <input type="hidden" name="id_solicitud" id="id_solicitud" value="{{ $idSolicitud }}">
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
                            <a class="nav-link" data-bs-toggle="tab" href="#tabIngresos">Ingresos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tabReferencias">Referencias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tabBienes">Bienes</a>
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
                                <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento"
                                    placeholder="fecha_nacimiento" />
                                <label>Fecha Nacimiento:</label>
                            </div>
                            <div class="form-floating  col-lg-3">
                                <select name="genero" class="form-control">
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
                                <input type="text" required class="form-control" placeholder="Dui Cliente"
                                    name="dui_cliente" id="dui_cliente" />
                                <label>Dui:</label>
                            </div>

                            <div class="form-floating  col-lg-4">
                                <input type="date" max="{{ date('Y-m-d') }}" class="form-control" name="fecha_expedicion"
                                    id="fecha_expedicion" />
                                <label>Fecha Expedicion dui:</label>
                            </div>
                        </div>
                        <!--begin::row group-->
                        <div class="form-group row mb-5">

                            <div class="form-floating  col-lg-3">
                                <input type="text" class="form-control" name="telefono" placeholder="telefono"
                                    id="telefono" aria-label="dui" aria-describedby="basic-addon1" />
                                <label>Telefono:</label>
                            </div>
                            <div class="form-floating  col-lg-5">
                                <input type="text" class="form-control" name="nacionalidad" id="nacionalidad"
                                    placeholder="Nacionalidad del cliente" aria-label="nacionalidad"
                                    aria-describedby="basic-addon1" />
                                <label>Nacionalidad:</label>
                            </div>
                            <div class="form-floating  col-lg-4">
                                <input type="text" class="form-control" name="estado_civil" id="estado_civil"
                                    placeholder="Estado Civil" />
                                <label>Estado civil:</label>

                            </div>
                        </div>
                        <!--begin::row group-->
                        <div class="form-group row mb-5">

                            <div class="form-floating  col-lg-3">
                                <input type="text" class="form-control" placeholder="Direccion cliente"
                                    name="direccion_personal" id="direccion_personal" />
                                <label>Direccion Personal:</label>
                            </div>
                            <div class="form-floating  col-lg-5">
                                <input type="text" class="form-control" placeholder="Nombre negocio "
                                    name="nombre_negocio" id="nombre_negocio" />
                                <label>Nombre del negocio:</label>
                            </div>
                            <div class="form-floating  col-lg-4">
                                <input type="text" class="form-control" placeholder="Direccion del negocio"
                                    name="direccion_negocio"id="direccion_negocio" />
                                <label>Direccion del negocio:</label>
                            </div>

                        </div>
                        <!--begin::row group-->

                        <div class="form-group row mb-5">
                            <div class="form-floating  col-lg-3">
                                <select name="tipo_vivienda" class="form-control">
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
                                <input type="text" class="form-control" name="observaciones"
                                    placeholder="Observaciones" />
                                <label>Observaciones:</label>

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
                                            id="monto_solicitado" class="form-control" placeholder="numero_cheque" />
                                        <label>Monto Solicitado:</label>
                                    </div>
                                    <div class="form-floating col-lg-6">
                                        <input type="number" step="any" name="plazo" id="plazo"
                                            class="form-control" placeholder="numero_cheque" />
                                        <label>Plazo </label>
                                    </div>
                                </div>
                                <!--begin::row group-->
                                <div class="form-group row mb-5">
                                    <div class="form-floating col-lg-6">
                                        <input type="number" step="any" required class="form-control"
                                            placeholder="Monto a solicitar" id="tasa" name="tasa">
                                        <label>Tasa :</label>
                                    </div>
                                    <div class="form-floating col-lg-6">
                                        <input type="number" readonly required class="form-control" placeholder="Cuota"
                                            id="cuota" name="cuota" />
                                        <label>Cuota :</label>
                                    </div>
                                </div>
                                <!--begin::row group-->
                                <div class="form-group row mb-5">
                                    <div class="form-floating col-lg-6">
                                        <input type="number" step="any" name="seguro_deuda" id="seguro_deuda"
                                            class="form-control" placeholder="Seguro de deuda" />
                                        <label>Seguro de Deuda:</label>
                                    </div>
                                    <div class="form-floating col-lg-6">
                                        <input type="number" name="aportaciones" id="aportaciones" class="form-control"
                                            placeholder="Aportaciones">
                                        <label>Aportaciones:</label>

                                    </div>
                                </div>
                                <!--begin::row group-->
                                <div class="form-group row mb-5">
                                    <div class="form-floating col-lg-12">
                                        <select name="destino" id="destino" class="form-select"
                                            data-control="select2">

                                            @foreach ($destinoCredito as $destino)
                                                @if ($destino->movimiento == 0)
                                                    <optgroup label="{{ $destino->descripcion }}">
                                                @endif
                                                <option value="{{ $destino->id_cuenta }}">
                                                    {{ $destino->numero }}->
                                                    {{ $destino->descripcion }}

                                                </option>
                                                @if ($destino->movimiento == 0)
                                                    </optgroup>
                                                @endif
                                            @endforeach
                                        </select>
                                        <label>Destino:</label>
                                    </div>
                                </div>
                                <!--begin::row group-->
                                <div class="form-group row mb-5">
                                    <div class="form-floating col-lg-12">
                                        <select name="tipo_garantia" id="tipo_garantia" class="form-select"
                                            data-control="select2">
                                            @foreach ($tiposGarantia as $tipogarantia)
                                                <option value="{{ $tipogarantia->id_tipo_garantia }}">
                                                    {{ $tipogarantia->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label>Tipo garantia:</label>
                                    </div>
                                </div>
                                <!--begin::row group-->
                                <div class="form-group row mb-5">
                                    <div class="form-group row mb-5">
                                        <div class="form-floating col-lg-12">
                                            <textarea name="garantia" placeholder="Garantia" id="garantia" rows="10" class="form-control" readonline
                                                data-kt-autosize="true"></textarea>
                                            <label>Garantia:</label>
                                        </div>
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
                                        <div class="table-responsive">
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
                    <div class="tab-pane fade show" id="tabConyugue" role="tabpanel">
                        <!--begin::row group-->
                        <div class="form-group row mb-5">
                            <div class="form-floating col-lg-12">
                                <select name="id_conyugue" id="id_conyugue" class="form-select" data-control="select2">
                                    <option value="">Seleccione</option>

                                    @foreach ($referencias as $referencia)
                                        <option value="{{ $cliente->id_referencia }}">
                                            {{ $referencia->nombre }}
                                            ->{{ $referencia->dui }}
                                            ->{{ $referencia->parentesco }}
                                        </option>
                                    @endforeach
                                </select>
                                <label>Conyugue:</label>
                            </div>

                        </div>
                        <!--begin::row group-->
                        <div class="form-group row mb-5">
                            <div class="form-floating col-lg-8">
                                <input type="text" name="empresa_labora" class="form-control"
                                    placeholder="Nombre conyugue" />
                                <label>Empresa Labora:</label>
                            </div>

                            <div class="form-floating col-lg-4">
                                <input type="text" name="cargo" class="form-control"
                                    placeholder="Ingresos conyugue" />
                                <label>Cargo :</label>
                            </div>
                        </div>
                        <!--begin::row group-->
                        <div class="form-group row mb-5">
                            <div class="form-floating col-lg-4">
                                <input type="number" step="any" name="sueldo_conyugue" class="form-control"
                                    placeholder="Ingresos conyugue" />
                                <label>Sueldo :</label>
                            </div>
                            <div class="form-floating col-lg-4">
                                <input type="text" name="tiempo_laborando" class="form-control"
                                    placeholder="Ingresos conyugue" />
                                <label>Tiempo Laborando :</label>

                            </div>
                            <div class="form-floating col-lg-4">
                                <input type="text" name="telefono_trabajo" class="form-control"
                                    placeholder="Telefono Trabajo" />
                                <label>Telefono trabajo:</label>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tabIngresos" role="tabpanel">
                        {{-- --begin gorup --}}
                        <div class="row">

                            <div class="col-lg-6 border-active-success pl-10"
                                style="border: 1px dashed rgb(129, 209, 76); border-radius: 8px;">
                                <span class="badge badge-success fs-3">Ingresos</span>

                                <div class="form-group row mb-5">
                                    <div class="form-floating">
                                        <input type="number" placeholder="Sueldo" id="sueldo_solicitante"
                                            class="form-control col-lg-12 mb-5" name="sueldo_solicitante">
                                        <label>Sueldo</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="number" placeholder="Comisiones" class="form-control  mb-5"
                                            name="comisiones" id="comisiones">
                                        <label>Comisiones</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="number"placeholder="Negocio Propio" class="form-control  mb-5"
                                            name="negocio_propio" id="negocio_propio">
                                        <label>Negocio Propio</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="number" placeholder="Otros ingresos" class="form-control  mb-5"
                                            name="otros_ingresos" id="otros_ingresos">
                                        <label>Otros Ingresos</label>
                                    </div>
                                    <hr>
                                    <div class="form-floating">
                                        <input type="number" placeholder="Total Ingresos" class="form-control  mb-5"
                                            name="total_ingresos" id="total_ingresos">
                                        <label>Total Ingresos</label>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-6 border-active-danger"
                                style="border: 1px dashed rgb(240, 124, 30); border-radius: 8px;">
                                <span class="badge badge-danger fs-3">Egresos</span>
                                <div class="form-group row mb-5">
                                    <div class="form-floating">
                                        <input type="number" class="form-control col-lg-12 mb-5" name="gastos_vida"
                                            id="gastos_vida" placeholder="gastos de Vida">
                                        <label>Gastos Para Vivir</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="number" class="form-control  mb-5"
                                            placeholder="Pagos y obligaciones" name="pagos_obligaciones"
                                            id="pagos_obligaciones">
                                        <label>Pagos Obligaciones</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="number" class="form-control  mb-5" placeholder="Gastos del Negocio"
                                            name="gastos_negocios" id="gastos_negocios">
                                        <label>Gastos Negocios</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="number" class="form-control  mb-5" name="otros_gastos"
                                            id="otros_gastos" placeholder="Otros gastos">
                                        <label>Otros Ingresos</label>
                                    </div>
                                    <hr>
                                    <div class="form-floating">
                                        <input type="number" class="form-control  mb-5" name="total_gasto"
                                            id="total_gasto" placeholder="Total gastos">
                                        <label>Total Ingresos</label>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="tab-pane fade show" id="tabReferencias" role="tabpanel">
                        <!--begin::row group-->
                        <div class="form-group row mb-5">
                            <div class="form-floating col-lg-10">
                                <select name="id_referencia" id="id_referencia" class="form-select"
                                    data-control="select2">
                                    <option value="">Seleccione</option>

                                    @foreach ($referencias as $referencia)
                                        <option value="{{ $referencia->id_referencia }}">
                                            {{ $referencia->nombre }}
                                            ->{{ $referencia->dui }}
                                            ->{{ $referencia->parentesco }}
                                        </option>
                                    @endforeach
                                </select>
                                <label>Referencia:</label>
                            </div>
                            <div class="form-floating col-lg-2">
                                <button type="button" class="btn btn-danger" id="btnAddReferencia"
                                    name="btnAddReferencia">
                                    <span class="fa fa-download"></span>
                                    Registrar
                                </button>

                            </div>

                        </div>
                        {{-- begin rows group-- --}}
                        <div class="form-group row mb-5 pl-10">

                            <div class="table-responsive">
                                <table class="table table-hover table-row-dashed fs-5     gy-2 gs-5">
                                    <thead class="th-dark">
                                        <tr class="fw-semibold fs-5 text-gray-800 border-bottom-2 border-gray-200">
                                            <th class="min-w-230px">Acciones</th>
                                            <th>Nombre</th>
                                            <th>Dui</th>
                                            <th>Parentesco</th>
                                            <th>Telefono</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableReferencias">

                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade show" id="tabBienes" role="tabpanel">

                        {{-- formulario de bienes --}}
                        <!--begin::row group-->
                        <div class="form-group row mb-5">
                            <div class="form-floating col-lg-4">
                                <input type="text" class="form-control" name="clase_propiedad" id="clase_propiedad"
                                    placeholder="Tipo de bien">
                                <label>Clase de bien:</label>
                            </div>
                            <div class="form-floating col-lg-8">
                                <input type="text" class="form-control" name="direccion_bien" id="direccion_bien"
                                    placeholder="Tipo de bien">
                                <label>Direccion del bien:</label>
                            </div>
                        </div>
                        <!--begin::row group-->
                        <div class="form-group row mb-3">
                            <div class="form-floating col-lg-4">
                                <input type="number" step="any" class="form-control" name="valor_bien"
                                    id="valor_bien" placeholder="Tipo de bien">
                                <label>Valor:</label>
                            </div>
                            <div class="form-floating col-lg-4">
                                <select name="hipotecado_bien" id="hipotecado_bien" class="form-control">
                                    <option value="1">Si</option>
                                    <option value="0" selected>No</option>
                                </select>
                                <label>Hipotecado:</label>
                            </div>

                            <div class="form-floating col-lg-4 text-align-rigth">
                                <div class="d-grid mb-5">
                                    <button type="butoom" id="btnRegistrarBien" class="btn btn-danger text-white fs-3">
                                        Registrar
                                    </button>
                                </div>
                            </div>
                        </div>



                        {{-- begin rows group-- --}}
                        <div class="form-group row mb-5 pl-10">

                            <div class="table-responsive">
                                <table class="table table-hover table-row-dashed fs-5     gy-2 gs-5">
                                    <thead class="th-dark">
                                        <tr class="fw-semibold fs-5 text-gray-800 border-bottom-2 border-gray-200">
                                            <th class="min-w-230px">Acciones</th>
                                            <th>Tipo Propiedad</th>
                                            <th>Direccion</th>
                                            <th>Valor</th>
                                            <th>Hipotecada</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBienes">

                                </table>
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
                        Realizar Solicitud
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
