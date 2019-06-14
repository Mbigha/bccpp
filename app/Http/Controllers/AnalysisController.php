<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EnrollmentPageOne;
use App\EnrollmentPageTwo;
use App\EnrollmentPageThree;
use App\EnrollmentPageFour;
use App\BimanualExamination;
use App\FamilyPlanningMethods;
use App\BreastExamination;
use App\VaginaExamination;
use App\CervixExamination;
use App\Perineum;
use DB;


class AnalysisController extends Controller
{
		private $page_data;

		public function __construct()
		{
			$this->middleware('auth');
		}

		public function form( Request $request )
	    {
	    		$page_data = '';

	    		$religions_not_chunk = [
		    		'Baptist', 'Catholic', 'Presbyterian', 'Pentecostal', ' Jehovah Witness', 'Muslim'
		    	];
		    	$religions = array_chunk($religions_not_chunk, 4);

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

		    	$marital_status = [
		    		'Married', 'Single(never married)', 'Separated',
		    		'Divorce', 'Widow', 'Not married',
		    	];
		    	$marital_status = array_chunk($marital_status, 3);

		    	$planning_methods = FamilyPlanningMethods::all();
		    	$planning_methods = array_chunk($planning_methods->toArray(), 7);

		    	$examinations = BreastExamination::all();
		    	$examinations = array_chunk($examinations->toArray(), 5);

		    	$vagina_examinations = VaginaExamination::all();
		    	$vagina_examinations = array_chunk($vagina_examinations->toArray(), 4);

		    	$cervix_examinations = CervixExamination::all();
		    	$cervix_examinations = array_chunk($cervix_examinations->toArray(), 4);

		    	$perineums = Perineum::all();
		    	$perineums = array_chunk($perineums->toArray(), 4);

		    	$bimanual_examinations = BimanualExamination::all();
		    	$bimanual_examinations = array_chunk($bimanual_examinations->toArray(), 4);

		    	$data = [
		    		'title' => 'Analysis Search Form ',
		    		'application' => $page_data,
		    		'yes_no' => $yes_no,
		    		'religions' => $religions,
		    		'yes_no_unknown' => $yes_no_unknown,
		    		'follow_ups' => $follow_ups,
		    		'marital_status' => $marital_status,
		    		'planning_methods' => $planning_methods,

		    		'yes_no_already_chunk' => $yes_no_already_chunk,
		    		'yes_no_already' => $yes_no_already,
		    		
		    		'via_results' => $via_results,
		    		'via_results_chunk' => $via_results_chunk,

		    		'vili_results' => $vili_results,
		    		'vili_results_chunk' => $vili_results_chunk,

		    		'plans' => $plans,
		    		'plans_chunk' => $plans_chunk,

		    		'examinations' => $examinations,
		    		'vagina_examinations' => $vagina_examinations,
		    		'cervix_examinations' => $cervix_examinations,
		    		'perineums' => $perineums,
		    		'bimanual_examinations' => $bimanual_examinations,
		    	];
		    	return view('analysis.search-form', $data);
	    }

	    public function search( Request $request )
	    {
	    	if ( $request->isMethod('post') ) {
	    	
		    	$data = $request->all();
		    	$query = DB::table('enrollment_page_one')
		    		->select('enrollment_page_one.bccpp_id', 'enrollment_page_one.id');
		            // ->join('enrollment_page_four', 'enrollment_page_one.id', '=', 'enrollment_page_four.patient_id')
		            // ->join('family_planning_patient', 'enrollment_page_one.id', '=', 'family_planning_patient.patient_id')
		            // ->join('breast_examination_patient', 'enrollment_page_one.id', '=', 'breast_examination_patient.patient_id')
		            // ->join('perinuem_patient', 'enrollment_page_one.id', '=', 'perinuem_patient.patient_id')
		            // ->join('vagina_examination_patient', 'enrollment_page_one.id', '=', 'vagina_examination_patient.patient_id')
		            // ->join('cervix_examination_patient', 'enrollment_page_one.id', '=', 'cervix_examination_patient.patient_id')
		            // ->join('bimanual_examination_patient', 'enrollment_page_one.id', '=', 'bimanual_examination_patient.patient_id');

		        if( $request->marital_status
		        	|| $request->times_pregnant
		        	|| $request->babies
		        	|| $request->abortion
		        	|| $request->first_intercourse
		        	|| $request->sexual_partners
		        	|| $request->family_planning
		        	|| $request->planning_methods
		        	|| $request->hiv_tested
		        	|| $request->cd_four_count
		        	|| $request->on_medication
		        ) {
		        	$query->join('enrollment_page_two', 'enrollment_page_one.id', '=', 'enrollment_page_two.patient_id');
		        	$input = $request->input('planning_methods');

		        	if( in_array('other', $request->planning_methods) ) {
		        		$key = array_search('other', $input);
		        		unset( $input[ $key ] );
		        	}

		        	if( count( $input ) > 0 ){
			        	$query = $query->join('family_planning_patient', 'enrollment_page_one.id', '=', 'family_planning_patient.patient_id');
			        }
		        }

		        if( $request->breast_cancer
		        	|| $request->cervical_cancer
		        	|| $request->examinations
		        	|| $request->perineums
		        	|| $request->vagina_examinations
		        	|| $request->cervix_examinations
		        ) {
		        	$query->join('enrollment_page_three', 'enrollment_page_one.id', '=', 'enrollment_page_three.patient_id');
		        	
		        	if ( $request->input('examinations') !== null ){
		        		$input = $request->input('examinations');
			        	if( in_array('other', $request->examinations) ) {
			        		$key = array_search('other', $input);
			        		unset( $input[ $key ] );
			        	}
			        	if( count( $input ) > 0 ){
				        	$query = $query->join('breast_examination_patient', 'enrollment_page_one.id', '=', 'breast_examination_patient.patient_id');
				        }
		        	}

			        if ( $request->input('perineums') !== null ){
			        	$input_perineums = $request->input('perineums');
				        if( in_array('other', $request->perineums) ) {
			        		$key = array_search('other', $input_perineums);
			        		unset( $input_perineums[ $key ] );
			        	}
			        	if( in_array('not_done', $request->perineums) ) {
			        		$not_key = array_search('not_done', $input_perineums);
			        		unset( $input_perineums[ $not_key ] );
			        	}
			        	if( count( $input_perineums ) > 0 ){
				        	$query = $query->join('perinuem_patient', 'enrollment_page_one.id', '=', 'perinuem_patient.patient_id');
				        }
			        }
			        

			        if ( $request->input('vagina_examinations') !== null ){
			        	$input_vagina = $request->input('vagina_examinations');
				        if( in_array('other', $request->vagina_examinations) ) {
			        		$key = array_search('other', $input_vagina);
			        		unset( $input_vagina[ $key ] );
			        	}
			        	if( in_array('not_done', $request->vagina_examinations) ) {
			        		$not_key = array_search('not_done', $input_vagina);
			        		unset( $input_vagina[ $not_key ] );
			        	}
			        	if( count( $input_vagina ) > 0 ){
				        	$query = $query->join('vagina_examination_patient', 'enrollment_page_one.id', '=', 'vagina_examination_patient.patient_id');
				        }
			        }
			        

			        if ( $request->input('cervix_examinations') !== null ){
			        	$input_cervix = $request->input('cervix_examinations');
				        if( in_array('other', $request->cervix_examinations) ) {
			        		$key = array_search('other', $input_cervix);
			        		unset( $input_cervix[ $key ] );
			        	}
			        	if( in_array('not_done', $request->cervix_examinations) ) {
			        		$not_key = array_search('not_done', $input_cervix);
			        		unset( $input_cervix[ $not_key ] );
			        	}
			        	if( count( $input_cervix ) > 0 ){
				        	$query = $query->join('cervix_examination_patient', 'enrollment_page_one.id', '=', 'cervix_examination_patient.patient_id');
				        }
			        }
		        }

		        if( $request->bimanual_examinations
		        	|| $request->via
		        	|| $request->vili
		        	|| $request->plan
		        ) {
		        	$query->join('enrollment_page_four', 'enrollment_page_one.id', '=', 'enrollment_page_four.patient_id');
		        	$input = $request->input('bimanual_examinations');

		        	if( in_array('other', $request->bimanual_examinations) ) {
		        		$key = array_search('other', $input);
		        		unset( $input[ $key ] );
		        	}

		        	if( count( $input ) > 0 ){
			        	$query = $query->join('bimanual_examination_patient', 'enrollment_page_one.id', '=', 'bimanual_examination_patient.patient_id');
			        }
		        }

		        if( !empty( $request->temperature ) ){
		        	$query = $query->where('enrollment_page_one.temperature', $request->temperature);
		        }

		        if( !empty( $request->bp ) ){
		        	$query = $query->where('enrollment_page_one.bp', $request->bp);
		        }

		        if( !empty( $request->bw ) ){
		        	$query = $query->where('enrollment_page_one.bw', $request->bw);
		        }

		        if( !empty( $request->address ) ){
		        	$query = $query->where('enrollment_page_one.address', $request->address);
		        }

		        if( !empty( $request->tribe ) ){
		        	$query = $query->where('enrollment_page_one.tribe', $request->tribe);
		        }

		        if( !empty( $request->age ) ){
		        	$query = $query->where('enrollment_page_one.age', $request->age);
		        }

		        if( !empty( $request->dob ) ){
		        	$query = $query->where('enrollment_page_one.dob', $request->dob);
		        }

		        if( !empty( $request->religion ) ){
		        	if( $request->religion == 'other' ){
		        		$query = $query->where('enrollment_page_one.religion', $request->specific_religion);
		        	} else {
		        		// echo $data['religion'];
		        		$query = $query->where('enrollment_page_one.religion', '=', 'Baptist');
		        	}
		        }

		        if( !empty( $request->marital_status ) ){
		        	$query = $query->where('enrollment_page_two.marital_status', $request->marital_status);
		        }

		        if( !empty( $request->times_pregnant ) ){
		        	$query = $query->where('enrollment_page_two.times_pregnant', $request->times_pregnant);
		        }

		        if( !empty( $request->babies ) ){
		        	$query = $query->where('enrollment_page_two.babies', $request->babies);
		        }

		        if( !empty( $request->abortion ) ){
		        	$query = $query->where('enrollment_page_two.abortion', $request->abortion);
		        }

		        if( !empty( $request->first_intercourse ) ){
		        	$query = $query->where('enrollment_page_two.first_intercourse', $request->first_intercourse);
		        }

		        if( !empty( $request->sexual_partners ) ){
		        	$query = $query->where('enrollment_page_two.sexual_partners', $request->sexual_partners);
		        }

		        if( !empty( $request->family_planning ) ){
		        	$query = $query->where('enrollment_page_two.family_planning', $request->family_planning);
		        }

		        if( !empty( $request->planning_methods ) ){
		        	$input = $request->input('planning_methods');
		        	$other_method = $request->other_planning_method;

		        	if( in_array('other', $request->planning_methods) && count($input) == 1 ){
		        		$query = $query->where('enrollment_page_two.other_method', $request->other_planning_method);
		        	}

		        	if( in_array('other', $request->planning_methods) && count($input) > 1 ) {
		        		$query = $query->where(function($group_query) use ($input, $other_method) {
		        			$group_query->whereIn('family_planning_patient.method_id', $input)
		        				->orWhere('enrollment_page_two.other_method', $other_method);
		        		});
		        	}

		        	if( !in_array('other', $request->planning_methods) && count($input) > 0 ) {
		        		$query = $query->whereIn('family_planning_patient.method_id', $input);
		        	}
		        }

		        if( !empty( $request->hiv_tested ) ){
		        	$query = $query->where('enrollment_page_two.hiv_tested', $request->hiv_tested);
		        }

		        if( !empty( $request->cd_four_count ) ){
		        	$query = $query->where('enrollment_page_two.cd_four_count', $request->cd_four_count);
		        }

		        if( !empty( $request->on_medication ) ){
		        	$query = $query->where('enrollment_page_two.on_medication', $request->on_medication);
		        }


		        if( !empty( $request->breast_cancer ) ){
		        	$query = $query->where('enrollment_page_three.breast_cancer', $request->breast_cancer);
		        }

		        if( !empty( $request->cervical_cancer ) ){
		        	$query = $query->where('enrollment_page_three.cervical_cancer', $request->cervical_cancer);
		        }

		        // if( !empty( $request->examinations ) ){
		        // 	if( in_array('other', $request->examinations) ){
		        // 		$query = $query->where('enrollment_page_three.other_examination', $request->other_breast_examination);
		        // 		unset( $request->examinations['other'] );
		        // 	}
		        // 	if( count( $request->examinations > 0 ) ){
		        // 		$query = $query->whereIn('breast_examination_patient.exam_id', $request->examinations);
		        // 	}
		        // }

		        if( !empty( $request->examinations ) ){
		        	$input = $request->input('examinations');
		        	$other_method = $request->other_breast_examination;

		        	if( in_array('other', $request->examinations) && count($input) == 1 ){
		        		$query = $query->where('enrollment_page_three.other_examination', $request->other_breast_examination);
		        	}

		        	if( in_array('other', $request->examinations) && count($input) > 1 ) {
		        		$query = $query->where(function($group_query) use ($input, $other_method) {
		        			$group_query->whereIn('breast_examination_patient.exam_id', $input)
		        				->orWhere('enrollment_page_three.other_examination', $other_method);
		        		});
		        	}

		        	if( !in_array('other', $request->examinations) && count($input) > 0 ) {
		        		$query = $query->whereIn('breast_examination_patient.exam_id', $input);
		        	}
		        }

		        if( !empty( $request->perineums ) ){
		        	$input = $request->input('perineums');
		        	$other_method = $request->other_perinuem_examination;

		        	if( in_array('other', $request->perineums) && count($input) == 1 ){
		        		$query = $query->where('enrollment_page_three.other_perineum', $request->other_perinuem_examination);
		        	}

		        	if( in_array('other', $request->perineums) && count($input) > 1 ) {
		        		$query = $query->where(function($group_query) use ($input, $other_method) {
		        			$group_query->whereIn('perinuem_patient.perineum_id', $input)
		        				->orWhere('enrollment_page_three.other_perineum', $other_method);
		        		});
		        	}

		        	if( !in_array('other', $request->perineums) && count($input) > 0 ) {
		        		$query = $query->whereIn('perinuem_patient.perineum_id', $input);
		        	}

		        }

		        if( !empty( $request->vagina_examinations ) ){
		        	$input = $request->input('vagina_examinations');
		        	$other_method = $request->other_vagina_examination;

		        	if( in_array('other', $request->vagina_examinations) && count($input) == 1 ){
		        		$query = $query->where('enrollment_page_three.other_vag_examination', $request->other_vagina_examination);
		        	}

		        	if( in_array('other', $request->vagina_examinations) && count($input) > 1 ) {
		        		$query = $query->where(function($group_query) use ($input, $other_method) {
		        			$group_query->whereIn('vagina_examination_patient.exam_id', $input)
		        				->orWhere('enrollment_page_three.other_vag_examination', $other_method);
		        		});
		        	}

		        	if( !in_array('other', $request->vagina_examinations) && count($input) > 0 ) {
		        		$query = $query->whereIn('vagina_examination_patient.exam_id', $input);
		        	}

		        	// if( in_array('other', $request->vagina_examinations) ){
		        	// 	$query = $query->where('enrollment_page_three.other_vag_examination', $request->other_vagina_examination);
		        	// 	unset( $request->vagina_examinations['other'] );
		        	// }
		        	// if( in_array('not_done', $request->vagina_examinations) ){
		        	// 	$query = $query->where('enrollment_page_three.vagina_exam_not_done', $request->vag_not_done_data);
		        	// 	unset( $request->vagina_examinations['not_done'] );
		        	// }
		        	// if( count( $request->vagina_examinations > 0 ) ){
		        	// 	$query = $query->whereIn('vagina_examination_patient.exam_id', $request->vagina_examinations);
		        	// }
		        }

		        if( !empty( $request->cervix_examinations ) ){
		        	$input = $request->input('cervix_examinations');
		        	$other_method = $request->other_cervix_examination;

		        	if( in_array('other', $request->cervix_examinations) && count($input) == 1 ){
		        		$query = $query->where('enrollment_page_three.other_cerv_examination', $request->other_cervix_examination);
		        	}

		        	if( in_array('other', $request->cervix_examinations) && count($input) > 1 ) {
		        		$query = $query->where(function($group_query) use ($input, $other_method) {
		        			$group_query->whereIn('cervix_examination_patient.exam_id', $input)
		        				->orWhere('enrollment_page_three.other_cerv_examination', $other_method);
		        		});
		        	}

		        	if( !in_array('other', $request->cervix_examinations) && count($input) > 0 ) {
		        		$query = $query->whereIn('cervix_examination_patient.exam_id', $input);
		        	}
		        }

		        if( !empty( $request->bimanual_examinations ) ){
		        	$input = $request->input('bimanual_examinations');
		        	$other_method = $request->other_bimanual_examination;

		        	if( in_array('other', $request->bimanual_examinations) && count($input) == 1 ){
		        		$query = $query->where('enrollment_page_four.other_biman_examination', $request->other_bimanual_examination);
		        	}

		        	if( in_array('other', $request->bimanual_examinations) && count($input) > 1 ) {
		        		$query = $query->where(function($group_query) use ($input, $other_method) {
		        			$group_query->whereIn('bimanual_examination_patient.exam_id', $input)
		        				->orWhere('enrollment_page_four.other_biman_examination', $other_method);
		        		});
		        	}

		        	if( !in_array('other', $request->bimanual_examinations) && count($input) > 0 ) {
		        		$query = $query->whereIn('bimanual_examination_patient.exam_id', $input);
		        	}
		        }

		        if( !empty( $request->via ) ){
		        	if( $request->via == 'other' ){
		        		$query = $query->where('enrollment_page_four.via', $request->via_not_done);
		        	} else {
		        		$query = $query->where('enrollment_page_four.via', $request->via);
		        	}
		        }

		        if( !empty( $request->vili ) ){
		        	if( $request->vili == 'other' ){
		        		$query = $query->where('enrollment_page_four.vili', $request->vili_not_done);
		        	} else {
		        		$query = $query->where('enrollment_page_four.vili', $request->vili);
		        	}
		        }

		        if( !empty( $request->plan ) ){
		        	if( $request->plan == 'other' ){
		        		$query = $query->where('enrollment_page_four.plan', $request->follow_up);
		        	} else {
		        		$query = $query->where('enrollment_page_four.plan', $request->plan);
		        	}
		        }

		        $clients = $query->get();
		        $count = $query->count();
		        $total_clients = DB::table('enrollment_page_one')->count();
		        $percentage = ( $count/$total_clients ) * 100;
		        // $clients = $query->toSql();
		        // print_r( $clients );
		        return view('analysis.results', compact('clients', 'percentage', 'count', 'total_clients'));
	    	} else {
	    		return redirect('analysis/form');
	    	}
	    }

	    public function view($id)
	    {
	    	session(['patient_id' => $id]);
	    	return redirect('enrollment/page-one');
	    }
}
