@extends('layouts.layout1')
@section('banner')
    <div class="d-relf-banner5 sab-bnr charity-overlay">
        <div class="container">
            <div class="d-help-sab-banner-text">
                <h2>{{$nav->name}}列表</h2>
                <ul class="breadcrumb">
                    <li><a href="{{url('index')}}">首页</a></li>
                    <li><a href="{{url('model',['alias'=>$nav->alias])}}">{{$nav->name}}</a></li>
                    <li class="active">{{$nav->name}}列表</li>
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
                    @foreach($projects as $pro)
                        <div class="d-help-blog-list listing">
                            <a href="{{ url('project_detail',['id'=>$pro->id]) }}">
                                {{ str_limit($pro->title,60,'...') }}
                                <span class="pull-right" style="color: #c0c0c0;">{{ $pro->time }}   <i class="fa fa-eye"></i>{{ $pro->brows }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
                @include('layouts.recommend')
            </div>
            <div class="row">
                <div class="pull-right">
                    {{$projects->render()}}
                </div>
            </div>
        </div>
    </section>
@endsection