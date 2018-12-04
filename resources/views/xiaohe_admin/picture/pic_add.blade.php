@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','6')}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    添加图片
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6" style="margin-left: 10%;">
                            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{--图片名称--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">图片名称</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <i class="fa fa-square " aria-hidden="true"></i></span>
                                            <input type="text" name="Pic[name]" autocomplete="off" class="form-control" placeholder="" value="" aria-describedby="basic-addon1" required>
                                        </div>
                                    </div>
                                </div>
                                {{--图片描述--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">图片描述</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <i class="fa fa-square " aria-hidden="true"></i></span>
                                            <input type="text" name="Pic[content]" autocomplete="off" class="form-control" placeholder="" value="" aria-describedby="basic-addon1" >
                                        </div>
                                    </div>
                                </div>
                                {{--图片链接--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">图片链接</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <i class="fa fa-square " aria-hidden="true"></i></span>
                                            <input type="text" name="Pic[url]" autocomplete="off" class="form-control" placeholder="" value="" aria-describedby="basic-addon1" >
                                        </div>
                                    </div>
                                </div>
                                {{--序号--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">序号</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <i class="fa fa-square " aria-hidden="true"></i></span>
                                            <input type="text" name="Pic[order1]" autocomplete="off" class="form-control" placeholder="" value="" aria-describedby="basic-addon1" required>
                                        </div>
                                    </div>
                                </div>
                                {{--状态--}}
                                <div class="form-group">
                                    <label class="col-md-2 control-label">状态</label>
                                    <div class="col-xs-8">
                                        <div>
                                            @foreach($pic->state1() as $ind=>$val)
                                                <div class="radio radio-inline">
                                                    <input type="radio" name="Pic[state]" id="{{$ind}}"{{ isset($pic->state)?($pic->state==$ind?'checked':''):(($ind==10)?'checked':'')}} value="{{$ind}}" >
                                                    <label for="{{$ind}}">
                                                        {{$val}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">图片上传</label>
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="fa fa-square" aria-hidden="true"></i></span>
                                            <input type="file" name="picture" class="form-control" placeholder="" aria-describedby="basic-addon1" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-footer" style="text-align: inherit;padding-left: 30%;">
                                    <button type="submit" class="btn btn-success">保存</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection