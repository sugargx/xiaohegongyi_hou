<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //
    const STATE_ON=10;
    const STATE_OFF=20;

    protected $table='feedback';

    protected $fillable=['name','email','content','state','created_at','updated_at'];

    public $timestamps=true;

    public function state($ind=null)
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
