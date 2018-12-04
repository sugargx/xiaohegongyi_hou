@extends('layouts.layout1')
@section('banner')
    <div class="d-relf-banner5 sab-bnr charity-overlay">
        <div class="container">
            <div class="d-help-sab-banner-text">
                <h2>活动通知详情页</h2>
                <ul class="breadcrumb">
                    <li><a href="{{url('index')}}">首页</a></li>
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
                    <div class="h-delp-blog-detail">
                        <div class="d-help-blog-list detail">
                            <div class="d-help-blog-row listing2">
                                <div class="d-help-blog-comment">
                                    <div class="d-help-blog-date">
                                        <p>时间{{ $article->time }}</p>
                                    </div>

                                </div>
                                <div class="d-help-blog-text">
                                    <h2>{{ $article->title }} </h2>
                                    {!! $article->content  !!}

                                </div>
                            </div>
                        </div>
                        <div class="h-delp-share-meta social">
                            <div class="btn_donate">
                                作者：{{ $article->author }}　录入：{{ $article->typist }}
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.recommend')
            </div>
        </div>
    </section>
@endsection