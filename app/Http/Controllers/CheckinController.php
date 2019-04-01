<?php

namespace App\Http\Controllers;

use App\Checkin;
use App\Student;
use Session;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $checkin = Checkin::all();
        return view('checkin')->withCheckins($checkin);
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
        if (Student::find($request->std_ic) != NULL) {
            if (Checkin::find($request->std_ic) != NULL) {
                Session::flash('error', 'Student already checked in. ');
            } else {
                $checkin = new Checkin();
                $checkin->std_ic = $request->std_ic;
                $checkin->save();

                Session::flash('success', 'Check In Success ');
            }
        } else {
            //return redirect()->route('home');
            Session::flash('error', 'Student IC not found, Please try again. ');
        }

        return redirect()->route('checkIn');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Checkin  $checkin
     * @return \Illuminate\Http\Response
     */
    public function show(Checkin $checkin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Checkin  $checkin
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkin $checkin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Checkin  $checkin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkin $checkin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Checkin  $checkin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkin $checkin)
    {
        //
    }
}
