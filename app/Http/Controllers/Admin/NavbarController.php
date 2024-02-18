<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Navbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NavbarController extends Controller


{
    public function index()
    {

        $navbars = Navbar::all(); // Retrieve all navbar records from the database

        return view('admin.navbars.index', ['title' => 'Navbar List', 'navbars' => $navbars]);
    }

    public function create()
    {
        $navbars = Navbar::all();
        $parentNavbar = Navbar::whereNotNull('parent_id')->first(); // Fetch the parent navbar with a valid link

        return view('admin.navbars.create', ['navbars' => $navbars, 'parentLink' => $parentNavbar ? $parentNavbar->link : null, // Pass the parent link to the view
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:navbars,name|max:255',
            'link' => '',
            'parent_id' => 'nullable|exists:navbars,id',
            'parent_url' => '',
            'status' => '',
        ]);

        $navbar = new Navbar();
        $navbar->name = $request->input('name');
        $navbar->link = $request->input('link');
        $navbar->parent_url = $request->input('parent_url', ''); // Set default value if parent_url is not provided

        // Check if a parent menu is selected
        if ($request->filled('parent_id')) {
            $parentNavbar = Navbar::find($request->input('parent_id'));

            if ($parentNavbar) {
                $navbar->parent_id = $parentNavbar->id;
                $parentNavbar->link = $request->input('parent_url');
                $parentNavbar->save();
            } else {
                return redirect()->back()->withErrors(['parent_id' => 'The selected parent id is invalid.']);
            }
        } else {
            $navbar->parent_id = null; // Set parent_id to null when there is no parent
        }
        if ($request->active) {
            $navbar->active = 1;
        } else {
            $navbar->active = 0;
        }
        $navbar->save();

        Session::flash('success_message', 'Great! Menu has been added to the Navbar successfully!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $navbar = Navbar::findOrFail($id);

        // Check if the menu item has child menu items
        if ($navbar->childMenus()->count() > 0) {
            // Set the parent_id of child menu items to null
            $navbar->childMenus()->update(['parent_id' => null]);
        }

        $navbar->delete();

        Session::flash('success_message', 'Menu has been deleted successfully!');
        return redirect()->back();
    }

    public function edit($id)
    {
        $navbar = Navbar::findOrFail($id);
        $navbars = Navbar::all(); // Retrieve all the navbars for the dropdown menu

        return view('admin.navbars.edit', ['title' => 'Update Menu Details', 'navbar' => $navbar, 'navbars' => $navbars]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:navbars,name,' . $id . '|max:255',
            'link' => '',
            'parent_id' => 'nullable|exists:navbars,id',
            'parent_url' => '',
            'status' => '',
        ]);

        $navbar = Navbar::findOrFail($id);
        $navbar->name = $request->input('name');
        $navbar->link = $request->input('link');
        $navbar->parent_url = $request->input('parent_url', ''); // Set default value if parent_url is not provided

        // Check if a parent menu is selected
        if ($request->filled('parent_id')) {
            $parentNavbar = Navbar::find($request->input('parent_id'));

            if ($parentNavbar) {
                $navbar->parent_id = $parentNavbar->id;
                $parentNavbar->link = $request->input('parent_url');
                $parentNavbar->save();
            } else {
                return redirect()->back()->withErrors(['parent_id' => 'The selected parent id is invalid.']);
            }
        } else {
            $navbar->parent_id = null; // Set parent_id to null when there is no parent
        }

        $navbar->save();

        Session::flash('success_message', 'Great! Menu has been Updated to the Navbar successfully!');
        return redirect()->back();
    }


    public function deleteSelectedNavbar(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'navbar' => 'required',

        ]);
        foreach ($input['navbar'] as $index => $id) {

            $user = $this->obj_user->findOrFail($id);
            $user->delete();

        }
        Session::flash('success_message', 'Nav Menu successfully deleted!');
        return redirect()->back();

    }
    public function navbarDetail(Request $request)
    {
        $navbar = Navbar::findOrFail($request->input('id'));
        return view('admin.navbars.single', ['title' => 'Navbar Detail', 'navbar' => $navbar]);
    }
}
