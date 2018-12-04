<?php

namespace App\Http\Controllers;

use App\models\Admin;
use App\models\Menu;
use App\models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }
    public function login(Request $request)
    {
        if($request->isMethod('post'))
        {
            $validator=Validator::make($request->input(),[
                'Admin.name'=>'required|min:2|max:20',
                'Admin.pwd'=>'required|min:2|max:20',
            ],[
                'required'=>':attribute 为必填项',
                'min'=>':attribute 长度不符合要求',
                'max'=>':attribute 长度不符合要求',
            ],[
                'Admin.name'=>'账号',
                'Admin.pwd'=>'密码',
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data=$request->input('Admin');
            $admin=Admin::where('account','=',$data['name'])->first();
            if($admin==null){
                Session::flash('admin_login','1',10);
                return redirect()->back();
            }
            if($admin->pwd == $data['pwd'] && $admin->state==10){
                $remember=$request->input('remember');
                if($remember=="yes"){
                    Cookie::queue('admin_name',$admin->account,60*24);
                    Cookie::queue('admin_pwd',$admin->pwd,60*24);
                    Cookie::queue('admin_remember',$remember,60*24);
                }
                Session::put('admin_id',$admin->id);
                return redirect('admin/index');
            }else{
                Session::flash('admin_login','1',10);
                return redirect()->back();
            }
        }
        return view('login');
    }
    public function admin_index()
    {
        if(Session::has('admin_id'))
        {
            return view('xiaohe_admin.admin_index');
        }else{
            return redirect('budadmin');
        }
    }
    public function quit()
    {
        if(Session::has('admin_id'))
        {
            Session::forget('admin_id');
            return redirect('budadmin');
        }
    }
    public function admin()
    {
        if(Session::has('admin_id'))
        {
            $admins=Admin::where('state',10)->paginate(10);
            return view('xiaohe_admin.admin.admin',compact('admins'));
        }else{
            return redirect('budadmin');
        }
    }
    public function admin_add(Request $request)
    {
        if(Session::has('admin_id'))
        {
            $admin=new Admin();
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input(),[
                    'Admin.account'=>'required|min:2|max:20',
                    'Admin.name'=>'required|min:2|max:20',
                    'Admin.pwd'=>'required|min:2|max:20',
                    'Admin.pwd1'=>'required|min:2|max:20',
                    'Admin.state'=>'required',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 不少于2个字符',
                    'max'=>':attribute 不多于20个字符',
                ],[
                    'Admin.account'=>'账号',
                    'Admin.name'=>'姓名',
                    'Admin.pwd'=>'密码',
                    'Admin.pwd1'=>'确认密码',
                    'Admin.state'=>'状态',
                ]);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data=$request->input('Admin');
                if($data['pwd']==$data['pwd1'])
                {
                    $admin->account=$data['account'];
                    $admin->name=$data['name'];
                    $admin->pwd=$data['pwd'];
                    $admin->state=$data['state'];
                    if($admin->save()){
                        $currentPage=Session::get("adminPage");
                        return redirect("admin?page={$currentPage}");
                    }else{
                        redirect('login');
                    }
                }else{
                    return redirect()->back();
                }
            }
            return view('xiaohe_admin.admin.admin_add',compact('admin'));
        }else{
            return redirect('budadmin');
        }

    }
    public function admin_update(Request $request,$id)
    {
        if(Session::has('admin_id'))
        {
            $admin=Admin::find($id);
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input(),[
                    'Admin.account'=>'required|min:2|max:20',
                    'Admin.name'=>'required|min:2|max:20',
                    'Admin.pwd'=>'required|min:2|max:20',
                    'Admin.pwd1'=>'required|min:2|max:20',
                    'Admin.state'=>'required',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 不少于2个字符',
                    'max'=>':attribute 不多于20个字符',
                ],[
                    'Admin.account'=>'账号',
                    'Admin.name'=>'姓名',
                    'Admin.pwd'=>'密码',
                    'Admin.pwd1'=>'确认密码',
                    'Admin.state'=>'状态',
                ]);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data=$request->input('Admin');
                if($data['pwd']==$data['pwd1'])
                {
                    $admin->account=$data['account'];
                    $admin->name=$data['name'];
                    $admin->pwd=$data['pwd'];
                    $admin->state=$data['state'];
                    if($admin->save()) {
                        $currentPage=Session::get("adminPage");
                        return redirect("admin?page={$currentPage}");
                    }
                }else{
                    return redirect()->back();
                }
            }
            return view('xiaohe_admin.admin.admin_update',compact('admin'));
        }else{
            return redirect('budadmin');
        }

    }
    public function admin_delete($id)
    {
        if(Session::has('admin_id'))
        {
            $admin=Admin::find($id);
            if($admin->delete()){
                $currentPage=Session::get("adminPage");
                return redirect("admin?page={$currentPage}");
            }
        }else{
            return redirect('budadmin');
        }
    }

}
