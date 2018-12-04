<?php

namespace App\Http\Controllers;

use App\models\Fenlei;
use App\models\Menu;
use Illuminate\Http\Request;
use App\models\Article;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    //
    public function all_articles(Request $request)
    {
        if(Session::has('admin_id')){
            if($request->isMethod('post')||$request->isMethod('get')){
                $data=$request->input('search1');
                Session::put('search1',$data);
                $articles1=Article::where([['title','like','%'.$data.'%'],['state','10000']])->orderBy('time','desc')->get();
                return view("xiaohe_admin.search.articles",compact('articles1'));
            }
        }else{
            return redirect("budaddmin");
        }
    }
    public function article_delete($id)
    {
        if(Session::has('admin_id'))
        {
            $At=Article::find($id);
            $oldname=$At->picture;
            Storage::delete($oldname);
            if($At->delete()){
                $data=Session::get('search1');
                return redirect("search/articles?search1={$data}");
            }else{
                return redirect('login');
            }
        }else{
            return redirect('budadmin');
        }
    }
    public function article_recommend($id)
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
                $data=Session::get('search1');
                return redirect("search/articles?search1={$data}");
            }
        }else{
            return redirect('budadmin');
        }
    }
    public function article_top($id)
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
                $data=Session::get('search1');
                return redirect("search/articles?search1={$data}");
            }
        }else{
            return redirect('budadmin');
        }
    }

    public function menu(Request $request,$id)
    {
        if(Session::has('admin_id'))
        {
            if($request->isMethod('post')||$request->isMethod('get')){
                $data=$request->input('search2');
                Session::put('search2',$data);
                $articles=Article::where([['title','like','%'.$data.'%'],['state','10000'],['category',$id]])->orderBy('time','desc')->get();
                return view("xiaohe_admin.search.menu",compact('articles','id'));
            }
        }else{
            return redirect('budadmin');
        }
    }
    public function menu_update(Request $request,$menu_id,$id)
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
            return view('xiaohe_admin.search.menu_update',compact('article','id','type','menu','menu_id'));
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
                    $id=$article->category;
                    $data=Session::get('search2');
                    return redirect("search/menu/{$id}?search2={$data}");
                }
            }
        }else{
            return redirect('budadmin');
        }
    }
    public function menu_delete($menu_id,$id)
    {
        if(Session::has('admin_id'))
        {
            $article=Article::find($id);
            $oldname=$article->picture;
            Storage::delete($oldname);
            $category=$article->category;
            if($article->delete()){
                $data=Session::get('search2');
                return redirect("search/menu/{$menu_id}?search2={$data}");
            }
        }else{
            return redirect('budadmin');
        }
    }
    public function menu_recommend($menu_id,$id)
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
                $data=Session::get('search2');
                return redirect("search/menu/{$menu_id}?search2={$data}");
            }
        }else{
            return redirect('budadmin');
        }
    }
    public function menu_top($menu_id,$id)
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
                $data=Session::get('search2');
                return redirect("search/menu/{$menu_id}?search2={$data}");
            }
        }else{
            return redirect('budadmin');
        }
    }

    public function assortindex(Request $request,$id)
    {
        if(Session::has('admin_id')){
            if($request->isMethod('post')||$request->isMethod('get')){
                $data=$request->input('search3');
                Session::put('search3',$data);
                $assorts=Fenlei::where([['name','like','%'.$data.'%'],['type',$id],['state',1]])->orderBy('order1','desc')->get();
                return view("xiaohe_admin/search/assort",compact('assorts','id'));
            }
        }else{
            return redirect()->back();
        }
    }
    public function assortupdate(Request $request,$id)
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
                    'min'=>':attribute 不少于1个字符',
                    'max'=>':attribute 不多于255个字符',
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
                    $data=Session::get('search3');
                    return redirect("search/assort/index/{$assort->type}?search3={$data}");
                }
            }
            $type=$assort->type;
            return view("xiaohe_admin/search/assort_update",compact('assort','type'));
        }else{
            return redirect('budadmin');
        }
    }
    public function assortdelete($id)
    {
        if(Session::has('admin_id')){
            $assort=Fenlei::find($id);
            $type=$assort->type;
            Storage::delete($assort->picture);
            $assort->delete();
            $data=Session::get('search3');
            return redirect("search/assort/index/{$type}?search3={$data}");
        }else{
            return redirect('budadmin');
        }

    }
    public function assortrecommend($id)
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
                $data=Session::get('search3');
                return redirect("search/assort/index/{$article->type}?search3={$data}");
            }
        }else{
            return redirect('budadmin');
        }
    }
    public function assorttop($id)
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
                $data=Session::get('search3');
                return redirect("search/assort/index/{$article->type}?search3={$data}");
            }
        }else{
            return redirect('budadmin');
        }
    }
}
