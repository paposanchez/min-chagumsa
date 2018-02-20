<?php

namespace App\Http\Controllers\Admin;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use DB;

class PurchaseController extends Controller {

        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function index(Request $request) {
                $entrys = Purchase::orderBy('id', 'DESC')->paginate(25);

                return view('admin.purchase.index', compact('entrys'));
        }

        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create() {
                $permissions = Permission::get();
                return view('admin.permission.create', compact('permissions'));
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
                                $permission->attachPermission($value);
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
                $permissions = Permission::get();

                $rolePermissions = DB::table("permission_role")
                ->where("permission_role.role_id", $id)
                ->pluck('permission_role.permission_id', 'permission_role.permission_id');

                return view('admin.permission.edit', compact('permission', 'permissions', 'rolePermissions'));
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
                        //            'name' => 'required|min:3|unique:permissions,name',
                        'display_name' => 'required',
                        'role' => 'required',
                ], [], [
                        //            'name' => trans('admin/permission.name'),
                        'display_name' => trans('admin/permission.display_name'),
                        'description' => trans('admin/permission.description'),
                        'role' => trans('admin/permission.role')
                ]);

                $permission = Permission::find($id);
                $permission->display_name = $request->input('display_name');
                $permission->description = $request->input('description');
                $permission->save();


                if ($request->input('role')) {
                        DB::table("permission_role")->where("permission_role.role_id", $id)
                        ->delete();

                        foreach ($request->input('permission') as $key => $value) {
                                $permission->attachPermission($value);
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
