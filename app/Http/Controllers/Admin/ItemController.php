<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Code;



class ItemController extends Controller
{
    // public function index(){
    //     $yn_list = Code::getCodesByGroup('yn');
    //     $shown_role_list = Code::getCodesByGroup('post_shown_role');
        // $search_fields = Code::getCodesByGroup('post_search_field');

    //     $where = Settlement::orderBy('id', 'DESC');
    //     $entrys = $where->paginate(25);

    //     return view('admin.calculation.index', compact('search_fields', 'entrys'));
    // }

    public function index(){
		// $search_fields = Code::getCodesByGroup('post_search_field');	    
	    $where = Item::orderBy('id', 'DESC');
	    $entrys = $where->paginate(25);
	    
    	return view('admin.item.index', compact('entrys'));
    	// return view('admin.item.index');
    }
}