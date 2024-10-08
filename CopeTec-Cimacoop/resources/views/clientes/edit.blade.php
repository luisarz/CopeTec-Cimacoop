@extends('base.base')
@section('title')
    Editar Cliente
@endsection
@section('content')
    <form action="/clientes/put" method="post" autocomplete="nope">
        {!! csrf_field() !!}
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{ $cliente->id_cliente }}">
        <div class="card shadow-lg mt-5">

            <div class="card-header ribbon ribbon-end ribbon-clip">
                <div class="card-toolbar">
                    <a href="/clientes">

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
                    Clientes | Modificar

                    <span class="ribbon-inner bg-info"></span>
                </div>
            </div>
            <div class="card-body">

                <!--begin::row group-->
                <div class="form-group row mb-5">
                    <div class="form-floating  col-lg-5">
                        <input type="text" required value="{{ $cliente->nombre }}" class="form-control" name="nombre"
                            placeholder="nombre" aria-label="nombre" aria-describedby="basic-addon1" />
                        <label>Nombre Cliente:</label>
                    </div>
                    <div class="form-floating  col-lg-3">
                        <select name="genero" required class="form-control">
                            @if ($cliente->genero == 1)
                                <option selected value="1">Masculino</option>
                                <option value="0">Femenino</option>
                            @else
                                <option value="1">Masculino</option>
                                <option selected value="0">Femenino</option>
                            @endif

                        </select>
                        <label>Genero:</label>
                    </div>
                    <div class="form-floating  col-lg-4">
                        <input type="date" max="{{ date('Y-m-d') }}" required value="{{ $cliente->fecha_nacimiento }}"
                            class="form-control" name="fecha_nacimiento" placeholder="fecha_nacimiento"
                            aria-label="fecha_nacimiento" aria-describedby="basic-addon1" />
                        <label>Fecha Nacimiento:</label>
                    </div>
                </div>
                <!--begin::row group-->
                <div class="form-group row mb-5">

                    <div class="form-floating  col-lg-3">
                        <input type="text" required value="{{ $cliente->dui_cliente }}" class="form-control"
                            name="dui_cliente" placeholder="dui_cliente" aria-label="dui" aria-describedby="basic-addon1" />
                        <label>Dui:</label>
                    </div>
                    <div class="form-floating  col-lg-5">
                        <input type="text" required value="{{ $cliente->dui_extendido }}" class="form-control"
                            name="dui_extendido" placeholder="Extendido en" aria-label="dui_extendido"
                            aria-describedby="basic-addon1" />
                        <label>Dui extendido en:</label>
                    </div>
                    <div class="form-floating  col-lg-4">
                        <input type="date" max="{{ date('Y-m-d') }}" required value="{{ $cliente->fecha_expedicion }}"
                            class="form-control" name="fecha_expedicion" placeholder="fecha_expedicion"
                            aria-label="fecha_expedicion" aria-describedby="basic-addon1" />
                        <label>Fecha Expedicion dui:</label>
                    </div>
                </div>
                <!--begin::row group-->
                <div class="form-group row mb-5">

                    <div class="form-floating  col-lg-3">
                        <input type="text" required value="{{ $cliente->telefono }}" class="form-control" name="telefono"
                            placeholder="telefono" aria-label="dui" aria-describedby="basic-addon1" />
                        <label>Telefono:</label>
                    </div>
                    <div class="form-floating  col-lg-5">
                        <input type="text" required value="{{ $cliente->nacionalidad }}" class="form-control"
                            name="nacionalidad" placeholder="Nacionalidad del cliente" aria-label="nacionalidad"
                            aria-describedby="basic-addon1" />
                        <label>Nacionalidad:</label>
                    </div>
                    <div class="form-floating  col-lg-4">
                        <input type="text" required value="{{ $cliente->estado_civil }}" class="form-control"
                            name="estado_civil" placeholder="Estad civil del cliente" aria-label="estado_civil"
                            aria-describedby="basic-addon1" />
                        <label>Estado civil:</label>

                    </div>
                </div>
                <div class="form-group row mb-5">
                    <div class="form-floating col-lg-12">
                        <input type="text"  value="{{ $cliente->conyugue }}" class="form-control" name="conyugue"
                               placeholder="telefono" aria-label="dui" aria-describedby="basic-addon1" />
                        <label>Conyugue:</label>
                    </div>
                </div>
                <!--begin::row group-->
                <div class="form-group row mb-5">
                    <div class="form-floating  col-lg-4">
                        <select name="profesion_id" data-control="select2" class="form-select">
                            @foreach ($profesiones as $profesion)
                                @if ($profesion->id == $cliente->profesion_id)
                                    <option  value="{{ $profesion->id }}" selected> {{ $profesion->name }}</option>
                                @else
                                    <option value="{{ $profesion->id }}">{{ $profesion->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <label>Profesión:</label>
                    </div>
                    <div class="form-floating  col-lg-8">
                        <input type="text" required value="{{ $cliente->direccion_personal }}" class="form-control"
                            name="direccion_personal" placeholder="Direccion" aria-label="dui"
                            aria-describedby="basic-addon1" />
                        <label>Direccion Personal:</label>
                    </div>

                </div>
                <div class="form-group row mb-5">


                    <div class="form-floating  col-lg-4">
                        <input type="text" value="{{ $cliente->nombre_negocio }}" class="form-control"
                            name="nombre_negocio" placeholder="Nombre negocio " aria-label="nombre_negocio"
                            aria-describedby="basic-addon1" />
                        <label>Nombre del negocio:</label>
                    </div>
                    <div class="form-floating  col-lg-8">
                        <input type="text" value="{{ $cliente->direccion_negocio }}" class="form-control"
                            name="direccion_negocio" placeholder="Direccion negocio del cliente"
                            aria-label="direccion_negocio" aria-describedby="basic-addon1" />
                        <label>Direccion del negocio:</label>
                    </div>

                </div>
                <!--begin::row group-->

                <div class="form-group row mb-5">
                    <div class="form-floating  col-lg-3">
                        <select name="tipo_vivienda" required class="form-control">
                            @if ($cliente->tipo_vivienda == 1)
                                <option selected value="1">Propia</option>
                                <option value="0">Alquilada</option>
                                <option value="2">Familiar</option>

                            @else
                                <option value="1">Propia</option>
                                <option selected value="0">Alquilada</option>
                                <option value="2">Familiar</option>

                            @endif
                        </select>
                        <label>Tipo de vivienda:</label>

                    </div>
                    <div class="form-floating  col-lg-9">
                        <input type="text" value="{{ $cliente->observaciones }}" class="form-control"
                            name="observaciones" placeholder="Observaciones" aria-label="observaciones"
                            aria-describedby="basic-addon1" />
                        <label>Observaciones:</label>

                    </div>
                </div>
                @if ($errors->has('dui_cliente'))
                    <div class="alert alert-danger">
                        {{ $errors->first('dui_cliente') }}
                    </div>
                @endif
            </div>




            <div class="card-footer d-flex justify-content-end py-6">
                <button type="submit" class="btn btn-bg-primary btn-text-white">Modificar</button>
            </div>
        </div>
    </form>
@endsection
