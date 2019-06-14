@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
	<section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
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
      
      <!-- Info boxes -->
      <div class="row">

        <div class="col-md-4 col-sm-6 col-xs-12">
          <a href="{{ url('enrollment/choose-action') }}" class="dash">
          	  <div class="info-box">
	            <span class="info-box-icon bg-aqua"><i class="fa fa-wpforms"></i></span>

	            <div class="info-box-content">
	              <h2 class="info-box-number">Enrollment Form</h2>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
           </a>
        </div>
        <!-- /.col -->

        <!-- <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="{{ url('follow-up/page-one') }}">
          	  <div class="info-box">
	            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

	            <div class="info-box-content">
	              <h2 class="info-box-number">Follow Up Form</h2>
	            </div>
	          </div>
           </a>
        </div> -->
        <!-- /.col -->

        <div class="col-md-4 col-sm-6 col-xs-12">
          <a href="{{ url('analysis/form') }}" class="dash">
          	  <div class="info-box">
	            <span class="info-box-icon bg-green"><i class="fa fa-bar-chart"></i></span>

	            <div class="info-box-content">
	              <h2 class="info-box-number">Analysis</h2>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
           </a>
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <!-- <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">New Members</span>
              <span class="info-box-number">2,000</span>
            </div>
          </div>
        </div> -->
        <!-- /.col -->

      </div>
      <!-- /.row -->

      <div class="row">
      </div>
      <!-- /.row -->
    </section>
@endsection