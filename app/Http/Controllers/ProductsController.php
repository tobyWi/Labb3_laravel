<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
class ProductsController extends Controller
{
  public function showAll()
  {
    $products = Product::all();
    return view('admin.products.index')->with('products', $products);
  }

  public function create()
  {
    return view('admin.products.create');
  }

}
