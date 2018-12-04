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
                <div class="col-md-8">
                    @foreach($article as $ac)
                    <div class="d-help-blog-list listing">
                        <a href="{{ url('project_list',['id'=>$ac->id]) }}">
                            {{ str_limit($ac->name,60,'...') }}
                            <span class="pull-right" style="color: #c0c0c0;">{{ $ac->time }}   <i class="fa fa-eye"></i>{{ $ac->brows }}</span>
                        </a>
                    </div>
                    @endforeach
                </div>
                @include('layouts.recommend')
            </div>
            <div class="row">
                <div class="pull-right">
                    {{$article->render()}}
                </div>
            </div>
        </div>
    </section>
@endsection