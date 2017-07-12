<?php

namespace App\Http\Controllers\Web\Mypage;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller {

    public function index() {
        $user_id = Auth::user()->id;
        $my_orders = Order::where('orderer_id', $user_id)->get();

        return view('web.mypage.order.index', compact('my_orders'));
    }

    public function show($id) {
        $order = Order::findOrFail($id);
        $item = Item::findOrFail($order->item_id);
        return view('web.mypage.order.show', compact('order', 'item'));
    }

    public function reservation(){
        return view('web.mypage.order.show');
    }
}
