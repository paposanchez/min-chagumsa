<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\GarageInfo;

class InformationController extends Controller {

    public function findGarage() {
        $garages = GarageInfo::orderBy('area', 'ASC')->groupBy('area')->get();
        $all_garages = GarageInfo::orderBy('area', 'ASC')->get();
        return view('web.information.find-garage', compact('garages', 'all_garages'));
    }

}
