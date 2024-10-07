@extends('base.base')
@section('formName')
    <i class="ki-duotone ki-user-tick text-success fs-1"><span class="path1"></span><span class="path2"></span><span
            class="path3"></span></i>
    Registro nuevo Asociado
@endsection
@section('content')
    <form action="/asociados/add" method="post" autocomplete="off" class="form">
        {!! csrf_field() !!}
        <div class="input-group mb-5"></div>
        <div class="card shadow-lg mt-5">
            <div class="card-header ribbon ribbon-top ribbon-vertical">
                <div class="card-toolbar">
                    <a href="/asociados">

                        <button type="button"
                            class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
                            <i class="ki-outline ki-black-left-line  text-dark   fs-2x">
                            </i>
                        </button>
                    </a>
                    &nbsp;<span class="badge badge-success fs-3">Asociado #
                        <span
                            class="badge badge-info fs-2 text-white">{{ str_pad($nuevoAsociadoNumero, 10, '0', STR_PAD_LEFT) }}</span>
                    </span>
                </div>
                <div class="ribbon-label bg-danger fw-bold">
                    Nuevo | Asociado
                </div>
            </div>
            <div class="card-body">

                {{-- <div class="form-group row mb-5 ">
                <div class="col-lg-3">
                    <label class="text-danger fw-bold"># Asociado:</label>
                    <input type="text" class="text-info fw-bold form-control form-control-solid-bg"
                        name="numero_asociado" id="numero_asociado" placeholder="Numero asociado"
                        value="{{ $nuevoAsociadoNumero }}" />
                </div>
            </div> --}}
                <!--begin::row group-->
                <div class="form-group row mb-5">
                    <div class="col-lg-3">
                        <label class="text-danger fw-bold"># Asociado:</label>
                        <input type="text" class="text-info fw-bold form-control form-control-solid-bg"
                            name="numero_asociado" id="numero_asociado" placeholder="Numero asociado"
                            value="{{ $nuevoAsociadoNumero }}" />
                    </div>
                    <div class="col-lg-5">
                        <label>Cliente:</label>
                        <select required name="id_cliente" data-control="select2" class="form-select">
                            <option value="">Seleccione</option>

                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }} -
                                    {{ $cliente->dui_cliente }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label>Fecha Registro:</label>
                        <input type="date" max="{{ date('Y-m-d') }}" class="form-control" name="fecha_ingreso"
                            placeholder="fecha_ingreso" aria-label="fecha_ingreso" aria-describedby="basic-addon1" />
                    </div>

                </div>
                <!--begin::row group-->
                <div class="form-group row mb-5">
                    <div class="col-lg-4">
                        <label>Sueldo Quincenal:</label>
                        <input type="number" step="any" required class="form-control" placeholder="Sueldo quincena"
                            name="sueldo_quincenal" />
                    </div>
                    <div class="col-lg-4">
                        <label>Sueldo mensual:</label>
                        <input type="number" step="any"  required class="form-control" placeholder="Sueldo mensual"
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
                        <input type="number" required class="form-control" placeholder="Cuota Ingreso"
                            name="couta_ingreso" />
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

                        <select name="referencia_asociado_uno" data-control="select2" class="form-select">
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
                        <select name="referencia_asociado_dos" data-control="select2" class="form-select">
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
                <button type="submit" class="btn btn-bg-primary w-100 btn-text-white">Agregar</button>
            </div>
        </div>

    </form>
@endsection
