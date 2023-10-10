@extends('base.base')
@section('formName')
    <a href="/facturas/list">

        <button type="button" class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
            <i class="ki-outline ki-black-left-line  text-dark   fs-2x">
            </i>
            Cancelar
        </button>
    </a>
    <span class="badge badge-info mx-2 fs-4">Nueva Factura &nbsp;
        <span class="badge badge-danger fs-4">
            {{ $id_factura }}
        </span>
    </span>
@endsection
@section('content')
    <input type="hidden" id="token" value="{{ csrf_token() }}">
    <input type="hidden" id="id_factura" value="{{ $id_factura }}">

    <div class="card shadow-lg mt-3">
        <div class="card-body">
            <div class="form-group row mb-2">
                <div class="form-floating  col-lg-2">
                    <select name="tipo_documento" id="tipo_documento" class="form-control">
                        <option value="">Tipo de Documento</option>
                        <option value="Factura">Factura</option>
                        <option value="CCF">CCF</option>
                    </select>

                    <label class="required ">Comprobante:</label>
                </div>
                <div class="form-floating  col-lg-2">
                    <input type="number" class="form-control input-lg text-danger font-weight-bold" id="numero_factura" name="numero_factura" readonly>
                    <label class="required ">Comprobante:</label>
                </div>
             
                <div class="form-floating  col-lg-2">
                    <input type="date" class="form-control input-lg" id="fecha_factura" name="fecha_factura"
                        value="{{ date('Y-d-m') }}">
                    <label class="required ">Fecha Facturación:</label>
                </div>
                <div class="form-floating  col-lg-4">
                    <select class="form-select fs-4" name="id_cliente" id="id_cliente" data-control="select2">
                        <option value="">Seleccione un Cliente</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id_cliente }}">
                                {{ $cliente->nombre }} ->
                                {{ $cliente->dui_cliente }}
                            </option>
                        @endforeach
                    </select>
                    <label class="required ">Cliente</label>
                </div>
                <div class=" col-lg-2">
                    <label class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" id="chkRetencion" />
                        <span class="form-check-label fw-semibold text-muted">
                            Retencion
                        </span>
                    </label>
                </div>
            </div>
        </div>
    </div>


    <div class="card shadow-lg mt-3">

        <div class="card-body">


            <!--begin::Layout-->
            <div class="d-flex flex-column flex-xl-row">
                <!--begin::Content-->
                <div class="d-flex flex-row-fluid me-xl-10 mb-0 mb-xl-0">
                    <!--begin::Pos food-->

                    <!--begin::Tab Content-->
                    <div class="card  shadow-sm p-1">
                        <div class="card-body  mt-1 mb-1">
                            <div class="form-group row mb-1">
                                <div class="form-floating col-lg-5">
                                    <select class="form-select fs-4" name="id_producto" id="id_producto"
                                        data-control="select2">
                                        <option value="">Seleccione un prodúcto</option>
                                        @foreach ($productos as $producto)
                                            <option value="{{ $producto->id_producto }}">
                                                {{ $producto->nombre }} ->
                                                {{ $producto->presentacion }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label>Productos</label>
                                </div>
                                <div class="form-floating col-lg-2">
                                    <input type="number" id="cantidad" name="cantidad"
                                        class="form-control input-lg fw-bold fs-3 text-info" placeholder="Movimiento 1" />
                                    <label>Cantidad:</label>
                                </div>
                                <div class="form-floating col-lg-2">
                                    <input type="number" id="precio" name="precio"
                                        class="form-control fw-bold fs-3 text-info" placeholder="Movimiento 2" />
                                    <label>Monto:</label>
                                </div>

                                <div class="form-floating col-lg-3">
                                    <button class="btn btn-danger btn-sm btn w-100 fw-bold" id="btnRegistrarProducto"
                                        name="btnRegistrarProducto">
                                        <i class="ki-outline ki-brifecase-tick text-white fs-2x"></i>
                                        Agregar
                                    </button>
                                </div>

                            </div>

                            <div class="table-responsive">
                                <hr>
                                <table class="table table-hover table-rounded table-striped border gy-1 fs-2 ">

                                    <thead>
                                        <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                            <th class="min-w-30px">Acciones</th>
                                            <th class="min-w-150px">Producto</th>
                                            <th clcass="min-w-140px " style="text-align: right">Cantidad</th>
                                            <th class="min-w-140px" style="text-align: right">Precio</th>
                                            <th class="min-w-140px" style="text-align: right">Total</th>

                                        </tr>
                                    </thead>
                                    <tbody id="tableDetallesFactura">
                                        <tr>
                                            <td colspan="5">
                                                No data
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>




                    <!--end::Pos food-->
                </div>
                <!--end::Content-->
                <!--begin::Sidebar-->
                <div class="flex-row-auto w-xl-300px">
                    <!--begin::Pos order-->
                    <div class="card card-flush bg-body" id="kt_pos_form">
                        <!--begin::Body-->
                        <div class="card-body pt-0">
                            <!--begin::Summary-->
                            <div class="d-flex flex-stack bg-success rounded-3 p-3 mb-11">
                                <!--begin::Content-->
                                <div class="fs-6 fw-bold text-white">


                                    <span class="d-block lh-1 mb-2">Subtotal</span>
                                    <span class="d-block mb-2">IVA(13%)</span>
                                    <span class="d-block mb-2">Percepción(1%)</span>
                                    <span class="d-block fs-2qx lh-1">Total</span>
                                </div>
                                <!--end::Content-->
                                <!--begin::Content-->
                                <div class="fs-6 fw-bold text-white text-end">
                                    <span class="d-block lh-1 mb-2" id='subtotal'>$0.00</span>
                                    <span class="d-block mb-2"id='iva'>$0.00</span>
                                    <span class="d-block mb-2" id='percepcion'>$0.00</span>
                                    <span class="d-block fs-2qx lh-1" id='totalFactura'>$0.00</span>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Summary-->
                            <!--begin::Payment Method-->
                            <div class="m-0">
                                <!--begin::Actions-->
                                <button class="btn btn-primary fs-1 w-100 py-4" id="btnFinalizarFactura" name="btnFinalizarCompra">Finalizar Factura</button>
                                <!--end::Actions-->
                            </div>
                            <!--end::Payment Method-->
                        </div>
                        <!--end: Card Body-->
                    </div>
                    <!--end::Pos order-->
                </div>
                <!--end::Sidebar-->
            </div>
            <!--end::Layout-->





        </div>

    </div>
@endsection
<link href=" {{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/app/facturas.js') }}"></script>

@section('scripts')
    <script>
        $(document).ready(function() {

            $("#tipo_documento").on('change',function(){

              $.get('/correlativos/getNumDocumento/'+this.value,function(data){
                $("#numero_factura").val(data["ultimo_emitido"]);
              });
            });

        });
    </script>
@endsection
