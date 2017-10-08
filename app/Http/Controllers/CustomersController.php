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
}
