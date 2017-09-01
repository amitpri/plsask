@extends('layouts.mr.manage')

@section('formname')

<h2>Manage Groups</h2>

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

<div id="groups">   

	<div class="row">
		<div class="col-lg-12 col-md-12">
			<section class="panel">
				<header class="panel-heading">
					
					 <div class="mb-md">
						<button @click="addgrouprow" :disabled="disableaddbutton" id="addToTable" class="btn btn-primary">Add Group <i class="fa fa-plus"></i></button>
						
					</div>	
				</header>
				<div class="panel-body">

					<div class="row"> 
						<div class="col-sm-3 pull-right">							
							 <form id="search">
							    <input type="text" class="form-control " placeholder="Search Groups" name="query" v-model="searchquery"  @keyup="filteredgroups" >
							  </form>
						</div>
					</div>
					<table class="table table-bordered table-striped mb-none" id="datatable-editable">
						<thead>
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Notes</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>  
							<tr v-for="group in groups">
								<td class="id">@{{ group.id }}</td>
								
								<td v-show="group.editfalse" class="doctor">@{{ group.name }}</td>
								<td v-show="group.edittrue" class="doctor">
									<input type="text" class="form-control input-block" v-model="group.name" >
								</td> 
																
								<td v-show="group.editfalse" class="details">@{{ group.notes }}</td>	
								<td v-show="group.edittrue" class="details">
									<input type="text" class="form-control input-block" v-model="group.notes">
								</td>

								<td class="actions">
									<a v-show="group.editfalse" :href="'/groups/' + group.id  + '/addprofile'" class="on-default add-doctor-row"><i class="fa fa-user-md"></i></a>	 		
									<a v-show="group.editfalse" @click="editrow(group)" href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a> 
									<a v-show="group.editfalse" @click="deleterow(group)" href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
									<a v-show="group.edittrue" @click="saveeditrow(group)" href="#" class="on-editing save-row"><i class="fa fa-save"></i></a>
									<a v-show="group.edittrue" @click="canceleditrow(group)" href="#" class="on-editing cancel-row"><i class="fa fa-times"></i></a> 
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
		el: '#groups',
		data: {
			groups: [],	
			group: "",	
			disableaddbutton: false, 
			searchquery: "",
		},
		mounted :function(){

				axios.get('/groups/groupdefault')
						.then(response => {this.groups = response.data});				
							
		},
		methods: {

			addgrouprow:function(group){

				this.disableaddbutton= true;
				
				var index = this.groups.indexOf(group);
				 
				axios.get('/groups/addgrouprow')
					.then(response => {

						this.inpId = response.data.id,

						this.groups.unshift({

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

					var rowdelete = this.groups.indexOf(row);  

					axios.get('/groups/groupdelete' ,{
							params: {

						      		deleteid: this.groups[rowdelete].id, 
						      	 
						    	}
							}).then(respose => { 

								this.groups.splice(rowdelete,1);
		 
						});

					this.disableaddbutton= false;

				}
			},
			saveeditrow:function(row){
			
				roweditsave = this.groups.indexOf(row);

				axios.get('/groups/groupsave' ,{
						params: {

				      		id: this.groups[roweditsave].id, 
				      		name: this.groups[roweditsave].name, 
				      		notes: this.groups[roweditsave].notes, 
				      	 
					    	}
						}).then(response => { 

							row.edittrue = !row.edittrue;
							row.editfalse = !row.editfalse;

					})
				
				this.disableaddbutton= false;

			},
			canceleditrow:function(row){
				
				rowcancel = this.groups.indexOf(row); 

				this.disableaddbutton= false;

				axios.get('/groups/groupcancel' ,{
						params: {

				      		id: this.groups[rowcancel].id, 			      		 
				      	 
					    	}
						}).then(response => { 

							row.edittrue = !row.edittrue;
							row.editfalse = !row.editfalse;

							this.groups[rowcancel].name = response.data.name; 
							this.groups[rowcancel].notes = response.data.notes; 

					})
			
			},
			filteredgroups:function(){

				axios.get('/groups/groupfiltered' ,{

						params: {

					      	profile : this.searchquery, 

					    	}

						})
					.then(response => {this.groups = response.data});
			
	 
			}, 

		}
	});

</script>

@stop
