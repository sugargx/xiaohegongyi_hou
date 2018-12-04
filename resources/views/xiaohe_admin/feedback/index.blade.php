@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','3')}}
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">用户反馈表
                </div>
                <div class="card-body no-padding">
                    <table class="datatable table " >
                        <thead>
                        <tr>
                            <th>姓名</th>
                            <th>手机号</th>
                            <th>内容</th>
                            <th>时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($feedbacks as $feedback)
                            <tr>
                                <td>{{ $feedback->name }}</td>
                                <td>{{ $feedback->email }}</td>
                                <td>{{ $feedback->content }}</td>
                                <td>{{ $feedback->created_at }}</td>
                                <td>
                                    <a href="{{ url('feedback_delete',['id'=>$feedback->id]) }}" class="btn btn-warning btn-default btn-xs" role="button" onclick="if(confirm('确定要删除吗？')==false)return false;">删除</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection