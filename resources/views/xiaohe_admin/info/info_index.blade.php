@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','5')}}
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">编辑页</div>
                <div class="card-body no-padding">
                    <table class=" table table-striped primary" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>页面</th>
                            <th>标题</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $info->name }}</td>
                            <td>{{ $info->title }}</td>
                            <td>
                                <a href="{{ url('info/edit',['id'=>$info->id]) }}" class="btn btn-success btn-xs" role="button">编辑</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection