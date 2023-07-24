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
                <i class="ki-duotone ki-shield-tick text-white fs-2x"><span class="path1"></span><span
                        class="path2"></span><span class="path3"></span></i>
                Administracion de Cuentas

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
                        <a href="/cuentas/addcompartida" class="btn btn-info">
                            <span>
                                <i class="fa fa-download fa-2x"></i>
                            </span>
                            Aperturar Cuenta Compartida
                        </a>
                        <a href="/cuentas/addcompartida" class="btn btn-outline btn-outline-dashed btn-outline-info">
                            <span>
                                <i class="fa fa-print fa-2x"></i>
                            </span>
                            Reporte de Cuentas
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
           @if($errors->any())
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
                            <th class="min-w-150px">Acciones</th>
                            <th>Cuenta</th>
                            <th>Asociado</th>
                            <th>Saldo</th>
                            <th>Tipo Cuenta</th>
                            <th>Compartida</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cuentas as $cuenta)
                            <tr>
                                <td>
                                    @if ($cuenta->estado != '0')
                                        <a href="javascript:void(0);" tol-tip="Cuenta Congelada"
                                            onclick="alertCongelar({{ $cuenta->id_cuenta }})" data-offset="20px 20px"
                                            data-toggle="popover" data-placement="top" data-content="Example content"
                                            class="btn btn-danger btn-sm w-50px"><i class="fa fa-ban text-white"></i>

                                        </a>
                                    @else
                                        <a class="btn btn-outline btn-outline-dashed btn-outline-danger btn-sm">
                                            <i class="fa fa-ban text-danger"></i>
                                        </a>
                                    @endif

                                    <a href="/reportes/contrato/{{ $cuenta->id_cuenta }}"
                                        class="btn btn-primary btn-sm w-120px"><i class="fa fa-print text-white"></i>
                                    </a>
                                    <a href="/reportes/RepEstadoCuenta/{{ $cuenta->id_cuenta }}"
                                        class="btn btn-info btn-sm w-120px"><i class="fa fa-print text-white"></i>
                                    </a>

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

@section('scripts')
    {{-- <link href=" {{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" /> --}}

    {{-- <script src="assets/plugins/global/plugins.bundle.js"></script> --}}
    <script>
        $(function() {
            $('[data-toggle="popover"]').popover();
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
    </script>
@endsection
