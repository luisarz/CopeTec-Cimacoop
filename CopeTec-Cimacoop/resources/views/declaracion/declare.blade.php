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
                FORMULARIO- DECLARACION JURADA - CUENTAS DE AHORRO | {{ Session::get('name_module') }}
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

            <form>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="my-4 text-center">
                                Datos Generales del cliente (Persona natural) o representante legal (Persona Jurídica)
                            </h5>
                        </div>
                        {{-- Client name --}}
                        <div class="col-5">NOMBRE DEL ASOCIADOO REPRESENTANTE LEGAL</div>
                        <div class="col-7">Client name</div>
                        {{-- ID number --}}
                        <div class="col-5">Número de documento (DUI, PASAPORTE, CARNÉ DE RESIDENTE)</div>
                        <div class="col-7">Id Number</div>
                        <div class="col-12">
                            <h5 class="my-4 text-center">
                                Datos Generales de la cuenta de ahorro
                            </h5>
                        </div>
                        {{-- start savings section --}}
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Número de depositos</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Valor promedio de depósitos</label>
                                <input type="number" step="0.00" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Al depositar realizare abonos mediante:</label>
                                <select class="form-control custom-select custom-select-lg mb-3">
                                    <option value="Ambos">Ambos (Cheque y/o Efectivo)</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="Efectivo">Efectivo</option>
                                </select>
                            </div>
                        </div>
                        {{-- start withdrawals --}}
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Número de retiros</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Valor promedio de retiros</label>
                                <input type="number" step="0.00" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Al realizar retiros lo ha hare mediante:</label>
                                <select class="form-control custom-select custom-select-lg mb-3">
                                    <option value="Ambos">Ambos (Cheque y/o Efectivo)</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="Efectivo">Efectivo</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>

    </div>


@endsection
