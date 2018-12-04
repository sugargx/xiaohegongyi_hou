@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','5')}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    修改文章
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                {{ csrf_field() }}
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
                                {{--志愿者--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">志愿者</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1">
                                                            <i class="fa fa-square" aria-hidden="true"></i></span>
                                            <input type="text" name="At[volunteer]" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('At')['volunteer']?old('At')['volunteer']:$article->volunteer }}">
                                        </div>
                                    </div>
                                </div>
                                {{--筹款目标--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">筹款目标</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1">
                                                            <i class="fa fa-square" aria-hidden="true"></i></span>
                                            <input type="text" name="At[goal]" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('At')['goal']?old('At')['goal']:$article->goal }}">
                                        </div>
                                    </div>
                                </div>
                                {{--已筹金额--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">已筹金额</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1">
                                                            <i class="fa fa-square" aria-hidden="true"></i></span>
                                            <input type="text" name="At[done]" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('At')['done']?old('At')['done']:$article->done }}">
                                        </div>
                                    </div>
                                </div>
                                {{--捐赠者--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">捐赠者</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1">
                                                            <i class="fa fa-square" aria-hidden="true"></i></span>
                                            <input type="text" name="At[donate]" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('At')['donate']?old('At')['donate']:$article->donate }}">
                                        </div>
                                    </div>
                                </div>
                                {{--类别--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">应用类型</label>
                                    <div class="col-xs-8">
                                        <div>
                                            <select class="form-control input-md" name="At[category]">
                                                <option value="0">&nbsp;——请选择导航栏——</option>
                                                @foreach($navs as $nav)
                                                    <option {{ isset($article->category) && $article->category==$nav->id?'selected':'' }} value="{{$nav->id}}">&nbsp;——{{$nav->name}}——</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
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
                                            <input type="file" name="picture" class="form-control" placeholder="" aria-describedby="basic-addon1" value="">
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
                                        <script id="container" name="At[content]" type="text/plain" style="height: 400px;">
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
                                                {{--ue.getPlainTxt('serverparam', '_token', '{{ csrf_token() }}');--}}
                                                {{--ue.execCommand("serverparam",'{!! html_entity_decode($article->content) !!}')--}}
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