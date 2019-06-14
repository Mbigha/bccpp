@extends('layouts.main')

@section('title', 'Analysis Result')

@section('content')
		  	<section class="content-header">
		      <h1>
		        Analysis Results
		      </h1>
		    </section>

          <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12 col-lg-8">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Hover Data Table</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>BCCPP ID</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach( $clients as $client )
	                <tr>
	                  <td>{{ $loop->index + 1 }}</td>
	                  <td>{{ $client->bccpp_id }}</td>
	                  <td>
	                  	<a class="btn btn-primary" type="button" href="{{url('clients/view/'.$client->id)}}">View</a>
	                  </td>
	                </tr>
	            @endforeach
                </tbody>
                <tfoot>
	                <tr>
	                  <th>#</th>
	                  <th>Total Result</th>
	                  <th class="total_percent">
	                  	<span>{{ $count }}</span>
	                  </th>
	                </tr>
	                <tr>
	                  <th>#</th>
	                  <th>PERCENTAGE</th>
	                  <th class="total_percent">
	                  	<span>{{ $percentage }}% of {{ $total_clients }} Clients</span>
	                  </th>
	                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection