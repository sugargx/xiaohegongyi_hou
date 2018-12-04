<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="post" action="">
                {{ csrf_field() }}
                {{--姓名--}}
                <div class="col-md-12">
                    <div class="form-group col-md-8">
                        <label class="col-md-2 control-label">姓名</label>
                        <div class="col-xs-8">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <i class="fa fa-mortar-board " aria-hidden="true"></i></span>
                                <input type="text" name="User[name]" autocomplete="off" class="form-control" placeholder=" " aria-describedby="basic-addon1" value="{{ old('User')['name']?old('User')['name']:$user->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static text-danger">{{$errors->first('User.name')}}</p>
                    </div>
                </div>
                {{--性别--}}
                <div class="col-md-12">
                    <div class="form-group col-md-8">
                        <label class="col-md-2 control-label">性别</label>
                        <div class="col-xs-8">
                            <div>
                                @foreach($user->sex1() as $ind=>$val)
                                    <div class="radio radio-inline">
                                        <input type="radio" name="User[sex]" {{ isset($user->sex) && $user->sex==$ind?'checked':'' }}  id="{{$ind}}"  value="{{$ind}}" >
                                        <label for="{{$ind}}">
                                            {{$val}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static text-danger">{{$errors->first('User.sex')}}</p>
                    </div>
                </div>
                {{--手机号--}}
                <div class="col-md-12">
                    <div class="form-group col-md-8">
                        <label class="col-md-2 control-label">手机号</label>
                        <div class="col-xs-8">
                            <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <i class="fa fa-mobile-phone " aria-hidden="true"></i></span>
                                <input type="text" name="User[phone]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('User')['phone']?old('User')['phone']:$user->phone }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static text-danger">{{$errors->first('User.phone')}}</p>
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
                                <input type="password" name="User[pwd]"  class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('User')['pwd']?old('User')['pwd']:$user->pwd }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static text-danger">{{$errors->first('User.pwd')}}</p>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group col-md-8">
                        <label class="col-md-2 control-label">确认密码</label>
                        <div class="col-xs-8">
                            <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input type="password" name="User[pwd1]" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('User')['pwd']?old('User')['pwd']:$user->pwd }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static text-danger">{{$errors->first('User.pwd1')}}</p>
                    </div>
                </div>
                {{--状态--}}
                <div class="col-md-12">
                    <div class="form-group col-md-8">
                        <label class="col-md-2 control-label">状态</label>
                        <div class="col-xs-8">
                            <div>
                                @foreach($user->state1() as $ind=>$val)
                                    <div class="radio radio-inline">
                                        <input type="radio" name="User[state]" {{ isset($user->state)?($user->state==$ind?'checked':''):(($ind==10)?'checked':'')}}  id="{{$ind}}"value="{{$ind}}" >
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