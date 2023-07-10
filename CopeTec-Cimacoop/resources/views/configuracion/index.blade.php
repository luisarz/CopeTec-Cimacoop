@extends('base.base')

@section('title')
    Administracion de Empleados
@endsection

@section('content')
    <form action="/configuracion/update" method="POST" autocomplete="off">
        {!! csrf_field() !!}
        <div class="card shadow-lg mt-5">
            <div class="card-header ribbon ribbon-end ribbon-clip">

                <div class="ribbon-label fs-3">
                    <i class="ki-duotone ki-user-tick text-white fs-2x"><span class="path1"></span><span
                            class="path2"></span><span class="path3"></span></i>
                    Configuracion de Empresa
                    <span class="ribbon-inner bg-info"></span>
                </div>
                <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#tab_empresa">Empresa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tabCorreo">Correo</a>
                    </li>

                </ul>
            </div>

            <div class="card-body">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab_empresa" role="tabpanel">
                        <!--begin::row group-->
                        <div class="form-group row mb-5">
                            <div class="form-floating col-lg-4">
                                <input type="text" required value="{{ $configuracion->nombre_empresa }}"
                                    class="form-control text-info" name="nombre_empresa" id="nombre_empresa"
                                    placeholder="nombre_empresa" aria-label="saldo" aria-describedby="basic-addon1" />
                                <label for="floatingPassword">Empresa</label>
                            </div>
                            <div class="form-floating col-lg-4">
                                <input type="text" required value="{{ $configuracion->nombre_comercial }}"
                                    class="form-control text-info" name="nombre_comercial" id="nombre_comercial"
                                    placeholder="nombre_comercial" aria-label="nombre_comercial"
                                    aria-describedby="basic-addon1" />
                                <label for="floatingPassword">Nombre Comercial</label>
                            </div>
                            <div class="form-floating col-lg-4">
                                <input type="text" required value="{{ $configuracion->rubro }}"
                                    class="form-control text-info" name="rubro" id="rubro" placeholder="rubro"
                                    aria-label="rubro" aria-describedby="basic-addon1" />
                                <label for="floatingPassword">rubro</label>
                            </div>

                        </div>
                        <!--begin::row group-->
                        <div class="form-group row mb-5">
                            <div class="form-floating col-lg-4">
                                <input type="text" required value="{{ $configuracion->nrc }}"
                                    class="form-control text-info" name="nrc" placeholder="nrc" aria-label="saldo"
                                    aria-describedby="basic-addon1" />
                                <label for="floatingPassword">NRC</label>
                            </div>
                            <div class="form-floating col-lg-4">
                                <input type="text" required value="{{ $configuracion->nit }}"
                                    class="form-control text-info" name="nit" placeholder="nit" aria-label="nit"
                                    aria-describedby="basic-addon1" />
                                <label for="floatingPassword">NIT</label>
                            </div>
                            <div class="form-floating col-lg-4">
                                <input type="text" required value="{{ $configuracion->telefono }}"
                                    class="form-control text-info" name="telefono" placeholder="telefono"
                                    aria-label="telefono" aria-describedby="basic-addon1" />
                                <label for="floatingPassword">Telefono</label>
                            </div>

                        </div>
                        <div class="form-group row mb-5">
                            <div class="form-floating col-lg-4">
                                <input type="text" required value="{{ $configuracion->direccion }}"
                                    class="form-control text-info" name="direccion" placeholder="direccion"
                                    aria-label="saldo" aria-describedby="basic-addon1" />
                                <label for="floatingPassword">Dirección</label>
                            </div>
                            <div class="form-floating col-lg-4">
                                <input type="text" required value="{{ $configuracion->correo }}"
                                    class="form-control text-info" name="correo" placeholder="correo" aria-label="nit"
                                    aria-describedby="basic-addon1" />
                                <label for="floatingPassword">E-mail</label>
                            </div>


                        </div>
                    </div>

                    <div class="tab-pane fade" id="tabCorreo" role="tabpanel">
                        ...
                    </div>


                </div>

            </div>
            <div class="card-footer d-flex justify-content-center py-6">
                <button type="submit" class="btn btn-bg-info btn-text-white">
                    <i class="ki-duotone ki-notepad-edit    text-white fs-2x">
                        <i class="path1"></i>
                        <i class="path2"></i>
                        <i class="path3"></i>
                    </i>
                    Actualizar Información</button>
            </div>
        </div>
    </form>
@endsection
