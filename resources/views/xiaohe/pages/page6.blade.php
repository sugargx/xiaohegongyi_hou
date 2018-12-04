@extends('layouts.layout1')

@section('banner')
    <div class="d-relf-banner5 sab-bnr charity-overlay">
        <div class="container">
            <div class="d-help-sab-banner-text">
                <h2>{{$info->name}}</h2>
                <ul class="breadcrumb">
                    <li><a href="{{url('index')}}">首页</a></li>
                    <li><a class="active">{{$info->name}}</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section class="d-help-blog-grid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="h-delp-blog-detail">
                        <div class="d-help-blog-list detail">
                            <div class="d-help-blog-row listing2">
                                <div class="d-help-blog-text" style="text-indent: 2em;">
                                    <h2 style="text-align: center">{{$info->title}}</h2>
                                    @if($info->name=="联系我们"){!! $info->content !!}<iframe width='1170' height='440' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='http://f.amap.com/3scTO_0BC5E5n'></iframe>
                                    @else
                                    {!! $info->content !!}
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection