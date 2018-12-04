<?php

namespace App\Http\Controllers;

use App\models\Fenlei;
use App\models\Article;
use App\models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FenleiController extends Controller
{
    //
    public function assort($id)
    {
        if(Session::has('admin_id')){
            $assort=Fenlei::find($id);
            $articles=Article::where([['type',$assort->id],['category',$assort->type]])->orderBy('order1','desc')->paginate(10);
            return view('xiaohe_admin.fenlei.index2',compact('articles','id'));
        }else{
            return redirect("budadmin");
        }
    }
    public function index($id)
    {
        if(Session::has('admin_id')){
            $assorts=Fenlei::where([['type',$id],['state',1]])->orderBy('order1','desc')->paginate(10);
            return view("xiaohe_admin/fenlei/index",compact('assorts','id'));
        }else{
            return redirect()->back();
        }
    }
    public function add(Request $request,$id)
    {
        if(Session::has('admin_id'))
        {
            $assort=new Fenlei();
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input(),[
                    'User.name'=>'required|min:1|max:255',
                    'User.order1'=>'required',
//                    'User.goal'=>'required',
//                    'User.done'=>'required',
//                    'User.donate'=>'required',
                    'User.state'=>'required',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 不少于1个字符',
                    'max'=>':attribute 不多于255个字符',
                ],[
                    'User.name'=>'名称',
//                    'User.goal'=>'目标金额',
//                    'User.done'=>'已筹金额',
//                    'User.donate'=>'捐赠人数',
                    'User.order1'=>'序号',
                    'User.state'=>'状态',
                ]);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data=$request->input('User');
                $assort->name=$data['name'];
                $assort->order1=$data['order1'];
                $assort->type=$id;
                $assort->state=$data['state'];
                $picture=$request->file('picture');
                if($picture!=null){
                    $pic_name=substr(time(),0,14).".jpg";
                    $assort->picture = Storage::putFileAs('pictures',$picture,$pic_name);
                }
                if($assort->save()){
                    $currentPage=Session::get("assortPage");
                    return redirect("assort/index/{$id}?page={$currentPage}");
                }
            }
            $menu=Menu::find($id);
            $type=$menu->type;
            return view("xiaohe_admin/fenlei/add",compact('assort','type'));
        }else{
            return redirect('budadmin');
        }
    }
    public function update(Request $request,$id)
    {
        if(Session::has('admin_id'))
        {
            $assort=Fenlei::find($id);
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input(),[
                    'User.name'=>'required|min:1|max:255',
                    'User.order1'=>'required',
                    'User.state'=>'required',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 不少于2个字符',
                    'max'=>':attribute 不多于20个字符',
                ],[
                    'User.name'=>'名称',
                    'User.order1'=>'序号',
                    'User.state'=>'状态',
                ]);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data=$request->input('User');
                $assort->name=$data['name'];
                $assort->order1=$data['order1'];
                $assort->state=$data['state'];
                $assort->save();
                $picture=$request->file('picture');
                if($picture!=null){
                    $pic_name=substr(time(),0,14).".jpg";
                    Storage::delete($assort->picture);
                    $assort->picture = Storage::putFileAs('pictures',$picture,$pic_name);
                }

                if($assort->save()){
                    $currentPage=Session::get("assortPage");
                    return redirect("assort/index/{$assort->type}?page={$currentPage}");
                }
            }
            $type=$assort->type;
            return view("xiaohe_admin/fenlei/update",compact('assort','type'));
        }else{
            return redirect('budadmin');
        }
    }
    public function delete($id)
    {
        if(Session::has('admin_id')){
            $assort=Fenlei::find($id);
            $type=$assort->type;
            Storage::delete($assort->picture);
            $assort->delete();
            $currentPage=Session::get("assortPage");
            return redirect("assort/index/{$type}?page={$currentPage}");
        }else{
            return redirect('budadmin');
        }

    }
    public function recommend($id)
    {
        if(Session::has('admin_id'))
        {
            $article=Fenlei::find($id);
            if($article->recommend==2){
                $article->recommend=1;
            }else{
                $article->recommend=2;
            }
            if($article->save()){
                $currentPage=Session::get("assortPage");
                return redirect("assort/index/{$article->type}?page={$currentPage}");
            }
        }else{
            return redirect('budadmin');
        }
    }
    public function top($id)
    {
        if(Session::has('admin_id'))
        {
            $article=Fenlei::find($id);
            if($article->top==2){
                $article->top=1;
            }else{
                $article->top=2;
            }
            if($article->save()){
                $currentPage=Session::get("assortPage");
                return redirect("assort/index/{$article->type}?page={$currentPage}");
            }
        }else{
            return redirect('budadmin');
        }
    }
}
