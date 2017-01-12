@extends('template')
@section('content')
 <div id="cate-up">
    <h2 class="h2-title">{{trans('category.detail_category')}}</h2>
    {!! Form::open([ 'method' =>'Patch','route' => [ 'category.update',$category->id], 'files' =>true, 'class' => 'category-update-form' ]) !!}
    {{ csrf_field() }}
        <label>{{trans('category.name')}}</label>
        <input name="name" class="form-control" value="{{$category->name}}">

        <label>{{trans('category.introduce')}}</label>
        <input name="introduce" class="form-control" value="{{$category->introduce}}">


        <label class="lbl-img control-label">{{trans('category.image')}}
            <input type="file" name="image" class="form-control" value="{{ $category->image }}">
        </label>
        <img class="update-img" src="{{asset(config('upload.category_image').'/'.$category->image)}}">

        <input type="hidden" name="cate_id" value="{{ $category->id }}"></br>
        <input type="submit" class="btn btn-primary" id="btn-product-update" alt="{{ trans('product.are_you_sure_update') }}">

    @foreach($errors->all() as $value)
        <div class="alert alert-warning">{{ $value }}</div>
    @endforeach

    @if(Session::has('msg'))
        <div class="alert alert-success">
            {{ Session::get('msg') }}
        </div>
    @endif
    </div>
@endsection