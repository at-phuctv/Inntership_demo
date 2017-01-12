@extends('template')
@section('content')
<div class="page-header">
            <h3>{{trans('category.list_category')}}</h3>
            <a href="{!! route('category.create') !!}">
            <h3><span class="glyphicon glyphicon-plus"></span></h3>
        </a>
        </div>
    <table class="table table-striped product-index">
        <thead>
            <tr class="tr-top">
            <th>{{trans('category.name')}}</th>
            <th>{{trans('category.introduce')}}</th>
            <th>{{trans('category.image')}}</th>
            <th>{{trans('category.action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listCate as $value)
            <tr>
                <td>{{$value->name}}</td>
                <td>{{$value->introduce}}</td>
                <td class="product-img"><img src="{{asset(config('upload.category_image').$value->image)}}"></td>
                <td>
                    <div class="row action ">
                        <button class="btn btn-success btn-view"><a href="{{route('category.show', [$value->id])}}"><i class="glyphicon glyphicon-eye-open"></i>view</a></button>
                        </button>
                        {{ Form::open([ 'method' => 'delete', 'route' => ['category.destroy', $value->id],'class'=>'form-delete-category' ]) }}
                            {{ csrf_field() }}
                            <button type="submit" alt="{{trans('')}}" class="delete-product btn btn-danger">
                                <a><i class="glyphicon glyphicon-trash">delete</i></a>
                            </button>
                            {{ Form::close() }}
                        <button class="btn btn-info btn-edit"><a href="{{route('category.edit',[$value->id])}}"><i class="glyphicon glyphicon-edit">edit</i></a></button>
                    </div>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
     {{ $listCate->links() }}

    @if(Session::has('msg'))
        <div class="alert alert-success">
        {{ Session::get('msg') }}
        </div>
    @endif
@endsection