<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    //
    protected $table='website';

    protected $fillable=[
        'name','keywords','des','email','telephone',
        'mobile','place','record','footer',
    ];

    public $timestamps=false;
}
