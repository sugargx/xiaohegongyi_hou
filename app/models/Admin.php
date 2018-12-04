<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    const STATE_ON=10;
    const STATE_OFF=20;

    const SEX_BOY=30;
    const SEX_GIRL=40;

    protected $table='admin';

    protected $fillable=['id','account','name','pwd','state','created_at','updated_at'];

    public $timestamps=true;

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
    public function sex($ind=null)
    {
        $arr=[
            self::SEX_BOY=>'男',
            self::SEX_GIRL=>'女',
        ];
        if($ind!==null){
            return array_key_exists($ind,$arr)?$arr[$ind]:$arr[self::SEX_BOY];
        }
        return $arr;
    }
}
