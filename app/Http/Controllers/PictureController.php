<?php

namespace App\Http\Controllers;

use App\models\Menu;
use App\models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PictureController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('web');
    }
    public function pic_index()
    {
        if(Session::has('admin_id'))
        {
            $pics=Picture::where('state',10)->orderBy('order1','asc')->paginate(10);
            return view('xiaohe_admin/picture/pic_index',compact('pics'));
        }else{
            return redirect('budadmin');
        }
    }
    public function pic_add(Request $request)
    {
        if(Session::has('admin_id'))
        {
            $pic=new Picture();
            if($request->isMethod('post'))
            {
                $data=$request->input('Pic');
                $pic->name=$data['name'];
                $pic->order1=$data['order1'];
                $pic->state=$data['state'];
                $pic->url=$data['url'];
                $pic->content=$data['content'];
                $pic->save();
                $picture=$request->file('picture');
                if($picture!=null){
                    $pic_name=substr(time(),0,14).".jpg";
                    $oldname=$pic->picture;
                    Storage::delete($oldname);
                    $pic->picture = Storage::putFileAs('pictures',$picture,$pic_name);
                }
                if($pic->save()){
                    $currentPage=Session::get("picPage");
                    return redirect("pic/index?page={$currentPage}");
                }
            }
            return view('xiaohe_admin/picture/pic_add',compact('pic'));
        }else{
            return redirect('budadmin');
        }
    }
    public function pic_update(Request $request,$id)
    {
        if(Session::has('admin_id'))
        {
            $pic=Picture::find($id);
            if($request->isMethod('post'))
            {
                $data=$request->input('Pic');
                $pic->name=$data['name'];
                $pic->order1=$data['order1'];
                $pic->state=$data['state'];
                $pic->url=$data['url'];
                $pic->content=$data['content'];
                $picture=$request->file('picture');
                if($picture!=null){
                    $pic_name=substr(time(),0,14).".jpg";
                    $oldname=$pic->picture;
                    Storage::delete($oldname);
                    $pic->picture = Storage::putFileAs('pictures',$picture,$pic_name);
                }
                if( $pic->save()){
                    $currentPage=Session::get("picPage");
                    return redirect("pic/index?page={$currentPage}");
                }
            }
            return view('xiaohe_admin/picture/pic_update',compact('pic'));
        }else{
            return redirect('budadmin');
        }
    }
    public function pic_delete($id)
    {
        if(Session::has('admin_id'))
        {
            $pic=Picture::find($id);
            $oldname=$pic->picture;
            Storage::delete($oldname);
            if($pic->delete()){
                $currentPage=Session::get("picPage");
                return redirect("pic/index?page={$currentPage}");
            }
        }else{
            return redirect('budadmin');
        }
    }
}
