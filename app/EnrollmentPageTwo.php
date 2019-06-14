<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnrollmentPageTwo extends Model
{
	protected $table = 'enrollment_page_two';

    protected $guarded = ['specific_stop_reason', 'planning_methods', 'other_planning_method'];
}
