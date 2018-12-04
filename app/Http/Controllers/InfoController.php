<?php

namespace App\Http\Controllers;

use App\models\Info;
use App\models\Inform;
use App\models\Menu;
use App\models\Article;
use App\models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class InfoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('web');
    }
    public function info_index($id)
    {
        if(Session::has('admin_id'))
        {
            $info=Info::where('up',$id)->first();
            return view('xiaohe_admin.info.info_index',compact('info'));
        }else{
            return redirect('budadmin');

        }
    }
    public function info_edit(Request $request,$id)
    {
        if(Session::has('admin_id'))
        {
            $info=Info::find($id);
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input(),[
                    'Info.title'=>'required|min:1|max:255',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 不少于1个字符',
                    'max'=>':attribute 不多于255个字符',
                ],[
                    'Info.title'=>'名称',
                ]);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $data=$request->input('Info');
                $info->title=$data['title'];
                if($data['content']!=null){
                    $info->content=$data['content'];
                }
                if($info->save()){
                    return redirect("info/index/{$info->up}");
                }
            }
            return view('xiaohe_admin.info.info_edit',compact('info'));
        }else{
            return redirect('budadmin');
        }
    }
    public function index_info(Request $request)
    {
        if(Session::has('admin_id'))
        {
            $time=Time::find('1');
            if($request->isMethod('post'))
            {
//                $validator=Validator::make($request->input(),[
//                    'Time.title'=>'required|min:1|max:255',
//                    'Time.content'=>'required',
//                    'Time.title2'=>'required|min:1|max:255',
//                    'Time.content2'=>'required',
//                    'Time.name'=>'required|min:1|max:255',
//                    'Time.job'=>'required|min:1|max:255',
//                ],[
//                    'required'=>':attribute 为必填项',
//                    'min'=>':attribute 不少于1个字符',
//                    'max'=>':attribute 不多于255个字符',
//                ],[
//                    'Time.title'=>'公告标题',
//                    'Time.content'=>'公告内容',
//                    'Time.title2'=>'宗旨标题',
//                    'Time.content2'=>'宗旨内容',
//                    'Time.name'=>'姓名',
//                    'Time.job'=>'职务'
//                ]);
//
//                if($validator->fails()){
//                    return redirect()->back()->withErrors($validator)->withInput();
//                }


                $data=$request->input('Time');
                $time->title=$data['title'];
                $time->content=$data['content'];
                $time->title2=$data['title2'];
                $time->content2=$data['content2'];
                $time->content3=$data['content3'];
                $time->name=$data['name'];
                $time->job=$data['job'];
                $picture1=$request->file('picture1');
                if($picture1!=null){
                    $pic_name1=substr(time(),0,14).".jpg";
                    $oldname=$time->picture1;
                    Storage::delete($oldname);
                    $time->picture1 = Storage::putFileAs('pictures',$picture1,$pic_name1);
                }
                $picture2=$request->file('picture2');
                if($picture2!=null){
                    $pic_name2=substr(time(),0,14)."a".".jpg";
                    $oldname=$time->picture2;
                    Storage::delete($oldname);
                    $time->picture2 = Storage::putFileAs('pictures',$picture2,$pic_name2);
                }
                if($time->save()){
                    return redirect('index/info');
                }
            }
            return view('xiaohe_admin.info.index_info',compact('time'));
        }else{
            return redirect('budadmin');
        }
    }
    public function index_info_edit(Request $request)
    {
        if(Session::has('admin_id'))
        {
            $article = New Inform();
            if($request->isMethod('post'))
            {
                $data = $request->input('At');
                $article->title = $data['title'];
                $article->author = $data['author'];
                $article->typist = $data['typist'];
                $article->time = $data['time'];
                $article->state = $data['state'];
                $article->keywords = $data['keywords'];
                $article->abstract = $data['abstract'];
                $article->content = $data['content'];
                if ($article->save()) {
                    return redirect('index/info');
                }
            }
            return view('xiaohe_admin.info.index_info_edit',compact('article'));
        }else{
            return redirect('budadmin');
        }
    }
    public function founder()
    {
        $time=Time::find('1');
        return view("xiaohe.pages.founder",compact('time'));
    }
}
