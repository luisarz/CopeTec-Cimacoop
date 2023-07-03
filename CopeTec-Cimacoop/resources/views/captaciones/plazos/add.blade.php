@extends('base.base')
@section('title')
    Editar Rol
@endsection
@section('content')
    <form action="/captaciones/plazos/add" method="post" autocomplete="off">
        {!! csrf_field() !!}
        {{ method_field('POST') }}
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
                    <i class="ki-duotone ki-calendar text-white fs-3x"><span class="path1"></span><span
                            class="path2"></span><span class="path3"></span></i> &nbsp;
                    Registrar Plazo
                    <span class="ribbon-inner bg-success"></span>
                </div>
            </div>
            <div class="card-body">
                <!--begin::row group-->
                <div class="form-group row mb-5">
                    <div class="form-floating col-lg-8">
                        <input type="text"  required class="form-control"
                            placeholder="descripcion" name="descripcion" />
                        <label>Descripcion:</label>
                    </div>
                    <div class="form-floating col-lg-4">
                        <input type="number" step="1" min="6"  required
                            class="form-control" placeholder="meses" name="meses" />
                        <label>Periodo:</label>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center py-6">
                <div class="form-floating col-lg-4">
                    <button type="submit" class="btn btn-bg-success btn-text-white">
                        <i class="fa-solid fa-save  fa-2x text-white"></i>
                        Registrar Nuevo Plazo</button>
                </div>
            </div>
        </div>
        <div class="input-group mb-5"></div>




    </form>
@endsection
