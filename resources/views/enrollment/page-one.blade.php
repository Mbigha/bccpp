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

            <!-- /.box-header -->
            <div class="box-body">
            	<h2 class="text-center" style="margin-bottom: 40px; margin-top: 20px;">Enrollment Form: Page 1 of 4</h2>

              <form method="post" action="{{ url('enrollment/page-one') }}">
              	{{ csrf_field() }}
	            	<!--Form Column-->
		            <div class="form-column column col-lg-6 col-md-6 col-sm-12 col-xs-12">
		            
		                <div class="section-title">
		                    <!-- <h3>PERSONAL DETAILS</h3> -->
		                    <div class="decor"></div>
		                </div>
		                
		                	<div class="styled-form login-form">
		                 
		                        <fieldset>
		                        	<legend>Name:</legend>

		                        	<div class="row">
		                        		<div class="col-md-6">
		                        			<div class="form-group">
					                        	<label >First:</label>
					                            <input class="form-control" type="text" name="firstname" 
					                            	value="{{ ( !empty( $application ) ? $application->firstname : old('firstname') ) }}">
					                            <label class="text-warning">{{ $errors->first('firstname') }}</label>
					                        </div>
		                        		</div>

		                        		<div class="col-md-6">
		                        			<div class="form-group">
					                        	<label >Middle:</label>
					                            <input class="form-control" type="text" name="middlename" 
					                            	value="{{ ( !empty( $application ) ? $application->middlename : old('middlename') ) }}">
					                            <label class="text-warning">{{ $errors->first('middlename') }}</label>
					                        </div>
		                        		</div>

		                        		<div class="col-md-6">
		                        			<div class="form-group">
					                        	<label >Last:</label>
					                            <input class="form-control" type="text" name="lastname" 
					                            	value="{{ ( !empty( $application ) ? $application->lastname : old('lastname') ) }}">
					                            <label class="text-warning">{{ $errors->first('lastname') }}</label>
					                        </div>
		                        		</div>
		                        	</div>
		                        </fieldset>
					
					<div class="form-group">
		                        	<label>BCCPP ID:</label>
		                            <input class="form-control" type="text" name="bccpp_id" value="{{ ( !empty( $application ) ? $application->bccpp_id : old('bccpp_id') ) }}">

		                            <label class="text-warning">{{ $errors->first('bccpp_id') }}</label>
		                        </div>

		                        <fieldset>
		                        	<legend>Vital Signs:</legend>

		                        	<div class="row">
		                        		<div class="col-md-4">
		                        			<div class="form-group">
					                        	<label >Temperature:</label>
					                        	<div class="input-group">
					                            	<input class="form-control" type="text" name="temperature" 
					                            	value="{{ ( !empty( $application ) ? $application->temperature : old('temperature') ) }}">
					                            	<span class="input-group-addon">°C</span>
												 </div>
					                            <label class="text-warning">{{ $errors->first('temperature') }}</label>
					                        </div>
		                        		</div>

		                        		<div class="col-md-4">
		                        			<div class="form-group">
					                        	<label >BP:</label>
					                            <input class="form-control" type="text" name="bp" 
					                            	value="{{ ( !empty( $application ) ? $application->bp : old('bp') ) }}">
					                            <label class="text-warning">{{ $errors->first('bp') }}</label>
					                        </div>
		                        		</div>

		                        		<div class="col-md-4">
		                        			<div class="form-group">
					                        	<label >BW:</label>
					                        	<div class="input-group">
					                            	<input class="form-control" type="text" name="bw" 
					                            		value="{{ ( !empty( $application ) ? $application->bw : old('bw') ) }}">
					                            	<span class="input-group-addon">Kg</span>
												</div>

					                            <label class="text-warning">{{ $errors->first('bw') }}</label>
					                        </div>
		                        		</div>
		                        	</div>
		                        </fieldset>
		                        
		                        <div class="form-group">
		                        	<label>Phone Number:</label>
		                        	<div class="input-group">
									    <span class="input-group-addon">+237</span>
		                            	<input class="form-control" type="text" name="phone" value="{{ ( !empty( $application ) ? $application->phone : old('phone') ) }}">
									 </div>

		                            <label class="text-warning">{{ $errors->first('phone') }}</label>
		                        </div>

		                        <div class="row">
		                        	<div class="col-md-6">
		                        		<div class="form-group">
					                        <label >Address/ Community of Residence:</label>
					                           <input class="form-control" name="address" 
					                            	value="{{ ( !empty( $application ) ? $application->address : old('address') ) }}">
					                           <label class="text-warning">{{ $errors->first('address') }}</label>
					                       </div>
		                        	</div>

		                        	<div class="col-md-6">
		                        		<div class="form-group">
					                        <label>Tribe:</label>
					                           <input class="form-control" type="text" name="tribe" 
					                            	value="{{ ( !empty( $application ) ? $application->tribe : old('tribe') ) }}">
					                           <label class="text-warning">{{ $errors->first('tribe') }}</label>
					                       </div>
		                        	</div>
		                        </div>	                    
		                	<!-- </div> -->

		                        <div class="row">
		                        	<div class="col-md-6">
		                        		<div class="form-group">
					                        <label >Date of Screening:</label>
					                           <input class="form-control" type="date" name="screening_date" 
					                            	value="{{ ( !empty( $application ) ? $application->screening_date : 
					                            	old('screening_date') ) }}">
					                           <label class="text-warning">{{ $errors->first('screening_date') }}</label>
					                       </div>
		                        	</div>

		                        	<div class="col-md-6">
		                        		<div class="form-group">
					                        <label>Site of screening:</label>
					                           <input class="form-control" type="text" name="screening_site" 
					                            	value="{{ ( !empty( $application ) ? $application->screening_site : old('screening_site') ) }}">
					                           <label class="text-warning">{{ $errors->first('screening_site') }}</label>
					                       </div>
		                        	</div>
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
		                    <div class="row">
		                        <div class="col-md-6">
		                        	<div class="form-group">
					                    <label >Age:</label>
					                    <input class="form-control" name="age" 
					                        value="{{ ( !empty( $application ) ? $application->age : old('age') ) }}">
					                    <label class="text-warning">{{ $errors->first('age') }}</label>
					                </div>
		                        </div>

		                    	<div class="col-md-6">
		                        	<div class="form-group">
					                    <label >Date of birth:</label>
					                    <input class="form-control" type="date" name="dob" 
					                        value="{{ ( !empty( $application ) ? $application->dob : old('dob') ) }}">
					                    <label class="text-warning">{{ $errors->first('dob') }}</label>
					                </div>
		                        </div>    
		                    </div>

			                <div class="form-group">
			                    <label>Religion:</label>

			                    <div class="row radio-options">
			                    	<div class="col-md-3">
			                    		@php 
			                    			$condition = ( !empty( $application ) ? $application->religion : old('religion') );

			                    			$other_value = ( !empty( $application ) && !in_array( $application->religion, 
			                    				$religions_not_chunk) ? $application->religion : '' );

			                    			$other_select = ( !empty( $application ) && !in_array( $application->religion, 
			                    				$religions_not_chunk) ? 'checked=checked' : '' );
			                    		@endphp

			                    		@foreach( $religions[0] as $option )
					                      <div class="radio">
											<label>
												<input type="radio" value="{{ $option }}" name="religion" 
												<?php if( $option == $condition ): ?> 
													checked="checked"
					                        	<?php endif; ?> >
												{{ $option }}
											</label>
										  </div>
					                    @endforeach
								    </div>

								    <div class="col-md-4">
			                    		@foreach( $religions[1] as $option )
					                      <div class="radio">
											<label>
												<input type="radio" value="{{ $option }}" name="religion" 
												<?php if( $option == $condition ): ?> 
													checked="checked"
					                        	<?php endif; ?> >
												{{ $option }}
											</label>
										  </div>
					                    @endforeach

										<div class="radio">
											<label class="other">
												<input type="radio" value="other" name="religion" {{ $other_select }} >Other
											</label>
											<input class="form-control specific-other" name="specific_religion" 
												value="{{ $other_value }}">
										</div>
								    </div>
			                    </div>
			                    <label class="text-warning">{{ $errors->first('religion') }}</label>
			                </div>

			                <div class="form-group">
					            <label>
					            	How many years of school have you completed (not including repeat years in same class)?:
					            </label>
					            <input class="form-control" name="years_of_school" 
					            	value="{{ ( !empty( $application ) ? $application->years_of_school : old('years_of_school') ) }}">
					            <label class="text-warning">{{ $errors->first('years_of_school') }}</label>
					        </div>

					        <div class="form-group">
			                    <label>What is your occupation?:</label>

			                    <div class="row radio-options">
			                    	<div class="col-md-4">
			                    		@php 
			                    			$condition_1 = ( !empty( $application ) ? $application->occupation : 
			                    				old('occupation') );

			                    			$other_value_1 = ( !empty( $application ) && !in_array( $application->occupation, 
			                    				$occupations_not_chunk) ? $application->occupation : '' );

			                    			$other_select_1 = ( !empty( $application ) && !in_array( $application->occupation, 
			                    				$occupations_not_chunk) ? 'checked=checked' : '' );
			                    		@endphp

			                    		@foreach( $occupations[0] as $option )
					                      <div class="radio">
											<label>
												<input type="radio" value="{{ $option }}" name="occupation" 
												<?php if( $option == $condition_1 ): ?> 
													checked="checked"
					                        	<?php endif; ?> >
												{{ $option }}
											</label>
										  </div>
					                    @endforeach
								    </div>

								    <div class="col-md-4">
								    	@foreach( $occupations[1] as $option )
					                      <div class="radio">
											<label>
												<input type="radio" value="{{ $option }}" name="occupation" 
												<?php if( $option == $condition_1 ): ?> 
													checked="checked"
					                        	<?php endif; ?> >
												{{ $option }}
											</label>
										  </div>
					                    @endforeach
								    </div>

								    <div class="col-md-4">
										@foreach( $occupations[2] as $option )
					                      <div class="radio">
											<label>
												<input type="radio" value="{{ $option }}" name="occupation" 
												<?php if( $option == $condition_1 ): ?> 
													checked="checked"
					                        	<?php endif; ?> >
												{{ $option }}
											</label>
										  </div>
					                    @endforeach

					                    <div class="radio">
											<label class="other">
												<input type="radio" value="other" name="occupation" {{ $other_select_1 }} >Other
											</label>
											<input class="form-control specific-other" name="specific_occupation" 
												value="{{ $other_value_1 }}">
										</div>
								    </div>
			                    </div>
			                    <label class="text-warning">{{ $errors->first('occupations') }}</label>
			                </div>

			            </div>
		            </div>
		            <div style="clear: both;"></div>
		            <p class="" style="text-align: center; margin: 20px 0 30px;">
		                <input href="{{ url('enrollment/page-two') }}" style="padding: 15px 35px;" type="submit" 
		                	class="btn btn-primary btn-lg" value="Next" />
		            </p>
	            </form>
			 </div>
			 </div>
@endsection
