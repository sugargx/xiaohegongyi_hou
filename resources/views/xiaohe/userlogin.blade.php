@extends('layouts.layout1')
@section('banner')
    <div class="d-relf-banner5 sab-bnr charity-overlay">
        <div class="container">
            <div class="d-help-sab-banner-text">
                <h2>登录</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ url('index') }}">首页</a></li>
                    <li class="active">登录</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="d-help-login-wrap">
            <div class="container">
                <div class="d-help-login-list">
                    <div class="d-help-login">
                        <h4>登录</h4>
                        <p>欢迎回来！请输入您的信息登录</p>
                        <form method="post" id="commentform1" class="d-help-comment-form-login">
                            {{ csrf_field() }}
                                    <!-- 失败提示框 -->
                            @if(\Illuminate\Support\Facades\Session::has('user_login'))
                                <div class="d-help-commet-field" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>登录失败!账号或密码不对！</strong>
                                </div>
                            @endif
                            <div class="d-help-commet-field">
                                <label>用户名</label>
                                <input placeholder="  用户名" name="User[name1]" autocomplete="off" type="text" value="{{ \Illuminate\Support\Facades\Cookie::get('name')?:'' }}" data-default="" size="30" required>
                            </div>
                            <div class="d-help-commet-field">
                                <label>密码</label>
                                <input placeholder="  密码" class="qcord" name="User[pwd]" type="password" value="{{ \Illuminate\Support\Facades\Cookie::get('pwd')?:'' }}" data-default="" size="30" required>
                            </div>
                            <p style="height: 25px;font-size: 15px;"><input type="checkbox" name="remember" {{ (\Illuminate\Support\Facades\Cookie::get('remember'))?'checked':'' }} value="yes" style="width: 15px;height:15px;">记住</p>
                            <div style="align-content: center;">
                                <button class="btn-d-help theme-bg-color">登录</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a class="btn-d-help theme-bg-color" href="{{ url('register') }}">注册</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection