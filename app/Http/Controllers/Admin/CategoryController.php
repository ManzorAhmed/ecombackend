<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.categories.index', ['title' => 'Registered Category', 'category' => $category]);
    }

    public function create()
    {
        return view('admin.categories.create', ['title' => 'create Category']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name|max:15',
        ]);
        $category = new Category();
        $category->name = $request->input('name');
        if ($request->active){
            $category->active = 1;
        }else{
            $category->active = 0;
        }
        $category->save();

        Session::flash('success_message', 'Great! Category has been added to List successfully!');
        return redirect()->back();
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $category = Category::all();
        return view('admin.categories.edit',['title' =>'Edit category','category'=>$category]);

    }
}
