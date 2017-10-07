@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <h1>Create a product</h1>
    </div>
    <div class="panel-body">
      <form class="" action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" value="">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="description" rows="8" cols="80"></textarea>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="categories">Select a category</label>
            <select class="form-control" name="category_id" id="categories">
              @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="price">Price</label>
            <input class="form-control" type="number" name="price">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="stock">Stock</label>
            <input class="form-control" type="number" name="stock">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control" value="">
          </div>
        </div>
        <div class="form-group">
          <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>

@endsection
