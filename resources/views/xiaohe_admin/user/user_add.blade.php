@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','2')}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    添加用户
                </div>
                @include('xiaohe_admin.user._form')
            </div>
        </div>
    </div>
@endsection