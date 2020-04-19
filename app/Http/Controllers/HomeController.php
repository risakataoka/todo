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
        $month = DB::table('month')
            ->select(DB::raw('day, task, username, id'))
            ->where('username', '=', $name)
            ->get();


        $year = 2020;
        $month = 4;

        //yyyy-mm-ddの形式にする
        $dateStr = sprintf('%04d-%02d-01', $year, $month);
        //date型に整形
        $date = new Carbon($dateStr);

        $count = 31 + $date->dayOfWeek;
        $count = ceil($count / 7) * 7;

        $dates = [];

        for ($i = 0; $i < $count; $i++, $date->addDay()) {
            // copyしないと全部同じオブジェクトを入れてしまうことになる
            $dates[] = $date->copy();
        }

        $days = $date->daysInMonth; // 月に何日あるか取得
        $daysParWeek = $date::DAYS_PER_WEEK; // 1週の日数を取得(デフォルトは 7 が設定されている)
        $dayOfWeek = $date->startOfMonth()->dayOfWeek; // 1日の曜日(int)を取得

        $result = ceil(($days - ($daysParWeek - $dayOfWeek)) / $daysParWeek) + 1;



        //DB情報をhome.blade.phpに引き継ぐ
        return view('home', [
            'day' => $day,
            'want' => $want,
            'dotask' => $dotask,
            'objective' => $objective,
            'month' => $month,
            'dateStr' => $dateStr,
            'date' => $date,
            'count' => $count,
            'dates' => $dates,
            'result' => $result


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
        $month->day = $request->day;
        $month->task = $request->task;
        $month->username = $request->username;


        //saveメソッドが呼ばれると新しいレコードがデータベースに挿入される
        $month->save();

        return redirect('/home');
    }



    function test()
    {


        /*return view('/home', [
            'dt' => $dt
        ]);*/ }






    public function mypage()
    {
        return view('mypage');
    }
}
