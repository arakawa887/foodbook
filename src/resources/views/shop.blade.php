@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection

@section('header')
  <div class="header">
    <div class="nav">
      <input id="drawer_input" class="drawer_hidden" type="checkbox">
      <label for="drawer_input" class="drawer_open"><span></span></label>
      <nav class="nav_content">
        <ul class="nav_list">
        <li class="nav_item">
            <form class = "login-move" action = "/" method = "get">
            @csrf
            <button class = "login-form__button-submit" type = "submit">Home</button>
            </form>
          </li>
          <li class="nav_item">
            <form class = "login-move" action = "/login" method = "get">
            @csrf
            <button class = "login-form__button-submit" type = "submit">Logout</button>
            </form>
          </li>
          <li class="nav_item">
            <form class = "login-move" action = "/my_page" method = "get">
            @csrf
            <button class = "login-form__button-submit" type = "submit">Mypage</button>
            </form>
          </li>
        </ul>
      </nav>
    </div>
    <div class="search">
      <form action="/search" method="post">
        @csrf
        <select name="area" class="select_area">
          <option value="All area">All area</option>
          <option value="東京都" onchange="submit(this.form)">東京都</option>
          <option value="大阪府" onchange="submit(this.form)">大阪府</option>
          <option value="福岡県" onchange="submit(this.form)">福岡県</option>
        </select>
        <select name="genre" class="select_genre">
          <option value="All genre">All genre</option>
          <option value="寿司" onchange="submit(this.form)">寿司</option>
          <option value="焼肉" onchange="submit(this.form)">焼肉</option>
          <option value="居酒屋" onchange="submit(this.form)">居酒屋</option>
          <option value="イタリアン" onchange="submit(this.form)">イタリアン</option>
          <option value="ラーメン" onchange="submit(this.form)">ラーメン</option>
        </select>
        <input type="text" value="name" placeholder="🔍search...">
      </form>
    </div>
  </div>
@endsection

@section('content')
<div class="username">
<h2>{{$username}}さん</h2>
</div>
<div class="shop_all">
@for($i = 0;$i <= 19;$i++)
<div class="shop">
  <img src="{{ $shops[$i]->picture }}" alt="Image Description">
  <h3 class="name">{{$shops[$i]->name}}</h3>
  <p class="area">#{{$shops[$i]->area}}</p>
  <p class="genre">#{{$shops[$i]->genre}}</p>
  <div class="button">
    <div class="shop_detail">
  <form class="overview" action = "/detail/{{$shops[$i]->id}}" method="get">
    @csrf
    <button class = "overview-form__button-submit" type = "submit">詳しく見る</button>
  </form>
    </div>
    <div class="button_favorite">
  @empty($favorite[$i])
    <a class="favorite" href = "{{ route('favorite.form', ['id' => $shops[$i]->id]) }}">not like</a>
  @else($favorite[$i])
  <a class="favorite" href = "{{ route('favorite_delete.form', ['id' => $shops[$i]->id]) }}">like</a>
  @endempty
    </div>
  </div>
</div>
@endfor
</div>
@endsection