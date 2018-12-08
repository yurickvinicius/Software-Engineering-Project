<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSensor extends Model
{
    protected $fillable = [
        'sensor_id',
        'user_id',
    ];
}
