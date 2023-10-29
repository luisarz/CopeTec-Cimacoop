@extends('base.base')
@section('content')
    <div class="card shadow-sm">
        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="ribbon-label fs-3">
                <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;
                Administración | {{ Session::get('name_module') }}
                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>
        <div class="card-body">
            {!! csrf_field() !!}

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="form-label">Roles</label>
                <select class="form-select" id="id_rol" aria-label="Select example">
                    @foreach ($roles as $rol)
                        <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                    @endforeach
                </select>
            </div>

            @foreach ($modulos as $modulo)
                @if ($modulo->is_padre == 1)
                    <div class="row">
                        <h3>Modulos</h3>
                        <div class="col-4">
                            <div class="form-check form-switch form-check-custom form-check-solid me-10" style="margin:4px">
                                <input class="check-permiso form-check-input h-40px w-60px" type="checkbox"
                                    value="{{ $modulo->id_modulo }}" id="modulo{{ $modulo->id_modulo }}" />
                                <label class="form-check-label" for="modulo{{ $modulo->id_modulo }}">
                                    {{ $modulo->nombre }}
                                </label>
                            </div>
                        </div>
                        <div class="row" style="margin-top:30px">
                            <h3>Sub Modulos</h3>
                            @foreach ($modulos as $sub_modulo)
                                @if ($modulo->id_modulo == $sub_modulo->id_padre)
                                    <div class="col-4">
                                        <div class="form-check form-switch form-check-custom form-check-solid me-10"
                                            style="margin:4px">
                                            <input class="check-permiso form-check-input h-30px w-50px" type="checkbox"
                                                value="{{ $sub_modulo->id_modulo }}"
                                                id="modulo{{ $sub_modulo->id_modulo }}" />
                                            <label class="form-check-label" for="modulo{{ $sub_modulo->id_modulo }}">
                                                {{ $sub_modulo->nombre }}
                                            </label>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <hr>
                @endif
            @endforeach

        </div>
    </div>
@endsection
@section('scripts')
    <script>
        const loadingEl = document.createElement("div");
        $(document).ready(function() {
            $(".check-permiso").change(function() {
                showLoading()
                if ($(this).is(":checked")) {
                    $.post("/allowAccess", {
                        id_modulo: $(this).val(),
                        id_rol: $("#id_rol").val(),
                        isActive: true
                    }, function() {
                        hidenLoading();
                    })
                } else {
                    $.post("/allowAccess", {
                        id_modulo: $(this).val(),
                        id_rol: $("#id_rol").val(),
                        isActive: false
                    }, function() {
                        hidenLoading();
                    })
                }
            })
            setAccess($("#id_rol").val());
            $("#id_rol").change(function() {
                setAccess($("#id_rol").val());
            })
        })

        function setAccess(id_rol) {
            showLoading()
            $.post("/getAllowAccess", {
                id_rol: id_rol
            }, function(data) {
                $(".check-permiso").prop('checked', false);
                data.forEach(function access(element) {
                    $("#modulo" + element.id_modulo).prop('checked', true);
                })
                hidenLoading();
            })
        }
    </script>
@endsection
