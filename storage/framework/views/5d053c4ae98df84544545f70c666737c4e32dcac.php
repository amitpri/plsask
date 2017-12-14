<?php $__env->startSection('formname'); ?>

<h2>Manage Profiles</h2>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_page'); ?>
<style>
	[v-cloak] {
	  display: none;
	}
</style>

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
<div id="profiles">   

	<div class="row">
		<div class="col-lg-12 col-md-12">
			<section class="panel">
				<header class="panel-heading">					
					 <div class="mb-md">
						<button @click="addprofilerow" :disabled="disableaddbutton" id="addToTable" class="btn btn-primary">Add Profile <i class="fa fa-plus"></i></button>

						<a href="/profiles/upload" class="btn btn-primary">Upload Profile <i class="fa fa-upload"></i></a>

						<h5>Once you add profiles, you need to create your groups and assign profiles to groups</h5>
						
					</div>	
				</header>
				<div class="panel-body" v-cloak>

					<div class="row"> 
						<div v-if="flg_email" class="col-sm-6">	
							<p class="text-center bg-danger" v-cloak><b>Please enter email id</b></p>
						</div>
						<div class="col-sm-3 pull-right"  >							
							 <form id="search">
							    <input type="text" class="form-control " placeholder="Search Profiles by Email" name="query" v-model="searchquery" @keyup="filteredprofiles" >
							  </form>
						</div>
					</div>
					<table class="table table-bordered table-striped mb-none"  > 
						 
						<p v-if="profiles.length < 1" class="text-center"><b>No Profile Available</b></p>
					 
						<thead v-if="profiles.length >= 1">
							<tr> 
								<th>Name</th>
								<th>Email Id <small style="color: red">*</small></th>
								<th>Phone</th>
								<th>Notes</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>  
							<tr v-for="(profile,index) in profiles"> 
								
								<td v-show="profile.editfalse" class="doctor">{{ profile.name }}</td>
								<td v-show="profile.edittrue" class="doctor">
									<input type="text" class="form-control input-block" v-model="profile.name" >
								</td> 
								
								<td v-show="profile.editfalse" class="details">{{ profile.emailid }}</td>	
								<td v-show="profile.edittrue" class="details">
									<input type="text" class="form-control input-block" v-model="profile.emailid">
								</td>

								<td v-show="profile.editfalse" class="details">{{ profile.phone }}</td>	
								<td v-show="profile.edittrue" class="details">
									<input type="text" class="form-control input-block" v-model="profile.phone">
								</td>

								<td v-show="profile.editfalse" class="details">{{ profile.notes }}</td>	
								<td v-show="profile.edittrue" class="details">
									<input type="text" class="form-control input-block" v-model="profile.notes">
								</td>

								<td class="actions">	 					
									<a v-tooltip="msg1" v-show="profile.editfalse" @click="editrow(profile)" href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a> 
									<a v-tooltip="msg2" v-show="profile.editfalse" @click="deleterow(profile)" href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
									<a v-tooltip="msg3" v-show="profile.edittrue" @click="saveeditrow(profile)" href="#" class="on-editing save-row"><i class="fa fa-save"></i></a>
									<a v-tooltip="msg4" v-show="profile.edittrue" @click="canceleditrow(profile)" href="#" class="on-editing cancel-row"><i class="fa fa-times"></i></a> 
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
		el: '#profiles',
		data: { 
			profiles: [],	
			profile: "",	 
			disableaddbutton: false, 
			flg_email: false,
			searchquery: "",
			msg1 : 'Edit',
			msg2 : 'Delete',
			msg3 : 'Save',
			msg4 : 'Cancel',
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

					      	emailid : this.searchquery, 

					    	}

						})
					.then(response => {this.profiles = response.data});
			
	 
			}, 

		}
	});

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mr.manage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>