@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','1')}}
@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <a class="card card-banner card-green-light" href="{{url("users/index")}}">
                <div class="card-body">
                    <i class="icon fa fa-users fa-4x"></i>
                    <div class="content">
                        <div class="title"></div>
                        <div class="value">
                            <span class="sign">用户列表</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <a class="card card-banner card-green-light" href="{{url("friend/index")}}">
                <div class="card-body">
                    <i class="icon fa fa-users fa-4x"></i>
                    <div class="content">
                        <div class="title"></div>
                        <div class="value">
                            <span class="sign">合作伙伴</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <a class="card card-banner card-green-light" href="{{url("article/index")}}">
                <div class="card-body">
                    <i class="icon fa fa-book fa-4x"></i>
                    <div class="content">
                        <div class="title"></div>
                        <div class="value">
                            <span class="sign">文章列表</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <a class="card card-banner card-green-light" href="{{url("Acheck/index")}}">
                <div class="card-body">
                    <i class="icon fa fa-book fa-4x"></i>
                    <div class="content">
                        <div class="title"></div>
                        <div class="value">
                            <span class="sign">投稿审核</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card card-mini">
                <div class="card-header">
                    <div class="card-title">运行环境</div>
                </div>
                <div class="card-body no-padding table-responsive">
                    <table class="table card-table">

                        <tbody>
                        <tr>
                            <td>主机：</td>
                            <td class="right">{{GetHostByName($_SERVER['SERVER_NAME'])}}</td>
                            <!-- <td><span class="badge badge-success badge-icon"><i class="fa fa-check" aria-hidden="true"></i><span>Complete</span></span></td> -->
                        </tr>
                        <tr>
                            <td>系统日期：</td>
                            <td class="right"><?php echo $showtime = date("Y-m-d H:i:s");?></td>
                            <!-- <td><span class="badge badge-warning badge-icon"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Pending</span></span></td> -->
                        </tr>
                        <tr>
                            <td>服务器端：</td>
                            <td class="right"><?PHP echo $_SERVER ['SERVER_SOFTWARE']; ?></td>
                            <!-- <td><span class="badge badge-primary badge-icon"><i class="fa fa-truck" aria-hidden="true"></i><span>Shipped</span></span></td> -->
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card card-mini">
                <div class="card-header">
                    <div class="card-title">软件信息</div>
                </div>
                <div class="card-body no-padding table-responsive">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>软件开发：</td>
                            <td>山东萌芽网络科技有限公司</td>
                        </tr>
                        <tr>
                            <td>授权使用：</td>
                            <td>泰安市泰山小荷公益事业发展中心</td>
                        </tr>
                        <tr>
                            <td>名称：</td>
                            <td>小荷公益官方网站后台管理系统</td>
                        </tr>
                        <tr>
                            <td>版本：</td>
                            <td>1.0.0</td>
                        </tr>
                        <tr>
                            <td>网址：</td>
                            <td><a href="http://www.mengyakeji.com" target="_blank">www.mengyakeji.com</a></td>
                        </tr>
                        <tr>
                            <td>QQ：</td>
                            <td><a href="http://wpa.qq.com/msgrd?v=3&uin=613114361&site=qq&menu=yes"><img src="{{ asset('user/images/button_11.gif') }}" alt="点击联系萌芽科技QQ客服"></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection