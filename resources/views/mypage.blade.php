@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="card-area">
        <div class="card" style="width: 40rem;">
            <div class="card-header">
                こんにちは！ {{ Auth::user()->name }}さん！
            </div>
            <div class="card-body">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</div>

@endsection