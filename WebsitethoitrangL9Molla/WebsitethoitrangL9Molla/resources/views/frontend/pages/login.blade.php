@extends('frontend.layouts.master')
@section('main-content')
@section('title','Đăng nhập')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('login.form')}}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('{{asset('frontend/assets/images/backgrounds/login-bg.jpg')}}')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="true">Đăng  ký</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                            <form action="{{route('login.submit')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="singin-email-2">Email *</label>
                                    <input type="text" class="form-control" id="singin-email-2" name="email" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="singin-password-2">Mật khẩu *</label>
                                    <input type="password" class="form-control" id="singin-password-2" name="password" required>
                                </div><!-- End .form-group -->

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>Đăng Nhập</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="signin-remember-2">
                                        <label class="custom-control-label" for="signin-remember-2">Nhớ đăng nhập</label>
                                    </div><!-- End .custom-checkbox -->

                                    <a href="#" class="forgot-link">Quên mật khẩu?</a>
                                </div><!-- End .form-footer -->
                            </form>
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade show active" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                            <form action="{{route('register.submit')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="register-email-2">Họ Tên *</label>
                                    <input type="text" class="form-control" id="register-email-2" name="name" required>
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <label for="register-email-2">Email *</label>
                                    <input type="email" class="form-control" id="register-email-2" name="email" required>
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <label for="register-password-2">Mật Khẩu *</label>
                                    <input type="password" class="form-control" id="register-password-2" name="register-password" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="register-password-2">Xác Nhận Mật Khẩu *</label>
                                    <input type="password" class="form-control" id="register-password-2" name="confirm-password" required>
                                </div><!-- End .form-group -->

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>Đăng Ký</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                        <label class="custom-control-label" for="register-policy-2">Đồng Ý Với Các Điều Khoản<a href="#"></a> *</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .form-footer -->
                            </form>
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</main><!-- End .main -->
@endsection
