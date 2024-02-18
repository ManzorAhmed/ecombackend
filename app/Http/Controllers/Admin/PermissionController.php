<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.permissions.index');
    }
    public function getPermissions(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'created_at',
            3 => 'action'
        );

        $totalData = Permission::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $users = Permission::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Permission::count();
        } else {
            $search = $request->input('search.value');
            $users = Permission::where('name', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Permission::where('name', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->count();
        }


        $data = array();

        if ($users) {
            foreach ($users as $r) {
                $permission_url = route('permissions.edit', $r->id);
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
                                    <a title="Edit Permission" class="btn btn-sm btn-primary"
                                       href="' . $permission_url . '">
                                       <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm" onclick="event.preventDefault();del(' . $r->id . ');" title="Delete Permission" href="javascript:void(0)">
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
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
        ]);

        try {
            DB::beginTransaction();

            $name = $request->input('name');

            // Generate slug based on naming conventions
            $slug = Str::slug($name, '-');
            $slug = "permission-$slug"; // Add 'permission-' prefix for permission slugs

            $permission = Permission::create([
                'name' => $name,
                'slug' => $slug,

            ]);
            DB::commit();
            Session::flash('success_message', 'Permission successfully saved!');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error_message', 'Error saving permission.');
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }




    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('admin.permissions.edit', compact('permission'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name,' . $id,
        ]);

        try {
            DB::beginTransaction();

            $name = $request->input('name');

            // Generate slugs based on naming conventions
            $slug = Str::slug($name, '-');
            $slug = "permission-$slug"; // Add 'permission-' prefix for permission slugs

            // Find the permission by ID and update its attributes
            $permission = Permission::find($id);
            $permission->name = $name;
            $permission->slug = $slug;
            $permission->save();

            DB::commit();

            Session::flash('success_message', 'Permission successfully updated!');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error_message', 'Error updating permission.');
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function permissionDetail(Request $request)
    {
        $permission = Permission::findOrFail($request->input('id'));

        // Retrieve roles that have the given permission
        $rolesWithPermission = Role::join("roles_permissions", "roles_permissions.role_id", "=", "roles.id")
            ->where("roles_permissions.permission_id", $permission->id) // Compare with permission ID
            ->get();

        return view('admin.permissions.single', compact('permission', 'rolesWithPermission'));
    }
}
