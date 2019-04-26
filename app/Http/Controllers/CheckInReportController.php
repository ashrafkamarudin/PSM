<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use LaraFlash;
use Carbon\Carbon;
use App\Checkin;

class CheckInReportController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.report.index');
    }

    public function result()
    {
        /*
        $checkin = Checkin::whereHas(
            'student', function ($query) {
                $query->where('form', '=', '2');
            }
        )->get()->groupBy(function($d) {
            return Carbon::parse($d->created_at)->format('m');
        });*/
        
        $checkin = Checkin::get()->groupBy(function($d) {
            return Carbon::parse($d->created_at)->format('m');
        });

        $monthly = $checkin->map(function ($item, $key) {
            return collect($item)->count();
        });

        //dd($monthly);
        return view('manage.report.result')->withMonthly($monthly);
    }
}
