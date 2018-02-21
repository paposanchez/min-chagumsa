<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Diagnosis;
use App\Models\Order;
use App\Models\Post;
use App\Models\Warranty;
use App\Models\Code;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{


    private function generateDateRange(Carbon $start_date, Carbon $end_date, $params = [])
    {
        $dates = [];
        $i = 1;
        for ($date = $start_date; $date->lte($end_date); $date->addDay()) {
            $dates[$date->format('Y-m-d')] = [
                // 'date' => $date->format('Y-m-d'),
                // 'count' => 0
                $i,
                0
            ];
            $i++;
        }
        return $dates;
    }

    private function setValuesByDate($olds, $news)
    {

        foreach ($olds as &$entry) {

            foreach ($news as $new) {


            }

        }

    }

    public function __invoke()
    {
        // $today = date('Y-m-d');
        $user = Auth::user();


        $range_date = $this->generateDateRange(Carbon::now()->subDays(30), Carbon::now());
        $range = [];
        foreach ([112, 113, 114, 126, 115] as $entry) {
            $range[$entry] = $range_date;
        }
        $diagnosis = $range;


        $diagnosis_db[112] = DB::table('diagnosis')
            ->select(DB::raw('count(*) as count'), DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as date"))
            ->whereDate('created_at', '>=', Carbon::now()->subDays(30))
            ->where('status_cd', 112)
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
            // ->groupBy('status_cd')
            ->get();
        $diagnosis_db[113] = DB::table('diagnosis')
            ->select(DB::raw('count(*) as count'), DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as date"))
            ->whereDate('created_at', '>=', Carbon::now()->subDays(30))
            ->where('status_cd', 113)
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
            ->get();

        $diagnosis_db[114] = DB::table('diagnosis')
            ->select(DB::raw('count(*) as count'), DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as date"))
            ->whereDate('created_at', '>=', Carbon::now()->subDays(30))
            ->where('status_cd', 114)
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
            ->get();

        $diagnosis_db[115] = DB::table('diagnosis')
            ->select(DB::raw('count(*) as count'), DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as date"))
            ->whereDate('created_at', '>=', Carbon::now()->subDays(30))
            ->where('status_cd', 115)
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
            ->get();

        $diagnosis_db[126] = DB::table('diagnosis')
            ->select(DB::raw('count(*) as count'), DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as date"))
            ->whereDate('created_at', '>=', Carbon::now()->subDays(30))
            ->where('status_cd', 126)
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
            ->get();


        foreach ($diagnosis_db as $key => $entry) {

            foreach ($entry as $k => $v) {

                // print_r($diagnosis[$key][$v->date]);
                // echo "<hr>";
                $diagnosis[$key][$v->date]['count'] = $v->count;
            }
        }

        $diagnosis_json = [];
        foreach ($diagnosis as $key => $entry) {
            $std = new \stdClass();
            $std->label = $key;
            $std->data = $entry;
            $diagnosis_json[] = $std;
        }

        //게시판관련
        if ($user->hasRole('admin')) {
            $posts = Post::where('board_id', 3)->orderBy('created_at', 'DESC')->take(10)->get();
        } else {
            $posts = Post::where('board_id', 1)->orderBy('created_at', 'DESC')->take(10)->get();
        }


        return view('admin.dashboard.index',
            compact('posts', 'user'));
    }

    public function getDiagnisisChart()
    {

        // 조회할 날짜
        $date_limit = 15;

        $range_date = $this->generateDateRange(Carbon::now()->subDays($date_limit), Carbon::now());
        $range = [];
        foreach ([112, 113, 114, 126, 115] as $entry) {
            $range[$entry] = $range_date;
        }
        $diagnosis = $range;


        $diagnosis_db[112] = DB::table('diagnosis')
            ->select(DB::raw('count(*) as count'), DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as date"))
            ->whereDate('created_at', '>=', Carbon::now()->subDays($date_limit))
            ->where('status_cd', 112)
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
            // ->groupBy('status_cd')
            ->get();
        $diagnosis_db[113] = DB::table('diagnosis')
            ->select(DB::raw('count(*) as count'), DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as date"))
            ->whereDate('created_at', '>=', Carbon::now()->subDays($date_limit))
            ->where('status_cd', 113)
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
            ->get();

        $diagnosis_db[114] = DB::table('diagnosis')
            ->select(DB::raw('count(*) as count'), DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as date"))
            ->whereDate('created_at', '>=', Carbon::now()->subDays($date_limit))
            ->where('status_cd', 114)
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
            ->get();

        $diagnosis_db[115] = DB::table('diagnosis')
            ->select(DB::raw('count(*) as count'), DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as date"))
            ->whereDate('created_at', '>=', Carbon::now()->subDays($date_limit))
            ->where('status_cd', 115)
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
            ->get();

        $diagnosis_db[126] = DB::table('diagnosis')
            ->select(DB::raw('count(*) as count'), DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as date"))
            ->whereDate('created_at', '>=', Carbon::now()->subDays($date_limit))
            ->where('status_cd', 126)
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
            ->get();

        foreach ($diagnosis_db as $key => $entry) {
            foreach ($entry as $k => $v) {
                $diagnosis[$key][$v->date][1] = $v->count;
            }
        }

        $diagnosis_json = [];
        foreach ($diagnosis as $key => $entry) {
            $std = new \stdClass();
            $std->label = Code::find($key)->display();
            $std->data = array_values($entry);
            $diagnosis_json[] = $std;
        }

        $ticks = [];
        foreach ($range_date as $key => $entry) {
            $ticks[] = [
                $entry[0],
                $key
            ];
        }

        return response()->json([
            'ticks' => $ticks,
            'data' => $diagnosis_json
        ]);
    }

    public function getInquireCount()
    {
        return response()->json();
    }

}
