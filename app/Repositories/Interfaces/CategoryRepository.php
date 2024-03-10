<?php

namespace App\Repositories\Interfaces;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all($title)
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('title', 'categories'));
    }
    public function create($title)
    {
        return view('admin.categories.create', compact('title'));
    }

}
