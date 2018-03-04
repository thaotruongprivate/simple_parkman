<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GarageOwnerTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $names = [
            '1' => 'Q-Park',
            '2' => 'AutoPark',
        ];

        foreach ($names as $id => $name) {
            DB::table('garage_owner')->insert([
                'owner_id' => $id,
                'name' => $name,
            ]);
        }
    }
}
