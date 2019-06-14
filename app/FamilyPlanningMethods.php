<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyPlanningMethods extends Model
{
	protected $table = 'family_planning_methods';

    protected $guarded = [];

    public function patients()
    {
    	return $this->belongsToMany('App\EnrollmentPageOne', 'family_planning_patient', 'method_id', 'patient_id');
    }
}
