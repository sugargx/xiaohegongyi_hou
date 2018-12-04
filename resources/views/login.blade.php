<!DOCTYPE html>
<html>
<head>
    <title>小荷公益管理系统</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flat-admin.css') }}">

    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/theme/blue-sky.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/theme/blue.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/red.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/yellow.css') }}">
    <script type="text/javascript" src="{{ asset('assets/js/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>

</head>
<body>
<div class="app app-default">

    <div class="app-container app-login">
        <div class="flex-center">
            <div class="app-header"></div>
            <div class="app-body">
                <div class="loader-container text-center">
                    <div class="icon">
                        <div class="sk-folding-cube">
                            <div class="sk-cube1 sk-cube"></div>
                            <div class="sk-cube2 sk-cube"></div>
                            <div class="sk-cube4 sk-cube"></div>
                            <div class="sk-cube3 sk-cube"></div>
                        </div>
                    </div>
                    <div class="title">小荷公益登录界面</div>
                </div>
                <div class="app-block">
                    <div class="app-form">
                        <div class="form-header">
                            <div class="app-brand"><span class="highlight">小荷公益</span> 管理系统</div>
                        </div>
                        <form  method="post" action="">
                            {{ csrf_field() }}
                            @if(\Illuminate\Support\Facades\Session::has('admin_login'))
                                <div class="input-group">
                                    <strong>登录失败!账号或密码不对！</strong>
                                </div>
                            @endif
                            <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">
                                    <i class="fa fa-user" aria-hidden="true"></i></span>
                                <input type="text" name="Admin[name]" class="form-control"autocomplete="off" value="{{ \Illuminate\Support\Facades\Cookie::get('admin_name')?:'' }}" placeholder="账号" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon2">
                                    <i class="fa fa-key" aria-hidden="true"></i></span>
                                <input type="password" name="Admin[pwd]" class="form-control" autocomplete="off" value="{{ \Illuminate\Support\Facades\Cookie::get('admin_pwd')?:'' }}" placeholder="密码" aria-describedby="basic-addon2">
                            </div>
                            <p style="height: 25px;font-size: 15px;"><input type="checkbox" name="remember" {{ (\Illuminate\Support\Facades\Cookie::get('admin_remember'))?'checked':'' }} value="yes" style="width: 15px;height:15px;">记住</p>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-submit" value="">登录</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>