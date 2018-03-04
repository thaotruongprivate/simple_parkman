<?php

namespace simple_parkman\Http\Controllers;

use Illuminate\Http\Request;
use simple_parkman\Garage;
use Illuminate\Http\JsonResponse;

class GarageController extends Controller {

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse {

        $garages = Garage::query()
            ->join('garage_owner as go', 'garage.owner_id', '=', 'go.owner_id');

        if ($name = $request->query('name')) {
            $garages->where('garage.name', '=', $name);
        }

        if ($owner = $request->query('owner')) {
            $garages->where('go.name', $owner);
        }

        if ($location = $request->query('location')) {
            list ($lat, $long) = explode(' ', $location);
            if ($country = getCountry($lat, $long)) {
                $garages->where('country', $country);
            }
            $distance = "ST_Distance_Sphere(ST_GeomFromText('POINT({$location})'), ST_GeomFromText(concat('POINT(', point, ')')))";
            $garages->selectRaw("{$distance} as distance")
                ->orderByRaw('distance');
        }

        $garages->addSelect(['garage.*', 'go.name as garage_owner'])->limit(10);

        $data = [];
        foreach ($garages->get() as $garage) {
            $data[] = $this->serializeGarageData($garage);
        }

        return response()->json([
            'result' => true,
            'garages' => $data
        ]);
    }

    /**
     * @param Garage $garage
     * @return array
     */
    private function serializeGarageData(Garage $garage): array {

        $garageData = $garage->toArray();

        $symbol = Garage::CURRENCY_SYMBOLS[Garage::EURO];

        if (isset(Garage::CURRENCY_SYMBOLS[$garage->currency])) {
            $symbol = Garage::CURRENCY_SYMBOLS[$garage->currency];
        }

        if (isset($garage->distance)) {
            $garageData['distance'] = formatDistance($garage->distance);
        }

        $garageData['currency'] = $symbol;
        return $garageData;
    }
}
