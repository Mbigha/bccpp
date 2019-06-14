					<!-- <h3>Page 1</h3> -->
					<section class="row">
			            <div class="form-column column col-lg-6 col-md-6 col-sm-12 col-xs-12">
			                <div class="section-title">
			                    <!-- <h3>PERSONAL DETAILS</h3> -->
			                    <div class="decor"></div>
			                </div>
			                
			                	<div class="styled-form login-form">

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
			                	<!-- </div> -->		                    
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
							            	Age of first sexual intercourse:
							            </label>
							            <div class="input-group">
						                    <input class="form-control" type="text" name="first_intercourse" 
						                        value="{{ ( !empty( $application ) ? $application->first_intercourse : old('first_intercourse') ) }}">
						                    <span class="input-group-addon">years</span>
										</div>
							            <label class="text-warning">{{ $errors->first('first_intercourse') }}</label>
							        </div>

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
					                </div>
					            </div>
				            </div>
				        </section>