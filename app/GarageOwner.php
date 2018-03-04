<?php

namespace simple_parkman;

use Illuminate\Database\Eloquent\Model;

class GarageOwner extends Model {

    protected $table = 'garage_owner';
    protected $primaryKey = 'owner_id';
    public $incrementing = false;
}
