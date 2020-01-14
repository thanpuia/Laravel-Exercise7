<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Standard;
use App\Attendence;
use App\User;


class AttendenceController extends Controller
{

    public function index()   {}

    public function create()
    {
       $standards = Standard::pluck('standard_name','standard_id');
       return view('attendence.create',compact('standards'));
    }
    public function postCreate(Request $request){

        $mStandard = $request->standard;
        $mDate = $request->date;
        $status = array(true=>'present',false=>'absent');
        $mStudents = User::orderBy('id')->where('registration_number','LIKE',$mStandard.'%')->get();

        $duplicateGate = Attendence::where('users_registration_number','LIKE',$mStandard.'%')->where('date','=',$mDate)->first();

        if($duplicateGate == null)
            return view('attendence.create_post',compact('status','mDate','mStandard','mStudents'));
        else {
            $request->session()->flash('status_already_enter','Already enter');
            return redirect()->route('attendence.create');
        }
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $data = $request->all();

        $id                     = $data['users_id'];
        $registration_number    = $data['registration_number'];
        $dates                  = $data['date'];
        $statuses               = $data['status'];
        $remarks                = $data['remarks'];

        for($i=0;$i<count($registration_number);$i++){
            $currentStudent = new Attendence;
            $currentStudent->users_registration_number  = $registration_number[$i] ;
            $currentStudent->date                       = $dates[$i];
            $currentStudent->status                     = $statuses[$i];
            $currentStudent->remarks                    = $remarks[$i];

            $currentStudent->save();
        }

    return redirect()->route('attendence.create');

    }

    public function show($id)  {}
    public function edit($id)   {   }
    public function update(Request $request, $id)  {  }
    public function destroy($id) {  }

    public function attendence_edit(Request $request){
        $mStandard = $request->standard;
        $mDate = $request->date;
        $status = array(true=>'present',false=>'absent');

        $mAttendences = Attendence::where('date','=',$mDate)->where('users_registration_number','LIKE',$mStandard.'%')->get();

        return view('attendence.edit',compact('status','mDate','mStandard','mAttendences'));

    }

    public function attendence_edit_store(Request $request){

         //dd($request->all());
         $data = $request->all();

         $id = $data['users_id'];
         $registration_number = $data['registration_number'];
         $dates = $data['date'];
         $statuses = $data['status'];
         $remarks = $data['remarks'];


        for($i=0;$i<count($registration_number);$i++){
            $currentStudent = Attendence::find($id[$i]);
            $currentStudent->users_registration_number = $registration_number[$i] ;
            $currentStudent->date = $dates[$i];
            $currentStudent->status = $statuses[$i];
            $currentStudent->remarks = $remarks[$i];

            $currentStudent->save();

     }

     return redirect()->route('attendence.create');
    }

    public function viewByClass(Request $request){
        $mStandard = $request->standard;
        $mDate = $request->date;

        $selectStudents = Attendence::where('users_registration_number','LIKE',$mStandard.'%')->where('date','LIKE',$mDate)->get();

        return view('attendence.viewByClass',compact('mDate','mStandard','selectStudents'));
    }

    public function viewByRegistration(Request $request){
        $student_registration_number = $request->registration_number;
        $singleStudentData = Attendence::where('users_registration_number','=',$student_registration_number)->get();
        //dd($singleStudentData);

        return view('attendence.viewByRegistration',compact('singleStudentData'));
    }
}
