@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','6')}}
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    合作伙伴列表
                </div>
                <div class="card-body no-padding">
                    <table class=" table table-striped primary" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>名称</th>
                            <th>链接</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($friends as $friend)
                            <tr>
                                <td>{{ str_limit($friend->name,20,'...') }}</td>
                                <td>{{ str_limit($friend->url,20,'...') }}</td>
                                <td>{{ $friend->state1($friend->state) }}</td>
                                <td>
                                    <a href="{{ url('friend/update',['id'=>$friend->id]) }}" class="btn btn-success btn-default btn-xs" role="button">修改</a>
                                    <a href="{{ url('friend/delete',['id'=>$friend->id]) }}" class="btn btn-warning btn-default btn-xs" role="button" onclick="if(confirm('确定要删除吗？')==false)return false;">删除</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bottom">
                <a class="btn btn-success" href="{{ url('friend/add') }}">添加</a>
                <div class="footer" style="width: 70%;float: right;">
                    <div class="pull-right">
                        {{$friends->render()}}
                        {{\Illuminate\Support\Facades\Session::put('friendPage',$friends->currentPage())}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection