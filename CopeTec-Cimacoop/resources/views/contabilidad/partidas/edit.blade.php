@extends('base.base')
@section('title')
    Editar Rol
@endsection
@section('formName')
    <span class="badge badge-info fs-5">Patida ID: &nbsp;<span
            class="badge badge-danger">{{ $partida->id_partida_contable }}</span></span>
@endsection
@section('content')
    {{-- {{ $partida }} --}}
    <input type="hidden" name="id_partida" id="id_partida" value="{{ $partida->id_partida_contable }}">
    <input type="hidden" name="totalCargo" id="totalCargo">
    <input type="hidden" name="totalAbono" id="totalAbono">
    <input type="hidden" name="yearContable" id="yearContable" value="{{ $partida->year_contable }}">


    <input type="hidden" id="token" value="{{ csrf_token() }}">

    <form action="/contabilidad/partidas/put"  autocomplete="off">
        {!! csrf_field() !!}
        {{ method_field('PUT') }}


        <div class="card card-bordered shadow-lg mt-1 ">
            <div class="card-header card-header-sm ribbon ribbon-end ribbon-clip">
                <div class="card-toolbar">
                    <a href="/contabilidad/partidas">

                        <button type="button"
                            class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
                            <i class="ki-outline ki-black-left-line  text-dark   fs-1x">
                            </i>
                        </button>
                    </a>

                </div>
                <div class="ribbon-label fs-3">
                    <i class="ki-outline ki-abstract-26 text-white fs-2x"></i>
                    &nbsp; Modificar - Partida Contable
                    <span class="ribbon-inner bg-info"></span>
                </div>
            </div>
            <div class="card-body">
                <!--begin::row group-->
                <div class="form-group row mb-1">
                    <div class="form-floating col-lg-2">
                        <input type="text" name="num_partida" disabled id="num_partida"
                            value="{{ $partida->num_partida }}" class="form-control form-control-solid-bg" required
                            placeholder="Des">
                        <label>Nùmero de Partida:</label>
                    </div>

                    <div class="form-floating col-lg-2">
                        <input type="date" name="fecha_partida" id="fecha_partida" value="{{ $partida->fecha_partida }}"
                            class="form-control form-control-solid-bg" required placeholder="Codigo">
                        <label>Fecha de Partida:</label>
                    </div>
                    <div class="form-floating col-lg-2">
                        <select class="form-select form-select-solid" name="tipo_catalogo" id="tipo_catalogo"
                            data-control="">
                            @foreach ($tipoPartida as $tipo)
                                @if ($tipo->id_tipo_partida == $partida->tipo_partida)
                                    <option value="{{ $tipo->id_tipo_partida }}" selected>{{ $tipo->descripcion }}</option>
                                @else
                                    <option value="{{ $tipo->id_tipo_partida }}">{{ $tipo->descripcion }}</option>
                                @endif
                            @endforeach
                        </select>
                        <label>Tipo de Partida:</label>
                    </div>
                    <div class="form-floating col-lg-6">
                        <input type="text" name="concepto" id="concepto" value="{{ $partida->concepto }}"
                            class="form-control form-control-solid-bg" required placeholder="Concepto">
                        <label>Concepto</label>
                    </div>



                </div>
                <!--begin::row group-->
                <div class="form-group ">



                    <div class="card card-dashed shadow-sm">
                        <div class="card-body ">
                            <h5>Detalles de Partida Contable</h5>
                            <hr>
                            <div class="form-group row mb-1 alert alert-info d-flex align-items-center p-5">

                                <div class="form-floating col-lg-6">
                                    <select class="form-select fs-6" name="id_cuenta" id="id_cuenta" data-control="select2">
                                        <option value="">Seleccione una cuenta</option>
                                        @foreach ($catalogo as $cuenta)
                                            @if ($cuenta->movimiento == 0)
                                                <optgroup label="{{ $cuenta->descripcion }}">
                                            @endif
                                            <option value="{{ $cuenta->id_cuenta }}">
                                                {{ $cuenta->numero }} »
                                                {{ $cuenta->descripcion }}
                                            </option>
                                            @if ($cuenta->movimiento == 0)
                                                </optgroup>
                                            @endif
                                        @endforeach
                                    </select>
                                    <label>CATALOGO</label>
                                </div>
                                {{-- <div class="form-floating col-lg-2">
                                    <input type="number" id="parcial" name="parcial"
                                        class="form-control form-control-solid-bg  fw-bold fs-3 text-info"
                                        placeholder="Movimiento 1" />
                                    <label>PARCIAL:</label>
                                </div> --}}
                                <div class="form-floating col-lg-2">
                                    <input type="number" id="cargos" name="cargos"
                                        class="form-control form-control-solid-bg fw-bold fs-3 text-info"
                                        placeholder="Movimiento 1" />
                                    <label>CARGO:</label>
                                </div>
                                <div class="form-floating col-lg-2">
                                    <input type="number" id="abonos" name="abonos"
                                        class="form-control fw-bold fs-3 text-info" placeholder="Movimiento 2" />
                                    <label>ABONO:</label>
                                </div>
                                <div class="form-floating col-lg-2">
                                    <button class="btn btn-danger btn w-100 fw-bold" id="btnDetallePartidaAdd"
                                        name="btnDetallePartidaAdd">
                                        <i class="ki-outline ki-brifecase-tick text-white fs-2x"></i>
                                        Agregar
                                    </button>
                                </div>

                            </div>

                            <div class="table-responsive scroll h-200px px-1 form-group row mb-1 alert alert-info d-flex align-items-center p-5">
                                <table class="table table-hover table-bordered table-striped border gy-1 fs-5 ">

                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800">
                                            <th class="min-w-30px">Acciones</th>
                                            <th class="min-w-50px">Codigo</th>
                                            <th class="min-w-150px">Concepto</th>
                                            {{-- <th clcass="min-w-140px" style="text-align: right">PARCIAL</th> --}}
                                            <th class="min-w-140px" style="text-align: right">CARGO</th>
                                            <th class="min-w-140px" style="text-align: right">ABONO</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablePartidaDetalles">
                                        <tr>
                                            <td colspan="6">
                                                <center>
                                                    <span class="badge badge-light-info fs-2"> NO hay datos para
                                                        mostrar</span>
                                            </td>

                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="d-flex justify-content-end w-600px" >
                                    <span class="badge badge-info fs-3 mr-1 text-end">Totales &nbsp;
                                    <span  class="badge  badge-success fw-bold fs-3 w-150px text-end">
                                    <div class="col-md-2">
                                         <span id="montoDebe">
                                         0.00
                                     </span>
                                    </div>
                                    </span>
                                    <span id="montoHaber" class="badge badge-danger fw-bold fs-3 mx-1 w-150px text-end">0.00</span>
                                    </span>
                                </div>
                            </div>




                        </div>
                        <div class="card-footer">
                            <button type="submit" id="btnProcesarPartida" class="btn btn-bg-info btn-text-white">
                                <i class="fa-solid fa-save fs-2 text-white"></i>
                                Guardar Y Procesar
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </form>
@endsection
<link href=" {{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/app/partidas/partidas.add.js') }}"></script>

@section('scripts')
    <script>
        $(document).ready(function() {});
    </script>
@endsection
