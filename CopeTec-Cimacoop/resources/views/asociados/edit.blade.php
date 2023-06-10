@extends('base.base')
@section('formName')
    <i class="ki-duotone ki-user-tick text-success fs-1"><span class="path1"></span><span class="path2"></span><span
            class="path3"></span></i>
    Mdificar Asociado {{ $asociado->nombre }}
@endsection
@section('content')
    <form action="/asociados/put" method="post" autocomplete="nope">
        {!! csrf_field() !!}
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{ $asociado->id_asociado }}">
        <div class="input-group mb-5"></div>

        <div class="card-body">

            <!--begin::row group-->
            <div class="form-group row mb-5">
                <div class="col-lg-8">
                    <label>Cliente:</label>
                    <select required name="id_cliente" data-control="select2" class="form-select">
                        <option value="">Seleccione</option>

                        @foreach ($clientes as $cliente)
                            @if ($asociado->id_cliente == $cliente->id_cliente)
                                {
                                <option selected value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }} -
                                    {{ $cliente->dui_cliente }}
                                </option>
                            }@else{
                                <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }} -
                                    {{ $cliente->dui_cliente }}
                                    }
                            @endif
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4">
                    <label>Fecha Registro:</label>
                    <input type="date" value="{{ $asociado->fecha_ingreso }}" class="form-control" name="fecha_ingreso"
                        placeholder="fecha_ingreso" aria-label="fecha_ingreso" aria-describedby="basic-addon1" />
                </div>

            </div>
            <!--begin::row group-->
            <div class="form-group row mb-5">
                <div class="col-lg-4">
                    <label>Sueldo Quincenal:</label>
                    <input type="number" value="{{ $asociado->sueldo_quincenal }}" required class="form-control"
                        placeholder="Sueldo quincena" name="sueldo_quincenal" />
                </div>
                <div class="col-lg-4">
                    <label>Sueldo mensual:</label>
                    <input type="number" value="{{ $asociado->sueldo_mensual }}" required class="form-control"
                        placeholder="Sueldo mensual" name="sueldo_mensual" />
                </div>
                <div class="col-lg-4">
                    <label>Otros ingresosl:</label>
                    <input type="number" value="{{ $asociado->otros_ingresos }}" required class="form-control"
                        placeholder="otros_ingresos mensual" name="otros_ingresos" />
                </div>

            </div>

            <!--begin::row group-->
            <div class="form-group row mb-5">
                <div class="col-lg-4">
                    <label>Dependientes economicamente de cliente:</label>
                    <input type="number" value="{{ $asociado->dependientes_economicamente }}" step="1" required
                        class="form-control" placeholder="Personas que dependen econmicamente"
                        name="dependientes_economicamente" />
                </div>
                <div class="col-lg-4">
                    <label>Cuota de ingreso:</label>
                    <input type="number" value="{{ $asociado->couta_ingreso }}" required class="form-control"
                        placeholder="Cuota Ingreso" name="couta_ingreso" />
                </div>
                <div class="col-lg-4">
                    <label>Monto aportacion:</label>
                    <input type="number" value="{{ $asociado->monto_aportacion }}" required class="form-control"
                        placeholder="Monto aportacion" name="monto_aportacion" />
                </div>
            </div>

            <!--begin::row group-->
            <div class="form-group row mb-5">
                <div class="col-lg-4">
                    <label>Referencia Asociado:</label>

                    <select  name="referencia_asociado_uno" data-control="select2" class="form-select">
                        <option value="">Seleccione</option>

                        @foreach ($clientes as $cliente)
                            @if ($asociado->referencia_asociado_uno == $cliente->id_cliente)
                                {
                                <option selected value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }} -
                                    {{ $cliente->dui_cliente }}
                                </option>
                            }@else{
                                <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }} -
                                    {{ $cliente->dui_cliente }}
                                    }
                            @endif
                            </option>
                        @endforeach
                    </select>


                </div>
                <div class="col-lg-4">
                    <label>Referencia Asociado :</label>
                    <select  name="referencia_asociado_dos" data-control="select2" class="form-select">
                        <option value="">Seleccione</option>

                        @foreach ($clientes as $cliente)
                            @if ($asociado->referencia_asociado_dos == $cliente->id_cliente)
                                {
                                <option selected value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }} -
                                    {{ $cliente->dui_cliente }}
                                </option>
                            }@else{
                                <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }} -
                                    {{ $cliente->dui_cliente }}
                                    }
                            @endif
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4">
                    <label>Estado Solicitud:</label>
                    <select  name="estado_solicitud" data-control="select2" class="form-select">
                        <option value="1" {{ $asociado->estado_solicitud == '1' ? 'selected' : '' }}>Presentar
                        </option>
                        <option value="2" {{ $asociado->estado_solicitud == '2' ? 'selected' : '' }}>Aceptado</option>
                        <option value="3" {{ $asociado->estado_solicitud == '3' ? 'selected' : '' }}>Rechazado
                        </option>
                    </select>

                </div>
            </div>

        </div>


        <div class="card-footer d-flex justify-content-end py-6">
            <button type="submit" class="btn btn-bg-primary btn-text-white">Modificar</button>
        </div>
    </form>
@endsection
