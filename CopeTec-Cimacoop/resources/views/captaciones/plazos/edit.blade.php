@extends('base.base')
@section('title')
    Editar Rol
@endsection
@section('content')
    <form action="/captaciones/plazos/put" method="post" autocomplete="off">
        {!! csrf_field() !!}
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{ $plazo->id_plazo }}">
        <div class="card shadow-lg">
            <div class="card-header ribbon ribbon-end ribbon-clip">
                <div class="card-toolbar">
                    <a href="/captaciones/plazos">

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
                    <i class="ki-duotone ki-calendar-tick text-white fs-3x"><span class="path1"></span><span
                            class="path2"></span><span class="path3"></span></i>
                    Modificar Plazo
                    <span class="ribbon-inner bg-info"></span>
                </div>
            </div>
            <div class="card-body">
                <!--begin::row group-->
                <div class="form-group row mb-5">
                    <div class="form-floating col-lg-8">
                        <input type="text" value="{{ $plazo->descripcion }}" required class="form-control"
                            placeholder="descripcion" name="descripcion" />
                        <label>Descripcion:</label>
                    </div>
                    <div class="form-floating col-lg-4">
                        <input type="number" step="1" min="6" value="{{ $plazo->meses }}" required
                            class="form-control" placeholder="meses" name="meses" />
                        <label>Periodo:</label>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center py-6">
                <div class="form-floating col-lg-4">
                    <button type="submit" class="btn btn-bg-primary btn-text-white">
                        <i class="fa-solid fa-save  fa-2x text-white"></i>
                        Modificar Plazo</button>
                </div>
            </div>
        </div>
        <div class="input-group mb-5"></div>




    </form>
@endsection
