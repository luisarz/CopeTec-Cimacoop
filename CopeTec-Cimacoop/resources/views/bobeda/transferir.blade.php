@extends('base.base')
@section("title")
Editar Cliente
@endsection
@section('content')
    <form action="/bobeda/realizarTraslado" id="bodega" method="post" target='_blank' autocomplete="nope">
        {!! csrf_field() !!}
        {{ method_field('POST') }}
        <input type="hidden" name="id_bobeda" value="{{$bobeda->id_bobeda}}">
        {{-- 1=enviar a caja --}}
        <input type="hidden" name="tipo_operacion" value="1">

        <div class="input-group mb-5"></div>
        <div class="card-body">

            <!--begin::row group-->
            <div class="form-group row mb-5">
                <div class="form-floating col-lg-3">
                    <select name="id_caja" required class="form-select" data-control="w">
                        @foreach ($cajas as $caja)
                        <option value="{{$caja->id_caja}}">{{$caja->numero_caja}}</option>
                        @endforeach
                        
                    </select>
                    <label>Caja Destino:</label>
                </div>
                <div class=" form-floating col-lg-3">
                    <input type="number" required  class="form-control input-group-lg" name="monto" placeholder="monto" aria-label="monto"
                    aria-describedby="basic-addon1" />
                    <label>Monto transferir:</label>
                </div>
                 <div class="form-floating col-lg-4">
                    <input type="text" required    class="form-control" name="observacion" placeholder="observacion" aria-label="observacion"
                    aria-describedby="basic-addon1" />
                    <label>Observacion:</label>
                </div>
                <div class="form-floating col-1">

                    <button type="submit" class="btn btn-bg-danger btn-text-white">Trasladar</button>
                </div>
                
               
            </div>
           
            
              @if ($errors->has('dui_cliente'))
                <div class="alert alert-danger">
                    {{ $errors->first('dui_cliente') }}
                </div>
            @endif
        </div>
    
        
     
{{-- 
        <div class="card-footer d-flex justify-content-end py-6">
            <button type="submit" class="btn btn-bg-primary btn-text-white">Trasladar</button>
        </div> --}}
    </form>
@endsection
@section("scripts")
<script>
    $(document).ready(function(){
        var form=$("#bodega");
        form.submit(function(){
            window.location.href="/bobeda"
        });

    });
</script>
@endsection