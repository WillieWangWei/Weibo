<div class="list-group-item">
  <img src="{{ $user->gravatar() }}" class="mr-3" alt="{{ $user->name }}" width="32">
  <a href="{{ route('users.show', $user) }}">
    {{ $user->name }}
  </a>
</div>
