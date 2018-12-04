<?php

namespace App\Http\Controllers;

use App\models\Inform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InformController extends Controller
{
    public function inform_index()
    {
        if(Session::has('admin_id')){
            $articles=Inform::where('state',10)->orderBy('time','desc')->paginate(10);
            return view('xiaohe_admin.inform.index',compact('articles'));
        }else{
            return redirect('budadmin');
        }
    }
    public function inform_add(Request $request)
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
                    return redirect('inform/index');
                }
            }
            return view('xiaohe_admin.inform.add',compact('article'));

        }else{
            return redirect('budadmin');
        }
    }
    public function inform_update(Request $request,$id)
    {
        if(Session::has('admin_id'))
        {
            $article = Inform::find($id);
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
                    $currentPage=Session::get("informPage");
                    return redirect("inform/index?page={$currentPage}");
                }
            }
            return view('xiaohe_admin.inform.update',compact('article'));

        }else{
            return redirect('budadmin');
        }
    }
    public function inform_delete($id)
    {
        if(Session::has('admin_id')){
            $article=Inform::find($id);
            if($article->delete()){
                $currentPage=Session::get("informPage");
                return redirect("inform/index?page={$currentPage}");
            }
        }else{
            return redirect('budadmin');
        }
    }
    public function lists()
    {
        $informs=Inform::where('state','10')->paginate(10);
        return view("xiaohe/pages/inform_list",compact('informs'));
    }
}
