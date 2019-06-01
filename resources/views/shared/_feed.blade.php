@if($feed_items->count() > 0)
  <ul class="list-unstyled">

    @foreach($feed_items as $status)
      @include('statuses._status', ['user' => $status->user])
    @endforeach

    <div class="mt-5">
      {!! $feed_items->render() !!}
    </div>

  </ul>
@else
  <p>暂无微博</p>
@endif
