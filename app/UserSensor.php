<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSensor extends Model
{
    protected $fillable = [
        'sensor_id',
        'user_id',
    ];

    public function sensor(){
        return $this->hasOne(Sensor::class, 'id', 'sensor_id');
    }
}
