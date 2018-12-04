<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{--姓名--}}
                <div class="col-md-12">
                    <div class="form-group col-md-8">
                        <label class="col-md-2 control-label">名称</label>
                        <div class="col-xs-8">
                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">
                                                    <i class="fa fa-square" aria-hidden="true"></i></span>
                                <input type="text" name="User[name]" autocomplete="off" class="form-control" placeholder=" " aria-describedby="basic-addon1" value="{{ old('User')['name']?old('User')['name']:$friend->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static text-danger">{{$errors->first('User.name')}}</p>
                    </div>
                </div>
                {{--状态--}}

                <div class="col-md-12">
                    <div class="form-group col-md-8">
                        <label class="col-md-2 control-label">链接</label>
                        <div class="col-xs-8">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <i class="fa fa-square " aria-hidden="true"></i></span>
                                <input type="text" name="User[url]" autocomplete="off" class="form-control" placeholder=" " aria-describedby="basic-addon1" value="{{ old('User')['url']?old('User')['url']:$friend->url }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static text-danger">{{$errors->first('User.name')}}</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-8">
                        <label class="col-md-2 control-label">图片</label>
                        <div class="col-xs-8">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <i class="fa fa-square" aria-hidden="true"></i></span>
                                <input type="file" name="picture" class="form-control" placeholder="" aria-describedby="basic-addon1" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static text-danger">{{$errors->first('picture')}}</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-8">
                        <label class="col-md-2 control-label">状态</label>
                        <div class="col-xs-8">
                            <div>
                                @foreach($friend->state1() as $ind=>$val)
                                    <div class="radio radio-inline">
                                        <input type="radio" name="User[state]" {{ isset($friend->state)?($friend->state==$ind?'checked':''):(($ind==1)?'checked':'')}} id="{{$ind}}"value="{{$ind}}" >
                                        <label for="{{$ind}}">
                                            {{$val}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static text-danger">{{$errors->first('User.state')}}</p>
                    </div>
                </div>
                <div class="form-footer" style="text-align: inherit;padding-left: 30%;">
                    <button type="submit" class="btn btn-success">保存</button>
                </div>
            </form>
        </div>
    </div>
</div>