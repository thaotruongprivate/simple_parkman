<?php

namespace simple_parkman;

use Illuminate\Database\Eloquent\Model;

class Garage extends Model {
    protected $table = 'garage';
    protected $primaryKey = 'garage_id';
    protected $hidden = ['created_at', 'updated_at'];
}
