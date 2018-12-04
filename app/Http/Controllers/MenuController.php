<?php

namespace App\Http\Controllers;

use App\models\Article;
use App\models\Fenlei;
use App\models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('web');
    }
    public function menu($id)
    {
        if(Session::has('admin_id'))
        {
            $menu=Menu::find($id);
            if($menu['type']==1){
                return redirect("assort/index/{$menu->id}");
            }elseif($menu['type']==5){
                return redirect("assort/index/{$menu->id}");
            } else{
                $articles=Article::where('category',$id)->orderBy('time','desc')->paginate(10);
                return view('xiaohe_admin.menu1.menu',compact('articles','id'));
            }

        }else{
            return redirect('budadmin');
        }
    }
    public function menu_add(Request $request,$id)
    {
        if(Session::has('admin_id'))
        {
            $article=new Article();
            $nav=Menu::find($id);
            $type=$nav->type;
            $menu='add';
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input('At'),[
                    'At.name'=>'required|min:1|max:255',
                    'At.title'=>'required|min:1|max:255',
                    'At.goal'=>'required|integer',
                    'At.done'=>'required|integer',
                    'At.donate'=>'required|integer',
                    'At.typist'=>'required|min:1|max:255',
                    'At.place'=>'required|min:1|max:255',
                    'At.author'=>'required|min:1|max:255',
                    'At.category'=>'required',
                    'At.time'=>'required',
                    'At.recommend'=>'required',
                    'At.top'=>'required',
                    'At.state'=>'required',
                    'At.content'=>'required|min:1|max:10000',
                    'At.keywords'=>'required|min:1|max:255',
                    'At.abstract'=>'required|min:1|max:255',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 长度不符合要求',
                    'max'=>':attribute 长度不符合要求',
                    'integer'=>':attribute 必须为数字',
                ],[
                    'At.name'=>'名称',
                    'At.title'=>'标题',
                    'At.goal'=>'筹款目标',
                    'At.done'=>'已筹金额',
                    'At.donate'=>'捐赠人数',
                    'At.typist'=>'录入',
                    'At.place'=>'地址',
                    'At.author'=>'作者',
                    'At.category'=>'应用类型',
                    'At.time'=>'发布时间',
                    'At.recommend'=>'是否推荐',
                    'At.top'=>'是否置顶',
                    'At.state'=>'是否显示',
                    'At.content'=>'内容',
                    'At.keywords'=>'关键词',
                    'At.abstract'=>'摘要',
                ]);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }
            }
            return view('xiaohe_admin.menu1.menu_add',compact('article','id','type','menu'));
        }else{
            return redirect('budadmin');
        }
    }
    public function menu_add2(Request $request,$id)
    {
        if(Session::has('admin_id'))
        {
            $assort=Fenlei::find($id);
            $assortid=$assort->id;
            $article=new Article();
            $nav=Menu::find($assort->type);
            $type=$nav->type;
            $menu='add';
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input('At'),[
                    'At.name'=>'required|min:1|max:255',
                    'At.title'=>'required|min:1|max:255',
//                    'At.goal'=>'required|integer',
//                    'At.done'=>'required|integer',
//                    'At.donate'=>'required|integer',
                    'At.typist'=>'required|min:1|max:255',
                    'At.place'=>'required|min:1|max:255',
                    'At.author'=>'required|min:1|max:255',
                    'At.category'=>'required',
                    'At.time'=>'required',
                    'At.state'=>'required',
                    'At.content'=>'required|min:1|max:10000',
                    'At.keywords'=>'required|min:1|max:255',
//                    'At.abstract'=>'required|min:2|max:50',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 长度不符合要求',
                    'max'=>':attribute 长度不符合要求',
                    'integer'=>':attribute 必须为数字',
                ],[
                    'At.name'=>'名称',
                    'At.title'=>'标题',
//                    'At.goal'=>'筹款目标',
//                    'At.done'=>'已筹金额',
//                    'At.donate'=>'捐赠人数',
                    'At.typist'=>'录入',
                    'At.place'=>'地址',
                    'At.author'=>'作者',
                    'At.category'=>'应用类型',
                    'At.time'=>'发布时间',
                    'At.recommend'=>'是否推荐',
                    'At.content'=>'内容',
                    'At.keywords'=>'关键词',
//                    'At.abstract'=>'摘要',
                ]);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }
            }
            return view('xiaohe_admin.menu1.menu_add2',compact('article','id','type','menu','assortid'));
        }else{
            return redirect('budadmin');
        }
    }
    public function menu_update(Request $request,$id)
    {
        if(Session::has('admin_id'))
        {
            $article=Article::find($id);
            $category=$article->category;
            $nav=Menu::find($category);
            $type=$nav->type;
            if($request->isMethod('post')) {
                $validator = Validator::make($request->input('At'), [
                    'At.name' => 'required|min:1|max:255',
                    'At.title' => 'required|min:1|max:255',
                    'At.typist' => 'required|min:1|max:255',
                    'At.place' => 'required|min:1|max:255',
                    'At.author' => 'required|min:1|max:255',
                    'At.category' => 'required',
                    'At.time' => 'required',
                    'At.recommend' => 'required',
                    'At.top' => 'required',
                    'At.state' => 'required',
                    'At.content' => 'required|min:1|max:10000',
                    'At.keywords' => 'required|min:1|max:255',
                    'At.abstract' => 'required|min:1|max:255',
                ], [
                    'required' => ':attribute 为必填项',
                    'min' => ':attribute 长度不符合要求',
                    'max' => ':attribute 长度不符合要求',
                    'integer' => ':attribute 必须为数字',
                ], [
                    'At.name' => '名称',
                    'At.title' => '标题',
                    'At.typist' => '录入',
                    'At.place' => '地址',
                    'At.author' => '作者',
                    'At.category' => '应用类型',
                    'At.time' => '发布时间',
                    'At.recommend' => '是否推荐',
                    'At.top' => '是否置顶',
                    'At.state' => '是否显示',
                    'At.content' => '内容',
                    'At.keywords' => '关键词',
                    'At.abstract' => '摘要',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
            }
            return view('xiaohe_admin.menu1.menu_update',compact('article','id','type','menu'));
        }else{
            return redirect('budadmin');
        }
    }
    public function assort_update(Request $request,$id,$assortid)
    {
        if(Session::has('admin_id'))
        {
            $article=Article::find($id);
            $category=$article->category;
            $nav=Menu::find($category);
            $type=$nav->type;
            $menu='update';
            if($request->isMethod('post')) {
                $validator = Validator::make($request->input('At'), [
                    'At.name' => 'required|min:1|max:255',
                    'At.title' => 'required|min:1|max:255',
//                    'At.goal' => 'required|integer',
//                    'At.done' => 'required|integer',
//                    'At.donate' => 'required|integer',
                    'At.typist' => 'required|min:1|max:255',
                    'At.place' => 'required|min:1|max:255',
                    'At.author' => 'required|min:1|max:255',
                    'At.category' => 'required',
                    'At.time' => 'required',
                    'At.state' => 'required',
                    'At.content' => 'required|min:1|max:10000',
                    'At.keywords' => 'required|min:1|max:255',
//                    'At.abstract' => 'required|min:2|max:50',
                ], [
                    'required' => ':attribute 为必填项',
                    'min' => ':attribute 长度不符合要求',
                    'max' => ':attribute 长度不符合要求',
                    'integer' => ':attribute 必须为数字',
                ], [
                    'At.name' => '名称',
                    'At.title' => '标题',
//                    'At.goal' => '筹款目标',
//                    'At.done' => '已筹金额',
//                    'At.donate' => '捐赠人数',
                    'At.typist' => '录入',
                    'At.place' => '地址',
                    'At.author' => '作者',
                    'At.category' => '应用类型',
                    'At.time' => '发布时间',
                    'At.state' => '是否显示',
                    'At.content' => '内容',
                    'At.keywords' => '关键词',
//                    'At.abstract' => '摘要',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
            }
            return view('xiaohe_admin.menu1.menu_update2',compact('article','id','type','menu','assortid'));
        }else{
            return redirect('budadmin');
        }
    }
    public function save(Request $request)
    {
        if(Session::has('admin_id'))
        {
            if($request->isMethod('post'))
            {
                $article=New Article();
                $data=$request->input('At');
                $article->title=$data['title'];
                $article->category=$data['category'];
                $article->author=$data['author'];
                $article->typist=$data['typist'];
                $article->time=$data['time'];
                $article->recommend=$data['recommend'];
                $article->top=$data['top'];
                $article->state=$data['state'];
                $article->keywords=$data['keywords'];
                $article->abstract=$data['abstract'];
                $article->content=$data['content'];

                $nav=Menu::find($article->category);
                if($nav->type==1){
                    $article->goal=$data['goal'];
                    $article->done=$data['done'];
                    $article->donate=$data['donate'];
                }elseif($nav->type==3){
                    $article->name=$data['name'];
                    $article->place=$data['place'];
                }
                $picture=$request->file('picture');
                if($picture!=null){
                    $pic_name=substr(time(),0,14).".jpg";
                    $oldname=$article->picture;
                    Storage::delete($oldname);
                    $article->picture = Storage::putFileAs('pictures',$picture,$pic_name);
                }
                if($article->save()){
                    $currentPage=Session::get("menuPage");
                    return redirect("menu/{$article->category}?page={$currentPage}");
                }
            }
        }else{
            return redirect('budadmin');
        }
    }
    public function menu_save(Request $request,$id)
    {
        if(Session::has('admin_id'))
        {
            if($request->isMethod('post'))
            {
                $article=Article::find($id);
                $data=$request->input('At');
                $article->title=$data['title'];
                $article->author=$data['author'];
                $article->typist=$data['typist'];
                $article->time=$data['time'];
                $article->recommend=$data['recommend'];
                $article->top=$data['top'];
                $article->state=$data['state'];
                $article->keywords=$data['keywords'];
                $article->abstract=$data['abstract'];
                $article->content=$data['content'];

                $nav=Menu::find($article->category);
                if($nav->type==3){
                    $article->name=$data['name'];
                    $article->place=$data['place'];
                }
                $picture=$request->file('picture');
                if($picture!=null){
                    $pic_name=substr(time(),0,14).".jpg";
                    $oldname=$article->picture;
                    Storage::delete($oldname);
                    $article->picture = Storage::putFileAs('pictures',$picture,$pic_name);
                }
                if($article->save()){
                    $currentPage=Session::get("menuPage");
                    $id=$article->category;
                    return redirect("menu/{$id}?page={$currentPage}");
                }
            }
        }else{
            return redirect('budadmin');
        }
    }
    public function assort_save(Request $request,$type)
    {
        if(Session::has('admin_id'))
        {
            if($request->isMethod('post'))
            {
                $id=$request->input('id');
                $article=Article::find($id);
                $data=$request->input('At');
                $article->title=$data['title'];
                $article->category=$data['category'];
                $article->author=$data['author'];
                $article->typist=$data['typist'];
                $article->time=$data['time'];
                $article->state=$data['state'];
                $article->keywords=$data['keywords'];
                $article->content=$data['content'];
                $article->order1=$data['order1'];
                if($article->save()){
                    $currentPage=Session::get("assortPage");
                    return redirect("assort/{$type}?page={$currentPage}");
                }
            }
        }else{
            return redirect('budadmin');
        }
    }
    public function save2(Request $request)
    {
        if(Session::has('admin_id'))
        {
            if($request->isMethod('post'))
            {
                $article=New Article();
                $data=$request->input('At');
                $article->title=$data['title'];
                $id=$data['assortid'];
                $assort=Fenlei::find($id);
                $article->category=$assort->type;
                $article->author=$data['author'];
                $article->typist=$data['typist'];
                $article->time=$data['time'];
                $article->state=$data['state'];
                $article->keywords=$data['keywords'];
                $article->content=$data['content'];
                $article->order1=$data['order1'];
                $article->type=$data['category'];
                if($article->save()){
                    $currentPage=Session::get("assortPage");
                    return redirect("assort/{$assort->id}?page={$currentPage}");
                }
            }
        }else{
            return redirect('budadmin');
        }
    }

    public function menu_delete($id)
    {
        if(Session::has('admin_id'))
        {
            $article=Article::find($id);
            $oldname=$article->picture;
            Storage::delete($oldname);
            $category=$article->category;
            if($article->delete()){
                $currentPage=Session::get("menuPage");
                return redirect("menu/{$category}?page={$currentPage}");
            }
        }else{
            return redirect('budadmin');
        }
    }
    public function assort_delete($id,$type)
    {
        if(Session::has('admin_id'))
        {
            $article=Article::find($id);
            $oldname=$article->picture;
            Storage::delete($oldname);
            if($article->delete()){
                $currentPage=Session::get("assortPage");
                return redirect("assort/{$type}?page={$currentPage}");
            }
        }else{
            return redirect('budadmin');
        }
    }
    public function menu_recommend($id)
    {
        if(Session::has('admin_id'))
        {
            $article=Article::find($id);
            if($article->recommend==30000){
                $article->recommend=40000;
            }else{
                $article->recommend=30000;
            }
            if($article->save()){
                $currentPage=Session::get("menuPage");
                return redirect("menu/{$article->category}?page={$currentPage}");
            }
        }else{
            return redirect('budadmin');
        }
    }
    public function menu_top($id)
    {
        if(Session::has('admin_id'))
        {
            $article=Article::find($id);
            if($article->top==50000){
                $article->top=60000;
            }else{
                $article->top=50000;
            }
            if($article->save()){
                $currentPage=Session::get("menuPage");
                return redirect("menu/{$article->category}?page={$currentPage}");
            }
        }else{
            return redirect('budadmin');
        }
    }
    public function assort_recommend($id,$type)
    {
        if(Session::has('admin_id'))
        {
            $article=Article::find($id);
            if($article->recommend==30000){
                $article->recommend=40000;
            }else{
                $article->recommend=30000;
            }
            if($article->save()){
                $currentPage=Session::get("assortPage");
                return redirect("assort/{$type}?page={$currentPage}");
            }
        }else{
            return redirect('budadmin');
        }
    }
    public function assort_top($id,$type)
    {
        if(Session::has('admin_id'))
        {
            $article=Article::find($id);
            if($article->top==50000){
                $article->top=60000;
            }else{
                $article->top=50000;
            }
            if($article->save()){
                $currentPage=Session::get("assortPage");
                return redirect("assort/{$type}?page={$currentPage}");
            }
        }else{
            return redirect('budadmin');
        }
    }
}
