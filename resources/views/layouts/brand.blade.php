<div class="d-help-brand theme-bg-color">
    <h2 style="text-align: center;color: #000;
    margin-top: -34px;
    margin-bottom: 16px;">爱心商家</h2>
    <div class="container">

        <div class="row">
            <div class="brand-slider">
                @foreach((\App\models\Article::where([['category','18'],['top','50000'],['state','10000']])->orderBy('time','desc')->get()) as $br)
                <div><a href="{{ url('detail',['id'=>$br->id]) }}"><img src="{{ url("$br->picture") }}" alt="">
                        <div class="businessname">{{str_limit($br->name,16,'...')}}</div>
                    </a></div>
                @endforeach
            </div>
        </div>

    </div>
</div>