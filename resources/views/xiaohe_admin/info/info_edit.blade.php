@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','5')}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    编辑
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" action="">
                                {{ csrf_field() }}
                                {{--标题--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">标题</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1">
                                                            <i class="fa fa-square" aria-hidden="true"></i></span>
                                            <input type="text" name="Info[title]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('Info')['title']?old('Info')['title']:$info->title }}">
                                        </div>
                                    </div>
                                </div>
                                {{--内容--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">内容</label>
                                    <div class="col-md-8">
                                        <!-- 加载编辑器的容器 -->
                                        <script id="container" name="Info[content]" type="text/plain">
                                            {!! old('Info')['content']?old('Info')['content']:$info->content !!}
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
                                {{--提交--}}
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