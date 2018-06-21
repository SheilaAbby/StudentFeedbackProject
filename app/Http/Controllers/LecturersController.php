<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Session;
use App\Lectures;
use Illuminate\Http\Request;

class LecturersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $lecturers=Lectures::all();
        $number=1;
        flash('Welcome to Admin Panel')->success();
        return view('administration/lecturers.index')->with(compact('lecturers','number'));
    }
    public function index1()
    {
        //
        $lecturers=Lectures::all();
        $number=1;
        return view('administration/lecturers.edit')->with(compact('lecturers','number'));
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
    public function store(Request $request,Lectures $lecture)
    {

        //$lecture=new Lectures();
        $lecture->name=$request->input('name');
        $lecture->lect_number=$request->input('lect_number');

        if($lecture->save()){
            flash('Successfully added lecturer information')->success();
           return view('administration/lecturers.add');

        }
        return back()->withInput();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lectures  $lectures
     * @return \Illuminate\Http\Response
     */
    public function show(Lectures $lectures)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lectures  $lectures
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecturer=Lectures::find($id);

        return view('administration/lecturers.update')->with(compact('lecturer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lectures  $lectures
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       $lecturer=Lectures::where('id',$id);
        $lecturer->update([
           'name'=>$request->input('name'),
            'lect_number'=>$request->input('lect_number')
        ]);

        $lecturers=Lectures::all();
        $number=1;
        return view('administration/lecturers.index')->with(compact('lecturers','number'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lectures  $lectures
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lecturer=Lectures::find($id);
        $lecturer->delete();
        return redirect()->back();
    }

}
