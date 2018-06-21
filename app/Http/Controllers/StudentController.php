<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Students;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses=Courses::all();
        return view('administration/students.add')->with(compact('courses'));
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
    public function store(Request $request,Students $student)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255|',
            'reg_number'=>'required|string|max:15|unique:students',
            'c_code' => 'required|string|max:10|',
            'year'=>'required|integer|max:6',
            'semester'=>'required|integer|max:2'
        ]);
        //
       $student=Students::create([
           'name'=>$request->input('name'),
           'reg_number'=>$request->input('reg_number'),
           'c_code'=>$request->input('c_code'),
           'year'=>$request->input('year'),
           'semester'=>$request->input('semester'),
       ]);
       User::create([
           'name'=>$student->name,
           'reg_no'=>$student->reg_number,
           'password'=> Hash::make($student->reg_number),
           'user_type'=>User::DEFAULT_TYPE,

       ]);
       if($student){
           flash('Student information successfully added');
           return view('administration/students.index');
       }
       return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $students)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Students $students)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $students)
    {
        //
    }
}
