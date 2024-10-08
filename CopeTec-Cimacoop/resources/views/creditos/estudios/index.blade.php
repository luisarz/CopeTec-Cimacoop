@extends('base.base')
@section('content')
    <div class="card shadow-lg">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="d-flex align-items-center">
                <form action="/creditos/solicitudes/estudios" method="post" autocomplete="off"
                    class="d-flex align-items-center">
                    {!! csrf_field() !!}
                    {{ method_field('POST') }}
                    <!--begin::Input group-->
                    <div class="position-relative w-md-400px me-md-2">
                        <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input type="text" class="form-control form-control-solid ps-10" name="codigo_credito"
                            value="" placeholder="Codigo Credito">
                    </div>
                    <!--end::Input group-->
                    <div class="position-relative w-md-400px me-md-2">
                        <i class="ki-duotone ki-user fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6">
                            <i class="path1"></i>
                            <i class="path2"></i>
                        </i>
                        <input type="text" class="form-control form-control-solid ps-10" name="nombre_cliente"
                            value="" placeholder="Nombre Cliente">
                    </div>
                    <!--begin:Action-->
                    <div class="d-flex align-items-center">
                        <button type="submit" class="btn btn-primary me-5">Buscar</button>
                    </div>
                    <!--end:Action-->
                </form>
            </div>
            <div class="ribbon-label fs-5">
                               <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;

                Créditos | Aprobados 
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

            <div class="table-responsive">
                <table class="table table-hover  table-row-dashed fs-5     gy-2 gs-5">
                    <thead>
                        <tr class="fw-semibold fs-5 text-gray-800 border-bottom-2 border-gray-200">
                            <th>Acciones</th>
                            <th class="min-w-30px">No</th>
                            <th class="min-w-20px">Cliente</th>
                            <th class="min-w-80px">Fecha Pago</th>
                            <th class="min-w-50px">Fecha Venci.</th>
                            <th class="min-w-30px">Plazo</th>
                            <th class="min-w-30px">Cuota. Mensual</th>
                            <th class="min-w-30px">Prestamo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($creditos as $credito)
                            <tr>
                                <td>
                                    <a href="/creditos/preaprobado/liquidar/{{ $credito->id_credito }}"
                                        class="btn btn-danger btn-sm w-30">
                                        <i class="ki-outline ki-dollar fs-1 text-white">
                                        </i> Liquidar
                                    </a>
                                </td>
                                <td>{{ $credito->codigo_credito }}</td>
                                <td>{{ $credito->nombre }}</td>
                                <td><span class="badge badge-info">{{ $credito->proxima_fecha_pago }}</span></td>
                                <td><span class="badge badge-info">{{ $credito->fecha_vencimiento }}</span></td>
                                <td>{{ $credito->plazo }}</td>
                                <td>${{ number_format($credito->cuota, 2) }}</td>
                                <td>${{ number_format($credito->monto_solicitado, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $creditos->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
@endsection
