<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnrollmentPageThree extends Model
{
	protected $table = 'enrollment_page_three';

    protected $guarded = [
    	'other_breast_examination', 'other_perinuem_examination', 'not_done_data', 'other_vagina_examination',
    	'vag_not_done_data', 'other_cervix_examination', 'cerv_not_done_data', 'examinations', 'perineums', 'vagina_examinations',
    	'cervix_examinations' 
    ];
}
