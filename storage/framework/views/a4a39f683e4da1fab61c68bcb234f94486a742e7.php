<?php $__env->startSection('formname'); ?>

<h2>Send Topic</h2>

<?php $__env->stopSection(); ?>

 
<style>
	[v-cloak] {
	  display: none;
	}
</style>
<?php $__env->startSection('content_page'); ?>

<div id="send">
	<div class="row">

		<div class="col-md-12">
			<div class="row">

				<div class="col-md-12 col-lg-12 col-xl-12">
					<section class="panel">
						<div class="panel-body">
							<h4 class="text-weight-semibold mt-none text-center"><?php echo e($topics->topic); ?></h4>
							<h6 class="text-weight-semibold mt-none text-center"><?php echo $topics->details; ?></h6> 					 			
						</div>
						
					</section>
				</div> 

			</div>
		</div>
	</div>	 
	<div class="row text-center">
		<p>Please select a group where you want this topic to be sent as mail. Just enter the group name and click on Send Mails. You can check this area later to find out who all recieved the mails</p>
		 
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
				<div class="row" v-if="errormsg" v-cloak>
						
					<h6 class="text-danger">Please enter a valid group name. If you have not created one then please <a href="/groups">click here</a> to create a group</h6>

				</div>
				<div class="row text-center" v-if="displaymessage" v-cloak>

					<h6 class="text-info"><b>Mails are being sent to these email ids. You can check back at the <a href="/reviews">review</a> section to find out the responses</b></h6>	

				</div>

				<br>

				<div v-if="topicprofiles.length > 0" class="panel-header" v-cloak><b>Topic Recipients</b></div>

				<br>
				
				<div v-if="topicprofiles.length > 0" class="panel-body" v-cloak>
					<table class="table  mb-none" id="datatable-editable">
						<thead>
							<tr>
								<th><h6><strong>Email Id</strong></h6></th>
								<th><h6><strong>Date</strong></h6></th> 
							</tr>
						</thead>
						<tbody> 
							<tr v-for="topicprofile in topicprofiles" data-item-id=""> 
								
								<td  class="doctor"><h6>{{ topicprofile.emailid }}</h6></td> 
								
								<td   class="details"><h6>{{ topicprofile.created_at }}</h6></td> 

							 
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
		inpId : "<?php echo $topics->id; ?>",
		displaymessage : false,
		errormsg : false,
	},
	mounted:function(){
 		
 		axios.get('/topics/senddefault',{

				params: {

			      	topicid: this.inpId,

			    	}

				}).then(response => {

					this.topicprofiles = response.data;
//					this.topicprofiles.status = 'Sent'; 

				});	

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

			if(this.searchquery == ""){

				this.errormsg =  true;

			}else{

				this.errormsg =  false;

				var c = confirm("Sure to send? Please make sure you are not spamming anyone.");				 

				if( c == true){

					axios.get('/topics/sendmail' ,{

							params: {

						      	group : this.searchquery,
						      	topicid: this.inpId,

						    	}

							})
						.then(response => {

							this.topicprofiles = response.data;

						});

					this.displaymessage = true;
				}

			}



		},
	}

})


</script>

 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mr.manage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>