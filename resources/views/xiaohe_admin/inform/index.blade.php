@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','6')}}
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">通知列表</div>
                <div class="card-body no-padding">
                    <table class=" table table-striped primary" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>标题</th>
                            <th>作者</th>
                            <th>发表时间</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr>
                                {{--<td>{{ str_limit($article->title,40,'...') }}</td>--}}
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->author }}</td>
                                <td>{{ $article->time }}</td>
                                <td>{{ $article->state2($article->state) }}</td>
                                <td>
                                    <a href="{{ url('inform/update',['id'=>$article->id]) }}"class="btn btn-success btn-default btn-xs" role="button">修改</a>
                                    <a href="{{ url('inform/delete',['id'=>$article->id]) }}"class="btn btn-warning btn-default btn-xs" role="button" onclick="if(confirm('确定要删除吗？')==false)return false;">删除</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bottom">
                <a class="btn btn-success" href="{{ url('inform/add') }}">添加</a>
                <div class="footer" style="width: 70%;float: right;">
                    <div class="pull-right">
                        {{$articles->render()}}
                        {{\Illuminate\Support\Facades\Session::put('informPage',$articles->currentPage())}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection