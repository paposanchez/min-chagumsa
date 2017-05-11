<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class OrderController extends Controller {
    
    public function index() {
        return view('web.order.index');
    }
    
    public function verification() {
        
    }
    public function reservation() {
        return view('web.order.reservation');
    }
    
    public function factory() {
        
    }
    public function purchase() {
        return view('web.order.purchase');
    }
    
    public function complete() {
        return view('web.order.complete');
    }
    
    
    public function process() {
        
    }

}

