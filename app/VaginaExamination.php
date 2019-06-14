<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VaginaExamination extends Model
{
	protected $table = 'vagina_examinations';

    protected $guarded = [];

    public function patients()
    {
    	return $this->belongsToMany('App\EnrollmentPageOne', 'vagina_examination_patient', 'exam_id', 'patient_id');
    }
}
