<div class="d-relf-banner5 custom-slider" style="height: 400px;margin-top: 138px">
    {{--<div class="d-help-slider-for2 ">--}}
        <li>
            {{--<div data-rel="prettyphoto[]" href="https://www.baidu.com/">--}}
                <div class="layui-carousel" id="test10">
                    <div carousel-item="">
                        @foreach((\App\models\Picture::where('state','10')->orderBy('order1','asc')->get()) as $pic)
                        <div>
                            <a href="{{url("$pic->url")}}"><img src="{{ asset("$pic->picture") }}" style="height: 400px;width: 100%"></a>
                            <div style="position: absolute;top:50%;left:50%;color: #fff;font-weight:600;font-size: 40px;max-width: 50%;
    text-align: center;transform: translate(-50%, -50%);">
                               {{$pic->content}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            {{--</div>--}}
        </li>
    {{--</div>--}}
</div>
<script src="{{ asset('static/js/layui.js') }}" charset="utf-8"></script>
<script>
    layui.use(['carousel', 'form'], function(){
        var carousel = layui.carousel
                ,form = layui.form;
        carousel.render({
            elem: '#test10'
            ,width: '100%'
            ,height: '400px'
            ,interval: 5000
        });
    });
</script>