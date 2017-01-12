@extends('template')
@section('content')
<section class="content">
    <h2 class="h2-title">{{trans('category.create_category')}}</h2>
    <!-- Your Page Content Here -->
    {!! Form::open([ 'route' => 'category.store', 'files' =>true,]) !!}
    {{ csrf_field() }}
        <label>{{trans('category.name')}}</label>
        <input type="text" name="name" class="form-control" ">
        <label>{{trans('category.introduce')}}</label>
        <input type="text" name="introduce" class="form-control" ">
        <label>{{trans('category.image')}}</label>
        <input type="file" name="image" class="form-control">
        <input type="submit" class="btn btn-primary">
    {!!Form::close()!!}
    @foreach($errors->all() as $value)
    <div class="alert alert-warning">{{ $value }}</div>
    @endforeach

    @if(Session::has('msg'))
    <div class="alert alert-success">
    {{ Session::get('msg') }}
    </div>
    @endif
 @endsection