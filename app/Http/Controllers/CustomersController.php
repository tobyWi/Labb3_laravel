<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Session;

class CustomersController extends Controller
{
  public function showAll()
  {
    $products = Product::all();
    $categories = Category::all();

    return view('customers.products.index')->with('products', $products)->with('categories', $categories);
  }

  public function checkout()
  {
    # code...
  }

  public function filter(Category $category)
  {
    // SQL Query here……
    $cat = $category->name;

    $products = Product::where('category_id', $category->id)->get();
    $categories = Category::all();

    return view('customers.products.filter')->with('products', $products)->with('categories', $categories)->with('cat', $cat);
  }
}
