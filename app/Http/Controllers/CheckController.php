<?php

namespace App\Http\Controllers;

use App\models\Menu;
use App\models\User;
use App\models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('web');
    }
    public function Ucheck_index()
    {
        if(Session::has('admin_id')){
            $users=User::where('state','20')->paginate(10);
            return view('xiaohe_admin.check.Ucheck_index',compact('users'));
        }else{
            return redirect('budadmin');
        }
    }
    public function user_pass($id)
    {
        if(Session::has('admin_id')){
            $user=User::find($id);
            $user->state=10;
            if($user->save()){
                $currentPage=Session::get("UcheckPage");
                return redirect("Ucheck/index?page={$currentPage}");
            }
        }else{
            return redirect('budadmin');
        }

    }
    public function user_delete($id)
    {
        if(Session::has('admin_id'))
        {
            $user=User::find($id);
            if($user->delete()){
                $currentPage=Session::get("UcheckPage");
                return redirect("Ucheck/index?page={$currentPage}");
            }
        }else{
            return redirect('login');
        }
    }
    public function Acheck_index()
    {
        if(Session::has('admin_id')){
            $articles=Article::wherein('state',['30000','60000'])->paginate(10);
            return view('xiaohe_admin.check.Acheck_index',compact('articles'));
        }else{
            return redirect('budadmin');
        }
    }
    public function edit()
    {
        if(Session::has('admin_id')){
            $menu=Menu::where('state',10)->wherein('type',['2','3','4'])->paginate(10);
            return view('xiaohe_admin.check.Acheck_edit',compact('menu'));
        }else{
            return redirect('budadmin');
        }
    }
    public function setup($id)
    {
        if(Session::has('admin_id')){
            $menu=Menu::find($id);
            if($menu->usercate==1){
                $menu->usercate=2;
                $menu->save();
            }elseif($menu->usercate==2){
                $menu->usercate=1;
                $menu->save();
            }
            $currentPage=Session::get("AcheckeditPage");
            return redirect("Acheck/edit?page={$currentPage}");
        }else{
            return redirect('budadmin');
        }
    }
    public function article_pass($id)
    {
        if(Session::has('admin_id'))
        {
            $article=Article::find($id);
            $article->state=10000;
            if($article->save()){
                $currentPage=Session::get("AcheckPage");
                return redirect("Acheck/index?page={$currentPage}");
            }
        }else{
            return redirect('budadmin');
        }
    }
    public function refuse($id)
    {
        if(Session::has('admin_id'))
        {
            $article=Article::find($id);
            $article->state=40000;
            if($article->save()){
                $currentPage=Session::get("AcheckPage");
                return redirect("Acheck/index?page={$currentPage}");
            }
        }else{
            return redirect('budadmin');
        }
    }
    public function delete($id)
    {
        if(Session::has('admin_id'))
        {
            $article=Article::find($id);
            $article->delete();
            $currentPage=Session::get("AcheckPage");
            return redirect("Acheck/index?page={$currentPage}");
        }else{
            return redirect('budadmin');
        }
    }
}
