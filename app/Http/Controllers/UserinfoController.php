<?php

namespace App\Http\Controllers;

use App\models\Menu;
use App\models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserinfoController extends Controller
{
    public function user_index()
    {
        if(Session::has('admin_id'))
        {
            $users=User::where('volunteer',null)->paginate(10);
            return view('xiaohe_admin.user.user_index',compact('users'));
        }else{
            return redirect('budadmin');
        }
    }
    public function user_detail($id)
    {
        if(Session::has('admin_id'))
        {
            $user=User::find($id);
            return view('xiaohe_admin.user.user_detail',compact('user'));
        }else{
            return redirect('budadmin');
        }
    }
    public function user_detail1($id)
    {
        if(Session::has('admin_id'))
        {
            $user=User::find($id);
            return view('xiaohe_admin.check.user_detail',compact('user'));
        }else{
            return redirect('budadmin');
        }
    }
    public function user_add(Request $request)
    {
        if(Session::has('admin_id'))
        {
            $user=new User();
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input(),[
                    'User.name'=>'required|min:2|max:20',
                    'User.sex'=>'required',
                    'User.phone'=>'required|min:2|max:20',
                    'User.pwd'=>'required|min:2|max:20',
                    'User.pwd1'=>'required|min:2|max:20',
                    'User.state'=>'required',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 不少于2个字符',
                    'max'=>':attribute 不多于20个字符',
                ],[
                    'User.name'=>'姓名',
                    'User.sex'=>'性别',
                    'User.phone'=>'手机号',
                    'User.pwd'=>'密码',
                    'User.pwd1'=>'确认密码',
                    'User.state'=>'状态',
                ]);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data=$request->input('User');
                if($data['pwd']==$data['pwd1'])
                {
                    $user->name=$data['name'];
                    $user->sex=$data['sex'];
                    $user->phone=$data['phone'];
                    $user->pwd=$data['pwd'];
                    $user->state=$data['state'];
                    if($user->save()){
                        $currentPage=Session::get("usersPage");
                        return redirect("users/index?page={$currentPage}");
                    }
                }else{
                    return redirect()->back();
                }
            }
            return view('xiaohe_admin.user.user_add',compact('user'));
        }else{
            return redirect('budadmin');
        }
    }
    public function user_update(Request $request,$id)
    {
        if(Session::has('admin_id'))
        {
            $user=User::find($id);
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input(),[
                    'User.name'=>'required|min:2|max:20',
                    'User.sex'=>'required',
                    'User.phone'=>'required|min:2|max:20',
                    'User.pwd'=>'required|min:2|max:20',
                    'User.pwd1'=>'required|min:2|max:20',
                    'User.state'=>'required',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 不少于2个字符',
                    'max'=>':attribute 不多于20个字符',
                ],[
                    'User.name'=>'姓名',
                    'User.sex'=>'性别',
                    'User.phone'=>'手机号',
                    'User.pwd'=>'密码',
                    'User.pwd1'=>'确认密码',
                    'User.state'=>'状态',
                ]);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data=$request->input('User');
                if($data['pwd']==$data['pwd1'])
                {
                    $user->name=$data['name'];
                    $user->sex=$data['sex'];
                    $user->phone=$data['phone'];
                    $user->pwd=$data['pwd'];
                    $user->state=$data['state'];
                    if($user->save()){
                        $currentPage=Session::get("usersPage");
                        return redirect("users/index?page={$currentPage}");
                    }
                }else{
                    return redirect()->back();
                }
            }
            return view('xiaohe_admin.user.user_update',compact('user'));
        }else{
            return redirect('budadmin');
        }
    }
    public function user_delete($id)
    {
        if(Session::has('admin_id'))
        {
            $user=User::find($id);
            if($user->delete()){
                $currentPage=Session::get("usersPage");
                return redirect("users/index?page={$currentPage}");
            }
        }else{
            return redirect('login');
        }
    }
    public function vo_index()
    {
        if(Session::has('admin_id'))
        {
            $users=User::where('volunteer','30')->paginate(10);
            return view('xiaohe_admin.volunteer.vo_index',compact('users'));
        }else{
            return redirect('budadmin');
        }
    }
    public function vo_add(Request $request)
    {
        if(Session::has('admin_id'))
        {
            $user=new User();
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input(),[
                    'User.name'=>'required|min:2|max:20',
                    'User.state'=>'required',
                    'User.best'=>'required',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 不少于2个字符',
                    'max'=>':attribute 不多于20个字符',
                ],[
                    'User.name'=>'姓名',
                    'User.state'=>'状态',
                    'User.best'=>'是否优秀',
                ]);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data=$request->input('User');
                $user->name=$data['name'];
                $user->state=$data['state'];
                $user->volunteer=30;
                $user->best=$data['best'];
                $picture=$request->file('picture');
                if($picture!=null){
                    $pic_name=substr(time(),0,14).".jpg";
                    $oldname=$user->picture;
                    Storage::delete($oldname);
                    $user->picture = Storage::putFileAs('pictures',$picture,$pic_name);
                }
                if($user->save()){
                    $currentPage=Session::get("voPage");
                    return redirect("vo/index?page={$currentPage}");
                }
            }
            return view('xiaohe_admin.volunteer.vo_add',compact('user'));
        }else{
            return redirect('budadmin');
        }
    }
    public function vo_update(Request $request,$id)
    {
        if(Session::has('admin_id'))
        {
            $user=User::find($id);
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input(),[
                    'User.name'=>'required|min:2|max:20',
//                    'User.sex'=>'required',
//                    'User.phone'=>'required|min:2|max:20',
//                    'User.pwd'=>'required|min:2|max:20',
//                    'User.pwd1'=>'required|min:2|max:20',
                    'User.state'=>'required',
                    'User.best'=>'required',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 不少于2个字符',
                    'max'=>':attribute 不多于20个字符',
                ],[
                    'User.name'=>'姓名',
//                    'User.sex'=>'性别',
//                    'User.phone'=>'手机号',
//                    'User.pwd'=>'密码',
//                    'User.pwd1'=>'确认密码',
                    'User.state'=>'状态',
                    'User.best'=>'是否优秀',
                ]);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data=$request->input('User');
                $user->name=$data['name'];
                $user->state=$data['state'];
                $user->best=$data['best'];
                $picture=$request->file('picture');
                if($picture!=null){
                    $pic_name=substr(time(),0,14).".jpg";
                    $oldname=$user->picture;
                    Storage::delete($oldname);
                    $user->picture = Storage::putFileAs('pictures',$picture,$pic_name);
                }
                if($user->save()){
                    $currentPage=Session::get("voPage");
                    return redirect("vo/index?page={$currentPage}");
                }
            }
            return view('xiaohe_admin.volunteer.vo_update',compact('user'));
        }else{
            return redirect('budadmin');
        }
    }
    public function vo_delete($id)
    {
        if(Session::has('admin_id'))
        {
            $user=User::find($id);
            $oldname=$user->picture;
            Storage::delete($oldname);
            if($user->delete()){
                $currentPage=Session::get("voPage");
                return redirect("vo/index?page={$currentPage}");
            }
        }else{
            return redirect('budadmin');
        }
    }
}
