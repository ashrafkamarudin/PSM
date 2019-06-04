<?php

namespace App\Http\Controllers;

use App\CirculationHistory;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CirculationHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = CirculationHistory::with('book')->paginate(5);
        $recordDates = collect();

        $records = CirculationHistory::selectRaw("Month(created_at) as month, YEAR(created_at) as year")
            ->groupBy('month', 'year')->get();

        foreach ($records as $record) {
            $month = $record->month;
            $year = $record->year;

            $date = Carbon::createFromDate($year, $month, 1);
            $recordDates->push($date->format('F Y'));
        }


        //dd($recordDates);

        return view('manage.circulation.history')
            ->withRecords($books)
            ->withRecordDates($recordDates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        //

        $date = Carbon::createFromFormat('F Y', $request->date);

        $records = CirculationHistory::with('book')
            ->whereMonth('created_at', '=', $date->month)
            ->whereYear('created_at', '=', $date->year)
            ->paginate(10);

        return view('manage.circulation.history-filtered')
            ->withDate($date->format('F Y'))
            ->withRecords($records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CirculationHistory  $circulationHistory
     * @return \Illuminate\Http\Response
     */
    public function show(CirculationHistory $circulationHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CirculationHistory  $circulationHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(CirculationHistory $circulationHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CirculationHistory  $circulationHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CirculationHistory $circulationHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CirculationHistory  $circulationHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CirculationHistory $circulationHistory)
    {
        //
    }
}
