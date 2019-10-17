@extends('layouts.Dashboard')

@section('content')
 <div class="container">
   <div class="row">
     <div class="col-4">
       <div class="card text-center">
         <div class="card-header ">
           Total Order
         </div>
         <div class="card-body">
           {{ $total_sale }} {{ ($total_sale <= 1) ? 'order':'orders' }}
         </div>

       </div>

     </div>

   </div>

 </div>

@endsection
