@extends('base.base')
@section('formName')
    <i class="ki-duotone ki-user-tick text-success fs-1"><span class="path1"></span><span class="path2"></span><span
            class="path3"></span></i>
    Registro nuevo Asociado
@endsection
@section('content')
    <form action="/asociados/add" method="post" autocomplete="nope" class="form">
        {!! csrf_field() !!}
        <div class="input-group mb-5"></div>
        <div class="card-body">

            <!--begin::row group-->
            <div class="form-group row mb-5">
                <div class="col-lg-8">
                    <label>Cliente:</label>
                    <select  required name="id_cliente" data-control="select2" class="form-select">
                        <option value="">Seleccione</option>

                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }} - {{ $cliente->dui_cliente }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4">
                    <label>Fecha Registro:</label>
                    <input type="date" max="{{date('Y-m-d')}}" class="form-control" name="fecha_ingreso" placeholder="fecha_ingreso"
                        aria-label="fecha_ingreso" aria-describedby="basic-addon1" />
                </div>

            </div>
            <!--begin::row group-->
            <div class="form-group row mb-5">
                <div class="col-lg-4">
                    <label>Sueldo Quincenal:</label>
                    <input type="number" required class="form-control" placeholder="Sueldo quincena"
                        name="sueldo_quincenal" />
                </div>
                <div class="col-lg-4">
                    <label>Sueldo mensual:</label>
                    <input type="number" required class="form-control" placeholder="Sueldo mensual"
                        name="sueldo_mensual" />
                </div>
                <div class="col-lg-4">
                    <label>Otros ingresosl:</label>
                    <input type="number" required class="form-control" placeholder="otros_ingresos mensual"
                        name="otros_ingresos" />
                </div>

            </div>

            <!--begin::row group-->
            <div class="form-group row mb-5">
                <div class="col-lg-4">
                    <label>Dependientes economicamente de cliente:</label>
                    <input type="number" step="1" required class="form-control"
                        placeholder="Personas que dependen econmicamente" name="dependientes_economicamente" />
                </div>
                <div class="col-lg-4">
                    <label>Cuota de ingreso:</label>
                    <input type="number" required class="form-control" placeholder="Cuota Ingreso" name="couta_ingreso" />
                </div>
                <div class="col-lg-4">
                    <label>Monto aportacion:</label>
                    <input type="number" required class="form-control" placeholder="Monto aportacion"
                        name="monto_aportacion" />
                </div>
            </div>

            <!--begin::row group-->
            <div class="form-group row mb-4">
                <div class="col-lg-6">
                    <label>Referencia Asociado:</label>

                    <select  name="referencia_asociado_uno" data-control="select2" class="form-select">
                        <option value="">Seleccione</option>

                        @foreach ($asociados as $asociado)
                            <option value="{{ $asociado->id_cliente }}">{{ $asociado->nombre }} -
                                {{ $asociado->dui_cliente }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6">
                    <label>Referencia Asociado :</label>
                    <select  name="referencia_asociado_dos" data-control="select2" class="form-select">
                        <option value="">Seleccione</option>

                        @foreach ($asociados as $asociado)
                            <option value="{{ $asociado->id_cliente }}">{{ $asociado->nombre }} -
                                {{ $asociado->dui_cliente }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

        </div>



        <div class="card-footer d-flex justify-content-end py-6">
            <button type="submit" class="btn btn-bg-primary btn-text-white">Agregar</button>
        </div>
    </form>
@endsection
