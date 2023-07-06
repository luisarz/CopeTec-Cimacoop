@extends('base.base')
@section('formName')
    <i class="ki-duotone ki-user-tick text-success fs-1"><span class="path1"></span><span class="path2"></span><span
            class="path3"></span></i>
    Modificar beneficiario {{ $beneficiario->id_beneficiario }}
@endsection
@section('content')
    <form action="/beneficiarios/put" method="post" autocomplete="nope">
        {!! csrf_field() !!}
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{ $beneficiario->id_beneficiario }}">
        <input type="hidden" name="id_asociado" value="{{ $beneficiario->id_asociado }}">

        <div class="input-group mb-5"></div>

        <div class="card-body">


            <!--begin::row group-->
            <div class="form-group row mb-5">
                <div class="col-lg-8">
                    <label>Nombre Beneficiario:</label>
                    <input type="text" value="{{$beneficiario->nombre}}" required class="form-control" placeholder="Nombre" name="nombre" />
                </div>
                <div class="col-lg-4">
                    <label>Parentesco:</label>
                    <input type="text"  value="{{$beneficiario->parentesco}}" required class="form-control" placeholder="Parentesco" name="parentesco" />
                </div>


            </div>

            <!--begin::row group-->
            <div class="form-group row mb-5">
                <div class="col-lg-4">
                    <label>porcenta:</label>
                    <input type="number" atep="any" value="{{ $beneficiario->porcentaje }}"  required class="form-control"
                        placeholder="porcentaje %" name="porcentaje" />
                </div>
                <div class="col-lg-8">
                    <label>Dependientes economicamente de cliente:</label>
                    <input type="text" value="{{$beneficiario->direccion}}" step="1" required class="form-control" placeholder="Direccion"
                        name="direccion" />
                </div>
            </div>



        </div>

        </div>


        <div class="card-footer d-flex justify-content-end py-6">
            <button type="submit" class="btn btn-bg-primary btn-text-white">Modificar</button>
        </div>
    </form>
@endsection
