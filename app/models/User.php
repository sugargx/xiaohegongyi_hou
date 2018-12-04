<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    const STATE_ON=10;
    const STATE_OFF=20;
    const SEX_BOY=30;
    const SEX_GIRL=40;
    const YES=50;
    const NO=60;
    const VO=30;
    const NOVO=null;

    protected $table='user';

    protected $fillable=[];

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
    public function sex1($ind=null)
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
    public function best1($ind=null)
    {
        $arr=[
            self::YES=>'是',
            self::NO=>'否',
        ];
        if($ind!==null){
            return array_key_exists($ind,$arr)?$arr[$ind]:$arr[self::NO];
        }
        return $arr;
    }
    public function volunteer($ind=null)
    {
        $arr=[
            self::NOVO=>'普通用户',
            self::VO=>'志愿者',
        ];
        if($ind!==null){
            return array_key_exists($ind,$arr)?$arr[$ind]:$arr[self::NOVO];
        }
        return $arr;
    }
}
