@extends ('layouts.app')

@section ('content')
  <h1>All Products</h1>
    <ul class="list-group text-center">
      @foreach ($categories as $category)
        <a href="">
          <li style="display:inline-block; padding: 0 5px;">
            {{$category->name}}
          </li>
        </a>
      @endforeach
    </ul>
  <div class="">
    @foreach ($products as $product)
      <div class="col-md-4">
        <ul class="list-group">
          <li class="list-group-item">
            <a href="#">
              <img class="img-rounded" style="width: 100px; height: 70px;" src="{{URL($product->image_url)}}">
            </a>
          </li>
          <li class="list-group-item"><strong>Name:</strong> {{$product->name}}</li>
          <li class="list-group-item"><strong>Description:</strong><br /> {{$product->description}}</li>
          <li class="list-group-item"><strong>Category:</strong> {{$product->category_id}}</li> <!-- Needs category name via db relation -->
          <li class="list-group-item"><strong>Price:</strong> {{$product->price}}</li>
          <li class="list-group-item"><strong>Stock:</strong> {{$product->stock}}</li>
          <li class="list-group-item">
            <form class="" action="" method="post">
              <input class="btn btn-danger" type="submit" name="submit" value="Add to Cart">
            </form>
          </li>
        </ul>
      </div>
    @endforeach
  </div>
@endsection
