@extends('layouts.mr.manage')

@section('formname')

<h2>Upload Profiles List</h2>

@stop
 

@section('content_page')


 <div class="row">

	<div class="col-md-12">
		<div class="row">			
		
			<div class="col-md-12 col-lg-12 col-xl-12">
				<section class="panel">
					
					<div class="panel-body"> 			 

						<div class="form-group">

							<div class="col-md-12 center">
 								 
								<form style="margin-top: 15px;padding: 10px;" action="{{ URL::to('/profiles/upload/uploadexcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
									{{ csrf_field() }}
									<div class=" col-pull-md-6 col-md-6 center">
										<input class="center" type="file" name="import_file" />
									</div>
									<button class="btn btn-primary">Upload Profiles Data File</button>
								</form>

							</div>
						</div>

					</div>
				</section>
				<section class="panel">
					
					<div class="panel-body"> 			 

						<div class="form-group">

							<div class="col-md-12">
 								 
								 <ul>
								 	<p>Please follow these rules while uploading the data files</p>
								 	<li>Only <b>Excel file</b> upload is allowed!</li>
								 	<li>Maximum <b>100 records</b> are allowed to be uploaded in one single file. Please use multiple files if you have more than 100 records to be uploaded</li>
								 	<li>Excel must have only <b>one tab</b>. No more than one tab is supported</li>
								 	<li>The first row is the header row and must be there in the file. The header colums should be <b>name, emailid, phone and notes</b></li>
								 	<li>You can use our template and create and uploads your records. Download the template by clicking <a href="/download/profiles">here</a></li>
								 </ul>

							</div>
						</div>

					</div>
				</section>
			</div>
		</div>
	</div>
</div>
 
@stop
