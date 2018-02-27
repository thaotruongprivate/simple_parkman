<?php

namespace simple_parkman\Http\Controllers;

use Illuminate\Http\Request;
use simple_parkman\Garage;

class GarageController extends Controller {

    public function search(Request $request) {

        $garages = Garage::all();

        if ($name = $request->query('name')) {
            $garages->where('name', $name);
        }

        $garages->get((new Garage())->getKeyName());

        return dd(DB::getQueryLog());
    }
}
