@extends('frontend.layouts.master')
@section('title', 'Giỏ hàng')
@section('main-content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Giỏ hàng<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Giỏ hàng của bạn</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        @if(Helper::getAllProductFromCart()->count()>0)
        <div class="page-content">
            <div class="cart">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <table class="table table-cart table-mobile">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Số tiền</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form method="POST" action="{{ route('cart.update') }}">
                                        @csrf
                                        @if (Helper::getAllProductFromCart())
                                            @foreach (Helper::getAllProductFromCart() as $key => $cart)
                                                <tr>
                                                    @php
                                                        $photo = explode(',', $cart->product['photo']);
                                                    @endphp
                                                    <td class="product-col">
                                                        <div class="product">
                                                            <figure class="product-media">
                                                                <a
                                                                    href="{{ route('product-detail', $cart->product['slug']) }}">
                                                                    <img src="{{ $photo[0] }}"
                                                                        alt="{{ $photo[0] }}">
                                                                </a>
                                                            </figure>

                                                            <h3 class="product-title">
                                                                <a href="#">{{ $cart->product['title'] }}</a>
                                                            </h3><!-- End .product-title -->
                                                        </div><!-- End .product -->
                                                    </td>
                                                    <td class="price-col">{{ number_format($cart['price']), 2 }}VNĐ</td>
                                                    <td class="quantity-col">
                                                        <div class="cart-product-quantity">
                                                            <input type="number" name="quant[{{ $key }}]"
                                                                class="form-control" value="{{ $cart->quantity }}"
                                                                min="1" max="10" step="1"
                                                                data-decimals="0" required>
                                                            <input type="hidden" name="qty_id[]"
                                                                value="{{ $cart->id }}">
                                                        </div><!-- End .cart-product-quantity -->
                                                    </td>
                                                    <td class="total-col">{{ number_format($cart->amount), 2 }}VNĐ</td>
                                                    <td class="remove-col"><a href="{{ route('cart-delete', $cart->id) }}"
                                                            class="btn-remove"><i class="icon-close"></i></a></td>
                                                </tr>
                                            @endforeach
                                        @endif
                                </tbody>
                            </table><!-- End .table table-wishlist -->

                            <div class="cart-bottom">
                                <div class="cart-discount">
                                    {{-- <form action="{{route('coupon-store')}}" method="POST">
                                    @csrf --}}
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Nhập mã giảm giá">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary-2" type="submit"><i
                                                    class="icon-long-arrow-right"></i></button>
                                        </div><!-- .End .input-group-append -->
                                    </div><!-- End .input-group -->
                                    {{-- </form> --}}
                                </div><!-- End .cart-discount -->
                                <button type="submit" class="btn btn-outline-dark-2"><span>CẬP NHẬT</span><i
                                        class="icon-refresh"></i></button>
                            </div><!-- End .cart-bottom -->
                        </div><!-- End .col-lg-9 -->
                        </form>
                        <aside class="col-lg-3">
                            <div class="summary summary-cart">
                                <h3 class="summary-title">Thanh toán</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <tbody>
                                        <tr class="summary-subtotal">
                                            <td>Tạm tính:</td>
                                            <td>{{ number_format(Helper::totalCartPrice()), 2 }} VNĐ</td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr class="summary-shipping">
                                            <td>Đơn vị vận chuyển:</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        @if (count(Helper::shipping()) > 0 && Helper::cartCount() > 0)
                                        @foreach(Helper::shipping() as $shipping)
                                            <tr class="summary-shipping-row">
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="free-shipping" name="shipping"
                                                            class="custom-control-input">
                                                        <label class="custom-control-label" for="free-shipping">{{$shipping->type}}
                                                            Shipping</label>
                                                    </div><!-- End .custom-control -->
                                                </td>
                                                <td>{{number_format($shipping->price),2}}VNĐ</td>
                                            </tr><!-- End .summary-shipping-row -->
                                            @endforeach
                                        @else
                                            <tr class="summary-shipping-row">
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="free-shipping" name="shipping"
                                                            class="custom-control-input">
                                                        <label class="custom-control-label" for="free-shipping">Free
                                                            Shipping</label>
                                                    </div><!-- End .custom-control -->
                                                </td>
                                                <td>$0.00</td>
                                            </tr><!-- End .summary-shipping-row -->
                                        @endif
                                        @php
                                            $total_amount = Helper::totalCartPrice();
                                            if (session()->has('coupon')) {
                                                $total_amount = $total_amount - Session::get('coupon')['value'];
                                            }
                                        @endphp
                                        <tr class="summary-total">
                                            <td>Tổng thanh toán:</td>
                                            <td>{{ number_format($total_amount), 2 }}VNĐ</td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <a href="{{ route('checkout') }}"
                                    class="btn btn-outline-primary-2 btn-order btn-block">Thanh toán</a>
                            </div><!-- End .summary -->

                            <a href="{{ route('product-grids') }}"
                                class="btn btn-outline-dark-2 btn-block mb-3"><span>Tiếp tục mua hàng</span><i
                                    class="icon-refresh"></i></a>
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div><!-- End .page-content -->

        @else
        <h3 style="text-align: center">Bạn Không Có Bất Kỳ Sản Phẩm Nào Trong Giỏ Hàng</h3>
        @endif
    </main><!-- End .main -->
@endsection
