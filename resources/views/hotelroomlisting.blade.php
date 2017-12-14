@extends('layouts.mr.manage')

@section('formname')

<h2>Hotel Rooms</h2>

@stop

@section('breadcrump')

<a href="/mr/profile">Hotel Rooms</a>

@stop

@section('content_pagecss')
	<link rel="stylesheet" href="/admin/assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />	
@stop
@section('content_pagejs')

  <script src="/admin/assets/vendor/autosize/autosize.js"></script>


  <script src="/admin/assets/vendor/jquery-validation/jquery.validate.js"></script>
	<script src="/admin/assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
	<script src="/admin/assets/vendor/pnotify/pnotify.custom.js"></script>

	<script src="/admin/assets/vendor/bootstrap-timepicker/bootstrap-timepicker.js"></script>

	<script src="/js/examples.wizard.js"></script>

@stop

 
@section('content_page')
  <link rel="stylesheet" href="/admin/assets/vendor/pnotify/pnotify.custom.css" />
<style>
	[v-cloak] {
	  display: none;
	}
</style>
<div id="listing">
	<div class="row">
		<div class="col">
			<section class="card form-wizard" id="w4">
				<header class="card-header">
					<div class="card-actions">
						<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
						<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
					</div>
	
				</header>
				<div class="card-body">
					<div class="wizard-progress wizard-progress-lg">
						<div class="steps-progress">
							<div class="progress-indicator"></div>
						</div>
						<ul class="nav wizard-steps">
							<li class="nav-item active">
								<a class="nav-link" href="#w4-account" data-toggle="tab"><span>1</span>Room Details</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#w4-profile" data-toggle="tab"><span>2</span>Listing Details</a>
							</li> 
						</ul>
					</div>
	
					<form id="frmListing" class="form-horizontal p-3" novalidate="novalidate"  >
						<div class="tab-content">
							<div id="w4-account" class="tab-pane active">
								 

									<div class="form-group">
										<label class="col-md-2 control-label" for="textareaDefault"><strong>Room Nos.</strong></label>

										<div class="col-md-4 form-inline">
											<label><b>Room No</b></label>

											<input type="text" id="room_nos" class="form-control"  value="{{ $hotelrooms->room_nos }}">
											<p v-if="error_newroomnos" class="text-danger">@{{ message_newroomnos }}</p>

										</div>

										<div class="col-md-4  form-inline">
											<label><b>Floor</b></label>

											<input type="text" id="floor" class="form-control" 
												value="{{ $hotelrooms->floor }}">
											<p v-if="error_newfloor" class="text-danger">@{{ message_newfloor }}</p>

										</div>

									</div> 


									<div class="form-group">
										<label class="col-md-2 control-label" for="textareaDefault"><strong>Maximum People</strong></label>

										<div class="col-md-4 form-inline">
											<label><b>Adults&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>

											<input type="text" name="adults" class="form-control" value="{{ $hotelrooms->adults }}" >
											<p v-if="error_newtopic" class="text-danger">@{{ message_newtopic }}</p>

										</div>

										<div class="col-md-4  form-inline">
											<label><b>Kids&nbsp;&nbsp;</b></label>

											<input type="text" name="kids" class="form-control" value="{{ $hotelrooms->kids }}">
											<p v-if="error_newtopic" class="text-danger">@{{ message_newtopic }}</p>

										</div>

									</div> 

									<br>

									<div class="form-group">
										<label class="col-md-2 control-label" for="textareaDefault"><strong>Room Type</strong></label>
										<div class="col-md-7">
											
											<input type="text" name="roomtype" class="form-control" value="{{ $hotelrooms->name }}" >
											<p v-if="error_newtopic" class="text-danger">@{{ message_newtopic }}</p>

										</div>
									</div> 

									<div class="form-group">
										<label class="col-md-2 control-label" for="textareaDefault"><strong>Bed Type</strong></label>
										<div class="col-md-7">
											
											<input type="text" name="bedtype" class="form-control" value="{{ $hotelrooms->beds }}" >
											<p v-if="error_newtopic" class="text-danger">@{{ message_newtopic }}</p>

										</div>
									</div> 

									<div class="form-group">
										<label class="col-md-2 control-label" for="textareaDefault"><strong>Amenities</strong></label>
										<div class="col-md-9"> 
											<label class="col-md-3"><b>AC</b></label>
											<label class="radio-inline">
											  <input type="radio" name="ac" value="1" v-model="inpAc"> Yes
											</label>
											<label class="radio-inline">
											  <input type="radio" name="ac" value="0" v-model="inpAc"> No
											</label> 
											<p v-if="error_newtype" class="text-danger">@{{ message_newtype }}</p>
										</div>

									</div>

									<div class="form-group">
										<label class="col-md-2 control-label" for="textareaDefault"><strong>&nbsp;</strong></label>
										<div class="col-md-9"> 
											<label class="col-md-3"><b>TV</b></label>
											<label class="radio-inline">
											  <input type="radio" name="tv" value="1" v-model="inpTv"> Yes
											</label>
											<label class="radio-inline">
											  <input type="radio" name="tv" value="0" v-model="inpTv"> No
											</label> 
											<p v-if="error_newtype" class="text-danger">@{{ message_newtype }}</p>
										</div>

									</div>

									<div class="form-group">
										<label class="col-md-2 control-label" for="textareaDefault"><strong>&nbsp;</strong></label>
										<div class="col-md-9"> 
											<label class="col-md-3"><b>Free Breakfast</b></label>
											<label class="radio-inline">
											  <input type="radio" name="freebreakfast" value="1" v-model="inpFreebreakfast"> Yes
											</label>
											<label class="radio-inline">
											  <input type="radio" name="freebreakfast" value="0" v-model="inpFreebreakfast"> No
											</label> 
											<p v-if="error_newtype" class="text-danger">@{{ message_newtype }}</p>
										</div>

									</div>

									<div class="form-group">
										<label class="col-md-2 control-label" for="textareaDefault"><strong>&nbsp;</strong></label>
										<div class="col-md-9"> 
											<label class="col-md-3"><b>In Room Safe</b></label>
											<label class="radio-inline">
											  <input type="radio" name="inroomsafe" value="1" v-model="inpInroomsafe"> Yes
											</label>
											<label class="radio-inline">
											  <input type="radio" name="inroomsafe" value="0" v-model="inpInroomsafe"> No
											</label> 
											<p v-if="error_newtype" class="text-danger">@{{ message_newtype }}</p>
										</div>

									</div>

									<div class="form-group">
										<label class="col-md-2 control-label" for="textareaDefault"><strong>&nbsp;</strong></label>
										<div class="col-md-9"> 
											<label class="col-md-3"><b>Mini Fridge</b></label>
											<label class="radio-inline">
											  <input type="radio" name="minifridge" value="1" v-model="inpMinifridge"> Yes
											</label>
											<label class="radio-inline">
											  <input type="radio" name="minifridge" value="0" v-model="inpMinifridge"> No
											</label> 
											<p v-if="error_newtype" class="text-danger">@{{ message_newtype }}</p>
										</div>

									</div>

									<div class="form-group">
										<label class="col-md-2 control-label" for="textareaDefault"><strong>&nbsp;</strong></label>
										<div class="col-md-9"> 
											<label class="col-md-3"><b>Room Heater</b></label>
											<label class="radio-inline">
											  <input type="radio" name="roomheater" value="1" v-model="inpRoomheater"> Yes
											</label>
											<label class="radio-inline">
											  <input type="radio" name="roomheater" value="0" v-model="inpRoomheater"> No
											</label> 
											<p v-if="error_newtype" class="text-danger">@{{ message_newtype }}</p>
										</div>

									</div>

									<div class="form-group">
										<label class="col-md-2 control-label" for="textareaDefault"><strong>&nbsp;</strong></label>
										<div class="col-md-9"> 
											<label class="col-md-3"><b>Tea Maker</b></label>
											<label class="radio-inline">
											  <input type="radio" name="teamaker" value="1" v-model="inpTeamaker"> Yes
											</label>
											<label class="radio-inline">
											  <input type="radio" name="teamaker" value="0" v-model="inpTeamaker"> No
											</label> 
											<p v-if="error_newtype" class="text-danger">@{{ message_newtype }}</p>
										</div>

									</div>

									<div class="form-group">
										<label class="col-md-2 control-label" for="textareaDefault"><strong>&nbsp;</strong></label>
										<div class="col-md-9"> 
											<label class="col-md-3"><b>Free Bottled Water</b></label>
											<label class="radio-inline">
											  <input type="radio" name="freewater" value="1" v-model="inpFreewater"> Yes
											</label>
											<label class="radio-inline">
											  <input type="radio" name="freewater" value="0" v-model="inpFreewater"> No
											</label> 
											<p v-if="error_newtype" class="text-danger">@{{ message_newtype }}</p>
										</div>

									</div>

									<div class="form-group">
										<label class="col-md-2 control-label" for="textareaDefault"><strong>&nbsp;</strong></label>
										<div class="col-md-9"> 
											<label class="col-md-3"><b>Attached Bathroom</b></label>
											<label class="radio-inline">
											  <input type="radio" name="bathroom" value="1" v-model="inpBathroom"> Yes
											</label>
											<label class="radio-inline">
											  <input type="radio" name="bathroom" value="0" v-model="inpBathroom"> No
											</label> 
											<p v-if="error_newtype" class="text-danger">@{{ message_newtype }}</p>
										</div>

									</div>
		 

									<div class="form-group">
										<label class="col-md-2 control-label" for="textareaDefault"><strong>Other Amenities</strong></label>
										<div class="col-md-9"> 
											<label class="col-md-2"><b>Amenity 1</b></label>
											
											<div class="col-md-7">
											
											<input type="text" name="amenity1" class="form-control" v-model="inpAmenity1" >
											<p v-if="error_newtopic" class="text-danger">@{{ message_newtopic }}</p>

										</div>
										</div>

									</div>

									<div class="form-group">
										<label class="col-md-2 control-label" for="textareaDefault"><strong>&nbsp;</strong></label>
										<div class="col-md-9"> 
											<label class="col-md-2"><b>Amenity 2</b></label>
											
											<div class="col-md-7">
											
											<input type="text" name="amenity1" class="form-control" v-model="inpAmenity2" >
											<p v-if="error_newtopic" class="text-danger">@{{ message_newtopic }}</p>

										</div>
										</div>

									</div>

									<div class="form-group">
										<label class="col-md-2 control-label" for="textareaDefault"><strong>&nbsp;</strong></label>
										<div class="col-md-9"> 
											<label class="col-md-2"><b>Amenity 3</b></label>
											
											<div class="col-md-7">
											
											<input type="text" name="amenity3" class="form-control" v-model="inpAmenity3" >
											<p v-if="error_newtopic" class="text-danger">@{{ message_newtopic }}</p>

										</div>
										</div>

									</div>

									<div class="form-group">
										<label class="col-md-2 control-label" for="textareaDefault"><strong>&nbsp;</strong></label>
										<div class="col-md-9"> 
											<label class="col-md-2"><b>Amenity 4</b></label>
											
											<div class="col-md-7">
											
											<input type="text" name="amenity4" class="form-control" v-model="inpAmenity4" >
											<p v-if="error_newtopic" class="text-danger">@{{ message_newtopic }}</p>

										</div>
										</div>

									</div>

									<div class="form-group">
										<label class="col-md-2 control-label" for="textareaDefault"><strong>&nbsp;</strong></label>
										<div class="col-md-9"> 
											<label class="col-md-2"><b>Amenity 5</b></label>
											
											<div class="col-md-7">
											
											<input type="text" name="amenity5" class="form-control" v-model="inpAmenity5" >
											<p v-if="error_newtopic" class="text-danger">@{{ message_newtopic }}</p>

										</div>
										</div>

									</div>  

									<div class="form-group center">	
										<button type="button" class="btn btn-primary" @click="saveroom">Save</button> 
									</div>
								 
							</div>
							<div id="w4-profile" class="tab-pane">
								<div class="form-group row">

									<div class="col-lg-3">
										<div  data-plugin-datepicker data-plugin-skin="primary">
											<input type="text"  id="pickeddate" hidden=""  >
										</div>
									</div>

									<div class="col-lg-2">
										<label style="margin-top: 50px;">Check in Time</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-clock-o"></i>
											</span>
											<input type="text" name="checkindate" data-plugin-timepicker class="form-control">
										</div>
										<br>
										<label>Check out Time</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-clock-o"></i>
											</span>
											<input type="text" name="checkoutdate" data-plugin-timepicker class="form-control">
										</div>
									</div>
									<div class="col-lg-2 " style="margin-top: 90px;">
										<label class="text-center">Rates ( in Rs.)</label>	
										<input class="form-control"  name="rates" />

									</div>

									<div class="col-lg-5  " style="height: 110px;">
 

										<button class="btn btn-primary col-lg-offset-1" style="margin-top: 120px;" type="submit" name="sbm">Submit</button> 


									</div>
  			
									 
								</div> 
							</div>


						</div>
					</form>
				</div>
				<div class="card-footer">
					<ul class="pager">
						<li class="previous disabled">
							<a><i class="fa fa-angle-left"></i> Previous</a>
						</li>
						<li class="finish hidden float-right">
							<a>Finish</a>
						</li>
						<li class="next">
							<a>Next <i class="fa fa-angle-right"></i></a>
						</li>
					</ul>
				</div>
			</section>
		</div>
	</div> 
</div>
 

<script>
	
	new Vue({
		el: '#listing',
		data: {

			showNew : false,
			showMy : true,
			showEdit : false, 
			showTopic : false,
			inpTopic : "",
			inpRoomnos: "{!! $hotelrooms->room_nos !!}",
			inpFloor: "",
			inpAdults: "",
			inpKids: "",
			inpRoomtype : "",
			inpCategory: "",
			inpId : "",
			inpKey : "",

			inpPickeddate:"",

			inpDetails : "",
			inpType: "",
			inpCategory : "",
			inpBedtype: "",
			inpAc:"",
			inpTv:"",
			inpFreebreakfast:"",
			inpInroomsafe:"",
			inpMinifridge:"",
			inpRoomheater:"",
			inpTeamaker:"",
			inpFreewater:"",
			inpBathroom:"",
			inpAmenity1:"",
			inpAmenity2:"",
			inpAmenity3:"",
			inpAmenity4:"",
			inpAmenity5:"",
			listTopics : [],
			myTopics : [],
			myRoom : "",
			myRooms : [],
			myTopic : "",
			topicid : "", 
			inpComment : "",
			inpPostId : "",
			allComments : [],
			allComment : "",
			error_newtopic : false,
			message_newtopic : "Please enter topic name",
			error_newtype : false,
			message_newtype : "Please select a type",
			error_edittopic : false,
			message_edittopic : "Please enter topic name",
			error_edittype : false,
			message_edittype : "Please select a type",

			error_newroomnos : false,
			message_newroomnos : "Please enter topic name",
			error_newfloor : false,
			message_newfloor : "Please select a type",

			error_roomtype  : false,
			message_roomtype : "Please enter topic name",
			error_bedtype : false,
			message_bedtype : "Please enter Bed type",


			msg1: 'List this Room',
			msg2: 'Edit',
			msg3: 'Delete',
			msg4: 'Share',
			confirmed: "", 
			showSpinner : true,
			showContent : false,

		},
		mounted :function(){

				

		},
		methods: { 

			saveroom:function(e){  
				e.preventDefault();	

				this.error_newroomnos = false;
				this.error_newfloor = false;
				
				if(! this.inpRoomnos){

					this.error_newroomnos = true;

				}
				if(! this.inpFloor){

					this.error_newfloor = true;

				}
				if(( this.inpRoomnos) &&  ( this.inpFloor) ){

					axios.get('/hotel/rooms/save' ,{
						params: {
					      room_nos: this.inpRoomnos,
					      floor: this.inpFloor,
					      adults: this.inpAdults,
					      kids: this.inpKids,
					      roomtype: this.inpRoomtype,
					      bedtype: this.inpBedtype,
					      ac: this.inpAc,
					      tv: this.inpTv,
					      inroomsafe: this.inpInroomsafe,
					      freebreakfast: this.inpFreebreakfast,
					      minifridge: this.inpMinifridge,
					      roomheater: this.inpRoomheater,
					      teamaker: this.inpTeamaker,
					      freewater: this.inpFreewater,
					      attachedbathroom: this.inpBathroom,
					      amenities1: this.inpAmenity1,
					      amenities2: this.inpAmenity2,
					      amenities3: this.inpAmenity3,
					      amenities4: this.inpAmenity4,
					      amenities5: this.inpAmenity5, 

					      details: this.inpDetails,
					    }

					})
					.then(response => {

						this.myRooms.unshift({

							name : response.data.name,
							room_nos : response.data.room_nos,
							floor : response.data.floor, 
							adults: response.data.adults,
							kids: response.data.kids,
							bedtype: response.data.beds,
							ac: response.data.ac,
							tv: response.data.tv,
							freebreakfast: response.data.freebreakfast,
							inroomsafe: response.data.inroomsafe,
							minifridge: response.data.minifridge,
							roomheater: response.data.roomheater,
							teamaker: response.data.teamaker,
							freewater: response.data.freewater,
							attachedbathroom: response.data.bathroom,
							amenity1: response.data.amenities1,
							amenity2: response.data.amenities2,
							amenity3: response.data.amenities3,
							amenity4: response.data.amenities4,
							amenity5: response.data.amenities5,

							id : response.data.id,
							key : response.data.key,

						});

						this.showNew = false;
						this.showEdit = false; 
						this.showMy = true; 
						this.inpTopic = "";
						this.inpType = "";
						this.inpId = "";
						this.inpKey = "";
						this.inpDetails = "";

						toastr.options = {
					            
					            "timeOut": "1000",
					        };

							toastr.info('New Topic is Saved!!',{ fadeAway: 1 });								
					});

				}			
 
			},   

		},
	});

</script> 


<script>
	
	$(document).ready(function() {

		$('#frmListing').submit(function(event) {

			event.preventDefault();

			$val = $('#room_nos').val(); 

			let room_nos = $('#inpRoomnos').val();
		    let floor = $('#inpFloor').val();
		    let adults = $('#inpAdults').val();
		    let kids = $('#inpKids').val();
		    let roomtype = $('#inpRoomtype').val();
		    let bedtype = $('#inpBedtype').val();
		    let ac = $('#inpAc').val();
		    let tv = $('#inpTv').val();
		    let inroomsafe = $('#inpInroomsafe').val();
		    let freebreakfast = $('#inpFreebreakfast').val();
		    let minifridge = $('#inpMinifridge').val();
		    let roomheater = $('#inpRoomheater').val();
		    let teamaker = $('#inpTeamaker').val();
		    let freewater = $('#inpFreewater').val();
		    let attachedbathroom = $('#inpBathroom').val();
		    let amenities1 = $('#inpAmenity1').val();
		    let amenities2 = $('#inpAmenity2').val();
		    let amenities3 = $('#inpAmenity3').val();
		    let amenities4 = $('#inpAmenity4').val();
		    let amenities5 = $('#inpAmenity5,').val();


			axios.get('/listing/save' ,{
				params: {
			      room_nos: $room_nos, 
			      floor: $floor,		      
			      adults: $adults,
			      kids: $kids,
			      roomtype: $roomtype,
			      bedtype: $bedtype,
			      ac: $ac,
			      tv: $tv,
			      inroomsafe: $inroomsafe,
			      freebreakfast: $freebreakfast,
			      minifridge: $minifridge,
			      roomheater: $roomheater,
			      teamaker: $teamaker,
			      freewater: $freewater,
			      attachedbathroom: $attachedbathroom,
			      amenities1: $amenities1,
			      amenities2: $amenities2,
			      amenities3: $amenities3,
			      amenities4: $amenities4,
			      amenities5: $amenities5, 
			    }
			})
			.then(response => {

				toastr.options = {
			            
			            "timeOut": "1000",
			        };

					toastr.success('New Topic is Saved!!',{ fadeAway: 1 });								
			});



		});

	});


</script>
 
@stop
