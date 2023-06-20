@extends('base.base')

@section('title')
    Administracion de Clientes
@endsection

@section('content')
    <a href="/cuentas/add" class="btn btn-success"><i class="fa-solid fa-plus"></i> Aperturar Cuenta</a>
    <a href="/cuentas/addcuentacompartida" class="btn btn-info"><i class="fa-solid fa-plus"></i> Aperturar Cuenta Compartida</a>


    <div class="table-responsive">
        <table class=" table table-hover table-row-dashed fs-3  my-0 dataTable  gy-2 gs-5">
            <thead class="thead-dark">
                <tr class="fw-semibold fs-3 text-gray-800 border-bottom-2 border-gray-200">
                    <th class="min-w-50px">Acciones</th>
                    <th class="min-w-50px"># Cuenta</th>
                    <th class="min-w-150px">Asociado</th>
                    <th class="min-w-160px">Saldo</th>
                    <th class="min-w-200px">Tipo Cuenta</th>
                    <th class="min-w-100px">Compartida</th>

                    {{-- <th class="min-w-100px">Apertura</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($cuentas as $cuenta)
                    <tr>
                        <td>
                            <a href="/clientes/{{ $cuenta->id_cliente }}" class="btn btn-primary btn-sm "><i
                                    class="fa-solid fa-pencil text-white "></i> &nbsp; Administrar</a>
                        </td>
                        <td>{{ $cuenta->numero_cuenta }}</td>
                        <td>{{ $cuenta->nombre }} ->{{ $cuenta->dui_cliente }}</td>
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
                        <td>{{ $cuenta->descripcion_cuenta }}</td>
                        <td style="text-align: center">
                            @if ($cuenta->id_asociado_comparte != null)
                                <a href="/cuentas/{{ $cuenta->id_cuenta }}/compartida" class="btn btn-info btn-sm "><i
                                        class="fa-solid fa-pencil text-white "></i> &nbsp; Ver Asociado</a>
                            @else
                                <span  class="bagde bagde-info "> &nbsp; -</span>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $cuentas->links('vendor.pagination.bootstrap-5') }}

    <form method="post" id="deleteForm" action="/clientes/delete">
        {!! csrf_field() !!}
        {{ method_field('DELETE') }}
        <input type="hidden" name="id" id="id">
    </form>
@endsection

@section('scripts')
    <link href=" {{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />

    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script>
        function alertDelete(id) {
            Swal.fire({
                text: "Deseas Eliminar este registro",
                icon: "question",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Si",
                cancelButtonText: 'No',
                customClass: {
                    confirmButton: "btn btn-warning",
                    cancelButton: "btn btn-secondary"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#id").val(id)
                    $("#deleteForm").submit();
                } else if (result.isDenied) {}
            });
        }
    </script>
@endsection
