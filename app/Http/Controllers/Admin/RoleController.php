<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use DB;

class RoleController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $entrys = Role::orderBy('id', 'DESC')->paginate(5);

        return view('admin.role.index', compact('entrys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $permissions = Permission::get();
        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|alpha_num|min:3|unique:roles,name',
            'display_name' => 'required',
            'permission' => 'required',
                ], [], [
            'name' => trans('admin/role.name'),
            'display_name' => trans('admin/role.display_name'),
            'description' => trans('admin/role.description'),
            'permission' => trans('admin/role.permission'),
        ]);

        $role = new Role();
        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();

        if ($request->input('permission')) {
            foreach ($request->input('permission') as $key => $value) {
                $role->attachPermission($value);
            }
        }

        return redirect()->route('role.edit', [$role->id])
                        ->with('success', 'Role created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("permission_role")
                ->where("permission_role.role_id", $id)
                ->pluck('permission_role.permission_id', 'permission_role.permission_id');

        return view('admin.role.edit', compact('role', 'permissions', 'rolePermissions'));
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
            'permission' => 'required',
                ], [], [
            'name' => trans('admin/role.name'),
            'display_name' => trans('admin/role.display_name'),
            'description' => trans('admin/role.description'),
            'permission' => trans('admin/role.permission'),
        ]);

        $role = Role::find($id);
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();


        if ($request->input('permission')) {
            DB::table("permission_role")
                    ->where("permission_role.role_id", $id)
                    ->delete();

            foreach ($request->input('permission') as $key => $value) {
                $role->attachPermission($value);
            }
        }

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
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('role.index')
                        ->with('success', 'Role deleted successfully');
    }

}
