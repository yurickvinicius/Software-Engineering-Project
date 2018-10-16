<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Read extends Model
{
    protected $fillable = [
        'value',
        'equipament_id',
        'sensor_id',
    ];
}
