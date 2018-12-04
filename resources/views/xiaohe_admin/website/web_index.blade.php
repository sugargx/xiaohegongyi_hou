@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','7')}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    网站信息设置
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" action="">
                                {{ csrf_field() }}
                                {{--名称--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">网站名称</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                            <input type="text"name="Web[name]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('Web')['name']?old('Web')['name']:$web->name }}">
                                        </div>
                                    </div>
                                </div>
                                {{--关键词--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">关键词</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                            <input type="text"name="Web[keywords]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('Web')['keywords']?old('Web')['keywords']:$web->keywords }}">
                                        </div>
                                    </div>
                                </div>
                                {{--描述--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">描述</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                            <input type="text"name="Web[des]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('Web')['des']?old('Web')['des']:$web->des }}">
                                        </div>
                                    </div>
                                </div>
                                {{--电子邮箱--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">电子邮箱</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                            <input type="text"name="Web[email]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('Web')['email']?old('Web')['email']:$web->email }}">
                                        </div>
                                    </div>
                                </div>
                                {{--固定电话--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">固定电话</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                            <input type="text"name="Web[telephone]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('Web')['telephone']?old('Web')['telephone']:$web->telephone }}">
                                        </div>
                                    </div>
                                </div>
                                {{--手机号码--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">手机号码</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                            <input type="text"name="Web[mobile]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('Web')['mobile']?old('Web')['mobile']:$web->mobile }}">
                                        </div>
                                    </div>
                                </div>
                                {{--地址--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">地址</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                            <input type="text"name="Web[place]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('Web')['place']?old('Web')['place']:$web->place }}">
                                        </div>
                                    </div>
                                </div>
                                {{--备案号--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">备案号</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                            <input type="text"name="Web[record]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('Web')['record']?old('Web')['record']:$web->record }}">
                                        </div>
                                    </div>
                                </div>
                                {{--底部内容--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">底部内容</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                            <input type="text"name="Web[footer]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('Web')['footer']?old('Web')['footer']:$web->footer }}">
                                        </div>
                                    </div>
                                </div>
                                {{--统计代码--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="col-md-2 control-label">技术支持</label>--}}
                                    {{--<div class="col-xs-8">--}}
                                        {{--<div class="input-group">--}}
                                            {{--<input type="text"name="Web[count]" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('Web')['count']?old('Web')['count']:$web->count }}">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--二维码--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="col-md-2 control-label">二维码</label>--}}
                                    {{--<div class="col-xs-8">--}}
                                        {{--<input type="file"name="Web[coder]" >--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--提交--}}
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