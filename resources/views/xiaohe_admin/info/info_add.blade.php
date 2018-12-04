@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','5')}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    添加信息栏
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" action="">
                                {{ csrf_field() }}
                                {{--名称--}}
                                <div class="col-md-12">
                                    <div class="form-group col-md-8">
                                        <label class="col-md-2 control-label">名称</label>
                                        <div class="col-xs-8">
                                            <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="fa fa-tags" aria-hidden="true"></i></span>
                                                <input type="text" name="Info[name]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('Info')['name']?old('Info')['name']:$info->name }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-8">
                                        <label class="col-md-2 control-label">应用类型</label>
                                        <div class="col-xs-8">
                                            <div>
                                                <select class="form-control input-md" name="At[category]">
                                                    <option value="0">&nbsp;——请选择导航栏——</option>
                                                    @foreach($navs as $nav)
                                                        <option value="{{$nav->id}}">&nbsp;——{{$nav->name}}——</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="height:15px;;"></div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-8">
                                        <label class="col-md-2 control-label">状态</label>
                                        <div class="col-xs-8">
                                            <div>
                                                @foreach($info->state() as $ind=>$val)
                                                    <div class="radio radio-inline">
                                                        <input type="radio" name="Info[state]" id="{{$ind}}" value="{{$ind}}" >
                                                        <label for="{{$ind}}">
                                                            {{$val}}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
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