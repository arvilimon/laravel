@extends('layouts.Dashboard')

@section('product-page')
  active
@endsection
@section('content')
  <div class="page-breadcrumb">
      <ol class="breadcrumb">
          <li><a href="{{ url('/home') }}">Home</a></li>
          <li class="active">Product</li>
      </ol>
  </div>
<div class="container">
  <div class="row">
    <div class="col-md-8">
    <div class="panel panel-white">
        <div class="panel-heading clearfix">
            <h4 class="panel-title">Add Product</h4>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>category</th>
                        <th>product_details</th>
                        <th>price</th>
                        <th>quantity</th>
                        <th>image</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                  <tr>
                  <td>{{ $product->product_name }}</td>
                  <td>{{ $product->relationToCatagory->category_name }}</td>
                  <td>
                    <textarea  rows="5" cols="20">{{ $product->product_details }}</textarea>
                  </td>
                  <td>{{ $product->product_price }}</td>
                  <td>{{ $product->product_quantity }}</td>
                  <td>
                    <img src="{{ asset('uploads/product_images') }}/{{ $product->product_image }}" alt="not found" width="80">
                  </td>

                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="{{ url('product/edit')}}/{{ $product->id }}" type="button" class="btn btn-info btn-sm">Edit</a>
                      <a href="{{ url('product/delete')}}/{{ $product->id }}" type="button" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                  <td>
                  </tr>
                @endforeach
                  </tbody>
                  </table>
                  {{ $products->links() }}
              </div>
            </div>
          </div>

      <div class="col-md-4">
          <div class="panel panel-white">
              <div class="panel-heading clearfix">
                  <h4 class="panel-title">product list</h4>
              </div>
              @if (session('message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Good!</strong> {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              <div class="panel-body">
                <form action="{{ url('product/insert') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category_name</label>
                      <select class="form-control" name="category_id">
                        <option value="">-select one-</option>
                        @foreach ($categories as  $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->category_name }}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">product_name</label>
                    <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('product_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">product_price</label>
                    <input type="text" class="form-control @error('product_price') is-invalid @enderror" name="product_price" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('product_price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">product_details</label>
                    <textarea type="text" class="form-control @error('product_details') is-invalid @enderror" name="product_details" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
                    @error('product_details')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">product_quantity</label>
                    <input type="text" class="form-control @error('product_quantity') is-invalid @enderror" name="product_quantity" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('product_quantity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">alert_quantity</label>
                    <input type="text" class="form-control @error('alert_quantity') is-invalid @enderror" name="alert_quantity" id="exampleInputPassword1">
                    @error('alert_quantity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">product image</label>
                    <input type="file" class="form-control @error('product_image') is-invalid @enderror" name="product_image" id="exampleInputPassword1">
                    @error('product_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>

            </div>

          </div>



      <div class="col-md-8">
          <div class="panel panel-white">
              <div class="panel-heading clearfix">
                  <h4 class="panel-title">Restore List</h4>
              </div>
          <div class="panel-body">
            <table class="table table-bordered">
              <thead>
              <tr>
              <th scope="col">name</th>
              <th scope="col">price</th>
              <th scope="col">quantity</th>
              <th scope="col">ACTION</th>
              </tr>
              </thead>
              <tbody>

            @foreach ($sofdeletes as $sofdelete)
              <tr>
              <td>{{ $sofdelete-> product_name}}</td>
              <td>{{ $sofdelete-> product_price}}</td>
              <td>{{ $sofdelete-> product_quantity}}</td>

              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ url('product/restore')}}/{{ $sofdelete->id }}" type="button" class="btn btn-info btn-sm">Restore</a>
                </div>
              <td>
              </tr>
            @endforeach
              </tbody>
              </table>
              {{ $products->links() }}
          </div>
        </div>
      </div>

  </div>

</div>
@endsection
