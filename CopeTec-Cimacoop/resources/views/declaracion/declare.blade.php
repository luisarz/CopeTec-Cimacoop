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

            <form method="POST" action="{{ url('declare/add') }}">
                <div class="container">
                    {!! csrf_field() !!}
                    {{ method_field('POST') }}
                    <input type="hidden" name="id_cuenta" id="id_cuenta" value="{{ $acc->id_cuenta }}">
                    <input type="hidden" name="id_cliente" id="id_cliente"
                        value="{{ $acc->asociado->cliente->id_cliente }}">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="my-4 text-center">
                                Datos Generales del cliente (Persona natural) o representante legal (Persona Jurídica)
                            </h5>
                        </div>
                        {{-- Client name --}}
                        <div class="col-5">NOMBRE DEL ASOCIADOO REPRESENTANTE LEGAL</div>
                        <div class="col-7">{{ $acc->asociado->cliente->nombre }}</div>
                        {{-- ID number --}}
                        <div class="col-5">Número de documento (DUI, PASAPORTE, CARNÉ DE RESIDENTE)</div>
                        <div class="col-7">{{ $acc->asociado->cliente->dui_cliente }}</div>
                        <div class="col-12">
                            <h5 class="my-4 text-center">
                                Datos Generales de la cuenta de ahorro
                            </h5>
                        </div>
                        <div class="col-4">
                            Numero de cuenta de ahorro: {{ $acc->numero_cuenta }}
                        </div>
                        <div class="col-4">

                            Monto de apertura: $ {{ $acc->monto_apertura }}
                        </div>
                        <div class="col-4">

                            Fecha de apertura : {{ $acc->created_at }}
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
                                <input type="number" value="{{ $dec->n_depositos == null ? '0' : $dec->n_depositos }}"
                                    min="0" class="form-control" id="n_depositos" name="n_depositos"
                                    placeholder="Número de depositos">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Valor promedio de depósitos</label>
                                <input type="number"
                                    value="{{ $dec->val_prom_depositos == null ? '0' : $dec->val_prom_depositos }}"
                                    min="0" step="0.00" class="form-control" id="val_prom_depositos"
                                    name="val_prom_depositos" placeholder="Valor promedio de depósitos">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Al depositar realizare abonos mediante:</label>
                                <select name="depo_tipo" id="depo_tipo"
                                    class="form-control custom-select custom-select-lg mb-3">
                                    <option value="Ambos" {{ $dec->depo_tipo == 'Ambos' ? 'selected' : '' }}>Ambos (Cheque y/o Efectivo)</option>
                                    <option value="Cheque" {{ $dec->depo_tipo == 'Cheque' ? 'selected' : '' }}>Cheque</option>
                                    <option value="Efectivo" {{ $dec->depo_tipo == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                                </select>
                            </div>
                        </div>
                        {{-- start withdrawals --}}
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Número de retiros</label>
                                <input type="number" value="{{ $dec->n_retiros == null ? '0' : $dec->n_retiros }}"
                                    min="0" class="form-control" id="n_retiros" name="n_retiros"
                                    placeholder="Número de retiros">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Valor promedio de retiros</label>
                                <input type="number"
                                    value="{{ $dec->val_prom_retiros == null ? '0' : $dec->val_prom_retiros }}"
                                    min="0" step="0.00" class="form-control" id="val_prom_retiros"
                                    name="val_prom_retiros" placeholder="Valor promedio de retiros">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Al realizar retiros lo ha hare mediante:</label>
                                <select name="ret_tipo" id="ret_tipo"
                                    class="form-control custom-select custom-select-lg mb-3">
                                    <option value="Ambos" {{ $dec->ret_tipo == 'Ambos' ? 'selected' : '' }}>Ambos (Cheque y/o Efectivo)</option>
                                    <option value="Cheque" {{ $dec->ret_tipo == 'Cheque' ? 'selected' : '' }}>Cheque</option>
                                    <option value="Efectivo" {{ $dec->ret_tipo == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
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
                            <select name="origen_fondos" id="origen_fondos"
                                class="form-control custom-select custom-select-lg mb-3">
                                <option value="Salarios" {{ $dec->origen_fondos == 'Salarios' ? 'selected' : '' }}>Salarios
                                </option>
                                <option value="Negocio Propio"
                                    {{ $dec->origen_fondos == 'Negocio Propio' ? 'selected' : '' }}>Negocio
                                    Propio</option>
                                <option value="Pensión" {{ $dec->origen_fondos == 'Pensión' ? 'selected' : '' }}>Pensión
                                </option>
                                <option value="Remesas" {{ $dec->origen_fondos == 'Remesas' ? 'selected' : '' }}>Remesas
                                </option>
                                <option value="Dividendos" {{ $dec->origen_fondos == 'Dividendos' ? 'selected' : '' }}>
                                    Dividendos
                                </option>
                                <option value="Herencia" {{ $dec->origen_fondos == 'Herencia' ? 'selected' : '' }}>
                                    Herencia
                                </option>
                                <option value="Otros" {{ $dec->origen_fondos == 'Otros' ? 'selected' : '' }}>Otros
                                </option>
                            </select>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" name="otro_origen_fondos" value="{{ $dec->otro_origen_fondos }}"  class="form-control"
                                    id="otro_origen_fondos"placeholder="En caso de otros llenar esta parte">
                                <small class="text-muted" for="exampleInputEmail1">*Si selecciono otros, por favor
                                    especifique</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class="my-4 text-center">
                                Favor detalle documentación adjunta que ampara la procedencia de los fondos
                            </h5>
                        </div>
                        <div class="col-6">
                            <select name="comprobante_procedencia_fondo" id="comprobante_procedencia_fondo"
                                class="form-control custom-select custom-select-lg mb-3">
                                <option value="Constancia de Salarios"
                                    {{ $dec->origen_fondos == 'Constancia de Salarios' ? 'selected' : '' }}>Constancia de
                                    Salarios
                                </option>
                                <option value="Negocio Propio, Ultimas Dos Declaraciones de renta"
                                    {{ $dec->origen_fondos == 'Negocio Propio, Ultimas Dos Declaraciones de renta' ? 'selected' : '' }}>
                                    En caso de Negocio
                                    Propio: Ultimas dos declaraciones de renta</option>
                                <option value="Negocio Propio, Ultimas Tres Declaraciones de IVA"
                                    {{ $dec->origen_fondos == 'Negocio Propio, Ultimas Tres Declaraciones de IVA' ? 'selected' : '' }}>
                                    En caso de Negocio
                                    Propio:
                                    Ultimas tres declaraciones de IVA</option>
                                <option value="Carné o constancia de pensión"
                                    {{ $dec->origen_fondos == 'Carné o constancia de pensión' ? 'selected' : '' }}>Carné o
                                    constancia de pensión
                                </option>
                                <option value="Últimas tres remesas recibidas"
                                    {{ $dec->origen_fondos == 'Últimas tres remesas recibidas' ? 'selected' : '' }}>Últimas
                                    tres remesas
                                    recibidas</option>
                                <option value="Constancia de división de dividendos"
                                    {{ $dec->origen_fondos == 'Constancia de división de dividendos' ? 'selected' : '' }}>
                                    Constancia de división de
                                    dividendos
                                </option>
                                <option value="Declaratoria de heredero"
                                    {{ $dec->origen_fondos == 'Declaratoria de heredero' ? 'selected' : '' }}>Declaratoria
                                    de heredero
                                </option>
                                <option value="Otros" {{ $dec->origen_fondos == 'Otros' ? 'selected' : '' }}>Otros
                                </option>
                            </select>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" name="otro_comprobante_fondos"
                                    value="{{ $dec->otro_comprobante_fondos }}" class="form-control"
                                    id="otro_comprobante_fondos" placeholder="En caso de otros llenar esta parte">
                                <small class="text-muted" for="exampleInputEmail1">*Si selecciono otros, por favor
                                    especifique</small>
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
                        <div class="col-8 mt-5">
                            <div class="d-flex">
                                <label for="Client name">Nombre:</label>
                                <p> {{ $acc->asociado->cliente->nombre }}</p>
                            </div>
                        </div>
                        <div class="col-4 mt-5">
                            <div class="d-flex">
                                <label for="Signature">Firma:</label>
                                <p>______________________</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex">
                                <label for="date" class="mr-2">Lugar y Fecha:</label>
                                <p class="mx-1">San Miguel, {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        <div class="mt-5 text-end">
                            <button type="submit" class="btn btn-primary">
                                Guardar e Imprimir
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>


@endsection
