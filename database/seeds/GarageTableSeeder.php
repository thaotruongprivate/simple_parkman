<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use simple_parkman\Garage;

class GarageTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $range = range(100000, 200000);
        shuffle($range);

        $data = [
            [
                'garage_id' => array_shift($range),
                'name' => 'Tampere Rautatientori',
                'hourly_price' => 2,
                'currency' => Garage::EURO,
                'contact_email' => 'testemail@testautopark.fi',
                'point' => '60.168607847624095 24.932371066131623',
                'country' => Garage::FINLAND,
                'owner_id' => '2',
            ],
            [
                'garage_id' => array_shift($range),
                'name' => 'Punavuori Garage',
                'hourly_price' => 1.5,
                'currency' => Garage::EURO,
                'contact_email' => 'testemail@testautopark.fi',
                'point' => '60.162562 24.939453',
                'country' => Garage::FINLAND,
                'owner_id' => '2',
            ],
            [
                'garage_id' => array_shift($range),
                'name' => 'Unknown',
                'hourly_price' => 3,
                'currency' => Garage::EURO,
                'contact_email' => 'testemail@testautopark.fi',
                'point' => '60.16444996645511 24.938178168200714',
                'country' => Garage::FINLAND,
                'owner_id' => '2',
            ],
            [
                'garage_id' => array_shift($range),
                'name' => 'Fitnesstukku',
                'hourly_price' => 3,
                'currency' => Garage::EURO,
                'contact_email' => 'testemail@testautopark.fi',
                'point' => '60.165219358852795 24.93537425994873',
                'country' => Garage::FINLAND,
                'owner_id' => '2',
            ],
            [
                'garage_id' => array_shift($range),
                'name' => 'Kauppis',
                'hourly_price' => 3,
                'currency' => Garage::EURO,
                'contact_email' => 'testemail@testautopark.fi',
                'point' => '60.17167429490068 24.921585662024363',
                'country' => Garage::FINLAND,
                'owner_id' => '2',
            ],
            [
                'garage_id' => array_shift($range),
                'name' => 'Q-Park1',
                'hourly_price' => 2,
                'currency' => Garage::EURO,
                'contact_email' => 'testemail@testautopark.fi',
                'point' => '60.16867390148751 24.930162952045407',
                'country' => Garage::FINLAND,
                'owner_id' => '1',
            ],
        ];

        foreach ($data as $garage) {
            DB::table('garage')->insert($garage);
        }
    }
}
