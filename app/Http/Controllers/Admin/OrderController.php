<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Code;


class OrderController extends Controller
{
    public function index(){
        $yn_list = Code::getCodesByGroup('yn');
        $shown_role_list = Code::getCodesByGroup('post_shown_role');
        $search_fields = Code::getCodesByGroup('post_search_field');
//        dd($order);

        $where = Order::orderBy('id', 'DESC');
        $entrys = $where->paginate(25);

        return view('admin.order.index', compact('search_fields', 'entrys'));
    }

    public function view($id){
        $order = Order::findOrFail($id);

        return view('admin.order.detail', compact('order'));
    }

    public function edit($id){
        $order = Order::findOrFail($id);
        $select_color = Code::getCodesByGroup('diagnosis_info_color');
        $select_attachment_status = Code::getCodesByGroup('attachment_status');

        return view('admin.order.edit', compact('order', 'select_color', 'select_attachment_status'));
    }

    public function update(Request $request, $id){
        dd($request);

    }



}
