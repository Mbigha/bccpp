<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EnrollmentPageOne;
use App\EnrollmentPageTwo;
use App\EnrollmentPageThree;
use App\EnrollmentPageFour;
use App\BimanualExamination;

class EnrollmentControllerTwo extends Controller
{
	private $page_data;

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function page_four( Request $request )
	    {
	    	if ($request->session()->has('patient_id')) {

		    	$page_data = EnrollmentPageFour::where('patient_id', '=', session('patient_id'))->first();
		    	$page_one = EnrollmentPageOne::find( session('patient_id') );
		    	if ( $page_one ) {

		    		$bimanual_examinations = $page_one->bimanual_examinations->toArray();
		    		$patient_bimanual_examinations = [];
		    		$i = 0;
		    		foreach ($bimanual_examinations as $value) {
		    			$patient_bimanual_examinations[$i] = $value['name'];
		    			$i++;
		    		}
		    	} else {
		    		$patient_perineums=array();
		    	}

		    	$yes_no = [
		    		'Yes', 'No',
		    	];
		    	$yes_no_unknown = [
		    		'Yes', 'No', 'Unknown'
		    	];
		    	$follow_ups = [
		    		'LESS THAN 6 months', '6 -12 months', 'MORE THAN 12 months'
		    	];
		    	$yes_no_already = [
		    		'Yes', 'No', 'Already on treatment'
		    	];
		    	$yes_no_already_chunk = array_chunk($yes_no_already, 2);

		    	$via_results = [
		    		'Negative 1', 'Negative 2', 'Negative 3',
		    		'Positive for AW', 'Uncertain (eg. cervicitis, severe atrophic change, etc)', 'Suspicious',
		    	];
		    	$via_results_chunk = array_chunk($via_results, 4);

		    	$vili_results = [
		    		'Negative 1', 'Negative 2', 'Negative 3',
		    		'Positive for iodine', 'Uncertain (eg. cervicitis, severe atrophic change, etc)', 'Suspicious',
		    	];
		    	$vili_results_chunk = array_chunk($vili_results, 4);

		    	$plans = [
		    		'For cryotherapy/Thermocoagulation', 'For LEEP', 'For biopsy',
		    		'For Radiotherapy', 'See gynecologist',
		    	];
		    	$plans_chunk = array_chunk($plans, 3);

		    	$bimanual_examinations = BimanualExamination::all();
		    	$bimanual_examinations = array_chunk($bimanual_examinations->toArray(), 4);

		    	$data = [
		    		'title' => 'Page 4 Enrollment Form ',
		    		'application' => $page_data,
		    		'yes_no' => $yes_no,
		    		'yes_no_unknown' => $yes_no_unknown,
		    		'follow_ups' => $follow_ups,

		    		'yes_no_already_chunk' => $yes_no_already_chunk,
		    		'yes_no_already' => $yes_no_already,
		    		
		    		'via_results' => $via_results,
		    		'via_results_chunk' => $via_results_chunk,

		    		'vili_results' => $vili_results,
		    		'vili_results_chunk' => $vili_results_chunk,

		    		'plans' => $plans,
		    		'plans_chunk' => $plans_chunk,

		    		'bimanual_examinations' => $bimanual_examinations,
		    		'patient_bimanual_examinations' => $patient_bimanual_examinations,
		    	];

		    	if ( $request->isMethod('post') ) {

		    		$form_data = $request->all();
		    		if ( ! $page_data ) {

		    			if( $request->bimanual_examinations ) {
		    				if ( in_array('other', $request->bimanual_examinations) ) {
			    				$form_data['other_biman_examination'] = $request->other_bimanual_examination;
			    				unset( $form_data['other'] );
			    			}
			    			if ( in_array('not_done', $request->bimanual_examinations) ) {
			    				$form_data['bimanual_exam_not_done'] = $request->biman_not_done_data;
			    				unset( $form_data['not_done'] );
			    			}
		    			}

		    			if ( $request->treated == 'other' ) {
		    				$form_data['treated'] = $request->specific_treated;
		    			}
		    			if ( $request->via == 'other' ) {
		    				$form_data['via'] = $request->via_not_done;
		    			}
		    			if ( $request->vili == 'other' ) {
		    				$form_data['vili'] = $request->vili_not_done;
		    			}
		    			if ( $request->plan == 'other' ) {
		    				$form_data['plan'] = $request->follow_up;
		    			}

		    			$form_data['patient_id'] = $page_one->id;
		    			$page = EnrollmentPageFour::create( $form_data );

		    			if( ! empty( $form_data['bimanual_examinations'] ) ) {
		    				$control_methods = BimanualExamination::find( $form_data['bimanual_examinations'] );
		    				$page_one->bimanual_examinations()->attach( $control_methods );
		    			}
		    			
		    		} else {

		    			if( $request->bimanual_examinations ) {
		    				if ( in_array('other', $request->bimanual_examinations) ) {
			    				$form_data['other_biman_examination'] = $request->other_bimanual_examination;
			    				unset( $form_data['other'] );
			    			} else {
			    				$form_data['other_biman_examination'] = NULL;
			    			}

			    			if ( in_array('not_done', $request->bimanual_examinations) ) {
			    				$form_data['bimanual_exam_not_done'] = $request->biman_not_done_data;
			    				unset( $form_data['not_done'] );
			    			} else {
			    				$form_data['bimanual_exam_not_done'] = NULL;
			    			}
		    			}
		    			
		    			if ( $request->treated == 'other' ) {
		    				$form_data['treated'] = $request->specific_treated;
		    			}
		    			if ( $request->via == 'other' ) {
		    				$form_data['via'] = $request->via_not_done;
		    			}
		    			if ( $request->vili == 'other' ) {
		    				$form_data['vili'] = $request->vili_not_done;
		    			}
		    			if ( $request->plan == 'other' ) {
		    				$form_data['plan'] = $request->follow_up;
		    			}

		    			$form_data['patient_id'] = $page_one->id;
		    			$page_data->update( $form_data );

		    			if( ! empty( $form_data['bimanual_examinations'] ) ) {
		    				$control_methods = BimanualExamination::find( $form_data['bimanual_examinations'] );
		    				$page_one->bimanual_examinations()->detach();
		    				$page_one->bimanual_examinations()->attach( $control_methods );
		    			}
		    		}
		    		$request->session()->forget('patient_id');

		    		$success = 'Congratualations !!!. You have completed the form';
		    		$request->session()->flash('success', $success);
		    		return redirect('dashboard');

		    	} else {
		    		return view('enrollment.page-four', $data);
		    	}
		    } else {
		    	return redirect('enrollment/page-one');
		    }
	    }

	public function choose_action()
	{
		return view('enrollment.choose-action');
	}

	public function start_new(Request $request)
	{
		$request->session()->forget('patient_id');
	    return redirect('enrollment/page-one');
	}

	public function continue(Request $request)
	{
		$client = EnrollmentPageOne::where('bccpp_id', '=', $request->bccpp_id)->first();

		if ( $client ) {
			session(['patient_id' => $client->id]);
	    	return redirect('enrollment/page-one');
		} else {
			$success = 'Sorry !!!. No Client was found with that BCCPP ID';
		    $request->session()->flash('success', $success);
		    return redirect('enrollment/choose-action');
		}
	}
}
