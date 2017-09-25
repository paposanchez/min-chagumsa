<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use App\Models\Order;
use App\Models\OrderCar;
use App\Models\Post;
use App\Models\Code;
use App\Models\Board;
use App\Models\File;
use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Reservation;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class TestController extends Controller {

    public function index(Request $request, $page = 1) {
        $users = Role::find(2)->users->pluck('name', 'id');
        $garages = Role::find(4)->users->pluck('name', 'id');

        return view('admin.test-order.index', compact('users', 'garages'));
    }

    public function createOrder(Request $request) {

        try{
            $user_id = $request->get('user_id');
            $garage_id = $request->get('garage_id');
            $car_number = $request->get('car_number');

            $user = User::find($user_id);
            $item = Item::find(1);
            $purchase = new Purchase();
            $purchase->amount = $item->price;
            $purchase->type = 11;
            $purchase->status_cd = 103;
            $purchase->save();

            $order = new Order();
            $order->car_number = $car_number;
            $order->garage_id = $garage_id;
            $order->item_id = $item->id;
            $order->purchase_id = $purchase->id;
            $order->orderer_id = $user_id;
            $order->orderer_name = $user->name;
            $order->orderer_mobile = $user->mobile;
            $order->open_cd = 1327;
            $order->status_cd = 103;
            $order->flooding_state_cd = 0;
            $order->accident_state_cd = 0;
            $order->save();


            $order_car = new OrderCar();
            $order_car->orders_id = $order->id;
            $order_car->brands_id = 1;
            $order_car->models_id = 329;
            $order_car->details_id = 211;
            $order_car->grades_id = 145;
            $order_car->save();

            $reservation = new Reservation();
            $reservation->orders_id = $order->id;
            $reservation->garage_id = $garage_id;
            $reservation->reservation_at = Carbon::now();
            $reservation->created_id = $user_id;
            $reservation->save();



            return response()->json('success');

        }catch (\Exception $ex){
            return response()->json('error');
        }

    }



}
