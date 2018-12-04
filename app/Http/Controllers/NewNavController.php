<?php

namespace App\Http\Controllers;

use App\models\Nav;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class NewNavController extends Controller
{
    //
    public function index()
    {
        if(Session::has('admin_id')){
            $navs1=Nav::where([['state',10],['type',1]])->orderBy('order1','asc')->paginate(10);
            $navs2=Nav::where([['state',10],['type',2]])->orderBy('order1','asc')->get();
            $navs3=Nav::where([['state',10],['type',3]])->orderBy('order1','asc')->get();
            return view("xiaohe_admin/panel/index",compact('navs1','navs2','navs3'));
        }else{
            return redirect("budadmin");
        }
    }
    public function add(Request $request)
    {
        if(Session::has('admin_id')){
            $nav=New Nav();
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input(),[
                    'Nav.name'=>'required|max:255',
                    'Nav.alias'=>'required',
                    'Nav.order1'=>'required',
                    'Nav.state'=>'required',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 长度不符合要求',
                    'max'=>':attribute 不多于255个字符',
                ],[
                    'Nav.name'=>'名称',
                    'Nav.alias'=>'页面',
                    'Nav.order1'=>'序号',
                    'Nav.state'=>'状态',
                ]);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data=$request->input('Nav');
                $nav->name=$data['name'];
                $nav->alias=$data['alias'];
                $nav->type=1;
                $nav->order1=$data['order1'];
                $nav->state=$data['state'];
                if($nav->save()){
                    $currentPage=Session::get("panelPage");
                    return redirect("panel/index?page={$currentPage}");
                }
            }
            return view("xiaohe_admin/panel/add",compact('nav'));
        }else{
            return redirect("budadmin");
        }
    }
    public function add1(Request $request,$id)
    {
        if(Session::has('admin_id')){
            $nav=New Nav();
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input(),[
                    'Nav.name'=>'required|max:255',
                    'Nav.alias'=>'required',
                    'Nav.order1'=>'required',
                    'Nav.state'=>'required',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 长度不符合要求',
                    'max'=>':attribute 不多于255个字符',
                ],[
                    'Nav.name'=>'名称',
                    'Nav.alias'=>'页面',
                    'Nav.order1'=>'序号',
                    'Nav.state'=>'状态',
                ]);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $data=$request->input('Nav');
                $nav->name=$data['name'];
                $nav->alias=$data['alias'];
                $nav_up=Nav::find($id);
                $nav->up=$nav_up->id;
                $nav->type=$nav_up->type+1;
                $nav->order1=$data['order1'];
                $nav->state=$data['state'];
                if($nav->save()){
                    if($nav_up->type==1){
                        $nav_up->down=1;
                        $nav_up->save();
                    }elseif($nav_up->type==2){
                        $nav_up->down=1;
                        $nav_up->save();
                    }
                    $currentPage=Session::get("panelPage");
                    return redirect("panel/index?page={$currentPage}");
                }
            }
            return view("xiaohe_admin/panel/add",compact('nav'));
        }else{
            return redirect("budadmin");
        }
    }
    public function update(Request $request,$id)
    {
        if(Session::has('admin_id')){
            $nav=Nav::find($id);
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input(),[
                    'Nav.name'=>'required|max:255',
                    'Nav.alias'=>'required',
                    'Nav.order1'=>'required',
                    'Nav.state'=>'required',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 长度不符合要求',
                    'max'=>':attribute 不多于255个字符',
                ],[
                    'Nav.name'=>'名称',
                    'Nav.alias'=>'页面',
                    'Nav.order1'=>'序号',
                    'Nav.state'=>'状态',
                ]);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $data=$request->input('Nav');
                $nav->name=$data['name'];
                $nav->alias=$data['alias'];
                $nav->order1=$data['order1'];
                $nav->state=$data['state'];
                if($nav->save()){
                    if($nav->type==2){
                        $nav_up=Nav::find($nav->up);
                        $navs2=Nav::where([['state',10],['up',$nav->up]])->get();
                        if($navs2==null){
                            $nav_up->down=2;
                            $nav_up->save();
                        }else{
                            $nav_up->down=1;
                            $nav_up->save();
                        }
                    }elseif($nav->type==3){
                        $nav_up=Nav::find($nav->up);
                        $navs3=Nav::where([['state',10],['up',$nav->up]])->get();
                        if($navs3==null){
                            $nav_up->down=2;
                            $nav_up->save();
                        }else{
                            $nav_up->down=1;
                            $nav_up->save();
                        }
                    }
                    $currentPage=Session::get("panelPage");
                    return redirect("panel/index?page={$currentPage}");
                }
            }
            return view("xiaohe_admin/panel/update",compact('nav'));
        }else{
            return redirect("budadmin");
        }

    }
    public function delete($id)
    {
        $nav=Nav::find($id);
        if($nav->type==1){
            $navs2=Nav::where('up',$nav->id)->get();
            if($navs2!=null){
                foreach($navs2 as $nav2)
                {
                    $navs3=Nav::where('up',$nav2->id)->get();
                    if($navs3!=null){
                        foreach($navs3 as $nav3){
                            $nav3->delete();
                        }
                    }
                    $nav2->delete();
                }
            }

            $nav->delete();
        }
        if($nav->type==2){
            $navs3=Nav::where('up',$nav->id)->get();
            if($navs3!=null){
                foreach($navs3 as $nav3){
                    $nav3->delete();
                }
            }
            $up=$nav->up;
            $nav->delete();
            $nav_up=Nav::find($up);
            $navs2=Nav::where([['state',10],['up',$up]])->get();
            if($navs2==null){
                $nav_up->down=2;
                $nav_up->save();
            }
        }
        if($nav->type==3){
            $up=$nav->up;
            $nav->delete();
            $nav_up=Nav::find($up);
            $navs3=Nav::where([['state',10],['up',$up]])->get();
            if($navs3==null){
                $nav_up->down=2;
                $nav_up->save();
            }
        }
        $currentPage=Session::get("panelPage");
        return redirect("panel/index?page={$currentPage}");
    }
}
