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
                    <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;
                    Administración | {{ Session::get('name_module') }}
                    <span class="ribbon-inner bg-info"></span>
                </div>
                <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                    <li class="nav-item">
                        <a class="nav-link text-active-info d-flex align-items-center  active" data-bs-toggle="tab"
                            href="#tab_empresa">
                            <i class="ki-solid ki-shop fs-2 me-2"></i>
                            Empresa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-active-info d-flex align-items-center" data-bs-toggle="tab"
                            href="#tabCredito">
                            <i class="ki-solid ki-price-tag fs-2 me-2"></i>

                            Créditos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-active-info d-flex align-items-center" data-bs-toggle="tab" href="#tabCaja">
                            <i class="ki-solid ki-verify fs-2 me-2"></i>
                            Caja
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-active-info d-flex align-items-center" data-bs-toggle="tab"
                            href="#tabSocios">
                            <i class="ki-solid ki-user fs-2 me-2"></i>
                            Socios
                        </a>
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

                    <div class="tab-pane fade" id="tabCredito" role="tabpanel">
                        <div class="form-group row mb-5 ">
                            <span class="badge badge-light-success fs-4">Capitalizacion de Aportaciones</span>
                            <hr>
                            <div class="form-floating col-lg-4">
                                <input type="number" step="any" min="0" required
                                    value="{{ $configuracion->porcentaje_capitalizacion }}"
                                    class="form-control text-info" name="porcentaje_capitalizacion"
                                    id="porcentaje_capitalizacion" placeholder="Interes Moratorio" aria-label="saldo"
                                    aria-describedby="basic-addon1" />
                                <label for="floatingPassword">Porcentaje Capitalizacion %</label>
                            </div>
                            <div class="form-floating col-lg-6">
                                <select name="cuenta_capitalizacion" id="cuenta_capitalizacion"
                                    class="form-select form-select-solid form-select-dark" data-control="select2">
                                    @foreach ($catalogo as $cuenta)
                                        @if ($cuenta->movimiento == 0)
                                            <optgroup label="{{ $cuenta->descripcion }}">
                                        @endif

                                        <option value="{{ $cuenta->id_cuenta }}"
                                            {{ $cuenta->id_cuenta == $configuracion->cuenta_capitalizacion ? 'selected' : '' }}>
                                            {{ $cuenta->numero }}->
                                            {{ $cuenta->descripcion }}

                                        </option>
                                        @if ($cuenta->movimiento == 0)
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="floatingPassword">Cuenta Capitalizacion</label>
                            </div>


                        </div>
                        <!--begin::row group-->
                        <div class="form-group row mb-5 ">
                            <span class="badge badge-light-danger fs-4">Parametros Moratorios</span>
                            <hr>
                            <div class="form-floating col-lg-4">
                                <input type="number" required value="{{ $configuracion->dias_gracia }}"
                                    class="form-control text-info" name="dias_gracia" id="dias_gracia"
                                    placeholder="Interes Moratorio" aria-label="saldo" aria-describedby="basic-addon1" />
                                <label for="floatingPassword">Dias de Gracia</label>
                            </div>
                            <div class="form-floating col-lg-4">
                                <input type="number" step="any" required
                                    value="{{ $configuracion->interes_moratorio }}" class="form-control text-info"
                                    name="interes_moratorio" id="interes_moratorio" placeholder="Interes Moratorio"
                                    aria-label="saldo" aria-describedby="basic-addon1" />
                                <label for="floatingPassword">Tasa Interes Moratorio %</label>
                            </div>
                            <div class="form-floating col-lg-4">
                                <input type="number" required step="any"
                                    value="{{ $configuracion->consulta_crediticia }}" class="form-control text-info"
                                    name="consulta_crediticia" id="consulta_crediticia" placeholder="Interes Moratorio"
                                    aria-label="saldo" aria-describedby="basic-addon1" />
                                <label for="floatingPassword">Monto por Consulta crediticia</label>
                            </div>

                        </div>
                        <div class="form-group row mb-5 ">
                            <h3></h3>
                            <span class="badge badge-light-info fs-4">Parametros Contables</span>

                            <hr>
                            <div class="form-floating col-lg-6">
                                <select name="monto_deposito_credito" id="monto_deposito_credito"
                                    class="form-select form-select-solid form-select-dark" data-control="select2">
                                    @foreach ($catalogo as $cuenta)
                                        @if ($cuenta->movimiento == 0)
                                            <optgroup label="{{ $cuenta->descripcion }}">
                                        @endif

                                        <option value="{{ $cuenta->id_cuenta }}"
                                            {{ $cuenta->id_cuenta == $configuracion->monto_deposito_credito ? 'selected' : '' }}>
                                            {{ $cuenta->numero }}->
                                            {{ $cuenta->descripcion }}

                                        </option>
                                        @if ($cuenta->movimiento == 0)
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="floatingPassword">Cuenta Deposito</label>
                            </div>
                            <div class="form-floating col-lg-6">
                                <select name="cuenta_tipo_credito" id="cuenta_tipo_credito"
                                    class="form-select form-select-solid form-select-dark" data-control="select2">
                                    @foreach ($catalogo as $cuenta)
                                        @if ($cuenta->movimiento == 0)
                                            <optgroup label="{{ $cuenta->descripcion }}">
                                        @endif

                                        <option value="{{ $cuenta->id_cuenta }}"
                                            {{ $cuenta->id_cuenta == $configuracion->cuenta_tipo_credito ? 'selected' : '' }}>
                                            {{ $cuenta->numero }}->
                                            {{ $cuenta->descripcion }}

                                        </option>
                                        @if ($cuenta->movimiento == 0)
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="floatingPassword">Cuenta Crédito</label>
                            </div>

                        </div>
                        <div class="form-group row mb-5 ">
                            <div class="form-floating col-lg-6">
                                <select name="cuenta_aportacion" id="cuenta_aportacion"
                                    class="form-select form-select-solid form-select-dark" data-control="select2">
                                    @foreach ($catalogo as $cuenta)
                                        @if ($cuenta->movimiento == 0)
                                            <optgroup label="{{ $cuenta->descripcion }}">
                                        @endif

                                        <option value="{{ $cuenta->id_cuenta }}"
                                            {{ $cuenta->id_cuenta == $configuracion->cuenta_aportacion ? 'selected' : '' }}>
                                            {{ $cuenta->numero }}->
                                            {{ $cuenta->descripcion }}

                                        </option>
                                        @if ($cuenta->movimiento == 0)
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="floatingPassword">Cuenta de Aportaciones</label>
                            </div>


                            <div class="form-floating col-lg-6">
                                <select name="cuenta_interes_credito" id="cuenta_interes_credito"
                                    class="form-select form-select-solid form-select-dark" data-control="select2">
                                    @foreach ($catalogo as $cuenta)
                                        @if ($cuenta->movimiento == 0)
                                            <optgroup label="{{ $cuenta->descripcion }}">
                                        @endif

                                        <option value="{{ $cuenta->id_cuenta }}"
                                            {{ $cuenta->id_cuenta == $configuracion->cuenta_interes_credito ? 'selected' : '' }}>
                                            {{ $cuenta->numero }}->
                                            {{ $cuenta->descripcion }}

                                        </option>
                                        @if ($cuenta->movimiento == 0)
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="floatingPassword">Cuenta Intereses Sobre Prestamos</label>
                            </div>


                        </div>
                        <div class="form-group row mb-5 ">
                            <div class="form-floating col-lg-6">
                                <select name="cuenta_interes_credito_moratorio" id="cuenta_interes_credito_moratorio"
                                    class="form-select form-select-solid form-select-dark" data-control="select2">
                                    @foreach ($catalogo as $cuenta)
                                        @if ($cuenta->movimiento == 0)
                                            <optgroup label="{{ $cuenta->descripcion }}">
                                        @endif

                                        <option value="{{ $cuenta->id_cuenta }}"
                                            {{ $cuenta->id_cuenta == $configuracion->cuenta_interes_credito_moratorio ? 'selected' : '' }}>
                                            {{ $cuenta->numero }}->
                                            {{ $cuenta->descripcion }}

                                        </option>
                                        @if ($cuenta->movimiento == 0)
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="floatingPassword">Cuenta Interes Moratorio</label>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabCaja" role="tabpanel">
                        <div class="form-group row mb-5 ">
                            <span class="badge badge-light-success fs-4 mb-5">Parametros Depositos</span>

                            <div class="form-floating col-lg-6">
                                <select name="deposito_cuenta_debe" id="deposito_cuenta_debe"
                                    class="form-select form-select-solid form-select-dark" data-control="select2">
                                    @foreach ($catalogo as $cuenta)
                                        @if ($cuenta->movimiento == 0)
                                            <optgroup label="{{ $cuenta->descripcion }}">
                                        @endif

                                        <option value="{{ $cuenta->id_cuenta }}"
                                            {{ $cuenta->id_cuenta == $configuracion->deposito_cuenta_debe ? 'selected' : '' }}>
                                            {{ $cuenta->numero }}->
                                            {{ $cuenta->descripcion }}

                                        </option>
                                        @if ($cuenta->movimiento == 0)
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="floatingPassword">Cuenta DEBE Depositos</label>
                            </div>
                            <div class="form-floating col-lg-6">
                                <select name="deposito_cuenta_haber" id="deposito_cuenta_haber"
                                    class="form-select form-select-solid form-select-dark" data-control="select2">
                                    @foreach ($catalogo as $cuenta)
                                        @if ($cuenta->movimiento == 0)
                                            <optgroup label="{{ $cuenta->descripcion }}">
                                        @endif

                                        <option value="{{ $cuenta->id_cuenta }}"
                                            {{ $cuenta->id_cuenta == $configuracion->deposito_cuenta_haber ? 'selected' : '' }}>
                                            {{ $cuenta->numero }}->
                                            {{ $cuenta->descripcion }}

                                        </option>
                                        @if ($cuenta->movimiento == 0)
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="floatingPassword">Cuenta HABER Depositos</label>

                            </div>

                        </div>
                        <div class="form-group row mb-5 ">
                            <span class="badge badge-light-danger fs-4 mb-5">Parametros Retiros</span>

                            <div class="form-floating col-lg-6">
                                <select name="retiro_cuenta_debe" id="retiro_cuenta_debe"
                                    class="form-select form-select-solid form-select-dark" data-control="select2">
                                    @foreach ($catalogo as $cuenta)
                                        @if ($cuenta->movimiento == 0)
                                            <optgroup label="{{ $cuenta->descripcion }}">
                                        @endif

                                        <option value="{{ $cuenta->id_cuenta }}"
                                            {{ $cuenta->id_cuenta == $configuracion->retiro_cuenta_debe ? 'selected' : '' }}>
                                            {{ $cuenta->numero }}->
                                            {{ $cuenta->descripcion }}

                                        </option>
                                        @if ($cuenta->movimiento == 0)
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="floatingPassword">Cuenta DEBE Depositos</label>
                            </div>
                            <div class="form-floating col-lg-6">
                                <select name="retiro_cuenta_haber" id="retiro_cuenta_haber"
                                    class="form-select form-select-solid form-select-dark" data-control="select2">
                                    @foreach ($catalogo as $cuenta)
                                        @if ($cuenta->movimiento == 0)
                                            <optgroup label="{{ $cuenta->descripcion }}">
                                        @endif

                                        <option value="{{ $cuenta->id_cuenta }}"
                                            {{ $cuenta->id_cuenta == $configuracion->retiro_cuenta_haber ? 'selected' : '' }}>
                                            {{ $cuenta->numero }}->
                                            {{ $cuenta->descripcion }}

                                        </option>
                                        @if ($cuenta->movimiento == 0)
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="floatingPassword">Cuenta HABER Depositos</label>

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabSocios" role="tabpanel">
                        <div class="form-group row mb-5 ">
                            <span class="badge badge-light-success fs-4 mb-5">Parametros Depositos</span>
                            <div class="form-floating col-lg-4">
                                <div class="form-check form-switch form-check-custom form-check-solid me-10"
                                    style="margin:4px">
                                    <input class="check-permiso form-check-input h-30px w-50px border-2" type="checkbox"
                                        {{ $configuracion->socio_automatico == 1 ? 'checked' : '' }} id="socio_automatico"
                                        name="socio_automatico"
                                        value="{{ $configuracion->socio_automatico == 1 ? '1' : '0' }}" />

                                    <label class="form-check-label" for="socio_automatico">
                                        Numero Socio Automatico
                                    </label>
                                </div>
                            </div>
                        </div>
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
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#socio_automatico').change(function() {
                $(this).val(this.checked ? '1' : '0');
            });
        });
    </script>
@endsection
