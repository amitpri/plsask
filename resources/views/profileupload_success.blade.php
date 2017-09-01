@extends('layouts.mr.manage')

@section('formname')

<h2>Manage Profiles</h2> 

@stop
 

@section('content_page')


 <div class="row">

	<div class="col-md-12">
		<div class="row">			
		
			<div class="col-md-12 col-lg-12 col-xl-12">
				<section class="panel">
					<div class="panel-body"> 
						<p>The following records are loaded. If you see any record didnt go through then please check the data and try reloading again.  Please note maximum of 100records are allowed to be upploaded in a single file</p>
					</div>
				</section>
				<section class="panel">

					<div class="panel-body"> 			 

						<div class="form-group">

							<div class="col-md-12 center">
 								
 								<div class="panel-body">
								 
									<table class="table table-bordered table-striped mb-none" id="datatable-editable">
										<thead>
											<tr> 
												<th>Name</th>
												<th>Email Id</th>
												<th>Phone</th>
												<th>Notes</th> 
											</tr>
										</thead>
										<tbody>


										@foreach($inserts as $insert)  
											<tr> 
												
												<td class="doctor">{{  $insert['name'] }}</td> 
												
												<td class="details">{{  $insert['emailid'] }}</td>	 

												<td class="details">{{  $insert['phone'] }}</td>	 

												<td class="details">{{  $insert['notes'] }}</td> 

												 
											</tr> 
										@endforeach
										</tbody>
									</table>

								</div> 
								 

							</div>
						</div>

					</div>
				</section> 
			</div>
		</div>
	</div>
</div>
 
@stop
