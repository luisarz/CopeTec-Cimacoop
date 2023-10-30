@extends('base.base')

@section('title')
    Administracion de Clientes
@endsection

@section('formName')
@endsection

@section('content')


    <!-- Modal-->
    <div class="modal fade" id="transaccionesPendientes" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <form action="/libretas/imprimirLibretaItems" id="frmPrint" method="POST" target="_blank"
                    autocomplete="off">
                    {!! csrf_field() !!}
                    {{ method_field('POST') }}

                    <input type="hidden" id="id_cuenta">
                    <div class="modal-header">
                        <h5 class="check-title" id="exampleModalLabel">POSTEO de Libretas</h5>
                    </div>
                    <div class="modal-body" style="height: 300px;">


                        <div class="row table-responsive">
                            <table class="table table-bordered">
                                <th><input type="checkbox" id="check-todos" class="checkbox"></th>
                                <th>Fecha</th>
                                <th>Retiros</th>
                                <th>Depositos</th>
                                <th>Saldo</th>
                                <th>Cajero</th>
                                <tbody id="elementosBody">

                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal"
                            id="btnCancelar">Cancelar</button>
                        <button type="submit" id="btnImprimir" class="btn btn-danger font-weight-bold">Imprimir</button>
                    </div>
                </form>

            </div>
        </div>
    </div>



    <div class="card shadow-lg">
        <div class="card-header ribbon ribbon-end ribbon-clip">

            <div class="ribbon-label fs-3">
                <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;
                Administración | {{ Session::get('name_module') }}
                <span class="ribbon-inner bg-info"></span>
            </div>
            <div class="d-flex flex-wrap flex-sm-nowrap mt-5">

                <!--begin: buttons actions-->
                <div class="flex-grow-1 me-1 mb-4">
                    <div class="symbol symbol-100px symbol-lg-100px symbol-fixed position-relative">
                        {{-- <a href="/cuentas/add" class="btn btn-success">
                            <span>
                                <i class="fa fa-upload fa-2x"></i>
                            </span>
                            Renovar Libreta
                        </a> --}}

                    </div>
                </div>
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

            <div class="table-responsive">
                <table class="data-table-coop table table-hover table-row-dashed fs-6     gy-2 gs-5">
                    <thead class="thead-dark">
                        <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="min-w-80px">Acciones</th>
                            <th>Cuenta</th>
                            <th>Asociado</th>
                            <th>Saldo</th>
                            <th>Tipo Cuenta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($libretas as $cuenta)
                            <tr>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info btn-flex btn-center "
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">

                                        <i class="ki-outline ki-dots-vertical fs-5 ms-1"></i></a>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded  menu-state-bg-light-info fw-semibold fs-7 w-150px py-3"
                                        data-kt-menu="true" style="">

                                        <div class="menu-item px-2">
                                            <a href="javascript:void(0);"
                                                onclick="movimientosSinImprimir({{ $cuenta->id_cuenta }})"
                                                class="menu-link px-3">
                                                <i class="ki-outline ki-printer text-success fs-2">
                                                </i>
                                                <span class="text-success fs-5">Postear</span>
                                            </a>

                                        </div>
                                        <div class="menu-item px-2">
                                            <a href="/reportes/RepEstadoCuenta/{{ $cuenta->id_cuenta }}"
                                                class="menu-link px-3">
                                                <i class="ki-outline ki-book-square text-danger fs-2">
                                                </i>
                                                <span class="fs-5 text-danger"> Renovar</span>
                                            </a>

                                        </div>
                                </td>


                                <td>

                                    @if ($cuenta->estado == '0')
                                        <span
                                            class="badge badge-danger fs-6">{{ str_pad($cuenta->numero_cuenta, 10, '0', STR_PAD_LEFT) }}</span>
                                    @else
                                        <span
                                            class="badge badge-success fs-6">{{ str_pad($cuenta->numero_cuenta, 10, '0', STR_PAD_LEFT) }}</span>
                                    @endif
                                </td>
                                <td>{{ $cuenta->nombre_cliente }} ({{ $cuenta->dui_cliente }})</td>
                                <td>
                                    @php
                                        $saldo_cuenta = number_format($cuenta->saldo_cuenta, 2, '.', ',');
                                        $length = strlen($saldo_cuenta);
                                        $halfLength = (int) ($length / 3);
                                        $maskedValue = substr($saldo_cuenta, 0, $halfLength) . str_repeat('*', $length - $halfLength);
                                    @endphp
                                    <span class="fs-5 fw-bold text-gray-800 me-1 lh-3">$
                                        {{ $maskedValue }}</span>
                                </td>
                                <td>
                                    {{ $cuenta->tipo_cuenta }}
                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <form method="post" id="anularForm" action="/cuentas/anularCuenta">
        {!! csrf_field() !!}
        {{ method_field('POST') }}
        <input type="hidden" name="id_cuenta_anular" id="id_cuenta_anular">
    </form>
@endsection
<link href=" {{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
@section('scripts')
    <script>
        $("#btnCancelar").on('click', function() {
            $("#transaccionesPendientes").modal('hide');
        });

        function movimientosSinImprimir(id_cuenta) {

            swalProcessing();
            $("#id_cuenta").val(id_cuenta);



            $.ajax({
                url: '/cuentas/listarMovimientosSinImprirmir/' + id_cuenta,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    Swal.close();
                    if (data.movimientosPendientes > 0) {
                        $("#transaccionesPendientes").modal({
                            backdrop: 'static',
                            keyboard: false
                        }).modal('show');
                        const movimientos = data.movimientos;
                        $('#elementosBody').html("");
                        $.each(movimientos, function(index, element) {
                            let tipo_operacion = element.tipo_operacion
                            let retiro = 0;
                            let depositos = 0;
                            let saldo = 0;
                            
                            if (tipo_operacion == '2') {
                                retiro = element.monto;
                                depositos = '-';
                            } else {
                                depositos = element.monto;
                                retiro = '-';
                            }

                            let id = element.id_movimiento;
                            $('#elementosBody').append(
                                '<tr>' +
                                '<td><input type="checkbox" checked class="check-imprimir" id="' +
                                id + '"> </td>' +
                                '<td>' + element.fecha_operacion + '</td>' +
                                '<td>' + retiro + '</td>' +
                                '<td>' + depositos + '</td>' +
                                '<td>' + element.saldo + '</td>' +
                                '<td>' + element.numero_caja + '</td>' +
                                '</tr>');
                        });

                    } else {
                        Swal.fire({
                            title: 'Sin Movimientos Pendientes',
                            icon: 'success',
                            showConfirmButton: true,
                            customClass: {
                                confirmButton: "btn btn-info",
                            },
                            allowscapeKey: false,
                            timerProgressBar: true,
                            allowOutsideClick: false,
                            timer: 5000, // 5000 milisegundos = 5 segundos
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $("#transaccionesPendientes").modal(
                                    'hide'); // Cerrar el modal al confirmar la alerta
                            }
                        });

                    }
                }
            });
        }



        $('#check-todos').change(function() {
            var isChecked = $(this).is(':checked'); // Verifica si la casilla está marcada
            $('.check-imprimir').prop('checked',
                isChecked
            ); // Marca o desmarca todas las casillas secundarias según el estado de la casilla principal
        });

        $("#frmPrint").on('submit', function(ev) {
            ev.preventDefault();
            // swalProcessing();
            let elementosMarcados = [];
            $('.check-imprimir').each(function() {
                if ($(this).is(":checked")) {
                    var idMarcado = $(this).attr('id'); // Obtén el ID de los elementos marcados
                    elementosMarcados.push(idMarcado); // Agrega el ID a la lista de elementos marcados
                }
            });

            let imprimirCant = elementosMarcados.length;
            if (imprimirCant > 0) {
                let url = "/libretas/imprimirLibretaItems"
                let id_cuenta = $("#id_cuenta").val();
                let _token = "{{ csrf_token() }}";
                let data = {
                    "elementosMarcados": elementosMarcados,
                };

                if (elementosMarcados && elementosMarcados.length > 0) {
                    elementosMarcados.forEach((element, index) => {
                        $("#frmPrint").append('<input type="hidden" name="elementosMarcados[]" value="' +
                            element +
                            '">');
                    });
                    this.submit();

                    setTimeout(() => {
                        $("#transaccionesPendientes").modal('hide');
                    }, 1000);
                }


            } else {
                Swal.fire({
                    title: 'Debe seleccionar al menos un movimiento',
                    icon: 'error',
                    showConfirmButton: true,
                    customClass: {
                        confirmButton: "btn btn-info",
                    },
                    allowscapeKey: false,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    timer: 5000, // 5000 milisegundos = 5 segundos
                });
            }
        });
    </script>
@endsection
