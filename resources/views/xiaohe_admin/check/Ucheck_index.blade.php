@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','3')}}
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    用户审核
                </div>
                <div class="card-body no-padding">
                    <table class=" table table-striped primary" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>用户名</th>
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
                                    <a href="{{ url('users/detail1',['id'=>$user->id]) }}" class="btn btn-primary btn-default btn-xs" role="button">详情</a>
                                    <a href="{{ url('user/pass',['id'=>$user->id]) }}" class="btn btn-success btn-default btn-xs" role="button">通过</a>
                                    <a href="{{ url('user/delete',['id'=>$user->id]) }}"class="btn btn-warning btn-default btn-xs" role="button" onclick="if(confirm('确定要删除吗？')==false)return false;">删除</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bottom">
                <div class="footer" style="width: 70%;float: right;">
                    <div class="pull-right">
                        {{$users->render()}}
                        {{\Illuminate\Support\Facades\Session::put('UcheckPage',$users->currentPage())}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection