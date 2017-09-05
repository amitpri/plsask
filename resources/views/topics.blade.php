@extends('layouts.mr.manage')

@section('formname')

<h2>Topics</h2>

@stop
 

@section('content_examplejs')
 
        <script src="/toastr/toastr.min.js"></script> 
        <link href="/toastr/toastr.min.css" rel="stylesheet" type="text/css">

@stop

@section('content_page')
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
<div class="row" id="topics">
	<div class="col-lg-12 col-md-12">

		<section class="panel">
			<header class="panel-heading panel-heading-transparent">
			
				<button class="btn btn-default" @click="showMyTopic">My Topics</button>				
				<button class="btn btn-default" @click="showNewTopic">New Topic</button>

			</header>

			<div v-if="showNew" class="panel-body" v-cloak>
				<div class="panel-actions">
					<a href="#" class="panel-action panel-action-dismiss" @click="showNewTopic"></a>
				</div>
				<h4 class="center text-color-light"><strong>Create new Topic</strong></h4>

				<div class="panel-body">
					<form>
						<div class="form-group">
							<label class="col-md-1 control-label" for="textareaDefault">Topic</label>
							<div class="col-md-10">
								
								<input type="text" name="topic" class="form-control" v-model="inpTopic" >
								<p v-if="error_newtopic" class="text-danger">@{{ message_newtopic }}</p>

							</div>
						</div> 

						<div class="form-group">
							<label class="col-md-1 control-label" for="textareaDefault">Type</label>
							<div class="col-md-10"> 
								<label class="radio-inline">
								  <input type="radio" name="type" value="private" v-model="inpType"> Private ( Can be shared only with your own profiles and groups)
								</label>
								<label class="radio-inline">
								  <input type="radio" name="type" value="public" v-model="inpType"> Public ( Searchable and can be reviewed through Facebook, emails and other social media)
								</label> 
								<p v-if="error_newtype" class="text-danger">@{{ message_newtype }}</p>
							</div>

						</div>						
								
						<div class="form-group">
							<label class="col-md-1 control-label">Details</label>
							<div class="col-md-10">			  

								<textarea name="details" class="form-control" rows="10" v-model="inpDetails"></textarea>
											 										 
							</div>
						</div>	
						<div class="form-group center">	
							<button type="button" class="btn btn-primary" @click="savetopic">Save</button> 
						</div>
					</form>
				
				</div>

			</div> 

			<div v-if="showEdit" class="panel-body" v-cloak>
				<div class="panel-actions">
					<a href="#" class="panel-action panel-action-dismiss" @click="showEditTopic"></a>
				</div>
				<h4 class="center text-color-light"><strong>Edit Topic</strong></h4>

				<div class="panel-body">
					<form> 

						<div class="form-group">
							<label class="col-md-1 control-label" for="textareaDefault">Topic</label>
							<div class="col-md-10">
								
								<input type="text" name="topic" class="form-control" v-model="inpTopic" >
								<p v-if="error_edittopic" class="text-danger">@{{ message_edittopic }}</p>

							</div>
						</div> 

						<div class="form-group">
							<label class="col-md-1 control-label" for="textareaDefault">Type</label>
							<div class="col-md-10"> 
								<label class="radio-inline">
								  <input type="radio" name="type" value="private" v-model="inpType"> Private( Can be shared only with your own profiles and groups)
								</label>
								<label class="radio-inline">
								  <input type="radio" name="type" value="public" v-model="inpType"> Public ( Searchable and can be reviewed through Facebook, emails and other social media)
								</label> 
								<p v-if="error_edittype" class="text-danger">@{{ message_edittype }}</p>
							</div>
						</div>						
								
						<div class="form-group">
							<label class="col-md-1 control-label">Details</label>
							<div class="col-md-10">			  

								<textarea name="details" class="form-control" rows="10" v-model="inpDetails"></textarea>
											 										 
							</div>
						</div>	
						<div class="form-group center">	
							<button type="button" class="btn btn-primary" @click="saveedittopic">Save</button> 
						</div>
					</form>
				
				</div>

			</div> 
 

			<h4 v-if="showMy && myTopics.length > 0" class="center text-color-light "><strong>My Topics</strong></h4>

			<div v-if="showMy && myTopics.length > 0" class="panel-body" v-cloak>

				<div class="panel-actions">
					<a href="#" class="panel-action panel-action-dismiss" @click="showMyTopic"></a>
				</div>

				<div class="table-responsive" >
					<table class="table table-striped mb-none">
						<thead>
							<tr>
								<th class="col-md-8">Topic</th> 
								<th class="col-md-2">Type</th> 
								<th class="col-md-2">Action</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="myTopic in myTopics">
								<td>

									<a :href="'/topics/' + myTopic.id + '/send'"><h5>@{{ myTopic.topic }} </h5></a>

								</td> 
								<td>
									<h5>@{{ myTopic.type }}</h5>
								</td> 
								<td class="actions">
									<h6>	 
										<a v-tooltip="msg1" :href="'/topics/' + myTopic.id + '/send'" class="on-default add-doctor-row"><i class="fa fa-envelope-o"></i></a> 
										<a v-tooltip="msg2"  @click="edittopic(myTopic)" href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a> 
										<a v-tooltip="msg3" @click="deletetopic(myTopic)" href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
									</h6>
								</td> 
							</tr>							
						</tbody>
					</table>
				</div>
			</div>

			<div class="panel-body" v-if="myTopics.length < 1"  v-cloak> 	 

				<h5 v-if="myTopics.length < 1" class="center text-color-light " v-cloak>No Topic Available. Please create one</h4>
	 
			</div>	

		</section> 

		

	</div>
</div>

<script>
	
	new Vue({
		el: '#topics',
		data: {

			showNew : false,
			showMy : true,
			showEdit : false,
			showTopic : false,
			inpTopic : "",
			inpId : "",
			inpDetails : "",
			inpType: "",
			listTopics : [],
			myTopics : [],
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
			msg1: 'Send Mail',
			msg2: 'Edit',
			msg3: 'Delete',

		},
		mounted :function(){

			axios.get('/topics/getmytopic' )
							.then(response => {this.myTopics = response.data});

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
			savetopic:function(e){  
				e.preventDefault();	

				this.error_newtopic = false;
				this.error_newtype = false;
				
				if(! this.inpTopic){

					this.error_newtopic = true;

				}
				if(! this.inpType){

					this.error_newtype = true;

				}
				if(( this.inpTopic) &&  ( this.inpType) ){

					axios.get('/topics/savetopic' ,{
						params: {
					      topic: this.inpTopic,
					      details: this.inpDetails,
					      type: this.inpType,
					    }

					})
					.then(response => {

						this.myTopics.unshift({

							topic : response.data.topic,
							details : response.data.details,
							type : response.data.type,
							id : response.data.id,

						});

						this.showNew = false;
						this.showEdit = false;
						this.showMy = true; 
						this.inpTopic = "";
						this.inpType = "";
						this.inpId = "";
						this.inpDetails = "";

						toastr.options = {
					            
					            "timeOut": "1000",
					        };

							toastr.success('New Topic is Saved!!',{ fadeAway: 1 });								
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
					      id: this.inpId,
					    }
					})
					.then(response => {

						this.myTopics.splice(rowedit,1);

						this.myTopics.unshift({

							topic : response.data.topic,
							details : response.data.details,
							type : response.data.type,
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
			edittopic:function(row){
				 
				this.showEdit = true;
				this.showNew = false;
				this.showMy = false; 

				var rowedit = this.myTopics.indexOf(row); 
  
				this.inpTopic = this.myTopics[rowedit].topic; 
				this.inpType = this.myTopics[rowedit].type;
				this.inpDetails = this.myTopics[rowedit].details;
				this.inpId = this.myTopics[rowedit].id;


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
@stop
