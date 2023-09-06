@extends('base.base')
@section('content')
    <div class="card shadow-lg my-3">
        <div class="card-header ribbon ribbon-end ribbon-clip">


            <div class="card-toolbar">
                <form action="/creditos/desembolsos/reportes" method="post" autocomplete="off">
                    {!! csrf_field() !!}
                    {{ method_field('POST') }}
                    <!--begin::Input group-->
                    <div class="row">
                        <div class="form-group row ">

                            <div class="form-floating col-lg-4">
                                <input type="date" value="{{ date('Y-m-d') }}" name="desde" id="desde"
                                    class="form-control">
                                <label>Fecha Inicio:</label>
                            </div>
                            <div class="form-floating col-lg-4">
                                <input type="date" value="{{ date('Y-m-d') }}" name="hasta" id="hasta"
                                    class="form-control">
                                <label>Fecha Inicio:</label>
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
            <div class="ribbon-label fs-3">
                <i class="ki-outline  ki-brifecase-timer  text-white fs-2x"></i> &nbsp;
                Reporte | Desembolsos
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
                            <th class="min-w-20px">No</th>
                            <th class="min-w-20px">Desembolso</th>
                            <th class="min-w-80px">Codigo</th>
                            <th class="min-w-20px">Cliente</th>
                            <th class="min-w-30px">Plazo</th>
                            <th class="min-w-30px">Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($creditos as $credito)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d/m/Y h:i:s a',strtotime($credito->fecha_desembolso)) }}</td>
                                <td>{{ $credito->codigo_credito }}</td>
                                <td>{{ $credito->nombre }}</td>
                                <td>{{ $credito->plazo }}</td>
                                <td>${{ number_format($credito->monto_solicitado, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $creditos->links() }}
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#desde').change(function() {
                var desde = $('#desde').val();
                var hasta = $('#hasta').val();
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
         
            let desde =$("#desde").val();
            let hasta =$("#hasta").val();
            if(desde=='' || hasta==''){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Debe seleccionar un rango de fechas',
                })
                return false;
            }
            window.open('/creditos/desembolsos/reportes/'+desde+'/'+hasta, '_blank');
        }


    </script>
@endsection
