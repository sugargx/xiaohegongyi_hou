<footer class="d-help-footer footer2 overlay">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="widgetwidget-email"style="margin-top:20px;">
                    <h2 class="widget-title">合作伙伴</h2>
                    @foreach((\App\models\Friend::where('state',1)->get()) as $friend)
                        <div class="item"style="display:inline-block;margin:010px;">
                            <a href="{{url("$friend->url")}}">
                                <img src="{{ isset($friend->picture)?url("$friend->picture"):url("static/images/null.jpg") }}"alt="" width="164px;height:150px">
                            </a>
                            <div class="name"style="margin:10px 45px 0 10px;">
                                <p style="color: white;">{{ str_limit($friend->name,14,'...') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="widget widget-email">
                    <h2 class="widget-title">关于我们</h2>
                    <p>只要您有爱心，都可以作为志愿者参与到小荷公益的各项活动中来。爱心不分形式，奉献无论大小。捐款捐物，助学助老，志愿服务，后勤保障，用爱浇灌每一份志愿，期待您的加入！</p>
                </div>
            </div>
        </div>
    </div>
</footer>