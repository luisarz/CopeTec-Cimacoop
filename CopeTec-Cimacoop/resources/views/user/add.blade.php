@extends('base.base')
@section("title")
Agregar Usuario
@endsection
@section('content')
    <form action="/user/add" method="post" autocomplete="nope">
        {!! csrf_field() !!}
        <div class="input-group mb-5"></div>
        <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required type="text" class="form-control" name="name" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
        <!--end::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-sms fs-1"><i class="path1"></i><i class="path2"></i></i>
            </span>
            <input required name="email" autocomplete="nope" type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon2"/>
        </div>
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-password-check fs-1"><i class="path1"></i><i class="path2"></i><i class="path3"></i><i class="path4"></i><i class="path5"></i></i>
            </span>
            <input required name="password" autocomplete="new-password" type="password" class="form-control" placeholder="password" aria-label="password" aria-describedby="basic-addon2"/>
        </div>
        <div class="card-footer d-flex justify-content-end py-6">
            <button type="submit" class="btn btn-bg-primary btn-text-white">Agregar</button>
        </div>
    </form>
@endsection