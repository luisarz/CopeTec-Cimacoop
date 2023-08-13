@extends('base.base')
@section('title')
    Editar Rol
@endsection
@section('content')
    <form action="/captaciones/tasas/add" method="post" autocomplete="off">
        {!! csrf_field() !!}
        {{ method_field('POST') }}
        <input type="hidden" name="id_plazo" value="{{ $id }}">
        <div class="card shadow-lg justify-content-space-between">
            <div class="card-header ribbon ribbon-end ribbon-clip">
                <div class="card-toolbar">
                    <a href="/captaciones/tasas/{{ $id }}">
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
                    Registrar Nueva Tasa - para Deposito
                    <span class="ribbon-inner bg-success"></span>
                </div>
            </div>
            <div class="card-body">
                <!--begin::row group-->
                <div class="form-group row mb-5">
                    <div class="form-floating col-lg-4">
                        <input type="number" step="any" min="0.1" required class="form-control"
                            placeholder="valor" name="valor" />
                        <label>Tasa:</label>
                    </div>
                    <div class="form-floating col-lg-4">
                        <button type="submit" class="btn btn-bg-info btn-text-white">
                            <i class="fa-solid fa-save  fa-2x text-white"></i>
                            Registrar Nueva Tasa</button>
                    </div>

                </div>
            </div>

        </div>
        <div class="input-group mb-5"></div>




    </form>
@endsection
