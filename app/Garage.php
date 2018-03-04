<?php

namespace simple_parkman;

use Illuminate\Database\Eloquent\Model;

class Garage extends Model {

    const EURO = 'EUR';
    const US_DOLLARS = 'USD';
    const BRITISH_POUNDS = 'GBP';

    const FINLAND = 'Finland';

    const CURRENCY_SYMBOLS = [
        self::EURO => '€',
        self::US_DOLLARS => '$',
        self::BRITISH_POUNDS => '£'
    ];

    protected $table = 'garage';
    protected $primaryKey = 'garage_id';
    protected $hidden = ['created_at', 'updated_at'];

    public $incrementing = false;

    public function garageOwner() {
        return $this->belongsTo('simple_parkman\GarageOwner', 'owner_id');
    }
}
