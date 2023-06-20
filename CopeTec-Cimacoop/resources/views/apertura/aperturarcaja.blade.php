@extends('base.base')
@section('title')
    Agregar Cliente
@endsection
@section('content')
    <form action="/apertura/aperturarcaja" method="POST" autocomplete="nope">
        {!! csrf_field() !!}
        <div class="input-group mb-5"></div>
        <input type="hidden" id="id_bobeda_movimiento" name="id_bobeda_movimiento">
        <div class="card shadow-lg">
            <div class="card-header ribbon ribbon-end ribbon-clip">
                <div class="card-toolbar">
                    <a href="/apertura">
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
                    <i class="ki-duotone ki-tag  text-white   fs-3x">
                        <i class="path1"></i>
                        <i class="path2"></i>
                    </i>
                    &nbsp;
                    &nbsp;
                    &nbsp;&nbsp;Aperturar Caja

                    <span class="ribbon-inner bg-success"> </span>
                </div>
            </div>
            <div class="card-body">

                <!--begin::row group-->
                <div class="form-group row mb-4">
                    <div class="form-floating col-lg-8">
                        <select name="id_caja" id='id_caja' class="form-select" data-control="select">
                            <option value="">Seleccione la Caja</option>

                            @foreach ($cajas as $caja)
                                @if ($caja->id_caja == old('id_caja'))
                                    <option value="{{ $caja->id_caja }}" selected>{{ $caja->numero_caja }}</option>
                                @else
                                    <option value="{{ $caja->id_caja }}">{{ $caja->numero_caja }}</option>
                                @endif
                            @endforeach
                        </select>
                        <label for="floatingPassword">Caja a Aperturar</label>
                    </div>

                    <div class="form-floating col-lg-4">
                        <input type="number" required readonly id="monto_apertura" class="form-control text-success text-bold"
                            name="monto_apertura" placeholder="monto_apertura" aria-label="monto_apertura"
                            aria-describedby="basic-addon1" />

                        <label>Monto Apertura:</label>
                    </div>
                </div>
                <div class="form-floating col-lg-12">
                    <select class="form-select" required name="id_empleado" id="id_empleado">
                        @foreach ($empleados as $empleado)
                            <option value="{{ $empleado->id_empleado }}">{{ $empleado->nombre_empleado }}
                                {{ $empleado->dui }}</option>
                        @endforeach
                    </select>

                    <label>Empleado Apertura:</label>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-bg-danger btn-text-white">Aperturar Caja</button>

            </div>
        </div>




        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        </div>




        {{-- <div class="card-footer d-flex justify-content-end py-6">
            <button type="submit" class="btn btn-bg-danger btn-text-white">Aperturar Caja</button>
        </div> --}}
    </form>
@endsection
@section('scripts')
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <script src=" {{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#id_caja').on('change', function() {
                let id = $(this).val();
                let url = '/apertura/gettraslado/' + id;
                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        let montoTransfiere = data.monto;
                        let id_bobeda_movimiento = data.id_bobeda_movimiento;

                        $('#monto_apertura').val(montoTransfiere);
                        $("#id_bobeda_movimiento").val(data.id_bobeda_movimiento);

                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
