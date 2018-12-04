@extends('xiaohe.user_admin.layout')
{{\Illuminate\Support\Facades\Session::put('page','1')}}
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">我的信息</div>
            <div class="card-body no-padding">
                <table class="table">
                    <tbody>
                    <tr>
                        <td class="col-md-3">用户名</td>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <td class="col-md-3">性别</td>
                        <td>{{$user->sex1($user->sex)}}</td>
                    </tr>
                    <tr>
                        <td class="col-md-3">电话</td>
                        <td>{{$user->phone}}</td>
                    </tr>
                    <tr>
                        <td class="col-md-3">身份证号</td>
                        <td>{{$user->id_num}}</td>
                    </tr>
                    <tr>
                        <td class="col-md-3">常住地</td>
                        <td>{{$user->province}}-{{$user->city}}</td>
                    </tr>
                    <tr>
                        <td class="col-md-3">地址详情</td>
                        <td>{{$user->place}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection