<h1>Invoice ID: {{ $sale_id }}</h1>
{{-- @php
  $orders = App\Order::where('sale_id', $sale_id)->get();
@endphp
<table>
  <tr>
    <th>Product Name</th>
    <th>Product Price</th>
    <th>Product quantity</th>
    <th>created_at</th>
  </tr>
  <tr>
     @foreach ($orders as $value)

      <td>{{ $value->product_id }}</td>
      <td>{{ $value->product_price }}</td>
      <td>{{ $value->product_quantity }}</td>
    @endforeach
   </tr>
</table> --}}
