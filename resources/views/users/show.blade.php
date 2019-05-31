@extends('layouts.default')
@section('title', $user->name)

@section('content')
  <div class="row">
    <div class="col-md-8 offset-md-2">

      <section class="user_info">
        @include('shared._user_info', $user)
      </section>

      <section class="status">
        @if($statuses->count() > 0)
          <ul class="list-unstyled">
            @foreach($statuses as $status)
              @include('statuses._status')
            @endforeach
          </ul>
          <div class="mt-5">
            {!! $statuses->render() !!}
          </div>
        @else
          <p>暂无微博</p>
        @endif
      </section>

    </div>
  </div>
@stop
