<div class="page-wrapper">
    <header class="header">
        <div class="header-top">
            <div class="container">
                <div class="header-left">

                    <div class="header-dropdown">
                        <a href="#">Chào mừng bạn đến với XSHOP</a>
                    </div><!-- End .header-dropdown -->
                </div><!-- End .header-left -->

                <div class="header-right">
                    <ul class="top-menu">
                        <li>
                            <ul>
                                <li><a href="tel:#"><i class="icon-phone"></i>Liên hệ: +0123 456 789</a></li>
                                @auth
                                <li><a href="{{route('wishlist')}}"><i class="icon-heart-o"></i>Yêu Thích<span></span></a></li>
                                <li><a href="{{route('user.logout')}}">Đăng Xuất</a></li>
                                @else
                                <li><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Đăng Nhập</a></li>
                                @endauth
                            </ul>
                        </li>
                    </ul><!-- End .top-menu -->
                </div><!-- End .header-right -->
            </div><!-- End .container -->
        </div><!-- End .header-top -->

        <div class="header-middle sticky-header">
            <div class="container">
                <div class="header-left">
                    <button class="mobile-menu-toggler">
                        <span class="sr-only">Toggle mobile menu</span>
                        <i class="icon-bars"></i>
                    </button>
                    @php
                        $settings=DB::table('settings')->get();
                    @endphp
                    @foreach ($settings as $setting)
                    <a href="http://127.0.0.1:8000/admin" class="logo">
                        <img src="{{$setting->logo}}" alt="{{$setting->logo}}" width="105" height="25">
                    </a>
                    @endforeach
                    <nav class="main-nav">
                        <ul class="menu sf-arrows">
                            <li class="megamenu-container active">
                                <a href="{{route('home')}}">Trang chủ</a>
                            </li>
                            <li>
                                <a href="#" class="sf-with-ul">DANH MỤC</a>

                                <div class="megamenu megamenu-md">
                                    <div class="row no-gutters">
                                        <div class="col-md-8">
                                            <div class="menu-col">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="menu-title">Danh Mục</div><!-- End .menu-title -->
                                                        <ul>
                                                            @php
                                                                $cate=DB::table('categories')->where('status','active')->where('is_parent',1)->get();
                                                            @endphp
                                                            @foreach($cate as $data)
                                                            <li><a href="{{route('product-cat',$data->slug)}}">{{$data->title}}</a></li>
                                                            @endforeach
                                                        </ul>

                                                    </div><!-- End .col-md-6 -->
                                                </div><!-- End .row -->
                                            </div><!-- End .menu-col -->
                                        </div><!-- End .col-md-8 -->
                                    </div><!-- End .row -->
                                </div><!-- End .megamenu megamenu-md -->
                            </li>
                            <li>
                                <a href="{{route('product-grids')}}" >SẢN PHẨM</a>
                            </li>
                            <li>
                                <a href="{{route('about-us')}}">Về chúng tôi</a>
                            </li>
                            <li>
                                <a href="{{route('blog')}}">Bài viết</a>
                            </li>
                            <li>
                                <a href="{{route('contact')}}">Liên hệ</a>
                            </li>
                            <li>
                                <a href="{{route('myaccount')}}">Tài Khoản</a>
                            </li>
                        </ul><!-- End .menu -->
                    </nav><!-- End .main-nav -->
                </div><!-- End .header-left -->

                <div class="header-right">
                    <div class="header-search">
                        <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                        <form action="{{route('product.search')}}" method="POST">
                            @csrf
                            <div class="header-search-wrapper">
                                <button for="q" class="sr-only">Tìm kiếm</button>
                                <input type="search" class="form-control" name="search" id="q" placeholder="Tìm kiếm..." required>
                            </div><!-- End .header-search-wrapper -->
                        </form>
                    </div><!-- End .header-search -->

                    <div class="dropdown cart-dropdown">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            @auth
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count">{{Helper::cartCount()}}</span>
                            @else
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count">0</span>
                            @endauth
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products">
                                @auth
                                @foreach(Helper::getAllProductFromCart() as $data)
                                @php
                                    $photo=explode(',',$data->product['photo'])
                                @endphp
                                <div class="product">
                                    <div class="product-cart-details">
                                        <h4 class="product-title">
                                            <a href="{{route('product-detail',$data->product['slug'])}}">{{$data->product['title']}}</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">{{$data->quantity}} X </span>
                                            {{number_format($data->product['price']),2}}VNĐ
                                        </span>
                                    </div><!-- End .product-cart-details -->

                                    <figure class="product-image-container">
                                        <a href="{{route('product-detail',$data->product['slug'])}}" class="product-image">
                                            <img src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                        </a>
                                    </figure>
                                    <a href="{{route('cart-delete',$data->id)}}" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                </div><!-- End .product -->
                                @endforeach
                                @else

                                @endauth
                            </div><!-- End .cart-product -->

                            @auth
                            <div class="dropdown-cart-total">
                                <span>Tổng thanh toán</span>
                                <span class="cart-total-price">{{number_format(Helper::totalCartPrice()),2}}VNĐ</span>
                            </div><!-- End .dropdown-cart-total -->
                            @else
                            <div class="dropdown-cart-total">
                                <span>Tổng thanh toán</span>
                                <span class="cart-total-price">0.00 VNĐ</span>
                            </div><!-- End .dropdown-cart-total -->
                            @endauth

                            <div class="dropdown-cart-action">
                                <a href="{{route('cart')}}" class="btn btn-primary">Xem Giỏ</a>
                                <a href="{{route('checkout')}}" class="btn btn-outline-primary-2"><span>Thanh toán</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .dropdown-cart-total -->
                        </div><!-- End .dropdown-menu -->
                    </div><!-- End .cart-dropdown -->
                </div><!-- End .header-right -->
            </div><!-- End .container -->
        </div><!-- End .header-middle -->
    </header><!-- End .header -->
