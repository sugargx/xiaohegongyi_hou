@extends('layouts.layout1')
@section('banner')
    <div class="d-relf-banner5 sab-bnr charity-overlay">
        <div class="container">
            <div class="d-help-sab-banner-text">
                <h2>意见反馈</h2>
                <ul class="breadcrumb">
                    <li><a href="{{url('login')}}">首页</a></li>
                    <li class="active">意见反馈</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <!--<div class="d-help-login-list">-->
        <div class="d-help-login">
            <h4>反馈成功！</h4>
        </div>
    </div>
@endsection