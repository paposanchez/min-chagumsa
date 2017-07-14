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
use App\Models\OrderFeature;
use App\Models\Purchase;
use App\Models\Reservation;
use App\Models\User;
use App\Models\UserExtra;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller {
    
    public function index(Request $request) {
        if(!Auth::user()){
            return redirect('login');
        }
        $user = Auth::user();
        $brands = Brand::select('id', 'name')->get();
        $exterior_option = Code::where('group', 'car_option_exterior')->get();
        $interior_option = Code::where('group', 'car_option_interior')->get();
        $safety_option = Code::where('group', 'car_option_safety')->get();
        $facilities_option = Code::where('group', 'car_option_facilities')->get();
        $multimedia_option = Code::where('group', 'car_option_multimedia')->get();

        return view('web.order.index', compact('brands', 'exterior_option', 'interior_option', 'safety_option', 'facilities_option', 'multimedia_option', 'user'));
    }

    public function reservation(Request $request) {
        $validate = Validator::make($request->all(), [
            'orderer_name' => 'required',
            'orderer_mobile' => 'required',
            'car_number' => 'required',
            'brands_id' => 'required',
            'models_id' => 'required',
            'details_id' => 'required',
            'grades_id' => 'required'
        ]);

        if ($validate->fails())
        {
            return redirect()->back()->with('error', trans('order.error'));
        }


        $search_fields = [
            '09' => '9시', '10' => '10시', '11' => '11시', '12' => '12시', '13' => '13시', '14' => '14시','15' => '15시','16' => '16시','17' => '17시'
        ];

        return view('web.order.reservation', compact('search_fields', 'garages', 'request'));
    }

    public function purchase(Request $request) {
        $input = $request->all();

        $datekey = substr(str_replace("-","",$request->reservaton_date), -6);
        // todo 임시로 5 입력
//        $garage_info = GarageInfo::where('garage_id', 5)->first();
        $garage_id = 5;
        $orderer_id = User::where('name', $request->get('orderer_name'))->first()->id;

        $car = Car::create($input);


        $purchase = Purchase::create([
            'amount' => 0,
            'type' => 0,
            'status_cd' => 101
        ]);

        $order = Order::create([
                'datekey' => $datekey,
                'car_number' => $request->get('car_number'),
                'cars_id' => $car->id,
                'garage_id' => $garage_id,
                'item_id' => 1,
                'purchase_id' => $purchase->id,
                'orderer_id' => $orderer_id,
                'orderer_name' => $request->get('orderer_name'),
                'orderer_mobile' => $request->get('orderer_mobile'),
                'registration_file' => 0,
                'open_cd' => 0,
                'status_cd' => 102
            ]);

        foreach ($request->get('options_ck') as $options){
            OrderFeature::create([
                'orders_id' => $order->id,
                'features_id' => $options
            ]);
        }

        $items = Item::all();

        return view('web.order.purchase', compact('order', 'items', 'request'));
    }
    
    public function complete(Request $request) {
        $order = Order::where('datekey', $request->get('datekey'))
            ->where('cars_id', $request->get('cars_id'))->first();

        $item = Item::find($request->get('item_choice'))->first();

        $order->purchase->update([
            'amount' => $item->price,
            'type' => $request->get('payment_method'),
            'status_cd' => 102
        ]);

        $date = Carbon::now()->toDateTimeString();
        Reservation::create([
            'orders_id' => $order->id,
            'garage_id' => $order->garage_id,
            'created_id' => $order->orderer_id,
            'reservation_at' => $date
        ]);

        $order->update([
            'status_cd' => 103,
            'purchase_id' => $order->purchase->id,
            'item_id' => $item->id
        ]);
        return view('web.order.complete', compact('order'));
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

    public function process() {

    }


}

