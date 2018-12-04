@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','4')}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    添加文章
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" action="{{url('save',['id'=>$id])}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="At[category]"value="{{$article->category}}">
                                {{--名称--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">名称</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1">
                                                            <i class="fa fa-square" aria-hidden="true"></i></span>
                                            <input type="text" name="At[name]" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('At')['name']?old('At')['name']:$article->name }}">
                                        </div>
                                    </div>
                                </div>
                                {{--地址--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">地址</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1">
                                                            <i class="fa fa-square" aria-hidden="true"></i></span>
                                            <input type="text" name="At[place]" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('At')['place']?old('At')['place']:$article->place }}">
                                        </div>
                                    </div>
                                </div>
                                {{--标题--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">标题</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1">
                                                            <i class="fa fa-square" aria-hidden="true"></i></span>
                                            <input type="text" name="At[title]" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('At')['title']?old('At')['title']:$article->title }}">
                                        </div>
                                    </div>
                                </div>
                                {{--作者--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">作者</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1">
                                                            <i class="fa fa-user" aria-hidden="true"></i></span>
                                            <input type="text" name="At[author]" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('At')['author']?old('At')['author']:$article->author }}">
                                        </div>
                                    </div>
                                </div>
                                {{--录入--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">录入</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1">
                                                            <i class="fa fa-square" aria-hidden="true"></i></span>
                                            <input type="text" name="At[typist]" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('At')['typist']?old('At')['typist']:$article->typist }}">
                                        </div>
                                    </div>
                                </div>
                                {{--链接--}}
                                {{--<div class="form-group">--}}
                                {{--<label class="col-md-2 control-label">链接</label>--}}
                                {{--<div class="col-xs-8">--}}
                                {{--<div class="input-group">--}}
                                {{--<span class="input-group-addon" id="basic-addon1">--}}
                                {{--<i class="fa fa-share-alt " aria-hidden="true"></i></span>--}}
                                {{--<input type="text" name="At[link]"  class="form-control" placeholder=" " aria-describedby="basic-addon1" value="">--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--发表时间--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">发布日期</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1">
                                                            <i class="fa fa-calendar " aria-hidden="true"></i></span>
                                            <input type="date" name="At[time]"  class="form-control" placeholder=" " aria-describedby="basic-addon1" value="{{ old('At')['time']?old('At')['time']:$article->time }}">
                                        </div>
                                    </div>
                                </div>
                                {{--推荐--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">是否推荐</label>
                                    <div class="col-xs-8">
                                        <div>
                                            @foreach($article->recommend() as $ind=>$val)
                                                <div class="radio radio-inline">
                                                    <input type="radio" {{ (isset($article->recommend) && $article->recommend==$ind)?'checked':'' }} name="At[recommend]" id="{{$ind}}" value="{{$ind}}" >
                                                    <label for="{{$ind}}">
                                                        {{$val}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                {{--置顶--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">是否置顶</label>
                                    <div class="col-xs-8">
                                        <div>
                                            @foreach($article->top() as $ind=>$val)
                                                <div class="radio radio-inline">
                                                    <input type="radio" {{ (isset($article->top) && $article->top==$ind)?'checked':'' }} name="At[top]" id="{{$ind}}" value="{{$ind}}" >
                                                    <label for="{{$ind}}">
                                                        {{$val}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                {{--显示--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">是否显示</label>
                                    <div class="col-xs-8">
                                        <div>
                                            @foreach($article->state() as $ind=>$val)
                                                <div class="radio radio-inline">
                                                    <input type="radio" {{ (isset($article->state) && $article->state==$ind)?'checked':'' }} name="At[state]" id="{{$ind}}" value="{{$ind}}" >
                                                    <label for="{{$ind}}">
                                                        {{$val}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                {{--关键词--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">关键词</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1">
                                                            <i class="fa fa-thumb-tack" aria-hidden="true"></i></span>
                                            <input type="text"  name="At[keywords]"  class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('At')['keywords']?old('At')['keywords']:$article->keywords }}">
                                        </div>
                                    </div>
                                </div>
                                {{--图片--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">封面图片</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1">
                                                            <i class="fa fa-square" aria-hidden="true"></i></span>
                                            <input type="file" name="image" class="form-control" placeholder="" aria-describedby="basic-addon1" value="">
                                        </div>
                                    </div>
                                </div>
                                {{--摘要--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">摘要</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="fa fa-tag" aria-hidden="true"></i></span>
                                            <input type="text"  name="At[abstract]"  class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('At')['abstract']?old('At')['abstract']:$article->abstract }}">
                                        </div>
                                    </div>
                                </div>
                                {{--内容--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">内容</label>
                                    <div class="col-md-8">
                                        <!-- 加载编辑器的容器 -->
                                        <script id="container" name="At[content]" type="text/plain">
                                            {!! old('At')['content']?old('At')['content']:$article->content !!}
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
                                            <button type="button" class="btn btn-default">取消</button>
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