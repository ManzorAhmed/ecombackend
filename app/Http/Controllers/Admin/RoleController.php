<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    function __construct()
//    {
//        $this->middleware('permission:role-list', ['only' => ['index', 'store']]);
//        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
//        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
//        $this->middleware('permission:role-delete', ['only' => ['destroy', 'DeleteSelectedRoles']]);
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.roles.index');
    }

    public function getRoles(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'created_at',
            3 => 'action'
        );

        $totalData = Role::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $users = Role::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Role::count();
        } else {
            $search = $request->input('search.value');
            $users = Role::where('name', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Role::where('name', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->count();
        }


        $data = array();

        if ($users) {
            foreach ($users as $r) {
                $edit_url = route('roles.edit', $r->id);
                $nestedData['id'] = '
                                <td>
                                <div class="checkbox checkbox-success m-0">
                                        <input id="checkbox3" type="checkbox" name="roles[]" value="' . $r->id . '">
                                        <label for="checkbox3"></label>
                                    </div>
                                </td>
                            ';
                $nestedData['name'] = $r->name;
                $nestedData['created_at'] = date('d-m-Y', strtotime($r->created_at));
                $nestedData['action'] = '
                                <div>
                                <td>
                                    <a class="btn btn-info btn-sm" onclick="event.preventDefault();viewInfo(' . $r->id . ');" title="View User" href="javascript:void(0)">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a title="Edit Role" class="btn btn-sm btn-primary"
                                       href="' . $edit_url . '">
                                       <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm" onclick="event.preventDefault();del(' . $r->id . ');" title="Delete Role" href="javascript:void(0)">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                </div>
                            ';
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        echo json_encode($json_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('admin.roles.create', compact('permissions'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
        ]);

        try {
            DB::beginTransaction();

            $name = $request->input('name');

            // Generate slug based on naming conventions
            $slug = Str::slug($name, '-');
            $slug = "role-$slug"; // Add 'role-' prefix for role slugs

            // Create the role
            $role = Role::create([
                'name' => $name,
                'slug' => $slug,
            ]);

            // Attach permissions to the role
            $permissions = $request->input('permissions', []);
            $role->permissions()->sync($permissions);

            DB::commit();

            Session::flash('success_message', 'Role and permissions successfully saved!');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error_message', 'Error saving role and permissions.');
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("roles_permissions", "roles_permissions.role_id", "=", "roles.id")
            ->where("roles_permissions.permission_id") // Compare with permission ID
            ->get();
        return view('admin.roles.single', compact('role', 'rolePermissions'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get(); // Fetch all available permissions

        // Fetch role's existing permission IDs
        $rolePermissions = DB::table("roles_permissions")
            ->where("role_id", $id)
            ->pluck('permission_id')
            ->all();
        return view('admin.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name,' . $id,
        ]);

        try {
            DB::beginTransaction();

            $name = $request->input('name');

            // Generate slug based on naming conventions
            $slug = Str::slug($name, '-');
            $slug = "role-$slug"; // Add 'role-' prefix for role slugs

            // Find the role by ID and update its attributes
            $role = Role::find($id);
            $role->name = $name;
            $role->slug = $slug;
            $role->save();

            // Sync permissions to the role
            $permissions = $request->input('permissions', []);
            $role->permissions()->sync($permissions);

            DB::commit();

            Session::flash('success_message', 'Role and permissions successfully updated!');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error_message', 'Error updating role and permissions.');
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }

    public function DeleteSelectedRoles(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'roles' => 'required',

        ]);
        foreach ($input['roles'] as $index => $id) {

            $user = Role::findOrFail($id);
            $user->delete();
        }
        Session::flash('success_message', 'Roles successfully deleted!');
        return redirect()->back();
    }

    public function roleDetail(Request $request)
    {
        $roleId = $request->input('id');
        $role = Role::findOrFail($roleId);
        $rolePermissions = Permission::join("roles_permissions", "roles_permissions.permission_id", "=", "permissions.id")
            ->where("roles_permissions.role_id", $roleId)
            ->get();
        return view('admin.roles.single', compact('role', 'rolePermissions'));
    }

}
