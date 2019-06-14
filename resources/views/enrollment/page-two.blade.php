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
            	<h2 class="text-center" style="margin-bottom: 40px; margin-top: 20px;">Enrollment Form: Page 2 of 4</h2>

              <form method="post" action="{{ url('enrollment/page-two') }}">
              	{{ csrf_field() }}
	            	<!--Form Column-->
	            	<div class="row">
	            		<div class="form-column column col-lg-6 col-md-6 col-sm-12 col-xs-12">
		            
			                <div class="section-title">
			                    <!-- <h3>PERSONAL DETAILS</h3> -->
			                    <div class="decor"></div>
			                </div>
			                
			                	<div class="styled-form login-form">
			                        <div class="form-group if-yes-no">
					                    <label>What is your marital status:</label>

					                    <div class="row radio-options">
					                    	@php 
					                    		$condition = ( !empty( $application ) ? $application->marital_status : 
					                    			old('marital_status') );
					                    	@endphp

					                    	<div class="col-md-4">
					                    		@foreach( $marital_status[0] as $option )
							                      <div class="radio">
													<label class="{{ ( $loop->first ? 'yes' : 'no' ) }}" >
														<input type="radio" value="{{ $option }}" name="marital_status" 
														<?php if( $option == $condition ): ?> 
															checked="checked"
							                        	<?php endif; ?> >
														{{ $option }}
													</label>
												  </div>
							                    @endforeach
										    </div>

										    <div class="col-md-4">
					                    		@foreach( $marital_status[1] as $option )
							                      <div class="radio">
													<label class="no">
														<input type="radio" value="{{ $option }}" name="marital_status" 
														<?php if( $option == $condition ): ?> 
															checked="checked"
							                        	<?php endif; ?> >
														{{ $option }}
													</label>
												  </div>
							                    @endforeach
										    </div>
					                    </div>
					                    <label class="text-warning">{{ $errors->first('marital_status') }}</label>
					                </div>
					                <div class="questions-group">
					                	<div class="form-group if-yes-no">
						                    <label>IF MARRIED, does your husband currently have any other wives?:</label>
						                    <div class="row radio-options">
						                    	@php 
						                    		$condition = ( !empty( $application ) ? $application->more_than_one : old('more_than_one') );
						                    	@endphp

						                    	@foreach( $yes_no as $option )
						                    		<div class="col-md-3">
								                      <div class="radio">
														<label class="{{ ( $loop->first ? 'yes' : 'no' ) }}">
															<input type="radio" value="{{ $option }}" name="more_than_one" 
															<?php if( $option == $condition ): ?> 
																checked="checked"
								                        	<?php endif; ?> >
															{{ $option }}
														</label>
													  </div>
											    	</div>
											    @endforeach
						                    </div>
						                    <label class="text-warning">{{ $errors->first('more_than_one') }}</label>
						                </div>
						                <div class="questions-group">
						                	<div class="form-group">
					                        	<label>How many additional wives does your husband have?:</label>
					                        	<input class="form-control" name="additional_wives" 
							                        value="{{ ( !empty( $application ) ? $application->additional_wives : old('additional_wives') ) }}">

					                            <label class="text-warning">{{ $errors->first('additional_wives') }}</label>
					                        </div>
						                </div>
					                </div>

					                <div class="form-group if-yes-no">
					                    <label>Do you have regular menstrual periods?:</label>

					                    <div class="row radio-options">
					                    	@php 
					                    		$condition = ( !empty( $application ) ? $application->regular_menst : old('regular_menst') );
					                    	@endphp

					                    	<div class="col-md-3">
					                    		@foreach( $if_no[0] as $option )
							                      <div class="radio">
													<label class="if-yes">
														<input type="radio" value="{{ $option }}" name="regular_menst" 
														<?php if( $option == $condition ): ?> 
															checked="checked"
							                        	<?php endif; ?> >
														{{ $option }}
													</label>
												  </div>
							                    @endforeach
										    </div>

										    <div class="col-md-3">
					                    		@foreach( $if_no[1] as $option )
							                      <div class="radio">
													<label class="if-no">
														<input type="radio" value="{{ $option }}" name="regular_menst" 
														<?php if( $option == $condition ): ?> 
															checked="checked"
							                        	<?php endif; ?> >
														{{ $option }}
													</label>
												  </div>
							                    @endforeach
										    </div>
					                    </div>
					                    <label class="text-warning">{{ $errors->first('regular_menst') }}</label>
					                </div>
					                <div class="questions-group">
					                	<label>IF yes:</label>

					                	<div class="row">
			                        		<div class="col-md-4">
			                        			<div class="form-group">
						                        	<label >LMP:</label>
						                        	<input class="form-control" name="lmp" 
							                        	value="{{ ( !empty( $application ) ? $application->lmp : old('lmp') ) }}">
						                            <label class="text-warning">{{ $errors->first('lmp') }}</label>
						                        </div>
			                        		</div>

			                        		<div class="col-md-4">
			                        			<div class="form-group">
						                        	<label >Period:</label>
						                            <input class="form-control" type="text" name="period" 
						                            	value="{{ ( !empty( $application ) ? $application->period : 
						                            	old('period') ) }}">
						                            <label class="text-warning">{{ $errors->first('period') }}</label>
						                        </div>
			                        		</div>

			                        		<div class="col-md-4">
			                        			<div class="form-group">
						                        	<label >Cycle:</label>
						                        	<input class="form-control" name="cycle" 
							                        	value="{{ ( !empty( $application ) ? $application->cycle : old('cycle') ) }}">
						                            <label class="text-warning">{{ $errors->first('cycle') }}</label>
						                        </div>
			                        		</div>
			                        	</div>
					                </div>
					                <div class="if-no-group">
					                	<div class="form-group">
						                    <label>IF NO, why did your periods stop? (Choose one - the most likely reason):</label>

						                    <div class="row radio-options">
						                    	<div class="col-md-6">
						                    		@php 
						                    			$condition = ( !empty( $application ) ? $application->period_stop : 
						                    				old('period_stop') );

						                    			$other_value = ( !empty( $application ) && !in_array( $application->period_stop, $period_stop_reasons_not_chunk) ? $application->period_stop : '' );

						                    			$other_select = ( !empty( $application ) && !in_array( $application->
						                    				period_stop, $period_stop_reasons_not_chunk) ? 'checked=checked' : '' );
						                    		@endphp

						                    		@foreach( $period_stop_reasons[0] as $option )
								                      <div class="radio">
														<label>
															<input type="radio" value="{{ $option }}" name="period_stop_reason" 
															<?php if( $option == $condition ): ?> 
																checked="checked"
								                        	<?php endif; ?> >
															{{ $option }}
														</label>
													  </div>
								                    @endforeach
											    </div>

											    <div class="col-md-6">
						                    		@foreach( $period_stop_reasons[1] as $option )
								                      <div class="radio">
														<label>
															<input type="radio" value="{{ $option }}" name="period_stop_reason" 
															<?php if( $option == $condition ): ?> 
																checked="checked"
								                        	<?php endif; ?> >
															{{ $option }}
														</label>
													  </div>
								                    @endforeach

													<div class="radio">
														<label class="other">
															<input type="radio" value="other" name="period_stop_reason" 
																{{ $other_select }} >Other
														</label>
														<input class="form-control specific-other" name="specific_stop_reason" 
															value="{{ $other_value }}">
													</div>
											    </div>
						                    </div>
						                    <label class="text-warning">{{ $errors->first('period_stop_reason') }}</label>
						                </div>
					                </div>

					                <div class="form-group">
							            <label>
							            	How many times have you been pregnant?:
							            </label>
							            <input class="form-control" name="times_pregnant" 
							            	value="{{ ( !empty( $application ) ? $application->times_pregnant : 
							            		old('times_pregnant') ) }}">
							            <label class="text-warning">{{ $errors->first('times_pregnant') }}</label>
							        </div>

							        <div class="form-group">
							            <label>
							            	How many babies have you given birth to?:
							            </label>
							            <input class="form-control" name="babies" 
							            	value="{{ ( !empty( $application ) ? $application->babies : 
							            		old('babies') ) }}">
							            <label class="text-warning">{{ $errors->first('babies') }}</label>
							        </div>

							        <div class="form-group">
							            <label>
							            	How many abortions (or miscarriages) have you had?:
							            </label>
							            <input class="form-control" name="abortion" 
							            	value="{{ ( !empty( $application ) ? $application->abortion : 
							            		old('abortion') ) }}">
							            <label class="text-warning">{{ $errors->first('abortion') }}</label>
							        </div>
			                        
			                        <div class="form-group">
							            <label>
							            	How many living children do you currently have?:
							            </label>
							            <input class="form-control" name="living_children" 
							            	value="{{ ( !empty( $application ) ? $application->living_children : 
							            		old('living_children') ) }}">
							            <label class="text-warning">{{ $errors->first('living_children') }}</label>
							        </div>

							        <div class="form-group">
							            <label>
							            	Age of first sexual intercourse:
							            </label>
							            <div class="input-group">
						                    <input class="form-control" type="text" name="first_intercourse" 
						                        value="{{ ( !empty( $application ) ? $application->first_intercourse : old('first_intercourse') ) }}">
						                    <span class="input-group-addon">years</span>
										</div>
							            <label class="text-warning">{{ $errors->first('first_intercourse') }}</label>
							        </div>

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
							        <div class="form-group">
							            <label>
							            	How many different sexual partners have you had in your lifetime?:
							            </label>
							            <input class="form-control" name="sexual_partners" 
							            	value="{{ ( !empty( $application ) ? $application->sexual_partners : 
							            		old('sexual_partners') ) }}">
							            <label class="text-warning">{{ $errors->first('sexual_partners') }}</label>
							        </div>

			                	<div class="form-group if-yes-no">
						            <label>Has anyone ever forced sex on you?:</label>
						                <div class="row radio-options">
							                @php 
							                	$condition = ( !empty( $application ) ? $application->forced_sex : old('forced_sex') );
							                @endphp

							                @foreach( $yes_no as $option )
							                    <div class="col-md-3">
									                <div class="radio">
														<label class="{{ ( $loop->first ? 'yes' : 'no' ) }}">
															<input type="radio" value="{{ $option }}" name="forced_sex" 
																<?php if( $option == $condition ): ?> 
																	checked="checked"
									                        	<?php endif; ?> >
																{{ $option }}
														</label>
													</div>
												</div>
											@endforeach
							            </div>
						            <label class="text-warning">{{ $errors->first('forced_sex') }}</label>
						        </div>

						        <div class="form-group if-yes-no">
						            <label>Have you ever had sex in exchange for money or favors?:</label>
						                <div class="row radio-options">
						                @php 
						                	$condition = ( !empty( $application ) ? $application->sex_exchange : 
						                		old('sex_exchange') );
						                @endphp

						                @foreach( $yes_no as $option )
						                    <div class="col-md-3">
								                <div class="radio">
													<label class="{{ ( $loop->first ? 'yes' : 'no' ) }}">
														<input type="radio" value="{{ $option }}" name="sex_exchange" 
															<?php if( $option == $condition ): ?> 
																checked="checked"
								                        	<?php endif; ?> >
															{{ $option }}
													</label>
												</div>
											</div>
										@endforeach
						            </div>
						            <label class="text-warning">{{ $errors->first('sex_exchange') }}</label>
						        </div>

						        <div class="form-group if-yes-no">
						            <label>
						            	Does your husband or partner currently have other sexual partner(s) to whom he is not 
						            	married (NB.not including other wives in a polygamous marriage)?:
						            </label>
						                <div class="row radio-options">
						                @php 
						                	$condition = ( !empty( $application ) ? $application->unmarried_sex_partner : 
						                		old('unmarried_sex_partner') );
						                @endphp

						                @foreach( $yes_no_unknown as $option )
						                    <div class="col-md-3">
								                <div class="radio">
													<label class="{{ ( $loop->first ? 'yes' : 'no' ) }}">
														<input type="radio" value="{{ $option }}" name="unmarried_sex_partner" 
															<?php if( $option == $condition ): ?> 
																checked="checked"
								                        	<?php endif; ?> >
															{{ $option }}
													</label>
												</div>
											</div>
										@endforeach
						            </div>
						            <label class="text-warning">{{ $errors->first('unmarried_sex_partner') }}</label>
						        </div>

						        	<div class="form-group if-yes-no">
					                    <label>Are you currently using any method of family planning or child spacing?:</label>

					                    <div class="row radio-options">
												@php 
						                    		$condition = ( !empty( $application ) ? $application->family_planning : old('family_planning') );
						                    	@endphp

						                    	@foreach( $yes_no as $option )
						                    		<div class="col-md-3">
								                      <div class="radio">
														<label class="{{ ( $loop->first ? 'yes' : 'no' ) }}">
															<input type="radio" value="{{ $option }}" name="family_planning" 
															<?php if( $option == $condition ): ?> 
																checked="checked"
								                        	<?php endif; ?> >
															{{ $option }}
														</label>
													  </div>
											    	</div>
											    @endforeach
					                    </div>
					                    <label class="text-warning">{{ $errors->first('family_planning') }}</label>
					                </div>
					                <div class="questions-group">
					                	<div class="form-group">
					                	
						                	<label>
						                		If YES (using a child spacing method), which method is it? (select all that apply):
						                	</label>

					                		@php 
					                    		$condition = ( !empty( $application ) && !empty($patient_planning_methods) ? 
					                    			$patient_planning_methods : array() );

					                    		$other_value_2 = ( !empty( $application ) ? $application->other_method : '' );

				                    			$other_select_2 = ( isset( $application->other_method ) ? 'checked=checked' : '' );
					                    	@endphp

					                    	<div class="row check-options">
					                    		<div class="col-md-6">
						                    		@foreach( $planning_methods[0] as $option )
									                    <div class="checkbox radio">
															<label class="{{ ( $loop->first ? 'yes' : 'no' ) }}">
																<input type="checkbox" value="{{ $option['id'] }}" 
																	name="planning_methods[]" 
																	<?php if( in_array($option['name'], $condition) ): ?> 
																		checked="checked"
										                        	<?php endif; ?> >
																	{{ $option['name'] }}
															</label>
														</div>
													@endforeach
												</div>

												<div class="col-md-6">
						                    		@foreach( $planning_methods[1] as $option )
									                    <div class="checkbox radio">
															<label class="no">
																<input type="checkbox" value="{{ $option['id'] }}" 
																	name="planning_methods[]" 
																	<?php if( in_array($option['name'], $condition) ): ?> 
																		checked="checked"
										                        	<?php endif; ?> >
																	{{ $option['name'] }}
															</label>
														</div>
													@endforeach
													<div class="checkbox radio">
														<label class="other">
															<input type="checkbox" value="other" name="planning_methods[]" {{ $other_select_2 }} >Other
														</label>
														<input class="form-control specific-other" name="other_planning_method" 
															value="{{ $other_value_2 }}">
													</div>
												</div>
					                    	</div>
					                    </div>

					                    <div class="form-group if-yes-no">
									            <label>Does your husband/partner know that you are using a method?:</label>
									                <div class="row radio-options">
									                @php 
									                	$condition = ( !empty( $application ) ? $application->husband_aware : 
									                		old('husband_aware') );
									                @endphp

									                @foreach( $yes_no as $option )
									                    <div class="col-md-3">
											                <div class="radio">
																<label class="{{ ( $loop->first ? 'yes' : 'no' ) }}">
																	<input type="radio" value="{{ $option }}" name="husband_aware" 
																		<?php if( $option == $condition ): ?> 
																			checked="checked"
											                        	<?php endif; ?> >
																		{{ $option }}
																</label>
															</div>
														</div>
													@endforeach
									            </div>
									            <label class="text-warning">{{ $errors->first('husband_aware') }}</label>
									       </div>
					                </div>

					                <div class="form-group if-yes-no">
					                    <label>Have you ever been tested for HIV?:</label>

					                    <div class="row radio-options">
					                    	@php 
					                    		$condition = ( !empty( $application ) ? $application->hiv_tested : 
					                    			old('hiv_tested') );
					                    	@endphp

					                    	@foreach( $yes_no as $option )
						                    		<div class="col-md-3">
								                      <div class="radio">
														<label class="{{ ( $loop->first ? 'yes' : 'no' ) }}">
															<input type="radio" value="{{ $option }}" name="hiv_tested" 
															<?php if( $option == $condition ): ?> 
																checked="checked"
								                        	<?php endif; ?> >
															{{ $option }}
														</label>
													  </div>
											    	</div>
											@endforeach
					                    </div>
					                    <label class="text-warning">{{ $errors->first('hiv_tested') }}</label>
					                </div>
					                <div class="questions-group">
					                	<div class="form-group if-yes-no">
						                    <label>If Yes (has been tested), date of HIV Test:</label>
						                    <input class="form-control" name="hiv_test_date" type="date" 
							                        value="{{ ( !empty( $application ) ? $application->hiv_test_date : old('hiv_test_date') ) }}">

						                    <label class="text-warning">{{ $errors->first('hiv_test_date') }}</label>
						                </div>

						                <div class="form-group if-yes-no">
						                    <label>IF YES (has been tested), what was the result?:</label>

						                    <div class="row radio-options">
						                    	@php 
						                    		$condition = ( !empty( $application ) ? $application->hiv_result : 
						                    			old('hiv_result') );
						                    	@endphp

						                    	@foreach( $hiv_results as $option )
							                    		<div class="col-md-3">
									                      <div class="radio">
															<label class="{{ ( $loop->first ? 'yes' : 'no' ) }}">
																<input type="radio" value="{{ $option }}" name="hiv_result" 
																<?php if( $option == $condition ): ?> 
																	checked="checked"
									                        	<?php endif; ?> >
																{{ $option }}
															</label>
														  </div>
												    	</div>
												@endforeach
						                    </div>
						                    <label class="text-warning">{{ $errors->first('hiv_result') }}</label>
						                </div>
						                <div class="questions-group">
						                	<div class="form-group">
					                        	<label>If tested positive, what is your CD4 count?:</label>
					                        	<input class="form-control" name="cd_four_count" 
							                        value="{{ ( !empty( $application ) ? $application->cd_four_count : old('cd_four_count') ) }}">

					                            <label class="text-warning">{{ $errors->first('cd_four_count') }}</label>
					                        </div>

					                        <div class="form-group if-yes-no">
							                    <label>If tested positive, are you currently on medications?:</label>

							                    <div class="row radio-options">
							                    	@php 
							                    		$condition = ( !empty( $application ) ? $application->on_medication : 
							                    			old('on_medication') );
							                    	@endphp

							                    	@foreach( $yes_no as $option )
								                    		<div class="col-md-3">
										                      <div class="radio">
																<label class="{{ ( $loop->first ? 'yes' : 'no' ) }}">
																	<input type="radio" value="{{ $option }}" name="on_medication" 
																	<?php if( $option == $condition ): ?> 
																		checked="checked"
										                        	<?php endif; ?> >
																	{{ $option }}
																</label>
															  </div>
													    	</div>
													@endforeach
							                    </div>
							                    <label class="text-warning">{{ $errors->first('on_medication') }}</label>
							                </div>
							                <div class="questions-group">
							                	<div class="form-group">
						                        	<label>If currently receiving medications, what type of medications?:</label>
						                        	<input class="form-control" name="medication" 
								                        value="{{ ( !empty( $application ) ? $application->medication : old('medication') ) }}">

						                            <label class="text-warning">{{ $errors->first('medication') }}</label>
						                        </div>
							                </div>
						                </div>
					                </div>

			                	<!-- </div> -->
				            </div>
			            </div>
			        </div>

		            <div class="row next-page" style="margin: 30px;">
				        <div class="form-column column col-lg-6 col-md-6 col-sm-12 col-xs-12">
				         	<div class="form-group pull-left" style="">
					            <a href="{{ url('enrollment/page-one') }}" 
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