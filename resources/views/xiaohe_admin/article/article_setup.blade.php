@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','5')}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    文章设置
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" action="">
                                {{ csrf_field() }}
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
                                {{--链接--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">链接</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1">
                                                            <i class="fa fa-share-alt " aria-hidden="true"></i></span>
                                            <input type="text" name="At[link]"  class="form-control" placeholder=" " aria-describedby="basic-addon1" value="{{ old('At')['link']?old('At')['link']:$article->link }}">
                                        </div>
                                    </div>
                                </div>
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
                                                    <input type="radio" name="At[recommend]" id="{{$ind}}" {{ isset($article->recommend) && $article->recommend==$ind?'checked':'' }} value="{{$ind}}" >
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
                                                    <input type="radio" name="At[top]" id="{{$ind}}" {{ isset($article->top) && $article->top==$ind?'checked':'' }} value="{{$ind}}" >
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
                                                    <input type="radio" name="At[state]" id="{{$ind}}" {{ isset($article->state) && $article->state==$ind?'checked':'' }} value="{{$ind}}" >
                                                    <label for="{{$ind}}">
                                                        {{$val}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
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