<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Warranty;
use DB;

class WarrantyController extends Controller {

        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function index(Request $request) {
                $entrys = Warranty::orderBy('id', 'DESC')->paginate(5);

                return view('admin.warranty.index', compact('entrys'));
        }

        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create() {
                $warrantys = Warranty::get();
                return view('admin.warranty.create', compact('warrantys'));
        }

        /**
        * Store a newly created resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */
        public function store(Request $request) {

                $this->validate($request, [
                        'name' => 'required|min:3|unique:warrantys,name',
                        'display_name' => 'required',
                        'role' => 'required',
                ], [], [
                        'name' => trans('admin/warranty.name'),
                        'display_name' => trans('admin/warranty.display_name'),
                        'description' => trans('admin/warranty.description'),
                        'role' => trans('admin/warranty.role'),
                ]);

                $warranty = new Warranty();
                $warranty->name = $request->input('name');
                $warranty->display_name = $request->input('display_name');
                $warranty->description = $request->input('description');
                $warranty->save();

                if ($request->input('role')) {
                        foreach ($request->input('role') as $value) {
                                $warranty->attachWarranty($value);
                        }
                }

                return redirect()->route('warranty.edit', [$warranty->id])
                ->with('success', trans("admin/warranty.created"));
        }

        /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function edit($id) {

                $warranty = Warranty::find($id);
                $warrantys = Warranty::get();

                $roleWarrantys = DB::table("warranty_role")
                ->where("warranty_role.role_id", $id)
                ->pluck('warranty_role.warranty_id', 'warranty_role.warranty_id');

                return view('admin.warranty.edit', compact('warranty', 'warrantys', 'roleWarrantys'));
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
                        //            'name' => 'required|min:3|unique:warrantys,name',
                        'display_name' => 'required',
                        'role' => 'required',
                ], [], [
                        //            'name' => trans('admin/warranty.name'),
                        'display_name' => trans('admin/warranty.display_name'),
                        'description' => trans('admin/warranty.description'),
                        'role' => trans('admin/warranty.role')
                ]);

                $warranty = Warranty::find($id);
                $warranty->display_name = $request->input('display_name');
                $warranty->description = $request->input('description');
                $warranty->save();


                if ($request->input('role')) {
                        DB::table("warranty_role")->where("warranty_role.role_id", $id)
                        ->delete();

                        foreach ($request->input('warranty') as $key => $value) {
                                $warranty->attachWarranty($value);
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
