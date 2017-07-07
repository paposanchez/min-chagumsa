<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller {
    
    public function index() {
        return view('web.order.index');
    }
    
    public function verification(Request $request) {
        
    }
    public function reservation(Request $request) {
        return view('web.order.reservation');
    }
    
    public function factory() {
        
    }
    public function purchase(Request $request) {
        return view('web.order.purchase');
    }
    
    public function complete(Request $request) {
        return view('web.order.complete');
    }
    
    
    public function process() {
        
    }

}

