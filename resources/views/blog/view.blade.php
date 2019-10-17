@extends('layouts.Dashboard')

@section('content')
  <div class="panel panel-container">
    <div class="row">
      <div class="col-8">
        <div class="panel panel-info">
        <div class="panel-header">
          Add blog list
        </div>
    <div class="panel-body">
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>blog_name</th>
        <th>blog_detile</th>
        <th>blog_image</th>
        <th>created</th>
        <th>ACTION</th>
      </tr>
    </thead>
    <tbody>
      {{-- @forelse ($banners as $banner)
       <tr>
         <td>{{ $banner->banner_name }}</td>
         <td>
           <textarea  rows="5" cols="20">{{ $banner->banner_detile }}</textarea>
         </td>
         <td>
           <img src="{{ asset('uploads') }}/{{ $banner->banner_image }}" alt="not found" width="80">
         </td>
         <td>{{ $banner->created_at->diffForHumans() }}</td>
         <td>
             <div class="btn-group" role="group" aria-label="Basic example">
               <a href="{{ url('banner/delete')}}/{{ $banner->id }}" type="button" class="btn btn-danger btn-sm">Delete</a>
             </div>
         <td>
       </tr>
     @empty
       <tr class="text-center text-danger">
         <td colspan="3">No Data Available</td>
       </tr>
     @endforelse --}}
    </tbody>
  </table>
      </div>
    </div>
  </div>

        <div class="col-4">
        <div class="card">
          <div class="card-header">
            Add blog form
            <div>
              <div class="card-body">

                <form action="{{ url('blog/insert') }}" method="post" enctype="multipart/form-data">
                  @csrf
              <div class="form-group">
                <label>blog_name</label>
                @if (session('status'))
                  <div class="alert alert-success">
                    {{ session('status') }}
                  </div>
                @endif
                <input type="text" name="blog_name" class="form-control @error('blog_name') is-invalid @enderror" placeholder="Enter your blog  name" value="{{ old('blog_name') }}">
              </div>
              <div class="form-group">
                <label>blog_detile</label>
                <input type="text" name="blog_detile" class="form-control" placeholder="Enter your blog_detile" value="{{ old('blog_detile') }}">
              </div>
              <div class="form-group">
                <label>blog_image</label>
                <input type="file" name="blog_image" class="form-control">
              </div>
              <button type="submit" class="btn btn-success">Add blog</button>
            </form>
            <div>
          <div>
          <div>
       <div>
    <div>
@endsection
