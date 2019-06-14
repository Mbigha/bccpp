<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnrollmentPageOne extends Model
{
	protected $table = 'enrollment_page_one';

    protected $guarded = ['specific_religion', 'specific_occupation'];

    public function planning_methods()
    {
    	return $this->belongsToMany('App\FamilyPlanningMethods', 'family_planning_patient', 'patient_id', 'method_id');
    }

    public function breast_examinations()
    {
    	return $this->belongsToMany('App\BreastExamination', 'breast_examination_patient', 'patient_id', 'exam_id');
    }

    public function perineum()
    {
    	return $this->belongsToMany('App\Perineum', 'perinuem_patient', 'patient_id', 'perineum_id');
    }

    public function vagina_examinations()
    {
    	return $this->belongsToMany('App\VaginaExamination', 'vagina_examination_patient', 'patient_id', 'exam_id');
    }

    public function cervix_examinations()
    {
    	return $this->belongsToMany('App\CervixExamination', 'cervix_examination_patient', 'patient_id', 'exam_id');
    }

    public function bimanual_examinations()
    {
    	return $this->belongsToMany('App\BimanualExamination', 'bimanual_examination_patient', 'patient_id', 'exam_id');
    }
}
