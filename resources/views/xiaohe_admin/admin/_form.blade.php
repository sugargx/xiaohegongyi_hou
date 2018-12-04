<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="post" action="">
                {{ csrf_field() }}
                {{--账号--}}
                <div class="col-md-12">
                    <div class="form-group col-md-8">
                        <label class="col-md-2 control-label">账号</label>
                        <div class="col-xs-8">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <i class="fa fa-user" aria-hidden="true"></i></span>
                                <input type="text" name="Admin[account]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('Admin')['account']?old('Admin')['account']:$admin->account }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static text-danger">{{$errors->first('Admin.account')}}</p>
                    </div>
                </div>
                {{--姓名--}}
                <div class="col-md-12">
                    <div class="form-group col-md-8">
                        <label class="col-md-2 control-label">姓名</label>
                        <div class="col-xs-8">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <i class="fa fa-mortar-board " aria-hidden="true"></i></span>
                                <input type="text" name="Admin[name]" autocomplete="off" class="form-control" placeholder=" " aria-describedby="basic-addon1" value="{{ old('Admin')['name']?old('Admin')['name']:$admin->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static text-danger">{{$errors->first('Admin.name')}}</p>
                    </div>
                </div>
                {{--密码--}}
                <div class="col-md-12">
                    <div class="form-group col-md-8">
                        <label class="col-md-2 control-label">密码</label>
                        <div class="col-xs-8">
                            <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input type="password" name="Admin[pwd]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('Admin')['pwd']?old('Admin')['pwd']:$admin->pwd }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static text-danger">{{$errors->first('Admin.pwd')}}</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-8">
                        <label class="col-md-2 control-label">确认密码</label>
                        <div class="col-xs-8">
                            <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input type="password" name="Admin[pwd1]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('Admin')['pwd']?old('Admin')['pwd']:$admin->pwd }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static text-danger">{{$errors->first('Admin.pwd1')}}</p>
                    </div>
                </div>
                {{--状态--}}
                <div class="col-md-12">
                    <div class="form-group col-md-8">
                        <label class="col-md-2 control-label">状态</label>
                        <div class="col-xs-8">
                            <div>
                                @foreach($admin->state1() as $ind=>$val)
                                    <div class="radio radio-inline">
                                        <input type="radio" name="Admin[state]" {{ isset($admin->state) && $admin->state==$ind?'checked':'' }} id="{{$ind}}"value="{{$ind}}" >
                                        <label for="{{$ind}}">
                                            {{$val}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static text-danger">{{$errors->first('Admin.state')}}</p>
                    </div>
                </div>

                <div class="form-footer">
                    <div class="form-group col-md-6">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-primary">保存</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>