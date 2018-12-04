@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    文章类别列表
                </div>
                <div class="card-body no-padding">
                    <table class=" table table-striped primary" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>类别序号</th>
                            <th>名称</th>
                            <th>应用</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->type($category->type) }}</td>
                            <td>{{ $category->state($category->state) }}</td>
                            <td>
                                <a href="{{ url('cate/update',['id'=>$category]) }}" class="btn btn-success btn-default btn-xs" role="button">修改</a>
                                <a href="{{ url('cate/delete',['id'=>$category]) }}" class="btn btn-warning btn-default btn-xs" role="button"onclick="if(confirm('确定要删除吗？')==false)return false;">删除</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bottom">
                <a class="btn btn-success" href="{{ url('cate/add') }}">添加文章类别</a>
                <div class="footer" style="width: 70%;float: right;">
                    <div class="pull-right">
                        {{$categories->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection