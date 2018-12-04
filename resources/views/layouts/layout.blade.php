<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>小荷公益后台管理系统</title>
    <link rel="shortcut icon" type="image/x-icon" href="static/images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/flat-admin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/blue-sky.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/blue.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/red.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/yellow.css') }}">

</head>
<body>
<div class="app app-default">

    {{--left-body--}}
    <aside class="app-sidebar" id="sidebar">
        {{--header--}}
        <div class="sidebar-header">
            <a class="sidebar-brand" href="{{url('admin/index')}}"><span class="highlight">小荷公益</span>管理系统</a>
            <button type="button" class="sidebar-toggle">
                <i class="fa fa-times"></i>
            </button>
        </div>
        {{--menu--}}
        <div class="sidebar-menu">
            <ul class="sidebar-nav">
                {{--首页--}}
                <li class="{{ (\Illuminate\Support\Facades\Session::get('page_num')==1)?'active':''  }}">
                    <a href="{{ url('admin/index') }}" >
                        <div class="icon">
                            <i class="fa fa-server" aria-hidden="true"></i>
                        </div>
                        <div class="title">首页</div>
                    </a>
                </li>
                {{--人员管理--}}
                <li class="dropdown {{ (\Illuminate\Support\Facades\Session::get('page_num')==2)?'active':''}}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="icon">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <div class="title">人员管理</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="{{ url('admin') }}" >管理员</a></li>
                            <li><a href="{{ url('users/index')}}">用户管理</a></li>
                            {{--<li><a href="{{ url('vo/index') }}">志愿者管理</a></li>--}}
                        </ul>
                    </div>
                </li>
                {{--审核--}}
                <li class="dropdown {{ (\Illuminate\Support\Facades\Session::get('page_num')==3)?'active':''}}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="icon">
                            <i class="fa fa-check-square" aria-hidden="true"></i>
                        </div>
                        <div class="title">审核</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="{{ url('Ucheck/index') }}">用户审核</a></li>
                            <li><a href="{{ url('Acheck/index')}}">投稿审核</a></li>
                            {{--<li><a href="{{ url('feedback_index') }}">用户信息反馈</a></li>--}}
                        </ul>
                    </div>
                </li>
                {{--文章管理--}}
                <li class="dropdown {{ (\Illuminate\Support\Facades\Session::get('page_num')==4)?'active':''}}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="icon">
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </div>
                        <div class="title">文章管理</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            @foreach((\App\models\Menu::where('type','<','10')->get()) as $nav)
                                @if($nav->type==6)
                                    <li><a href="{{ url('info/index',['id'=>$nav->id]) }}">{{$nav->name}}</a></li>
                                @else
                                    <li><a href="{{ url('menu',['id'=>$nav->id]) }}">{{$nav->name}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </li>
                {{--内容管理--}}
                <li class="dropdown {{ (\Illuminate\Support\Facades\Session::get('page_num')==5)?'active':''}}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="icon">
                            <i class="fa fa-cube" aria-hidden="true"></i>
                        </div>
                        <div class="title">内容管理</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="{{ url('article/index') }}">文章列表</a></li>
                            <li><a href="{{ url('panel/index') }}">菜单管理</a></li>
                            <li><a href="{{ url('nav/index') }}">页面管理</a></li>
                        </ul>
                    </div>
                </li>
                {{--首页管理--}}
                <li class="dropdown {{ (\Illuminate\Support\Facades\Session::get('page_num')==6)?'active':''}}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="icon">
                            <i class="fa fa-cube" aria-hidden="true"></i>
                        </div>
                        <div class="title">首页管理</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="{{ url('pic/index') }}">幻灯片管理</a></li>
                            <li><a href="{{ url('index/info') }}">首页简介</a></li>
                            {{--<li><a href="{{ url('inform/index') }}">活动通知</a></li>--}}
                            <li><a href="{{ url('friend/index') }}">合作伙伴</a></li>
                        </ul>
                    </div>
                </li>
                {{--网站信息--}}
                <li class="{{ (\Illuminate\Support\Facades\Session::get('page_num')==7)?'active':''}}">
                    <a href="{{ url('web/index') }}">
                        <div class="icon">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                        </div>
                        <div class="title">网站信息</div>
                    </a>
                </li>
            </ul>
        </div>
        {{--footer--}}
        <div class="sidebar-footer">
            <ul class="menu">
                <li>
                    <a href="/" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    {{--right-body--}}
    <div class="app-container">
        {{--nav--}}
        <nav class="navbar navbar-default" id="navbar">
            <div class="container-fluid">
                <div class="navbar-collapse collapse in">
                    <ul class="nav navbar-nav navbar-mobile">
                        <li>
                            <button type="button" class="sidebar-toggle">
                                <i class="fa fa-bars"></i>
                            </button>
                        </li>
                        <li class="logo">
                            <a class="navbar-brand" href="#"><span class="highlight">小荷公益</span> Admin</a>
                        </li>
                        <li>
                            <button type="button" class="navbar-toggle">
                                <img class="profile-img" src="{{ asset('assets/images/profile.png') }}">
                            </button>
                        </li>
                    </ul>
                    {{--nav-left--}}
                    <ul class="nav navbar-nav navbar-left">
                        <li class="navbar-title">控制台</li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        {{--头像链接--}}
                        <li class="dropdown profile">
                            <a href="#" class="dropdown-toggle"  data-toggle="dropdown">
                            <img class="profile-img" src="{{ asset('user/images/header.png') }}">
                            <div class="title">头像</div>
                            </a>
                            <div class="dropdown-menu">
                                <div class="profile-info">
                                    <h4 class="username">管理员</h4>
                                </div>
                                <ul class="action">
                                    <li>
                                        <a href="{{ url('quit') }}"onclick="if(confirm('确定要退出吗？')==false)return false;">
                                            退出登录
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        {{--content--}}
        <div class="row" style="min-height: 800px;padding: 0 4% 0 4%">
            @yield('content')
        </div>
        {{--footer--}}
        <footer class="app-footer">
            <div class="row">
                <div class="col-xs-12">
                    <div class="footer-copyright">
                        Copyright © 2016 Company Co,Ltd.
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<script type="text/javascript" src="{{ asset('user/js/vendor.js') }}"></script>
<script type="text/javascript" src="{{ asset('user/js/app.js') }}"></script>

</body>
</html>