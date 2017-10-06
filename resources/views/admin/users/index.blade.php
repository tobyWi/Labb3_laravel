@extends ('layouts.app')

@section ('content')
  <h1>Users</h1>
  <div class="panel panel-default">
    <table class="table table-hover">
      <thead>
        <th>User</th>
        <th>Admin</th>
        <th>Edit</th>
        <th>Delete</th>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{$user->name}}</td>
            <td>
              @if($user->is_admin == 1)
                Yes
              @else
                No
              @endif
            </td>
            <td>
              <a href="{{route('user.edit', ['user' => $user->id ])}}" class="btn btn-xs btn-info">
                Edit
              </a>
            </td>
            <td>
              <a href="{{route('user.delete', ['id' => $user->id])}}" class="btn btn-xs btn-danger">
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
