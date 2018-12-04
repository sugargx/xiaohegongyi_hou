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
                @foreach($article as $ar)
                <div class="col-md-4 col-sm-6">
                    <div class="d-help-causes">
                        <figure class="hover-overlay"><img src="{{ isset($ar->picture)?url("$ar->picture"):url("static/images/null.jpg") }}" alt=""></figure>
                        <div class="text">
                            <h6 class="help-causes-title"><a href="{{url('project_list',['id'=>$ar->id,])}}">{{str_limit($ar->name,16,'...')}}</a></h6>
                        </div><a class="btn-d-help" href="{{url('project_list',['id'=>$ar->id])}}">查看</a>
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