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
                            <form class="form-horizontal" method="post" action="{{ url('save') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <input type="hidden" name="At[category]"value="{{$id}}">
                                @if($type==3)
                                    {{--名称--}}
                                    <div class="col-md-12">
                                        <div class="form-group col-md-8">
                                            <label class="col-md-2 control-label">名称</label>
                                            <div class="col-xs-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1">
                                                        <i class="fa fa-square" aria-hidden="true"></i></span>
                                                    <input type="text" name="At[name]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('At')['name']?old('At')['name']:$article->name }}"required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="form-control-static text-danger">{{$errors->first('At.name')}}</p>
                                        </div>
                                    </div>
                                    {{--地址--}}
                                    <div class="col-md-12">
                                        <div class="form-group  col-md-8">
                                            <label class="col-md-2 control-label">地址</label>
                                            <div class="col-xs-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1">
                                                        <i class="fa fa-square" aria-hidden="true"></i></span>
                                                    <input type="text" name="At[place]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('At')['place']?old('At')['place']:$article->place }}"required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="form-control-static text-danger">{{$errors->first('At.place')}}</p>
                                        </div>
                                    </div>
                                @endif
                                {{--标题--}}
                                <div class="col-md-12">
                                    <div class="form-group col-md-8">
                                        <label class="col-md-2 control-label">标题</label>
                                        <div class="col-xs-8">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">
                                                    <i class="fa fa-square" aria-hidden="true"></i></span>
                                                <input type="text" name="At[title]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('At')['title']?old('At')['title']:$article->title }}"required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="form-control-static text-danger">{{$errors->first('At.title')}}</p>
                                    </div>
                                </div>

                                {{--作者--}}
                                <div class="col-md-12">
                                    <div class="form-group col-md-8">
                                        <label class="col-md-2 control-label">作者</label>
                                        <div class="col-xs-8">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">
                                                    <i class="fa fa-user" aria-hidden="true"></i></span>
                                                <input type="text" name="At[author]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('At')['author']?old('At')['author']:$article->author }}"required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="form-control-static text-danger">{{$errors->first('At.author')}}</p>
                                    </div>
                                </div>

                                {{--录入--}}
                                <div class="col-md-12">
                                    <div class="form-group col-md-8">
                                        <label class="col-md-2 control-label">录入</label>
                                        <div class="col-xs-8">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">
                                                    <i class="fa fa-square" aria-hidden="true"></i></span>
                                                <input type="text" name="At[typist]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('At')['typist']?old('At')['typist']:$article->typist }}"required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="form-control-static text-danger">{{$errors->first('At.typist')}}</p>
                                    </div>
                                </div>
                                {{--发表时间--}}
                                <div class="col-md-12">
                                    <div class="form-group col-md-8">
                                        <label class="col-md-2 control-label">发布日期</label>
                                        <div class="col-xs-8">
                                            <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="fa fa-calendar " aria-hidden="true"></i></span>
                                                <input type="date"id="aDate" name="At[time]"  class="form-control" placeholder=" " aria-describedby="basic-addon1" value="{{ old('At')['time']?old('At')['time']:$article->time }}"required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="form-control-static text-danger">{{$errors->first('At.time')}}</p>
                                    </div>
                                </div>


                                {{--推荐--}}
                                <div class="col-md-12">
                                    <div class="form-group col-md-8">
                                        <label class="col-md-2 control-label">是否推荐</label>
                                        <div class="col-xs-8">
                                            <div>
                                                @foreach($article->recommend1() as $ind=>$val)
                                                    <div class="radio radio-inline">
                                                        <input type="radio" name="At[recommend]" {{ isset($article->recommend)?($article->recommend==$ind?'checked':''):(($ind==40000)?'checked':'')}} id="{{$ind}}" value="{{$ind}}" >
                                                        <label for="{{$ind}}">
                                                            {{$val}}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="form-control-static text-danger">{{$errors->first('At.recommend')}}</p>
                                    </div>
                                </div>

                                {{--置顶--}}
                                <div class="col-md-12">
                                    <div class="form-group col-md-8">
                                        <label class="col-md-2 control-label">是否置顶</label>
                                        <div class="col-xs-8">
                                            <div>
                                                @foreach($article->top1() as $ind=>$val)
                                                    <div class="radio radio-inline">
                                                        <input type="radio" name="At[top]" {{ isset($article->top)?($article->top==$ind?'checked':''):(($ind==60000)?'checked':'')}} id="{{$ind}}" value="{{$ind}}" >
                                                        <label for="{{$ind}}">
                                                            {{$val}}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="form-control-static text-danger">{{$errors->first('At.top')}}</p>
                                    </div>
                                </div>

                                {{--显示--}}
                                <div class="col-md-12">
                                    <div class="form-group col-md-8">
                                        <label class="col-md-2 control-label">是否显示</label>
                                        <div class="col-xs-8">
                                            <div>
                                                @foreach($article->state2() as $ind=>$val)
                                                    <div class="radio radio-inline">
                                                        <input type="radio" name="At[state]" {{ isset($article->state)?($article->state==$ind?'checked':''):(($ind==10000)?'checked':'')}} id="{{$ind}}" value="{{$ind}}" >
                                                        <label for="{{$ind}}">
                                                            {{$val}}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="form-control-static text-danger">{{$errors->first('At.state')}}</p>
                                    </div>
                                </div>

                                {{--关键词--}}
                                <div class="col-md-12">
                                    <div class="form-group col-md-8">
                                        <label class="col-md-2 control-label">关键词</label>
                                        <div class="col-xs-8">
                                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <i class="fa fa-thumb-tack" aria-hidden="true"></i></span>
                                                <input type="text"  name="At[keywords]" autocomplete="off"  class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('At')['keywords']?old('At')['keywords']:$article->keywords }}"required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="form-control-static text-danger">{{$errors->first('At.keywords')}}</p>
                                    </div>
                                </div>
                                @if($type==2)
                                @else
                                    {{--图片--}}
                                    <div class="col-md-12">
                                        <div class="form-group col-md-8">
                                            <label class="col-md-2 control-label">封面图片</label>
                                            <div class="col-xs-8">
                                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-square" aria-hidden="true"></i></span>
                                                    <input type="file" name="picture" class="form-control" placeholder="" aria-describedby="basic-addon1" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                {{--摘要--}}
                                <div class="col-md-12">
                                    <div class="form-group col-md-8">
                                        <label class="col-md-2 control-label">摘要</label>
                                        <div class="col-xs-8">
                                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <i class="fa fa-tag" aria-hidden="true"></i></span>
                                                <input type="text"  name="At[abstract]"  class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('At')['abstract']?old('At')['abstract']:$article->abstract }}"required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="form-control-static text-danger">{{$errors->first('At.abstract')}}</p>
                                    </div>
                                </div>
                                {{--内容--}}
                                <div class="col-md-12">
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-1 control-label">内容</label>
                                        <div class=" col-md-10" style="margin-left: 25px;">
                                            <script language="JavaScript" src="{{asset('js/tinymce.min.js')}}"></script>
                                            <script language="JavaScript" src="{{asset('js/tinymceInit.js')}}"></script>
                                            <textarea name="At[content]"></textarea>

                                            {{--<!-- 加载编辑器的容器 -->--}}
                                            {{--<script id="container" name="At[content]" type="text/plain" style="height: 400px;">--}}
                                                {{--{!!$article->content !!}--}}
                                            {{--</script>--}}
                                            {{--<!-- 配置文件 -->--}}
                                            {{--<script type="text/javascript" src="{{asset('ueditor/ueditor.config.js')}}"></script>--}}
                                            {{--<!-- 编辑器源码文件 -->--}}
                                            {{--<script type="text/javascript" src="{{asset('ueditor/ueditor.all.js')}}"></script>--}}
                                            {{--<!-- 实例化编辑器 -->--}}
                                            {{--<script type="text/javascript">--}}
                                                {{--var ue = UE.getEditor('container');--}}
                                                {{--ue.ready(function() {--}}
                                                {{--ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.--}}
                                                {{--});--}}
                                            {{--</script>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="height:15px;;"></div>
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