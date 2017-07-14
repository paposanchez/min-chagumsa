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
        $my_orders = Order::where('orderer_id', $user_id)->get();

        return view('web.mypage.order.index', compact('my_orders'));
    }

    public function show($id) {

        $order = Order::findOrFail($id);
        $item = Item::findOrFail($order->item_id);
        return view('web.mypage.order.show', compact('order', 'item'));
    }

    public function editCar($order_id){
        $order = Order::where('id', $order_id)->first();
        $brands = Brand::select('id', 'name')->get();

        return view('web.mypage.order.edit_car', compact('order', 'brands'));
    }

    public function editGarage($order_id){
        $order = Order::where('id', $order_id)->first();
        //todo 왜 안뽑아지는지 모르겠음...reservation
        $search_fields = [
            '09' => '9시', '10' => '10시', '11' => '11시', '12' => '12시', '13' => '13시', '14' => '14시','15' => '15시','16' => '16시','17' => '17시'
        ];
        return view('web.mypage.order.edit_garage', compact('order', 'search_fields'));
    }

    public function update(Request $request, $order_id){
        $input = $request->all();
        $order = Order::findOrFail($order_id)->first();

        // 차량 정보 변경
        if(!empty($input['car_number'])){
            $validate = Validator::make($request->all(), [
                'brands_id' => 'required',
                'models_id' => 'required',
                'details_' => 'required',
                'grades_id' => 'required',
                'car_number' => 'required'
            ]);

            if ($validate->fails())
            {
                return redirect()->back()->with('error', '정보가 변경되지 않았습니다.');
            }
            $car = Order::find($order_id)->car;
            $car->update($input);
            $order->update($input);
        }

//        dd($order_id);
//        if(!empty($input['reservaton_date'])){
//        dd(Carbon::parse($input['reservaton_date'].' '.$input['sel_time'])->format('Y-m-d H'));
//        dd($input['reservaton_date'].' '.$input['sel_time']);

        if( $order->reservation->reservation_at != $input['reservaton_date']){
            $validate = Validator::make($request->all(), [
                'reservaton_date' => 'required',
                'sel_time' => 'required',
//                'name' => 'required',
//                'zipcode' => 'required',
//                'area' => 'required',
//                'section' => 'required'
            ]);

            if ($validate->fails())
            {
                return redirect()->back()->with('error', '정보가 변경되지 않았습니다.');
            }


            $reservation = $order->reservation;
            $reservation->reservation_at = $input['reservaton_date'].' '.$input['sel_time'];
            $reservation->save();

//            dd(Carbon::parse($order->reservation->reservation_at)->format('Y-m-d H'));
//            $garage_info = GarageInfo::where()->get();
        }







        return redirect()
            ->route('mypage.order.show', $order->id)
            ->with('success', '변경사항이 저장되었습니다.');
    }

    public function reservation(){
        return view('web.mypage.order.show');
    }
}
