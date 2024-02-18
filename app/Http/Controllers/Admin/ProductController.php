<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', ['title' => 'Product List', 'products' => $products]);
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create',['title' => 'Product Create','categories' => $categories]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:products,name|max:255',
            'slug' => 'required|unique:products,slug',
            'description' => 'required|max:2500',
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->active = $request->has('active') ? 1 : 0;
        $product->save();

        // Attach categories to the product
        $categoryIds = $request->input('category_ids', []);
        $product->categories()->sync($categoryIds);

        // Eager load the categories to see them in the debug output
        $product->load('categories');
        Session::flash('success_message', 'Great! Product has been added to List successfully!');
        return redirect()->back();
    }

    public function edit($id)
    {
     $products = Product::findOrFail($id);
     $Categories = Category::all();

      return view('admin.products.edit', ['title' => 'Update Details', 'products' => $products, 'categories' => $Categories]);
    }

}
