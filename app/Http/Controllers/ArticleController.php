<?php

namespace App\Http\Controllers;

use App\models\Menu;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\models\Article;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function article_index(Request $request)
    {
        if(Session::has('admin_id'))
        {
            $articles=Article::where('state','10000')->orderBy('time','desc')->paginate(10);
            if($request->isMethod('post'))
            {
                $data=$request->input('search');
                $articles=Article::where('category',$data)->orderBy('id','desc')->paginate(10);
                return redirect('article_index',compact('articles'));
            }
            return view('xiaohe_admin.article.article_index',compact('articles'));
        }else{
            return redirect('budadmin');
        }

    }
    public function article_add(Request $request)
    {
        if(Session::has('admin_id'))
        {
            $article=new Article();
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input('At'),[
                    'At.name'=>'min:1|max:255',
                    'At.title'=>'required|max:255',
                    'At.goal'=>'integer',
                    'At.done'=>'integer',
                    'At.donate'=>'integer',
                    'At.typist'=>'required|min:2|max:255',
                    'At.volunteer'=>'min:1|max:255',
                    'At.place'=>'min:1|max:255',
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
                    'At.volunteer'=>'志愿者',
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
                $data = $request->input('At');
                $article->name = $data['name'];
                $article->title = $data['title'];
                $article->goal = $data['goal'];
                $article->done = $data['done'];
                $article->donate = $data['donate'];
                $article->typist = $data['typist'];
                $article->volunteer = $data['volunteer'];
                $article->place = $data['place'];
                $article->author = $data['author'];
                $article->category = $data['category'];
                $article->link = $data['link'];
                $article->time = $data['time'];
                $article->recommend = $data['recommend'];
                $article->top = $data['top'];
                $article->state = $data['state'];
                $article->keywords = $data['keywords'];
                $article->abstract = $data['abstract'];
                $article->content =$data['content'];
                $article->save();

                $picture=$request->file('picture');
                $pic_name=substr(time(),0,14).".jpg";
                $article->picture = Storage::putFileAs('pictures',$picture,$pic_name);

                if ($article->save()) {
                    $currentPage=Session::get("currentPage");
                    return redirect("article/index?page={$currentPage}");
                } else {
                    return redirect()->back();
                }
            }
            return view('xiaohe_admin.article.article_add',compact('article'));
        }else{
            return redirect('budadmin');
        }
    }
    public function article_update(Request $request,$id)
    {
        if(Session::has('admin_id'))
        {
            $article=Article::find($id);
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input('At'),[
                    'At.name'=>'min:1|max:255',
                    'At.title'=>'required|max:255',
                    'At.goal'=>'integer',
                    'At.done'=>'integer',
                    'At.donate'=>'integer',
                    'At.typist'=>'required|min:2|max:255',
                    'At.volunteer'=>'min:1|max:255',
                    'At.place'=>'min:1|max:255',
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
                    'At.volunteer'=>'志愿者',
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
                $data = $request->input('At');
                $article->name = $data['name'];
                $article->title = $data['title'];
                $article->goal = $data['goal'];
                $article->done = $data['done'];
                $article->donate = $data['donate'];
                $article->typist = $data['typist'];
                $article->volunteer = $data['volunteer'];
                $article->place = $data['place'];
                $article->author = $data['author'];
                $article->category = $data['category'];
                $article->link = $data['link'];
                $article->time = $data['time'];
                $article->recommend = $data['recommend'];
                $article->top = $data['top'];
                $article->state = $data['state'];
                $article->keywords = $data['keywords'];
                $article->abstract = $data['abstract'];
                $article->content =$data['content'];
                $article->save();

                $picture=$request->file('picture');
                $pic_name=substr(time(),0,14).".jpg";
                $article->picture = Storage::putFileAs('pictures',$picture,$pic_name);

                if ($article->save()) {
                    $currentPage=Session::get("currentPage");
                    return redirect("article/index?page={$currentPage}");
                } else {
                    return redirect()->back();
                }
            }
            return view('xiaohe_admin.article.article_update',compact('article'));
        }else{
            return redirect('budadmin');
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
                $currentPage=Session::get("currentPage");
                return redirect("article/index?page={$currentPage}");
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
                $currentPage=Session::get("currentPage");
                return redirect("article/index?page={$currentPage}");
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
                $currentPage=Session::get("currentPage");
                return redirect("article/index?page={$currentPage}");
            }
        }else{
            return redirect('budadmin');
        }
    }
}
