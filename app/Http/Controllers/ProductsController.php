<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Session;
class ProductsController extends Controller
{
  public function showAll()
  {
    $products = Product::all();
    $categories = Category::all();

    return view('admin.products.index')->with('products', $products)->with('categories', $categories);
  }

  public function create()
  {
    return view('admin.products.create')->with('categories', Category::all());
  }

  public function store()
  {
    // Validate all fields
    $this->validate(request(), [
      'name' => 'required|max:20',
      'description' => 'required|max:60',
      'category_id' => 'required',
      'price' => 'required',
      'stock' => 'required',
      'image' => 'required',
    ]);

    // Prepare image for upload
    $image = request()->image;
    $new_name = time().$image->getClientOriginalName();
    $image->move('uploads/', $new_name);

    // Send data to database
    $product = Product::create([
      'category_id' => request()->category_id,
      'name' => request()->name,
      'description' => request()->description,
      'price' => request()->price,
      'stock' => request()->stock,
      'image_url' => 'uploads/' . $new_name
    ]);

    // Onscreen message
    Session::flash('success', 'Post was created');

    // Route back to the same page
    return redirect()->back();
  }

  public function edit(Product $product)
  {
    return view('admin.products.edit')->with('product', $product);
  }

  public function update($id)
  {
    $this->validate(request(), [
      'stock' => 'required'
    ]);

    $product = Product::findOrFail($id);
    $product->stock = request()->stock;
    $product->save();

    Session::flash('success', 'Stock amount was updated!');

    return redirect()->route('products.show');
  }

  public function delete($id)
  {
    $product = Product::findOrFail($id);
    $product->delete();

    Session::flash('success', 'Product deleted successfully');

    return redirect()->route('products.show');
  }

}
