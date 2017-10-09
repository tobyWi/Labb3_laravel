<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
class UsersController extends Controller
{
  public function showAll()
  {
    $users = User::all();
    return view('admin.users.index')->with('users', $users);
  }

  public function create()
  {
    return view('admin.users.create');
  }

  public function store()
  {
    $this->validate(request(), [
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|',
      'password' => 'required|string|min:6|'
    ]);

    $user = User::create([
      'name' => request()->name,
      'email' => request()->email,
      'password' => request()->password,
      'is_admin' => request()->admin
    ]);

    Session::flash('success', 'User was created');

    return redirect()->back();
  }

  public function edit(User $user)
  {
    return view('admin.users.edit')->with('user', $user);
  }

  public function update($id)
  {
    $this->validate(request(), [
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|'
    ]);

    $user = User::findOrFail($id);
    $user->name = request()->name;
    $user->email = request()->email;
    $user->is_admin = request()->admin;
    $user->save();

    Session::flash('success', 'User updated');

    return redirect()->route('users.show');
  }

  public function delete($id)
  {
    $user = User::findOrFail($id);
    $user->delete();

    Session::flash('success', 'User deleted!');

    return redirect()->route('users.show');
  }
}
