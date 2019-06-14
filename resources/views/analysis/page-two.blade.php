					<!-- <h3>Page 2</h3> -->
					<section class="row">
			            <div class="form-column column col-lg-6 col-md-6 col-sm-12 col-xs-12">
			                <div class="section-title">
			                    <!-- <h3>PERSONAL DETAILS</h3> -->
			                    <div class="decor"></div>
			                </div>
			                
			                	<div class="styled-form login-form">

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

					                <div class="form-group">
					                    <label>If tested positive, what is your CD4 count?:</label>
					                    <input class="form-control" name="cd_four_count" 
							                value="{{ ( !empty( $application ) ? $application->cd_four_count : old('cd_four_count') ) }}">

					                    <label class="text-warning">{{ $errors->first('cd_four_count') }}</label>
					                </div>

					                <div class="form-group">
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

			                        <div class="form-group">
			                    	<div class="section-title">
					                    <h3><u>BREAST EXAM</u></h3>
					                    <div class="decor"></div>
					                </div>
							        <label>
							        	Breasts: (select all that apply):
							        </label>
							        		@php 
					                    		$condition = [];
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
				                    <div class="section-title">
					                <h3><u>VULVO-VAGINAL AND CERVICAL EXAMINATION (select all that apply)</u></h3>
					                <div class="decor"></div>
					            </div>
							    <div class="form-group">
							        <label>
							        	Vulva/Perineum:
							        </label>
							        @php 
					                    		$condition = [];

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

													<!-- <div class="checkbox radio">
														<label class="other">
															<input type="checkbox" value="not_done" name="perineums[]" {{ $other_select_4 }} >Not Done, due to
														</label>
														<input class="form-control specific-other" name="not_done_data" 
															value="{{ $other_value_4 }}">
													</div> -->
												</div>
					                    	</div>
							    </div> 

							        <div class="form-group">
									        <label>
									        	Vagina:
									        </label>
									        @php 
					                    		$condition = [];

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

													<!-- <div class="checkbox radio">
														<label class="other">
															<input type="checkbox" value="not_done" name="vagina_examinations[]" {{ $other_select_5 }} >Not Done, due to
														</label>
														<input class="form-control specific-other" name="vag_not_done_data" 
															value="{{ $other_value_5 }}">
													</div> -->
												</div>
					                    	</div>
							    	</div>

							    	<div class="form-group">
							        <label>
							        	Cervix:
							        </label>
							        @php 
					                    		$condition = [];

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

													<!-- <div class="checkbox radio">
														<label class="other">
															<input type="checkbox" value="not_done" name="cervix_examinations[]" {{ $other_select_6 }} >Not Done, due to
														</label>
														<input class="form-control specific-other" name="cerv_not_done_data" 
															value="{{ $other_value_6 }}">
													</div> -->
												</div>
					                    	</div>
							    </div>

							        <div class="section-title">
					                <h3><u>BIMANUAL EXAM</u></h3>
					                <div class="decor"></div>
					            </div>

			                	<div class="form-group">
							        <label>
							        	Bimanual Exam Findings :<strong>( circle all that apply)</strong>:
							        </label>
							        @php 
					                    		$condition = [];

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
													<!-- <div class="checkbox radio">
														<label class="other">
															<input type="checkbox" value="not_done" name="bimanual_examinations[]" {{ $other_select_2 }} >Not Done, due to:
														</label>
														<input class="form-control specific-other" name="biman_not_done_data" 
															value="{{ $other_value_2 }}">
													</div> -->

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
					            </div>
				            </div>
				        </section>