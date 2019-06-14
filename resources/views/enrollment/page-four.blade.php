@extends('layouts.main')

@section('title', $title)

@section('content')
		  <section class="content-header">
            
           <!--  <ol class="user-admin-steps breadcrumb">
              <li><a class="active"> Page 1 of 4</a></li>
              <li><a> Assets & Liabilites </a></li>
              <li><a> Other Questions </a></li>
              <li><a> Business Information </a></li>
              <li><a >BEE Information</a></li>
              <li><a> Additional Business Information </a></li>
              <li><a> Conclusion </a></li>
            </ol> -->
          </section>

          <div class="box box-warning application-form">
          	@if( $errors->any() )
			   <div class="alert alert-warning">
			    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			    <strong>Warning! </strong>Some errors were encountered, please check the details you entered.
			   </div>
			@endif

			@if( session('success') )
			   <div class="alert alert-success">
			    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			    <strong> {{ session('success') }} </strong>
			   </div>
			@endif

            <!-- /.box-header -->
            <div class="box-body">
            	<h2 class="text-center" style="margin-bottom: 40px; margin-top: 20px;">Enrollment Form: Page 4 of 4</h2>

              <form method="post" action="{{ url('enrollment/page-four') }}">
              	{{ csrf_field() }}

				    <div class="row close-form-groups" style="margin: 15px;">
				        <div class="form-column column col-lg-6 col-md-6 col-sm-12 col-xs-12">
			                <div class="section-title">
			                    <!-- <h3>PERSONAL DETAILS</h3> -->
			                    <div class="decor"></div>
			                </div>

			                <div class="styled-form login-form">
			                	<div class="section-title">
					                <h3><u>BIMANUAL EXAM</u></h3>
					                <div class="decor"></div>
					            </div>

			                	<div class="form-group">
							        <label>
							        	Bimanual Exam Findings :<strong>( circle all that apply)</strong>:
							        </label>
							        @php 
					                    		$condition = ( !empty( $application ) && !empty($patient_bimanual_examinations) ? 
					                    			$patient_bimanual_examinations : array() );

					                    		$other_value_1 = ( !empty( $application ) ? $application->other_biman_examination : 
					                    			'' );
					                    		$other_value_2 = ( !empty( $application ) ? $application->bimanual_exam_not_done :
					                    			'' );

				                    			$other_select_1 = ( isset( $application->other_biman_examination ) ? 
				                    				'checked=checked' : '' );
				                    			$other_select_2 = ( isset( $application->bimanual_exam_not_done ) ? 
				                    				'checked=checked' : '' );
					                    	@endphp

					                    	<div class="row check-options">
					                    		<div class="col-md-6">
						                    		@foreach( $bimanual_examinations[0] as $option )
									                    <div class="checkbox radio">
															<label class="{{ ( $loop->first ? 'yes' : 'no' ) }}">
																<input type="checkbox" value="{{ $option['id'] }}" 
																	name="bimanual_examinations[]" 
																	<?php if( in_array($option['name'], $condition) ): ?> 
																		checked="checked"
										                        	<?php endif; ?> >
																	{{ $option['name'] }}
															</label>
														</div>
													@endforeach
												</div>

												<div class="col-md-6">
						                    		@foreach( $bimanual_examinations[1] as $option )
									                    <div class="checkbox radio">
															<label class="no">
																<input type="checkbox" value="{{ $option['id'] }}" 
																	name="bimanual_examinations[]" 
																	<?php if( in_array($option['name'], $condition) ): ?> 
																		checked="checked"
										                        	<?php endif; ?> >
																	{{ $option['name'] }}
															</label>
														</div>
													@endforeach
													<div class="checkbox radio">
														<label class="other">
															<input type="checkbox" value="not_done" name="bimanual_examinations[]" {{ $other_select_2 }} >Not Done, due to:
														</label>
														<input class="form-control specific-other" name="biman_not_done_data" 
															value="{{ $other_value_2 }}">
													</div>

													<div class="checkbox radio">
														<label class="other">
															<input type="checkbox" value="other" name="bimanual_examinations[]" {{ $other_select_1 }} >Other Findings
														</label>
														<input class="form-control specific-other" name="other_bimanual_examination" 
															value="{{ $other_value_1 }}">
													</div>
												</div>
					                    	</div>
							    </div>

							    <div class="form-group if-yes-no">
				                    <label>Was client treated for a Reproductive Tract Infection today? <b>(choose one)</b>:</label>

				                    <div class="row radio-options">
				                    	<div class="col-md-3">
				                    		@php 
				                    			$condition = ( !empty( $application ) ? $application->treated : old('treated') );

				                    			$other_value = ( !empty( $application ) && !in_array( $application->treated, 
				                    				$yes_no_already) ? $application->treated : '' );

				                    			$other_select = ( !empty( $application ) && !in_array( $application->treated, 
				                    				$yes_no_already) ? 'checked=checked' : '' );
				                    		@endphp

				                    		@foreach( $yes_no_already_chunk[0] as $option )
						                      <div class="radio">
												<label class="{{ ( $loop->first ? 'yes' : 'no' ) }}">
													<input type="radio" value="{{ $option }}" name="treated" 
													<?php if( $option == $condition ): ?> 
														checked="checked"
						                        	<?php endif; ?> >
													{{ $option }}
												</label>
											  </div>
						                    @endforeach
									    </div>

									    <div class="col-md-4">
				                    		@foreach( $yes_no_already_chunk[1] as $option )
						                      <div class="radio">
												<label class="no">
													<input type="radio" value="{{ $option }}" name="treated" 
													<?php if( $option == $condition ): ?> 
														checked="checked"
						                        	<?php endif; ?> >
													{{ $option }}
												</label>
											  </div>
						                    @endforeach

											<div class="radio">
												<label class="other">
													<input type="radio" value="other" name="treated" {{ $other_select }} >Other
												</label>
												<input class="form-control specific-other" name="specific_treated" 
													value="{{ $other_value }}">
											</div>
									    </div>
				                    </div>
				                    <label class="text-warning">{{ $errors->first('treated') }}</label>
			                	</div>
			                	<div class="questions-group">
					                	<div class="form-group if-yes-no">
						                    <label>If Yes, What type of reproductive tract infection was client treated for?:</label>
						                    <input class="form-control" name="infection" value="{{ ( !empty( $application ) ? 
						                    	$application->infection : old('infection') ) }}">

						                    <label class="text-warning">{{ $errors->first('infection') }}</label>
						                </div>

						                <div class="form-group if-yes-no">
						                    <label>Write medication(s) and dosage(s) you prescribed	to client?:</label>
						                    <textarea class="form-control tinymce" name="prescription">{{ ( !empty( 
						                    	$application ) ? $application->prescription : old('prescription') ) }}</textarea>

						                    <label class="text-warning">{{ $errors->first('prescription') }}</label>
						                </div>
					            </div>

					            <div class="form-group">
				                    <label><h3><u><b>VIA RESULT (Choose one):</b></u></h3></label>

				                    <div class="row radio-options">
				                    	<div class="col-md-4">
				                    		@php 
				                    			$condition = ( !empty( $application ) ? $application->via : old('via') );

				                    			$other_value_3 = ( !empty( $application ) && !in_array( $application->via, 
				                    				$via_results) ? $application->via : '' );

				                    			$other_select_3 = ( !empty( $application ) && !in_array( $application->via, 
				                    				$via_results) ? 'checked=checked' : '' );
				                    		@endphp

				                    		@foreach( $via_results_chunk[0] as $option )
						                      <div class="radio">
												<label>
													<input type="radio" value="{{ $option }}" name="via" 
													<?php if( $option == $condition ): ?> 
														checked="checked"
						                        	<?php endif; ?> >
													{{ $option }}
												</label>
											  </div>
						                    @endforeach
									    </div>

									    <div class="col-md-6">
				                    		@foreach( $via_results_chunk[1] as $option )
						                      <div class="radio">
												<label>
													<input type="radio" value="{{ $option }}" name="via" 
													<?php if( $option == $condition ): ?> 
														checked="checked"
						                        	<?php endif; ?> >
													{{ $option }}
												</label>
											  </div>
						                    @endforeach

											<div class="radio">
												<label class="other">
													<input type="radio" value="other" name="via" {{ $other_select_3 }} >Not Done, due to:
												</label>
												<input class="form-control specific-other" name="via_not_done" 
													value="{{ $other_value_3 }}">
											</div>
									    </div>
				                    </div>
				                    <label class="text-warning">{{ $errors->first('via') }}</label>
				                </div>  

				                <div class="form-group">
				                    <label><h3><u><b>VILI RESULTS (Choose one):</b></u></h3></label>

				                    <div class="row radio-options">
				                    	<div class="col-md-4">
				                    		@php 
				                    			$condition = ( !empty( $application ) ? $application->vili : old('vili') );

				                    			$other_value_4 = ( !empty( $application ) && !in_array( $application->vili, 
				                    				$vili_results) ? $application->vili : '' );

				                    			$other_select_4 = ( !empty( $application ) && !in_array( $application->vili, 
				                    				$vili_results) ? 'checked=checked' : '' );
				                    		@endphp

				                    		@foreach( $vili_results_chunk[0] as $option )
						                      <div class="radio">
												<label>
													<input type="radio" value="{{ $option }}" name="vili" 
													<?php if( $option == $condition ): ?> 
														checked="checked"
						                        	<?php endif; ?> >
													{{ $option }}
												</label>
											  </div>
						                    @endforeach
									    </div>

									    <div class="col-md-6">
				                    		@foreach( $vili_results_chunk[1] as $option )
						                      <div class="radio">
												<label>
													<input type="radio" value="{{ $option }}" name="vili" 
													<?php if( $option == $condition ): ?> 
														checked="checked"
						                        	<?php endif; ?> >
													{{ $option }}
												</label>
											  </div>
						                    @endforeach

											<div class="radio">
												<label class="other">
													<input type="radio" value="other" name="vili" {{ $other_select_4 }} >Not Done, due to:
												</label>
												<input class="form-control specific-other" name="vili_not_done" 
													value="{{ $other_value_4 }}">
											</div>
									    </div>
				                    </div>
				                    <label class="text-warning">{{ $errors->first('vili') }}</label>
				                </div> 
			                </div>
			            </div>

				     	<div class="form-column column col-lg-6 col-md-6 col-sm-12 col-xs-12">
			                <div class="styled-form login-form">
			                	<div class="section-title">
					                <h3 style="margin-bottom: 0; visibility: hidden;"><u>PLACEHOLDER</u></h3>
					                <div class="decor"></div>
					            </div>

				                <div class="form-group">
						            <label>
						            	<h4><b>DIAGNOSIS:</b></h4>
						            </label>
						            <textarea class="form-control tinymce" name="diagnosis">{{ ( !empty( 
						                $application ) ? $application->diagnosis : old('diagnosis') ) }}</textarea>
						            

						            <label class="text-warning">{{ $errors->first('diagnosis') }}</label>
						        </div>

						        <div class="form-group">
				                    <label><h3><u><b>PLAN:</b></u></h3></label>

				                    <div class="row radio-options">
				                    	<div class="col-md-6">
				                    		@php 
				                    			$condition = ( !empty( $application ) ? $application->plan : old('plan') );

				                    			$other_select_5 = ( !empty( $application ) && !in_array( $application->plan, 
				                    				$plans) ? 'checked=checked' : '' );
				                    		@endphp

				                    		@foreach( $plans_chunk[0] as $option )
						                      <div class="radio">
												<label>
													<input type="radio" value="{{ $option }}" name="plan" 
													<?php if( $option == $condition ): ?> 
														checked="checked"
						                        	<?php endif; ?> >
													{{ $option }}
												</label>
											  </div>
						                    @endforeach
									    </div>

									    <div class="col-md-6">
				                    		@foreach( $plans_chunk[1] as $option )
						                      <div class="radio">
												<label>
													<input type="radio" value="{{ $option }}" name="plan" 
													<?php if( $option == $condition ): ?> 
														checked="checked"
						                        	<?php endif; ?> >
													{{ $option }}
												</label>
											  </div>
						                    @endforeach

											<div class="radio">
												<label class="other">
													<input type="radio" value="other" name="plan" {{ $other_select_5 }} >
													OVERALL FOLLOW UP in:
												</label>
												<div class="other-radio specific-other"> 
													@foreach( $follow_ups as $ops )
														<div class="radio">
															<label class="other">
																<input type="radio" value="{{ $ops }}" name="follow_up" 
																<?php if( $ops == $condition ): ?> 
																	checked="checked"
									                        	<?php endif; ?> >
																{{ $ops }}
															</label>
														</div>
													@endforeach
												</div>
											</div>
									    </div>
				                    </div>
				                    <label class="text-warning">{{ $errors->first('plan') }}</label>
				                </div>

						        <div class="form-group">
						            <label>
						            	<h4><b>REMARK:</b></h4>
						            </label>
						            <textarea class="form-control tinymce" name="remark">{{ ( !empty( 
						                $application ) ? $application->remark : old('remark') ) }}</textarea>
						            

						            <label class="text-warning">{{ $errors->first('remark') }}</label>
						        </div>  

						        <div class="form-group">
							            <label>
							            	Provider’s name:
							            </label>
							            <input class="form-control" name="provider_name" 
							            	value="{{ ( !empty( $application ) ? $application->provider_name : 
							            		old('provider_name') ) }}">
							            <label class="text-warning">{{ $errors->first('provider_name') }}</label>
							    </div>
			                </div>
			            </div>
				    </div>

		            <div class="row next-page" style="margin: 30px;">
				        <div class="form-column column col-lg-6 col-md-6 col-sm-12 col-xs-12">
				         	<div class="form-group pull-left" style="">
					            <a href="{{ url('enrollment/page-three') }}" 
					            	class="btn btn-primary btn-lg form-button"> 
					                Back 
					            </a>
					        </div>
				        </div>

				     	<div class="form-column column col-lg-6 col-md-6 col-sm-12 col-xs-12">
				      		<div class="form-group pull-left" style="">
					            <button type="submit" class="btn btn-primary btn-lg form-button">Finish</button>
					                    <!-- <a href="{{ url('admin/application/step-four') }}" class="btn btn-primary 
					                    	btn-lg form-button">Next</a> -->
					        </div>
				     	</div>
				    </div>
	            </form>
			 </div>
			 </div>
@endsection