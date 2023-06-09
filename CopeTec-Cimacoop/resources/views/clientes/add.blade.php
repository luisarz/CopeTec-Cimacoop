@extends('base.base')
@section('title')
    Agregar Cliente
@endsection
@section('content')
    <form action="/clientes/add" method="post" autocomplete="nope">
        {!! csrf_field() !!}
        <div class="input-group mb-5"></div>

        <div class="card-body">

            <!--begin::row group-->
            <div class="form-group row mb-5">
                <div class="col-lg-5">
                    <label>Nombre Cliente:</label>
                    <input type="text" required value="{{ old('nombre') }}" class="form-control" name="nombre" placeholder="nombre" aria-label="nombre"
                        aria-describedby="basic-addon1" />
                </div>
                <div class="col-lg-3">
                    <label>Genero:</label>
                    <select name="genero" required class="form-control">
                        @if (old('genero') == 1)
                            <option selected value="1">Masculino</option>
                            <option value="0">Femenino</option>
                        @else
                            <option value="1">Masculino</option>
                            <option selected value="0">Femenino</option>
                        @endif
                       
                    </select>
                </div>
                <div class="col-lg-4">
                    <label>Fecha Nacimiento:</label>
                    <input type="date" required max="{{date('Y-m-d')}}" value="{{ old('fecha_nacimiento') }}" class="form-control" name="fecha_nacimiento" placeholder="fecha_nacimiento"
                        aria-label="fecha_nacimiento" aria-describedby="basic-addon1" />
                </div>
            </div>
            <!--begin::row group-->
            <div class="form-group row mb-5">

                <div class="col-lg-3">
                    <label>Dui:</label>
                    <input type="text" required  value="{{ old('dui_cliente') }}"  class="form-control" name="dui_cliente" placeholder="dui_cliente" aria-label="dui"
                        aria-describedby="basic-addon1" />
                </div>
                <div class="col-lg-5">
                    <label>Dui extendido en:</label>
                    <input type="text"required value="{{ old('dui_extendido') }}" class="form-control" name="dui_extendido" placeholder="Extendido en"
                        aria-label="dui_extendido" aria-describedby="basic-addon1" />
                </div>
                <div class="col-lg-4">
                    <label>Fecha Expedicion dui:</label>
                    <input type="date" required max="{{date('Y-m-d')}}" value="{{ old('fecha_expedicion') }}" class="form-control" name="fecha_expedicion" placeholder="fecha_expedicion"
                        aria-label="fecha_expedicion" aria-describedby="basic-addon1" />
                </div>
            </div>
            <!--begin::row group-->
            <div class="form-group row mb-5">

                <div class="col-lg-3">
                    <label>Telefono:</label>
                    <input type="text" required value="{{ old('telefono') }}" class="form-control" name="telefono" placeholder="telefono" aria-label="dui"
                        aria-describedby="basic-addon1" />
                </div>
                <div class="col-lg-5">
                    <label>Nacionalidad:</label>
                    <input type="text" required value="{{ old('nacionalidad') }}" class="form-control" name="nacionalidad" placeholder="Nacionalidad del cliente"
                        aria-label="nacionalidad" aria-describedby="basic-addon1" />
                </div>
                <div class="col-lg-4">
                    <label>Estado civil:</label>
                    <input type="text" required value="{{ old('estado_civil') }}" class="form-control" name="estado_civil" placeholder="Estad civil del cliente"
                        aria-label="estado_civil" aria-describedby="basic-addon1" />

                </div>
            </div>
            <!--begin::row group-->
            <div class="form-group row mb-5">

                <div class="col-lg-3">
                    <label>Direccion Personal:</label>
                    <input type="text"required value="{{ old('direccion_personal') }}" class="form-control" name="direccion_personal" placeholder="Direccion"
                        aria-label="dui" aria-describedby="basic-addon1" />
                </div>
                <div class="col-lg-5">
                    <label>Nombre del negocio:</label>
                    <input type="text" value="{{ old('nombre_negocio')}}" class="form-control" name="nombre_negocio" placeholder="Nombre negocio "
                        aria-label="nombre_negocio" aria-describedby="basic-addon1" />
                </div>
                <div class="col-lg-4">
                    <label>Direccion del negocio:</label>
                    <input type="text" value="{{ old('direccion_negocio') }}" class="form-control" name="direccion_negocio"
                        placeholder="Direccion negocio del cliente" aria-label="direccion_negocio"
                        aria-describedby="basic-addon1" />
                </div>

            </div>
            <!--begin::row group-->

            <div class="form-group row mb-5">
                <div class="col-lg-3">
                    <label>Tipo de vivienda:</label>
                    <select name="tipo_vivienda" required class="form-control">
                        @if (old('tipo_vivienda') == 1)
                            <option selected value="1">Propia</option>
                            <option value="0">Alquilada</option>
                        @else
                            <option value="1">Propia</option>
                            <option selected value="0">Alquilada</option>
                        @endif
                    </select>

                </div>
                <div class="col-lg-9">
                    <label>Observaciones:</label>
                    <input type="text" value="{{ old('observaciones')}}" class="form-control" name="observaciones" placeholder="Observaciones"
                        aria-label="observaciones" aria-describedby="basic-addon1" />

                </div>
            </div>
             @if ($errors->has('dui_cliente'))
                <div class="alert alert-danger">
                    {{ $errors->first('dui_cliente') }}
                </div>
            @endif
        </div>




        <div class="card-footer d-flex justify-content-end py-6">
            <button type="submit" class="btn btn-bg-primary btn-text-white">Agregar</button>
        </div>
    </form>
@endsection
