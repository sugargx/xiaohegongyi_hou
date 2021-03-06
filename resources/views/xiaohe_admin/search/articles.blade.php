@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','5')}}
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    {{--<a class="btn btn-success" href="{{ url('article_add') }}">添加文章</a>--}}
                    <div class="col-md-8">
                        文章列表
                    </div>
                    <div class="col-md-4">
                        <form action="{{url("search/articles")}}" method="post">
                            {{ csrf_field() }}
                            <input name="search1" type="text" placeholder="查找...">
                            <button class="btn-search" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="card-body no-padding">
                    <table class=" table " cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>标题</th>
                            <th>文章类别</th>
                            <th>发表时间</th>
                            <th>浏览量</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles1 as $article)
                            <tr>
                                {{--<td>{{ str_limit($article->title,40,'...') }}</td>--}}
                                <td>{{ $article->title }}</td>
                                <td>{{str_limit( $article->category($article->category),10,'...') }}</td>
                                <td>{{ $article->time }}</td>
                                <td>{{ $article->brows }}</td>
                                <td>{{ $article->state2($article->state) }}</td>
                                <td>
                                    @if($article->recommend==30000)<a href="{{ url('search/article/recommend',['id'=>$article->id]) }}" class="btn btn-primary btn-default btn-xs" role="button">已推荐</a>
                                    @else<a href="{{ url('search/article/recommend',['id'=>$article->id]) }}" class="btn btn-primary btn-default btn-xs" role="button">未推荐</a>@endif
                                    @if($article->top==50000)<a href="{{ url('search/article/top',['id'=>$article->id]) }}" class="btn btn-danger btn-default btn-xs" role="button">已置顶</a>
                                    @else<a href="{{ url('search/article/top',['id'=>$article->id]) }}" class="btn btn-danger btn-default btn-xs" role="button">未置顶</a>@endif
                                    <a href="{{ url('detail',['id'=>$article->id]) }}" class="btn btn-info btn-default btn-xs" role="button">预览</a>
                                    {{--<a href="{{ url('article/update',['id'=>$article->id]) }}" class="btn btn-success btn-default btn-xs" role="button">修改</a>--}}
                                    <a href="{{ url('search/article/delete',['id'=>$article->id]) }}"class="btn btn-warning btn-default btn-xs" role="button" onclick="if(confirm('确定要删除吗？')==false)return false;">删除</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{--<div class="bottom">--}}
                {{--<a class="btn btn-success" href="{{ url('nav/add') }}">添加</a>--}}
                {{--<div class="footer" style="width: 70%;float: right;">--}}
                    {{--<div class="pull-right">--}}
                        {{--{{$articles1->links()}}--}}
                        {{--{{\Illuminate\Support\Facades\Session::put('search1Page',$articles1->currentPage())}}--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>

@endsection