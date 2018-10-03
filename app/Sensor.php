<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $fillable = [
        'name',
        'equipament_id',
        'user_id',
    ];

    public function equipament(){
        return $this->belongsTo(Equipament::class);
    }
}
