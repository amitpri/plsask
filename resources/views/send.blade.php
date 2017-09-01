@extends('layouts.mr.manage')

@section('formname')

<h2>Send Topic</h2>

@stop

@section('content_pagecss')

<link rel="stylesheet" href="/admin/assets/vendor/select2/css/select2.css" />
<link rel="stylesheet" href="/admin/assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
 
@stop

@section('content_pagejs')

<script src="/admin/assets/vendor/select2/js/select2.js"></script>  

@stop

@section('content_examplejs')
 
<script src="/toastr/toastr.min.js"></script> 
<link href="/toastr/toastr.min.css" rel="stylesheet" type="text/css">

@stop

@section('content_page')

<div id="send">
	<div class="row">

		<div class="col-md-12">
			<div class="row">

				<div class="col-md-12 col-lg-12 col-xl-12">
					<section class="panel">
						<div class="panel-body">
							<h4 class="text-weight-semibold mt-none text-center">{{ $topics->topic }}</h4>
							<h6 class="text-weight-semibold mt-none text-center">{{ $topics->details }}</h6> 					 			
						</div>
						
					</section>
				</div> 

			</div>
		</div>
	</div>	 

	<div class="row">
		<div class="col-lg-12 col-md-12">
			<section class="panel"> 				
				<div class="row">
					<div class="col-sm-6  ">							
						<form id="search">
						    <input type="text" class="form-control " placeholder="Enter Group to send" name="query" list="query" v-model="searchquery" @keyup="filteredgroups" >
							    <datalist id="query">
								  <option v-for="group in groups" :value="group.name"> 
								</datalist>
						</form>
					</div>
					<div class="col-sm-6">
						<div class="mb-md">
							<button  id="addToTable" class="btn btn-primary" @click="topicsend">Send Mails <i class="fa fa-envelope"></i></button>
						</div>
					</div>						
				</div>
				<div class="row text-center" v-if="displaymessage">

					<h4 class="text-danger">Mails sent.</h4>	

				</div>
				
				<div v-if="topicprofiles.length > 0" class="panel-body">
					<table class="table table-bordered table-striped mb-none" id="datatable-editable">
						<thead>
							<tr>
								<th>Email Id</th>
								<th>Date</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody> 
							<tr v-for="topicprofile in topicprofiles" data-item-id=""> 
								
								<td  class="doctor">@{{ topicprofile.emailid }}</td> 
								
								<td   class="details">@{{ topicprofile.updated_at }}</td> 

								<td class="actions">									
									Sent
									 
								</td>
							</tr> 
						</tbody>
					</table>
				</div>
			</section>
		</div>
	</div>
</div>	

<script>
	
new Vue({

	el : '#send',
	data : {
		id:"",
		group: "",
		groups: [], 
		topicprofile: "",
		topicprofiles: [],  
		inpDetails: "",  
		inpeditname: "", 
		searchquery: "",
		inpId : "{!! $topics->id !!}",
		displaymessage : false,
	},
	mounted:function(){
 		
 		axios.get('/topics/senddefault',{

					params: {
 
				      	topicid: this.inpId,

				    	}

					}).then(response => {this.topicprofiles = response.data});	

	},
	methods:{

		     
		filteredgroups:function(){

			axios.get('/topics/filtered' ,{

					params: {

				      	group : this.searchquery,
				      	topicid: this.inpId,

				    	}

					})
				.then(response => {this.groups = response.data});
		
 
		},
		topicsend:function(){

			
			axios.get('/topics/sendmail' ,{

					params: {

				      	group : this.searchquery,
				      	topicid: this.inpId,

				    	}

					})
				.then(response => {this.groups = response.data});

			this.displaymessage = true;

		},
	}

})


</script>

 
@stop
