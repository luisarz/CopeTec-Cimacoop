@extends('base.base')
@section('title')
    Modificar correlativo
@endsection
@section('content')
    <form action="/correlativos/caja/edit-correlativo/put" method="post" autocomplete="nope">
        {!! csrf_field() !!}
        {{ method_field('PUT') }}
        <input type="hidden" name="id_correlativo" value="{{ $correlativo->id_correlativo }}">
        <input type="hidden" name="id_caja" value="{{ $correlativo->id_caja }}">

       <div class="card mt-3 shadow-lg">
        <div class="card-header">
               <span class="card-title fw-bolder fs-3">Modificar correlativo
                    <span class="d-block text-muted font-size-sm">{{ $correlativo->numero_caja }}</span>
               </span>
        </div>
         <div class="card-body">
            <!--begin::row group-->
            <div class="form-group row mb-4">
                     <div class="form-floating col-lg-6">
                  <input type="text" class="form-control" id="numero_caja" name="numero_caja" value="{{ $correlativo->numero_caja }}" disabled>
                    <label>Caja:</label>
                </div>
                     <div class="form-floating col-lg-6">
                  <input type="text" class="form-control text-danger font-bold" id="ultimo_emitido" name="ultimo_emitido" value="{{ $correlativo->ultimo_emitido }}">
                    <label>Último Emitido:</label>
                </div>
            </div>
            <div class="form-group row mb-4">


                
                <div class="form-floating col-lg-6">
                    <select required name="tipo_documento" id="tipo_documento" data-control="select2" class="form-select">
                        @if ($correlativo->tipo_documento == 'Factura')
                            <option value="Factura" selected>Factura</option>
                            <option value="CCF">CCF</option>
                        @else
                            <option value="Factura">Factura</option>
                            <option value="CCF" selected>CCF</option>
                        @endif
                    </select>
                    <label>Cajero:</label>
                </div>
                <div class="form-floating col-lg-6">
                  <input type="text" class="form-control" id="resolucion" name="resolucion" value="{{ $correlativo->resolucion }}" required>
                    <label>Resolucion:</label>
                </div>
           
            </div>
              <div class="form-group row mb-4">
                 <div class="form-floating col-lg-6">
                  <input type="number" class="form-control" min="1" id="documento_inicial" name="documento_inicial" value="{{ $correlativo->documento_inicial }}" required>
                    <label>Documento Inicial:</label>
                </div>
                <div class="form-floating col-lg-6">
                  <input type="number" class="form-control" id="documento_final" name="documento_final" value="{{ $correlativo->documento_final }}" required>
                    <label>Documento Final:</label>
                </div>
              </div>
               <div class="form-group row mb-4">
            
              </div>
            <div class="card-footer d-flex justify-content-end py-6">
                <button type="submit" class="btn btn-bg-primary btn-text-white">Modificar</button>
            </div>
        </div>
       </div>
    </form>
@endsection
