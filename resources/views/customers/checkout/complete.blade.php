@extends ('layouts.app')

@section ('content')


  <div class="panel panel-default">
    <div class="panel-heading">
      <h1>Congratulations {{Auth::guard('customer')->user()->name}}</h1>
      <p>Your order containing the item, <strong>{{$order->product_name}}</strong>
        is complete</p>
      <a class="btn btn-danger" href="/customers">Back to Shop</a>
    </div>
  </div>

@endsection
