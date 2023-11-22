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
                <input type="hidden" id="id_cuenta">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Movimientos sin imprimir</h5>
                </div>
                <div class="modal-body" style="height: 300px;">
                    <div class="row table-responsive">
                        <table class="table table-bordered">
                            <th>Imprimir</th>
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
                    <button type="button" id="btnImprimir" class="btn btn-danger font-weight-bold">Imprimir</button>
                </div>
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
                        <a href="/cuentas/add" class="btn btn-success">
                            <span>
                                <i class="fa fa-upload fa-2x"></i>
                            </span>
                            Aperturar Cuenta
                        </a>
                        <a href="/cuentas/addcuentacompartida" class="btn btn-info">
                            <span>
                                <i class="fa fa-download fa-2x"></i>
                            </span>
                            Aperturar Cuenta Compartida
                        </a>
                        {{-- <a href="/cuentas/addcompartida" class="btn btn-outline btn-outline-dashed btn-outline-info">
                            <span>
                                <i class="fa fa-print fa-2x"></i>
                            </span>
                            Reporte de Cuentas
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
                            <th>Compartida</th>
                            <th>Declaración</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cuentas as $cuenta)
                            <tr>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info btn-flex btn-center "
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">

                                        <i class="ki-outline ki-dots-vertical fs-5 ms-1"></i></a>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded  menu-state-bg-light-info fw-semibold fs-7 w-150px py-3"
                                        data-kt-menu="true" style="">

                                        <div class="menu-item px-2">
                                            @if ($cuenta->estado != '0')
                                                <a href="javascript:void(0);" tol-tip="Cuenta Congelada"
                                                    onclick="alertCongelar({{ $cuenta->id_cuenta }})"
                                                    class="menu-link px-3">

                                                    <i class="ki-outline ki-shield-cross text-danger fs-3">
                                                    </i>
                                                    <span class="text-danger"> Congelar</span>

                                                </a>
                                            @else
                                                <a class="btn btn-outline btn-outline-dashed btn-outline-danger btn-sm"
                                                    class="menu-link px-3">
                                                    <i class="fa fa-ban text-danger"></i>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="menu-item px-2">
                                            <a href="/reportes/contrato/{{ $cuenta->id_cuenta }}" target="_blank" class="menu-link px-3">
                                                <i class="ki-outline ki-printer text-primary fs-2">
                                                </i>
                                                <span class=""> Contrato</span>
                                            </a>
                                        </div>
                                        <div class="menu-item px-2">
                                            <a href="/reportes/RepEstadoCuenta/{{ $cuenta->id_cuenta }}" target="_blank"
                                                class="menu-link px-3">
                                                <i class="ki-outline ki-printer text-primary fs-2">
                                                </i>
                                                <span class=""> Estado Cuenta</span>
                                            </a>

                                        </div>
                                        <div class="menu-item px-2">
                                            <a href="javascript:void(0);"
                                                onclick="movimientosSinImprimir({{ $cuenta->id_cuenta }})"
                                                class="menu-link px-3">
                                                <i class="ki-outline ki-printer text-primary fs-2">
                                                </i>
                                                <span class="text-success ">Postear</span>
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
                                <td style="text-align: center">
                                    @if ($cuenta->id_asociado_comparte != null)
                                        <a href="/cuentas/{{ $cuenta->id_cuenta }}/compartida"
                                            class="btn btn-info btn-sm "><i class="fa-solid fa-pencil text-white "></i>
                                            &nbsp; Ver Asociado</a>
                                    @else
                                        <span class="bagde bagde-info "> &nbsp; -</span>
                                    @endif
                                </td>

                                <td>
                                    @if ($cuenta->declarado)
                                        <div class="d-flex">
                                            <a href="/declare/{{ $cuenta->id_cuenta }}" class="btn btn-info btn-sm">
                                                Editar</a>
                                            <a href="/declare/{{ $cuenta->id_cuenta }}/pdf"
                                                class="btn btn-secondary btn-sm" target="_blank">
                                                Imprimir</a>
                                        </div>
                                    @else
                                        <a href="/declare/{{ $cuenta->id_cuenta }}/new" class="btn btn-success btn-sm">
                                            Crear</a>
                                    @endif
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
        $(document).ready(function() {


        });

        function alertCongelar(id) {

            Swal.fire({

                html: `¿Deseas Congelar esta cuenta? <br/><span class="badge badge-danger fs-3">No Podras usarla</span><br/> Ingresa contraseña para confirmar`,
                input: 'text',
                icon: "question",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Si, Continuar Proceso",
                cancelButtonText: 'No',
                inputValidator: (value) => {
                    if (!value) {
                        return 'Debe ingresar una contraseña';
                    }
                },
                customClass: {
                    confirmButton: "btn btn-danger",
                    cancelButton: "btn btn-secondary"
                },
                inputAttributes: {
                    class: 'form-control text-bold',
                    style: 'color: red; font-size: 16px;',
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    const password = result.value;
                    $.ajax({
                        url: '/temp/validatePassword/' + password,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            if (data.status == 'success') {

                                $("#id_cuenta_anular").val(id)
                                $("#anularForm").submit();

                                Swal.fire({
                                    title: 'Proceso Realizado con exito',
                                    icon: 'success',
                                    showConfirmButton: true,
                                    customClass: {
                                        confirmButton: "btn btn-info",
                                    },
                                    timerProgressBar: true,
                                    timer: 5000, // 5000 milisegundos = 5 segundos
                                });
                            } else {
                                Swal.fire({
                                    title: 'Errro al Realizar proceso',
                                    text: 'El estado de la contraseña es: ' + data.status,
                                    icon: 'error',
                                    showConfirmButton: true,
                                    customClass: {
                                        confirmButton: "btn btn-info",
                                    },
                                    timerProgressBar: true,
                                    timer: 5000, // 5000 milisegundos = 5 segundos
                                });
                            }
                        }
                    });
                } else if (result.isDenied) {}
            });

        }

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

                        $.each(movimientos, function(index, element) {
                            let tipo_operacion = index.tipo_operacion
                            let retiros = 0;
                            let depositos = 0;
                            let saldo = 0;
                            if(tipo_operacion=='2')
                            {
                                retiros = element.monto;
                                depositos = '0.00';
                            }
                            else
                            {
                              depositos = element.monto;
                                retiros = '0.00';
                            }
                            $('#elementosBody').append(
                                '<tr>' +
                                '<td><input type="checkbox" checked> </td>' +
                                '<td>' + element.fecha_operacion + '</td>' +
                                '<td>' + retiros + '</td>' +
                                '<td>' + depositos + '</td>' +
                                '<td>' + element.saldo + '</td>' +
                                '<td>' + element.id_caja + '</td>' +
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
    </script>
@endsection
