<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use DB;

class PermissionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $entrys = Permission::orderBy('id', 'DESC')->paginate(5);

        return view('admin.permission.index', compact('entrys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $roles = Role::get();
        return view('admin.permission.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required|min:3|unique:permissions,name',
            'display_name' => 'required',
            'role' => 'required',
                ], [], [
            'name' => trans('admin/permission.name'),
            'display_name' => trans('admin/permission.display_name'),
            'description' => trans('admin/permission.description'),
            'role' => trans('admin/permission.role'),
        ]);

        $permission = new Permission();
        $permission->name = $request->input('name');
        $permission->display_name = $request->input('display_name');
        $permission->description = $request->input('description');
        $permission->save();

        if ($request->input('role')) {
            foreach ($request->input('role') as $value) {
                $role = Role::find($value);
                $role->attachPermission($permission);
            }
        }

        return redirect()->route('permission.edit', [$permission->id])
                        ->with('success', trans("admin/permission.created"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $permission = Permission::find($id);
        $roles = Role::get();
        $permissions = Permission::get();

        $rolePermissions = DB::table("permission_role")
                ->where("permission_role.role_id", $id)
                ->pluck('permission_role.permission_id', 'permission_role.permission_id');

        return view('admin.permission.edit', compact('permission', 'roles', 'rolePermissions', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'display_name' => 'required',
            'description' => 'required'
                ], [], [
            'display_name' => trans('admin/permission.display_name'),
            'description' => trans('admin/permission.description'),

        ]);

        $permission = Permission::find($id);
        $permission->display_name = $request->input('display_name');
        $permission->description = $request->input('description');
        $permission->save();


//        if ($request->input('role')) {
//            DB::table("permission_role")->where("permission_role.role_id", $id)
//                    ->delete();
//
//            foreach ($request->input('permission') as $key => $value) {
//                $permission->attachPermission($value);
//            }
//        }
        return redirect()->back()
                        ->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        DB::table("permissions")->where('id', $id)->delete();
        return redirect()->route('permission.index')
                        ->with('success', 'Role deleted successfully');
    }

}
