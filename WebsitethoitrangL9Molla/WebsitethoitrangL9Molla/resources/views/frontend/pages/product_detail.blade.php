@extends('frontend.layouts.master')
@section('title', 'Chi tiết sản phẩm')
@section('main-content')

    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                </ol>

                <nav class="product-pager ml-auto" aria-label="Product">
                    <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                        <i class="icon-angle-left"></i>
                        <span>Prev</span>
                    </a>

                    <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                        <span>Next</span>
                        <i class="icon-angle-right"></i>
                    </a>
                </nav><!-- End .pager-nav -->
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="product-details-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-gallery product-gallery-vertical">
                                <div class="row">
                                    @php
                                        $photo = explode(',', $product_detail->photo);
                                    @endphp
                                    <figure class="product-main-image">
                                        <img id="product-zoom" src="{{ $photo[0] }}"
                                            data-zoom-image="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                        <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                            <i class="icon-arrows"></i>
                                        </a>
                                    </figure><!-- End .product-main-image -->

                                    <div id="product-zoom-gallery" class="product-image-gallery">
                                        @foreach ($photo as $data)
                                            <a class="product-gallery-item active" href="#"
                                                data-image="{{ $data }}" data-zoom-image="{{ $data }}">
                                                <img src="{{ $data }}" alt="{{ $data }}">
                                            </a>
                                        @endforeach
                                    </div><!-- End .product-image-gallery -->
                                </div><!-- End .row -->
                            </div><!-- End .product-gallery -->
                        </div><!-- End .col-md-6 -->

                        <div class="col-md-6">
                            <div class="product-details">
                                <h1 class="product-title">{{ $product_detail->title }}</h1><!-- End .product-title -->

                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                                </div><!-- End .rating-container -->

                                <div class="product-price">
                                    @php
                                        $after_discount=($product_detail->price-($product_detail->price*$product_detail->discount)/100);
                                    @endphp
                                    @if($product_detail->discount !=0)
                                   <p style="font-size: 1em"> {{ number_format($after_discount), 2 }} VNĐ  </p> &emsp14;<p style="font-size: 1em;text-decoration: line-through">{{ number_format($product_detail->price), 2 }} VNĐ</p>
                                   @else
                                   {{number_format($product_detail->price),2}} VNĐ
                                   @endif
                                </div><!-- End .product-price -->


                                <div class="product-content">
                                    <p>{!! $product_detail->summary !!}</p>
                                </div><!-- End .product-content -->

                                <div class="details-filter-row details-row-size">
                                    <label for="size">Size:</label>
                                    <div class="select-custom">
                                        @php
                                            $sizes = explode(',', $product_detail->size);
                                        @endphp
                                        <select name="size" id="size" class="form-control">
                                            <option value="#" selected="selected">Chọn size</option>
                                            @foreach ($sizes as $size)
                                                <option value="{{ $size }}">{{ $size }}</option>
                                            @endforeach
                                        </select>
                                    </div><!-- End .select-custom -->

                                    <a href="#" class="size-guide"><i class="icon-th-list"></i>size guide</a>
                                </div><!-- End .details-filter-row -->
                                <form action="{{ route('single-add-to-cart') }}" method="POST">
                                    @csrf
                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Số lượng:</label>
                                        <div class="product-details-quantity">
                                            <input type="hidden" name="slug" value="{{ $product_detail->slug }}">
                                            <input type="number" name="quant[1]" id="qty" class="form-control"
                                                value="1"  min="1" max="10" step="1"r
                                                data-decimals="0" required>
                                        </div><!-- End .product-details-quantity -->
                                    </div><!-- End .details-filter-row -->
                                    <div class="product-details-action">
                                        <button class="btn-product btn-cart"><span>Thêm vào giỏ hàng</span></button>
                                        <div class="details-action-wrapper">
                                            <a href="{{ route('add-to-wishlist', $product_detail->slug) }}"
                                                class="btn-product btn-wishlist" title="Wishlist"><span>Yêu thích</span></a>
                                        </div><!-- End .details-action-wrapper -->
                                    </div><!-- End .product-details-action -->
                                </form>

                                <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span>Danh mục:</span>
                                        <a href="#">{{$product_detail->cat_info->title}}</a>
                                    </div><!-- End .product-cat -->
                                </div><!-- End .product-details-footer -->
                            </div><!-- End .product-details -->
                        </div><!-- End .col-md-6 -->
                    </div><!-- End .row -->
                </div><!-- End .product-details-top -->

                <div class="product-details-tab">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                                role="tab" aria-controls="product-desc-tab" aria-selected="true">Mô tả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab"
                                role="tab" aria-controls="product-info-tab" aria-selected="false">Thông tin thêm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-shipping-link" data-toggle="tab"
                                href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab"
                                aria-selected="false">Chính Sách Giao Hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab"
                                role="tab" aria-controls="product-review-tab" aria-selected="false">Đánh Giá</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                            aria-labelledby="product-desc-link">
                            <div class="product-desc-content">
                                <h3>Thông Tin Sản Phẩm</h3>
                                <p>{!! $product_detail->description !!}</p>

                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade" id="product-info-tab" role="tabpanel"
                            aria-labelledby="product-info-link">
                            <div class="product-desc-content">
                                <h3>Thông tin thêm</h3>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat
                                    mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper
                                    suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam
                                    porttitor mauris sit amet orci. </p>

                                <h3>Fabric & care</h3>
                                <ul>
                                    <li>Faux suede fabric</li>
                                    <li>Gold tone metal hoop handles.</li>
                                    <li>RI branding</li>
                                    <li>Snake print trim interior </li>
                                    <li>Adjustable cross body strap</li>
                                    <li> Height: 31cm; Width: 32cm; Depth: 12cm; Handle Drop: 61cm</li>
                                </ul>

                                <h3>Size</h3>
                                <p>one size</p>
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel"
                            aria-labelledby="product-shipping-link">
                            <div class="product-desc-content">
                                <h3>Chính Sách Giao Hàng</h3>
                                <p>1. Phạm vi giao hàng

                                    Cardina hỗ trợ giao hàng trên toàn quốc. Dù quý khách ở bất kỳ nơi đâu trên lãnh thổ Việt Nam, chúng tôi đều có thể gửi hàng trực tiếp đến tận tay của quý khách.</p>

                                    <p>2. Thời gian giao hàng

                                    Đối với khách hàng ở Hà Nội: Giao ngay trong ngày hoặc theo yêu cầu Quý khách.
                                    Đối với khách hàng ở các tỉnh, thành phố còn lại: Thời gian giao hàng từ 2 đến 4 ngày làm việc.
                                    Lưu ý: Thời gian giao hàng được bắt đầu tính sau khi đơn hàng của quý khách được xác nhận thành công bằng cuộc gọi của nhân viên chăm sóc khách hàng của chúng tôi.</p>

                                    <p>3. Phí giao hàng

                                    Miễn phí vận chuyển cho đơn hàng từ 500.000 vnđ. Với các giá trị đơn hàng khác, phí vận chuyển của đơn hàng sẽ được tính theo quy định của nhà vận chuyển.</p>

                                    <p>4. Hủy đơn hàng

                                    Nếu đơn hàng của quý khách đã được đóng gói và chưa được gửi đi, quý khách có quyền được hủy đơn hàng mà không phải chịu bất cứ chi phí phát sinh nào.
                                    Đơn hàng của quý khách sẽ bị hủy nếu sau 3 lần nhân viên giao hàng hay nhân viên chăm sóc khách hàng liên lạc với quý khách mà không thành công.
                                    Khi quý khách nhận được đơn hàng, nếu không đồng ý nhận sản phẩm vì một lý do nào đó, quý khách có thể trả lại ngay sản phẩm cho nhân viên giao nhận và không phải thanh toán bất kỳ chi phí nào.</p>
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                            aria-labelledby="product-review-link">
                            <div class="reviews">
                                <h3>Đánh giá (2)Lượt Đánh Giá</h3>
                                @foreach ($product_detail['getReview'] as $data)
                                    <div class="review">
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <h4><a href="#">{{ $data->user_info['name'] }}</a></h4>
                                                <div class="ratings-container">

                                                            <div class="ratings">
                                                                <div class="ratings-val" style="width: 80%;"></div>
                                                                <!-- End .ratings-val -->
                                                            </div><!-- End .ratings -->

                                                </div><!-- End .rating-container -->
                                            </div><!-- End .col -->
                                            <div class="col">
                                                {{-- <h4>Good, perfect size</h4> --}}

                                                <div class="review-content">
                                                    <p>{{$data->review}}</p>
                                                </div><!-- End .review-content -->


                                            </div><!-- End .col-auto -->
                                        </div><!-- End .row -->
                                    </div><!-- End .review -->
                                @endforeach
                                <div class="review">
                                    <div class="row no-gutters">


                                    </div><!-- End .row -->
                                    <div class="reply">
                                        <div class="heading">
                                            <h3 class="title">Đánh giá sản phẩm</h3><!-- End .title -->
                                            <p class="title-desc">Hãy để lại đánh giá của bạn</p>
                                        </div><!-- End .heading -->

                                        <form action="{{ route('review.store', $product_detail->slug) }}" method="POST">
                                            @csrf
                                            <label for="reply-message" class="sr-only">Đánh Giá</label>
                                            <textarea id="reply-message" name="review" cols="30" rows="4" class="form-control" required
                                                placeholder="Nhận xét của bạn"></textarea>

                                                <p class="your-opinion">
                                                    <label>Rate</label>
                                                    <span>
                                                        <select name="rate" class="star-rating">
                                                          <option value="1">1</option>
                                                          <option value="2">2</option>
                                                          <option value="3">3</option>
                                                          <option value="4">4</option>
                                                          <option value="5">5</option>
                                                        </select>
                                                    </span>
                                                </p>

                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>Đánh Giá</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                        </form>
                                    </div><!-- End .reply -->
                                </div><!-- End .review -->
                            </div><!-- End .reviews -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .product-details-tab -->

                <h2 class="title text-center mb-4">Sản phẩm liên quan</h2><!-- End .title text-center -->

                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                    "nav": false,
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
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
                    @if ($product_related)
                        @foreach ($product_related as $products)

                            @php
                                $photo = explode(',', $products->photo);
                            @endphp
                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    <span class="product-label label-new">New</span>
                                    <a href="{{ route('product-detail', $products->slug) }}">
                                        <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="{{ route('add-to-wishlist', $products->slug) }}"
                                            class="btn-product-icon btn-wishlist btn-expandable"><span>Yêu thích</span></a>
                                        <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                            title="Quick view"><span>Quick view</span></a>

                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <a href="{{ route('add-to-cart', $products->slug) }}"
                                            class="btn-product btn-cart"><span>Thêm vào giỏ hàng</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Women</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a
                                            href="{{ route('product-detail', $products->slug) }}">{{ $products->title }}
                                            <br></a></h3><!-- End .product-title -->
                                    @php
                                        $discount = $products->price - ($products->price * $products->discount) / 100;
                                    @endphp
                                    <div class="product-price">
                                        {{ number_format($products->price), 2 }}VNĐ
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 2 Reviews )</span>
                                    </div><!-- End .rating-container -->

                                    <div class="product-nav product-nav-thumbs">
                                        @foreach ($photo as $data)
                                            <a href="{{ route('product-detail', $products->slug) }}" class="active">
                                                <img src="{{ $data }}" alt="{{ $data }}">
                                            </a>
                                        @endforeach

                                    </div><!-- End .product-nav -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        @endforeach
                    @endif

                </div><!-- End .owl-carousel -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
{{-- @push('styles')
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/modern-normalize/1.0.0/modern-normalize.min.css" integrity="sha512-ISS7cAi1PEhQ8jnbJpJZMd29NlhNj4AWYyLOSp2CE/CsHxTCu+r+t0D2yoJudVrd0/8fTVPUVDzY5Tvli75u/g==" crossorigin="anonymous" />
<link rel="stylesheet" href="{{asset('frontend/dist/star-rating.min.css?ver=4.3.0')}}">
<link rel="stylesheet" href="{{asset('frontend/demo/styles.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.23.0/themes/prism.min.css" integrity="sha512-tN7Ec6zAFaVSG3TpNAKtk4DOHNpSwKHxxrsiw4GHKESGPs5njn/0sMCUMl2svV4wo4BK/rCP7juYz+zx+l6oeQ==" crossorigin="anonymous" />
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.23.0/prism.min.js" integrity="sha512-YBk7HhgDZvBxmtOfUdvX0z8IH2d10Hp3aEygaMNhtF8fSOvBZ16D/1bXZTJV6ndk/L/DlXxYStP8jrF77v2MIg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.23.0/plugins/autoloader/prism-autoloader.min.js" integrity="sha512-zc7WDnCM3aom2EziyDIRAtQg1mVXLdILE09Bo+aE1xk0AM2c2cVLfSW9NrxE5tKTX44WBY0Z2HClZ05ur9vB6A==" crossorigin="anonymous"></script>
<script src="{{asset('frontend/dist/star-rating.min.js?ver=4.3.0')}}"></script>
<script>
    var destroyed = false;
    var starratingPrebuilt = new StarRating('.star-rating-prebuilt', {
        prebuilt: true,
        maxStars: 5,
    });
    var starrating = new StarRating('.star-rating', {
        stars: function (el, item, index) {
            el.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><rect class="gl-star-full" width="19" height="19" x="2.5" y="2.5"/><polygon fill="#FFF" points="12 5.375 13.646 10.417 19 10.417 14.665 13.556 16.313 18.625 11.995 15.476 7.688 18.583 9.333 13.542 5 10.417 10.354 10.417"/></svg>';
        },
    });
    var starratingOld = new StarRating('.star-rating-old');
    document.querySelector('.toggle-star-rating').addEventListener('click', function () {
        if (!destroyed) {
            starrating.destroy();
            starratingOld.destroy();
            starratingPrebuilt.destroy()
            destroyed = true;
        } else {
            starrating.rebuild();
            starratingOld.rebuild();
            starratingPrebuilt.rebuild()
            destroyed = false;
        }
    });
</script>
@endpush --}}
