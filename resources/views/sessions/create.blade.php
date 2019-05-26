@extends('layouts.default')
@section('title', '登录')

@section('content')
  <div class="col-md-8 offset-md-2">
    <div class="card">
      <div class="card-header">
        <h5>登录</h5>
      </div>

      <div class="card-body">
        @include('shared._errors')

        <form method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="email">邮箱</label>
            <input class="form-control" type="email" name="email" value="{{ old('email') }}">
          </div>

          <div class="form-group">
            <label for="password">密码</label>
            <input class="form-control" type="password" name="password" value="{{ old('password') }}">
          </div>

          <button class="btn btn-primary" type="submit">登录</button>
        </form>

        <hr>

        <p>还没账号？<a href="{{ route('users.create') }}">现在注册！</a></p>

      </div>
    </div>
  </div>
@stop
