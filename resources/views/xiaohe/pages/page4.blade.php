@extends('layouts.layout1')
@section('banner')
    <div class="d-relf-banner5 sab-bnr charity-overlay">
        <div class="container">
            <div class="d-help-sab-banner-text">
                <h2>{{$nav->name}}</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ url('index') }}">首页</a></li>
                    <li class="active">{{$nav->name}}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section class="d-help-blog-grid">
        <div class="container">
            <div class="row">
                @foreach($article as $vo)
                <div class="col-md-4 col-sm-6">
                    <div class="d-help-blog-list">
                        <figure id="plate-inverse3" class="hover-overlay">
                            <img src="{{ isset($vo->picture)?url("$vo->picture"):url("static/images/null.jpg") }}" alt="">
                        </figure>
                        <div class="d-help-blog-row">
                            <div class="d-help-blog-comment">
                                <div class="d-help-blog-date">
                                    <p>{{ $vo->author }}</p>
                                </div>
                                <ul class="d-help-like">
                                    <li><i class="fa fa-eye"></i>浏览量{{ $vo->brows }}</li>
                                </ul>
                            </div>
                            <div class="d-help-blog-text">
                                <h4><a href="{{url('detail',['id'=>$vo->id])}}">{{ str_limit($vo->title,30,'...') }}</a></h4>
                                <p>{{ str_limit($vo->abstract,30,'...') }}</p>
                                <a class="btn-d-help" href="{{url('detail',['id'=>$vo->id])}}">点击阅读</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="row">
                <div class="pull-right">
                    {{$article->render()}}
                </div>
            </div>
        </div>
    </section>
@endsection