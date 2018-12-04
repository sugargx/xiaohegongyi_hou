<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    const STATE_ON=10;
    const STATE_OFF=20;

    const STATE_O=1;
    const STATE_OF=2;

    const PAGE1=1;
    const PAGE2=2;
    const PAGE3=3;
    const PAGE4=4;
    const PAGE5=5;
    const PAGE6=6;
    const PAGE10=10;

    protected $table='menu';

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
    public function state2($ind=null)
    {
        $arr=[
            self::STATE_O=>'使用中',
            self::STATE_OF=>'未使用',
        ];
        if($ind!==null){
            return array_key_exists($ind,$arr)?$arr[$ind]:$arr[self::STATE_O];
        }
        return $arr;
    }
    public function type1($ind=null)
    {
        $arr=[
            self::PAGE1=>'页面一',
            self::PAGE2=>'页面二',
            self::PAGE3=>'页面三',
            self::PAGE4=>'页面四',
            self::PAGE5=>'页面五',
            self::PAGE6=>'页面六',
            self::PAGE10=>'链接',
        ];
        if($ind!==null){
            return array_key_exists($ind,$arr)?$arr[$ind]:$arr[self::PAGE1];
        }
        return $arr;
    }
    public function assort()
    {
        return $this->hasMany(\App\models\Fenlei::class,'type','id')->where('state','1')->get();
    }
}
