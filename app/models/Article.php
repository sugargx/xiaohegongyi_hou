<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    //
    const STATE1=10000;
    const STATE2=20000;
    const STATE3=30000;
    const STATE4=40000;
    const STATE5=50000;
    const STATE6=60000;

    const RECOMMEND_ON=30000;
    const RECOMMEND_OFF=40000;

    const TOP_ON=50000;
    const TOP_OFF=60000;

    protected $table='article';

    protected $fillable=[
//        'id','title','author','category','link', 'time','keywords','abstract','brows', 'name',
//        'picture','goal','done', 'donate','typist','author_detail', 'recommend','top','state',
//        'created_at','updated_at'
    ];

    public $timestamps=false;

    public function state2($ind=null)
    {
        $arr=[
            self::STATE1=>'正常',
            self::STATE2=>'禁用',
        ];
        if($ind!==null){
            return array_key_exists($ind,$arr)?$arr[$ind]:$arr[self::STATE1];
        }
        return $arr;
    }
    public function state3($ind=null)
    {
        $arr=[
            self::STATE1=>'已发布',
            self::STATE2=>'禁用',
            self::STATE3=>'审核中',
            self::STATE4=>'已拒绝',
            self::STATE5=>'未发布',
            self::STATE6=>'删除中',
        ];
        if($ind!==null){
            return array_key_exists($ind,$arr)?$arr[$ind]:$arr[self::STATE1];
        }
        return $arr;
    }
    public function state1($ind=null)
    {
        $arr=[
            self::STATE1=>'正常',
            self::STATE2=>'禁用',
        ];
        if($ind!==null){
            return array_key_exists($ind,$arr)?$arr[$ind]:$arr[self::STATE1];
        }
        return $arr;
    }
    public function recommend1($ind=null)
    {
        $arr=[
            self::RECOMMEND_ON=>'推荐',
            self::RECOMMEND_OFF=>'不推荐',
        ];
        if($ind!==null){
            return array_key_exists($ind,$arr)?$arr[$ind]:$arr[self::RECOMMEND_ON];
        }
        return $arr;
    }
    public function top1($ind=null)
    {
        $arr=[
            self::TOP_ON=>'置顶',
            self::TOP_OFF=>'不置顶',
        ];
        if($ind!==null){
            return array_key_exists($ind,$arr)?$arr[$ind]:$arr[self::TOP_ON];
        }
        return $arr;
    }
    public function category($ind=null)
    {
        $nav=Menu::find($ind);
        return $nav['name'];
    }
}
