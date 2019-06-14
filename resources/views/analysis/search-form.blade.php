@extends('layouts.main')

@section('title', $title)

@section('content')
		  <div class="content-header">
			<h3 class="text-center"> Analysis Form </h3>            
          </div>

          <div class="box box-warning application-form">
          	@if( $errors->any() )
			   <div class="alert alert-warning">
			    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			    <strong>Warning! </strong>Some errors were encountered, please check the details you entered.
			   </div>
			@endif

            <!-- /.box-header -->
            <div class="box-body">
            	<!-- <h2 class="text-center" style="margin-bottom: 40px; margin-top: 20px;">Enrollment Form: Page 1 of 4</h2> -->

              <form method="post" action="{{ url('analysis/search') }}">
              	{{ csrf_field() }}
	            	<!--Form Column-->
	            	<div id="multi-step">
	            		@include('analysis.page-one')
	            		@include('analysis.page-two')
	            		@include('analysis.page-three')
	            	</div>
	            	
		            <div style="clear: both;"></div>
		            <p class="" style="text-align: center; margin: 20px 0 30px;">
		                <input href="{{ url('enrollment/page-two') }}" style="padding: 15px 35px;" type="submit" 
		                	class="btn btn-primary btn-lg" value="Search" />
		            </p>
	            </form>
			 </div>
			 </div>
@endsection