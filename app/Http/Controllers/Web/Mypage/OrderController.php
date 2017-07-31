<?php

namespace App\Http\Controllers\Web\Mypage;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\GarageInfo;
use App\Models\Item;
use App\Models\Order;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class OrderController extends Controller {

    public function index() {
        $user_id = Auth::user()->id;
        $my_orders = Order::where('orderer_id', $user_id)->orderBy('status_cd', 'DESC')->get();

        return view('web.mypage.order.index', compact('my_orders'));
    }

    public function show($id) {

        $order = Order::findOrFail($id);
        $item = Item::findOrFail($order->item_id);
        $my_garage = GarageInfo::find($order->garage_id)->first();
        return view('web.mypage.order.show', compact('order', 'item', 'my_garage'));
    }

    public function editCar($order_id){
        $order = Order::where('id', $order_id)->first();
        $brands = Brand::select('id', 'name')->get();

        return view('web.mypage.order.edit_car', compact('order', 'brands'));
    }

    public function editGarage($order_id){
        $order = Order::where('id', $order_id)->first();
        $my_garage = GarageInfo::find($order->garage_id)->first();

//        $order->reservation->id
        $garages = GarageInfo::orderBy('area', 'ASC')->groupBy('area')->get();
        $search_fields = [
            '09' => '9시', '10' => '10시', '11' => '11시', '12' => '12시', '13' => '13시', '14' => '14시','15' => '15시','16' => '16시','17' => '17시'
        ];
        return view('web.mypage.order.edit_garage', compact('order', 'search_fields', 'garages', 'my_garage'));
    }

    public function update(Request $request, $order_id){
        $input = $request->all();
        $order = Order::findOrFail($order_id)->first();

        // 차량 정보 변경
        if(!empty($input['car_number'])){
            $validate = Validator::make($request->all(), [
                'brands_id' => 'required',
                'models_id' => 'required',
                'details_id' => 'required',
                'grades_id' => 'required',
                'car_number' => 'required'
            ]);

            if ($validate->fails())
            {
                return redirect()->back()->with('error', trans('web/mypage.modify_error'));
            }
            $car = Order::find($order_id)->car;
            $car->update($input);
            $order->update($input);
        }

        //입고 정보 변경
        if($request->get('reservation_date')){
            $validate = Validator::make($request->all(), [
                'reservation_date' => 'required',
                'sel_time' => 'required',
//                'name' => 'required',
//                'zipcode' => 'required',
//                'area' => 'required',
//                'section' => 'required'
            ]);

            if ($validate->fails())
            {
                return redirect()->back()->with('error', trans('web/mypage.modify_error'));
            }
            $date = new \DateTime($input['reservation_date'].' '.$input['sel_time'].':00:00');

            $reservation = $order->reservation;
            $reservation->reservation_at = $date->format('Y-m-d H:i:s');
            $reservation->save();

            if($request->get('address')){
                $my_garage = GarageInfo::find($order->garage_id)->first();
                $my_garage->area = $request->get('sel_area');
                $my_garage->section = $request->get('sel_section');
                $my_garage->address = $request->get('address');
                $my_garage->save();
            }


        }
        return redirect()
            ->route('mypage.order.show', $order->id)
            ->with('success', trans('web/mypage.modify_complete'));
    }

    public function cansel($order_id){
        $order = Order::find($order_id);
        $order->status_cd = 100;
        $order->save();

        //todo PG를 연동해야 함.

        return redirect()->route('mypage.order.index')
            ->with('success', trans('web/mypage.cansel_complete'));
    }

    public function reservation(){
        return view('web.mypage.order.show');
    }
}
