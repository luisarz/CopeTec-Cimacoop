@extends('base.base')

@section('formName')
@endsection

@section('content')
    <div class="card shadow-lg my-3">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="ribbon-label fs-3 no-wrap" style="white-space: nowrap">
                <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i>
                | {{ Session::get('name_module') }}
                <span class="ribbon-inner bg-info"></span>
            </div>

            <div class="card-toolbar">
                <form action="/reportes/creditos" method="post" autocomplete="off">
                    {!! csrf_field() !!}
                    {{ method_field('POST') }}
                    <!--begin::Input group-->
                    <div class="row">
                        <div class="form-group row ">

                            <div class="form-floating col-lg-4">
                                <input type="date" value="{{ $desde }}" name="desde" id="desde"
                                    class="form-control">
                                <label>Fecha Inicio:</label>
                            </div>
                            <div class="form-floating col-lg-4">
                                <input type="date" value="{{ $hasta }}" name="hasta" id="hasta"
                                    class="form-control">
                                <label>Fecha Fin:</label>
                            </div>
                            <div class="form-floating col-lg-2">
                                <button type="submit" class="btn btn-info my-1">
                                    Buscar
                                </button>
                            </div>
                            <div class="form-floating col-lg-2">
                                <a href="javascript:generarReporte()" class="btn btn-primary my-1"> Imprimir</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <!--begin::Body-->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover  table-row-dashed fs-5     gy-2 gs-5">
                    <thead>
                        <tr class="fw-semibold fs-5 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="min-w-20px">No</th>
                            <th class="min-w-20px">Código crédito</th>
                            <th class="min-w-80px">Cliente</th>
                            <th class="min-w-20px">Fecha Pago</th>
                            <th class="min-w-30px">Plazo</th>
                            <th class="min-w-30px">Cuota</th>
                            <th class="min-w-30px">Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        @if (count($creditos) > 0)
                            @foreach ($creditos as $cr)
                                <tr class="fs-5 font-bold">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cr->codigo_credito }}</td>
                                    <td>{{ $cr->cliente->nombre }}</td>
                                    <td>{{ \Carbon\Carbon::parse($cr->ultima_fecha_pago)->format('d/m/Y') }}</td>
                                    <td>{{ $cr->plazo }} Meses</td>
                                    <td>@money($cr->cuota)</td>
                                    <td>@money($cr->saldo_capital)</td>
                                    <td>@money($cr->monto_solicitado)</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center">
                                    <h5>No hay resultados en el rango de fechas seleccionado</h5>
                                </td>
                            </tr>
                        @endif
                    </tbody>

                </table>
            </div>
        </div>
        <!--end: Card Body-->
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#desde').change(function() {
                var desde = $('#desde').val();
                var hasta = $('#hasta').val();
                console.log(desde);
                if (desde > hasta) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'La fecha de inicio no puede ser mayor a la fecha final',
                    })
                    $('#desde').val(hasta);
                }
            });
            $('#hasta').change(function() {
                var desde = $('#desde').val();
                var hasta = $('#hasta').val();
                if (desde > hasta) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'La fecha de inicio no puede ser mayor a la fecha final',
                    })
                    $('#hasta').val(desde);
                }
            });
        });

        function generarReporte() {

            let desde = $("#desde").val();
            let hasta = $("#hasta").val();
            if (desde == '' || hasta == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Debe seleccionar un rango de fechas',
                })
                return false;
            }
            window.open('/reportes/creditos/' + desde + '/' + hasta, '_blank');
        }
    </script>
@endsection
