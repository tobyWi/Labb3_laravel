@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <h1>Edit a product</h1>
    </div>
    <div class="panel-body">
      <form class="" action="{{route('product.update', ['product' => $product->id])}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
          <label for="name">Product Name</label>
          <p>{{$product->name}}</p>
        </div>
        <div class="form-group">
          <label for="stock">Stock</label>
          <input class="form-control" type="number" name="stock" value="{{$product->stock}}">
        </div>
        <div class="form-group">
          <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>

@endsection
