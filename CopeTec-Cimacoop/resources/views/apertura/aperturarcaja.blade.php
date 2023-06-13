@extends('base.base')
@section('title')
    Agregar Cliente
@endsection
@section('content')
    <form action="/apertura/aperturarcaja" method="POST" autocomplete="nope">
        {!! csrf_field() !!}
        <div class="input-group mb-5"></div>

        <div class="card-body">

            <!--begin::row group-->
            <div class="form-group row mb-4">
                <div class="form-floating col-lg-4">
                    <select name="id_caja" required class="form-control">
                        <option value="">Seleccione la Caja</option>
                        @foreach ($cajas as $caja)
                            <option value="{{ $caja->id_caja }}">{{ $caja->numero_caja }}</option>
                        @endforeach
                    </select>
                    <label for="floatingPassword">Caja a Aperturar</label>
                </div>
                <div class="form-floating col-lg-4">
                    <input type="number" required value="{{ old('monto_apertura') }}" class="form-control"
                        name="monto_apertura" placeholder="monto_apertura" aria-label="monto_apertura"
                        aria-describedby="basic-addon1" />
                    <label>Monto Apertura:</label>
                </div>
                 <div class="form-floating col-lg-4">
                        <button type="submit" class="btn btn-bg-danger btn-text-white">Aperturar Caja</button>

                </div>
            </div>

        </div>




        @if ($errors->has('dui_cliente'))
            <div class="alert alert-danger">
                {{ $errors->first('dui_cliente') }}
            </div>
        @endif
        </div>




        {{-- <div class="card-footer d-flex justify-content-end py-6">
            <button type="submit" class="btn btn-bg-danger btn-text-white">Aperturar Caja</button>
        </div> --}}
    </form>
@endsection
