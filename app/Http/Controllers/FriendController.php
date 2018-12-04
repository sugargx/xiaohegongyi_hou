<?php

namespace App\Http\Controllers;

use App\models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class FriendController extends Controller
{
    //
    public function index()
    {
        if(Session::has('admin_id')){
            $friends=Friend::where('state',1)->paginate(10);
            return view("xiaohe_admin/friend/index",compact('friends'));
        }else{
            return redirect()->back();
        }
    }
    public function add(Request $request)
    {
        if(Session::has('admin_id'))
        {
            $friend=new Friend();
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input(),[
                    'User.name'=>'required|max:255',
                    'User.state'=>'required',
                    'User.url'=>'required',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 不少于2个字符',
                    'max'=>':attribute 不多于255个字符',
                ],[
                    'User.name'=>'名称',
                    'User.state'=>'状态',
                    'User.url'=>'链接',
                ]);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data=$request->input('User');
                $friend->name=$data['name'];
                $friend->state=$data['state'];
                $friend->url=$data['url'];
                $picture=$request->file('picture');
                if($picture!=null){
                    $pic_name=substr(time(),0,14).".jpg";
                    $oldname=$friend->picture;
                    Storage::delete($oldname);
                    $friend->picture = Storage::putFileAs('pictures',$picture,$pic_name);
                }
                if($friend->save()){
                    $currentPage=Session::get("friendPage");
                    return redirect("friend/index?page={$currentPage}");
                }
            }
            return view("xiaohe_admin/friend/update",compact('friend'));
        }else{
            return redirect('budadmin');
        }
    }
    public function update(Request $request,$id)
    {
        if(Session::has('admin_id'))
        {
            $friend=Friend::find($id);
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input(),[
                    'User.name'=>'required|min:0|max:255',
                    'User.state'=>'required',
                    'User.url'=>'required|min:0|max:255',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 不少于0个字符',
                    'max'=>':attribute 不多于255个字符',
                ],[
                    'User.name'=>'名称',
                    'User.state'=>'状态',
                    'User.url'=>'链接',
                ]);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data=$request->input('User');
                $friend->name=$data['name'];
                $friend->state=$data['state'];
                $friend->url=$data['url'];
                $friend->save();
                $picture=$request->file('picture');
                if($picture!=null){
                    $pic_name=substr(time(),0,14).".jpg";
                    $oldname=$friend->picture;
                    Storage::delete($oldname);
                    $friend->picture = Storage::putFileAs('pictures',$picture,$pic_name);
                }
                if($friend->save()){
                    $currentPage=Session::get("friendPage");
                    return redirect("friend/index?page={$currentPage}");
                }
            }
            return view("xiaohe_admin/friend/update",compact('friend'));
        }else{
            return redirect('budadmin');
        }
    }
    public function delete($id)
    {
        $friend=Friend::find($id);
        $friend->delete();
        $currentPage=Session::get("friendPage");
        return redirect("friend/index?page={$currentPage}");
    }
}
