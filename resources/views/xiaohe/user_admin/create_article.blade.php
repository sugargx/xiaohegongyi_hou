@extends('xiaohe.user_admin.layout')
{{\Illuminate\Support\Facades\Session::put('page','3')}}
@section('content')
    <div class="col-md-12">
        <script type="text/javascript" charset="utf-8" src="{{ url('http://budcreate.com/Ueditor/ueditor.config.js') }}"></script>
        <script type="text/javascript" charset="utf-8" src="{{ url('http://budcreate.com/Ueditor/ueditor.all.min.js') }}"> </script>
        <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
        <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
        <script type="text/javascript" charset="utf-8" src="{{ url('http://budcreate.com/Ueditor/lang/zh-cn/zh-cn.js') }}"></script>
        <div class="card">
            <div class="card-header"><h3>文章发布</h3></div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>请输入单位名称</label>
                        <input type="text" placeholder=""autocomplete="off" class="form-control" name="User[name]" value="">
                    </div>
                    <div class="form-group">
                        <label>请输入单位地址</label>
                        <input type="text" placeholder=""autocomplete="off" class="form-control" name="User[place]" value="">
                    </div>
                    <div class="form-group">
                        <label>请输入文章标题</label>
                        <input type="text" placeholder=""autocomplete="off" class="form-control" name="User[title]" value="">
                    </div>
                    {{--<div class="col-md-12" style="height:15px;;"></div>--}}
                    <div class="form-group">
                        <label>请输入文章类型</label>
                        <div>
                            <select class="form-control input-md" name="User[category]">
                                @foreach($menu as $me)
                                    <option value="{{$me->id}}">&nbsp;{{$me->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    {{--发表时间--}}
                    <div class="form-group">
                        <label>请输入发布日期</label>
                        <input type="date" name="User[time]"  class="form-control" placeholder=" " aria-describedby="basic-addon1" value="">
                    </div>
                    <div class="form-group">
                        <label>请输入文章关键词</label>
                        <input type="text" placeholder=""autocomplete="off" class="form-control" name="User[keywords]" value="">
                    </div>
                    <div class="form-group">
                        <label>请输入文章摘要</label>
                        <input type="text" placeholder=""autocomplete="off" class="form-control" name="User[abstract]" value="">
                    </div>
                        <div class="form-group" >
                            <label>请输入文章内容</label>
                            <div >
                                <!-- 加载编辑器的容器 -->
                                <script id="container" name="User[content]" type="text/plain" style="height: 400px;">

                                </script>
                                <!-- 配置文件 -->
                                <script type="text/javascript" src="{{asset('ueditor/ueditor.config.js')}}"></script>
                                <!-- 编辑器源码文件 -->
                                <script type="text/javascript" src="{{asset('ueditor/ueditor.all.js')}}"></script>
                                <!-- 实例化编辑器 -->
                                <script type="text/javascript">
                                    var ue = UE.getEditor('container');
                                    ue.ready(function() {
                                        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                                    });
                                </script>
                            </div>
                        </div>
                    <br>
                    <div class="form-group">
                        <label>请输入封图</label>
                        <input type="file" placeholder="" class="form-control" name="picture" value="">
                    </div>
                    <button type="submit" class="btn btn-primary" value="" style="margin-top: 20px">保存</button>
                </form>
            </div>
        </div>
    </div>
@endsection