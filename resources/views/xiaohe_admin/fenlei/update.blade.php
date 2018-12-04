@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','4')}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    修改
                </div>
                @include('xiaohe_admin.fenlei._form')
            </div>
        </div>
    </div>
@endsection