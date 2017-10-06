@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
      Edit user
    </div>
    <div class="panel-body">
      <form class="" action="{{route('user.update', ['user' => $user->id])}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" value="{{$user->name}}">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input class="form-control" type="email" name="email" value="{{$user->email}}">
        </div>
        <div class="form-group">
          <label for="admin">Make Admin</label>
          <input type="checkbox" name="admin" value="1">
        </div>
        <div class="form-group">
          <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>

@endsection
