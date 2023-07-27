@extends('base.base')

@section('title')
    Administracion de Clientes
@endsection

@section('formName')
@endsection
@section('content')
    <div class="card shadow-lg">
        <div class="card-header ribbon ribbon-end ribbon-clip">

            <div class="ribbon-label fs-3">
                <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;
                Agregar Declaración | {{ Session::get('name_module') }}
                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="fs-1">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                

        </div>

    </div>


@endsection
