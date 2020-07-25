<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Day;
use App\Want;
use App\Dotask;
use App\Objective;
use App\Month;

use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        //ログインしている認証ユーザー情報(名前)を取得
        $name = Auth::user()->name;

        //クエリビルダでsql文実行
        $day = DB::table('day')
            ->select(DB::raw('task, username, id'))
            ->where('username', '=', $name)
            ->get();

        //クエリビルダでsql文実行
        $want = DB::table('want')
            ->select(DB::raw('task, username, id'))
            ->where('username', '=', $name)
            ->get();

        //クエリビルダでsql文実行
        $dotask = DB::table('dotask')
            ->select(DB::raw('task, username, id'))
            ->where('username', '=', $name)
            ->get();

        //クエリビルダでsql文実行
        $objective = DB::table('objective')
            ->select(DB::raw('task, username, id'))
            ->where('username', '=', $name)
            ->get();

        //クエリビルダでsql文実行
        $monthData = DB::table('month')
            ->select(DB::raw('year, month, day, task, username, id'))
            ->where('username', '=', $name)
            ->get();

        //デフォルトで現在の年と月をカレンダーとして表示
        $now = new Carbon;
        $year = $now->format('Y');
        $month = $now->format('m');

        $makeDate =  $request->input('monthChange');
        $defDateY = $request->input('defDateY');
        $defDateM = $request->input('defDateM');

        $defDateStr = sprintf('%04d-%02d-01', $defDateY, $defDateM);
        $defDate = new Carbon($defDateStr);
        //\Debugbar::info($defDateY);
        //\Debugbar::info($defDateM);
        //\Debugbar::info($makeDate);

        if ($makeDate == "prev") {
            $prevDate = $defDate->addMonths(-1);
            $year = $prevDate->format('Y');
            $month = $prevDate->format('m');
        } elseif ($makeDate == "next") {
            $nextDate = $defDate->addMonths(1);
            $year = $nextDate->format('Y');
            $month = $nextDate->format('m');
        }

        $calendarTitle = $year . "年" . $month . "月";
        $defDateYear = $year;
        $defDateMonth = $month;


        //yyyy-mm-ddの形式にする
        $dateStr = sprintf('%04d-%02d-01', $year, $month);
        //date型に整形
        $date = new Carbon($dateStr);
        $count = $date->daysInMonth;
        $dates = [];

        for ($i = 0; $i < $count; $i++, $date->addDay()) {
            // copyしないと全部同じオブジェクトを入れてしまうことになる
            $dates[] = $date->copy();
        }

        //DB情報をhome.blade.phpに引き継ぐ
        return view('home', [
            'day' => $day,
            'want' => $want,
            'dotask' => $dotask,
            'objective' => $objective,
            'monthData' => $monthData,
            'dates' => $dates,
            'calendarTitle' => $calendarTitle,
            'defDateYear' => $defDateYear,
            'defDateMonth' => $defDateMonth,
        ]);
    }
    //★★day★★
    public function dayAdd()
    {
        return view('additem.day');
    }

    public function dayItemAdd(Request $request)
    {
        //インスタンス作成
        $day = new Day();

        //モデルインスタンスのtask,username属性に代入
        $day->task = $request->task;
        $day->username = $request->username;


        //saveメソッドが呼ばれると新しいレコードがデータベースに挿入される
        $day->save();

        return redirect('/home');
    }

    public function dayItemDelete(Request $request, Day $day)
    {
        $day->delete();
        return redirect('/home');
    }

    //★★want★★
    public function wantAdd()
    {
        return view('additem.want');
    }

    public function wantItemAdd(Request $request)
    {
        //インスタンス作成
        $want = new Want();

        //モデルインスタンスのtask,username属性に代入
        $want->task = $request->task;
        $want->username = $request->username;


        //saveメソッドが呼ばれると新しいレコードがデータベースに挿入される
        $want->save();

        return redirect('home');
    }
    public function wantItemDelete(Request $request, Want $want)
    {
        $want->delete();
        return redirect('/home');
    }


    //★★do★★
    public function doAdd()
    {
        return view('additem.do');
    }
    public function doItemAdd(Request $request)
    {
        //インスタンス作成
        $dotask = new Dotask();

        //モデルインスタンスのtask,username属性に代入
        $dotask->task = $request->task;
        $dotask->username = $request->username;


        //saveメソッドが呼ばれると新しいレコードがデータベースに挿入される
        $dotask->save();

        return redirect('home');
    }
    public function doItemDelete(Request $request, Dotask $dotask)
    {
        $dotask->delete();
        return redirect('/home');
    }



    //★★objective★★
    public function objectiveAdd()
    {
        return view('additem.objective');
    }
    public function objectiveItemAdd(Request $request)
    {
        //インスタンス作成
        $objective = new Objective();

        //モデルインスタンスのtask,username属性に代入
        $objective->task = $request->task;
        $objective->username = $request->username;


        //saveメソッドが呼ばれると新しいレコードがデータベースに挿入される
        $objective->save();

        return redirect('home');
    }

    public function objectiveItemDelete(Request $request, Objective $objective)
    {
        $objective->delete();
        return redirect('/home');
    }

    //★★month(カレンダー)★★
    public function monthAdd()
    {
        return view('additem.month');
    }


    public function monthItemAdd(Request $request)
    {
        //インスタンス作成
        $month = new Month();

        //モデルインスタンスのtask,username属性に代入
        $month->year = $request->year;
        $month->month = $request->month;
        $month->day = $request->day;
        $month->task = $request->task;
        $month->username = $request->username;


        //saveメソッドが呼ばれると新しいレコードがデータベースに挿入される
        $month->save();

        return redirect('/home');
    }

    public function mypage()
    {
        return view('mypage');
    }

    public function delete(Request $request)
    {
        // ユーザ削除処理実行

        $id = $request->id;
        $list = DB::delete(
            "delete from month where id = ?",
            [$request['id']]
        );

        return redirect('/home');
    }

    public function test2(Request $request)
    {
        $name =  $request->input('name');
        \Debugbar::info($name);

        $nameadd = $name . "くん";
        $now = new Carbon;
        return view('test2', [
            'nameadd' => $nameadd
        ]);
    }
}
