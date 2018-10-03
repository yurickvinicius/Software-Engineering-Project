<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipament extends Model
{
    protected $fillable = [
        'name',
        'local',
        'user_id'
    ];
}
