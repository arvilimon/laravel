@extends('layouts.Dashboard')

@section('coupon-page')
    active
  @endsection
  @section('content')
<div class="container">
  <div class="row">
    <div class="col-md-7">
      <div class="panel panel-white">
      <div class="panel-heading clearfix">
        Add coupon list
      </div>
          <div class="panel-body">
            <table class="table table-bordered">
              <thead>
              <tr>
              <th scope="col">Coupon Name</th>
              <th scope="col">Discount Amount</th>
              <th scope="col">valid till</th>
              <th scope="col">status</th>
              <th scope="col">ACTION</th>
              </tr>
              </thead>
              <tbody>
                @forelse ($coupons as $coupon)
                  <tr>
                    <td>{{ $coupon->coupon_name }}</td>
                    <td>{{ $coupon->discount_amount }}</td>
                    <td>{{ $coupon->valid_till }}</td>
                    <td>
                      @if ( Carbon\Carbon::now()->format('Y-m-d') <= $coupon->valid_till)
                        valid
                      @else
                        invalid
                      @endif
                    </td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ url('coupon/delete')}}/{{ $coupon->id }}" type="button" class="btn btn-danger btn-sm">Delete</a>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr class="text-center">
                    <td colspan="9">No Coupon</td>
                  </tr>
                @endforelse
              </tbody>
              </table>

          </div>
        </div>
      </div>

    <div class="col-md-4">
      <div class="panel panel-white">
        <div class="panel-heading clearfix">
            <h4 class="panel-title">coupon list</h4>

            @if (session('message'))
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Good!</strong> {{ session('message') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
        </div>
        <div class="panel-body">
          <form action="{{ url('coupon/insert') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">coupon name</label>
              <input type="text" class="form-control @error('coupon_name') is-invalid @enderror" name="coupon_name" id="exampleInputEmail1" aria-describedby="emailHelp"></input>
              @error('coupon_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Discount amount(%)</label>
              <input type="text" class="form-control @error('discount_amount') is-invalid @enderror" name="discount_amount" id="exampleInputEmail1" aria-describedby="emailHelp"></input>
              @error('discount_amount')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Valid Till (date)</label>
              <input type="date" class="form-control @error('valid_till') is-invalid @enderror" name="valid_till" id="exampleInputEmail1" aria-describedby="emailHelp"></input>
              @error('valid_till')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Add coupon</button>
          </form>
        </div>

      </div>

    </div>

  </div>

</div>
@endsection
