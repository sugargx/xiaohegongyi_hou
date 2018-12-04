<?php

namespace App\Http\Controllers;

use App\models\Menu;
use App\models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WebsiteController extends Controller
{
    public function web_index(Request $request)
    {
        if(Session::has('admin_id'))
        {
            $web=Website::find('1');
            if($request->isMethod('post'))
            {
                $data=$request->input('Web');
                $web->name=$data['name'];
                $web->keywords=$data['keywords'];
                $web->des=$data['des'];
                $web->email=$data['email'];
                $web->telephone=$data['telephone'];
                $web->mobile=$data['mobile'];
                $web->place=$data['place'];
                $web->record=$data['record'];
                $web->footer=$data['footer'];
                if($web->save()){
                    return redirect('web/index');
                }
            }
            return view('xiaohe_admin.website.web_index',compact('web'));
        }else{
            return redirect('budadmin');
        }
    }
}
