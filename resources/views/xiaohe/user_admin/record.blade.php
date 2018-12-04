@extends('xiaohe.user_admin.layout')
{{\Illuminate\Support\Facades\Session::put('page','3')}}
@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">我的文章</div>
            <div class="card-body no-padding">
                <table class=" table">
                    <thead>
                    <th>标题</th>
                    <th>类型</th>
                    <th>日期</th>
                    <th>状态</th>
                    <th>操作</th>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td>{{str_limit($article->title,20,'...')}}</td>
                        <td>{{$article->category($article->category)}}</td>
                        <td>{{$article->time}}</td>
                        <td>{{$article->state3($article->state)}}</td>
                        <td>
                            <a href="{{ url('update/article',['key'=>$article->id]) }}" class="btn btn-info btn-default btn-xs" role="button">修改</a>
                            <a href="{{ url('publish/article',['key'=>$article->id]) }}" class="btn btn-success btn-default btn-xs" role="button">发布</a>
                            <a href="{{ url('delete/article',['Key'=>$article->id]) }}" class="btn btn-danger btn-default btn-xs" role="button">删除</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="bottom">
            {{--<a class="btn btn-success" href="{{ url('pic/add') }}">添加</a>--}}
            <div class="footer" style="width: 70%;float: right;">
                <div class="pull-right">
                    {{$articles->render()}}
                    {{\Illuminate\Support\Facades\Session::put('usePage',$articles->currentPage())}}
                </div>
            </div>
        </div>
    </div>
@endsection