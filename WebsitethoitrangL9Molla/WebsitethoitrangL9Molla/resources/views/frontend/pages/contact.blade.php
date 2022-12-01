@extends('frontend.layouts.master')
@section('main-content')
@section('title','Liên hệ')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <div class="container">
        <div class="page-header page-header-big text-center" style="background-image: url('{{asset('frontend/assets/images/contact-header-bg.jpg')}}')">
            <h1 class="page-title text-white">Liên hệ<span class="text-white">keep in touch with us</span></h1>
        </div><!-- End .page-header -->
    </div><!-- End .container -->

    <div class="page-content pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-2 mb-lg-0">
                    <h2 class="title mb-1">Thông tin liên hệ</h2><!-- End .title mb-2 -->
                    @foreach($setting as $settings)
                    <p class="mb-3">{!!$settings->description!!}</p>
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="contact-info">
                                <h3>Địa chỉ</h3>

                                <ul class="contact-list">
                                    <li>
                                        <i class="icon-map-marker"></i>
                                       {{$settings->address}}
                                    </li>
                                    <li>
                                        <i class="icon-phone"></i>
                                        <a href="tel:#">+84 {{$settings->phone}}</a>
                                    </li>
                                    <li>
                                        <i class="icon-envelope"></i>
                                        <a href="mailto:#">{{$settings->email}}</a>
                                    </li>
                                </ul><!-- End .contact-list -->
                            </div><!-- End .contact-info -->
                        </div><!-- End .col-sm-7 -->

                        @endforeach

                        <div class="col-sm-5">
                            <div class="contact-info">
                                <h3>Thời gian mở cửa</h3>

                                <ul class="contact-list">
                                    <li>
                                        <i class="icon-clock-o"></i>
                                        <span class="text-dark">Thứ 2-Thứ 7</span> <br>8:00-19:00H
                                    </li>
                                    <li>
                                        <i class="icon-calendar"></i>
                                        <span class="text-dark">Chủ nhật</span> <br>8:00-12:00H
                                    </li>
                                </ul><!-- End .contact-list -->
                            </div><!-- End .contact-info -->
                        </div><!-- End .col-sm-5 -->
                    </div><!-- End .row -->
                </div><!-- End .col-lg-6 -->
                <div class="col-lg-6">
                    <h2 class="title mb-1">Liên hệ với XSHOP</h2><!-- End .title mb-2 -->
                    <p class="mb-2"></p>

                    <form action="{{route('contact.submit')}}" method="POST" class="contact-form mb-3">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="cname" class="sr-only">Họ Tên</label>
                                <input type="text" name="name" class="form-control" id="cname" placeholder="Họ tên của bạn *" required>
                            </div><!-- End .col-sm-6 -->

                            <div class="col-sm-6">
                                <label for="cemail" class="sr-only">Email</label>
                                <input type="email" name="email" class="form-control" id="cemail" placeholder="Email *" required>
                            </div><!-- End .col-sm-6 -->
                        </div><!-- End .row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="cphone" class="sr-only">Phone</label>
                                <input type="tel" name="phone" class="form-control" id="cphone" placeholder="Số điện thoại của bạn">
                            </div><!-- End .col-sm-6 -->

                            <div class="col-sm-6">
                                <label for="csubject" class="sr-only">Chủ đề</label>
                                <input type="text" name="subject" class="form-control" id="csubject" placeholder="Chủ đề">
                            </div><!-- End .col-sm-6 -->
                        </div><!-- End .row -->

                        <label for="cmessage" class="sr-only">Nội dung bạn muốn gửi</label>
                        <textarea name="message" class="form-control" cols="30" rows="4" id="cmessage" required placeholder="Nội dung bạn muốn gửi *"></textarea>

                        <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                            <span>Gửi cho XSHOP</span>
                            <i class="icon-long-arrow-right"></i>
                        </button>
                    </form><!-- End .contact-form -->
                </div><!-- End .col-lg-6 -->
            </div><!-- End .row -->

            <hr class="mt-4 mb-5">

            <div class="stores mb-4 mb-lg-5">
                <h2 class="title text-center mb-3">Cửa hàng của chúng tôi</h2><!-- End .title text-center mb-2 -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="store">
                            <div class="row">
                                <div class="col-sm-5 col-xl-6">
                                    <figure class="store-media mb-2 mb-lg-0">
                                        <img src="{{asset('frontend/assets/images/stores/img-1.jpg')}}" alt="image">
                                    </figure><!-- End .store-media -->
                                </div><!-- End .col-xl-6 -->
                                @foreach($setting as $settings)
                                <div class="col-sm-7 col-xl-6">
                                    <div class="store-content">
                                        <h3 class="store-title">Chi nhánh 1</h3><!-- End .store-title -->
                                        <address>{{$settings->address}}</address>
                                        <div><a href="tel:#">+84 {{$settings->phone}}</a></div>

                                        <h4 class="store-subtitle">Thời gian mở cửa:</h4><!-- End .store-subtitle -->
                                        <div>Thứ 2 - Thứ 7 8:00 - 19:00H</div>
                                        <div>Chủ nhật 8:00 - 12H:00</div>

                                        <a href="#" class="btn btn-link" target="_blank"><span>Xem bản đồ</span><i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .store-content -->
                                </div><!-- End .col-xl-6 -->
                                @endforeach
                            </div><!-- End .row -->
                        </div><!-- End .store -->
                    </div><!-- End .col-lg-6 -->

                    <div class="col-lg-6">
                        <div class="store">
                            <div class="row">
                                <div class="col-sm-5 col-xl-6">
                                    <figure class="store-media mb-2 mb-lg-0">
                                        <img src="{{asset('frontend/assets/images/stores/img-2.jpg')}}" alt="image">
                                    </figure><!-- End .store-media -->
                                </div><!-- End .col-xl-6 -->

                                <div class="col-sm-7 col-xl-6">
                                    <div class="store-content">
                                        <h3 class="store-title">Chi nhánh 2</h3><!-- End .store-title -->
                                        <address>47X Đường Điện Biên Phủ,Phường 25,Quận Bình Thạnh,TP Hồ Chí Minh</address>
                                        <div><a href="tel:#">+84 1234567890</a></div>

                                        <h4 class="store-subtitle">Thời gian mở cửa:</h4><!-- End .store-subtitle -->
                                        <div>Thứ 2 - Thứ 7 8:00 - 19:00H</div>
                                        <div>Chủ Nhật -8:00 - 12H:00</div>
                                        <a href="#" class="btn btn-link" target="_blank"><span>Xem bản đồ</span><i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .store-content -->
                                </div><!-- End .col-xl-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .store -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->
            </div><!-- End .stores -->
        </div><!-- End .container -->
        <div id="map"></div><!-- End #map -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection