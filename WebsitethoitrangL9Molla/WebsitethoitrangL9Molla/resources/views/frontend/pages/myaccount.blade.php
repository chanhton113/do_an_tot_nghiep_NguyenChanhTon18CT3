@extends('frontend.layouts.master')
@section('main-content')
@section('title', 'Tài khoản')
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Tài khoản của bạn<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tài khoản của bạn</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    <aside class="col-md-4 col-lg-3">
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab"
                                    href="#tab-dashboard" role="tab" aria-controls="tab-dashboard"
                                    aria-selected="true">Bảng điều khiển</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders"
                                    role="tab" aria-controls="tab-orders" aria-selected="false">Đơn hàng của bạn</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-downloads-link" data-toggle="tab" href="#tab-downloads"
                                    role="tab" aria-controls="tab-downloads" aria-selected="false">Địa Chỉ Nhận
                                    Hàng</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address"
                                    role="tab" aria-controls="tab-address" aria-selected="false">Thay đổi mật
                                    khẩu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account"
                                    role="tab" aria-controls="tab-account" aria-selected="false">Thay đổi thông tin
                                    tài khoản
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.logout') }}">Đăng Xuất</a>
                            </li>
                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel"
                                aria-labelledby="tab-dashboard-link">
                                <p>Xin chào <span class="font-weight-normal text-dark">Người dùng</span> (không phải <span
                                    class="font-weight-normal text-dark">Người dùng</span>? <a href="#">Đăng xuất</a>)
                                <br>
                                Từ bảng điều khiển tài khoản của bạn, bạn có thể xem <a href="#tab-orders" của mình
                                    class="tab-trigger-link link-underline">đơn đặt hàng gần đây</a>, hãy quản lý <a của bạn
                                    href="#tab-address" class="tab-trigger-link">địa chỉ giao hàng và thanh toán</a>,
                                và <a href="#tab-account" class="tab-trigger-link">chỉnh sửa mật khẩu và tài khoản của bạn
                                    chi tiết</a>.
                            </p>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-orders" role="tabpanel"
                                aria-labelledby="tab-orders-link">
                                @if($orders ==null)
                                    <p>Bạn chưa có đơn hàng nào</p>
                                    <a href="{{route('product-grids')}}"
                                        class="btn btn-outline-primary-2"><span>{{ _('Mua Hàng') }}</span><i
                                            class="icon-long-arrow-right"></i></a>
                                @else
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="order-dataTable" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
                                          <th>Id</th>
                                          <th>Họ Tên</th>
                                          <th>Email</th>
                                          <th>Điện Thoại</th>
                                          <th>Tổng thanh toán</th>
                                          <th>Trạng thái</th>
                                        </tr>
                                      </thead>

                                      <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{$order->id}}</td>
                                                <td>{{ $profile->name }}</td>
                                                <td>{{ $profile->email }}</td>
                                                <td>{{$order->phone}}</td>
                                                <td>{{number_format($order->total),2}}VNĐ</td>

                                                <td>
                                                    @if($order->status=='new')
                                                      <span class="badge badge-primary">{{$order->status}}</span>
                                                    @elseif($order->status=='process')
                                                      <span class="badge badge-warning">{{$order->status}}</span>
                                                    @elseif($order->status=='delivered')
                                                      <span class="badge badge-success">{{$order->status}}</span>
                                                    @else
                                                      <span class="badge badge-danger">{{$order->status}}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                      </tbody>
                                    </table>
                                    <section class="confirmation_part section_padding">
                                        <div class="order_boxes">
                                              <div class="order-info">
                                                <h4 class="text-center pb-4">Thông tin đơn hàng</h4>
                                                <table class="table">
                                                      <tr>
                                                          <td>Ngày Lập</td>
                                                          <td> : {{ $order->date_founded}}</td>
                                                      </tr>
                                                      <tr>
                                                          <td>Họ Tên</td>
                                                          <td> : {{ $profile->name }}</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Email</td>
                                                        <td>{{ $profile->email }}</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Điện Thoại</td>
                                                        <td>{{$order->phone}}</td>
                                                      </tr>
                                                      <tr>
                                                          <td>Trạng Thái Đơn Hàng</td>
                                                          <td> : {{$order->status}}</td>
                                                      </tr>

                                                      <tr>
                                                          <td>Tổng thanh toán</td>
                                                          <td>{{number_format($order->total),2}}VNĐ</td>
                                                      </tr>
                                                </table>
                                              </div>
                                            </div>
                                  @endif
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-downloads" role="tabpanel"
                                aria-labelledby="tab-downloads-link">
                                <p>No downloads available yet.</p>
                                <a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i
                                        class="icon-long-arrow-right"></i></a>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-address" role="tabpanel"
                                aria-labelledby="tab-address-link">
                                <form action="{{ route('changePassword.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Mật khẩu cũ</label>
                                            <input type="password" name="current_password" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Mật khẩu mới</label>
                                            <input type="password" name="new_password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Nhập lại mật khẩu</label>
                                            <input type="password" name="new_confirm_password"
                                                class="form-control mb-2">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>Cập nhật</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-account" role="tabpanel"
                                aria-labelledby="tab-account-link">
                                <form action="{{ route('profile.update', $profile->id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Họ Tên *</label>
                                            <input type="text" name="name" value="{{ $profile->name }}"
                                                class="form-control" required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Email address *</label>
                                            <input type="email" name="email" value="{{ $profile->email }}"
                                                class="form-control" required>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>Cập nhật</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
                            </div><!-- .End .tab-pane -->
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
@endpush
