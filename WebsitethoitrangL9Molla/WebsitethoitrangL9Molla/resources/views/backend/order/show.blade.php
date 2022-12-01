@extends('backend.layouts.master')

@section('title','Order Detail')

@section('main-content')
<div class="card">
{{-- <h5 class="card-header">Chi tiết đơn hàng <a href="{{route('order.pdf',$order->id)}}" class=" btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i> Xuất PDF</a> --}}
    <h5 class="card-header">Chi tiết đơn hàng </h5>
  <div class="card-body">
    @if($order)
    <section class="confirmation_part section_padding">
      <div class="order_boxes">
        <div class="row">
          <div class="col-lg-6 col-lx-4">
            <div class="order-info">
              <h4 class="text-center pb-4">Thông tin đơn hàng</h4>
              <table class="table">
                    <tr>
                        <td>Ngày Lập</td>
                        <td> : {{$order->created_at->format('d/m/Y ') }}</td>
                    </tr>
                    <tr>
                        <td>Trạng Thái Đơn Hàng</td>
                        <td> : {{$order->status}}</td>
                    </tr>
                    <tr>
                        <td>Tổng Thanh Toán</td>
                        <td> :  {{number_format($order->total),2}}VNĐ</td>
                    </tr>
                    <tr>
                        <td>Phương thức</td>
                        <td> : @if($order->payment_method=='cod') Cash on Delivery @else Paypal @endif</td>
                    </tr>
                    <tr>
                        <td>Phương thức</td>
                        <td> : @if($order->payment_method=='cod') Cash on Delivery @else Paypal @endif</td>
                    </tr>
              </table>
            </div>
          </div>

          <div class="col-lg-6 col-lx-4">
            <div class="shipping-info">
              <h4 class="text-center pb-4">Thông tin vận chuyển</h4>
              <table class="table">
                    <tr class="">
                        <td>Họ Và Tên</td>
                        <td>{{ucfirst($order->user->name)}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ucfirst($order->user->email)}}</td>
                    </tr>
                    <tr>
                        <td>Điện Thoại</td>
                        <td> : {{$order->phone}}</td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td> : {{$order->address}}</td>
                    </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif

  </div>
</div>
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
