@extends ('layouts.app')

@section ('content')


  <div class="panel panel-default">
    <div class="panel-heading">
      <h1>Checkout</h1>
      <p>Please enter you details to confirm your purchase</p>
    </div>
    <div class="panel-body">
      <form class="" action="{{route('customers.purchase')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="product_name">Product Name</label>
          <input type="text" name="product_name" class="form-control" value="{{$product->name}}">
        </div>
        <div class="form-group">
          <label for="product_id">Product Number</label>
          <input type="text" name="product_id" class="form-control" value="{{$product->id}}">
        </div>
        <div class="form-group">
          <label for="user_name">Enter your name</label>
          <input type="text" name="user_name" class="form-control" value="{{Auth::guard('customer')->user()->name}}">
        </div>
        <div class="form-group">
          <label for="user_email">Enter an email</label>
          <input type="email" name="user_email" class="form-control" value="{{Auth::guard('customer')->user()->email}}">
        </div>
        <div class="form-group">
          <label for="payment">Select a payment method</label>
          <select class="form-control" name="payment" id="payment">
            <option value="">Card</option>
            <option value="">Invoice</option>
          </select>
        </div>

        <div class="form-group">
          <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>

@endsection
