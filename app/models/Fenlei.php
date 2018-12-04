<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Fenlei extends Model
{
    //
    const STATE_ON=1;
    const STATE_OFF=2;
    protected $table='fenlei';

    protected $fillable=['name','state'];

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
