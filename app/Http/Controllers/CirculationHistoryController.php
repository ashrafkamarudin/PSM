<?php

namespace App\Http\Controllers;

use App\CirculationHistory;
use Illuminate\Http\Request;

class CirculationHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ////
        $books = CirculationHistory::with('book')->paginate(10);

        return view('manage.circulation.index')->withBooks($books);
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
