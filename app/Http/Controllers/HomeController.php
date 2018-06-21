<?php

namespace App\Http\Controllers;

use App\Evaluation;
use App\Units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function index()
    {
        $number=1;
        $regno=Auth::user()->reg_no;
        $regno1=DB::select('select * from students where reg_number=?',[$regno]);
        $getUnits=DB::table('units')
            ->select('units.name as unit_name','units.unit_code','lectures.name','currents.lecture_number','currents.id')
            ->join('students',function ($join){
                $join->on('students.year', '=', 'units.year');
                $join->on('students.semester','=','units.semester');

            })

            ->join('currents',function ($join){
                $join->on('currents.u_code', '=', 'units.unit_code');
            })
            ->join('lectures',function($join){
                $join->on('lectures.lect_number','=','currents.lecture_number');
            })
            ->where('students.reg_number','=',$regno1[0]->reg_number)
            ->get();

        $assessed=Evaluation::where('user_id',Auth::user()->id)->first();

        return view('home')->with(compact('number','getUnits','number','assessed'));
    }
}
