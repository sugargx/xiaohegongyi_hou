@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','6')}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    添加合作伙伴
                </div>
                @include('xiaohe_admin.friend._form')
            </div>
        </div>
    </div>
@endsection