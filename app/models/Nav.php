<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    //
    const STATE_ON=10;
    const STATE_OFF=20;

    const PAGE1=1;
    const PAGE2=2;
    const PAGE3=3;
    const PAGE4=4;
    const PAGE5=5;
    const PAGE10=10;

    protected $table='nav';

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
    public function type1($ind=null)
    {
        $arr=[
            self::PAGE1=>'一级菜单',
            self::PAGE2=>'二级菜单',
            self::PAGE3=>'三级菜单',
        ];
        if($ind!==null){
            return array_key_exists($ind,$arr)?$arr[$ind]:$arr[self::PAGE1];
        }
        return $arr;
    }
    public function alias1()
    {
        $menu=Menu::get();
        return $menu;
    }
    public function alias2($ind=null)
    {
        if($ind==0)return '无';
        else{
            $menu=Menu::find($ind);
            return $menu['name'];
        }
    }
    public function alias3($ind=null)
    {
        $menu=Menu::find($ind);
        if($menu==null){
            return '404';
        }else{
            return $menu['alias'];
        }
    }
}
