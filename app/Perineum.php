<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perineum extends Model
{
	protected $table = 'perineums';

    protected $guarded = [];

    public function patients()
    {
    	return $this->belongsToMany('App\EnrollmentPageOne', 'perinuem_patient', 'perineum_id', 'patient_id');
    }
}
