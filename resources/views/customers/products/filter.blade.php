@extends ('layouts.app')

@section ('content')
  <h1>Products with category: {{$category->name}}
  </h1>
    <ul class="list-group text-center">
      <a href="{{route('customers.show')}}">
        <li style="display:inline-block; padding: 0 5px;"><strong>SHOW ALL</strong></li>
      </a>
      @foreach ($categories as $categoryFilter)
        <a href="{{route('products.filter', ['category' => $categoryFilter->id])}}">
          <li style="display:inline-block; padding: 0 5px;">
            {{$categoryFilter->name}}
          </li>
        </a>
      @endforeach
    </ul>
  <div class="">
    @foreach ($category->products as $product)
      <div class="col-md-4">
        <ul class="list-group">
          <li class="list-group-item">
            <a href="#">
              <img class="img-rounded" style="width: 100px; height: 70px;" src="{{URL($product->image_url)}}">
            </a>
          </li>
          <li class="list-group-item"><strong>Name:</strong> {{$product->name}}</li>
          <li class="list-group-item"><strong>Description:</strong><br /> {{$product->description}}</li>
          <li class="list-group-item"><strong>Category:</strong> {{$product->category->name}}</li>
          <li class="list-group-item"><strong>Price:</strong> {{$product->price}}</li>
          <li class="list-group-item"><strong>Stock:</strong> {{$product->stock}}</li>
          @if(Auth::user())
            <li class="list-group-item">
              <a href="{{route('customers.checkout', ['id' => $product->id])}}" class="btn btn-danger">
                Buy
              </a>
            </li>
          @endif
        </ul>
      </div>
    @endforeach
  </div>
@endsection
