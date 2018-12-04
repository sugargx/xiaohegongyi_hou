@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','2')}}
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                   管理员列表
                </div>
                <div class="card-body no-padding">
                    <table class=" table " >
                        <thead>
                        <tr>
                            <th>账号</th>
                            <th>姓名</th>
                            <th>状态</th>
                            <th>注册时间</th>
                            <th>修改时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin)
                        <tr>
                            <td>{{ $admin->account }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->state1( $admin->state) }}</td>
                            <td>{{ $admin->created_at }}</td>
                            <td>{{ $admin->updated_at }}</td>
                            <td>
                                <a href="{{ url('admin/update',['id'=>$admin->id]) }}" class="btn btn-success btn-default btn-xs" role="button">修改</a>
                                <a href="{{ url('admin/delete',['id'=>$admin->id]) }}" class="btn btn-warning btn-default btn-xs" role="button" onclick="if(confirm('确定要删除吗？')==false)return false;">删除</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bottom">
                <a class="btn btn-success" href="{{ url('admin/add') }}">添加</a>
                <div class="footer" style="width: 70%;float: right;">
                    <div class="pull-right">
                        {{$admins->render()}}
                        {{\Illuminate\Support\Facades\Session::put('adminPage',$admins->currentPage())}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection