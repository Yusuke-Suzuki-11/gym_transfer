@extends('layout')

@section('content')
@include('elements.tc_sidebar')

<div class="tc-index">
  <form action="">
    @csrf
    <p>姓</p>
    <input type="text" name="lastName">
    <p>名前</p>
    <input type="text" name="firstName">
    <p>メールアドレス</p>
    <input type="email" name="email">
    <p>誕生日</p>
    <input type="birthDay">
    <p>男女</p>
    <select name="gender" id="">
      <option value="">男</option>
      <option value="">女</option>
    </select>
    <p>ストレスポイント</p>
    <select name="stressPoint" id="">
      <option value="1">普通</option>
      <option value="2">大変</option>
    </select>
    <p>電話番号</p>
    <input type="number" name="phone">
  </form>

  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1">@</span>
    </div>
    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
  </div>
</div>
@endsection