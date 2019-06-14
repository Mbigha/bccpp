<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnrollmentPageFour extends Model
{
	protected $table = 'enrollment_page_four';

    protected $guarded = [
    	'bimanual_examinations', 'biman_not_done_data', 'other_bimanual_examination', 'specific_treated', 'via_not_done', 
    	'vili_not_done', 'follow_up'
    ];
}
