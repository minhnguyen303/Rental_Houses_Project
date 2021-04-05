@extends('layouts.main')
@section('title', 'Đăng ký')
@section('body')
    <div id="main">
        @include('layouts.core.navbar')
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-md-12 col-lg-10 col-xl-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Đăng ký</li>
                        </ol>
                    </nav>
                    {{--<div class="page-header">
                        <h1>Please sign in or register</h1>
                    </div>--}}
                </div>
            </div>
        </div>
        <div id="content">
            <div class="container">
                <div class="row justify-content-md-center align-items-center">
                    <div class="col col-md-6  col-lg-5 col-xl-4">
                        <ul class="nav nav-tabs tab-lg" role="tablist">
                            <li role="presentation" class="nav-item w-50">
                                <a class="nav-link text-center" href="{{ route('auth.login') }}">Đăng nhập</a>
                            </li>
                            <li role="presentation" class="nav-item w-50">
                                <a class="nav-link text-center active">Đăng ký</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="login">
                                <form action="{{ route('register') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="username">Tên người dùng</label>
                                        <input type="text" name="username" id="username" class="form-control form-control-lg @error('username') is-invalid @enderror" value="{{ old('username') }}" required>
                                        <div class="invalid-feedback">
                                            @error('username')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Địa chỉ Email</label>
                                        <input type="email" name="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                        <div class="invalid-feedback">
                                            @error('email')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="tel" name="phone" id="phone" class="form-control form-control-lg @error('phone') is-invalid @enderror" value="{{ old('phone') }}" pattern="[0-9]{10}" required>
                                        <div class="invalid-feedback">
                                            @error('phone')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mật khẩu</label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" value="{{ old('password') }}" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-light border ml-1 toggleShowPassword" type="button"><i class="fa fa-eye"></i></button>
                                            </div>
                                            <div class="invalid-feedback">
                                                {{ \Illuminate\Support\Facades\Session::get('password') }}
                                                @error('password')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Xác nhận mật khẩu</label>
                                        <div class="input-group">
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-light border ml-1 toggleShowPassword" type="button"><i class="fa fa-eye"></i></button>
                                            </div>
                                            <div class="invalid-feedback">
                                                {{ \Illuminate\Support\Facades\Session::get('password_confirmation') }}
                                                @error('password_confirmation')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <input type="checkbox" id="terms" name="terms" class="form-check-input @error('terms') is-invalid @enderror" required>
                                            <label class="form-check-label" for="terms">Tôi đồng ý với Điều khoản Sử dụng và Quyền riêng tư</label>
                                            <div class="invalid-feedback">
                                                {{ \Illuminate\Support\Facades\Session::get('terms') }}
                                                @error('terms')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg d-block ml-auto">Đăng ký</button>
                                </form>
                            </div>
                        </div>
                        <div class="socal-login-buttons">
                            <a href="{{ route('page.success') }}" class="btn btn-social btn-block btn-google">
                                <i class="icon fa fa-google"></i>
                                Đăng nhập bằng Google
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-circle" id="to-top"><i class="fa fa-angle-up"></i></button>
        @include('layouts.core.footer')
    </div>
    <script>

        const email = $("#email");
        const password = $("#password");
        const password_confirmation = $("#password_confirmation");

        $(email, password).on("change", function () {
            $(this).removeClass( 'is-invalid' );
        });

        $(".toggleShowPassword").on('click', function () {
            if ($(document).find("i").hasClass('fa-eye')) {
                $(document).find("i").removeClass('fa-eye').addClass('fa-eye-slash');
                password.attr("type", "text");
                password_confirmation.attr("type", "text");
            } else {
                $(document).find("i").removeClass('fa-eye-slash').addClass('fa-eye');
                password.attr("type", "password");
                password_confirmation.attr("type", "password");
            }
        })

        $("#terms").on('click', function () {
            if ($(this).checked){
                $(this).attr("checked", false)
            } else {
                $(this).attr("checked", true)
            }
        })

    </script>
@endsection
