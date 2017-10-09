<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;
use App\Order;
use Session;

class CustomersController extends Controller
{
  public function showAll()
  {
    $products = Product::all();
    $categories = Category::all();

    return view('customers.products.index')->with('products', $products)->with('categories', $categories);
  }

  public function checkout($id)
  {
    $product = Product::findOrFail($id);
    $users = User::all(); // Gets collection, I need logged in user

    return view('customers.checkout.index')->with('product', $product)->with('users', $users);
  }

  public function purchase()
  {
    // Validate & Get all stuff ready for sending to database
    $this->validate(request(), [
      'product_name' => 'required',
      'product_id' => 'required',
      'user_name' => 'required|string|max:255',
      'user_email' => 'required|string|email|max:255|',
    ]);

    $order = Order::create([
      'user_name' => request()->user_name,
      'user_email' => request()->user_email,
      'product_name' => request()->product_name,
      'product_id' => request()->product_id
    ]);

    // Onscreen message
    Session::flash('success', 'Purchase has been made');
    // Show purchase complete page
    return view('customers.checkout.complete');
  }

  public function filter(Category $category)
  {
    $categories = Category::all();

    return view('customers.products.filter')->with('categories', $categories)->with('category', $category);
  }
}
