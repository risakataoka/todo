@extends('layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
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
                                <input type="image" src="{{ asset('images/trash.png') }}" width="20" height="20" class="trash">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="month-area">
                <h2 class="contents-name">Month</h2>
                <a href="{{ url('additem/month') }}">
                    <img class="plus-icon" src="{{ asset('images/plus.png') }}" width="40" height="40 " alt="plus">
                </a>
                <p class="calendarTitle">{{ $calendarTitle }}</p>
                <div class="parent">
                    <i class="fas fa-angle-double-left fa-2x"></i>
                    <i class="fas fa-angle-double-right fa-2x"></i>
                </div>
                <table class="table table-bordered" style="table-layout:fixed;">
                    <tr>
                        @foreach (['月', '火', '水', '木', '金', '土', '日'] as $dayOfWeek)
                        <th>{{ $dayOfWeek }}</th>
                        @endforeach
                    </tr>
                    @foreach ($dates as $date)
                    <?php $modalMonthData = array(); ?>
                    <?php $modalMonthDataJson = array(); ?>
                    <?php $modalMonthId = array(); ?>
                    <?php $modalMonthIdJson = array(); ?>
                    @if ($date->day == 1 && $date->format('N') != 1)

                    <td colspan="{{ $date->format('N')-1 }}"></td>

                    @endif
                    @if ($date->format('N') == 1)
                    <tr>
                        @endif
                        <td>
                            {{ $date->day }}
                            @foreach ($monthData as $md)
                            @if ($date->year == $md->year && $date->month == $md->month && $date->day == $md->day)
                            <?php array_push($modalMonthData, $md->task); ?>
                            <?php array_push($modalMonthId, $md->id); ?>
                            <?php $flg = "true"; ?>
                            @endif
                            @endforeach
                            <?php $cnt = count($modalMonthData); ?>
                            <?php $modalMonthDataJson = json_encode($modalMonthData); ?>
                            <?php $modalMonthIdJson = json_encode($modalMonthId); ?>
                            @if ($cnt >= 1)
                            <button type="button" style="background-color: transparent;" data-toggle="modal" data-day="{{ $date->day }}" data-task="{{ $modalMonthDataJson }}" data-id="{{ $modalMonthIdJson }}" data-target="#Modal">
                                <img src="{{ asset('images/flg.png') }}" width="15" height="15 " alt="flg">
                            </button>
                            @endif
                        </td>
                        @if ($date->format('N') == 7)
                    </tr>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
        <!--モーダルここから-->
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="contents">
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--モーダルここまで-->
        <div class="col-lg-4">
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
                                <input type="image" src="{{ asset('images/trash.png') }}" width="20" height="20" class="trash">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="col-lg-4">
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
                                <input type="image" src="{{ asset('images/trash.png') }}" width="20" height="20" class="trash">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="col-lg-4">
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
                                <input type="image" src="{{ asset('images/trash.png') }}" width="20" height="20" class="trash">
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