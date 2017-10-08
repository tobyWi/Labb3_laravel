@extends ('layouts.app')

@section ('content')
  <h1>All Products</h1>
  <div class="panel panel-default">
    <table class="table table-hover">
      <thead>
        <th>Image</th>
        <th>Name</th>
        <th>Description</th>
        <th>Category</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Edit</th>
        <th>Delete</th>
      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr>
            <td>
              <a href="#">
                <img class="img-rounded" style="width: 100px; height: 70px;" src="{{URL($product->image_url)}}">
              </a>
            </td>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->category_id}}</td> <!-- Needs category name via db relation -->
            <td>{{$product->price}}</td>
            <td>{{$product->stock}}</td>
            <td>
              <a href="{{route('product.edit', ['product' => $product->id])}}" class="btn btn-xs btn-info">
                Edit Stock Amount
              </a>
            </td>
            <td>
              <a href="{{route('product.delete', ['id' => $product->id])}}" class="btn btn-xs btn-danger">
                Delete
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <table>

  </table>
@endsection
