@extends('base.base')
@section('title')
    Editar Cliente
@endsection
@section('content')
    <form action="/bobeda/realizarTraslado" id="traslado" method="post" target='_blank' autocomplete="off">
        {!! csrf_field() !!}
        {{ method_field('POST') }}
        <input type="hidden" name="id_bobeda" value="{{ $bobeda->id_bobeda }}">
        {{-- 1=enviar a caja --}}
        <input type="hidden" name="tipo_operacion" value="1">

        <div class="input-group mb-5"></div>



        <div class="d-flex justify-content-center w-150">

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
                    <div class="ribbon-label fs-3">
                        Nuevo Traslado a Caja
                        <span class="ribbon-inner bg-danger"></span>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group row mb-5">
                        <div class="form-floating col-lg-8">
                            <select name="id_caja" required class="form-select" data-control="w">
                                <option value="">Seleccione Caja Destino</option>
                                @foreach ($cajas as $caja)
                                    <option value="{{ $caja->id_caja }}">{{ $caja->numero_caja }}</option>
                                @endforeach

                            </select>
                            <label>Caja Destino:</label>
                        </div>

              
                        <div class=" form-floating col-lg-4">
                            <input type="number" required class="form-control input-group-lg" name="monto"
                                placeholder="monto" aria-label="monto" aria-describedby="basic-addon1" />
                            <label>Monto transferir:</label>
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

                            <label>Empleado Envia:</label>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <div class="form-floating col-lg-12">
                            <input type="text" required class="form-control" name="observacion" placeholder="observacion"
                                aria-label="observacion" aria-describedby="basic-addon1" />
                            <label>Observacion:</label>
                        </div>
                    </div>


                </div>
                  <div class="card-footer d-flex justify-content-center py-6">
                        <button type="submit" class="btn btn-block btn-bg-danger btn-text-white">
                            <i class="ki-duotone ki-dollar    text-white fs-2x                   ">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                            </i>
                            Enviar Traslado</button>
                    </div>
            </div>
        </div>
        @if ($errors->has('dui_cliente'))
            <div class="alert alert-danger">
                {{ $errors->first('dui_cliente') }}
            </div>
        @endif


        </div>


    </form>
@endsection
@section('scripts')
    <script>
        document.getElementById("traslado").addEventListener("submit", function(event) {
            this.submit();
            setTimeout(function() {
                window.location.href = "/bobeda";
            }, 1000);
        });
    </script>
@endsection
