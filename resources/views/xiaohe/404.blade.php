@extends('layouts.layout1')
@section('banner')
    <div class="d-relf-banner5 sab-bnr charity-overlay">
        <div class="container">
            <div class="d-help-sab-banner-text">
                <h2>404错误</h2>
                <ul class="breadcrumb">
                    <li><a href="{{url('login')}}">首页</a></li>
                    <li class="active">404错误</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="d-help-login">
            <h2>您需要的页面找不到了！</h2>
            <h6>请返回上一级.</h6>
        </div>
    </div>
@endsection