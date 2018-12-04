<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="Cache-Control" content="no-cache,no-store, must-revalidate">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>小荷公益官网</title>
    <link rel="shortcut icon" type="image/x-icon" href="static/images/favicon.ico" />
    <link href="{{ asset('static/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('static/js/dl-menu/component.css') }}" rel="stylesheet">
    <link href="{{ asset('static/css/slick-theme.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
    <link href="{{ asset('static/css/chosen.min.css') }}" rel="stylesheet">
    <link href="{{ asset('static/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('static/css/sidebar-widget.css') }}" rel="stylesheet">
    <link href="{{ asset('static/css/typography.css') }}" rel="stylesheet">
    <link href="{{ asset('static/css/shortcodes.css') }}" rel="stylesheet">
    <link href="{{ asset('static/style.css') }}" rel="stylesheet">
    <link href="{{ asset('static/css/color.css') }}" rel="stylesheet">
    <link href="{{ asset('static/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('static/css/layui.css') }}" rel="stylesheet">

</head>

<body id="main">
<div id="d-help" class="d-relf-wrapper">
    @include('layouts.header')
    @yield('banner')
    @yield('content')
    @include('layouts.brand')
    @include('layouts.footer')
    @include('layouts.copy_right')

</div>
<script src="{{ asset('static/js/jquery.js') }}"></script>
<script src="{{ asset('static/js/bootstrap.js') }}"></script>
<script src="{{ asset('static/js/slick.min.js') }}"></script>
<script src="{{ asset('static/js/dl-menu/modernizr.custom.js') }}"></script>
<script src="{{ asset('static/js/dl-menu/jquery.dlmenu.js') }}"></script>
<script src="{{ asset('static/js/jquery.plate.js') }}"></script>
<script src="{{ asset('static/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('static/js/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('static/js/pie.js') }}"></script>
<script src="{{ asset('static/js/waypoints.js') }}"></script>
<script src="{{ asset('static/js/downCount.js') }}"></script>
<script src="{{ asset('static/js/custom.js') }}"></script>

</body>
</html>
