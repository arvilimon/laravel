@extends('layouts.Dashboard')

@section('content')
 <div class="container">
   <div class="row">
     <div class="col-6 offset-3">
       <div class="card">
         <div class="card-header ">
            Add Review
         </div>
         <div class="card-body">
           <form action="{{ url('add/review/insert') }}" method="post">
             @csrf
             <div class="form-group">
               <label for="exampleInputEmail1">your comments</label>
               <input type="hidden" name="billing_detail_id" value="{{ $billing_detail_id }}">
               <input type="hidden" name="product_id" value="{{ App\Billing_detail::find($billing_detail_id)->product_id }}">
               <textarea class="form-control" name="comments" rows="5"></textarea>
             </div>
             <div class="form-group">
               <label for="exampleInputEmail1">your review</label>
               <input type="range" class="form-control" name="rating" min="1" max="5" step="1"></input>
             </div>
             <button type="submit" class="btn btn-info">Add Review</button>
           </form>
         </div>

       </div>

     </div>

   </div>

 </div>

@endsection
