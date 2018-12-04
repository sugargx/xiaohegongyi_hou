@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','2')}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    修改管理员
                </div>
                @include('xiaohe_admin.admin._form')
            </div>
        </div>
    </div>
@endsection
