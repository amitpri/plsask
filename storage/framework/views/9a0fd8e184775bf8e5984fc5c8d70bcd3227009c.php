<?php $__env->startSection('formname'); ?>

<h2>My Profile</h2>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrump'); ?>

<a href="/mr/profile">My Profile</a>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_pagejs'); ?>

  <script src="/admin/assets/vendor/autosize/autosize.js"></script>

<?php $__env->stopSection(); ?>

<style>
	[v-cloak] {
	  display: none;
	}
</style>
<?php $__env->startSection('content_page'); ?>
 
 
<div class="row" id="profile"  >
 
	<div class="col-md-8 col-lg-6" >

		<div class="tabs">
			 
			<div class="tab-content"> 
				<div id="personal" class="tab-pane active">
					<form class="form-horizontal" method="get">
						<h4 class="mb-xlg">Personal Information</h4>
						<?php echo Form::model($mrprofile,[ 'method' => 'patch', 'class' => 'form-horizontal form-bordered']); ?>

						<fieldset> 
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Your Name</label>
								<div class="col-md-8">

									<?php echo Form::text('name',null,	['class' => 'form-control','v-on:change' => 'methodName','v-model' => 'inpName']); ?>

									
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="email">Email Id</label>
								<div class="col-md-8">

									<?php echo Form::text('email',null,	['class' => 'form-control','v-on:change' => 'methodEmail','v-model' => 'inpEmail']); ?>


								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="phone">Phone</label>
								<div class="col-md-8">

									<?php echo Form::text('phone',null,	['class' => 'form-control','v-on:change' => 'methodPhone','v-model' => 'inpPhone']); ?>


								</div>
							</div>
							  
							<div class="form-group">
								<label class="col-md-3 control-label" for="city">City</label>
								<div class="col-md-8">

									<?php echo Form::text('city',null,	['class' => 'form-control','v-on:change' => 'methodCity','v-model' => 'inpCity']); ?>


								</div>
							</div>
							 
							<div class="form-group">
								<label class="col-md-3 control-label" for="profileFirstName">Country</label>
								<div class="col-md-8">

									<?php echo Form::text('country',null,	['class' => 'form-control','v-on:change' => 'methodCountry','v-model' => 'inpCountry']); ?>


								</div>
							</div>
							  
							<div class="panel-footer">
								<div class="row">
									<div class="col-md-12 col-md-offset-3"> 
										<a href="/dashboard" class="btn btn-primary">Submit</a>
									</div>
								</div>
							</div>								
						</fieldset>
						<?php echo Form::close(); ?>

					</form>
				</div>   
			</div>
		</div>
	</div>
	 
</div>

<script>
	
	Vueprofile = new Vue({
		el: '#profile',
		data: {

			inpId : "",
			inpName : "",
			inpEmail : "",
			inpPhone : "",
			inpCity : "",
			inpCountry : "",
			inpCompany : "",
			inpRole : "",
			inpDetails : "",
			inpDesignation : "",
			inpWhatsapp : "",
			inpFacebook : "",
			inpTwitter : "",
			inpLinkedin : "",
			inpUpdatestatus : "",
			allStatuses : [],
			allStatus : "",

			showprofile : false,
	
		}, 

		mounted :function(){

				axios.get('/profile/profiledefault')
						.then(response => {

							
							this.inpId = response.data.id;
							this.inpName = response.data.name;
							this.inpEmail = response.data.email;
							this.inpPhone = response.data.phone;
							this.inpCity = response.data.city;
							this.inpCountry = response.data.country;
							this.inpCompany = response.data.company;
							this.inpRole = response.data.company_role;
							this.inpDetails = response.data.details;
							this.inpDesignation = response.data.company_designation;
							this.inpWhatsapp = response.data.whatsapp;
							this.inpFacebook = response.data.facebook;
							this.inpTwitter = response.data.twitter;
							this.inpLinkedin = response.data.linkedin;

						});				
							
		},
		methods: {

			methodName:function(){  

				axios.get('/profile/editprofile/name' ,{

					params: {
				      val: this.inpName,
				    }

				})
				.then(function(response){
					this.inpName = response.data;

					toastr.options = {
			            
			            "timeOut": "1000",
			        };

					toastr.success('Your Name is Saved!!',{ fadeAway: 1 });

				});
			},
			methodEmail:function(){ 

				axios.get('/profile/editprofile/email' ,{

					params: {
				      val: this.inpEmail,
				    }

				})
				.then(function(response){
					this.inpEmail = response.data;

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Email is now Saved!!');
					
				});
			},
			methodPhone:function(){ 

				axios.get('/profile/editprofile/phone' ,{

					params: {
				      val: this.inpPhone,
				    }

				})
				.then(function(response){
					this.inpPhone = response.data;

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Phone is now Saved!!');
					
				});
			},
			methodCity:function(){ 

				axios.get('/profile/editprofile/city' ,{

					params: {
				      val: this.inpCity,
				    }

				})
				.then(function(response){
					this.inpCity = response.data;

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('City is now Saved!!');
					
				});
			}, 
			methodCountry:function(){ 

				axios.get('/profile/editprofile/country' ,{

					params: {
				      val: this.inpCountry,
				    }

				})
				.then(function(response){
					this.inpCountry = response.data;

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Country is now Saved!!');
					
				});
			}, 
			methodDetails:function(){ 
				axios.get('/profile/editprofile/details' ,{

					params: {
				      val: this.inpDetails,
				    }

				})
				.then(function(response){
					this.inpDetails = response.data;
					
					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Details are Saved!!');
					
				});
			
			},
			updatestatus:function(){ 

				axios.get('/profile/updatestatus' ,{

					params: {
				      val: this.inpUpdatestatus,
				    }

				})
				.then(response => {						

					this.allStatuses.unshift({

						userstatus : this.inpUpdatestatus, 

					});

					this.inpUpdatestatus = "";

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Status is now Saved!!');
					
				});
			},
			methodCompany:function(){ 

				axios.get('/profile/editprofile/company' ,{

					params: {
				      val: this.inpCompany,
				    }

				})
				.then(function(response){
					this.inpCompany = response.data;

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Company is now Saved!!');
					
				});
			},			
			methodRole:function(){ 

				axios.get('/profile/editprofile/role' ,{

					params: {
				      val: this.inpRole,
				    }

				})
				.then(function(response){
					this.inpRole = response.data;

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Role is now Saved!!');
					
				});
			},
			methodDesignation:function(){ 

				axios.get('/profile/editprofile/designation' ,{

					params: {
				      val: this.inpDesignation,
				    }

				})
				.then(function(response){
					this.inpDesignation = response.data;

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Designation is now Saved!!');
					
				});
			},
			methodManager:function(){ 

				axios.get('/profile/editprofile/manager' ,{

					params: {
				      val: this.inpWorkmanager,
				    }

				})
				.then(function(response){
					this.inpWorkmanager = response.data;

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Manager name is now Saved!!');
					
				});
			},
			methodWorklocation:function(){ 

				axios.get('/profile/editprofile/worklocation' ,{

					params: {
				      val: this.inpWorklocation,
				    }

				})
				.then(function(response){
					this.inpWorklocation = response.data;

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Work Location is now Saved!!');
					
				});
			},
			methodWorkstartdate:function(){ 

				axios.get('/profile/editprofile/workstartdate' ,{

					params: {
				      val: this.inpWorkstartdate,
				    }

				})
				.then(function(response){
					this.inpWorkstartdate = response.data;

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Work Start Date is now Saved!!');
					
				});
			},
			methodWhatsapp:function(){ 

				axios.get('/profile/editprofile/whatsapp' ,{

					params: {
				      val: this.inpWhatsapp,
				    }

				})
				.then(function(response){
					this.inpWhatsapp = response.data;

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Whatsapp number is now Saved!!');
					
				});
			},
			methodFacebook:function(){ 

				axios.get('/profile/editprofile/facebook' ,{

					params: {
				      val: this.inpFacebook,
				    }

				})
				.then(function(response){
					this.inpFacebook = response.data;

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Facebook id is now Saved!!');
					
				});
			},
			methodTwitter:function(){ 

				axios.get('/profile/editprofile/twitter' ,{

					params: {
				      val: this.inpTwitter,
				    }

				})
				.then(function(response){
					this.inpTwitter = response.data;

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Twitter id is now Saved!!');
					
				});
			},
			methodLinkedin:function(){ 

				axios.get('/profile/editprofile/linkedin' ,{

					params: {
				      val: this.inpLinkedin,
				    }

				})
				.then(function(response){
					this.inpLinkedin = response.data;

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Linkedin id is now Saved!!');
					
				});
			},
			showmedia:function(){ 

				 alert(1);
			},


		}
	});

</script>
 


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mr.manage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>