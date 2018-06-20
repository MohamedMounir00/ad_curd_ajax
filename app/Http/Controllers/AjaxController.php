<?php

namespace App\Http\Controllers;
use App\Student;
use App\Sex;
use Illuminate\Http\Request;
use destory;

class AjaxController extends Controller
{
    //

    public function index()
    {
    	$sexes= Sex::pluck('sex','id');

    	return view('ajax.index',compact('sexes'));
    }
//////////////////////////////////////////// 	read data ////////////////////////////////////////////////////////////
    public function readData(){

    	$student = Student::join('sexes','sexes.id','=','students.sex_id')->selectRaw('sexes.sex,
    		students.first_name,
    		students.last_name,
    		CONCAT(students.first_name," ",students.last_name) AS full_name,students.student_id'
    )->get();
    	//return response($student); uses this 
    	//or this  
    	return view('ajax.student_list',compact('student'));

    }
///////////////////////////////////////////////////  insert data///////////////////////////////////////////////////

    public function store(Request $r)
    {
    	if ($r->ajax()) {
    		$student = Student::create($r->all());
    		return response($this->find($student->student_id));
    		//return response($r->all());

    	}
    	    }
////////////////////////////////////////////////////////////////// insert a data in data table after insert databas////////////
    	    public function find($id)
    	    {
    	    	return Student::join('sexes','sexes.id','=','students.sex_id')
    	    	->selectRaw('sexes.sex,
    	    		students.sex_id,
    		students.first_name,
    		students.last_name,
    		CONCAT(students.first_name," ",students.last_name) AS full_name,students.student_id')
    	    	->where('students.student_id',$id)
    	    	->first();
    	    }


    	    ///////////////////////////////////////////////////////////////update-///////////////////////////////////////////

    	    public function edit(Request $r){

    	    	if ($r->ajax()) {
    	    		$student = Student::find($r->student_id);
    	    		return response($student);
    	    	}

    	    }
    	     public function update(Request $r){

    	    	if ($r->ajax()) {
    	    		$student = Student::find($r->student_id);
    	    		$student->update($r->all());
    		return response($this->find($student->student_id));

    	    	}

    	    }


//////////////////////////////////////////////////////////////////////////////////////////delete data////////////////////////////


			public function destory(Request $r){
				if ($r->ajax()) {
					    Student::destroy($r->student_id);
					    return response(['message'=>'student delete']);

				}
			}    	    

			/////////////////////////////////////////////////////////////////pagination///////////////////////////////

 public function findpaginate()
    	    {
    	    	return Student::join('sexes','sexes.id','=','students.sex_id')
    	    	->selectRaw('sexes.sex,
    	    		students.sex_id,
    		students.first_name,
    		students.last_name,
    		CONCAT(students.first_name," ",students.last_name) AS full_name,students.student_id')
    	    	->paginate(2);
    	    }


public function pagination(){

	$students = $this->findpaginate();
	return view('ajax.paginate',compact('students'));
}

public function studentpage(){
		$students = $this->findpaginate();
	return view('ajax.paginatelist',compact('students'))->render();

}
}
