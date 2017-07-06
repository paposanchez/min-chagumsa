<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Mixapply\Uploader\Receiver;
use App\Models\Car;
use App\Models\Certificate;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Code;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;
use App\Repositories\DiagnosisRepository;

class DiagnosesController extends Controller
{

    public function index(Request $request){
        $where = Order::orderBy('orders.id', 'DESC')->where('orders.status_cd', '=', 107);
        $entrys = $where->paginate(25);


        return view('admin.diagnosis.index', compact('search_fields', 'entrys'));
    }

    public function show($id){

        $order = Order::findOrFail($id);
        $diagnosis = new DiagnosisRepository();

        $entrys = $diagnosis->prepare($id)->get();
//        dd($order->engineer->mobile);

        return view('admin.diagnosis.detail', compact('entrys', 'order'));
    }

    public function edit($id){

    }

    public function store(Request $request){

    }

    public function insuranceFile(Request $request){

    }

    public function insuranceFileView($id){

    }

    public function history(Request $request){

    }

    public function update(Request $request, $id){

    }

}
