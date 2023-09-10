@extends('base.base')
@section('formName')
    <a href="/compras/list">

        <button type="button" class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
            <i class="ki-duotone ki-black-left-line  text-dark   fs-2x">
                <i class="path1"></i>
                <i class="path2"></i>
            </i>
            Cancelar
        </button>
    </a>
    <span class="badge badge-info mx-2 fs-3">Nueva Compra</span>
@endsection
@section('content')
    <input type="hidden" id="token" value="{{ csrf_token() }}">

    <div class="card shadow-lg mt-3">
        <div class="card-body">
            <div class="form-group row mb-2">
                <div class="form-floating  col-lg-6">
                    <input type="date" class="form-control" value="{{ date('Y-d-m') }}">
                    <label>Fecha Compra:</label>

                </div>
                <div class="form-floating  col-lg-6">
                    <select class="form-select fs-4" name="id_proveedor" id="id_proveedor" data-control="select2">
                        <option value="">Seleccione una cuenta</option>
                        @foreach ($proveedores as $producto)
                            <option value="{{ $producto->id_proveedor }}">
                                {{ $producto->razon_social }} ->
                                {{ $producto->dui }}
                            </option>
                        @endforeach
                    </select>
                    <label>Proveedor</label>
                </div>
            </div>
        </div>
    </div>


    <div class="card shadow-lg mt-3">

        <div class="card-body">



            <div class="d-flex flex-column flex-xl-row">
                <div class="d-flex flex-row-fluid me-xl-9 mb-10 mb-xl-0">
                    Productos
                </div>
                <div class="card card-flush card-p-0 bg-transparent border-0">
                    Productos comprasdo
                </div>
            </div>


            <div class="form-group col mb-5">


                <div class="card card-dashed shadow-sm">

                    <div class="card-body ">
                        <h3>Detalles de liquidación</h3>
                        <hr>
                        <div class="form-group row mb-1">

                            <div class="form-floating col-lg-4">
                                <select class="form-select fs-4" name="id_cuenta" id="id_cuenta" data-control="select2">
                                    <option value="">Seleccione una cuenta</option>
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
                                <input type="number" id="monto_debe" name="monto_debe"
                                    class="form-control fw-bold fs-3 text-info" placeholder="Movimiento 1" />
                                <label>Cantidad:</label>
                            </div>
                            <div class="form-floating col-lg-2">
                                <input type="number" id="monto_haber" name="monto_haber"
                                    class="form-control fw-bold fs-3 text-info" placeholder="Movimiento 2" />
                                <label>Precio:</label>
                            </div>
                            <div class="form-floating col-lg-2">
                                <input type="number" id="monto_haber" name="monto_haber"
                                    class="form-control fw-bold fs-3 text-info" placeholder="Movimiento 2" />
                                <label>Total:</label>
                            </div>
                            <div class="form-floating col-lg-2">
                                <button class="btn btn-danger btn w-100 fw-bold" id="btnAplicarDescuento"
                                    name="btnAplicarDescuento">
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
                                        <th clcass="min-w-140px" style="text-align: right">Cantidad</th>
                                        <th class="min-w-140px" style="text-align: right">Precio</th>
                                        <th class="min-w-140px" style="text-align: right">Total</th>

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
