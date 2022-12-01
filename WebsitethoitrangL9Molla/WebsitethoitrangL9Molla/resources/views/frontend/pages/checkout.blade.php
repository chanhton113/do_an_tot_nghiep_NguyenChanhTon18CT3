@extends('frontend.layouts.master')
@section('title', 'Thanh toán')
@section('main-content')
    <main class="main">
        <div class="page-header text-center"
            style="background-image: url('{{ asset('frontend/assets/images/page-header-bg.jpg') }}')">
            <div class="container">
                <h1 class="page-title">Thanh toán<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    {{-- <div class="checkout-discount">
                        <form action="#">
                            <input type="text" class="form-control" required id="checkout-discount-input">
                            <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to
                                    enter your code</span></label>
                        </form>
                    </div><!-- End .checkout-discount --> --}}
                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="checkout-title">Địa chỉ nhận hàng</h2><!-- End .checkout-title -->

                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="address"
                                    placeholder="Nhập địa chỉ của bạn">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Điện thoại *</label>
                                        <input type="text" name="phone" class="form-control"
                                            placeholder="Nhập số điện thoại của bạn" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Họ Tên *</label>
                                        <input type="text" class="form-control" >
                                    </div><!-- End .col-sm-6 -->
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Email *</label>
                                        <input type="text" class="form-control">
                                    </div><!-- End .col-sm-6 -->
                                </div>

                            </div><!-- End .col-lg-9 -->
                            <aside class="col-lg-3">
                                <div class="summary">
                                    <h3 class="summary-title">Đơn hàng của bạn</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (Helper::getAllProductFromCart())
                                                @foreach (Helper::getAllProductFromCart() as $key => $cart)
                                                    <tr>
                                                        <td><a
                                                                href="{{ route('product-detail', $cart->product['slug']) }}">{{ $cart->product['title'] }}</a>
                                                        </td>
                                                        <td>{{ number_format($cart['amount']), 2 }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            <tr class="summary-subtotal">
                                                <td>Tạm tính:</td>
                                                <td>{{ number_format(Helper::totalCartPrice()), 2 }} VNĐ</td>
                                            </tr><!-- End .summary-subtotal -->
                                            <tr>
                                                <td>Vận chuyển:</td>
                                                <td>
                                                    <select>
                                                        @foreach (Helper::shipping() as $shipping)
                                                            <option value="{{ $shipping->id }}">{{ $shipping->type }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr class="summary-total">
                                                <td>Tổng thanh toán:</td>
                                                @php
                                                    $total_amount = Helper::totalCartPrice();
                                                    if (session('coupon')) {
                                                        $total_amount = $total_amount - session('coupon')['value'];
                                                    }
                                                @endphp
                                                @if (session('coupon'))
                                                    <td>{{ number_format($total_amount), 2 }}VNĐ</td>
                                                @else
                                                    <td>{{ number_format($total_amount), 2 }}VNĐ</td>
                                                @endif
                                            </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->

                                    <div class="accordion-summary" id="accordion-payment">
                                        <div class="card">
                                            <div class="card-header" id="heading-1">
                                                <h2 class="card-title">
                                                    <a role="button" data-toggle="collapse" href="#collapse-1"
                                                        aria-valuetext="1" aria-expanded="true" aria-controls="collapse-1">
                                                        <input type="hidden" name="payment" value="1">Thanh toán khi
                                                        nhận hàng
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-1" class="collapse show" aria-labelledby="heading-1"
                                                data-parent="#accordion-payment">
                                                <div class="card-body">

                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->

                                        <div class="card">
                                            <div class="card-header" id="heading-2">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                                        Check payments
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-2" class="collapse" aria-labelledby="heading-2"
                                                data-parent="#accordion-payment">
                                                <div class="card-body">

                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->

                                        <div class="card">
                                            <div class="card-header" id="heading-3">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                        Cash on delivery
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-3" class="collapse" aria-labelledby="heading-3"
                                                data-parent="#accordion-payment">
                                                <div class="card-body">
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->

                                        <div class="card">
                                            <div class="card-header" id="heading-4">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        href="#collapse-4" aria-expanded="false"
                                                        aria-controls="collapse-4">
                                                        PayPal <small class="float-right paypal-link">What is
                                                            PayPal?</small>
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-4" class="collapse" aria-labelledby="heading-4"
                                                data-parent="#accordion-payment">
                                                <div class="card-body">

                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->

                                        <div class="card">
                                            <div class="card-header" id="heading-5">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        href="#collapse-5" aria-expanded="false"
                                                        aria-controls="collapse-5">
                                                        Credit Card (Stripe)
                                                        <img src="{{ asset('frontend/assets/images/payments-summary.png') }}"
                                                            alt="payments cards">
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-5" class="collapse" aria-labelledby="heading-5"
                                                data-parent="#accordion-payment">
                                                <div class="card-body">
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->
                                    </div><!-- End .accordion -->

                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span class="btn-text">Place Order</span>
                                        <span class="btn-hover-text">Thanh toán</span>
                                    </button>
                                </div><!-- End .summary -->
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
