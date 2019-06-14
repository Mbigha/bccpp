<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BimanualExamination extends Model
{
	protected $table = 'bimanual_examinations';

    protected $guarded = [];

    public function patients()
    {
    	return $this->belongsToMany('App\EnrollmentPageOne', 'bimanual_examination_patient', 'exam_id', 'patient_id');
    }
}
