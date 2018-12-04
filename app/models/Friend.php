<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    //
    const STATE_ON=1;
    const STATE_OFF=2;
    protected $table='friend';

    protected $fillable=['id','name','picture','url','state'];

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
