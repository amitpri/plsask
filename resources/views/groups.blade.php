@extends('layouts.mr.manage')

@section('formname')

<h2>Manage Groups</h2>

@stop

@section('content_pagecss')
 


@stop

@section('content_pagejs')
 


@stop

@section('content_examplejs')
 

<script src="/toastr/toastr.min.js"></script> 
<link href="/toastr/toastr.min.css" rel="stylesheet" type="text/css">


@stop
<style>
	[v-cloak] {
	  display: none;
	}
</style>
@section('content_page')

<script src="/css/popper.js"></script>
<script src="/js/tooltip.js"></script>
<script src="/js/v-tooltip.browser.js"></script>
<style>

.tooltip {
  display: block !important;
  pointer-events: none;
  padding: 4px;
  z-index: 10000;
}

.tooltip .tooltip-inner {
  background: black;
  color: white;
  border-radius: 16px;
  padding: 5px 10px 4px;
}

.tooltip tooltip-arrow{
  display: none;
}

.tooltip[aria-hidden='true'] {
  visibility: hidden;
  opacity: 0;
  transition: opacity .15s, visibility .15s;
}

.tooltip[aria-hidden='false'] {
  visibility: visible;
  opacity: 1;
  transition: opacity .15s;
}

</style>
<div id="groups">   

	<div class="row" >
		<div class="col-lg-12 col-md-12">
			<section class="panel">
				<header class="panel-heading">
					
					 <div class="mb-md">
						<button @click="addgrouprow" :disabled="disableaddbutton" id="addToTable" class="btn btn-primary">Add Group <i class="fa fa-plus"></i></button>
						<h6>After a new group is created, You need to click on <i class="fa fa-user-md"></i> and add profiles to newly created group	 </h6>
						
					</div>	
				</header>
				<div class="panel-body" v-cloak>

					<div class="row"> 
						<div v-if="flg_name" class="col-sm-6">	
							<p class="text-center bg-danger" v-cloak><b>Please enter Name</b></p>
						</div>
						<div class="col-sm-3 pull-right" >							
							 <form id="search">
							    <input type="text" class="form-control " placeholder="Search for Groups" name="query" v-model="searchquery"  @keyup="filteredgroups" >
							  </form>
						</div>
					</div>
					<table class="table table-bordered table-striped mb-none" >

						<p v-if="groups.length < 1" class="text-center"><b>No Group Found</b></p>

						<thead v-if="groups.length >= 1">
							<tr> 
								<th>Group</th>
								<th>Notes</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>  
							<tr v-for="group in groups"> 
								
								<td v-show="group.editfalse" class="doctor">@{{ group.name }}</td>
								<td v-show="group.edittrue" class="doctor">
									<input type="text" class="form-control input-block" v-model="group.name" >
								</td> 
																
								<td v-show="group.editfalse" class="details">@{{ group.notes }}</td>	
								<td v-show="group.edittrue" class="details">
									<input type="text" class="form-control input-block" v-model="group.notes">
								</td>

								<td class="actions">
									<a v-tooltip="msg1"  v-show="group.editfalse" :href="'/groups/' + group.id  + '/addprofile'" class="on-default add-doctor-row"><i class="fa fa-user-md"></i></a>	 		
									<a v-tooltip="msg2"  v-show="group.editfalse" @click="editrow(group)" href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a> 
									<a v-tooltip="msg3"  v-show="group.editfalse" @click="deleterow(group)" href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
									<a v-tooltip="msg4"  v-show="group.edittrue" @click="saveeditrow(group)" href="#" class="on-editing save-row"><i class="fa fa-save"></i></a>
									<a v-tooltip="msg5"  v-show="group.edittrue" @click="canceleditrow(group)" href="#" class="on-editing cancel-row"><i class="fa fa-times"></i></a> 
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
			flg_name: false,
			msg1: 'Add Users to this Group',
			msg2: 'Edit',
			msg3: 'Delete',
			msg4: 'Save',
			msg5: 'Cancel',
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

				if( this.groups[roweditsave].name == null ){
					
					this.flg_name = true; 

				}else{

					this.flg_name = false;

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
				}

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

					      	group : this.searchquery, 

					    	}

						})
					.then(response => {this.groups = response.data});
			
	 
			}, 

		}
	});

</script>

@stop
