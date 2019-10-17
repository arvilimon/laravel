@extends('layouts.Dashboard')

@section('category-page')
  active
@endsection
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-6">
        <div class="card">
        <div class="card-header">
          Add category list
        </div>
            <div class="card-body">
              <table class="table table-bordered">
    <thead>
      <tr>

        <th scope="col">serial number</th>
        <th scope="col">category</th>
        <th scope="col">created_at</th>
        <th scope="col">ACTION</th>
      </tr>
    </thead>
    <tbody>
       @forelse ($categorise as $category)
        <tr>
          <td>{{ $loop->index+1 }}</td>
          <td>{{ $category->category_name }}</td>
          <td>{{ $category->created_at->diffForHumans() }}</td>
          <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ url('category/delete')}}/{{ $category->id }}" type="button" class="btn btn-danger btn-sm">Delete</a>
              </div>
          <td>

        </tr>
      @empty
        <tr class="text-center text-danger">
          <td colspan="3">No Data Available</td>
        </tr>
      @endforelse


    </tbody>
  </table>
      </div>
    </div>
  </div>

        <div class="col-6">
        <div class="card">
          <div class="card-header">
            Add category form
            <div>
              <div class="card-body">



                <form action="{{ url('category/insert') }}" method="post">
                  @csrf
              <div class="form-group">
                <label>category Name</label>
                @if (session('status'))
                  <div class="alert alert-success">
                    {{ session('status') }}
                  </div>
                @endif
                <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" placeholder="Enter your category name" value="{{ old('category_name') }}">
              </div>

              @error('category_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror

              <button type="submit" class="btn btn-success">Add product</button>
            </form>
            <div>
          <div>
          <div>
       <div>
    <div>
@endsection
