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
                @foreach($article as $bu)
                <div class="col-md-3 col-sm-6">
                    <div class="d-help-team-fig">
                        <div class="d-help-team-thumb">
                            <img src="{{ isset($bu->picture)?url("$bu->picture"):url("static/images/null.jpg") }}" alt="">
                            <a class="icon-box" href="{{url('project_list',['id'=>$bu->id])}}"></a>
                        </div>
                        <div class="d-help-team-text">
                            <h4>{{ str_limit($bu->name,16,'...') }}</h4>
                            <span>{{str_limit($bu->place,16,'...')}}</span>
                            <p>{{ str_limit($bu->abstract,30,'...') }}</p>
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