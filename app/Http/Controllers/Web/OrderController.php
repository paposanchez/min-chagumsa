<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Code;
use App\Models\Detail;
use App\Models\Grade;
use App\Models\Item;
use App\Models\Models;
use App\Models\Order;
use App\Models\Purchase;
use App\Models\Reservation;
use App\Models\User;
use App\Models\UserExtra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller {
    
    public function index(Request $request) {
        $brands = Brand::select('id', 'name')->get();
        $exterior_option = Code::where('group', 'car_option_exterior')->get();
        $interior_option = Code::where('group', 'car_option_interior')->get();
        $safety_option = Code::where('group', 'car_option_safety')->get();
        $facilities_option = Code::where('group', 'car_option_facilities')->get();
        $multimedia_option = Code::where('group', 'car_option_multimedia')->get();

        return view('web.order.index', compact('brands', 'exterior_option', 'interior_option', 'safety_option', 'facilities_option', 'multimedia_option'));
    }

    public function reservation(Request $request) {
        $this->validate($request, [
//            'name' => 'required',
//            'mobile' => 'required',
//            'sel_brand' => 'required',
//            'sel_model' => 'required',
//            'sel_detail' => 'required'

//            'exterior_ck' => 'required',
//            'interior_ck' => 'required',
//            'safety_ck' => 'required',
//            'facilites_ck' => 'required',
//            'multimedia_ck' => 'required'
        ]);



        $search_fields = [
            '09' => '9시', '10' => '10시', '11' => '11시', '12' => '12시', '13' => '13시', '14' => '14시','15' => '15시','16' => '16시','17' => '17시'
        ];

        return view('web.order.reservation', compact('search_fields', 'garages', 'request'));
    }

    public function purchase(Request $request) {
        $input = $request->all();
        // todo option 들을 order_feature에 저장해야한다


        //todo 차량 옵션테이블은 나중에 다시 넣어야함

        $datekey = substr(str_replace("-","",$request->reservaton_date), -6);
        // todo 임시로 5 입력
        $garage_id = 5;
        // todo 임시로 아이템 1로 선택. 추후 주소로 정비소를 검색 후 아이디 검색
        $item_id = 1;
        // todo 임시로 구매테이블 1로 선택
        $purchase_id = 1;
//        $orderer_id = User::where('name', $request->get('orderer_name'))->first()->id;

//        $car = Car::create($input);
        $cars = Car::findOrFail(28);


//        $order = Order::updateOrCreate(
//            [
//                'datekey' => $datekey,
//                'car_number' => $request->get('car_number'),
//                'cars_id' => $car->id,
//                'garage_id' => $garage_id,
//                'item_id' => $item_id,
//                'purchase_id' => $purchase_id,
//                'orderer_id' => $orderer_id,
//                'orderer_name' => $request->get('orderer_name'),
//                'orderer_mobile' => $request->get('orderer_mobile'),
//                'registration_file' => 0,
//                'open_cd' => 0,
//                'status_cd' => 102
//            ]);
        $order = Order::where('id', 18)->first();

        $items = Item::all();

        return view('web.order.purchase', compact('order', 'items', 'request'));
    }
    
    public function complete(Request $request) {
        $user_id = Auth::user()->id;
        $order = Order::where('orderer_id', $user_id)->first();
        $item_price = $order->item->price;

//        $purchase = Purchase::create([
//            'amount' => $item_price,
//            'type' => $request->get('payment_method'),
//            'status_cd' => 104
//        ]);

//        todo 정비소 아이디는 나중에 추 후 추가
//        $reservation = Reservation::create([
//            'orders_id' => $order->id,
//            'garage_id' => 5,
//            'created_id' => $order->orderer_id
//        ]);



        $order = Order::where('datekey', $request->get('datekey'))
                        ->where('cars_id', $request->get('cars_id'))->first();
        $order->update([
            'status_cd', 103,
            'purchase_id', 1
            ]);
        return view('web.order.complete');
    }
    
    public function process() {
        
    }

    public function getModels(Request $request) {
        $brand_id = $request->get('brand');
        $models = Models::where('brands_id', $brand_id)->get();
        return $models;
    }

    public function getDetails(Request $request) {
        $model_id = $request->get('model');
        $details = Detail::where('models_id', $model_id)->get();
        return $details;
    }

    public function getGrades(Request $request) {
        $detail_id = $request->get('detail');
        $grades = Grade::where('details_id', $detail_id)->get();
        return $grades;
    }

    public function selItem(Request $request) {
        $item = Item::find($request->get('sel_item'));
        return $item;
    }



    ////////////////////////
    public function verification(Request $request) {

    }

    public function factory() {

    }


}

