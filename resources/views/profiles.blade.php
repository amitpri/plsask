@extends('layouts.mr.manage')

@section('formname')

<h2>Manage Profiles</h2>

@stop

@section('content_pagecss')

<link rel="stylesheet" href="/admin/assets/vendor/select2/css/select2.css" />
<link rel="stylesheet" href="/admin/assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" /> 


@stop

@section('content_pagejs')


<script src="/admin/assets/vendor/jquery-validation/jquery.validate.js"></script>
<script src="/admin/assets/vendor/select2/js/select2.js"></script> 
<script src="https://cdn.jsdelivr.net/vee-validate/2.0.0-rc.3/vee-validate.min.js"></script>


@stop

@section('content_examplejs')

<script src="/admin/assets/javascripts/forms/examples.validation.js"></script>

<script src="/toastr/toastr.min.js"></script> 
<link href="/toastr/toastr.min.css" rel="stylesheet" type="text/css">


@stop

@section('content_page')
<style>
	[v-cloak] {
	  display: none;
	}
</style>
<div id="mrprofiles">   

	<div class="row">
		<div class="col-lg-12 col-md-12">
			<section class="panel">
				<header class="panel-heading">					
					 <div class="mb-md">
						<button @click="addprofilerow" :disabled="disableaddbutton" id="addToTable" class="btn btn-primary">Add Profile <i class="fa fa-plus"></i></button>

						<a href="/profiles/upload" class="btn btn-primary">Upload Profile <i class="fa fa-plus"></i></a>
						
					</div>	
				</header>
				<div class="panel-body" v-cloak>

					<div class="row"> 
						<div v-if="flg_email" class="col-sm-6">	
							<p class="text-center bg-danger" v-cloak><b>Please enter email id</b></p>
						</div>
						<div class="col-sm-3 pull-right" v-if="profiles.length > 0">							
							 <form id="search">
							    <input type="text" class="form-control " placeholder="Search Profiles" name="query" v-model="searchquery" @keyup="filteredprofiles" >
							  </form>
						</div>
					</div>
					<table class="table table-bordered table-striped mb-none"  > 
						 
						<p v-if="profiles.length < 1" class="text-center"><b>No Profile Added</b></p>
					 
						<thead v-if="profiles.length >= 1">
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Email Id</th>
								<th>Phone</th>
								<th>Notes</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>  
							<tr v-for="profile in profiles">
								<td class="id">@{{ profile.id }}</td>
								
								<td v-show="profile.editfalse" class="doctor">@{{ profile.name }}</td>
								<td v-show="profile.edittrue" class="doctor">
									<input type="text" class="form-control input-block" v-model="profile.name" >
								</td> 
								
								<td v-show="profile.editfalse" class="details">@{{ profile.emailid }}</td>	
								<td v-show="profile.edittrue" class="details">
									<input type="text" class="form-control input-block" v-model="profile.emailid">
								</td>

								<td v-show="profile.editfalse" class="details">@{{ profile.phone }}</td>	
								<td v-show="profile.edittrue" class="details">
									<input type="text" class="form-control input-block" v-model="profile.phone">
								</td>

								<td v-show="profile.editfalse" class="details">@{{ profile.notes }}</td>	
								<td v-show="profile.edittrue" class="details">
									<input type="text" class="form-control input-block" v-model="profile.notes">
								</td>

								<td class="actions">	 					
									<a v-show="profile.editfalse" @click="editrow(profile)" href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a> 
									<a v-show="profile.editfalse" @click="deleterow(profile)" href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
									<a v-show="profile.edittrue" @click="saveeditrow(profile)" href="#" class="on-editing save-row"><i class="fa fa-save"></i></a>
									<a v-show="profile.edittrue" @click="canceleditrow(profile)" href="#" class="on-editing cancel-row"><i class="fa fa-times"></i></a> 
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
		el: '#mrprofiles',
		data: { 
			profiles: [],	
			profile: "",	 
			disableaddbutton: false, 
			flg_email: false,
			searchquery: "",
		},
		mounted :function(){

				axios.get('/profiles/profiledefault')
						.then(response => {this.profiles = response.data});				
							
		},
		methods: {

			addprofilerow:function(profile){

				this.disableaddbutton= true;
				
				var index = this.profiles.indexOf(profile);
				 
				axios.get('/profiles/addprofilerow')
					.then(response => {

						this.inpId = response.data.id,

						this.profiles.unshift({

							id : response.data.id,
							edittrue : response.data.edittrue,
							editfalse : response.data.editfalse,

						}) 
					 
				});

			},
			editrow:function(row){ 

				row.edittrue = !row.edittrue;
				row.editfalse = !row.editfalse;

			},
			deleterow:function(row){

				var c = confirm("Sure to Delete?");

				if( c == true){

					var rowdelete = this.profiles.indexOf(row);  

					axios.get('/profiles/profiledelete' ,{
							params: {

						      		deleteid: this.profiles[rowdelete].id, 
						      	 
						    	}
							}).then(respose => { 

								this.profiles.splice(rowdelete,1);
		 
						});

					this.disableaddbutton= false;

				}

			},
			saveeditrow:function(row){
			
				roweditsave = this.profiles.indexOf(row);

				if( this.profiles[roweditsave].emailid == null ){
					
					this.flg_email = true; 

				}else{
					
					this.flg_email = false;
					
					axios.get('/profiles/profilesave' ,{
							params: {

					      		id: this.profiles[roweditsave].id, 
					      		name: this.profiles[roweditsave].name, 
					      		emailid: this.profiles[roweditsave].emailid, 
					      		phone: this.profiles[roweditsave].phone, 
					      		notes: this.profiles[roweditsave].notes, 
					      	 
						    	}
							}).then(response => { 

								row.edittrue = !row.edittrue;
								row.editfalse = !row.editfalse;

						})
					
					this.disableaddbutton= false;
					 
				}

			},
			canceleditrow:function(row){
				
				rowcancel = this.profiles.indexOf(row); 

				this.disableaddbutton= false;

				axios.get('/profiles/profilecancel' ,{
						params: {

				      		id: this.profiles[rowcancel].id, 			      		 
				      	 
					    	}
						}).then(response => { 

							row.edittrue = !row.edittrue;
							row.editfalse = !row.editfalse;

							this.profiles[rowcancel].name = response.data.name; 
							this.profiles[rowcancel].emailid = response.data.emailid; 
							this.profiles[rowcancel].phone = response.data.phone; 
							this.profiles[rowcancel].notes = response.data.notes; 

					})
			
			},
			filteredprofiles:function(){

				axios.get('/profiles/profilefiltered' ,{

						params: {

					      	profile : this.searchquery, 

					    	}

						})
					.then(response => {this.profiles = response.data});
			
	 
			}, 

		}
	});

</script>

@stop
