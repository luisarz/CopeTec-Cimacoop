@extends('base.base')
@section('title')
    Modificar Proveedor
@endsection
@section('content')
    <form action="/proveedores/add" method="post" autocomplete="off">
        {!! csrf_field() !!}
        {{ method_field('POST') }}
        <div class="input-group mb-5"></div>

        <div class="card shadow-lg">
            <div class="card-header ribbon ribbon-end ribbon-clip">
                <div class="card-toolbar">
                    <a href="/proveedores/list">

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
                    <i class="ki-duotone ki-shield-tick text-white fs-2x"><span class="path1"></span><span
                            class="path2"></span><span class="path3"></span></i>
                    Nuevo Proveedor
                    <span class="ribbon-inner bg-danger"></span>
                </div>
            </div>
            <div class="card-body">

                <!--begin::row group-->
                <div class="form-group row mb-5">
                    <div class="form-floating col-lg-6">
                        <input type="text" name="razon_social" class="form-control" required">
                        <label for="floatingPassword">Razon Social</label>
                    </div>
                    <div class="form-floating col-lg-2">
                        <input type="text" name="dui" class="form-control">
                        <label>DUI</label>
                    </div>
                    <div class="form-floating col-lg-2">
                        <input type="text" name="nit" class="form-control" >
                        <label>NIT</label>
                    </div>
                    <div class="form-floating col-lg-2">
                        <input type="text" name="nrc" class="form-control" >
                        <label>NRC</label>
                    </div>
                </div>
                <!--begin::row group-->
                <div class="form-group row mb-5">
                    <div class="form-floating col-lg-4">
                        <input type="text" name="direccion" class="form-control">
                        <label for="floatingPassword">Direccion</label>
                    </div>
                    <div class="form-floating col-lg-4">
                        <input type="text" name="telefono" class="form-control" >
                        <label>Telefono</label>
                    </div>
                    <div class="form-floating col-lg-4">
                        <input type="number" min="2" name="decimales" class="form-control" value="2">
                        <label>Decimales</label>
                    </div>
                </div>



            </div>
            <div class="card-footer d-flex justify-content-center py-6">
                <button type="submit" class="btn btn-bg-primary btn-text-white">Agregar</button>
            </div>
        </div>

    </form>
@endsection
