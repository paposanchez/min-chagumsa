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

use App\Models\SmsTemp;
use App\Models\Payment;
use App\Models\PaymentResult;
use App\Models\ScTran;

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
//        dd($request->all());
        $validate = Validator::make($request->all(), [
            'orderer_name' => 'required',
            'orderer_mobile' => 'required',
            'car_number' => 'required',
            'brands_id' => 'required',
            'models_id' => 'required',
            'details_id' => 'required',
            'grades_id' => 'required',
            'flooding' => 'required',
            'accident' => 'required'
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
                'status_cd' => 102,
                'flooding' => $request->get('flooding'),
                'accident' => $request->get('accident')
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

    /**
     * SMS 전송 메소드
     * @param Request $request
     */
    public function sendSms(Request $request){
        $validate = Validator::make($request->all(), [
            'mobile_num' => 'required',
        ]);

        $result = [
            'result' => '', 'id' => '', 'error' => ''
        ];

        if ($validate->fails())
        {
            $result['result'] = 'FAIL';
            $result['error'] = '000';
        }else{
            $rand_num = rand(100000, 999999);
            $data = [
                'mobile_num' => $request->get('mobile_num'), 'comfirm_msg' => $rand_num,

            ];

            $tr_phone = $request->get('mobile_num');
            $tr_callback = "1833-6889";
            $tr_msg = "카검사 주문신청 인증번호: ".$rand_num;
            $tr_sendstat = 0;
            $tr_msgtype = 0;

            try{
                $sms_model = new \App\Models\ScTran();
                $sms_model->send($tr_phone, $tr_callback, $tr_msg, $tr_sendstat, $tr_msgtype);
            }catch (\Exception $e){
                $result['result'] = 'FAIL';
                $result['error'] = '001';
            }

            $data['send_time'] = time();
            try{
                $sms_chk_model = new SmsTemp();
                $sms_chk_model->mobile_num = $request->get('mobile_num');
                $sms_chk_model->confirm_msg = $rand_num;
                $sms_chk_model->send_time = time();
                $sms_chk_model->save();

                $result['result'] = 'OK';
                $result['id'] = $sms_chk_model->id;
            }catch (\Exception $e){
                $result['result'] = 'FAIL';
                $result['error'] = '002';
            }



        }
        return \GuzzleHttp\json_encode($result);
    }

    /**
     * SMS 코드 검증 메소드
     * @param Request $request
     */
    public function isSms(Request $request){

        $result = [
            'result' => '', 'id' => '', 'error' => ''
        ];

        $validate = Validator::make($request->all(), [
            'sms_num' => 'required', 'sms_id' => 'required'
        ]);
        if ($validate->fails())
        {
            $result['result'] = 'FAIL';
            $result['error'] = '000';
        }else{
            $current_tieme = time();

            $sms_model = SmsTemp::findOrFail($request->get('sms_id'));
            if($sms_model){
                $div_num = $current_tieme - $sms_model->send_time;
                if($div_num <= 300){
                    //전송후 5분이내

                    if($request->get('sms_num') == $sms_model->confirm_msg){
                        $result['result'] = 'OK';
                        $result['id'] = $sms_model->id;
                    }else{ //등록된 인증번호와 사용자가 입력한 인증번호가 틀림
                        $result['result'] = 'FAIL';
                        $result['error'] = '020';
                    }

                }else{ //300초 이후 인증번호 입력
                    $result['result'] = 'FAIL';
                    $result['error'] = '011';
                }
            }else{ //해당 인증 record가 없음.
                $result['result'] = 'FAIL';
                $result['error'] = '010';
            }
        }
        return \GuzzleHttp\json_encode($result);
    }

    /**
     * SMS 임시코드 삭제 메소드
     * @param Request $request
     */
    public function deleteSms(Request $request){
        $result = [
            'result' => '', 'id' => '', 'error' => ''
        ];

        $validate = Validator::make($request->all(), [
            'sms_id' => 'required'
        ]);
        if ($validate->fails()) {
            $result['result'] = 'FAIL';
            $result['error'] = '000';
        }else{
            $sms_model = SmsTemp::find($request->get('sms_id'));
            if($sms_model){
                $sms_model->delete();
                $result['result'] = 'OK';
            }else{//해당 인증 record가 없음.
                $result['result'] = 'FAIL';
                $result['error'] = '010';
            }
        }

        return \GuzzleHttp\json_encode($result);
    }


}

