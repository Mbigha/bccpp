					<!-- <h3>Page 3</h3> -->
					<section class="row">
			            <div class="form-column column col-lg-6 col-md-6 col-sm-12 col-xs-12">
			                <div class="section-title">
			                    <!-- <h3>PERSONAL DETAILS</h3> -->
			                    <div class="decor"></div>
			                </div>
			                
			                	<div class="styled-form login-form">
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
	            
			            	<!--Form Column-->
				            <div class="form-column column col-lg-6 col-md-6 col-sm-12 col-xs-12">

				                <div style="" class="section-title">
				                    <h3></h3>
				                    <div class="decor"></div>
				                </div>
				                
				                <!--Login Form-->
				                <div class="styled-form">
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
					            </div>
				            </div>
				        </section>