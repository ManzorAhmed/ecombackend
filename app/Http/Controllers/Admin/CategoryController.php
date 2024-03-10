<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        $title = 'Registered Category'; // Set the title
        $categories = $this->categoryRepository->all($title);
        return $categories;
        // return view('admin.categories.index', compact('title', 'categories'));
    }

    public function create()
    {
        $title = 'Create Category'; // Set the title
        return $this->categoryRepository->create($title);
    }

    public function store(CategoryStoreRequest $request)
    {
        $validatedData = $request->validated();
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
