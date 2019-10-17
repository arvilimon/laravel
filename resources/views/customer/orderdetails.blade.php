@extends('layouts.Dashboard')

@section('content')
 <div class="container">
   <div class="row">
     <div class="col-12">
       <div class="card">
         <div class="card-header ">
            Order list
         </div>
         <div class="card-body">
           <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Product Quantity</th>
                  <th>Create Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                  <tr>
                    <td>{{ App\Product::find($product->product_id)->product_name }}</td>
                    <td>{{ $product->product_unit_price }}</td>
                    <td>{{ $product->product_quantity }}</td>

                    <td>
                    @if (App\Review::where('billing_detail_id', $product->id)->exists())
                      ----
                    @else
                      <a href="{{ url('add/review') }}/{{ $product->id }}" class="btn btn-sm btn-info">Add Review</a>
                    @endif
                  </td>

               </tr>
                @endforeach
              </tbody>
            </table>
         </div>

       </div>

     </div>

   </div>

 </div>

@endsection
