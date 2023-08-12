@extends('base.base')

@section('title')
    Parametros Alertas
@endsection

@section('formName')
@endsection
@section('content')
    <div class="card shadow-lg mt-5">
        <div class="card-header ribbon ribbon-end ribbon-clip">

            <div class="ribbon-label fs-3">
                <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;
                ACTUALIZAR VALORES DE VALIDACION DE TRANSACCIONES SOSPECHOSAS
                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>

        <div class="container m-4">
            <p class="text-muted">
                Los valores mostrados se usan para modificar las alertas a ser aplicadadas a las transacciones de abonos a
                creditos en el sistema,
                se usan para detectar un posible lavado de dinero, teniendo como referencia la cantidad de cuotas que se
                pueden adelantar y el monto del deposito.
            </p>
            <div class="m-5">
                <form action="/params/update"  method="post">
                    {!! csrf_field() !!}
                    {{ method_field('POST') }}
                    <div class="row">
                        <div class="col">
                            <h2>Cantidad de coutas a adelantar:</h2>
                        </div>
                        <div class="col text-end">
                            <input type="hidden" name="id" value="{{ $param[0]->id }}">
                            <input type="number" name="cuotas" required class="form-control" value="{{ $param[0]->cuotas }}">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn-primary btn">Guardar</button>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <h2>Monto total del depósito:</h2>
                        </div>
                        <div class="col">
                            <input type="number" name="monto" step="any" required min="0.00" class="form-control" value="{{ $param[0]->monto }}">
                        </div>
                        <div class="col"></div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
