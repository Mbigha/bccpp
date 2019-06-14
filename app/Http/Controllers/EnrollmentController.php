<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EnrollmentPageOne;
use App\EnrollmentPageTwo;
use App\EnrollmentPageThree;
use App\FamilyPlanningMethods;
use App\BreastExamination;
use App\VaginaExamination;
use App\CervixExamination;
use App\Perineum;

class EnrollmentController extends Controller
{
	private $page_data;

	public function __construct()
	{
		$this->middleware('auth');
	}

    public function page_one( Request $request )
	    {
	    	if ( $request->session()->has('patient_id') ) {
	    		$page_data = EnrollmentPageOne::where('id', '=', session('patient_id'))->first();
	    	} else {
	    		$page_data = '';
	    	}

	    	$religions_not_chunk = [
	    		'Baptist', 'Catholic', 'Presbyterian', 'Pentecostal', ' Jehovah Witness', 'Muslim'
	    	];
	    	$religions = array_chunk($religions_not_chunk, 4);

	    	$occupations_not_chunk = [
	    		'Housewife', 'Farmer', 'Health Care Worker', 'Secretary', 'Trader',
	    		'Teacher', 'Student', 'Seamstress', 'Domestic Worker', 'Hair Dresser'
	    	];
	    	$occupations = array_chunk($occupations_not_chunk, 4);

	    	$data = [
	    		'title' => 'Page 1 Enrollment Form ',
	    		'application' => $page_data,
	    		'religions' => $religions,
	    		'occupations' => $occupations,
	    		'occupations_not_chunk' => $occupations_not_chunk,
	    		'religions_not_chunk' => $religions_not_chunk,
	    	];

	    	if ( $request->isMethod('post') ) {

	    		$form_data = $request->all();
	    		if ( ! $request->session()->has('patient_id') ) {
	    			if ( $request->religion == 'other' ) {
	    				$form_data['religion'] = $request->specific_religion;
	    			}

	    			if ( $request->occupation == 'other' ) {
	    				$form_data['occupation'] = $request->specific_occupation;
	    			}

	    			$page_one = EnrollmentPageOne::create( $form_data );
	    			session(['patient_id' => $page_one->id]);
	    		} else {
	    			if ( $request->religion == 'other' ) {
	    				$form_data['religion'] = $request->specific_religion;
	    			}

	    			if ( $request->occupation == 'other' ) {
	    				$form_data['occupation'] = $request->specific_occupation;
	    			}

	    			$page_data->update( $form_data );
	    			session(['patient_id' => $page_data->id]);
	    		}

	    		$success = 'Page data has been saved. Please continue below';
	    		$request->session()->flash('success', $success);
	    		return redirect('enrollment/page-two');
	    	} else {
	    		return view('enrollment.page-one', $data);
	    	}
	    }

	    public function page_two( Request $request )
	    {
	    	if ($request->session()->has('patient_id')) {

		    	$page_data = EnrollmentPageTwo::where('patient_id', '=', session('patient_id'))->first();
		    	$page_one = EnrollmentPageOne::find( session('patient_id') );
		    	if ( $page_one ) {
		    		$patient_control_methods = $page_one->planning_methods->toArray();
		    		$patient_planning_methods = [];
		    		$i = 0;
		    		foreach ($patient_control_methods as $value) {
		    			$patient_planning_methods[$i] = $value['name'];
		    			$i++;
		    		}
		    	} else {
		    		$patient_planning_methods=array();
		    	}

		    	$yes_no = [
		    		'Yes', 'No',
		    	];

		    	$yes_no_unknown = [
		    		'Yes', 'No', 'Unknown'
		    	];

		    	$hiv_results = [
		    		'Positive', 'Negative', 'Indeterminate', 'Don’t Know',
		    	];

		    	$if_no = [
		    		'Yes', 'No',
		    	];
		    	$if_no = array_chunk($if_no, 1);

		    	$marital_status = [
		    		'Married', 'Single(never married)', 'Separated',
		    		'Divorce', 'Widow', 'Not married',
		    	];
		    	$marital_status = array_chunk($marital_status, 3);

		    	$period_stop_reasons_not_chunk = [
		    		'Recently had a baby', 'Menopause (when periods normally stop  due  to aging)', 
		    		'Hormone shots or implants for child spacing', 'Hysterectomy (doctor removed uterus)', 'Pregnancy',
		    	];
		    	$period_stop_reasons = array_chunk($period_stop_reasons_not_chunk, 3);

		    	$planning_methods = FamilyPlanningMethods::all();
		    	$planning_methods = array_chunk($planning_methods->toArray(), 7);

		    	$data = [
		    		'title' => 'Page 2 Enrollment Form ',
		    		'application' => $page_data,
		    		'yes_no' => $yes_no,
		    		'if_no' => $if_no,
		    		'marital_status' => $marital_status,
		    		'period_stop_reasons' => $period_stop_reasons,
		    		'period_stop_reasons_not_chunk' => $period_stop_reasons_not_chunk,
		    		'yes_no_unknown' => $yes_no_unknown,
		    		'planning_methods' => $planning_methods,
		    		'patient_planning_methods' => $patient_planning_methods,
		    		'hiv_results' => $hiv_results,
		    	];

		    	if ( $request->isMethod('post') ) {
		    		$form_data = $request->all();
		    		// var_dump( $page_data->other_method );
		    		if ( ! $page_data ) {
		    			$form_data['patient_id'] = $page_one->id;
		    			if( $request->planning_methods ) {
		    				if ( in_array('other', $request->planning_methods) ) {
			    				$form_data['other_method'] = $request->other_planning_method;
			    				unset( $form_data['other'] );
			    			}
		    			}

		    			if ( $request->period_stop_reason == 'other' ) {
		    				$form_data['period_stop_reason'] = $request->specific_stop_reason;
		    			}

		    			$page = EnrollmentPageTwo::create( $form_data );
		    			if( ! empty( $request->planning_methods ) ) {
		    				$control_methods = FamilyPlanningMethods::find( $form_data['planning_methods'] );
		    				$page_one->planning_methods()->attach( $control_methods );
		    			}
		    		} else {
		    			$form_data['patient_id'] = $page_one->id;
		    			if( $request->planning_methods ) {
		    				if ( in_array('other', $request->planning_methods) ) {
			    				$form_data['other_method'] = $request->other_planning_method;
			    				unset( $form_data['other'] );
			    			} else {
			    				$form_data['other_method'] = NULL;
			    			}
		    			}

		    			if ( $request->period_stop_reason == 'other' ) {
		    				$form_data['period_stop_reason'] = $request->specific_stop_reason;
		    			}

		    			if( ! empty( $request->planning_methods ) ) {
		    				$control_methods = FamilyPlanningMethods::find( $form_data['planning_methods'] );
		    				$page_one->planning_methods()->detach();
		    				$page_one->planning_methods()->attach( $control_methods );
		    			}

		    			$page_data->update( $form_data );
		    		}

		    		$success = 'Page data has been saved. Please continue below';
		    		$request->session()->flash('success', $success);
		    		return redirect('enrollment/page-three');

		    	} else {
		    		return view('enrollment.page-two', $data);
		    	}
		    } else {
		    	return redirect('enrollment/page-one');
		    }
	    }

	    public function page_three( Request $request )
	    {
	    	if ($request->session()->has('patient_id')) {

		    	$page_data = EnrollmentPageThree::where('patient_id', '=', session('patient_id'))->first();
		    	$page_one = EnrollmentPageOne::find( session('patient_id') );
		    	if ( $page_one ) {
		    		$breast_examinations = $page_one->breast_examinations->toArray();
		    		$patient_breast_examinations = [];
		    		$i = 0;
		    		foreach ($breast_examinations as $value) {
		    			$patient_breast_examinations[$i] = $value['name'];
		    			$i++;
		    		}

		    		$perineumss = $page_one->perineum->toArray();
		    		$patient_perineums = [];
		    		$i = 0;
		    		foreach ($perineumss as $value) {
		    			$patient_perineums[$i] = $value['name'];
		    			$i++;
		    		}

		    		$vagina_examinations = $page_one->vagina_examinations->toArray();
		    		$patient_vagina_examinations = [];
		    		$i = 0;
		    		foreach ($vagina_examinations as $value) {
		    			$patient_vagina_examinations[$i] = $value['name'];
		    			$i++;
		    		}

		    		$cervix_examinations = $page_one->cervix_examinations->toArray();
		    		$patient_cervix_examinations = [];
		    		$i = 0;
		    		foreach ($cervix_examinations as $value) {
		    			$patient_cervix_examinations[$i] = $value['name'];
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

		    	$examinations = BreastExamination::all();
		    	$examinations = array_chunk($examinations->toArray(), 5);

		    	$vagina_examinations = VaginaExamination::all();
		    	$vagina_examinations = array_chunk($vagina_examinations->toArray(), 4);

		    	$cervix_examinations = CervixExamination::all();
		    	$cervix_examinations = array_chunk($cervix_examinations->toArray(), 4);

		    	$perineums = Perineum::all();
		    	$perineums = array_chunk($perineums->toArray(), 4);

		    	$data = [
		    		'title' => 'Page 3 Enrollment Form ',
		    		'application' => $page_data,
		    		'yes_no' => $yes_no,
		    		'yes_no_unknown' => $yes_no_unknown,

		    		'examinations' => $examinations,
		    		'patient_breast_examinations' => $patient_breast_examinations,

		    		'vagina_examinations' => $vagina_examinations,
		    		'patient_vagina_examinations' => $patient_vagina_examinations,

		    		'cervix_examinations' => $cervix_examinations,
		    		'patient_cervix_examinations' => $patient_cervix_examinations,

		    		'perineums' => $perineums,
		    		'patient_perineums' => $patient_perineums,
		    	];

		    	if ( $request->isMethod('post') ) {

		    		$form_data = $request->all();
		    		if ( ! $page_data ) {
		    			if( $request->examinations ) {
		    				if ( in_array('other', $request->examinations) ) {
			    				$form_data['other_examination'] = $request->other_breast_examination;
			    				unset( $form_data['other'] );
			    			}
		    			}

		    			if( $request->perineums ) {
		    				if ( in_array('other', $request->perineums) ) {
			    				$form_data['other_perineum'] = $request->other_perinuem_examination;
			    				unset( $form_data['other'] );
			    			}
			    			if ( in_array('not_done', $form_data['perineums']) ) {
			    				$form_data['perineum_not_done'] = $request->not_done_data;
			    				unset( $form_data['not_done'] );
			    			}
		    			}

		    			if( $request->vagina_examinations ) {
		    				if ( in_array('other', $request->vagina_examinations ) ) {
			    				$form_data['other_vag_examination'] = $request->other_vagina_examination;
			    				unset( $form_data['other'] );
			    			}
			    			if ( in_array('not_done', $request->vagina_examinations) ) {
			    				$form_data['vagina_exam_not_done'] = $request->vag_not_done_data;
			    				unset( $form_data['not_done'] );
			    			}
		    			}

		    			if( $request->cervix_examinations ) {
		    				if ( in_array('other', $request->cervix_examinations) ) {
			    				$form_data['other_cerv_examination'] = $request->other_cervix_examination;
			    				unset( $form_data['other'] );
			    			}
			    			if ( in_array('not_done', $request->cervix_examinations) ) {
			    				$form_data['cervix_exam_not_done'] = $request->cerv_not_done_data;
			    				unset( $form_data['not_done'] );
			    			}
		    			}

		    			$form_data['patient_id'] = $page_one->id;
		    			$page = EnrollmentPageThree::create( $form_data );
		    			if( ! empty( $form_data['examinations'] ) ) {
		    				$control_methods = BreastExamination::find( $form_data['examinations'] );
		    				$page_one->breast_examinations()->attach( $control_methods );
		    			}

		    			if( ! empty( $form_data['perineums'] ) ) {
		    				$control_methods = Perineum::find( $form_data['perineums'] );
		    				$page_one->perineum()->attach( $control_methods );
		    			}

		    			if( ! empty( $form_data['vagina_examinations'] ) ) {
		    				$control_methods = VaginaExamination::find( $form_data['vagina_examinations'] );
		    				$page_one->vagina_examinations()->attach( $control_methods );
		    			}

		    			if( ! empty( $form_data['cervix_examinations'] ) ) {
		    				$control_methods = CervixExamination::find( $form_data['cervix_examinations'] );
		    				$page_one->cervix_examinations()->attach( $control_methods );
		    			}
		    			
		    		} else {
		    			if( $request->examinations ) {
		    				if ( in_array('other', $request->examinations) ) {
			    				$form_data['other_examination'] = $request->other_breast_examination;
			    				unset( $form_data['other'] );
			    			} else {
			    				$form_data['other_examination'] = NULL;
			    			}
		    			}

		    			if( $request->perineums ) {
		    				if ( in_array('other', $request->perineums) ) {
			    				$form_data['other_perineum'] = $request->other_perinuem_examination;
			    				unset( $form_data['other'] );
			    			} else {
			    				$form_data['other_perineum'] = NULL;
			    			}

			    			if ( in_array('not_done', $form_data['perineums']) ) {
			    				$form_data['perineum_not_done'] = $request->not_done_data;
			    				unset( $form_data['not_done'] );
			    			} else {
			    				$form_data['perineum_not_done'] = NULL;
			    			}
		    			}

		    			if( $request->vagina_examinations ) {
		    				if ( in_array('other', $request->vagina_examinations ) ) {
			    				$form_data['other_vag_examination'] = $request->other_vagina_examination;
			    				unset( $form_data['other'] );
			    			} else {
			    				$form_data['other_vag_examination'] = NULL;
			    			}

			    			if ( in_array('not_done', $request->vagina_examinations) ) {
			    				$form_data['vagina_exam_not_done'] = $request->vag_not_done_data;
			    				unset( $form_data['not_done'] );
			    			} else {
			    				$form_data['vagina_exam_not_done'] = NULL;
			    			}
		    			}

		    			if( $request->cervix_examinations ) {
		    				if ( in_array('other', $request->cervix_examinations) ) {
			    				$form_data['other_cerv_examination'] = $request->other_cervix_examination;
			    				unset( $form_data['other'] );
			    			} else {
			    				$form_data['other_cerv_examination'] = NULL;
			    			}

			    			if ( in_array('not_done', $request->cervix_examinations) ) {
			    				$form_data['cervix_exam_not_done'] = $request->cerv_not_done_data;
			    				unset( $form_data['not_done'] );
			    			} else {
			    				$form_data['cervix_exam_not_done'] = NULL;
			    			}
		    			}

		    			if( ! empty( $form_data['examinations'] ) ) {
		    				$control_methods = BreastExamination::find( $form_data['examinations'] );
		    				$page_one->breast_examinations()->detach();
		    				$page_one->breast_examinations()->attach( $control_methods );
		    			}

		    			if( ! empty( $form_data['perineums'] ) ) {
		    				$control_methods = Perineum::find( $form_data['perineums'] );
		    				$page_one->perineum()->detach();
		    				$page_one->perineum()->attach( $control_methods );
		    			}

		    			if( ! empty( $form_data['vagina_examinations'] ) ) {
		    				$control_methods = VaginaExamination::find( $form_data['vagina_examinations'] );
		    				$page_one->vagina_examinations()->detach();
		    				$page_one->vagina_examinations()->attach( $control_methods );
		    			}

		    			if( ! empty( $form_data['cervix_examinations'] ) ) {
		    				$control_methods = CervixExamination::find( $form_data['cervix_examinations'] );
		    				$page_one->cervix_examinations()->detach();
		    				$page_one->cervix_examinations()->attach( $control_methods );
		    			}

		    			$form_data['patient_id'] = $page_one->id;
		    			$page_data->update( $form_data );
		    		}

		    		$success = 'Page data has been saved. Please continue below';
		    		$request->session()->flash('success', $success);
		    		return redirect('enrollment/page-four');

		    	} else {
		    		return view('enrollment.page-three', $data);
		    	}
		    } else {
		    	return redirect('enrollment/page-one');
		    }
	    }
}
