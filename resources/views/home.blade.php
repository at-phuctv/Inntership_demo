@extends('template')

@section('content')
  <div class="col-md-2 post_home">
            <ul class="nav nav-sidebar">
              <li><a href="#">{{ trans('constants.post_news') }}</a></li>
              <li><a href="#">{{ trans('constants.follow_post') }}</a></li>
              <li><a href="#">{{ trans('constants.create_post') }}</a></li>
            </ul>
          </div>
  <div class="col-md-10">
          @foreach($listPost as $value)
          <div class="welcome-top">
          <div class="row">
                 <div class="col-md-8 welcome-text">
                    <h3 class="tittle two">{{ $value->title}}</h3>
                    <p>{{ $value->description}}</p>
                    <p>{{ $value->acreage}}</p>
                    <p>{{ $value->price}}</p>
                    <p>{{ $value->address}}</p>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <button class="follow_post_user" value="{{$value->id}}" dataUser="{{ (!(Auth::guest()))? Auth::user()->email :''}}"><i class="glyphicon glyphicon-eye-open"></i></button>
                  </div>
                   <div class="col-md-4 welcome-img">
                     <img class="img-responsive " src="{{ trans('constants.image')}}" alt="">  
                   </div>
                  <div class="clearfix"></div>
                </div>

                </div>
            @endforeach
  </div>
@endsection
