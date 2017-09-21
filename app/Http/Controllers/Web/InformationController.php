<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\GarageInfo;
use App\Models\Item;

class InformationController extends Controller {

    public function price(){

        $item = Item::OrderBy('car_sort', 'ASC')->orderBy('price', 'ASC')->get();

        $local_cnt = 0;
        $forein_cnt = 0;
        foreach ($item as $key => $row){
            if($row->car_sort == 'N'){
                $local_cnt++;
            }elseif ($row->car_sort == 'F'){
                $forein_cnt++;
            }
        }


        $is_local = false;
        $is_for = false;

        return view('web.information.price', compact('item', 'local_cnt', 'forein_cnt', 'is_local', 'is_for'));
    }
}
