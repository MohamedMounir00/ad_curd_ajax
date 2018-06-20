<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //

	protected $table = 'students';


            protected $fillable = ['first_name' ,'last_name','sex_id'];
	protected $primaryKey = 'student_id';

    public $timestamps =false;




    public function sex()
    {
        return $this->belongsTo('App\Sex');
    }
}
