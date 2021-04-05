@extends('layouts.main')
@section('title', 'Thành công!')
@section('body')
    @if(session('status') == 200)
    <div id="main">
        @include('layouts.core.navbar')
        <div id="content">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col col-lg-8">
                        <div class="error-template text-center"> <i class="fa fa-check fa-5x text-success mb50 animated zoomIn"></i>
                            <h3 class="main-title centered"><span>{{ session('title') }}</span></h3>
                            <div class="main-title-description"> {{ session('content') }} </div>
                            <div class="error-actions"><a href="{{ session('href') }}" class="btn btn-primary btn-lg">{{ session('button') }}</a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-circle" id="to-top"><i class="fa fa-angle-up"></i></button>
        @include('layouts.core.footer')
    </div>
    <script>
        setTimeout(function () {
            window.location = "{{ session('href') }}";
        }, 5000)
    </script>
    @else
        <script>
            window.location = "{{ (url()->previous() != "http://localhost:8000/success") ? url()->previous() : request()->root() }}";
        </script>
    @endif
@endsection
