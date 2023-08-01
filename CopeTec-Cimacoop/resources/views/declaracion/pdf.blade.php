@extends('base.empty')

@section('title')
    Administracion de Clientes
@endsection

@section('content')
    <div class="">
        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="fs-1">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div id="GFG">
                <div class="container">
                    <img alt="Logo" class="my-5" style="max-height: 100px;"
                        src=" {{ asset('assets/media/logos/cimacoop.png') }}" />
                    <input type="hidden" name="id_cuenta" id="id_cuenta" value="{{ $acc->id_cuenta }}">
                    <input type="hidden" name="id_cliente" id="id_cliente"
                        value="{{ $acc->asociado->cliente->id_cliente }}">
                    <input type="hidden" name="declaracion_id" id="declaracion_id" value="{{ $dec->declaracion_id }}">
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
                                <label for="exampleInputEmail1">Número de depositos:</label>
                                <br>
                                {{ $dec->n_depositos }}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Valor promedio de depósitos</label>
                                <br>
                                @money($dec->val_prom_depositos)
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Al depositar realizare abonos mediante:</label> <br>
                                {{ $dec->depo_tipo }}
                            </div>
                        </div>
                        {{-- start withdrawals --}}
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Número de retiros</label>
                                <br>
                                {{ $dec->n_retiros }}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Valor promedio de retiros</label>
                                <br>
                                @money($dec->val_prom_retiros)
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Al realizar retiros lo ha hare mediante:</label>
                                <br>
                                {{ $dec->ret_tipo }}
                            </div>
                        </div>
                        {{-- start founds origins --}}
                        <div class="col-12">
                            <h5 class="my-4 text-center">
                                Origen de los fondos
                            </h5>
                        </div>
                        <div class="col-6">
                            Origen de los fondos: <br>
                            {{ $dec->origen_fondos }}
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                {{ $dec->otro_origen_fondos == null ? '- - ' : $dec->otro_origen_fondos }}
                                <br>
                                <small class="text-muted" for="exampleInputEmail1">Otro origen de fondo descripción</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class="my-4 text-center">
                                Favor detalle documentación adjunta que ampara la procedencia de los fondos
                            </h5>
                        </div>
                        <div class="col-6">
                            Documentación adjunta: <br>
                            {{ $dec->origen_fondos }}
                        </div>
                        <div class="col-6">
                            <div class="form-group">

                                {{ $dec->otro_comprobante_fondos == null ? '- - ' : $dec->otro_comprobante_fondos }} <br>
                                <small class="text-muted" for="exampleInputEmail1">Otra documentacion descripción</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class="my-4 text-center">
                                Declaración Jurada
                            </h5>
                            <p>
                                Por este medio, en cumplimiento del instructivo emitido por la Unidad de Investigación
                                de la
                                Fiscalía General de la República, para la prevención del Lavado de Dinero y de Activos
                                en
                                las instituciones bancarias; BAJO JURAMENTO DECLARO: Que la información
                                anterior que he proporcionado a CIMACOOP de RL. . y que forma parte de mi expediente o
                                del
                                expediente de mi representada en su
                                caso, es fidedigna y que las transacciones efectuadas en la cuenta de operaciones
                                pasivas no
                                proceden, ni serán utilizadas con la finalidad de favorecer ningún tipo de actividad
                                ilegal,
                                contempladas en la Ley Contra el Lavado de Dinero y Activos. Además declaro que
                                me someto a cualquier tipo de investigación necesaria para establecer la procedenciade
                                los
                                fondos de mi persona o de mi representada en su caso.
                            </p>
                        </div>
                        <div class="col-8 mt-5">
                            <div class="d-flex">
                                <label for="Client name">Nombre: </label>
                                <p> {{ $acc->asociado->cliente->nombre }}</p>
                            </div>
                        </div>
                        <div class="col-4 mt-5">
                            <div class="d-flex">
                                <label for="Signature">Firma: </label>
                                <p>______________________</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex">
                                <label for="date" class="mr-2">Lugar y Fecha:</label>
                                <p class="mx-1">San Miguel,
                                    {{ $dec->fecha == null ? \Carbon\Carbon::now()->format('d/m/Y') : \Carbon\Carbon::parse($dec->fecha)->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            window.print();
        });
    </script>
@endsection
