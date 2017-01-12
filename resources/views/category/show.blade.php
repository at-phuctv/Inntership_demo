@extends('template')
@section('content')
 <div id="cate-up">
    <h2 class="h2-title">{{trans('category.detail_category')}}</h2>
        <label>{{trans('category.name')}}</label>
        <p>{{$category->name}}</p>

        <label>{{trans('category.introduce')}}</label>
        <p>{{$category->introduce}}</p>

        <label class="lbl-img control-label">{{trans('category.image')}}
        <img class="update-img" src="{{asset(config('upload.category_image').'/'.$category->image)}}">
    </div>
@endsection