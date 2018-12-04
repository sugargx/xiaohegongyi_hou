@extends('xiaohe.user_admin.layout')
{{\Illuminate\Support\Facades\Session::put('page','2')}}
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>密码修改</h3></div>
            <div class="card-body " style="padding: 30px 15%;">
                <form class="form form-horizontal" method="post" action="">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-md-2">请输入新的密码</label>
                        <div class="col-md-8 col-sm-12">
                            <input type="password" class="form-control" value="" name="pwd[new]">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2">请再次输入</label>
                        <div class="col-md-8 col-sm-12">
                            <input type="password" class="form-control" value="" name="pwd[new1]">
                        </div>
                    </div>
                    <div class="form-footer">
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <input type="submit" class="btn btn-primary" value="确定修改">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection