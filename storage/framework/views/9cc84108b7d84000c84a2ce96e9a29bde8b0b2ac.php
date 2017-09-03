<?php $__env->startSection('formname'); ?>

<h2>Manage Group Profiles</h2>

<?php $__env->stopSection(); ?>

 

<?php $__env->startSection('content_examplejs'); ?>
 
<script src="/toastr/toastr.min.js"></script> 
<link href="/toastr/toastr.min.css" rel="stylesheet" type="text/css">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_page'); ?>

<div id="mraddclinicdoctor">
	<div class="row">

		<div class="col-md-12">
			<div class="row">

				<div class="col-md-12 col-lg-12 col-xl-12">
					<section class="panel">
						<div class="panel-body">

							<h2 class="text-weight-semibold mt-none text-center"><?php echo e($groups->name); ?></h2> 
							<h4 class="text-weight-semibold mt-none text-center"><?php echo e($groups->notes); ?></h4> 					 			
						</div>
					</section>
				</div> 

			</div>
		</div>
	</div>	 

	<div class="row text-center">
		<p>You need to add all the profiles to this group whom you want feedback from for this topic. Please click on <i class="fa fa-plus"></i> to add the profile to your group</p>
		 
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12">
			<section class="panel"> 
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a> 
					</div>
			
					<h2 class="panel-title">Available Profiles to Add</h2>
				</header>
				<div class="panel-body">

					<div class="row"> 
						<div class="col-sm-3 pull-right">							
							 <form id="search">
							    <input type="text" class="form-control " placeholder="Search Available Profiles using Email" name="query" v-model="searchquery1" @keyup="filteredprofiles1" >
							  </form>
						</div>
					</div>
					<table class="table table-bordered table-striped mb-none" id="datatable-editable">
						<thead>
							<tr> 
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody> 
							<tr v-for="groupprofile_avail in groupprofile_avails" data-item-id=""> 
								
								<td class="doctor">{{ groupprofile_avail.name }}</td>
								 
								<td class="speciality">{{ groupprofile_avail.emailid }}</td> 
								
								<td class="details">{{ groupprofile_avail.phone }}</td>	
								 
								<td class="actions">									
									<a @click="addprofile(groupprofile_avail)" href="#" class="on-default edit-row"><i class="fa fa-plus"></i></a> 

								</td>
							</tr> 
						</tbody>
					</table>
				</div>
			</section>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a> 
					</div>
			
					<h2 class="panel-title">Profiles added group<b> <?php echo e($groups->name); ?></b></h2>
				</header>
				<div class="panel-body">

					<div class="row"> 
						<div class="col-sm-3 pull-right">							
							 <form id="search">
							    <input type="text" class="form-control " placeholder="Search Added Profiles using Email" name="query" v-model="searchquery2"  @keyup="filteredprofiles2" >
							  </form>
						</div>
					</div>
					<table class="table table-bordered table-striped mb-none" id="datatable-editable">
						<thead>
							<tr> 
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th> 
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>  
							<tr v-for="groupprofile in groupprofiles"> 
								
								<td  class="doctor">{{ groupprofile.name }}</td> 
								
								<td  class="details">{{ groupprofile.emailid }}</td>	
								 
								<td  class="details">{{ groupprofile.phone }}</td>	
								 
								<td class="actions">	 			 
									<a  @click="deleteprofile(groupprofile)" href="#" class="on-editing cancel-row"><i class="fa fa-times"></i></a> 
								</td>
							</tr> 
						</tbody>
					</table>
				</div>
			</section> 
		</div>
	</div>

	<div class="row  text-center">
		<a href="/groups" class="btn btn-primary">Done Adding</a>
	</div>
</div>	

<script>
	
new Vue({

	el : '#mraddclinicdoctor',
	data : {
		id:"",
		groupprofile: "",
		groupprofiles: [],
		groupprofile_avail: "",
		groupprofile_avails: [],
		doctor: "",
		doctors: [],
		disableaddbutton: false,
		inpId: "",
		inpGroupId: "<?php echo $groups->id; ?>",
		inpDoctorid: "",
		inpDoctor: "",
		inpSpeciality: "",
		inpDetails: "",  
		inpeditname: "", 
		searchquery1: "",
		searchquery2: "",
	},
	mounted:function(){

		axios.get('/groups/' +  this.inpGroupId + '/addprofile/defaultavailable').then(response => {this.groupprofile_avails = response.data});

		axios.get('/groups/' +  this.inpGroupId + '/addprofile/defaultadded').then(response => {this.groupprofiles = response.data});


	},
	methods:{

		addprofile:function(profile){

			var index = this.groupprofile_avails.indexOf(profile);
				
				axios.get('/groups/' +  this.inpGroupId + '/addprofile/add' ,{
					params: {

				      	id: this.groupprofile_avails[index].id, 
				      	name: this.groupprofile_avails[index].name, 
				      	 
				    	}

					})
					.then(respose => { 

						this.groupprofile_avails.splice(index,1);					

						this.groupprofiles.unshift({ 

							id: respose.data.id,
							name : respose.data.name, 
							phone : respose.data.phone,
							emailid : respose.data.emailid, 

						});   

			});

		}, 
		deleteprofile:function(row){
			var rowdelete = this.groupprofiles.indexOf(row);  

			axios.get('/groups/' +  this.inpGroupId + '/addprofile/delete' ,{
					params: {

				      		deleteid: this.groupprofiles[rowdelete].id, 
				      	 
				    	}
					}).then(respose => { 

						this.groupprofiles.splice(rowdelete,1);

						this.groupprofile_avails.unshift({ 

							id: respose.data.id,
							name : respose.data.name, 
							phone : respose.data.phone,
							emailid : respose.data.emailid, 

						});
 
				});
 

		}, 
		filteredprofiles1:function(){

			axios.get('/groups/' +  this.inpGroupId + '/addprofile/filtered1' ,{

					params: {

				      	emailid : this.searchquery1, 

				    	}

					})
				.then(response => {this.groupprofile_avails = response.data});
		
 
		},
		filteredprofiles2:function(){

			axios.get('/groups/' +  this.inpGroupId + '/addprofile/filtered2' ,{

					params: {

				      	emailid : this.searchquery2, 

				    	}

					})
				.then(response => {this.groupprofiles = response.data});
		
 
		},
	}

})


</script>

 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mr.manage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>