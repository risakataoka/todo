@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="item-area">
        <h3>Want</h3>
        <form method="POST" action="{{ url('home/wantItemAdd') }}">
            {{ csrf_field() }}
            <input class="itemfield" id="focus" type="text" name="task" placeholder="アイテムを入力してください">
            <input name="username" value="{{ Auth::user()->name }}" style="display: none;">
            <input class="submit-button" type="submit" value="保存">
        </form>
    </div>
</div>
@endsection