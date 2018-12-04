<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //状态
    const STATE_ON=10;
    const STATE_OFF=20;
    //页面布局
    const PAGE1=1;
    const PAGE2=2;
    const PAGE3=3;
    const PAGE4=4;
    const PAGE5=5;
    const PAGE6=6;

    protected $table='page';

    protected $fillable=['id','name','alias','type','previous','next','operator','state','created_at','updated_at'];

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
    public function type($ind=null)
    {
        $arr=[
            self::PAGE1=>'页面一',
            self::PAGE2=>'页面二',
            self::PAGE3=>'页面三',
            self::PAGE4=>'页面四',
            self::PAGE5=>'页面五',
            self::PAGE6=>'页面六',
        ];
        if($ind!==null){
            return array_key_exists($ind,$arr)?$arr[$ind]:$arr[self::PAGE1];
        }
        return $arr;
    }
    public function next($ind=null)
    {
        $page=Page::find($ind);
        return $page['name'];
    }
    public function previous($ind=null)
    {
        $page=Page::find($ind);
        return $page['name'];
    }
}
