@extends('base.base')
@section('content')
<div class="card shadow-sm">
    <div class="card-header ribbon ribbon-end ribbon-clip">
        <div class="ribbon-label fs-3">
            <i class="ki-duotone ki-shield-tick text-white fs-2x">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            Modificar de Modulo
            <span class="ribbon-inner bg-info"></span>
        </div>
    </div>
    <div class="card-body">
        <form action="/modulo/put" method="post" id="kt_new_modulo_form">
            {!! csrf_field() !!}
            {{ method_field('PUT') }}
            <input type="hidden" name="id_modulo" value="{{$modulo->id_modulo}}">
            <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                <div class="col">
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span>Nombre Modulo</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" placeholder="Nombre modulo" class="form-control form-control-solid" name="modulo" value="{{$modulo->nombre}}">
                        <!--end::Input-->
                    </div>
                </div>
                <div class="col">
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span>Ruta Modulo</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" placeholder="Ruta Modulo" class="form-control form-control-solid" name="ruta" value="{{$modulo->ruta}}">
                        <!--end::Input-->
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                <div class="col">
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span>Es Menu Principal</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select id="isprincipal" class="form-control form-control-solid" name="is_padre" >
                            <option value="1" {{$modulo->is_padre==true?"selected":""}}>Si</option>
                            <option value="0" {{$modulo->is_padre==false?"selected":""}}>No</option>
                        </select>
                        <!--end::Input-->
                    </div>
                </div>
                <div class="col" >
                    <div class="fv-row mb-7" id="principalMenu" {{$modulo->is_padre==false?'style="display:none"':''}} >
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span>Menu Principal</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select class="form-control form-control-solid" name="id_padre" >
                            @foreach($modulos as $modulo_padre)
                                <option value="{{$modulo_padre->id_modulo}}" {{$modulo->id_padre==$modulo_padre->id_modulo?"selected":""}}>{{$modulo_padre->nombre}}</option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <!--begin::Action-->
        <div class="d-grid mb-10">
            <button type="submit" id="kt_new_modulo_submit" class="btn btn-primary">
                <!--begin::Indicator label-->
                <span class="indicator-label">Guardar</span>
                <!--end::Indicator label-->
                <!--begin::Indicator progress-->
                <span class="indicator-progress">Procesando ...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                <!--end::Indicator progress-->
            </button>
        </div>
        <!--end::Action-->
    </div>
</div>
@endsection
@section("scripts")
<script src="assets/js/custom/modulo/add.js"></script>
<script>
    $(document).ready(function(){
        $("#isprincipal").change(function(){
            if($(this).val()==1){
                $("#principalMenu").hide()
            } else{
                $("#principalMenu").show()
            }
        })
    })
</script>
@endsection