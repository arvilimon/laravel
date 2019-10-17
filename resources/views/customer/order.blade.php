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
                  <th>Billing ID</th>
                  <th>Sale ID</th>
                  <th>Grand Total</th>
                  <th>Parchase At</th>
                  <th>Payment_Type</th>
                  <th>Payment_status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($all_orders as $all_order)
                  <tr>
                    <td>{{ $all_order->billing_id }}</td>
                    <td>{{ App\Sale::where('billing_id', $all_order->billing_id)->first()->id }}</td>
                    <td>{{ $all_order->grand_total }}</td>
                    <td>{{ $all_order->created_at->diffForHumans() }}</td>
                    <td>{{ ($all_order->relationtobilling->payment_type ==1)? "Cash on Delivery" : "Credit Card" }}</td>
                    <td>{{ ($all_order->relationtobilling->payment_type ==1)? "Not Yet" : "Payment Successfuly" }}</td>
                    <td>
                      <a href="{{ url('customar/order/details') }}/{{ App\Sale::where('billing_id', $all_order->billing_id)->first()->id }}" class="btn btn-sm btn-info">view Details</a>
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
