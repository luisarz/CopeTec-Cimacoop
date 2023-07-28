@extends('base.base')
@section('title')
    Editar Rol
@endsection
@section('content')
    <form action="/contabilidad/partidas/add" method="post" autocomplete="off">
        {!! csrf_field() !!}
        {{ method_field('POST') }}

        <div class="card card-bordered shadow-lg mt-5">
            <div class="card-header ribbon ribbon-end ribbon-clip">
                <div class="card-toolbar">
                    <a href="/contabilidad/partidas">

                        <button type="button"
                            class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
                            <i class="ki-outline ki-black-left-line  text-dark   fs-2x">
                            </i>
                        </button>
                    </a>

                </div>
                <div class="ribbon-label fs-3">
                    <i class="ki-outline ki-calendar text-white fs-3x"></i>
                    Nueva - Partida Contable
                    <span class="ribbon-inner bg-info"></span>
                </div>
            </div>
            <div class="card-body">



                <!--begin::row group-->
                <div class="form-group row mb-5">
                      <div class="form-floating col-lg-4">
                      <select class="form-select form-select-solid" name="tipo_catalogo" id="tipo_catalogo" data-control="select2">
                          @foreach ($tipoCatalogo as $tipo)
                              <option value="{{ $tipo->id_tipo_catalogo }}">{{ $tipo->descripcion }}</option>
                            @endforeach
                        </select>
                        <label>Número de Partida:</label>
                    </div>
                    <div class="form-floating col-lg-4">
                        <input type="text" name="numero" id="numero" class="form-control" required placeholder="Codigo">
                        <label>Fecha de Partida:</label>
                    </div>
                    <div class="form-floating col-lg-4">
                        <input type="text" name="descripcion" id="descripcion" class="form-control" required placeholder="Des">
                        <label>Tipo Partida:</label>
                    </div>


                </div>
                <!--begin::row group-->
                <div class="form-group row mb-5">
                    <div class="form-floating col-lg-4">
                        <input type="number" name="saldo" id="saldo" class="form-control" required placeholder="Saldo Cuenta">
                        <label>SALDO CUENTA:</label>
                    </div>
                    <div class="form-floating col-lg-2">
                           <select class="form-select form-select-solid" name="iva" id="iva" data-control="">
                            <option value="1">Aplica IVA</option>
                            <option value="0" selected>Sin IVA</option>
                        </select>
                        <label>IVA:</label>
                    </div>
                    <div class="form-floating col-lg-2">
                       
                        <select class="form-select form-select-solid" name="movimiento" id="movimiento" data-control="">
                            <option value="1">SI</option>
                            <option value="0">NO</option>
                        </select>
                        <label>MOVIMIENTO:</label>
                    </div>
                     <div class="form-floating col-lg-4">
                       
                        <select class="form-select form-select-solid" name="estado" id="estado" data-control="">
                            <option value="1">ACTIVO</option>
                            <option value="0">INACTIVO</option>
                        </select>
                        <label>ESTADO:</label>
                    </div>


                </div>

            </div>
            <div class="card-footer d-flex justify-content-center py-6">
                <div class="form-floating col-lg-4">

                    <a href="/contabilidad/partidas">

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
                        Aperturar Cuenta
                    </button>
                </div>
            </div>
        </div>

    </form>
@endsection
@section('scripts')
    <link href=" {{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script></script>
@endsection
