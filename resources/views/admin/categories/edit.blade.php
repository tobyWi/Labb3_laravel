@extends ('layouts.app')

@section ('content')

  <div class="panel panel-default">
    <div class="panel-heading">
      Edit Category
    </div>
    <div class="panel-body">
      <form class="" action="{{route('category.update', ['category' => $category->id])}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" value="{{$category->name}}" class="form-control">
        </div>
        <div class="form-group">
          <button class="btn btn-success">Update Category</button>
        </div>
      </form>
    </div>
  </div>

@endsection
