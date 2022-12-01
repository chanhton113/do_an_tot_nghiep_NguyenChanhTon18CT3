@extends('frontend.layouts.master')
@section('title', 'Yêu thích')
@section('main-content')
    <main class="main">
        <div class="page-header text-center"
            style="background-image: url('{{ asset('frontend/assets/images/page-header-bg.jpg') }}')">
            <div class="container">
                <h1 class="page-title">Yêu thích<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sản phẩm yêu thích</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <table class="table table-wishlist table-mobile">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Trạng thái</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (Helper::getAllProductFromWishlist())
                            @foreach (Helper::getAllProductFromWishlist() as $key => $wishlist)
                                <tr>
                                    @php
                                        $photo = explode(',', $wishlist->product['photo']);
                                    @endphp
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="{{ route('product-detail', $wishlist->product['slug']) }}">
                                                    <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a
                                                    href="{{ route('product-detail', $wishlist->product['slug']) }}">{{ $wishlist->product['title'] }}</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">{{ number_format($wishlist['amount']), 2 }}VNĐ</td>
                                    <td class="stock-col"><span class="in-stock">In stock</span></td>
                                    <td class="action-col">
                                        <a href="{{route('add-to-cart',$wishlist->product['slug'])}}" class="btn btn-block btn-outline-primary-2"><i
                                                class="icon-cart-plus"></i>Thêm vào giỏ hàng</a>
                                    </td>
                                    <td class="remove-col"><a href="{{ route('wishlist-delete', $wishlist->id) }}"
                                            class="btn-remove"><i class="icon-close"></i></a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center">
                                    There are no any wishlist available. <a href="{{ route('product-grids') }}"
                                        style="color:blue;">Continue shopping</a>

                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table><!-- End .table table-wishlist -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
