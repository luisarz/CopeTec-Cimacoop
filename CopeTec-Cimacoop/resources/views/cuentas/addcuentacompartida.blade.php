@extends('base.base')
@section('title')
    Agregar Cliente
@endsection
@section('content')
    <form action="/cuentas/add" method="post" autocomplete="off">
        {!! csrf_field() !!}
        <div class="input-group mb-5"></div>
        <div class=" justify-content-space-between">

            <div class="card shadow-lg">
                <div class="card-header ribbon ribbon-end ribbon-clip">
                    <div class="card-toolbar">
                        <a href="/bobeda" cla>

                            <button type="button"
                                class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
                                <i class="ki-duotone ki-black-left-line  text-dark   fs-2x">
                                    <i class="path1"></i>
                                    <i class="path2"></i>
                                </i>
                            </button>
                        </a>

                    </div>
                    <div class="ribbon-label fs-5">
                        <i class="fa fa-users text-white fa-3x"></i> &nbsp;
                        Apertura Cuenta Compartida
                        <span class="ribbon-inner bg-info "></span>
                    </div>
                </div>

                <div class="card-body">

                    <!--begin::row group-->
                    <div class="form-group row mb-5">
                        <div class="form-floating col-lg-6">
                            <select name="id_asociado" required data-control="select2" class="form-select">
                                <option value="">Seleccione el primer asociado</option>
                                @foreach ($asociados as $asociado)
                                    <option value="{{ $asociado->id_asociado }}">{{ $asociado->nombre }} ->
                                        {{ $asociado->dui_cliente }}</option>
                                @endforeach
                            </select>
                            <label for="floatingPassword">Primer Asociado</label>
                        </div>
                        <div class="form-floating col-lg-6">
                            <select name="id_asociado_comparte" required data-control="select2" class="form-select">
                                <option value="">Seleccione el segundo asociado</option>
                                @foreach ($asociados as $asociado)
                                    <option value="{{ $asociado->id_asociado }}">{{ $asociado->nombre }} ->
                                        {{ $asociado->dui_cliente }}</option>
                                @endforeach
                            </select>
                            <label for="floatingPassword">Segundo Asociado</label>
                        </div>


                    </div>

                    <!--begin::row group-->
                    <div class="form-group row mb-5">
                        <div class="form-floating col-lg-6">
                            <input type="text" required value="{{ old('numero_cuenta') }}" class="form-control"
                                name="numero_cuenta" placeholder="Numero de cuenta" aria-label="numero_cuenta"
                                aria-describedby="basic-addon1" is-valid />
                            <label for="floatingPassword">Numero cuenta:</label>
                        </div>
                        <div class="form-floating col-lg-6">
                            <input type="date" required value="{{ old('fecha_nacimiento') }}" max="{{ date('Y-m-d') }}"
                                class="form-control" name="fecha_nacimiento" placeholder="fecha_nacimiento"
                                aria-label="fecha_nacimiento" aria-describedby="basic-addon1" />
                            <label>Fecha Apertura:</label>
                        </div>
                    </div>
                    <!--begin::row group-->
                    <div class="form-group row mb-5">
                        <div class="form-floating col-lg-6">
                            <select name="id_tipo_cuenta" id="id_tipo_cuenta" required data-control="select2"
                                class="form-select">
                                <option value="">Seleccione El Interes </option>
                                @foreach ($tiposcuentas as $tipoCuenta)
                                    <option value="{{ $tipoCuenta->id_tipo_cuenta }}">
                                        {{ $tipoCuenta->descripcion_cuenta }}
                                    </option>
                                @endforeach
                            </select>
                            <label>Tipo de Cuenta:</label>
                        </div>
                        <div class="form-floating col-lg-6">
                            <select name="id_intereses_tipo_cuenta" id="id_interes_tipo_cuenta" required
                                data-control="select2" class="form-select">
                            </select>
                            <label>Interes aplicar:</label>
                        </div>

                    </div>
                    <!--begin::row group-->
                    <div class=" form-group row mb-1">
                        <div class="form-floating col-lg-12">
                            <input type="number" required value="{{ old('monto_apertura') }}" class="form-control"
                                name="monto_apertura" placeholder="monto_apertura" aria-label="dui"
                                aria-describedby="basic-addon1" />
                            <label>Monto Apertura:</label>
                        </div>
                    </div>


                    @if ($errors->has('dui_cliente'))
                        <div class="alert alert-danger">
                            {{ $errors->first('dui_cliente') }}
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    <div class="form-group row mb-2">
                        <div class="card-footer d-flex justify-content-center py-6">
                            <button type="submit" class="btn btn-block btn-bg-info btn-text-white">
                                <i class="ki-duotone ki-dollar    text-white fs-2x                   ">
                                    <i class="path1"></i>
                                    <i class="path2"></i>
                                    <i class="path3"></i>
                                </i>
                                Aperturar Cuenta</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </form>
@endsection
@section('scripts')
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <script src=" {{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#id_tipo_cuenta').on('change', function() {
                let id_tipo_cuenta = $(this).val();
                let url = '/intereses/getIntereses/' + id_tipo_cuenta;
                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {
                        opcion_seleccionada: id_tipo_cuenta
                    },
                    success: function(response) {
                        $.each(response[0], function(index, interes) {
                            $('#id_interes_tipo_cuenta').append(
                                $('<option>', {
                                    value: interes.id_intereses_tipo_cuenta,
                                    text: interes.interes
                                })
                            );
                        });

                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
