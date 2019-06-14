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
            	<h2 class="text-center" style="margin-bottom: 40px; margin-top: 20px;">Enrollment Form: Page 3 of 4</h2>

              <form method="post" action="{{ url('enrollment/page-three') }}">
              	{{ csrf_field() }}
	            	<!--Form Column-->
	            	<div class="row">
	            		<div class="form-column column col-lg-6 col-md-6 col-sm-12 col-xs-12">
		            
			                <div class="section-title">
			                    <!-- <h3>PERSONAL DETAILS</h3> -->
			                    <div class="decor"></div>
			                </div>
			                
			                	<div class="styled-form login-form">
			                        <fieldset>
			                        	<legend>Has your birth mother or sister (from same womb) had;</legend>

			                        	<div class="form-group">
						                    <label>Breast cancer?:</label>
						                    <div class="row radio-options">
						                    	@php 
						                    		$condition = ( !empty( $application ) ? $application->breast_cancer : old('breast_cancer') );
						                    	@endphp

						                    	@foreach( $yes_no_unknown as $option )
						                    		<div class="col-md-3">
								                      <div class="radio">
														<label class="{{ ( $loop->first ? 'yes' : 'no' ) }}">
															<input type="radio" value="{{ $option }}" name="breast_cancer" 
															<?php if( $option == $condition ): ?> 
																checked="checked"
								                        	<?php endif; ?> >
															{{ $option }}
														</label>
													  </div>
											    	</div>
											    @endforeach
						                    </div>
						                    <label class="text-warning">{{ $errors->first('breast_cancer') }}</label>
						                </div>

						                <div class="form-group">
						                    <label>Cervical cancer before?:</label>
						                    <div class="row radio-options">
						                    	@php 
						                    		$condition = ( !empty( $application ) ? $application->cervical_cancer : old('cervical_cancer') );
						                    	@endphp

						                    	@foreach( $yes_no_unknown as $option )
						                    		<div class="col-md-3">
								                      <div class="radio">
														<label class="{{ ( $loop->first ? 'yes' : 'no' ) }}">
															<input type="radio" value="{{ $option }}" name="cervical_cancer" 
															<?php if( $option == $condition ): ?> 
																checked="checked"
								                        	<?php endif; ?> >
															{{ $option }}
														</label>
													  </div>
											    	</div>
											    @endforeach
						                    </div>
						                    <label class="text-warning">{{ $errors->first('cervical_cancer') }}</label>
						                </div>
			                        </fieldset>
			                	</div>
			            </div>
	            
		            	<!--Form Column-->
			            <div class="form-column column col-lg-6 col-md-6 col-sm-12 col-xs-12">

			                <div style="" class="section-title">
			                    <h3></h3>
			                    <div class="decor"></div>
			                </div>
			                
			                <!--Login Form-->
			                <div class="styled-form">
			                		<div class="form-group if-yes-no">
					                    <label>Have you been smoking cigarette or any other substance? :</label>

					                    <div class="row radio-options">
					                    	@php 
					                    		$condition = ( !empty( $application ) ? $application->smoking : 
					                    			old('smoking') );
					                    	@endphp

										    @foreach( $yes_no as $option )
						                    		<div class="col-md-3">
								                      <div class="radio">
														<label class="{{ ( $loop->first ? 'yes' : 'no' ) }}">
															<input type="radio" value="{{ $option }}" name="smoking" 
															<?php if( $option == $condition ): ?> 
																checked="checked"
								                        	<?php endif; ?> >
															{{ $option }}
														</label>
													  </div>
											    	</div>
											@endforeach
					                    </div>
					                    <label class="text-warning">{{ $errors->first('smoking') }}</label>
					                </div>
					                <div class="questions-group">
					                	<div class="form-group if-yes-no">
						                    <label>If Yes, what quantity have you been smoking:</label>
						                    <input class="form-control" name="qty_smoking" 
							                        value="{{ ( !empty( $application ) ? $application->qty_smoking : old('qty_smoking') ) }}">

						                    <label class="text-warning">{{ $errors->first('qty_smoking') }}</label>
						                </div>
					                </div>

					                <div class="form-group">
							            <label>
							            	Any past medical or surgical history?:
							            </label>
							            <input class="form-control" name="surgical_history" value="{{ ( !empty( $application ) ? 
							            	$application->surgical_history : old('surgical_history') ) }}">
							            <label class="text-warning">{{ $errors->first('surgical_history') }}</label>
							        </div>
				            </div>
			            </div>
			        </div>

			        <div class="row client-info" style="margin: 10px;">
				        <div class="form-column column col-lg-12 col-md-12 col-sm-12 col-xs-12">
				        	<p>
				        		Dear Client, Thank you for your sincere answers to the above questions. Two major examinations are performed here; breast and cervical cancer examination. For us to carry out this examination on you, you will need to undress while inside the examination room and the clinician will start by examining your breast for any abnormality and there by performing cervical cancer screening test.
				        	</p>
				        	<p>
				        		The Clinician will then inform you about your test results and instruct you of your next appointment, depending on his/her findings. Please print your name and signature below in accordance with this procedure.
				        	</p>
				        </div>
				    </div>

				    <div class="row next-page" style="margin: 15px;">
				        <div class="form-column column col-lg-6 col-md-6 col-sm-12 col-xs-12">
				        	<div class="section-title">
			                    <!-- <h3>PERSONAL DETAILS</h3> -->
			                    <div class="decor"></div>
			                </div>

			                <div class="styled-form login-form">
			                    <div class="form-group">
							            <label>
							            	CLIENT’S name:
							            </label>
							            <input class="form-control" name="client_name" value="{{ ( !empty( $application ) ? 
							            	$application->client_name : old('client_name') ) }}">
							            <label class="text-warning">{{ $errors->first('client_name') }}</label>
							    </div>    
			                </div>
			            </div>

				     	<div class="form-column column col-lg-6 col-md-6 col-sm-12 col-xs-12">
			                <div class="styled-form login-form">
			                    <div class="form-group">
							            <label>
							            	PEER EDUCATOR'S NAME:
							            </label>
							            <input class="form-control" name="peer_educator" value="{{ ( !empty( $application ) ? 
							            	$application->peer_educator : old('peer_educator') ) }}">
							            <label class="text-warning">{{ $errors->first('peer_educator') }}</label>
							    </div>    
			                </div>
			            </div>
				    </div>

				    <div class="row">
				    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				    		<h2 class="text-center"> <u>FOR CLINICIANS ONLY</u> </h2>
				    	</div>
				    </div>

				    <div class="row close-form-groups" style="margin: 15px;">
				        <div class="form-column column col-lg-6 col-md-6 col-sm-12 col-xs-12">
			                <div class="section-title">
			                    <!-- <h3>PERSONAL DETAILS</h3> -->
			                    <div class="decor"></div>
			                </div>

			                <div class="styled-form login-form">
			                    <div class="form-group">
			                    	<div class="section-title">
					                    <h3><u>BREAST EXAM</u></h3>
					                    <div class="decor"></div>
					                </div>
							        <label>
							        	Breasts: (select all that apply):
							        </label>
							        @php 
					                    		$condition = ( !empty( $application ) && !empty($patient_breast_examinations) ? 
					                    			$patient_breast_examinations : array() );

					                    		$other_value_2 = ( !empty( $application ) ? $application->other_examination : '' );

				                    			$other_select_2 = ( isset( $application->other_examination ) ? 'checked=checked' : '' );
					                    	@endphp

					                    	<div class="row check-options">
					                    		<div class="col-md-6">
						                    		@foreach( $examinations[0] as $option )
									                    <div class="checkbox radio">
															<label class="{{ ( $loop->first ? 'yes' : 'no' ) }}">
																<input type="checkbox" value="{{ $option['id'] }}" 
																	name="examinations[]" 
																	<?php if( in_array($option['name'], $condition) ): ?> 
																		checked="checked"
										                        	<?php endif; ?> >
																	{{ $option['name'] }}
															</label>
														</div>
													@endforeach
												</div>

												<div class="col-md-6">
						                    		@foreach( $examinations[1] as $option )
									                    <div class="checkbox radio">
															<label class="no">
																<input type="checkbox" value="{{ $option['id'] }}" 
																	name="examinations[]" 
																	<?php if( in_array($option['name'], $condition) ): ?> 
																		checked="checked"
										                        	<?php endif; ?> >
																	{{ $option['name'] }}
															</label>
														</div>
													@endforeach
													<div class="checkbox radio">
														<label class="other">
															<input type="checkbox" value="other" name="examinations[]" {{ $other_select_2 }} >Other
														</label>
														<input class="form-control specific-other" name="other_breast_examination" 
															value="{{ $other_value_2 }}">
													</div>
												</div>
					                    	</div>
							    </div>

							    <div class="section-title">
					                <h3><u>VULVO-VAGINAL AND CERVICAL EXAMINATION (select all that apply)</u></h3>
					                <div class="decor"></div>
					            </div>
							    <div class="form-group">
							        <label>
							        	Vulva/Perineum:
							        </label>
							        @php 
					                    		$condition = ( !empty( $application ) && !empty($patient_perineums) ? 
					                    			$patient_perineums : array() );

					                    		$other_value_3 = ( !empty( $application ) ? $application->other_perineum : '' );
					                    		$other_value_4 = ( !empty( $application ) ? $application->perineum_not_done : '' );

				                    			$other_select_3 = ( isset( $application->other_perineum ) ? 'checked=checked' : '' );
				                    			$other_select_4 = ( isset( $application->perineum_not_done ) ? 
				                    				'checked=checked' : '' );
					                    	@endphp

					                    	<div class="row check-options">
					                    		<div class="col-md-6">
						                    		@foreach( $perineums[0] as $option )
									                    <div class="checkbox radio">
															<label class="{{ ( $loop->first ? 'yes' : 'no' ) }}">
																<input type="checkbox" value="{{ $option['id'] }}" 
																	name="perineums[]" 
																	<?php if( in_array($option['name'], $condition) ): ?> 
																		checked="checked"
										                        	<?php endif; ?> >
																	{{ $option['name'] }}
															</label>
														</div>
													@endforeach
												</div>

												<div class="col-md-6">
						                    		@foreach( $perineums[1] as $option )
									                    <div class="checkbox radio">
															<label class="no">
																<input type="checkbox" value="{{ $option['id'] }}" 
																	name="perineums[]" 
																	<?php if( in_array($option['name'], $condition) ): ?> 
																		checked="checked"
										                        	<?php endif; ?> >
																	{{ $option['name'] }}
															</label>
														</div>
													@endforeach
													<div class="checkbox radio">
														<label class="other">
															<input type="checkbox" value="other" name="perineums[]" {{ $other_select_3 }} >Other
														</label>
														<input class="form-control specific-other" name="other_perinuem_examination" 
															value="{{ $other_value_3 }}">
													</div>

													<div class="checkbox radio">
														<label class="other">
															<input type="checkbox" value="not_done" name="perineums[]" {{ $other_select_4 }} >Not Done, due to
														</label>
														<input class="form-control specific-other" name="not_done_data" 
															value="{{ $other_value_4 }}">
													</div>
												</div>
					                    	</div>
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
							        	Vagina:
							        </label>
							        @php 
					                    		$condition = ( !empty( $application ) && !empty($patient_vagina_examinations) ? 
					                    			$patient_vagina_examinations : array() );

					                    		$other_value_4 = ( !empty( $application ) ? 
					                    			$application->other_vag_examination : '' );
					                    		$other_value_5 = ( !empty( $application ) ? 
					                    			$application->vagina_exam_not_done : '' );

				                    			$other_select_4 = ( isset( $application->other_vag_examination ) ? 'checked=checked' 
				                    				: '' );
				                    			$other_select_5 = ( isset( $application->vagina_exam_not_done ) ? 'checked=checked' 
				                    				: '' );
					                    	@endphp

					                    	<div class="row check-options">
					                    		<div class="col-md-6">
						                    		@foreach( $vagina_examinations[0] as $option )
									                    <div class="checkbox radio">
															<label class="{{ ( $loop->first ? 'yes' : 'no' ) }}">
																<input type="checkbox" value="{{ $option['id'] }}" 
																	name="vagina_examinations[]" 
																	<?php if( in_array($option['name'], $condition) ): ?> 
																		checked="checked"
										                        	<?php endif; ?> >
																	{{ $option['name'] }}
															</label>
														</div>
													@endforeach
												</div>

												<div class="col-md-6">
						                    		@foreach( $vagina_examinations[1] as $option )
									                    <div class="checkbox radio">
															<label class="no">
																<input type="checkbox" value="{{ $option['id'] }}" 
																	name="vagina_examinations[]" 
																	<?php if( in_array($option['name'], $condition) ): ?> 
																		checked="checked"
										                        	<?php endif; ?> >
																	{{ $option['name'] }}
															</label>
														</div>
													@endforeach
													<div class="checkbox radio">
														<label class="other">
															<input type="checkbox" value="other" name="vagina_examinations[]" {{ $other_select_4 }} >Other
														</label>
														<input class="form-control specific-other" name="other_vagina_examination" 
															value="{{ $other_value_4 }}">
													</div>

													<div class="checkbox radio">
														<label class="other">
															<input type="checkbox" value="not_done" name="vagina_examinations[]" {{ $other_select_5 }} >Not Done, due to
														</label>
														<input class="form-control specific-other" name="vag_not_done_data" 
															value="{{ $other_value_5 }}">
													</div>
												</div>
					                    	</div>
							    </div>

							    <div class="form-group">
							        <label>
							        	Cervix:
							        </label>
							        @php 
					                    		$condition = ( !empty( $application ) && !empty($patient_cervix_examinations) ? 
					                    			$patient_cervix_examinations : array() );

					                    		$other_value_5 = ( !empty( $application ) ? $application->other_cerv_examination : 
					                    			'' );
					                    		$other_value_6 = ( !empty( $application ) ? $application->cervix_exam_not_done : ''
					                    			);

				                    			$other_select_5 = ( isset( $application->other_cerv_examination ) ?
				                    				'checked=checked' : '' );
				                    			$other_select_6 = ( isset( $application->cervix_exam_not_done ) ? 'checked=checked' 
				                    				: '' );
					                    	@endphp

					                    	<div class="row check-options">
					                    		<div class="col-md-6">
						                    		@foreach( $cervix_examinations[0] as $option )
									                    <div class="checkbox radio">
															<label class="{{ ( $loop->first ? 'yes' : 'no' ) }}">
																<input type="checkbox" value="{{ $option['id'] }}" 
																	name="cervix_examinations[]" 
																	<?php if( in_array($option['name'], $condition) ): ?> 
																		checked="checked"
										                        	<?php endif; ?> >
																	{{ $option['name'] }}
															</label>
														</div>
													@endforeach
												</div>

												<div class="col-md-6">
						                    		@foreach( $cervix_examinations[1] as $option )
									                    <div class="checkbox radio">
															<label class="no">
																<input type="checkbox" value="{{ $option['id'] }}" 
																	name="cervix_examinations[]" 
																	<?php if( in_array($option['name'], $condition) ): ?> 
																		checked="checked"
										                        	<?php endif; ?> >
																	{{ $option['name'] }}
															</label>
														</div>
													@endforeach
													<div class="checkbox radio">
														<label class="other">
															<input type="checkbox" value="other" name="cervix_examinations[]" {{ $other_select_5 }} >Other
														</label>
														<input class="form-control specific-other" name="other_cervix_examination" 
															value="{{ $other_value_5 }}">
													</div>

													<div class="checkbox radio">
														<label class="other">
															<input type="checkbox" value="not_done" name="cervix_examinations[]" {{ $other_select_6 }} >Not Done, due to
														</label>
														<input class="form-control specific-other" name="cerv_not_done_data" 
															value="{{ $other_value_6 }}">
													</div>
												</div>
					                    	</div>
							    </div>    
			                </div>
			            </div>
				    </div>

		            <div class="row next-page" style="margin: 30px;">
				        <div class="form-column column col-lg-6 col-md-6 col-sm-12 col-xs-12">
				         	<div class="form-group pull-left" style="">
					            <a href="{{ url('enrollment/page-two') }}" 
					            	class="btn btn-primary btn-lg form-button"> 
					                Back 
					            </a>
					        </div>
				        </div>

				     	<div class="form-column column col-lg-6 col-md-6 col-sm-12 col-xs-12">
				      		<div class="form-group pull-left" style="">
					            <button type="submit" class="btn btn-primary btn-lg form-button">Next</button>
					                    <!-- <a href="{{ url('admin/application/step-four') }}" class="btn btn-primary 
					                    	btn-lg form-button">Next</a> -->
					        </div>
				     	</div>
				    </div>
	            </form>
			 </div>
			 </div>
@endsection