@extends('layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="day-area">
                <h2 class="contents-name">Today</h2>
                <a href="{{ url('additem/day') }}">
                    <img class="plus-icon" src="{{ asset('images/plus.png') }}" width="40" height="40" alt="plus">
                </a>
                <table cellpadding="5" class="table-area">
                    @foreach($day as $dy)
                    <tr>
                        <td>{{ $dy->task }}</td>
                        <td>
                            <form action="{{ url('home/day/'.$dy->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="image" src="{{ asset('images/trash.png') }}" width="30" height="30" class="trash">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="col-6">
            <div class="month-area">
                <h2 class="contents-name">Month</h2>
                <a href="{{ url('additem/month') }}">
                    <img class="plus-icon" src="{{ asset('images/plus.png') }}" width="40" height="40 " alt="plus">
                </a>
                <p>{{ $result }}</p>
                <table class="table table-bordered">
                    <tr>
                        @foreach (['月', '火', '水', '木', '金', '土', '日'] as $dayOfWeek)
                        <th>{{ $dayOfWeek }}</th>
                        @endforeach
                    </tr>
                    @foreach ($dates as $date)
                    @if ($date->day == 1 && $date->format('N') != 1)


                    <td colspan="{{ $date->format('N')-1 }}"></td>

                    @endif
                    @if ($date->format('N') == 1)
                    <tr>
                        @endif
                        <td>
                            {{ $date->day }}
                            {{$date->format('N')}}
                            {{$date->weekOfMonth}}


                        </td>
                        @if ($date->format('N') == 7)
                    </tr>
                    @endif
                    @endforeach


                </table>


            </div>
        </div>
        <div class="col-4">
            <div class="want-area">
                <h2 class="contents-name">Want</h2>
                <a href="{{ url('additem/want') }}">
                    <img class="plus-icon" src="{{ asset('images/plus.png') }}" width="40" height="40" alt="plus">
                </a>
                <table cellpadding="5" class="table-area">
                    @foreach($want as $wt)
                    <tr>
                        <td>{{ $wt->task }}</td>
                        <td>
                            <form action="{{ url('home/want/'.$wt->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="image" src="{{ asset('images/trash.png') }}" width="30" height="30" class="trash">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="col-4">
            <div class="do-area">
                <h2 class="contents-name">Do</h2>
                <a href="{{ url('additem/do') }}">
                    <img class="plus-icon" src="{{ asset('images/plus.png') }}" width="40" height="40 " alt="plus">
                </a>
                <table cellpadding="5" class="table-area">
                    @foreach($dotask as $dt)
                    <tr>
                        <td>{{ $dt->task }}</td>
                        <td>
                            <form action="{{ url('home/do/'.$dt->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="image" src="{{ asset('images/trash.png') }}" width="30" height="30" class="trash">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="col-4">
            <div class="objective-area">
                <h2 class="contents-name">Objective</h2>
                <a href="{{ url('additem/objective') }}">
                    <img class="plus-icon" src="{{ asset('images/plus.png') }}" width="40" height="40 " alt="plus">
                </a>
                <table cellpadding="5" class="table-area">
                    @foreach($objective as $ob)
                    <tr>
                        <td>{{ $ob->task }}</td>
                        <td>
                            <form action="{{ url('home/objective/'.$ob->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="image" src="{{ asset('images/trash.png') }}" width="30" height="30" class="trash">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection