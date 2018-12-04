@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','3')}}
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    投稿列表
                </div>
                <div class="card-body no-padding">
                    <table class=" table table-striped primary" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>标题</th>
                            <th>作者</th>
                            <th>类别</th>
                            <th>浏览量</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->author }}</td>
                                <td>{{ $article->category($article->category) }}</td>
                                <td>{{ $article->brows }}</td>
                                <td>{{ $article->state3($article->state) }}</td>
                                <td>
                                    <a href="{{ url('detail',['id'=>$article->id]) }}"class="btn btn-info  btn-xs" role="button">预览</a>
                                    <a href="{{ url('Acheck/pass',['id'=>$article->id]) }}"class="btn btn-success btn-xs" role="button">通过</a>
                                    <a href="{{ url('Acheck/refuse',['id'=>$article->id]) }}"class="btn btn-warning  btn-xs" role="button">拒绝</a>
                                    <a href="{{ url('Acheck/delete',['id'=>$article->id]) }}"class="btn btn-danger btn-xs" role="button" onclick="if(confirm('确定要删除吗？')==false)return false;">删除</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bottom">
                <a class="btn btn-success" href="{{ url('Acheck/edit') }}">设置</a>
                <div class="footer" style="width: 70%;float: right;">
                    <div class="pull-right">
                        {{$articles->render()}}
                        {{\Illuminate\Support\Facades\Session::put('AcheckPage',$articles->currentPage())}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection