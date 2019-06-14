<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BreastExamination extends Model
{
	protected $table = 'breast_examinations';

    protected $guarded = [];

    public function patients()
    {
    	return $this->belongsToMany('App\EnrollmentPageOne', 'breast_examination_patient', 'exam_id', 'patient_id');
    }
}
