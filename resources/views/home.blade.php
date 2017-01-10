@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('auth.login_success')}}</div>

                <div class="panel-body">
                {{trans('auth.login_success')}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
