@extends('layouts.mr.manage')

@section('formname')

<h2>My Profile</h2>

@stop

@section('breadcrump')

<a href="/mr/profile">Hotel Profile</a>

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
 
	<div class="col-md-12 col-lg-6" >

		<div class="tabs">
			<ul class="nav nav-tabs tabs-primary">
				<li class="active">
					<a href="#basics" data-toggle="tab">Basics</a>
				</li>  
				<li>
					<a href="#amenities" data-toggle="tab">Amenities</a>
				</li>
				<li>
					<a href="#rules" data-toggle="tab">Hotel Rules</a>
				</li>
				<li>
					<a href="#location" data-toggle="tab">Location</a>
				</li> 
				<li>
					<a href="mypictures"  >Pictures</a>
				</li>
			</ul>
			<div class="tab-content"> 
				<div id="basics" class="tab-pane active">
					<form class="form-horizontal" method="get">
						<h4 class="mb-xlg">Hotel Information</h4>
						{!! Form::model($hotel,[ 'method' => 'patch', 'class' => 'form-horizontal form-bordered'])!!}
						<fieldset> 
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Hotel Name</label>
								<div class="col-md-9">

									{!!  Form::text('name',null,	['class' => 'form-control','v-on:change' => 'methodName','v-model' => 'inpName']) !!}
									
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="email">Email Id 1</label>
								<div class="col-md-9">

									{!!  Form::text('email1',null,	['class' => 'form-control','v-on:change' => 'methodEmail1','v-model' => 'inpEmail1']) !!}

								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="email">Email Id 2</label>
								<div class="col-md-9">

									{!!  Form::text('email2',null,	['class' => 'form-control','v-on:change' => 'methodEmail2','v-model' => 'inpEmail2']) !!}

								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="email">Email Id 3</label>
								<div class="col-md-9">

									{!!  Form::text('email3',null,	['class' => 'form-control','v-on:change' => 'methodEmail3','v-model' => 'inpEmail3']) !!}

								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="phone">Phone 1</label>
								<div class="col-md-9">

									{!!  Form::text('phone1',null,	['class' => 'form-control','v-on:change' => 'methodPhone1','v-model' => 'inpPhone1']) !!}

								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="phone">Phone 2</label>
								<div class="col-md-9">

									{!!  Form::text('phone2',null,	['class' => 'form-control','v-on:change' => 'methodPhone2','v-model' => 'inpPhone2']) !!}

								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="phone">Phone 3</label>
								<div class="col-md-9">

									{!!  Form::text('phone3',null,	['class' => 'form-control','v-on:change' => 'methodPhone3','v-model' => 'inpPhone3']) !!}

								</div>
							</div>
							  
							<div class="form-group">
								<label class="col-md-3 control-label" for="city">City</label>
								<div class="col-md-9">

									{!!  Form::text('city',null,	['class' => 'form-control','v-on:change' => 'methodCity','v-model' => 'inpCity']) !!}

								</div>
							</div>
							 
							<div class="form-group">
								<label class="col-md-3 control-label" for="profileFirstName">Full Address</label>
								<div class="col-md-9">

									{!! Form::textarea('address', null, ['class' => 'form-control', 
						           'id' => 'address', 'placeholder' => 'Address','v-on:change' => 'methodAddress','v-model' => 'inpAddress']) !!}

								</div>
							</div>
							 
							<div class="form-group">
								<label class="col-md-3 control-label" for="profileBio">About Hotel</label>
								<div class="col-md-9">
								 
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
				<div id="amenities" class="tab-pane">

					<form class="form-horizontal" method="get">
						<h4 class="mb-xlg">Amenities</h4>
						{!! Form::model($hotel,[ 'method' => 'patch', 'class' => 'form-horizontal form-bordered'])!!}
						<fieldset>
							 

							<div class="form-group">
								<label class="col-sm-4 control-label">Gym</label>
								<div class="col-sm-8">
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('gym', '1','',['v-on:click' => 'methodGym','v-model' => 'inpGym']) !!}

										<label for="profile">Yes</label>
									</div>
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('gym', '0','',['v-on:click' => 'methodGym','v-model' => 'inpGym']) !!}

										<label for="profile">No</label>
									</div>
									 
									 
								</div>
							</div> 


							<div class="form-group">
								<label class="col-sm-4 control-label">Parking</label>
								<div class="col-sm-8">
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('parking', '1','',['v-on:click' => 'methodParking','v-model' => 'inpParking']) !!}

										<label for="profile">Yes</label>
									</div>
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('parking', '0','',['v-on:click' => 'methodParking','v-model' => 'inpParking']) !!}

										<label for="profile">No</label>
									</div>
									 
									 
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label">Swimming Pool</label>
								<div class="col-sm-8">
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('swimmingpool', '1','',['v-on:click' => 'methodSwimmingpool','v-model' => 'inpSwimmingpool']) !!}

										<label for="profile">Yes</label>
									</div>
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('swimmingpool', '0','',['v-on:click' => 'methodSwimmingpool','v-model' => 'inpSwimmingpool']) !!}

										<label for="profile">No</label>
									</div>
									 
									 
								</div>
							</div>


							<div class="form-group">
								<label class="col-sm-4 control-label">Power Backup</label>
								<div class="col-sm-8">
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('powerbackup', '1','',['v-on:click' => 'methodPowerbackup','v-model' => 'inpPowerbackup']) !!}

										<label for="profile">Yes</label>
									</div>
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('powerbackup', '0','',['v-on:click' => 'methodPowerbackup','v-model' => 'inpPowerbackup']) !!}

										<label for="profile">No</label>
									</div>
									 
									 
								</div>
							</div>
  
  						<div class="form-group">
								<label class="col-sm-4 control-label">Bar</label>
								<div class="col-sm-8">
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('bar', '1','',['v-on:click' => 'methodBar','v-model' => 'inpBar']) !!}

										<label for="profile">Yes</label>
									</div>
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('bar', '0','',['v-on:click' => 'methodBar','v-model' => 'inpBar']) !!}

										<label for="profile">No</label>
									</div>
									 
									 
								</div>
							</div>
 


							<div class="form-group">
								<label class="col-sm-4 control-label">Conference Room</label>
								<div class="col-sm-8">
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('conferenceroom', '1','',['v-on:click' => 'methodConferenceroom','v-model' => 'inpConferenceroom']) !!}

										<label for="profile">Yes</label>
									</div>
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('conferenceroom', '0','',['v-on:click' => 'methodConferenceroom','v-model' => 'inpConferenceroom']) !!}

										<label for="profile">No</label>
									</div>
									 
									 
								</div>
							</div>


							<div class="form-group">
								<label class="col-sm-4 control-label">Laundry</label>
								<div class="col-sm-8">
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('laundry', '1','',['v-on:click' => 'methodLaundry','v-model' => 'inpLaundry']) !!}

										<label for="profile">Yes</label>
									</div>
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('laundry', '0','',['v-on:click' => 'methodLaundry','v-model' => 'inpLaundry']) !!}

										<label for="profile">No</label>
									</div>
									 
									 
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label">Wheel Chair</label>
								<div class="col-sm-8">
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('wheelchair', '1','',['v-on:click' => 'methodWheelchair','v-model' => 'inpWheelchair']) !!}

										<label for="profile">Yes</label>
									</div>
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('wheelchair', '0','',['v-on:click' => 'methodWheelchair','v-model' => 'inpWheelchair']) !!}

										<label for="profile">No</label>
									</div>
									 
									 
								</div>
							</div>


							<div class="form-group">
								<label class="col-sm-4 control-label">Card Accepted</label>
								<div class="col-sm-8">
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('cardaccepted', '1','',['v-on:click' => 'methodCardaccepted','v-model' => 'inpCardaccepted']) !!}

										<label for="profile">Yes</label>
									</div>
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('cardaccepted', '0','',['v-on:click' => 'methodCardaccepted','v-model' => 'inpCardaccepted']) !!}

										<label for="profile">No</label>
									</div>
									 
									 
								</div>
							</div>
 


							<div class="form-group">
								<label class="col-sm-4 control-label">CCTV</label>
								<div class="col-sm-8">
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('cctv', '1','',['v-on:click' => 'methodCctv','v-model' => 'inpCctv']) !!}

										<label for="profile">Yes</label>
									</div>
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('cctv', '0','',['v-on:click' => 'methodCctv','v-model' => 'inpCctv']) !!}

										<label for="profile">No</label>
									</div>
									 
									 
								</div>
							</div>


							<div class="form-group">
								<label class="col-sm-4 control-label">Free Wifi</label>
								<div class="col-sm-8">
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('freewifi', '1','',['v-on:click' => 'methodFreewifi','v-model' => 'inpFreewifi']) !!}

										<label for="profile">Yes</label>
									</div>
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('freewifi', '0','',['v-on:click' => 'methodFreewifi','v-model' => 'inpFreewifi']) !!}

										<label for="profile">No</label>
									</div>
									 
									 
								</div>
							</div>   

							<div class="form-group">
								<label class="col-sm-4 control-label">Dining Area</label>
								<div class="col-sm-8">
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('diningarea', '1','',['v-on:click' => 'methodDiningarea','v-model' => 'inpDiningarea']) !!}

										<label for="profile">Yes</label>
									</div>
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('diningarea', '0','',['v-on:click' => 'methodDiningarea','v-model' => 'inpDiningarea']) !!}

										<label for="profile">No</label>
									</div>
									 
									 
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label">Banquet Area</label>
								<div class="col-sm-8">
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('banquetarea', '1','',['v-on:click' => 'methodBanquetarea','v-model' => 'inpBanquetarea']) !!}

										<label for="profile">Yes</label>
									</div>
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('banquetarea', '0','',['v-on:click' => 'methodBanquetarea','v-model' => 'inpBanquetarea']) !!}

										<label for="profile">No</label>
									</div>
									 
									 
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label">Elevator</label>
								<div class="col-sm-8">
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('elevator', '1','',['v-on:click' => 'methodElevator','v-model' => 'inpElevator']) !!}

										<label for="profile">Yes</label>
									</div>
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('elevator', '0','',['v-on:click' => 'methodElevator','v-model' => 'inpElevator']) !!}

										<label for="profile">No</label>
									</div>
									 
									 
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label">Pet Friendly</label>
								<div class="col-sm-8">
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('petfriendly', '1','',['v-on:click' => 'methodPetfriendly','v-model' => 'inpPetfriendly']) !!}

										<label for="profile">Yes</label>
									</div>
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('petfriendly', '0','',['v-on:click' => 'methodPetfriendly','v-model' => 'inpPetfriendly']) !!}

										<label for="profile">No</label>
									</div>
									 
									 
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label">In-House Restaurant</label>
								<div class="col-sm-8">
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('inhouserestaurant', '1','',['v-on:click' => 'methodInhouserestaurant','v-model' => 'inpInhouserestaurant']) !!}

										<label for="profile">Yes</label>
									</div>
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('inhouserestaurant', '0','',['v-on:click' => 'methodGym','v-model' => 'inpInhouserestaurant']) !!}

										<label for="profile">No</label>
									</div>
									 
									 
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label">Airport Shuttle</label>
								<div class="col-sm-8">
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('airportshuttle', '1','',['v-on:click' => 'methodAirportshuttle','v-model' => 'inpAirportshuttle']) !!}

										<label for="profile">Yes</label>
									</div>
									<div class="radio-custom radio-primary radio-inline">
										
										{!!  Form::radio('airportshuttle', '0','',['v-on:click' => 'methodAirportshuttle','v-model' => 'inpAirportshuttle']) !!}

										<label for="profile">No</label>
									</div>
									 
									 
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
				<div id="rules" class="tab-pane">

					 
						 
				</div>
				<div id="location" class="tab-pane">

					
						 
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
			inpName : "{!! $hotel->name !!}", 
			inpEmail1 : "{!! $hotel->email1 !!}", 
			inpEmail2 : "{!! $hotel->email2 !!}", 
			inpEmail3 : "{!! $hotel->email3 !!}", 
			inpPhone1 : "{!! $hotel->phone1 !!}",
			inpPhone2 : "{!! $hotel->phone2 !!}",
			inpPhone3 : "{!! $hotel->phone3 !!}",
			inpCity : "{!! $hotel->city !!}",
			inpAddress : "{!! $hotel->address !!}",
			inpDetails : "{!! $hotel->details !!}",

			inpCountry : "",
			inpCompany : "",
			inpRole : "",
			inpDesignation : "",
			inpWhatsapp : "",
			inpFacebook : "",
			inpTwitter : "",
			inpLinkedin : "",
			inpUpdatestatus : "",
			allStatuses : [],
			allStatus : "",

			inpGym : "{!! $hotel->gym !!}",
			inpParking : "{!! $hotel->parking !!}",
			inpSwimmingpool : "{!! $hotel->swimmingpool !!}",
			inpPowerbackup : "{!! $hotel->powerbackup !!}",
			inpBar : "{!! $hotel->bar !!}",
			inpConferenceroom : "{!! $hotel->conferenceroom !!}",
			inpLaundry : "{!! $hotel->laundry !!}",
			inpWheelchair : "{!! $hotel->wheelchair !!}",
			inpCardaccepted : "{!! $hotel->cardaccepted !!}",
			inpCctv : "{!! $hotel->cctv !!}",
			inpFreewifi : "{!! $hotel->freewifi !!}",
			inpDiningarea : "{!! $hotel->diningarea !!}",
			inpBanquetarea : "{!! $hotel->banquetarea !!}",
			inpElevator : "{!! $hotel->elevator !!}",
			inpPetfriendly : "{!! $hotel->petfriendly !!}",
			inpInhouserestaurant : "{!! $hotel->inhouserestaurant !!}",
			inpAirportshuttle : "{!! $hotel->airportshuttle !!}",
			
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

			methodGym:function(){  

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

			methodName:function(){  

				axios.get('/hotel/edit' ,{

					params: {

						param: 'name',
				      	val: this.inpName,
				    }

				})
				.then(function(response){
					this.inpName = response.data;

					toastr.options = {
			            
			            "timeOut": "1000",
			        };

					toastr.success('Hotel Name is Saved!!',{ fadeAway: 1 });

				});
			},
			methodEmail1:function(){  

				axios.get('/hotel/edit' ,{

					params: {

						param: 'email1',
				      	val: this.inpEmail1,
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
			methodEmail2:function(){  

				axios.get('/hotel/edit' ,{

					params: {

						param: 'email2',
				      	val: this.inpEmail2,
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
			methodEmail3:function(){  

				axios.get('/hotel/edit' ,{

					params: {

						param: 'email3',
				      	val: this.inpEmail3,
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
			methodPhone1:function(){ 

				axios.get('/hotel/edit' ,{

					params: {
				      
				      param: 'phone1',
				      val: this.inpPhone1,

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
			methodPhone2:function(){ 

				axios.get('/hotel/edit' ,{

					params: {
				      
				      param: 'phone2',
				      val: this.inpPhone1,

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
			methodPhone3:function(){ 

				axios.get('/hotel/edit' ,{

					params: {
				      
				      param: 'phone3',
				      val: this.inpPhone3,

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

				axios.get('/hotel/edit' ,{

					params: {
				      param: 'city',
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
			methodAddress:function(){ 

				axios.get('/hotel/edit' ,{

					params: {
				      param: 'address',
				      val: this.inpAddress,
				    }

				})
				.then(function(response){
					this.inpCity = response.data;

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Address is now Saved!!');
					
				});
			},
			methodDetails:function(){ 

				axios.get('/hotel/edit' ,{

					params: {
				      param: 'details',
				      val: this.inpDetails,
				    }

				})
				.then(function(response){
					this.inpCity = response.data;

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Details are now Saved!!');
					
				});
			},

			methodGym:function(){ 

				axios.get('/hotel/edit' ,{

					params: {
				      param: 'gym',
				      val: this.inpGym,
				    }

				})
				.then(function(response){ 

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Gym Detail is now Saved!!');
					
				});
			},
			methodParking:function(){ 

				axios.get('/hotel/edit' ,{

					params: {
				      param: 'parking',
				      val: this.inpParking,
				    }

				})
				.then(function(response){ 

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Parking Detail is now Saved!!');
					
				});
			},

			methodSwimmingpool:function(){ 

				axios.get('/hotel/edit' ,{

					params: {
				      param: 'swimmingpool',
				      val: this.inpSwimmingpool,
				    }

				})
				.then(function(response){ 

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Parking Detail is now Saved!!');
					
				});
			},

			methodPowerbackup:function(){ 

				axios.get('/hotel/edit' ,{

					params: {
				      param: 'powerbackup',
				      val: this.inpPowerbackup,
				    }

				})
				.then(function(response){ 

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Parking Detail is now Saved!!');
					
				});
			},
			methodBar:function(){ 

				axios.get('/hotel/edit' ,{

					params: {
				      param: 'bar',
				      val: this.inpBar,
				    }

				})
				.then(function(response){ 

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Parking Detail is now Saved!!');
					
				});
			},
			methodConferenceroom:function(){ 

				axios.get('/hotel/edit' ,{

					params: {
				      param: 'conferenceroom',
				      val: this.inpConferenceroom,
				    }

				})
				.then(function(response){ 

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Parking Detail is now Saved!!');
					
				});
			},
			methodLaundry:function(){ 

				axios.get('/hotel/edit' ,{

					params: {
				      param: 'laundry',
				      val: this.inpLaundry,
				    }

				})
				.then(function(response){ 

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Parking Detail is now Saved!!');
					
				});
			},
			methodWheelchair:function(){ 

				axios.get('/hotel/edit' ,{

					params: {
				      param: 'wheelchair',
				      val: this.inpWheelchair,
				    }

				})
				.then(function(response){ 

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Parking Detail is now Saved!!');
					
				});
			},
			methodCardaccepted:function(){ 

				axios.get('/hotel/edit' ,{

					params: {
				      param: 'cardaccepted',
				      val: this.inpCardaccepted,
				    }

				})
				.then(function(response){ 

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Parking Detail is now Saved!!');
					
				});
			},
			methodCctv:function(){ 

				axios.get('/hotel/edit' ,{

					params: {
				      param: 'cctv',
				      val: this.inpCctv,
				    }

				})
				.then(function(response){ 

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Parking Detail is now Saved!!');
					
				});
			},
			methodFreewifi:function(){ 

				axios.get('/hotel/edit' ,{

					params: {
				      param: 'freewifi',
				      val: this.inpFreewifi,
				    }

				})
				.then(function(response){ 

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Parking Detail is now Saved!!');
					
				});
			},
			methodDiningarea:function(){ 

				axios.get('/hotel/edit' ,{

					params: {
				      param: 'diningarea',
				      val: this.inpDiningarea,
				    }

				})
				.then(function(response){ 

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Parking Detail is now Saved!!');
					
				});
			},
			methodBanquetarea:function(){ 

				axios.get('/hotel/edit' ,{

					params: {
				      param: 'banquetarea',
				      val: this.inpBanquetarea,
				    }

				})
				.then(function(response){ 

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Parking Detail is now Saved!!');
					
				});
			},
			methodElevator:function(){ 

				axios.get('/hotel/edit' ,{

					params: {
				      param: 'elevator',
				      val: this.inpElevator,
				    }

				})
				.then(function(response){ 

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Parking Detail is now Saved!!');
					
				});
			},
			methodPetfriendly:function(){ 

				axios.get('/hotel/edit' ,{

					params: {
				      param: 'petfriendly',
				      val: this.inpPetfriendly,
				    }

				})
				.then(function(response){ 

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Parking Detail is now Saved!!');
					
				});
			},
			methodInhouserestaurant:function(){ 

				axios.get('/hotel/edit' ,{

					params: {
				      param: 'inhouserestaurant',
				      val: this.inpInhouserestaurant,
				    }

				})
				.then(function(response){ 

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Parking Detail is now Saved!!');
					
				});
			},
			methodAirportshuttle:function(){ 

				axios.get('/hotel/edit' ,{

					params: {
				      param: 'airportshuttle',
				      val: this.inpAirportshuttle,
				    }

				})
				.then(function(response){ 

					toastr.options = {
			            
			            "timeOut": "1000",
			        };
					toastr.success('Parking Detail is now Saved!!');
					
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
