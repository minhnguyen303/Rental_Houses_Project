@extends('layouts.main')
@section('title', 'Trang không tồn tại!')
@section('body')
    <div id="main">
        @include('layouts.core.navbar')
        <div id="content">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col col-lg-8">
                        <div class="error-template text-center"> <i class="fa fa-exclamation-triangle fa-5x text-danger animated zoomIn mb50"></i>
                            <h3 class="main-title"><span>Lỗi 404, không tìm thấy trang</span></h3>
                            <div class="main-title-description"> Trang này không tồn tại! </div>
                            <div class="error-actions">
                                <a href="{{ route('home') }}" class="btn btn-primary btn-lg ml-2 mr-2 mb-3">Về trang chủ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-circle" id="to-top"><i class="fa fa-angle-up"></i></button>
        @include('layouts.core.footer')
    </div>
@endsection
