@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','2')}}
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    用户列表
                </div>
                <div class="card-body no-padding">
                    <table class=" table table-striped primary" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>姓名</th>
                            <th>性别</th>
                            <th>手机号</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->sex1($user->sex) }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->state1($user->state) }}</td>
                            <td>
                                <a href="{{ url('users/detail',['id'=>$user->id]) }}" class="btn btn-primary btn-default btn-xs" role="button">详情</a>
                                <a href="{{ url('users/update',['id'=>$user->id]) }}" class="btn btn-success btn-default btn-xs" role="button">修改</a>
                                <a href="{{ url('users/delete',['id'=>$user->id]) }}" class="btn btn-warning btn-default btn-xs" role="button" onclick="if(confirm('确定要删除吗？')==false)return false;">删除</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bottom">
                <a class="btn btn-success" href="{{ url('users/add') }}">添加</a>
                <div class="footer" style="width: 70%;float: right;">
                    <div class="pull-right">
                        {{$users->render()}}
                        {{\Illuminate\Support\Facades\Session::put('usersPage',$users->currentPage())}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection