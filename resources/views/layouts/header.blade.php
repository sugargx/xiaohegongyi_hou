<header class="d-hlp-header6">
    <div class="d-help-top-wrap">
        <div class="container" style="width: 100%;padding-left: 0px;padding-right: 0px">
            <div class="d-help-top-text">
                <div class="d-help-top-contact">
                    <ul class="d-help-call-us">
                        <li><a href="{{url('userlogin')}}" target="_blank"><i class="fa fa-file-text">  我要投稿</i></a></li>
                        <li><a href="{{url('budadmin')}}" target="_blank"><i class="fa fa-user "></i>管理员登录入口</a></li>
                    </ul>
                </div>
            </div>
            <div class="d-help-navi-wrap">
                <div class="d-help-top-logo">
                    <a href="{{ url('index')}}"><img src="{{ url('static/images/logo.jpg') }}" alt=""></a>
                </div>
                <div class="d-help-navigation-wrap">
                    <nav class="navigation">
                        <ul>
                            <li><a href="{{url('index')}}">主页</a></li>
                            @foreach((\App\models\Nav::where([['state','10'],['type',1]])->orderBy('order1','asc')->get()) as $nav1)
                                <li>@if($nav1->alias==0)<a>{{$nav1->name}}</a>
                                    @else<a href="{{url('model',['id'=>$nav1->alias3($nav1->alias)])}}">{{$nav1->name}}</a>
                                    @endif
                                    @if($nav1->down==1)
                                    <ul class="chlid">
                                        @foreach((\App\models\Nav::where([['state','10'],['type',2],['up',$nav1->id]])->orderBy('order1','asc')->get()) as $nav2)
                                            <li>@if($nav2->alias==0)<a>{{$nav2->name}}</a>
                                                @else<a href="{{url('model',['id'=>$nav2->alias3($nav2->alias)])}}">{{$nav2->name}}</a>
                                                @endif
                                                @if($nav2->down==1)
                                                <ul class="chlid">
                                                    @foreach((\App\models\Nav::where([['state','10'],['type',3],['up',$nav2->id]])->orderBy('order1','asc')->get()) as $nav3)
                                                        <li>@if($nav3->alias==0)<a>{{$nav3->name}}</a>
                                                            @else<a href="{{url('model',['id'=>$nav3->alias3($nav3->alias)])}}">{{$nav3->name}}</a>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                            @endforeach
                            <li><a href="{{ url('model',['alias'=>'projects']) }}" class="btn-default theme-bg-color">我要捐赠</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>