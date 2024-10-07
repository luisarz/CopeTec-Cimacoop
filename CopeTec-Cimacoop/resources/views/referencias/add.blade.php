@extends('base.base')
@section("title")
Agregar Cliente
@endsection
@section('content')
   <div class="card">
       <div class="card-header">
           <div class="card-toolbar">
               <a href="/referencias" class="btn btn-secondary"><i class="fa-solid fa-arrow-alt-circle-left"></i> Cancelar</a>

           </div>
           <h3 class="card-title">Agregar Referencia</h3>
       </div>
         <div class="card-body">
             <form action="/referencias/add" method="post" autocomplete="nope">
                 {!! csrf_field() !!}
                 <div class="input-group mb-5"></div>
                 <!--begin::Input group-->
                 <div class="form-floating mb-5">
                     <input required type="text" class="form-control" name="nombre" placeholder="nombre" aria-label="nombre" aria-describedby="basic-addon1"/>
                    <label>Nombre</label>
                 </div>

                 <!--begin::Input group-->
                 <div class="form-floating mb-5">
                     <input required type="text" class="form-control" name="parentesco" placeholder="parentesco" aria-label="parentesco" aria-describedby="basic-addon1"/>
                    <label>DUI</label>
                 </div>
                 <!--begin::Input group-->
                 <div class="form-floating mb-5">
                     <input required type="telf" class="form-control" name="telefono" placeholder="telefono" aria-label="telefono" aria-describedby="basic-addon1"/>
                    <label>Telefono</label>
                 </div>
                 <!--begin::Input group-->
                 <div class="form-floating mb-5">
                     <input required type="text" class="form-control" name="direccion" placeholder="direccion" aria-label="direccion" aria-describedby="basic-addon1"/>
                    <label>Dirección</label>
                 </div>
                 <!--begin::Input group-->
                 <div class="form-floating mb-5">
                     <input required type="text" class="form-control" name="lugar_trabajo" placeholder="lugar_trabajo" aria-label="lugar_trabajo" aria-describedby="basic-addon1"/>
                    <label>Lugar de Trabajo</label>
                 </div>
                 <!--begin::Input group-->
                 <div class="form-floating mb-5">
                     <input required type="text" class="form-control" name="observaciones" placeholder="observaciones" aria-label="observaciones" aria-describedby="basic-addon1"/>
                    <label>Observaciones</label>
                 </div>



                 <div class="card-footer d-flex justify-content-end py-6">
                     <button type="submit" class="w-100 btn btn-bg-primary btn-text-white">Agregar</button>
                 </div>
             </form>
         </div>
   </div>
@endsection