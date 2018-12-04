@extends('layouts.layout1')

@section('banner')
    @include('layouts.banner')
@endsection

@section('content')
    <div class="main-contant-wrap">
        {{--宗旨--}}
        <section class="d-help-about-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="d-help-about-fig">
                            <figure>
                                <img src="{{ asset("$time->picture1") }}">
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="d-help-about-text">
                            <h3><span>{{$time->title2}}</span></h3>
                            <p>{{$time->content2}}</p>
                            <div class="d-help-jhon">

                                <div class="d-help-jhon-text" style="display: inline-block;text-align: center;">
                                    <a href="{{url("founder")}}"><img src="{{ asset("$time->picture2") }}" alt="{{$time->name}}"></a>
                                    <h6><a href="{{url("founder")}}">{{$time->name}}</a></h6>
                                    <h6>{{$time->job}}</h6>
                                </div>

                                <div class="d-help-jhon-text"  style="display: inline-block;text-align: center;">
                                    <a href="{{url("founder")}}"><img src="{{ asset("$time->picture2") }}" alt="{{$time->name}}"></a>
                                    <h6><a href="{{url("founder")}}">{{$time->name}}</a></h6>
                                    <h6>{{$time->job}}</h6>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{--专业--}}
        {{--<section class="d-help-media">--}}
            {{--<div class="container">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-4 col-sm-4">--}}
                        {{--<div class="d-help-media-thumb">--}}
                            {{--<h6 class="media-thumb-title">专业</h6>--}}
									{{--<span>--}}
										{{--<i class="fa fa-users fa-4x"></i>--}}
									{{--</span>--}}
                            {{--<p>爱心服务弱势群体，志愿传承社会文明</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 col-sm-4">--}}
                        {{--<div class="d-help-media-thumb">--}}
                            {{--<h6 class="media-thumb-title">真诚</h6>--}}
									{{--<span>--}}
										{{--<i class="fa fa-heartbeat fa-4x"></i>--}}
									{{--</span>--}}
                            {{--<p>放飞心灵梦想，与爱携手同行</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 col-sm-4">--}}
                        {{--<div class="d-help-media-thumb">--}}
                            {{--<h6 class="media-thumb-title">资助</h6>--}}
									{{--<span>--}}
										{{--<i class="fa fa-handshake-o fa-4x"></i>--}}
									{{--</span>--}}
                            {{--<p>助残济困，安老扶幼</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}
        {{--活动通知--}}
        <section class="kode-event-time d-help-joining-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-5">
                        <div class="find-us-box">
                            <div class="find-us-heder">
                                <div class="content-blue">
                                    <h2><a style="color: white;" href="{{url('model',['alias'=>'notice'])}}">活动通知</a></h2>
                                    <p>我们期待您的参与！</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-7">
                        <div class="next-event-counter">
                                @foreach($index as $in)
                                    <div class="col-md-12">
                                        <div class="col-md-9">
                                            <a href="{{url('detail',['id'=>$in->id])}}" style="color: white;float: left;height:28px;">
                                                {{ str_limit($in->title,60,'...') }}
                                            </a>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="pull-right" style="color: white;">{{ $in->time }}</p>
                                        </div>
                                    </div>

                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{--公益项目--}}
        @if(isset($projects))
        <section class="d-help-causes-bg">
            <div class="container">
                <div class="d-help-section-title-new">
                    <h6>公益项目介绍</h6>
                    {{--<p>展示各种正在进行资助的项目</p>--}}
                </div>
                <div class="row">
                    @foreach($projects as $project)
                    <div class="col-md-4 col-sm-6">
                        <div class="d-help-causes">
                            <figure class="hover-overlay"><img src="{{ asset("$project->picture") }}" alt=""></figure>
                            <div class="text">
                                <h6 class="help-causes-title">{{str_limit($project->name,16,'...')}}</h6>
                                <a class="btn-d-help" href="{{url('project_list',['id'=>$project->id])}}">查看</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <a class="btn-lg btn-success" style="width:200px;margin:0 auto;margin-left: 535px;" href="{{url('model',['alias'=>'projects'])}}">查看更多</a>
                </div>
            </div>
        </section>
        @endif
        {{--志愿者风采--}}
        @if(isset($volunteers))
        <section class="d-help-causes-bg">
            <div class="container">
                <div class="d-help-section-title-new">
                    <h6>志愿者风采展示</h6>
                    {{--<p>精选的文章、感慨、笔记等展示在这里</p>--}}
                </div>
                <div class="row">
                    @foreach($volunteers as $vo)
                    <div class="col-md-4 col-sm-6">
                        <div class="d-help-blog-list">
                            <figure id="plate-inverse3" class="hover-overlay">
                                <img src="{{ asset("$vo->picture")}}" alt="">
                            </figure>
                            <div class="d-help-blog-row">
                                <div class="d-help-blog-comment">
                                    <div class="d-help-blog-date">
                                        <p>{{$vo->author}}</p>
                                    </div>
                                    <ul class="d-help-like">
                                        <li><a href="#"><i class="fa fa-eye"></i>浏览量{{$vo->brows}}</a></li>
                                    </ul>
                                </div>
                                <div class="d-help-blog-text">
                                    <h4>{{str_limit($vo->title,30,'...')}}</h4>
                                    <p>{!! str_limit($vo->abstract,30,'...')!!}</p>
                                    <a class="btn-d-help" href="{{url('detail',['id'=>$vo->id])}}">点击阅读</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                        <a class="btn-lg btn-success" style="width:200px;margin:0 auto;margin-left: 530px;" href="{{url('model',['alias'=>'volunteer'])}}">查看更多</a>
                </div>
            </div>
        </section>
        @endif
    </div>
@endsection