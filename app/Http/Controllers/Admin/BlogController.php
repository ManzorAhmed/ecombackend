<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $obj_user;

    public function __construct(Blog $userObject)
    {
        $this->middleware('auth:web');
        $this->obj_user = $userObject;
    }

    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', ['title' => 'Registered Article List', 'blog' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view('admin.blogs.create',['title' => 'Blog Create']);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'paragraphs.*.heading' => 'nullable|string|max:250',
            'paragraphs.*.content' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4056', // Assuming max file size is 2MB
        ]);

        $blog = new Blog();
        $blog->title = $validatedData['title'];
        $blog->save();

        // Store paragraphs
        if ($request->has('paragraphs')) {
            foreach ($validatedData['paragraphs'] as $paragraph) {
                $blog->paragraphs()->create([
                    'heading' => $paragraph['heading'],
                    'content' => $paragraph['content'],
                ]);
            }
        }
        // Store images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/assets/uploads/blog'); // Adjusted image path
                $blog->images()->create(['path' => $path]);
            }
        }
        Session::flash('success_message', 'Great! Article has been Published to List successfully!');
        return redirect()->back();
    }

}
