@extends('backend.layouts.master')
@section('title','E-SHOP || Brand Edit')
@section('main-content')

<div class="card">
    <div class="card-header py-3">
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}"> <i class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('supplier.index') }}">Nhà cung cấp</a></li>
            <li class="breadcrumb-item active">Cập nhật</li>
        </ol>
    </div>
    </div>
    <div class="card-body">
      <form method="post" action="{{route('supplier.update',$supplier->id)}}">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Tên nhà cung cấp<span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{$supplier->title}}" class="form-control">
        @error('title')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Địa chỉ<span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="address" placeholder="Enter address"  value="{{$supplier->address}}" class="form-control">
        @error('address')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Điện thoại<span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="phone" placeholder="Enter phone"  value="{{$supplier->phone}}" class="form-control">
        @error('phone')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Email<span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="email" placeholder="Enter email"  value="{{$supplier->email}}" class="form-control">
        @error('email')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        <div class="form-group">
          <label for="status" class="col-form-label">Trạng thái <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="active" {{$supplier->status=='active' ? 'selelcted' : ''}}>Active</option>
              <option value="inactive"{{$supplier->status=='inactive' ? 'selected' : ''}}>Inactive</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Cập nhật</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#description').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
@endpush
