@extends('layouts.main')

@section('title', 'Choose Action')

@section('content')
	<section class="content-header">
      <h1>
        Choose Action
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Choose Action</li>
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
         <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong> {{ session('success') }} </strong>
         </div>
      @endif
      
      <!-- Info boxes -->
      <div class="row">

        <div class="col-md-4 col-sm-6 col-xs-12">
          <a class="dash" data-toggle="modal" data-target="#modal-default">
          	  <div class="info-box">
	            <span class="info-box-icon bg-yellow"><i class="fa fa-forward"></i></span>

	            <div class="info-box-content">
	              <h2 class="info-box-number">Continue</h2>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
           </a>
        </div>
        <!-- /.col -->

        <div class="col-md-4 col-sm-6 col-xs-12">
          <a href="{{ url('enrollment/start-new') }}" class="dash">
          	  <div class="info-box">
	            <span class="info-box-icon bg-red"><i class="fa fa-certificate"></i></span>

	            <div class="info-box-content">
	              <h2 class="info-box-number">Start New</h2>
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

        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title">Enter BCCPP ID of Client</h2>
              </div>
              <div class="modal-body">
                <!-- <p>One fine body&hellip;</p> -->
                <form method="post" action="{{ url('enrollment/continue') }}">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label>
                      BCCPP ID:
                    </label>
                      <input class="form-control" name="bccpp_id">
                  </div>
                  <div class="form-group text-center" style="margin: 15px;">
                    <button type="submit" class="btn btn-primary">Continue</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </section>
@endsection