@extends('layouts.layout')
@section('content')
{{ Form::open(['url' => 'test2', 'method' => 'post']) }}
<label>お名前：<input type="text" name="name"></label><br>
<input type="submit" name="regist" value="送信する">
{{ Form::close() }}
<h1>{{ $nameadd }}</h1>
@endsection