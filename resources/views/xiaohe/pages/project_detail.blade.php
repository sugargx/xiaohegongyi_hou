@extends('layouts.layout1')
@section('banner')
    <div class="d-relf-banner5 sab-bnr charity-overlay">
        <div class="container">
            <div class="d-help-sab-banner-text">
                <h2>{{$nav->name}}详情</h2>
                <ul class="breadcrumb">
                    <li><a href="{{url('index')}}">首页</a></li>
                    <li><a href="{{url('model',['alias'=>$nav->alias])}}">{{$nav->name}}</a></li>
                    <li><a href="{{url('project_list',['id'=>$project->type])}}">{{$nav->name}}列表</a></li>
                    <li class="active">{{$nav->name}}详情</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section class="d-help-blog-grid">
        <div class="container">
            <div class="col-md-8">
                <div class="d-help-causes-detail">
                    <div class="d-help-causes-dtl-text">
                        <h2>{{$project->title}}</h2>
                        {!! $project->content !!}
                    </div>
                </div>
            </div>
            @include('layouts.recommend')
        </div>
    </section>
@endsection