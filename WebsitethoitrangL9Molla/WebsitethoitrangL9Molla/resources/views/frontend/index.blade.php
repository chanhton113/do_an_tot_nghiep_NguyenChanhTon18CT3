@extends('frontend.layouts.master')
@section('title', 'Trang Chủ')
@section('main-content')
    <main class="main">
        <div class="intro-section bg-lighter pt-5 pb-6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="intro-slider-container slider-container-ratio slider-container-1 mb-2 mb-lg-0">
                            <div class="intro-slider intro-slider-1 owl-carousel owl-simple owl-light owl-nav-inside"
                                data-toggle="owl"
                                data-owl-options='{
                                "nav": false,
                                "responsive": {
                                    "768": {
                                        "nav": true
                                    }
                                }
                            }'>
                                @foreach ($banners as $banner)
                                    <div class="intro-slide">
                                        <figure class="slide-image">
                                            <picture>
                                                <source media="(max-width: 480px)"
                                                    srcset="assets/images/slider/slide-1-480w.jpg">
                                                <img src="{{ $banner->photo }}" alt="Image Desc">
                                            </picture>
                                        </figure><!-- End .slide-image -->

                                        <div class="intro-content">
                                            <!-- End .h3 intro-subtitle -->
                                            <h1 class="intro-title">{{$banner->title}}<br></h1><!-- End .intro-title -->

                                            <a href="http://127.0.0.1:8000" class="btn btn-outline-white">
                                                <span>SHOP NOW</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </a>
                                        </div><!-- End .intro-content -->
                                    </div><!-- End .intro-slide -->
                                @endforeach

                            </div><!-- End .intro-slider owl-carousel owl-simple -->

                            <span class="slider-loader"></span><!-- End .slider-loader -->
                        </div><!-- End .intro-slider-container -->
                    </div><!-- End .col-lg-8 -->
                    <div class="col-lg-4">
                        <div class="intro-banners">
                            <div class="row row-sm">
                                @foreach ($sliders as $data)
                                    <div class="col-md-6 col-lg-12">
                                        <div class="banner banner-display">
                                            <a href="#">
                                                <img src="{{ $data->photo }}" alt="Banner">
                                            </a>

                                        </div><!-- End .banner -->
                                    </div><!-- End .col-md-6 col-lg-12 -->
                                @endforeach

                            </div><!-- End .row row-sm -->
                        </div><!-- End .intro-banners -->
                    </div><!-- End .col-lg-4 -->
                </div><!-- End .row -->

                <div class="mb-6"></div><!-- End .mb-6 -->

                <div class="owl-carousel owl-simple" data-toggle="owl"
                    data-owl-options='{
                    "nav": false,
                    "dots": false,
                    "margin": 30,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "420": {
                            "items":3
                        },
                        "600": {
                            "items":4
                        },
                        "900": {
                            "items":5
                        },
                        "1024": {
                            "items":6
                        }
                    }
                }'>
                    @foreach ($brands as $brand)
                        <a href="{{ route('product-brand', $brand->slug) }}" class="brand">
                            <img src="{{ $brand->photo }}" alt="{{ $brand->photo }}">
                        </a>
                    @endforeach
                </div><!-- End .owl-carousel -->
            </div><!-- End .container -->
        </div><!-- End .bg-lighter -->

        <div class="mb-6"></div><!-- End .mb-6 -->

        <div class="container">
            <div class="heading heading-center mb-3">
                <h2 class="title-lg">Danh Mục</h2><!-- End .title -->

                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="trendy-all-link" data-toggle="tab" href="#trendy-all-tab"
                            role="tab" aria-controls="trendy-all-tab" aria-selected="true">Tất cả</a>
                    </li>
                    @php
                        $categories = DB::table('categories')
                            ->where('is_parent', 1)
                            ->get();
                    @endphp
                    @foreach ($categories as $cate)
                        <li class="nav-item">
                            <a class="nav-link" id="trendy-fur-link" data-toggle="tab"
                                href="#trendy-fur-{{ $cate->id }}" role="tab" aria-controls="trendy-fur-tab"
                                aria-selected="false">{{ $cate->title }}</a>
                        </li>
                    @endforeach
                    {{-- <li class="nav-item">
                    <a class="nav-link" id="trendy-decor-link" data-toggle="tab" href="#trendy-decor-tab" role="tab" aria-controls="trendy-decor-tab" aria-selected="false">Decor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="trendy-light-link" data-toggle="tab" href="#trendy-light-tab" role="tab" aria-controls="trendy-light-tab" aria-selected="false">Lighting</a>
                </li> --}}
                </ul>
            </div><!-- End .heading -->

            <div class="tab-content tab-content-carousel">
                <div class="tab-pane p-0 fade show active" id="trendy-all-tab" role="tabpanel"
                    aria-labelledby="trendy-all-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1200": {
                                "items":4,
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>

                        @foreach ($product_lists as $key => $product)
                            <div class="product product-11 text-center">
                                <figure class="product-media">
                                    @php
                                        $photo = explode(',', $product->photo);
                                    @endphp
                                    <a href="{{ route('product-detail', $product->slug) }}">
                                        <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}" class="product-image">
                                        <img src="{{ $photo[1] }}" alt="{{ $photo[1] }}"
                                            class="product-image-hover">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="{{ route('add-to-wishlist', $product->slug) }}"
                                            class="btn-product-icon btn-wishlist"><span>{{ _('Yêu Thích') }}</span></a>
                                    </div><!-- End .product-action-vertical -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <h3 class="product-title"><a
                                            href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a>
                                    </h3><!-- End .product-title -->
                                    <div class="product-price">
                                        {{ number_format($product->price), 2 }} VNĐ
                                    </div><!-- End .product-price -->
                                </div><!-- End .product-body -->
                                <div class="product-action">
                                    <a href="{{ route('add-to-cart', $product->slug) }}"
                                        class="btn-product btn-cart"><span>{{ _('Thêm vào giỏ hàng') }}</span></a>
                                </div><!-- End .product-action -->
                            </div><!-- End .product -->
                        @endforeach
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->

                @foreach ($categories as $data)
                    <div class="tab-pane p-0 fade" id="trendy-fur-{{ $data->id }}" role="tabpanel"
                        aria-labelledby="trendy-fur-{{ $data->id }}">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                            data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1200": {
                                "items":4,
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
                            @foreach ($product_lists as $product)
                                @if ($data->id == $product->cat_id)
                                    @php
                                        $photo = explode(',', $product->photo);
                                    @endphp
                                    <div class="product product-11 text-center">
                                        <figure class="product-media">
                                            <span class="product-label label-new">{{ $product->condition }}</span>
                                            <a href="{{ route('product-detail', $product->slug) }}">
                                                <img src="{{ $photo[0] }}" alt="Product image" class="product-image">
                                                <img src="{{ $photo[1] }}" alt="Product image"
                                                    class="product-image-hover">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="{{ route('add-to-wishlist', $product->slug) }}"
                                                    class="btn-product-icon btn-wishlist"><span>Yêu Thích</span></a>
                                            </div><!-- End .product-action-vertical -->

                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <h3 class="product-title"><a
                                                    href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a>
                                            </h3><!-- End .product-title -->
                                            <div class="product-price">
                                                {{ number_format($product->price), 2 }}VNĐ
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                        <div class="product-action">
                                            <a href="{{ route('add-to-cart', $product->slug) }}"
                                                class="btn-product btn-cart"><span>Thêm Vào Giỏ Hàng</span></a>
                                        </div><!-- End .product-action -->
                                    </div><!-- End .product -->
                                @endif
                            @endforeach

                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                @endforeach
            </div><!-- End .tab-content -->
        </div><!-- End .container -->


        <div class="mb-5"></div><!-- End .mb-6 -->


        <div class="container">
            <div class="heading heading-center mb-6">
                <h2 class="title">Thương Hiệu</h2><!-- End .title -->

                <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="top-all-link" data-toggle="tab" href="#top-all-tab"
                            role="tab" aria-controls="top-all-tab" aria-selected="true">Tất cả</a>
                    </li>
                    @php
                        $brands = DB::table('brand')
                            ->where('status', 'active')
                            ->get();
                    @endphp
                    @foreach ($brands as $data)
                        <li class="nav-item">
                            <a class="nav-link" id="top-fur-link" data-toggle="tab" href="#top-fur-{{ $data->id }}"
                                role="tab" aria-controls="top-fur-{{ $data->id }}"
                                aria-selected="false">{{ $data->title }}</a>
                        </li>
                    @endforeach

                </ul>
            </div><!-- End .heading -->

            <div class="tab-content">
                <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel"
                    aria-labelledby="top-all-link">
                    <div class="products">
                        <div class="row justify-content-center">
                            @foreach ($product_sales as $product)
                                @php
                                    $photo = explode(',', $product->photo);
                                @endphp
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="product product-11 mt-v3 text-center">
                                        <figure class="product-media">
                                            <a href="{{ route('product-detail', $product->slug) }}">
                                                <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}"
                                                    class="product-image">
                                                <img src="{{ $photo[1] }}" alt="{{ $photo[1] }}"
                                                    class="product-image-hover">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist "><span>Yêu
                                                        thích</span></a>
                                            </div><!-- End .product-action-vertical -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <h3 class="product-title"><a
                                                    href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a>
                                            </h3><!-- End .product-title -->
                                            @php
                                                $discount = $product->price - ($product->price * $product->discount) / 100;
                                            @endphp
                                            <div class="product-price">
                                                <p style="text-decoration: line-through">
                                                    {{ number_format($product->price), 2 }}VNĐ</p> &emsp14;<p>
                                                    {{ number_format($discount) }}VNĐ</p>
                                            </div><!-- End .product-price -->

                                            <div class="product-nav product-nav-dots">
                                                <a href="#" class="active" style="background: #333333;"><span
                                                        class="sr-only">Color name</span></a>
                                                <a href="#" style="background: #e8e8e8;"><span
                                                        class="sr-only">Color name</span></a>
                                            </div><!-- End .product-nav -->
                                        </div><!-- End .product-body -->
                                        <div class="product-action">
                                            <a href="{{ route('add-to-cart', $product->slug) }}"
                                                class="btn-product btn-cart"><span>Thêm vào giỏ hàng</span></a>
                                        </div><!-- End .product-action -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            @endforeach
                        </div><!-- End .row -->
                    </div><!-- End .products -->
                </div><!-- .End .tab-pane -->

                @foreach ($brands as $data)
                    <div class="tab-pane p-0 fade" id="top-fur-{{ $data->id }}" role="tabpanel"
                        aria-labelledby="top-fur-{{ $data->id }}">
                        <div class="products">
                            <div class="row justify-content-center">

                                @foreach ($product_sales as $product)
                                    @php
                                        $photo = explode(',', $product->photo);
                                    @endphp
                                    @if ($data->id == $product->cat_id)
                                        <div class="col-6 col-md-4 col-lg-3">
                                            <div class="product product-11 mt-v3 text-center">
                                                <figure class="product-media">
                                                    <a href="product.html">
                                                        <img src="{{ $photo[0] }}" alt="Product image"
                                                            class="product-image">
                                                        <img src="{{ $photo[1] }}" alt="Product image"
                                                            class="product-image-hover">
                                                    </a>

                                                    <div class="product-action-vertical">
                                                        <a href="{{ route('add-to-wishlist', $product->slug) }}"
                                                            class="btn-product-icon btn-wishlist "><span>Yêu
                                                                Thích</span></a>
                                                    </div><!-- End .product-action-vertical -->
                                                </figure><!-- End .product-media -->

                                                <div class="product-body">
                                                    <h3 class="product-title"><a
                                                            href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a>
                                                    </h3><!-- End .product-title -->
                                                    <div class="product-price">
                                                        {{ number_format($product->price), 2 }}VNĐ
                                                    </div><!-- End .product-price -->

                                                    <div class="product-nav product-nav-dots">
                                                        <a href="#" class="active"
                                                            style="background: #333333;"><span class="sr-only">Color
                                                                name</span></a>
                                                        <a href="#" style="background: #e8e8e8;"><span
                                                                class="sr-only">Color name</span></a>
                                                    </div><!-- End .product-nav -->
                                                </div><!-- End .product-body -->
                                                <div class="product-action">
                                                    <a href="{{ route('add-to-cart', $product->slug) }}"
                                                        class="btn-product btn-cart"><span>Thêm Vào Giỏ Hàng</span></a>
                                                </div><!-- End .product-action -->
                                            </div><!-- End .product -->
                                        </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                                    @endif
                                @endforeach

                            </div><!-- End .row -->
                        </div><!-- End .products -->
                    </div><!-- .End .tab-pane -->
                @endforeach
            </div><!-- End .tab-content -->
            <div class="more-container text-center">
                <a href="#" class="btn btn-outline-darker btn-more"><span>Xem Thêm Sản Phẩm</span><i
                        class="icon-long-arrow-down"></i></a>
            </div><!-- End .more-container -->
        </div><!-- End .container -->

        <div class="container">
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-card text-center">
                        <span class="icon-box-icon">
                            <i class="icon-rocket"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Thanh toán & Nhận hàng</h3><!-- End .icon-box-title -->
                            <p>Miễn phí vận chuyển với đơn hàng tối thiểu 50K</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->

                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-card text-center">
                        <span class="icon-box-icon">
                            <i class="icon-rotate-left"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Hoàn lại tiền</h3><!-- End .icon-box-title -->
                            <p>Đảm bảo hoàn lại tiền 100%</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->

                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-card text-center">
                        <span class="icon-box-icon">
                            <i class="icon-life-ring"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Chất lượng phục vụ</h3><!-- End .icon-box-title -->
                            <p>Hỗ trợ trực tuyến 24/7</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->
            </div><!-- End .row -->

            <div class="mb-2"></div><!-- End .mb-2 -->
        </div><!-- End .container -->
        <div class="blog-posts pt-7 pb-7" style="background-color: #fafafa;">
            <div class="container">
                <h2 class="title-lg text-center mb-3 mb-md-4">Bài viết</h2><!-- End .title-lg text-center -->

                <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                    "nav": false,
                    "dots": true,
                    "items": 3,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "600": {
                            "items":2
                        },
                        "992": {
                            "items":3
                        }
                    }
                }'>
                    @foreach ($posts as $post)
                        <article class="entry entry-display">
                            <figure class="entry-media">
                                <a href="{{ route('blog.detail', $post->slug) }}">
                                    <img src="{{ $post->photo }}" alt="{{ $post->photo }}">
                                </a>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body pb-4 text-center">
                                <div class="entry-meta">
                                    <a href="#">{{ $post->created_at->format('d,M,Y') }}</a>, 0 Comments
                                </div><!-- End .entry-meta -->

                                <h3 class="entry-title">
                                    <a href="{{ route('blog.detail', $post->slug) }}">{{ $post->title }}</a>
                                </h3><!-- End .entry-title -->

                                <div class="entry-content">
                                    <p>{{ $post->title }}</p>
                                    <a href="{{ route('blog.detail', $post->slug) }}" class="read-more">Đọc thêm</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                    @endforeach
                </div><!-- End .owl-carousel -->
            </div><!-- container -->

        </div>
        <div class="cta cta-display bg-image pt-4 pb-4"
            style="background-image: url({{ asset('frontend/assets/images/backgrounds/cta/bg-6.jpg') }});">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-9 col-xl-8">
                        <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                            <div class="col">
                                <h3 class="cta-title text-white">Sign Up & Get 10% Off</h3><!-- End .cta-title -->
                                <p class="cta-desc text-white">Molla presents the best in interior design</p>
                                <!-- End .cta-desc -->
                            </div><!-- End .col -->

                            <div class="col-auto">
                                <a href="login.html" class="btn btn-outline-white"><span>SIGN UP</span><i
                                        class="icon-long-arrow-right"></i></a>
                            </div><!-- End .col-auto -->
                        </div><!-- End .row no-gutters -->
                    </div><!-- End .col-md-10 col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cta -->
    </main><!-- End .main -->
@endsection
