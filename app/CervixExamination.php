<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CervixExamination extends Model
{
	protected $table = 'cervix_examinations';

    protected $guarded = [];

    public function patients()
    {
    	return $this->belongsToMany('App\EnrollmentPageOne', 'cervix_examination_patient', 'exam_id', 'patient_id');
    }
}
