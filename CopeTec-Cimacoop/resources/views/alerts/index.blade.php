@extends('base.base')

@section('title')
    Lavado de dinero
@endsection

@section('formName')
@endsection
@section('content')
    <div class="card shadow-lg">
        <div class="card-header ribbon ribbon-end ribbon-clip">

            <div class="ribbon-label fs-3">
                <i class="ki-outline  {{ Session::get('icon_menu') }}  text-white fs-2x"></i> &nbsp;
                Alertas | {{ Session::get('name_module') }}
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
                {{$notifications}}

        </div>

    </div>


@endsection

@section('scripts')
    {{-- <link href=" {{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" /> --}}

    {{-- <script src="assets/plugins/global/plugins.bundle.js"></script> --}}
    <script>
        function printDiv() {
            var divContents = document.getElementById("GFG").innerHTML;
            var a = window.open('_blank', '', '');
            a.document.write(divContents);
            a.document.close();
            a.print();
        }
    </script>
@endsection
