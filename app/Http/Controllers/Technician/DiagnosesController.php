<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Repositories\DiagnosisRepository;
use Illuminate\Http\Request;


class DiagnosesController extends Controller
{
    public function diagnoses(Request $request, $id){

        $order = Order::findOrFail($id);

        $handler = new DiagnosisRepository();
        $diagnosis = $handler->prepare($id)->get();

        return view('technician.diagnosis.detail', compact('diagnosis', 'order'));
    }
}
