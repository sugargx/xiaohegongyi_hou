<!DOCTYPE html>
<html>
<head>
    <title>用户个人中心</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/flat-admin.css') }}">
    <link href="{{ asset('user/css/font-awesome.min.css') }}" rel="stylesheet">

</head>
<body>
<div class="app app-default">
    <aside class="app-sidebar" id="sidebar">
        <div class="sidebar-header">
            <a class="sidebar-brand" href=""><span class="highlight">小荷公益</span>个人中心</a>
            <button type="button" class="sidebar-toggle">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="sidebar-menu">
            <ul class="sidebar-nav">
                <li class="{{ (\Illuminate\Support\Facades\Session::get('page')==1)?'active':'' }}">
                    <a href="{{ url('userindex') }}">
                        <div class="icon">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                        </div>
                        <div class="title">我的首页</div>
                    </a>
                </li>
                <li class="dropdown {{ (\Illuminate\Support\Facades\Session::get('page')==2)?'active':'' }}">
                    <a href="#">
                        <div class="icon">
                            <i class="fa fa-gear" aria-hidden="true"></i>
                        </div>
                        <div class="title">个人设置</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="{{url('setup')}}">个人信息修改</a></li>
                            <li><a href="{{url('pwd')}}">密码修改</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown {{ (\Illuminate\Support\Facades\Session::get('page')==3)?'active':'' }}">
                    <a href="">
                        <div class="icon">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                        </div>
                        <div class="title">我的文章</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="{{url('create/article')}}">发布文章</a></li>
                            <li><a href="{{url('record')}}">文章状态</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
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
    <div class="app-container">
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
                            <a class="navbar-brand" href="#"><span class="highlight">小荷公益</span></a>
                        </li>
                        <li>
                            <button type="button" class="navbar-toggle">
                                <img class="profile-img" src="{{ url('user/images/people.png') }}">
                            </button>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-left">
                        <li class="navbar-title">个人管理平台</li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown profile">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                <img class="profile-img" src="{{ url('user/images/header.png') }}">
                            </a>
                            <div class="dropdown-menu">
                                <div class="profile-info">
                                    <h4 class="username"></h4>
                                </div>
                                <ul class="action">
                                    <li>
                                        <a href="{{url('out')}}">退出</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row" style="min-height: 470px;">
            @yield('content')
        </div>
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
<script type="text/javascript" src="{{ asset('user/js/vendor.js')  }}"></script>
<script type="text/javascript" src="{{ asset('user/js/app.js') }}"></script>
</body>
</html>
