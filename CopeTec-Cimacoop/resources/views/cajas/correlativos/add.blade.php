@extends('base.base')
@section('title')
    Agregar correlativo
@endsection
@section('content')
    <form action="/correlativos/caja/add" method="post" autocomplete="nope">
        {!! csrf_field() !!}
        {{ method_field('POST') }}
        <input type="hidden" name="id_caja" value="{{ $id_caja }}">

        <div class="card mt-3 shadow-lg">
            <div class="card-header">
                <div class="card-toolbar">
                    <a href="/correlativos/caja/{{ $id_caja }}/list"
                        class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger mx-3"><i
                            class="ki-outline ki-black-left-line"></i> Volver</a>

                    <div class="ribbon-label fs-3">
                        <i class="ki-outline  text-white fs-2x"></i> &nbsp;
                        Agregar Correlativos | {{ $caja->numero_caja }}
                        <span class="ribbon-inner bg-info"></span>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <!--begin::row group-->
                <div class="form-group row mb-4">
                    <div class="form-floating col-lg-6">
                        <input type="text" class="form-control" id="numero_caja" name="numero_caja"
                            value="{{ $caja->numero_caja }}" disabled>
                        <label>Caja:</label>
                    </div>
                    <div class="form-floating col-lg-6">
                        <input type="text" class="form-control text-danger font-bold" id="ultimo_emitido"
                            name="ultimo_emitido" required>
                        <label>Último Emitido:</label>
                    </div>
                </div>
                <div class="form-group row mb-4">



                    <div class="form-floating col-lg-6">
                        <select required name="tipo_documento" id="tipo_documento" data-control="select2"
                            class="form-select" required>
                            <option value="Factura" selected>Factura</option>
                            <option value="CCF">CCF</option>

                        </select>
                        <label>Cajero:</label>
                    </div>
                    <div class="form-floating col-lg-6">
                        <input type="text" class="form-control" id="resolucion" name="resolucion" required>
                        <label>Resolucion:</label>
                    </div>

                </div>
                <div class="form-group row mb-4">
                    <div class="form-floating col-lg-6">
                        <input type="number" class="form-control" min="1" id="documento_inicial"
                            name="documento_inicial" required>
                        <label>Documento Inicial:</label>
                    </div>
                    <div class="form-floating col-lg-6">
                        <input type="number" class="form-control" id="documento_final" name="documento_final" required>
                        <label>Documento Final:</label>
                    </div>
                </div>
                <div class="form-group row mb-4">

                </div>
                <div class="card-footer d-flex justify-content-end py-6">
                    <button type="submit" class="btn btn-bg-primary btn-text-white">Agregar</button>
                </div>
            </div>
            <div class="card-footer">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </form>


    <!-- Resto de tu vista aquí -->


@endsection
