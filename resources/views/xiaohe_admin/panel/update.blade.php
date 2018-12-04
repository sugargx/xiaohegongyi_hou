@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','5')}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    修改导航条
                </div>
                @include('xiaohe_admin.panel._form')
            </div>
        </div>
    </div>
@endsection