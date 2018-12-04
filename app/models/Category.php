<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    const STATE_ON=10;
    const STATE_OFF=20;

    protected $table='category';

    protected $fillable=['id','name','type','state'];

    public $timestamps=false;

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
        $nav=Menu::find($ind);
        return $nav['name'];
    }
}
