@extends('layouts.Dashboard')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-6 offset-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('product/view') }}">product</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product_info->product_name }}</li>
          </ol>
       </nav>
      <div class="card">
        <div class="card-header">
           porduct edit
          <div>

            <div class="card-body">
              @if (session('status'))
                <div class="alert alert-success">
                  {{ session('status') }}
                </div>
              @endif

              <form action="{{ url('product/edit/insert') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
              <label>Product Name</label>
              <input type="hidden" name="product_id" value="{{ $product_info->id }}">
              <input type="text" name="product_name" class="form-control" value="{{ $product_info->product_name }}">
            </div>

            <div class="form-group">
              <label>Product Description</label>
              <textarea name="product_details" class="form-control" rows="4">{{ $product_info->product_details }}</textarea>
            </div>

            <div class="form-group">
              <label>Product Price</label>
              <input type="text" name="product_price" class="form-control" value="{{ $product_info->product_price }}">
            </div>

            <div class="form-group">
              <label>Product Quantity</label>
              <input type="text" name="product_quantity" class="form-control" value="{{ $product_info->product_quantity }}">
            </div>

            <div class="form-group">
              <label>Alert quantity</label>
              <input type="text" name="alert_quantity" class="form-control" value="{{ $product_info->Alert_quantity }}">
            </div>
            <div class="form-group">
              <label>image</label>
              <input type="file" name="product_image" class="form-control" value="{{ $product_info->product_image }}">
            </div>

            <button type="submit" class="btn btn-info">edit product</button>
          </form>
          <div>
        <div>
        <div>
     <div>
  <div>
  </div>
</div>
@endsection
