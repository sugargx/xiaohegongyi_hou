@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','5')}}
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                   页面管理
                </div>
                <div class="card-body no-padding">
                    <table class=" table table-striped primary" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>名称</th>
                            <th>别名 or URL</th>
                            <th>页面类型</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($navs as $nav)
                        <tr>
                            <td>{{ $nav->name }}</td>
                            <td>{{ $nav->alias }}</td>
                            <td>{{ $nav->type1($nav->type) }}</td>
                            <td>{{ $nav->state1($nav->state) }}</td>
                            <td>
                                <a href="{{ url('nav/update',['id'=>$nav->id]) }}"class="btn btn-success btn-default btn-xs" role="button">修改</a>
                                <a href="{{ url('nav/delete',['id'=>$nav->id]) }}"class="btn btn-warning btn-default btn-xs" role="button" onclick="if(confirm('确定要删除吗？')==false)return false;">删除</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bottom">
                <a class="btn btn-success" href="{{ url('nav/add') }}">添加</a>
                <div class="footer" style="width: 70%;float: right;">
                    <div class="pull-right">
                        {{$navs->render()}}
                        {{\Illuminate\Support\Facades\Session::put('navPage',$navs->currentPage())}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection