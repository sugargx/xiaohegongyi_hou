@extends('layouts.layout1')

@section('banner')
    <div class="d-relf-banner5 sab-bnr charity-overlay">
        <div class="container">
            <div class="d-help-sab-banner-text">
                <h2>活动通知列表页</h2>
                <ul class="breadcrumb">
                    <li><a href="{{url('index')}}">首页</a></li>
                    <li><a href="{{url('inform/lists')}}">活动通知列表页</a></li>
                    <li class="active">活动通知详情页</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section class="d-help-blog-grid">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @foreach($informs as $inform)
                    <div class="d-help-blog-list listing">
                        <a href="{{ url('inform',['id'=>$inform->id]) }}">
                            {{ str_limit($inform->title,60,'...') }}
                            <span class="pull-right" style="color: #c0c0c0;">{{ $inform->time }}</span>
                        </a>
                    </div>
                    @endforeach
                </div>
                @include('layouts.recommend')
            </div>
            <div class="row">
                <div class="pull-right">
                    {{$informs->render()}}
                </div>
            </div>
        </div>
    </section>
@endsection