@extends('layouts.layout1')

@section('banner')
    <div class="d-relf-banner5 sab-bnr charity-overlay">
        <div class="container">
            <div class="d-help-sab-banner-text">
                <h2>个人资料</h2>
                <ul class="breadcrumb">
                    <li><a href="{{url('index')}}">首页</a></li>
                    <li><a class="active">个人资料</a></li>
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
                                    {!! $time->content3 !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection