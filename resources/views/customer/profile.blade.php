@extends('layouts.Dashboard')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-2 offset-4">
        <div class="card">
          <div class="card-header">
              <h2>ADD Customer information</h2>
              @if (session('message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Good!</strong> {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
          </div>
          <div class="card-body">
            @if (App\Profile::where('user_id', Auth::id())->exists())
              @php
                $single_customar_data = App\Profile::where('user_id', Auth::id())->first();
              @endphp
              @csrf
              <form action="{{ url('customar/profile/update') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">first name</label>
                  <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                  name="first_name" id="exampleInputEmail1" aria-describedby="emailHelp"
                  value="{{ $single_customar_data->first_name }}"></input>
                  @error('first_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">last name</label>
                  <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                   name="last_name" id="exampleInputEmail1" aria-describedby="emailHelp"
                   value="{{ $single_customar_data->last_name }}"></input>
                  @error('last_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  <input type="text" class="form-control @error('address') is-invalid @enderror"
                  name="address" id="exampleInputEmail1" aria-describedby="emailHelp"
                   value="{{ $single_customar_data->address }}"></input>
                  @error('address')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Phone</label>
                  <input type="text" class="form-control @error('phone') is-invalid @enderror"
                   name="phone" id="exampleInputEmail1" aria-describedby="emailHelp"
                    value="{{ $single_customar_data->phone }}"></input>
                  @error('phone')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Zip Code</label>
                  <input type="text" class="form-control @error('zip_code') is-invalid @enderror"
                   name="zip_code" id="exampleInputEmail1" aria-describedby="emailHelp"
                    value="{{ $single_customar_data->zip_code }}"></input>
                  @error('zip_code')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-info">update information</button>
              </form>
            @else
              <form action="{{ url('customar/profile/insert') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">first name</label>
                  <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="exampleInputEmail1" aria-describedby="emailHelp"></input>
                  @error('first_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">last name</label>
                  <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="exampleInputEmail1" aria-describedby="emailHelp"></input>
                  @error('last_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="exampleInputEmail1" aria-describedby="emailHelp"></input>
                  @error('address')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Phone</label>
                  <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp"></input>
                  @error('phone')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Zip Code</label>
                  <input type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" id="exampleInputEmail1" aria-describedby="emailHelp"></input>
                  @error('zip_code')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <button type="submit" class="btn btn-primary">Customer information</button>
              </form>
            @endif

          </div>

        </div>

      </div>

    </div>

  </div>

@endsection
