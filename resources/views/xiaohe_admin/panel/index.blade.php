@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','5')}}
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    菜单管理
                </div>
                <div class="card-body no-padding">
                    <table class=" table table-striped primary" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>名称</th>
                            <th>页面</th>
                            <th>序号</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($navs1 as $nav)
                        <tr>
                            <td>{{ $nav->name }}</td>
                            <td>{{ $nav->alias2($nav->alias) }}</td>
                            <td>{{ $nav->order1 }}</td>
                            <td>{{ $nav->state1($nav->state) }}</td>
                            <td>
                                <a href="{{ url('panel/add',['id'=>$nav->id]) }}"class="btn btn-info btn-xs" role="button">添加</a>
                                <a href="{{ url('panel/update',['id'=>$nav->id]) }}"class="btn btn-success btn-xs" role="button">修改</a>
                                <a href="{{ url('panel/delete',['id'=>$nav->id]) }}"class="btn btn-warning btn-xs" role="button" onclick="if(confirm('确定要删除吗？')==false)return false;">删除</a>
                            </td>
                        </tr>
                            @foreach($navs2 as $nav2)
                                @if($nav2->up==$nav->id)
                                    <tr>
                                        <td>{{ '—'.$nav2->name }}</td>
                                        <td>{{ $nav2->alias2($nav2->alias) }}</td>
                                        <td>{{ $nav2->order1 }}</td>
                                        <td>{{ $nav2->state1($nav2->state) }}</td>
                                        <td>
                                            <a href="{{ url('panel/add',['id'=>$nav2->id]) }}"class="btn btn-info btn-xs" role="button">添加</a>
                                            <a href="{{ url('panel/update',['id'=>$nav2->id]) }}"class="btn btn-success btn-xs" role="button">修改</a>
                                            <a href="{{ url('panel/delete',['id'=>$nav2->id]) }}"class="btn btn-warning btn-xs" role="button" onclick="if(confirm('确定要删除吗？')==false)return false;">删除</a>
                                        </td>
                                    </tr>
                                    @foreach($navs3 as $nav3)
                                        @if($nav3->up==$nav2->id)
                                            <tr>
                                                <td>{{ '——'.$nav3->name }}</td>
                                                <td>{{ $nav3->alias2($nav3->alias) }}</td>
                                                <td>{{ $nav3->order1 }}</td>
                                                <td>{{ $nav3->state1($nav3->state) }}</td>
                                                <td>
                                                    <a href="{{ url('panel/update',['id'=>$nav3->id]) }}"class="btn btn-success btn-xs" role="button">修改</a>
                                                    <a href="{{ url('panel/delete',['id'=>$nav3->id]) }}"class="btn btn-warning btn-xs" role="button" onclick="if(confirm('确定要删除吗？')==false)return false;">删除</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bottom">
                <a class="btn btn-success" href="{{ url('panel/add') }}">添加</a>
                <div class="footer" style="width: 70%;float: right;">
                    <div class="pull-right">
                        {{$navs1->render()}}
                        {{\Illuminate\Support\Facades\Session::put('panelPage',$navs1->currentPage())}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection