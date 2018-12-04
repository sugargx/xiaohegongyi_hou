<?php

namespace App\Http\Controllers;

use App\models\Feedback;
use App\models\Fenlei;
use App\models\Info;
use App\models\Inform;
use App\models\Menu;
use App\models\Page;
use App\models\Picture;
use App\models\Time;
use App\models\User;
use App\models\Website;
use Illuminate\Http\Request;
use App\models\Article;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('web');
    }
    public function layout1()
    {
        return view('layouts.layout1');
    }
    public function search(Request $request)
    {
        if($request->isMethod('post')||$request->isMethod('get'))
        {
            $data=$request->input('search');
            $articles=Article::where([['title','like','%'.$data.'%'],['state','10000']])->orderBy('time','desc')->paginate(10);
            foreach($articles as $article)
            {
                $cat=$article->category;
                $nav=Menu::find($cat);
                $state=$nav->state;
                if($state==20){ unset($article); }
            }
            return view('xiaohe.search',compact('articles'));
        }
    }
    public function index()
    {
        $index=Article::where([['category','15'],['state','10000'],['top','50000']])->orderBy('time','desc')->paginate(5);
        $projects=Fenlei::where([['state','1'],['top','1'],['type','2']])->orderBy('order1','desc')->paginate(3);
        $volunteers=Article::where([['category','19'],['state','10000'],['top','50000']])->orderBy('time','desc')->paginate(3);
        $time=Time::find(1);
        return view('xiaohe.index',compact('index','projects','volunteer','volunteers','time'));
    }
    public function project_detail($id)
    {
        $project=Article::find($id);
        $project->brows+=1;
        $project->save();
        $nav=Menu::find($project->category);
        return view('xiaohe.pages.project_detail',compact('nav','project'));
    }
    public function project_list($id)
    {
        $assort=Fenlei::find($id);
        $projects=Article::where([['category',$assort->type],['type',$id],['state','10000']])->paginate(8);
        $nav=Menu::find($assort->type);
        return view('xiaohe.pages.project_list',compact('nav','projects'));
    }
    public function model($alias)
    {
        if($alias=='404'){
            return view('xiaohe/404');
        }else{
            $nav=Menu::where('alias',$alias)->first();
            $type=$nav->type;
            if ($type == 1) {                                              //页面布局1
                $article=Fenlei::where([['type',$nav->id],['state','1']])->orderBy('order1','desc')->paginate(6);
                return view('xiaohe.pages.page1',compact('article','nav'));
            }elseif ($type == 2) {                                        //页面布局2
                $article=Article::where([['category',$nav->id],['state','10000']])->orderBy('time','desc')->paginate(10);
                return view('xiaohe.pages.page2',compact('article','nav'));
            }elseif ($type == 3) {                                        //页面布局3
                $article=Article::where([['category',$nav->id],['state','10000']])->orderBy('time','desc')->paginate(8);
                return view('xiaohe.pages.page3',compact('article','nav'));
            }elseif ($type == 4) {                                        //页面布局4
                $article=Article::where([['category',$nav->id],['state','10000']])->orderBy('time','desc')->paginate(9);
                return view('xiaohe.pages.page4',compact('article','nav'));
            }elseif ($type == 5) {                                         //页面布局5
                $article=Fenlei::where([['type',$nav->id],['state','1']])->orderBy('order1','desc')->paginate(6);
                return view('xiaohe.pages.page7',compact('article','nav'));
            }elseif($type==6){                                             //页面布局6
                $info=Info::where('up',$nav->id)->first();
                return view('xiaohe.pages.page6',compact('info'));
            }
        }

    }
    public function detail($id)
    {
        $article=Article::find($id);
        $article->brows+=1;
        $article->save();
        $nav=Menu::find($article->category);
            return view('xiaohe.pages.page5',compact('article','nav'));
    }
    public function inform($id)
    {
        $article=Inform::find($id);
        $article->save();
        return view('xiaohe.pages.inform',compact('article'));
    }
    public function info($id)
    {
        $info=Info::find($id);
        return view('xiaohe.pages.page6',compact('info'));
    }
    public function userlogin(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data=$request->input('User');
            $user=User::where('name',$data['name1'])->first();
            if($user==null || $user->state==20){
                Session::flash('user_login','1',10);
                redirect('userlogin');
            }elseif($user->pwd==$data['pwd']){
                $remember=$request->input('remember');
                if($remember=="yes"){
                    Cookie::queue('name',$user->name,60*24);
                    Cookie::queue('pwd',$user->pwd,60*24);
                    Cookie::queue('remember',$remember,60*24);
                }
                Session::put('user_id',$user->id,60*30);
                return redirect('userindex');
            }else{
                Session::flash('user_login','1',10);
                redirect('userlogin');
            }
        }
        return view('xiaohe.userlogin');
    }
    public function register(Request $request)
    {
        $user=new User();
        if($request->isMethod('post'))
        {
            $validator=Validator::make($request->input(),[
                'User.name'=>'required|min:2|max:20',
                'User.pwd'=>'required|min:2|max:20',
                'User.sex'=>'required',
                'User.phone'=>'required|min:2|max:20',
                'User.id_num'=>'required|min:2|max:20',
                'User.province'=>'required|min:2|max:20',
                'User.city'=>'required|min:2|max:20',
                'User.place'=>'required|min:2|max:50',
            ],[
                'required'=>':attribute 为必填项',
                'min'=>':attribute 长度不符合要求',
                'max'=>':attribute 长度不符合要求',
            ],[
                'User.name'=>'姓名',
                'User.pwd'=>'密码',
                'User.sex'=>'性别',
                'User.phone'=>'手机号',
                'User.id_num'=>'身份证号',
                'User.province'=>'省',
                'User.city'=>'城市',
                'User.place'=>'地址',
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data=$request->input('User');
            $user->name=$data['name'];
            $user->pwd=$data['pwd'];
            $user->sex=$data['sex'];
            $user->phone=$data['phone'];
            $user->id_num=$data['id_num'];
            $user->province=$data['province'];
            $user->city=$data['city'];
            $user->place=$data['place'];
            $user->state=20;
            if($user->save()){
                return redirect('userlogin');
            }
        }
        return view('xiaohe.register',compact('user'));
    }
    public function create_article(Request $request)
    {
        if(Session::has('user_id'))
        {
            $menu=Menu::where('usercate','1')->get();
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input(),[
                    'User.title'=>'required|min:1|max:255',
                    'User.category'=>'required',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 不少于1个字符',
                    'max'=>':attribute 不多于255个字符',
                ],[
                    'User.title'=>'标题',
                    'User.category'=>'文章类别',
                ]);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $data=$request->input('User');
                $id=Session::get('user_id');
                $user=User::find($id);
                $article=new Article();
                $article->name=$data['name'];
                $article->place=$data['place'];
                $article->title=$data['title'];
                $article->category=$data['category'];
                $article->time=$data['time'];
                $article->abstract=$data['abstract'];
                $article->keywords=$data['keywords'];
                $article->content=$data['content'];
                $article->author=$user->name;
                $article->typist=$user->name;
                $article->state=50000;

                $picture=$request->file('picture');
                if($picture!=null){
                    $pic_name="user_".$article->id.".jpg";
                    Storage::delete($pic_name);
                    $article->picture = Storage::putFileAs('pictures',$picture,$pic_name);
                }
                if($article->save())
                {
                    return redirect('record');
                }
            }
            return view('xiaohe.user_admin.create_article',compact('menu'));
        }else{
            return redirect('userlogin');
        }

    }
    public function update_article(Request $request,$key)
    {
        if(Session::has('user_id'))
        {
            $article=Article::find($key);
            $menu=Menu::where('usercate','1')->get();
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input(),[
                    'User.title'=>'required|min:1|max:255',
                    'User.category'=>'required',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 不少于1个字符',
                    'max'=>':attribute 不多于255个字符',
                ],[
                    'User.title'=>'标题',
                    'User.category'=>'文章类别',
                ]);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $data=$request->input('User');
                $article->name=$data['name'];
                $article->place=$data['place'];
                $article->title=$data['title'];
                $article->category=$data['category'];
                $article->time=$data['time'];
                $article->keywords=$data['keywords'];
                $article->abstract=$data['abstract'];
                $article->content=$data['content'];

                $picture=$request->file('picture');
                if($picture!=null){
                    $pic_name="user_".$article->id.".jpg";
                    Storage::delete($pic_name);
                    $article->picture = Storage::putFileAs('pictures',$picture,$pic_name);
                }
                if($article->save())
                {
                    $currentPage=Session::get("usePage");
                    return redirect("record?page={$currentPage}");
                }
            }
            return view('xiaohe.user_admin.update_article',compact('article','menu'));
        }else{
            return redirect('userlogin');
        }
    }
    public function publish_article($id){
        if(Session::has('user_id')){
            $article=Article::find($id);
            $article->state=30000;
            $article->save();
            $currentPage=Session::get("usePage");
            return redirect("record?page={$currentPage}");
        }else{
            return redirect('userlogin');
        }
    }
    public function delete_article($key)
    {
        if(Session::has('user_id'))
        {
            $article=Article::find($key);
            $article->state=60000;
            $article->save();
            $currentPage=Session::get("usePage");
            return redirect("record?page={$currentPage}");
        }else{
            return redirect('userlogin');
        }
    }
    public function record()
    {
        if(Session::has('user_id'))
        {
            $id=Session::get('user_id');
            $user=User::find($id);
            $articles=Article::where('author',$user->name)->paginate(10);
            return view('xiaohe.user_admin.record',compact('articles'));
        }else{
            return redirect('userlogin');
        }

    }
    public function setup(Request $request)
    {
        if(Session::has('user_id')){
            $id=Session::get('user_id');
            $user=User::find($id);
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input(),[
                    'User.name'=>'required|min:2|max:20',
                    'User.sex'=>'required',
                    'User.phone'=>'required|min:2|max:20',
                    'User.id_num'=>'required|min:2|max:20',
                    'User.province'=>'required|min:2|max:20',
                    'User.city'=>'required|min:2|max:20',
                    'User.place'=>'required|min:2|max:50',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 长度不符合要求',
                    'max'=>':attribute 长度不符合要求',
                ],[
                    'User.name'=>'姓名',
                    'User.sex'=>'性别',
                    'User.phone'=>'手机号',
                    'User.id_num'=>'身份证号',
                    'User.province'=>'省',
                    'User.city'=>'城市',
                    'User.place'=>'地址',
                ]);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $data=$request->input('User');
                $user->name=$data['name'];
                $user->sex=$data['sex'];
                $user->province=$data['province'];
                $user->city=$data['city'];
                $user->place=$data['place'];
                $user->id_num=$data['id_num'];
                $user->phone=$data['phone'];

                if($user->save()){
                    return redirect('userindex');
                }
            }
            return view('xiaohe.user_admin.setup',compact('user'));
        }else{
            return redirect('userlogin');
        }
    }
    public function userindex()
    {
        if(Session::has('user_id')){
            $id=Session::get('user_id');
            $user=User::find($id);
            return view('xiaohe.user_admin.userindex',compact('user'));
        }else{
            return redirect('userlogin');
        }
    }
    public function pwd(Request $request)
    {
        if(Session::has('user_id'))
        {
            if($request->isMethod('post'))
            {
                $id=Session::get('user_id');
                $user=User::find($id);
                $validator=Validator::make($request->input(),[
                    'pwd.new'=>'required|min:2|max:20',
                    'pwd.new1'=>'required|min:2|max:20',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 长度不符合要求',
                    'max'=>':attribute 长度不符合要求',
                ],[
                    'pwd.new'=>'新密码',
                    'pwd.new1'=>'确认新密码',
                ]);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $data=$request->input('pwd');
                if($data['new']==$data['new1']){
                    $user->pwd=$data['new'];
                    if($user->save()){
                        return redirect('userindex');
                    }
                }else{
                    return redirect()->back();
                }
            }
            return view('xiaohe.user_admin.pwd');
        }else{
            return redirect('userlogin');
        }
    }
    public function out()
    {
        if(Session::has('user_id'))
        {
            Session::forget('user_id');
            return redirect('index');
        }
    }
}
