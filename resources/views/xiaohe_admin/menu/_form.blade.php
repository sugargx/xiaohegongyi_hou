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
                                <input type="text" name="Nav[name]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('Nav')['name']?old('Nav')['name']:$nav->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static text-danger">{{$errors->first('Nav.name')}}</p>
                    </div>
                </div>

                {{--页面类型--}}
                <div class="col-md-12">
                    <div class="form-group col-md-8">
                        <label class="col-md-2 control-label">页面类型</label>
                        <div class="col-xs-8">
                            <div>
                                <select class="form-control input-md" name="Nav[type]">
                                    <option value="0">&nbsp;——请选择页面类型——</option>
                                    @foreach($nav->type1() as $ind=>$val)
                                        <option {{ isset($nav->type) && $nav->type==$ind?'selected':'' }} value="{{$ind}}">&nbsp;{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static text-danger">{{$errors->first('Nav.type')}}</p>
                    </div>
                </div>
                <div class="col-md-12" style="height:15px;;"></div>
                {{--别名--}}
                <div class="col-md-12">
                    <div class="form-group col-md-8">
                        <label class="col-md-2 control-label">别名 or URL</label>
                        <div class="col-xs-8">
                            <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="fa fa-tags" aria-hidden="true"></i></span>
                                <input type="text" name="Nav[alias]" autocomplete="off" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('Nav')['alias']?old('Nav')['alias']:$nav->alias }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static text-danger">{{$errors->first('Nav.alias')}}</p>
                    </div>
                </div>

                {{--序号--}}
                {{--<div class="col-md-12">--}}
                    {{--<div class="form-group col-md-8">--}}
                        {{--<label class="col-md-2 control-label">序号</label>--}}
                        {{--<div class="col-xs-8">--}}
                            {{--<div class="input-group">--}}
                                            {{--<span class="input-group-addon" id="basic-addon1">--}}
                                                {{--<i class="fa fa-tags" aria-hidden="true"></i></span>--}}
                                {{--<input type="text" name="Nav[order1]" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{ old('Nav')['order1']?old('Nav')['order1']:$nav->order1 }}">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4">--}}
                        {{--<p class="form-control-static text-danger">{{$errors->first('Nav.order1')}}</p>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--状态--}}
                <div class="col-md-12">
                    <div class="form-group col-md-8">
                        <label class="col-md-2 control-label">状态</label>
                        <div class="col-xs-8">
                            <div>
                                @foreach($nav->state1() as $ind=>$val)
                                    <div class="radio radio-inline">
                                        <input type="radio" name="Nav[state]" id="{{$ind}}"{{ isset($nav->state)?($nav->state==$ind?'checked':''):(($ind==10)?'checked':'')}} value="{{$ind}}" >
                                        <label for="{{$ind}}">
                                            {{$val}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static text-danger">{{$errors->first('Nav.state')}}</p>
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