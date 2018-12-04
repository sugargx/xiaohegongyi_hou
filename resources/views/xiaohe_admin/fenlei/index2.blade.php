@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','4')}}
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body no-padding">
                    <table class=" table table-striped primary" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>标题</th>
                            {{--<th>文章类别</th>--}}
                            <th>发表时间</th>
                            <th>浏览量</th>
                            <th>状态</th>
                            <th>序号</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{ str_limit($article->title,30,'...') }}</td>
                                {{--<td>{{str_limit( $article->category($article->category),10,'...') }}</td>--}}
                                <td>{{ $article->time }}</td>
                                <td>{{ $article->brows }}</td>
                                <td>{{ $article->state2($article->state) }}</td>
                                <td>{{ $article->order1 }}</td>
                                <td>
                                    {{--@if($article->recommend==30000)<a href="{{ url('assort_recommend',['id'=>$article->id,'type'=>$id]) }}" class="btn btn-primary btn-default btn-xs" role="button">已推荐</a>--}}
                                    {{--@else<a href="{{ url('assort_recommend',['id'=>$article->id,'type'=>$id]) }}" class="btn btn-primary btn-default btn-xs" role="button">未推荐</a>@endif--}}
                                    {{--@if($article->top==50000)<a href="{{ url('assort_top',['id'=>$article->id,'type'=>$id]) }}" class="btn btn-danger btn-default btn-xs" role="button">已置顶</a>--}}
                                    {{--@else<a href="{{ url('assort_top',['id'=>$article->id,'type'=>$id]) }}" class="btn btn-danger btn-default btn-xs" role="button">未置顶</a>@endif--}}
                                    <a href="{{ url('detail',['id'=>$article->id]) }}" class="btn btn-info btn-default btn-xs" role="button">预览</a>
                                    <a href="{{ url('assort/update',['id'=>$article->id,'type'=>$id]) }}" class="btn btn-success btn-default btn-xs" role="button">修改</a>
                                    <a href="{{ url('assort/delete',['id'=>$article->id,'type'=>$id]) }}"class="btn btn-warning btn-default btn-xs" role="button" onclick="if(confirm('确定要删除吗？')==false)return false;">删除</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bottom">
                <a class="btn btn-success" href="{{ url('menu/add2',['id'=>$id]) }}">添加</a>
                <div class="footer" style="width: 70%;float: right;">
                    <div class="pull-right">
                        {{$articles->render()}}
                        {{\Illuminate\Support\Facades\Session::put('assort2Page',$articles->currentPage())}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection