<?php

namespace App\Http\Controllers;

use App\Student;
use Session;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate(10);
        return view('manage.students.index')->withStudents($students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.students.create');
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
        $student = new Student();
        $student->name = $request->name;
        $student->ic = $request->ic;
        $student->form = $request->form;
        $student->save();

        Session::flash('success', 'Successfully registered.');
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
        $student = Student::find($student->ic)->first();
        return view("manage.students.show")->withStudent($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
        $student = Student::find($student->ic)->first();
        return view("manage.students.edit")->withStudent($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
        $student = Student::where('id', '=', $request->id)->first();
        $student->name = $request->name;
        $student->ic = $request->ic;
        $student->form = $request->form;
        $student->save();

        //dd($student);

        Session::flash('success', 'Data berjaya diubah.');
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
        $student = Student::find($student->ic);

        //dd($student);

        $student->delete();

        Session::flash('success', 'Data berjaya dipadam.');
        return redirect()->route('students.index');
    }

    /**
     * Show the form for creating a new resource manually.
     *
     * @return \Illuminate\Http\Response
     */
    public function manual()
    {
        return view('manage.students.create');
    }
}
