@extends('base.base')
@section('formName')
    <span class="badge badge-info fs-5">Monto Aprobado: <span
            class="badge badge-success fw-bold fs-2x">${{ number_format($credito->monto_solicitado, 2) }}</span></span>
@endsection
@section('content')
    <div class="card shadow-lg">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="card-toolbar">
                <a href="/creditos/abonos">

                    <button type="button"
                        class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
                        <i class="ki-duotone ki-black-left-line  text-dark   fs-2x">
                            <i class="path1"></i>
                            <i class="path2"></i>
                        </i>
                        Cancelar
                    </button>
                </a>
                <div class="">

                </div>
            </div>
            <div class="ribbon-label fs-5">
                <i class="ki-outline ki-electricity text-white fs-3x"></i>
                Liquidar - Desembolso de Credito
                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group row mb-3">
                <div class="form-floating  col-lg-2">
                    <input class="form-control" disabled value="{{ date('d-m-Y', strtotime($credito->fecha_pago)) }}" />
                    <label>Fecha Aprobación:</label>

                </div>
                <div class="form-floating  col-lg-3">
                    <input class="form-control" disabled value="{{ $credito->dui_cliente }}" />
                    <label>DUI:</label>
                </div>


                <div class="form-floating  col-lg-7">
                    <input class="form-control" disabled value="{{ $credito->nombre }}" />
                    <label>Cluiente:</label>
                </div>


            </div>





            <!--end::Input wrapper-->
            <form action="/creditos/payment" method="post">
                {!! csrf_field() !!}
                {{ method_field('POST') }}
                <input type="hidden" name="id_credito" value="{{ $credito->id_credito }}">



                <h2>Distribución de liquidación</h2>
                <div class="form-group row mb-3">
                    <button class="btn btn-success" type="submit">Liquidar Crédito</button>
                </div>
                <hr>
                <div class="row">

                    <div class="col-md-5">

                        <div class="card card-dashed shadow-sm">
                            <div class="card-header">
                                <div class="card-toolbar">
                                    <span class="badge badge-danger fs-6">Código/Descripcion</span>

                                </div>
                            </div>
                            <div class="card-body">
                                {{-- --begin gorup --}}
                                <div class="form-group row mb-3">
                                    <div class="form-floating col-lg-12">
                                        <select name="destino" id="destino" class="form-select" data-control="select2">
                                            @foreach ($destinoCredito as $destino)
                                                <option value="{{ $destino->id_cuenta }}">
                                                    {{ $destino->numero }} ->
                                                    {{ $destino->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="">Destino</label>
                                    </div>
                                </div>
                                {{-- --begin gorup --}}
                                <div class="form-group row mb-3">
                                    <div class="form-floating col-lg-12">
                                        <select name="destino" id="destino" class="form-select" data-control="select2">
                                            @foreach ($tiposCuenta as $tipoCuenta)
                                                <option value="{{ $tipoCuenta->id_cuenta }}">
                                                    {{ $tipoCuenta->numero }} ->
                                                    {{ $tipoCuenta->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="">Cuenta de Ahorro</label>
                                    </div>
                                </div>
                                {{-- --begin gorup --}}
                                <div class="form-group row mb-3">
                                    <div class="form-floating col-lg-12">
                                        <select name="destino" id="destino" class="form-select" data-control="select2">
                                            @foreach ($ingresosPorAplicar as $ingreso)
                                                <option value="{{ $ingreso->id_cuenta }}">
                                                    {{ $ingreso->numero }} ->
                                                    {{ $ingreso->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="">Ingresor Por Aplicar</label>
                                    </div>
                                </div>
                                {{-- End gorup --}}
                                {{-- --begin gorup --}}
                                <div class="form-group row mb-3">
                                    <div class="form-floating col-lg-12">
                                        <select name="destino" id="destino" class="form-select" data-control="select2">
                                            @foreach ($destinoCredito as $tipoCuenta)
                                                <option value="{{ $tipoCuenta->id_cuenta }}">
                                                    {{ $tipoCuenta->numero }} ->
                                                    Liq. {{ $tipoCuenta->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="">Liquidaciones</label>
                                    </div>
                                </div>
                                {{-- --End gorup --}}
                                {{-- --begin gorup --}}
                                <div class="form-group row mb-3">
                                    <div class="form-floating col-lg-12">
                                        <select name="destino" id="destino" class="form-select" data-control="select2">
                                            @foreach ($seguroDescuentos as $tipoCuenta)
                                                <option value="{{ $tipoCuenta->id_cuenta }}">
                                                    {{ $tipoCuenta->numero }} ->
                                                    {{ $tipoCuenta->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="">Otros descuentos</label>
                                    </div>
                                </div>
                                {{-- End gorup --}}
                                {{-- --begin gorup --}}
                                <div class="form-group row mb-3">
                                    <div class="form-floating col-lg-12">
                                        <select name="destino" id="destino" class="form-select" data-control="select2">
                                            @foreach ($desceuntosIVA as $tipoCuenta)
                                                <option value="{{ $tipoCuenta->id_cuenta }}">
                                                    {{ $tipoCuenta->numero }} ->
                                                    {{ $tipoCuenta->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="">Descuentos de IVA</label>
                                    </div>
                                </div>
                                {{-- --begin gorup --}}
                                <div class="form-group row mb-3">
                                    <div class="form-floating col-lg-12">
                                        <select name="destino" id="destino" class="form-select" data-control="select2">
                                            @foreach ($descuentoDeAportaciones as $tipoCuenta)
                                                <option value="{{ $tipoCuenta->id_cuenta }}">
                                                    {{ $tipoCuenta->numero }} ->
                                                    {{ $tipoCuenta->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="">Aportaciones Asociado</label>
                                    </div>
                                </div>
                                {{-- --begin gorup --}}
                                <div class="form-group row mb-3">
                                    <div class="form-floating col-lg-12">
                                        <select name="destino" id="destino" class="form-select" data-control="select2">
                                            @foreach ($descuentoComisiones as $tipoCuenta)
                                                <option value="{{ $tipoCuenta->id_cuenta }}">
                                                    {{ $tipoCuenta->numero }} ->
                                                    {{ $tipoCuenta->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="">Comisiones</label>
                                    </div>
                                </div>
                                {{-- --begin gorup --}}
                                <div class="form-group row mb-3">
                                    <div class="form-floating col-lg-12">
                                        <select name="destino" id="destino" class="form-select"
                                            data-control="select2">
                                            @foreach ($otrosDescuentos as $tipoCuenta)
                                                <option value="{{ $tipoCuenta->id_cuenta }}">
                                                    {{ $tipoCuenta->numero }} ->
                                                    {{ $tipoCuenta->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="">Otros Descuentos</label>
                                    </div>
                                </div>

                            </div>

                        </div>

                        {{-- End gorup --}}




                    </div>

                    <div class="col-md-4">

                        <div class="card card-dashed shadow-sm">
                            <div class="card-header">
                                <div class="card-toolbar">
                                    <span class="badge badge-danger fs-5">Debe</span>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group row mb-3">
                                    <div class="form-floating col-lg-12">
                                        <input type="text" name="destinoDebe" id="destinoDebe" disabled
                                            value="{{ number_format($credito->monto_solicitado,2) }}"
                                            class="form-control text-success fw-bold" placeholder="Debe">
                                        <label for="">Debe</label>
                                    </div>
                                </div>

                                {{-- --begin gorup --}}
                                <div class="form-group row mb-3">
                                    <div class="form-floating col-lg-12">
                                        <select name="destino" id="destino" class="form-select"
                                            data-control="select2">
                                            @foreach ($cuentas as $cuenta)
                                                <option value="{{ $cuenta->id_cuenta }}">
                                                    {{ $cuenta->numero_cuenta }} ->
                                                    {{ $cuenta->descripcion_cuenta }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="">Cuenta a depositar Liquido</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <center>
                        </center>
                        <div class="card card-dashed shadow-sm">
                            <div class="card-header">
                                <div class="card-toolbar">
                                    <span class="badge badge-danger fs-5">Haber</span>

                                </div>
                            </div>
                            <div class="card-body">
                                {{-- begin item --}}
                                <div class="form-group row mb-3">
                                    <div class="form-floating col-lg-12">
                                        <input type="number" name="destinoDebe" id="destinoDebe" value="0.00"
                                            class="form-control text-danger" placeholder="Debe">
                                        <label for="">Haber</label>
                                    </div>
                                </div>
                                {{-- end item --}}
                                {{-- begin item --}}
                                <div class="form-group row mb-3">
                                    <div class="form-floating col-lg-12">
                                        <input type="number" name="destinoDebe" id="destinoDebe" value="0.00"
                                            class="form-control text-danger" placeholder="Debe">
                                        <label for="">Haber</label>
                                    </div>
                                </div>
                                {{-- end item --}}
                                {{-- begin item --}}
                                <div class="form-group row mb-3">
                                    <div class="form-floating col-lg-12">
                                        <input type="number" name="destinoDebe" id="destinoDebe" value="0.00"
                                            class="form-control text-danger" placeholder="Debe">
                                        <label for="">Haber</label>
                                    </div>
                                </div>
                                {{-- end item --}}
                                {{-- begin item --}}
                                <div class="form-group row mb-3">
                                    <div class="form-floating col-lg-12">
                                        <input type="number" name="destinoDebe" id="destinoDebe" value="0.00"
                                            class="form-control text-danger" placeholder="Debe">
                                        <label for="">Haber</label>
                                    </div>
                                </div>
                                {{-- end item --}}
                                {{-- begin item --}}
                                <div class="form-group row mb-3">
                                    <div class="form-floating col-lg-12">
                                        <input type="number" name="destinoDebe" id="destinoDebe" value="0.00"
                                            class="form-control text-danger" placeholder="Debe">
                                        <label for="">Haber</label>
                                    </div>
                                </div>
                                {{-- end item --}}
                                {{-- begin item --}}
                                <div class="form-group row mb-3">
                                    <div class="form-floating col-lg-12">
                                        <input type="number" name="destinoDebe" id="destinoDebe" value="0.00"
                                            class="form-control text-danger" placeholder="Debe">
                                        <label for="">Haber</label>
                                    </div>
                                </div>
                                {{-- end item --}}
                                {{-- begin item --}}
                                <div class="form-group row mb-3">
                                    <div class="form-floating col-lg-12">
                                        <input type="number" name="destinoDebe" id="destinoDebe" value="0.00"
                                            class="form-control text-danger" placeholder="Debe">
                                        <label for="">Haber</label>
                                    </div>
                                </div>
                                {{-- end item --}}
                                {{-- begin item --}}
                                <div class="form-group row mb-3">
                                    <div class="form-floating col-lg-12">
                                        <input type="number" name="destinoDebe" id="destinoDebe" value="0.00"
                                            class="form-control text-danger" placeholder="Debe">
                                        <label for="">Haber</label>
                                    </div>
                                </div>
                                {{-- end item --}}
                                {{-- begin item --}}
                                <div class="form-group row mb-3">
                                    <div class="form-floating col-lg-12">
                                        <input type="number" name="destinoDebe" id="destinoDebe" value="0.00"
                                            class="form-control text-danger" placeholder="Debe">
                                        <label for="">Haber</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end item --}}

                    </div>




                </div>
                <hr>
                
            </form>




        </div>
        <div class="card-footer">
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function imprimirBoleta(id_pago_credito) {
            window.open('/creditos/abonos/imprimir/' + id_pago_credito, '_blank');
        }
    </script>
@endsection
