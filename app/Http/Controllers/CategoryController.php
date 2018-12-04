<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function cate_index()
    {
        if(Session::has('admin_id'))
        {
            $categories=Category::paginate(10);
            return view('xiaohe_admin.category.cate_index',compact('categories'));
        }else{
            return redirect('budadmin');
        }
    }
    public function cate_add(Request $request)
    {
        if(Session::has('admin_id'))
        {
            $cate=new Category();
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input(),[
                    'Cat.name'=>'required|min:2|max:20',
                    'Cat.type'=>'required',
                    'Cat.state'=>'required',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 长度不符合要求',
                    'max'=>':attribute 长度不符合要求',
                ],[
                    'Cat.name'=>'名称',
                    'Cat.type'=>'类型',
                    'Cat.state'=>'状态',
                ]);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data=$request->input('Cat');
                $cate->name=$data['name'];
                $cate->type=$data['type'];
                $cate->state=$data['state'];
                if($cate->save()){
                    return redirect('cate/index');
                }else{
                    return redirect('login');
                }
            }
            return view('xiaohe_admin.category.cate_add',compact('cate'));
        }else{
            return redirect('budadmin');
        }
    }
    public function cate_update(Request $request,$id)
    {
        if(Session::has('admin_id'))
        {
            $cate=Category::find($id);
            if($request->isMethod('post'))
            {
                $validator=Validator::make($request->input(),[
                    'Cat.name'=>'required|min:2|max:20',
                    'Cat.type'=>'required',
                    'Cat.state'=>'required',
                ],[
                    'required'=>':attribute 为必填项',
                    'min'=>':attribute 长度不符合要求',
                    'max'=>':attribute 长度不符合要求',
                ],[
                    'Cat.name'=>'名称',
                    'Cat.type'=>'类型',
                    'Cat.state'=>'状态',
                ]);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data=$request->input('Cat');
                $cate->name=$data['name'];
                $cate->type=$data['type'];
                $cate->state=$data['state'];
                if($cate->save()){
                    return redirect('cate/index');
                }else{
                    return redirect('login');
                }
            }
            return view('xiaohe_admin.category.cate_update',compact('cate'));
        }else{
            return redirect('budadmin');
        }
    }
    public function cate_delete($id)
    {
        if(Session::has('admin_id'))
        {
            $cate=Category::find($id);
            if($cate->delete()){
                return redirect('cate/index');
            }else{
                return redirect('login');
            }
        }else{
            return redirect('budadmin');
        }
    }
}
