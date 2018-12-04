<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Inform extends Model
{
    //
    const STATE_ON=10;
    const STATE_OFF=20;

    protected $table='inform';

    protected $fillable=['id','state','title','content','author','typist','picture','keywords','abstract','time'];

    public $timestamps=false;

    public function state2($ind=null)
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
