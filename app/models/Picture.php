<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    //
    const STATE_ON=10;
    const STATE_OFF=20;

    protected $table='picture';

    protected $fillable=['id','name','picture','state','order1'];

    public $timestamps=false;

    public function state1($ind=null)
    {
        $arr=[
            self::STATE_ON=>'正常',
            self::STATE_OFF=>'禁用',
        ];
        if($ind!==null){
            return array_key_exists($ind,$arr)?$arr[$ind]:$arr[self::STATE_ON];
        }
        return $arr;
    }
}
