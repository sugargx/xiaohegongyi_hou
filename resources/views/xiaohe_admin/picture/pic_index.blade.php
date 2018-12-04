@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','6')}}
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    幻灯片列表
                </div>
                <div class="card-body no-padding">
                    <table class=" table " >
                        <thead>
                        <tr>
                            <th>名称</th>
                            <th>序号</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pics as $pic)
                        <tr>
                            <td>{{ $pic->name }}</td>
                            <td>{{ $pic->order1 }}</td>
                            <td>{{ $pic->state1( $pic->state) }}</td>
                            <td>
                                <a href="{{ url('pic/update',['id'=>$pic->id]) }}" class="btn btn-success btn-default btn-xs" role="button">修改</a>
                                <a href="{{ url('pic/delete',['id'=>$pic->id]) }}" class="btn btn-warning btn-default btn-xs" role="button" onclick="if(confirm('确定要删除吗？')==false)return false;">删除</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bottom">
                <a class="btn btn-success" href="{{ url('pic/add') }}">添加</a>
                <div class="footer" style="width: 70%;float: right;">
                    <div class="pull-right">
                        {{$pics->render()}}
                        {{\Illuminate\Support\Facades\Session::put('picPage',$pics->currentPage())}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection