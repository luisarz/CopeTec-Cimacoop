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
                VALORES DE VALIDACION DE TRANSACCIONES SOSPECHOSAS
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
                <div class="row">
                    <div class="col">
                        <h2>Cantidad de coutas a adelantar:</h2>
                    </div>
                    <div class="col text-end">
                        <h1>{{$param[0]->cuotas}} Cuotas</h1>
                    </div>
                    <div class="col text-end">
                        <a href="/params/edit" class="btn-primary btn">Editar Valores</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h2>Monto total del depósito:</h2>
                        <small class="text-muted">Editado por {{$param[0]->updated_by}}</small>
                        <small class="text-muted">Fecha {{ \Carbon\Carbon::parse($param[0]->updated_at)->format('d/m/Y H:i:s A')}}</small>
                    </div>
                    <div class="col text-end">
                        <h1> @money($param[0]->monto)</h1>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>

    </div>
@endsection
