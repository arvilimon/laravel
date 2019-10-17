@extends('layouts.Dashboard')


@section('content')

  <div class="page-inner">
         <div class="page-title">
         <h3 class="breadcrumb-header">ABOUT &amp; Accordions</h3>
          <div class="page-breadcrumb">
           <ol class="breadcrumb breadcrumb-with-header">
            <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="#">About</a></li>
            </ol>
         </div>
       </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-white">
                         <div class="panel-heading clearfix">
                             <h3 class="panel-title">About table</h3>
                          </div>
                            <div class="panel-body">
                               <div role="tabpanel">
                                   <!-- Nav tabs -->
                              <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab1" role="tab" data-toggle="tab">About  1</a></li>

                              </ul>
                                      <!-- Tab panes -->
                          <div class="tab-content">
                             <div role="tabpanel" class="tab-pane active" id="tab1">
                               <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">ABOUT Form 1</h4>
                                </div>
                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>about Name</th>
                                                <th>About image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
              </div>
  <div class="panel panel-white">

        <div class="panel-heading clearfix">
            <h3 class="panel-title">About ADD</h3>
       </div>
       <div class="panel-body">
       <div class="tabs-right" role="tabpanel">
            <!-- Nav tabs -->
       <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#tab13" role="tab" data-toggle="tab">About 1</a></li>
      </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active fade in" id="tab13">
              <div class="col-md-8">
          <div class="panel panel-white">
          <div class="panel-heading clearfix">
          <h4 class="panel-title">ABOUT 1</h4>
        </div>
        <div class="panel-body">
          <form action="{{ url('aboutone/insert') }}" method="post" enctype="multipart/form-data">
                        @csrf
        <div class="form-group">
        <label for="exampleInputEmail1">about_name</label>
        <input type="text" class="form-control m-t-xxs @error('heading') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter about_title" name="aboutone_name">
        @if (session('status'))
                 <div class="alert alert-success">
                   {{ session('status') }}
                 </div>
               @endif
        </div>
        <div class="form-group">
        <label for="exampleInputPassword1">About Image</label>
        <input type="file" name="aboutone_image" class="password form-control m-t-xxs" id="exampleInputPassword1">
        <label for="exampleInputEmail1">link</label>
        <input type="text" class="form-control m-t-xxs" id="exampleInputEmail1" placeholder="Enter about_title" name="about_link">
        {{-- <label for="exampleInputPassword1">About Image</label>
        <input type="file" name="abouttwo_image" class="password form-control m-t-xxs" id="exampleInputPassword1">
        <label for="exampleInputEmail1">about_name</label>
        <input type="text" class="form-control m-t-xxs" id="exampleInputEmail1" placeholder="Enter about_title" name="aboutthere_name">
        <label for="exampleInputPassword1">About Image</label>
        <input type="file" name="aboutthere_image" class="password form-control m-t-xxs" id="exampleInputPassword1">
        <label for="exampleInputEmail1">about_name</label>
        <input type="text" class="form-control m-t-xxs" id="exampleInputEmail1" placeholder="Enter about_title" name="aboutfour_name">
        <label for="exampleInputPassword1">About Image</label>
        <input type="file" name="aboutfour_image" class="password form-control m-t-xxs" id="exampleInputPassword1"> --}}
          </div>

        </div>
        <button type="submit" class="btn btn-primary m-t-xs m-b-xs">Add about</button>
        </form>
          </div>
      </div>
    </div>
  </div>
          </div>
            </div>
          </div>
@endsection
