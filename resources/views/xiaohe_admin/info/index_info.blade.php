@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','6')}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    首页信息设置
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12" >
                            <form class="form-horizontal" method="post" action=""enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{--左侧大图--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">图片</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="fa fa-square" aria-hidden="true"></i></span>
                                            <input type="file" name="picture1" class="form-control" placeholder="" aria-describedby="basic-addon1" value="">
                                        </div>
                                    </div>
                                </div>
                                {{--宗旨标题--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">宗旨标题</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                            <input type="text"name="Time[title2]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('Time')['title2']?old('Time')['title2']:$time->title2 }}"required>
                                        </div>
                                    </div>
                                </div>
                                {{--宗旨内容--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">宗旨内容</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                            <input type="text"name="Time[content2]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('Time')['content2']?old('Time')['content2']:$time->content2 }}"required>
                                        </div>
                                    </div>
                                </div>
                                {{--姓名--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">姓名</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                            <input type="text"name="Time[name]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('Time')['name']?old('Time')['name']:$time->name }}"required>
                                        </div>
                                    </div>
                                </div>
                                {{--头像--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">头像</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="fa fa-square" aria-hidden="true"></i></span>
                                            <input type="file" name="picture2" class="form-control" placeholder="" aria-describedby="basic-addon1" value="">
                                        </div>
                                    </div>
                                </div>
                                {{--职务--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">职务</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                            <input type="text"name="Time[job]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('Time')['job']?old('Time')['job']:$time->job }}"required>
                                        </div>
                                    </div>
                                </div>
                                {{--个人资料--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">个人资料</label>
                                    <div class="col-md-8">
                                        <!-- 加载编辑器的容器 -->
                                        <script id="container" name="Time[content3]" type="text/plain">
                                            {!! old('Time')['content3']?old('Time')['content3']:$time->content3 !!}
                                        </script>
                                        <!-- 配置文件 -->
                                        <script type="text/javascript" src="{{asset('ueditor/ueditor.config.js')}}"></script>
                                        <!-- 编辑器源码文件 -->
                                        <script type="text/javascript" src="{{asset('ueditor/ueditor.all.js')}}"></script>
                                        <!-- 实例化编辑器 -->
                                        <script type="text/javascript">
                                            var ue = UE.getEditor('container');
                                            {{--ue.ready(function() {--}}
                                            {{--ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.--}}
                                            {{--});--}}
                                        </script>
                                    </div>
                                </div>
                                <br>
                                <div class="form-footer">
                                    <div class="form-group">
                                        <div class="col-md-9 col-md-offset-3">
                                            <button type="submit" class="btn btn-primary">保存</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection