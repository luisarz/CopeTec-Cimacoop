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
                        <div class="col-4">
                            Numero de cuenta de ahorro: (cuenta de ahorro)
                        </div>
                        <div class="col-4">

                           Monto de apertura: ($$$$)
                        </div>
                        <div class="col-4">

                            Fecha de apertura : (Fecha)
                        </div>
                        {{-- start savings section --}}
                        <div class="col-12">
                            <h5 class="my-4 text-center">
                                Transacciones bancarias que proyecto realizar mensualmente
                            </h5>
                        </div>
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
                        {{-- start founds origins --}}
                        <div class="col-12">
                            <h5 class="my-4 text-center">
                                Origen de los fondos
                            </h5>
                        </div>
                        <div class="col-6">
                            <select class="form-control custom-select custom-select-lg mb-3">
                                <option value="Salarios">Salarios</option>
                                <option value="Negocio Propio">Negocio Propio</option>
                                <option value="Pensión">Pensión</option>
                                <option value="Remesas">Remesas</option>
                                <option value="Dividendos">Dividendos</option>
                                <option value="Herencia">Herencia</option>
                                <option value="Otros">Otros</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="test" step="0.00" class="form-control" id="other_text"
                                    aria-describedby="emailHelp" placeholder="En caso de otros llenar esta parte">
                                <small class="text-muted" for="exampleInputEmail1">*Si selecciono otros, por favor
                                    especifique:</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class="my-4 text-center">
                                Favor detalle documentación adjunta que ampara la procedencia de los fondos
                            </h5>
                        </div>
                        <div class="col-6">
                            <select class="form-control custom-select custom-select-lg mb-3">
                                <option value="Constancia de Salarios">Constancia de Salarios</option>
                                <option value="Negocio Propio, Ultimas Dos Declaraciones de renta">En caso de Negocio
                                    Propio: Ultimas dos declaraciones de renta</option>
                                <option value="Negocio Propio, Ultimas Tres Declaraciones de IVA">En caso de Negocio Propio:
                                    Ultimas tres declaraciones de IVA</option>
                                <option value="Carné o constancia de pensión">Carné o constancia de pensión</option>
                                <option value="Últimas tres remesas recibidas">Últimas tres remesas recibidas</option>
                                <option value="Constancia de división de dividendos">Constancia de división de dividendos
                                </option>
                                <option value="Declaratoria de heredero">Declaratoria de heredero</option>
                                <option value="Otros">Otros</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="test" step="0.00" class="form-control" id="other_text"
                                    aria-describedby="emailHelp" placeholder="En caso de otros llenar esta parte">
                                <small class="text-muted" for="exampleInputEmail1">*Si selecciono otros, por favor
                                    especifique:</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class="my-4 text-center">
                                Declaración Jurada
                            </h5>
                            <p>
                                Por este medio, en cumplimiento del instructivo emitido por la Unidad de Investigación de la
                                Fiscalía General de la República, para la prevención del Lavado de Dinero y de Activos en
                                las instituciones bancarias; BAJO JURAMENTO DECLARO: Que la información
                                anterior que he proporcionado a CIMACOOP de RL. . y que forma parte de mi expediente o del
                                expediente de mi representada en su
                                caso, es fidedigna y que las transacciones efectuadas en la cuenta de operaciones pasivas no
                                proceden, ni serán utilizadas con la finalidad de favorecer ningún tipo de actividad ilegal,
                                contempladas en la Ley Contra el Lavado de Dinero y Activos. Además declaro que
                                me someto a cualquier tipo de investigación necesaria para establecer la procedenciade los
                                fondos de mi persona o de mi representada en su caso.
                            </p>
                        </div>
                        <div class="col-8">
                            <div class="d-flex">
                                <label for="Client name">Nombre:</label>
                                <p> Nombre cliente</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex">
                                <label for="Signature">Firma:</label>
                                <p>______________________</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex">
                                <label for="date" class="mr-2">Lugar y Fecha:</label>
                                <p>San Miguel, FECHA MM/DD/YYYY</p>
                            </div>
                        </div>
                        <div class="mt-5 text-end">
                            <button class="btn btn-primary">
                                Guardar e Imprimir
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>


@endsection
