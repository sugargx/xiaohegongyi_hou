@extends('layouts.layout')
{{\Illuminate\Support\Facades\Session::put('page_num','3')}}
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                 设置
                </div>
                <div class="card-body no-padding">
                    <table class=" table table-striped primary" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>文章类别</th>
                            <th>状态</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($menu as $me)
                            <tr>
                                <td>{{ $me->name }}</td>
                                <td>
                                    <a href="{{ url('Acheck/setup',['id'=>$me->id]) }}"class="btn btn-success btn-default btn-xs" role="button">{{ $me->state2($me->usercate) }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bottom">
                <div class="footer" style="width: 70%;float: right;">
                    <div class="pull-right">
                        {{$menu->render()}}
                        {{\Illuminate\Support\Facades\Session::put('AcheckeditPage',$menu->currentPage())}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection