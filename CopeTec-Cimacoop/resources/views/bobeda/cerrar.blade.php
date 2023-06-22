@extends('base.base')
@section('title')
    Agregar Cliente
@endsection
@section('content')
    <form action="/bobeda/realizarCierreBobeda" method="POST" autocomplete="off">
        {!! csrf_field() !!}
        <div class="input-group mb-5"></div>
        <input type="hidden" id="id_bobeda" name="id_bobeda" value="{{ $bobeda->id_bobeda }}">

        <div class="d-flex flex-wrap justify-content-center ">

            <div class="card card-md shadow-lg">
                <div class="card-header ribbon ribbon-end ribbon-clip">
                    <div class="card-toolbar">
                        <a href="/bobeda">

                            <button type="button" class="btn btn-sm btn-light">
                                <i class="ki-duotone ki-black-left-line  text-dark   fs-2x">
                                    <i class="path1"></i>
                                    <i class="path2"></i>
                                </i>
                            </button>
                        </a>
                    </div>
                    <div class="ribbon-label fs-3">
                        Cerrar - <span class="badge badge-danger fs-5">{{ $bobeda->nombre }}</span>
                        <span class="ribbon-inner bg-success"></span>
                    </div>
                </div>

                <div class="card-body">

                    <!--begin::row group-->
                    <div class="form-group row mb-5">
                        <div class="form-floating col-lg-8">
                            <input type="text" required
                                value="${{ number_format($bobeda->saldo_bobeda, '1', '.', ',') }}" readonly
                                class="form-control text-success fs-1" name="monto" placeholder="Monto a depositar"
                                aria-label="monto" aria-describedby="basic-addon1" />
                            <label>Saldo en Bobeda:</label>
                        </div>

                        <div class="form-floating col-lg-4">
                            <input type="number" required value="{{ $bobeda->saldo_bobeda }}"
                                class="form-control text-danger" name="monto" placeholder="Monto a depositar"
                                aria-label="monto" aria-describedby="basic-addon1" />
                            <label class="text-danger">Monto Apertura:</label>
                        </div>
                    </div>
                    <div class="form-group row mb-5">
                        <div class="form-floating col-lg-12">
                            <select class="form-select" required name="id_empleado" id="id_empleado">

                                @foreach ($empleados as $empleado)
                                    <option value="{{ $empleado->id_empleado }}">{{ $empleado->nombre_empleado }}
                                        {{ $empleado->dui }}</option>
                                @endforeach
                            </select>

                            <label>Empleado de CIerre:</label>
                        </div>
                    </div>
                    <div class="form-group row mb-5">
                        <div class="form-floating col-lg-12">
                            <input type="text" required class="form-control text-info fs-5" name="observacion"
                                placeholder="Monto a depositar" aria-label="observacion" aria-describedby="basic-addon1" />
                            <label>Observaciones:</label>
                        </div>
                    </div>


                    @if ($errors->has('dui_cliente'))
                        <div class="alert alert-danger">
                            {{ $errors->first('dui_cliente') }}
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                        <button type="submit" id="kt_password_reset_submit" class="btn btn-danger me-4">
                            <!--begin::Indicator label-->
                            <span class="indicator-label">Cerrar bobeda</span>
                            <!--end::Indicator label-->
                            <!--begin::Indicator progress-->
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            <!--end::Indicator progress-->
                        </button>
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
                        $('#id_interes_tipo_cuenta').empty();
                        $.each(response, function(index, interes) {
                            $('#id_interes_tipo_cuenta').append($('<option>', {
                                value: interes.id_intereses_tipo_cuenta,
                                text: interes.interes
                            }));
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
