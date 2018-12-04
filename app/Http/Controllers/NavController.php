<?php

namespace App\Http\Controllers;

use App\models\Fenlei;
use App\models\Info;
use App\models\Menu;
use App\models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NavController extends Controller
{
    public function nav_index()
    {
        if(Session::has('admin_id')){
            $navs=Menu::paginate(10);
            return view('xiaohe_admin.menu.nav_index',compact('navs'));
        }else{
            return redirect('budadmin');
        }
    }
    public function nav_add(Request $request)
    {
        if(Session::has('admin_id'))
        {
            $nav=new Menu();
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input(),[
                    'Nav.name'=>'required|min:1|max:255',
                    'Nav.alias'=>'required|min:1|max:255',
                    'Nav.type'=>'required',
                    'Nav.state'=>'required',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 长度不符合要求',
                    'max'=>':attribute 长度不符合要求',
                ],[
                    'Nav.name'=>'名称',
                    'Nav.alias'=>'别名',
                    'Nav.type'=>'类型',
                    'Nav.state'=>'状态',
                ]);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $data=$request->input('Nav');
                $nav->name=$data['name'];
                $nav->alias=$data['alias'];
                $nav->type=$data['type'];
                $nav->state=$data['state'];
                if($nav->save()){
                    if($nav->type==6){
                        $info=New Info();
                        $info->name=$nav->name;
                        $info->up=$nav->id;
                        $info->save();
                    }
                    $currentPage=Session::get("navPage");
                    return redirect("nav/index?page={$currentPage}");
                }
            }
            return view('xiaohe_admin.menu.nav_add',compact('nav'));
        }else{
            return redirect('budadmin');
        }

    }
    public function nav_update(Request $request,$id)
    {
        if(Session::has('admin_id'))
        {
            $nav=Menu::find($id);
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input(),[
                    'Nav.name'=>'required|min:1|max:255',
                    'Nav.alias'=>'required|min:1|max:255',
                    'Nav.type'=>'required',
                    'Nav.state'=>'required',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 长度不符合要求',
                    'max'=>':attribute 长度不符合要求',
                ],[
                    'Nav.name'=>'名称',
                    'Nav.alias'=>'别名',
                    'Nav.type'=>'类型',
                    'Nav.state'=>'状态',
                ]);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $data=$request->input('Nav');
                $nav->name=$data['name'];
                $nav->alias=$data['alias'];
                $nav->type=$data['type'];
                $nav->state=$data['state'];
                if($nav->save()){
                    if($nav->type==6){
                        $info=New Info();
                        $info->name=$nav->name;
                        $info->up=$nav->id;
                        $info->save();
                    }else{
                        $info=Info::where('up',$nav->id)->first();
                        if($info!=null)$info->delete();
                    }
                    $currentPage=Session::get("navPage");
                    return redirect("nav/index?page={$currentPage}");
                }
            }
            return view('xiaohe_admin.menu.nav_update',compact('nav'));
        }else{
            return redirect('budadmin');
        }
    }
    public function nav_delete($id)
    {
        if(Session::has('admin_id'))
        {
            $nav=Menu::find($id);
            $fenlei=Fenlei::where('type',$nav->id)->get();
            if($fenlei!=null){
                foreach($fenlei as $fen){
                    $fen->delete();
                }
            }
            $articles=Article::where('category',$nav->id)->get();
            if($articles!=null){
                foreach($articles as $article){
                    $article->delete();
                }
            }
            if($nav->type==6){
                $info=Info::where('up',$nav->id)->first();
                if($info!=null){
                    $info->delete();
                }
            }
            if($nav->delete()){
                $currentPage=Session::get("navPage");
                return redirect("nav/index?page={$currentPage}");
            }
        }else{
            return redirect('budadmin');
        }
    }
}
