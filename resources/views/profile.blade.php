@extends('layouts.mr.manage')

@section('formname')

<h2>My Profile</h2>

@stop

@section('breadcrump')

<a href="/mr/profile">My Profile</a>

@stop

@section('content_pagejs')

  <script src="/admin/assets/vendor/autosize/autosize.js"></script>

@stop

<style>
	[v-cloak] {
	  display: none;
	}
</style>
@section('content_page')
 
 
<div class="row" id="profile"  >
	<div class="col-md-4 col-lg-3">

		<section class="panel">
			<div class="panel-body">
				<div class="thumb-info mb-md" v-cloak>
					<img :src="'/uploadimage/' + inpId + '-' + inpEmail + '-profile.png'" class="rounded img-responsive"  >
					<div class="thumb-info-title">
						<span class="thumb-info-inner">@{{ inpName }}</span>
						<span class="thumb-info-type">@{{ inpDesignation }}</span>
					</div>
				</div>


				<hr class="dotted short">
 
				<a href="/mypictures">Image Upload</a>
				<p>@{{ inpDetails}}</p>
				<div class="clearfix">
					<a class="text-uppercase text-muted pull-right" href="#">(View Profile)</a>
				</div>

				<hr class="dotted short">

				<div class="social-icons-list">
					<a rel="tooltip" data-placement="bottom" target="_blank" 
						:href="'http://www.facebook.com/' + inpFacebook"  
						data-original-title="Facebook"><i class="fa fa-facebook"></i><span>Facebook</span></a>
					<a rel="tooltip" data-placement="bottom" target="_blank" 
						:href="'http://www.twitter.com/' + inpTwitter"  
						data-original-title="Twitter"><i class="fa fa-twitter"></i><span>Twitter</span></a>
					<a rel="tooltip" data-placement="bottom" target="_blank" 
						:href="'http://www.linkedin.com/' + inpLinkedin"  
						data-original-title="Linkedin"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
				</div>

			</div>
		</section>

	</div>
	<div class="col-md-8 col-lg-6" >

		<div class="tabs">
			<ul class="nav nav-tabs tabs-primary">
				<li class="active">
					<a href="#personal" data-toggle="tab">Personal</a>
				</li> 
				<li>
					<a href="#social" data-toggle="tab">Social</a>
				</li>
				<li>
					<a href="#company" data-toggle="tab">Company</a>
				</li>
				<li>
					<a href="#password" data-toggle="tab">Password</a>
				</li>
			</ul>
			<div class="tab-content">
				<div id="personal" class="tab-pane active">
					<form class="form-horizontal" method="get">
						<h4 class="mb-xlg">Personal Information</h4>
						{!! Form::model($mrprofile,[ 'method' => 'patch', 'class' => 'form-horizontal form-bordered'])!!}
						<fieldset> 
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Your Name</label>
								<div class="col-md-8">

									{!!  Form::text('name',null,	['class' => 'form-control','v-on:change' => 'methodName','v-model' => 'inpName']) !!}
									
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="email">Email Id</label>
								<div class="col-md-8">

									{!!  Form::text('email',null,	['class' => 'form-control','v-on:change' => 'methodEmail','v-model' => 'inpEmail']) !!}

								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="phone">Phone</label>
								<div class="col-md-8">

									{!!  Form::text('phone',null,	['class' => 'form-control','v-on:change' => 'methodPhone','v-model' => 'inpPhone']) !!}

								</div>
							</div>
							  
							<div class="form-group">
								<label class="col-md-3 control-label" for="city">City</label>
								<div class="col-md-8">

									{!!  Form::text('city',null,	['class' => 'form-control','v-on:change' => 'methodCity','v-model' => 'inpCity']) !!}

								</div>
							</div>
							 
							<div class="form-group">
								<label class="col-md-3 control-label" for="profileFirstName">Country</label>
								<div class="col-md-8">

									{!!  Form::text('country',null,	['class' => 'form-control','v-on:change' => 'methodCountry','v-model' => 'inpCountry']) !!}

								</div>
							</div>
							 
							<div class="form-group">
								<label class="col-md-3 control-label" for="profileBio">About me</label>
								<div class="col-md-8">
								 
									{!! Form::textarea('details', null, ['class' => 'form-control', 
						           'id' => 'details', 'placeholder' => 'Details','v-on:change' => 'methodDetails','v-model' => 'inpDetails']) !!}

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
						{!! Form::close() !!}
					</form>
				</div>  
				<div id="social" class="tab-pane">

					<form class="form-horizontal" method="get">
						<h4 class="mb-xlg">Social Media Details</h4>
						{!! Form::model($mrprofile,[ 'method' => 'patch', 'class' => 'form-horizontal form-bordered'])!!}
						<fieldset>
							<div class="form-group">
								<label class="col-md-3 control-label" for="whatsapp">Whatsapp</label>
								<div class="col-md-8">
									
									{!!  Form::text('whatsapp',null,	['class' => 'form-control','v-on:change' => 'methodWhatsapp','v-model' => 'inpWhatsapp']) !!}

								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="facebook">Facebook</label>
								<div class="col-md-8">
									
									{!!  Form::text('facebook',null,	['class' => 'form-control','v-on:change' => 'methodFacebook','v-model' => 'inpFacebook']) !!}

								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="twitter">Twitter</label>
								<div class="col-md-8">

									{!!  Form::text('twitter',null,	['class' => 'form-control','v-on:change' => 'methodTwitter','v-model' => 'inpTwitter']) !!}

									
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="linkedin">Linkedin</label>
								<div class="col-md-8">

									{!!  Form::text('linkedin',null,	['class' => 'form-control','v-on:change' => 'methodLinkedin','v-model' => 'inpLinkedin']) !!}

								</div>
							</div>   
							     
							<div class="panel-footer">
								<div class="row">
									<div class="col-md-12 col-md-offset-3">
										<button type="submit" class="btn btn-primary">Submit</button> 
									</div>
								</div>
							</div>								
						</fieldset>
						{!! Form::close() !!}
					</form>
						 

				</div>
				<div id="company" class="tab-pane">

					<form class="form-horizontal" method="get">
						<h4 class="mb-xlg">Company Information</h4>
						{!! Form::model($mrprofile,[ 'method' => 'patch', 'class' => 'form-horizontal form-bordered'])!!}
						<fieldset>
							<div class="form-group">
								<label class="col-md-3 control-label" for="profileCompany">Company</label>
								<div class="col-md-8">
									
									{!!  Form::text('company',null,	['class' => 'form-control','v-on:change' => 'methodCompany','v-model' => 'inpCompany']) !!}

								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Your Role</label>
								<div class="col-md-8">

									{!!  Form::text('company_role',null,	['class' => 'form-control','v-on:change' => 'methodRole','v-model' => 'inpRole']) !!}

									
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="email">Your Designation</label>
								<div class="col-md-8">

									{!!  Form::text('company_designation',null,	['class' => 'form-control','v-on:change' => 'methodDesignation','v-model' => 'inpDesignation']) !!}

								</div>
							</div>
							  
							 
							     
							<div class="panel-footer">
								<div class="row">
									<div class="col-md-12 col-md-offset-3">
										<button type="submit" class="btn btn-primary">Submit</button> 
									</div>
								</div>
							</div>								
						</fieldset>
						{!! Form::close() !!}
					</form>
						 

				</div>
				<div id="password" class="tab-pane">

					<form class="form-horizontal" method="get">
						 
						<h4 class="mb-xlg">Change Password</h4>
						<fieldset class="mb-xl">
							<div class="form-group">
								<label class="col-md-3 control-label" for="profileNewPassword">Current</label>
								<div class="col-md-8">
									<input type="text" class="form-control" id="profileNewPassword">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="profileNewPassword">New</label>
								<div class="col-md-8">
									<input type="text" class="form-control" id="profileNewPassword">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="profileNewPasswordRepeat">Confirm New</label>
								<div class="col-md-8">
									<input type="text" class="form-control" id="profileNewPasswordRepeat">
								</div>
							</div>
						</fieldset>
						<div class="panel-footer">
							<div class="row">
								<div class="col-md-12 col-md-offset-3">
									<button type="submit" class="btn btn-primary">Submit</button> 
								</div>
							</div>
						</div>
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
 


@stop
