@extends('layouts.main')
@section('title', 'Đăng nhập')
@section('body')
    <div id="main">
        @include('layouts.core.navbar')
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-md-12 col-lg-10 col-xl-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
                        </ol>
                    </nav>
                    <div class="page-header">
                        <h1>Vui lòng đăng nhập hoặc đăng ký</h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="content">
            <div class="container">
                <div class="row justify-content-md-center align-items-center">
                    <div class="col col-md-6 col-lg-5 col-xl-4">
                        <ul class="nav nav-tabs tab-lg justify-content-center" role="tablist">
                            <li role="presentation" class="nav-item w-50">
                                <a class="nav-link text-center active">Đăng nhập</a>
                            </li>
                            <li role="presentation" class="nav-item w-50">
                                <a class="nav-link text-center" href="#">Đăng ký</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="login">
                                <form action="{{ route('login') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Địa chỉ Email</label>
                                        <input type="email" name="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                        <div class="invalid-feedback">
                                            @error('email')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mật khẩu</label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror">
                                            <div class="input-group-append">
                                                <button class="btn btn-light border ml-1" type="button" id="toggleShowPassword"><i class="fa fa-eye"></i></button>
                                            </div>
                                            <div class="invalid-feedback">
                                                {{ \Illuminate\Support\Facades\Session::get('password') }}
                                                @error('password')
                                                {{ $message }}
                                                @enderror
                                                @error('forgotPassword')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <p class="text-lg-right">
                                        <a href="#">Quên mật khẩu</a>
                                    </p>
                                    <div class="checkbox">
                                        <input type="checkbox" name="remember_me" id="remember_me">
                                        <label for="remember_me">Ghi nhớ đăng nhập</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg">Đăng nhập</button>
                                </form>
                            </div>
                        </div>
                        <div class="socal-login-buttons">
                            <a href="#" class="btn btn-social btn-block btn-google">
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

        $(email, password).on("change", function () {
            $(this).removeClass( 'is-invalid' );
        });

        $("#toggleShowPassword").on('click', function () {
            if ($(this).find("i").hasClass('fa-eye')) {
                $(this).find("i").removeClass('fa-eye').addClass('fa-eye-slash');
                password.attr("type", "text");
            } else {
                $(this).find("i").removeClass('fa-eye-slash').addClass('fa-eye');
                password.attr("type", "password");
            }
        })

    </script>
@endsection
