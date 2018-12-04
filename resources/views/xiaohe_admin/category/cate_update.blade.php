@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    修改类别
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6" style="margin-left: 10%;">
                            <form class="form-horizontal" method="post" action="">
                                {{ csrf_field() }}
                                {{--类别名称--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">标题</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="fa fa-tag" aria-hidden="true"></i></span>
                                            <input type="text" name="Cat[name]" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('Cat')['name']?old('Cat')['name']:$cate->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">应用类型</label>
                                    <div class="col-xs-8">
                                        <div>
                                            <select class="form-control input-md" name="Cat[type]">
                                                <option value="0">&nbsp;——请选择导航栏——</option>
                                                @foreach($navs as $nav)
                                                    <option {{ isset($cate->type) && $cate->type==$nav->id?'selected':'' }} value="{{$nav->id}}">&nbsp;——{{$nav->name}}——</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                {{--状态--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">状态</label>
                                    <div class="col-xs-8">
                                        <div>
                                            @foreach($cate->state() as $ind=>$val)
                                                <div class="radio radio-inline">
                                                    <input type="radio" name="Cat[state]" id="{{$ind}}"{{ isset($cate->state) && $cate->state==$ind?'checked':'' }} value="{{$ind}}" >
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