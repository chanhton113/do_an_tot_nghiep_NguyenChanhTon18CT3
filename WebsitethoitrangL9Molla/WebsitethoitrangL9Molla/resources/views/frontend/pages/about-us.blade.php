@extends('frontend.layouts.master')
@section('title','Về chúng tôi')
@section('main-content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Về chúng tôi</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <div class="container">
        <div class="page-header page-header-big text-center" style="background-image: url('{{asset('frontend/assets/images/about-header-bg.jpg')}}')">
            <h1 class="page-title text-white">Về chúng tôi<span class="text-white">Who we are</span></h1>
        </div><!-- End .page-header -->
    </div><!-- End .container -->

    <div class="page-content pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-3 mb-lg-0">
                    <h2 class="title">Tầm nhìn của chúng ta</h2><!-- End .title -->
                    <p>Trở thành tập đoàn với chuỗi cửa hàng và các công ty con, phát triển bền vững lâu dài duy trì và phát triển thương hiệu giá trị thương hiệu trở nên uy tín, có sức cạnh tranh trong nước và quốc tế.</p>
                </div><!-- Kết thúc .col-lg-6 -->

                <div class="col-lg-6">
                    <h2 class="title">Sứ mệnh của chúng tôi</h2><!-- End .title -->
                    <p> Phát triển, giữ vững vị thế luôn là thương hiệu tiên phong, dẫn đầu của Việt Nam.
                        - Cung cấp các sản phẩm chất lượng cao, luôn thoả mãn, đáp ứng nhu cầu, mong muốn, thị hiếu đa dạng của khách hàng trong và ngoài nước.
                        - Không ngừng sáng tạo, đột phá, thực hành tốt, tạo giá trị, xứng tầm là thương hiệu lớn.</p>
                </div><!-- Kết thúc .col-lg-6 -->
            </div><!-- Kết thúc .row -->

            <div class="mb-5"></div><!-- End .mb-4 -->
        </div><!-- End .container -->

        <div class="bg-light-2 pt-6 pb-5 mb-6 mb-lg-8">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 mb-3 mb-lg-0">
                        <h2 class="title">Chúng tôi là ai</h2><!-- End .title -->
                        <p class="mb-2">Với tinh thần phát triển của doanh nghiệp, cửa hàng, đồng hành với phát triển xã hội, chúng tôi luôn đóng góp tích cực vào các hoạt động hướng về cộng đồng, thể hiện tinh thần trách nhiệm đối với đất nước và coi đó là truyền thống văn hóa tốt đẹp nhất.</p>

                        <a href="blog.html" class="btn btn-sm btn-minwidth btn-outline-primary-2">
                            <span>XEM TIN TỨC CỦA CHÚNG TÔI</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div><!-- Kết thúc .col-lg-5 -->

                    <div class="col-lg-6 offset-lg-1">
                        <div class="about-images">
                            <img src="{{asset('frontend/assets/images/about/img-1.jpg')}}" alt="" class="about-img-front">
                            <img src="{{asset('frontend/assets/images/about/img-2.jpg')}}" alt="" class="about-img-back">
                        </div><!-- End .about-images -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .bg-light-2 pt-6 pb-6 -->

        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="brands-text">
                        <h2 class="title">Các thương hiệu thiết kế cao cấp của thế giới tại một điểm đến.</h2><!-- End .title -->
                        <p> Cam kết ghi nhận tầm quan trọng của mỗi thành viên, tạo môi trường khuyến khích sự phát triển và thành công của mỗi cá nhân. Đây được coi còn là nơi hội tụ các thành viên xuất sắc với tinh thần đoàn kết cùng nhau phấn đấu vì mục tiêu chung.</p>
                    </div><!-- Kết thúc .brands-text -->
                </div><!-- End .col-lg-5 -->
                <div class="col-lg-7">
                    <div class="brands-display">
                        <div class="row justify-content-center">
                            <div class="col-6 col-sm-4">
                                <a href="#" class="brand">
                                    <img src="{{asset('frontend/assets/images/brands/1.png')}}" alt="Brand Name">
                                </a>
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <a href="#" class="brand">
                                    <img src="{{asset('frontend/assets/images/brands/2.png')}}" alt="Brand Name">
                                </a>
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <a href="#" class="brand">
                                    <img src="{{asset('frontend/assets/images/brands/3.png')}}" alt="Brand Name">
                                </a>
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <a href="#" class="brand">
                                    <img src="{{asset('frontend/assets/images/brands/4.png')}}" alt="Brand Name">
                                </a>
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <a href="#" class="brand">
                                    <img src="{{asset('frontend/assets/images/brands/5.png')}}" alt="Brand Name">
                                </a>
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <a href="#" class="brand">
                                    <img src="{{asset('frontend/assets/images/brands/6.png')}}" alt="Brand Name">
                                </a>
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <a href="#" class="brand">
                                    <img src="{{asset('frontend/assets/images/brands/7.png')}}" alt="Brand Name">
                                </a>
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <a href="#" class="brand">
                                    <img src="{{asset('frontend/assets/images/brands/8.png')}}" alt="Brand Name">
                                </a>
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <a href="#" class="brand">
                                    <img src="{{asset('frontend/assets/images/brands/9.png')}}" alt="Brand Name">
                                </a>
                            </div><!-- End .col-sm-4 -->
                        </div><!-- End .row -->
                    </div><!-- End .brands-display -->
                </div><!-- End .col-lg-7 -->
            </div><!-- End .row -->

            <hr class="mt-4 mb-6">

            <h2 class="title text-center mb-4">Meet Our Team</h2><!-- End .title text-center mb-2 -->

            <div class="row">
                <div class="col-md-4">
                    <div class="member member-anim text-center">
                        <figure class="member-media">
                            <img src="{{asset('frontend/assets/images/team/member-1.jpg')}}" alt="member photo">

                            <figcaption class="member-overlay">
                                <div class="member-overlay-content">
                                    <h3 class="member-title">Samanta Grey<span>Founder & CEO</span></h3><!-- End .member-title -->
                                    <div class="social-icons social-icons-simple">
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    </div><!-- End .soial-icons -->
                                </div><!-- End .member-overlay-content -->
                            </figcaption><!-- End .member-overlay -->
                        </figure><!-- End .member-media -->
                        <div class="member-content">
                            <h3 class="member-title">Samanta Grey<span>Founder & CEO</span></h3><!-- End .member-title -->
                        </div><!-- End .member-content -->
                    </div><!-- End .member -->
                </div><!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="member member-anim text-center">
                        <figure class="member-media">
                            <img src="{{asset('frontend/assets/images/team/member-2.jpg')}}" alt="member photo">

                            <figcaption class="member-overlay">
                                <div class="member-overlay-content">
                                    <h3 class="member-title">Bruce Sutton<span>Sales & Marketing Manager</span></h3><!-- End .member-title -->
                                    <p>Sed pretium, ligula sollicitudin viverra, tortor libero sodales leo, eget blandit nunc.</p>
                                    <div class="social-icons social-icons-simple">
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    </div><!-- End .soial-icons -->
                                </div><!-- End .member-overlay-content -->
                            </figcaption><!-- End .member-overlay -->
                        </figure><!-- End .member-media -->
                        <div class="member-content">
                            <h3 class="member-title">Bruce Sutton<span>Sales & Marketing Manager</span></h3><!-- End .member-title -->
                        </div><!-- End .member-content -->
                    </div><!-- End .member -->
                </div><!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="member member-anim text-center">
                        <figure class="member-media">
                            <img src="{{asset('frontend/assets/images/team/member-3.jpg')}}" alt="member photo">

                            <figcaption class="member-overlay">
                                <div class="member-overlay-content">
                                    <h3 class="member-title">Janet Joy<span>Product Manager</span></h3><!-- End .member-title -->
                                    <p>Sed pretium, ligula sollicitudin viverra, tortor libero sodales leo, eget blandit nunc.</p>
                                    <div class="social-icons social-icons-simple">
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    </div><!-- End .soial-icons -->
                                </div><!-- End .member-overlay-content -->
                            </figcaption><!-- End .member-overlay -->
                        </figure><!-- End .member-media -->
                        <div class="member-content">
                            <h3 class="member-title">Janet Joy<span>Product Manager</span></h3><!-- End .member-title -->
                        </div><!-- End .member-content -->
                    </div><!-- End .member -->
                </div><!-- End .col-md-4 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-2"></div><!-- End .mb-2 -->

        <div class="about-testimonials bg-light-2 pt-6 pb-6">
            <div class="container">
                <h2 class="title text-center mb-3">What Customer Say About Us</h2><!-- End .title text-center -->

                <div class="owl-carousel owl-simple owl-testimonials-photo" data-toggle="owl"
                    data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "1200": {
                                "nav": true
                            }
                        }
                    }'>
                    <blockquote class="testimonial text-center">
                        <img src="{{asset('frontend/assets/images/testimonials/user-1.jpg')}}" alt="user">
                        <p>Luôn lấy sự hài lòng của khách hàng, người tiêu dùng làm trọng tâm cho mọi hoạt động. Hợp tác chặt chẽ với đối tác trên tinh thần tin tưởng, tôn trọng, bình đẳng vì sự thành công, thắng lợi chung của cả hai bên.

                            - Luôn quan tâm đến vấn đề sống còn, sự phát triển doanh nghiệp, thường xuyên vun đắp các giá trị công ty, giá trị thương hiệu, giá trị khách hàng, lợi ích chính đáng của khách hàng; luôn có ý thức bảo vệ môi trường.</p>
                        <cite>
                            Jenson Gregory
                            <span>Customer</span>
                        </cite>
                    </blockquote><!-- End .testimonial -->

                    <blockquote class="testimonial text-center">
                        <img src="{{asset('frontend/assets/images/testimonials/user-2.jpg')}}" alt="user">
                        <p>Luôn lấy sự hài lòng của khách hàng, người tiêu dùng làm trọng tâm cho mọi hoạt động. Hợp tác chặt chẽ với đối tác trên tinh thần tin tưởng, tôn trọng, bình đẳng vì sự thành công, thắng lợi chung của cả hai bên.

                            - Luôn quan tâm đến vấn đề sống còn, sự phát triển doanh nghiệp, thường xuyên vun đắp các giá trị công ty, giá trị thương hiệu, giá trị khách hàng, lợi ích chính đáng của khách hàng; luôn có ý thức bảo vệ môi trường.</p>

                        <cite>
                            Victoria Ventura
                            <span>Customer</span>
                        </cite>
                    </blockquote><!-- End .testimonial -->
                </div><!-- End .testimonials-slider owl-carousel -->
            </div><!-- End .container -->
        </div><!-- End .bg-light-2 pt-5 pb-6 -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
