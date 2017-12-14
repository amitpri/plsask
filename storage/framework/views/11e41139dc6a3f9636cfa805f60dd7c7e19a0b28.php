<?php $__env->startSection('formname'); ?>

<h2>Hotel Rooms</h2>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrump'); ?>

<a href="/mr/profile">Hotel Rooms</a>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_pagejs'); ?>

  <script src="/admin/assets/vendor/autosize/autosize.js"></script>

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
<div class="row" id="rooms">

	<div v-show="showSpinner" class="text-center"><img src="/images/ajax_loader.gif"></div>

	<div v-show="showContent">

		<div   class="col-lg-12 col-md-12" >

			<section class="panel">
				<header class="panel-heading panel-heading-transparent">
				
					<button class="btn btn-default" @click="showMyTopic">Hotel Rooms</button>				
					<button class="btn btn-default" @click="showNewTopic">Add New Room</button>

				</header>

				<div v-if="showNew" class="panel-body" v-cloak>
					<div class="panel-actions">
						<a href="#" class="panel-action panel-action-dismiss" @click="showNewTopic"></a>
					</div>
					<h4 class="center text-color-light"><strong>Add new Room</strong></h4>

					<div class="panel-body">
						<form>

							<div class="form-group">
								<label class="col-md-2 control-label" for="textareaDefault"><strong>Room Nos.</strong></label>

								<div class="col-md-4 form-inline">
									<label><b>Room No</b></label>
									<input type="text" name="room_no" class="form-control" v-model="inpRoomnos" >
									<p v-if="error_newroomnos" class="text-danger">{{ message_newroomnos }}</p>
								</div>

								<div class="col-md-4  form-inline">
									<label><b>Floor</b></label>
									<input type="text" name="floor" class="form-control" v-model="inpFloor" >
									<p v-if="error_newfloor" class="text-danger">{{ message_newfloor }}</p>
								</div>
							</div> 


							<div class="form-group">
								<label class="col-md-2 control-label" for="textareaDefault"><strong>Maximum People</strong></label>

								<div class="col-md-4 form-inline">
									<label><b>Adults&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
									<input type="text" name="adults" class="form-control" v-model="inpAdults" >
									<p v-if="error_newtopic" class="text-danger">{{ message_adults }}</p>
								</div>

								<div class="col-md-4  form-inline">
									<label><b>Kids&nbsp;&nbsp;</b></label>
									<input type="text" name="kids" class="form-control" v-model="inpKids" >
									<p v-if="error_newtopic" class="text-danger">{{ message_kids }}</p>
								</div>

							</div> 

							<br>

							<div class="form-group">
								<label class="col-md-2 control-label" for="textareaDefault"><strong>Room Type</strong></label>

								<div class="col-md-7">								
									<input type="text" name="roomtype" class="form-control" v-model="inpRoomtype" >
									<p v-if="error_roomtype" class="text-danger">{{ message_roomtype }}</p>
								</div>
							</div> 

							<div class="form-group">
								<label class="col-md-2 control-label" for="textareaDefault"><strong>Bed Type</strong></label>

								<div class="col-md-7">									
									<input type="text" name="bedtype" class="form-control" v-model="inpBedtype" >
									<p v-if="error_bedtype" class="text-danger">{{ message_bedtype }}</p>
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
									<p v-if="error_newtype" class="text-danger">{{ message_newtype }}</p>
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
									<p v-if="error_newtype" class="text-danger">{{ message_newtype }}</p>
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
									<p v-if="error_newtype" class="text-danger">{{ message_newtype }}</p>
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
									<p v-if="error_newtype" class="text-danger">{{ message_newtype }}</p>
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
									<p v-if="error_newtype" class="text-danger">{{ message_newtype }}</p>
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
									<p v-if="error_newtype" class="text-danger">{{ message_newtype }}</p>
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
									<p v-if="error_newtype" class="text-danger">{{ message_newtype }}</p>
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
									<p v-if="error_newtype" class="text-danger">{{ message_newtype }}</p>
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
									<p v-if="error_newtype" class="text-danger">{{ message_newtype }}</p>
								</div>

							</div>
 

							<div class="form-group">
								<label class="col-md-2 control-label" for="textareaDefault"><strong>Other Amenities</strong></label>
								<div class="col-md-9"> 
									<label class="col-md-2"><b>Amenity 1</b></label>
									
									<div class="col-md-7">
									
									<input type="text" name="amenity1" class="form-control" v-model="inpAmenity1" >
									<p v-if="error_newtopic" class="text-danger">{{ message_newtopic }}</p>

								</div>
								</div>

							</div>

							<div class="form-group">
								<label class="col-md-2 control-label" for="textareaDefault"><strong>&nbsp;</strong></label>
								<div class="col-md-9"> 
									<label class="col-md-2"><b>Amenity 2</b></label>
									
									<div class="col-md-7">
									
									<input type="text" name="amenity2" class="form-control" v-model="inpAmenity2" >
									<p v-if="error_newtopic" class="text-danger">{{ message_newtopic }}</p>

								</div>
								</div>

							</div>

							<div class="form-group">
								<label class="col-md-2 control-label" for="textareaDefault"><strong>&nbsp;</strong></label>
								<div class="col-md-9"> 
									<label class="col-md-2"><b>Amenity 3</b></label>
									
									<div class="col-md-7">
									
									<input type="text" name="amenity3" class="form-control" v-model="inpAmenity3" >
									<p v-if="error_newtopic" class="text-danger">{{ message_newtopic }}</p>

								</div>
								</div>

							</div>

							<div class="form-group">
								<label class="col-md-2 control-label" for="textareaDefault"><strong>&nbsp;</strong></label>
								<div class="col-md-9"> 
									<label class="col-md-2"><b>Amenity 4</b></label>
									
									<div class="col-md-7">
									
									<input type="text" name="amenity4" class="form-control" v-model="inpAmenity4" >
									<p v-if="error_newtopic" class="text-danger">{{ message_newtopic }}</p>

								</div>
								</div>

							</div>

							<div class="form-group">
								<label class="col-md-2 control-label" for="textareaDefault"><strong>&nbsp;</strong></label>
								<div class="col-md-9"> 
									<label class="col-md-2"><b>Amenity 5</b></label>
									
									<div class="col-md-7">
									
									<input type="text" name="amenity5" class="form-control" v-model="inpAmenity5" >
									<p v-if="error_newtopic" class="text-danger">{{ message_newtopic }}</p>

								</div>
								</div>

							</div>
 						
									
							<div class="form-group">
								<label class="col-md-2 control-label"><strong>Details</strong></label>
								<div class="col-md-7">			  

									<textarea name="details" class="form-control" rows="10" v-model="inpDetails"></textarea>
												 										 
								</div>
							</div>	
							<div class="form-group center">	
								<button type="button" class="btn btn-primary" @click="saveroom">Save</button> 
							</div>
						</form>
					
					</div>

				</div> 

				<div v-if="showEdit" class="panel-body" v-cloak>

					<div class="panel-actions">

						<a href="#" class="panel-action panel-action-dismiss" @click="showEditTopic"></a>

					</div>

					<h4 class="center text-color-light"><strong>Edit Room Details</strong></h4>

					<div class="panel-body">

						<form>

							<div class="form-group">
								<label class="col-md-2 control-label" for="textareaDefault"><strong>Room Nos.</strong></label>

								<div class="col-md-4 form-inline">
									<label><b>Room No</b></label>
									<input type="text" name="room_nos" class="form-control" v-model="inpRoomnos" >
									<p v-if="error_newroomnos" class="text-danger">{{ message_newroomnos }}</p>

								</div>

								<div class="col-md-4  form-inline">
									<label><b>Floor</b></label>
									<input type="text" name="floor" class="form-control" v-model="inpFloor" >
									<p v-if="error_newfloor" class="text-danger">{{ message_newfloor }}</p>

								</div>

							</div> 


							<div class="form-group">
								<label class="col-md-2 control-label" for="textareaDefault"><strong>Maximum People</strong></label>


								<div class="col-md-4 form-inline">
									<label><b>Adults&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
									<input type="text" name="adults" class="form-control" v-model="inpAdults" >
									<p v-if="error_newtopic" class="text-danger">{{ message_newtopic }}</p>

								</div>

								<div class="col-md-4  form-inline">
									<label><b>Kids&nbsp;&nbsp;</b></label>
									<input type="text" name="kids" class="form-control" v-model="inpKids" >
									<p v-if="error_newtopic" class="text-danger">{{ message_newtopic }}</p>

								</div>

							</div> 

							<br>


							<div class="form-group">
								<label class="col-md-2 control-label" for="textareaDefault"><strong>Room Type</strong></label>
								<div class="col-md-7">
									
									<input type="text" name="roomtype" class="form-control" v-model="inpRoomtype" >
									<p v-if="error_newtopic" class="text-danger">{{ message_newtopic }}</p>

								</div>
							</div> 

							<div class="form-group">
								<label class="col-md-2 control-label" for="textareaDefault"><strong>Bed Type</strong></label>
								<div class="col-md-7">
									
									<input type="text" name="bedtype" class="form-control" v-model="inpBedtype" >
									<p v-if="error_newtopic" class="text-danger">{{ message_newtopic }}</p>

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
									<p v-if="error_newtype" class="text-danger">{{ message_newtype }}</p>
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
									<p v-if="error_newtype" class="text-danger">{{ message_newtype }}</p>
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
									<p v-if="error_newtype" class="text-danger">{{ message_newtype }}</p>
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
									<p v-if="error_newtype" class="text-danger">{{ message_newtype }}</p>
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
									<p v-if="error_newtype" class="text-danger">{{ message_newtype }}</p>
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
									<p v-if="error_newtype" class="text-danger">{{ message_newtype }}</p>
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
									<p v-if="error_newtype" class="text-danger">{{ message_newtype }}</p>
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
									<p v-if="error_newtype" class="text-danger">{{ message_newtype }}</p>
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
									<p v-if="error_newtype" class="text-danger">{{ message_newtype }}</p>
								</div>

							</div>
 

							<div class="form-group">
								<label class="col-md-2 control-label" for="textareaDefault"><strong>Other Amenities</strong></label>
								<div class="col-md-9"> 
									<label class="col-md-2"><b>Amenity 1</b></label>
									
									<div class="col-md-7">
									
									<input type="text" name="amenity1" class="form-control" v-model="inpAmenity1" >
									<p v-if="error_newtopic" class="text-danger">{{ message_newtopic }}</p>

								</div>
								</div>

							</div>

							<div class="form-group">
								<label class="col-md-2 control-label" for="textareaDefault"><strong>&nbsp;</strong></label>
								<div class="col-md-9"> 
									<label class="col-md-2"><b>Amenity 2</b></label>
									
									<div class="col-md-7">
									
									<input type="text" name="amenity1" class="form-control" v-model="inpAmenity2" >
									<p v-if="error_newtopic" class="text-danger">{{ message_newtopic }}</p>

								</div>
								</div>

							</div>

							<div class="form-group">
								<label class="col-md-2 control-label" for="textareaDefault"><strong>&nbsp;</strong></label>
								<div class="col-md-9"> 
									<label class="col-md-2"><b>Amenity 3</b></label>
									
									<div class="col-md-7">
									
									<input type="text" name="amenity3" class="form-control" v-model="inpAmenity3" >
									<p v-if="error_newtopic" class="text-danger">{{ message_newtopic }}</p>

								</div>
								</div>

							</div>

							<div class="form-group">
								<label class="col-md-2 control-label" for="textareaDefault"><strong>&nbsp;</strong></label>
								<div class="col-md-9"> 
									<label class="col-md-2"><b>Amenity 4</b></label>
									
									<div class="col-md-7">
									
									<input type="text" name="amenity4" class="form-control" v-model="inpAmenity4" >
									<p v-if="error_newtopic" class="text-danger">{{ message_newtopic }}</p>

								</div>
								</div>

							</div>

							<div class="form-group">
								<label class="col-md-2 control-label" for="textareaDefault"><strong>&nbsp;</strong></label>
								<div class="col-md-9"> 
									<label class="col-md-2"><b>Amenity 5</b></label>
									
									<div class="col-md-7">
									
									<input type="text" name="amenity5" class="form-control" v-model="inpAmenity5" >
									<p v-if="error_newtopic" class="text-danger">{{ message_newtopic }}</p>

								</div>
								</div>

							</div>
 						
									
							<div class="form-group">
								<label class="col-md-2 control-label"><strong>Details</strong></label>
								<div class="col-md-7">			  

									<textarea name="details" class="form-control" rows="10" v-model="inpDetails"></textarea>
												 										 
								</div>
							</div>	
							<div class="form-group center">	
								<button type="button" class="btn btn-primary" @click="saveroom">Save</button> 
							</div>
						</form>
					
					</div>

				</div>  
	 
				<h4 v-if="showMy && myRooms.length > 0" class="center text-color-light "><strong>Hotel Rooms</strong></h4>

				<div v-if="showMy && myRooms.length > 0" class="panel-body" v-cloak>

					<div class="panel-actions">
						<a href="#" class="panel-action panel-action-dismiss" @click="showMyTopic"></a>
					</div>

					<div class="table-responsive" >
						<table class="table table-striped mb-none">
							<thead>
								<tr>
									<th class="col-md-6">Room Type</th> 
									<th class="col-md-2">Room No</th> 
									<th class="col-md-2">Floor</th> 
									<th class="col-md-2">List / Edit / Delete</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="myRoom in myRooms">
									<td>

										<a :href="'/hotel/rooms/list/' + myRoom.key"><h5>{{ myRoom.name }} </h5></a>

									</td> 
									<td>
										<h5>{{ myRoom.room_nos }}</h5>
									</td> 
									<td>
										<h5>{{ myRoom.floor }}</h5>
									</td> 
									<td class="actions">
										<h6>	  
											<a v-tooltip="msg1"  :href="'/hotel/rooms/list/' + myRoom.key" class="on-default edit-row"><i class="fa fa-list"></i></a> 
											<a v-tooltip="msg2"  @click="edithotel(myRoom)" href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a> 
											<a v-tooltip="msg3" @click="deletehotel(myRoom)" href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											<a v-show="myTopic.type == 'public'" v-tooltip="msg4" href="#" @click="sharetopic(myRoom)" class="on-default add-doctor-row"><i class="fa fa-share-alt"></i></a> 
										</h6>
									</td> 
								</tr>							
							</tbody>
						</table>
					</div>
				</div>

				<div class="panel-body" v-if="myRooms.length < 1"  v-cloak> 	 

					<h5 v-if="myRooms.length < 1" class="center text-color-light " v-cloak>No Room Added. Please create one</h4>
		 
				</div>	

			</section> 
			

		</div> 
	</div>
</div>

<script>
	
	new Vue({
		el: '#rooms',
		data: {

			showNew : false,
			showMy : true,
			showEdit : false, 
			showTopic : false,
			inpTopic : "",
			inpRoomnos: "",
			inpFloor: "",
			inpAdults: "",
			inpKids: "",
			inpRoomtype : "",
			inpCategory: "",
			inpId : "",
			inpKey : "",
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

			axios.get('/hotel/rooms/get' )
				.then(response => {

					this.myRooms = response.data;

					this.showSpinner = false; 
					this.showContent = true;

				});			

		},
		methods: { 

			showNewTopic:function(e){  
				e.preventDefault();				

				if ( this.showNew === true ) {

					this.showNew = false; 


				} else {

					this.showNew = true;
					this.showMy = false;
					this.showAll = false;
					this.showTopic = false;
					this.showEdit = false;

					this.inpTopic = "";
					this.inpDetails = "";

				};

			},
			showEditTopic:function(e){  
				e.preventDefault();							 

				this.showNew = false;
				this.showMy = true;
				this.showAll = false;
				this.showTopic = false;
				this.showEdit = false; 
 
			},
			showShareTopic:function(e){  
				e.preventDefault();							 

				this.showNew = false;
				this.showMy = true;
				this.showAll = false;
				this.showTopic = false;
				this.showEdit = false; 
 
			},
			showMyTopic:function(e){  
				e.preventDefault();				

				if ( this.showMy === true ) {

					this.showMy = false; 


				} else {

					this.showMy = true;
					this.showNew = false;
					this.showAll = false;
					this.showTopic = false;

				};

			},
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
			saveedittopic:function(e){  
				e.preventDefault();

				if(! this.inpTopic){

					this.error_edittopic = true;

				}else{
					var rowedit = this.myTopics.indexOf(this); 
					
					axios.get('/topics/saveedittopic' ,{
						params: {
					      topic: this.inpTopic,
					      details: this.inpDetails,
					      type: this.inpType, 
					      category: this.inpCategory,
					      id: this.inpId,
					    }
					})
					.then(response => {

						this.myTopics.splice(rowedit,1);

						this.myTopics.unshift({

							topic : response.data.topic,
							details : response.data.details,
							type : response.data.type,
							category: response.data.category,
							id : response.data.id,

						});

						this.showNew = false;
						this.showEdit = false; 
						this.showMy = true; 
						this.inpTopic = "";
						this.inpType = "";
						this.inpDetails = "";

						toastr.options = {
					            
					            "timeOut": "1000",
					        };

							toastr.success('New Topic is Saved!!',{ fadeAway: 1 });								
					});
 				}
			}, 
			edithotel:function(row){
				 
				this.showEdit = true; 
				this.showNew = false;
				this.showMy = false; 

				var rowedit = this.myRooms.indexOf(row); 
  
				this.inpRoomnos = this.myRooms[rowedit].room_nos; 
				this.inpFloor = this.myRooms[rowedit].floor;
				this.inpAdults = this.myRooms[rowedit].adults;
				this.inpKids = this.myRooms[rowedit].kids;
				this.inpRoomtype = this.myRooms[rowedit].name;
				this.inpBedtype = this.myRooms[rowedit].beds; 

				this.inpAc = this.myRooms[rowedit].ac;
				this.inpTv = this.myRooms[rowedit].tv;
				this.inpFreebreakfast = this.myRooms[rowedit].freebreakfast;
				this.inpInroomsafe = this.myRooms[rowedit].inroomsafe;
				this.inpMinifridge = this.myRooms[rowedit].minifridge;
				this.inpRoomheater = this.myRooms[rowedit].roomheater;
				this.inpTeamaker = this.myRooms[rowedit].teamaker;
				this.inpFreewater = this.myRooms[rowedit].freewater;
				this.inpBathroom = this.myRooms[rowedit].attachedbathroom;
				this.inpAmenity1 = this.myRooms[rowedit].amenities1;
				this.inpAmenity2 = this.myRooms[rowedit].amenities2;
				this.inpAmenity3 = this.myRooms[rowedit].amenities3;
				this.inpAmenity4 = this.myRooms[rowedit].amenities4;
				this.inpAmenity5 = this.myRooms[rowedit].amenities5; 
				
			},
			sharetopic:function(row){
				 
				this.showEdit = false; 
				this.showNew = false;
				this.showMy = false; 

				var rowedit = this.myTopics.indexOf(row); 
  
				this.inpTopic = this.myTopics[rowedit].topic; 
				this.inpType = this.myTopics[rowedit].type;
				this.inpCategory = this.myTopics[rowedit].category;
				this.inpDetails = this.myTopics[rowedit].details;
				this.inpId = this.myTopics[rowedit].id;
				this.inpKey = this.myTopics[rowedit].key;


			},
			deletetopic:function(row){

				var c = confirm("Sure to Delete?");				 

				if( c == true){

					var rowdelete = this.myTopics.indexOf(row); 

					axios.get('/topics/delete' ,{
							params: {

						      		deleteid: this.myTopics[rowdelete].id, 
						      	 
						    	}
							}).then(respose => { 

								this.myTopics.splice(rowdelete,1);
		 
						});
				}

			},  

		},
	});

</script>

 


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mr.manage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>