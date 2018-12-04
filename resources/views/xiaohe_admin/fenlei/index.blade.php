@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','4')}}
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-8">
                        文章列表
                    </div>
                    <div class="col-md-4">
                        <form action="{{url("search/assort/index/{$id}")}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input name="search3" type="text" placeholder="查找...">
                            <button class="btn-search" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="card-body no-padding">
                    <table class=" table table-striped primary" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>名称</th>
                            <th>序号</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($assorts as $assort)
                            <tr>
                                <td>{{ $assort->name }}</td>
                                <td>{{ $assort->order1 }}</td>
                                <td>{{ $assort->state1($assort->state) }}</td>
                                <td>
                                    @if($assort->recommend==1)<a href="{{ url('assort/recommend',['id'=>$assort->id]) }}" class="btn btn-primary btn-default btn-xs" role="button">已推荐</a>
                                    @else<a href="{{ url('assort/recommend',['id'=>$assort->id]) }}" class="btn btn-primary btn-default btn-xs" role="button">未推荐</a>@endif
                                    @if($assort->top==1)<a href="{{ url('assort/top',['id'=>$assort->id]) }}" class="btn btn-danger btn-default btn-xs" role="button">已置顶</a>
                                    @else<a href="{{ url('assort/top',['id'=>$assort->id]) }}" class="btn btn-danger btn-default btn-xs" role="button">未置顶</a>@endif
                                    <a href="{{ url('assort',['id'=>$assort->id]) }}" class="btn btn-success btn-info btn-xs" role="button">文章列表</a>
                                    <a href="{{ url('assort/update',['id'=>$assort->id]) }}" class="btn btn-success btn-default btn-xs" role="button">修改</a>
                                    <a href="{{ url('assort/delete',['id'=>$assort->id]) }}" class="btn btn-warning btn-default btn-xs" role="button" onclick="if(confirm('确定要删除吗？')==false)return false;">删除</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bottom">
                <a class="btn btn-success" href="{{ url('assort/add',['id'=>$id]) }}">添加</a>
                <div class="footer" style="width: 70%;float: right;">
                    <div class="pull-right">
                        {{$assorts->render()}}
                        {{\Illuminate\Support\Facades\Session::put('assortPage',$assorts->currentPage())}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection