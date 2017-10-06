<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;
class CategoriesController extends Controller
{
  public function showAll()
  {
    $categories = Category::all();

    return view('admin.categories.index')->with('categories', $categories);
  }

  public function create()
  {
    return view('admin.categories.create');
  }

  public function store()
  {
    $this->validate(request(), [
      'name' => 'required|string'
    ]);

    $category = new Category;
    $category->name = request()->name;
    $category->save();

    Session::flash('success', 'Category was successfully created!');

    return redirect()->back();
  }

  public function delete($id)
  {
    $category = Category::findOrFail($id);
    $category->delete();

    Session::flash('success', 'You have deleted the category!');

    return redirect()->route('category.show');
  }

  public function edit(Category $category)
  {
    return view('admin.categories.edit')->with('category', $category);
  }

  public function update($id)
  {
    $this->validate(request(), [
      'name' => 'required|string|max:20'
    ]);
    $category = Category::findOrFail($id);
    $category->name = request()->name;
    $category->save();

    Session::flash('success', 'Category was updated');

    return redirect()->route('category.show');
  }
}
