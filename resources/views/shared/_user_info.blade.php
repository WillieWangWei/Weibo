<a href="{{ route('users.show', $user) }}">
  <img src="{{ $user->gravatar('150') }}" alt="{{ $user->name }}" class="gravatar"/>
</a>
<h1>{{ $user->name }}</h1>
