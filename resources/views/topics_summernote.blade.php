<!doctype html>
 

<html class="sidebar-left-big-icons sidebar-light "> 

	<head>
 
		<meta charset="UTF-8">

		<title>PlsAsk - Private Anonymous Review Platform</title>
		<meta name="keywords" content="Pls Ask" />
		<meta name="description" content="Private Anonymous Review Platform">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">


		<!-- Vendor CSS -->
		<script src="/admin/assets/vendor/jquery/jquery.js"></script>
		<link rel="stylesheet" href="/admin/assets/vendor/bootstrap/css/bootstrap.css" />
		<script src="/admin/assets/vendor/bootstrap/js/bootstrap.js"></script>

		<link rel="stylesheet" href="/admin/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="/admin/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="/admin/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!-- Specific Page Vendor CSS -->

		<link rel="stylesheet" href="/admin/assets/vendor/summernote/summernote.css" />

		<script src="/admin/assets/vendor/summernote/summernote.js"></script>

		<script src="/vue/vue.min.js"></script> 
		<script src="/axios/axios.min.js"></script>

		<script src="/toastr/toastr.min.js"></script> 
        <link href="/toastr/toastr.min.css" rel="stylesheet" type="text/css">

		<script>
			
			Vue.component('vue-editor', {
			    template: "<textarea class='form-control' :name='name'>1</textarea>",
			    props: {
			        model: {
			            required: true
			        },
			        language: {
			            type: String,
			            required: false,
			            default: "zh-CN"
			        },
			        height: {
			            type: Number,
			            required: false,
			            default: 160
			        },
			        minHeight: {
			            type: Number,
			            required: false,
			            default: 160
			        },
			        maxHeight: {
			            type: Number,
			            required: false,
			            default: 1000
			        },
			        name: {
			            type: String,
			            required: false,
			            default: ""
			        },
			        toolbar: {
			            type: Array,
			            required: false,
			            default: function () {
			                return [
			                    ["font", ["bold", "italic", "underline", "clear"]],
			                    ["fontsize", ["fontsize"]],
			                    ["para", ["ul", "ol", "paragraph"]],
			                    ["color", ["color"]],
			                    ["insert", ["link", "picture", "hr"]],
			                    ['view', ['fullscreen', 'codeview']],
			                ];
			            }
			        }
			    },
			    created: function () {
			    },
			    destroyed: function () {

			    },
			    data: function () {
			        return {
			            control: "",
			            inpsubject : "",
			        }
			    },
			    mounted: function () {
			        //  initialize the summernote
			        if (this.minHeight > this.height) {
			            this.minHeight = this.height;
			        }
			        if (this.maxHeight < this.height) {
			            this.maxHeight = this.height;
			        }
			        var me = this;
			        this.control = $(this.$el);
			        this.control.summernote({
			            codemirror: { 
			                theme: 'monokai'
			            },
			            lang: this.language,
			            height: this.height,
			            minHeight: this.minHeight,
			            maxHeight: this.maxHeight,
			            
			            callbacks: {
			                onInit: function () {
			                    me.control.summernote("code", me.model.content);
			                },
			                onImageUpload: function (files) {
			                    
			                    var formData;
			                    formData = new FormData();
			                    formData.append('file', files[0]);
			                    formData.append("param", '{"fileid":' + Math.random() + ',"filetype":"head","filenum":"04' + Math.random() + '"}');
			                    $.ajax({
			                        url: '/uploadimage/partfile',
			                        type: 'POST',
			                        data: formData,
			                        cache: false,
			                        contentType: false,
			                        processData: false
			                    }).then((res) => { 
			                        var resdata = res.data;
			                        var newInfo = JSON.parse(resdata);
			                        newInfo.url += '?t' + Math.random();
			                        me.control.summernote('insertImage', newInfo.url, 'img');
			                    })

			                }
			            }
			        }).on("summernote.change", function () {
			            var content = me.control.summernote("code");
			            me.$nextTick(function () {
			                me.isChanging = false; 
			                me.$emit('modelchange', me.model, content);
			            });
			        });
			    },
			    methods: {
			    },
			    watch: {

			    }
			})

		</script>
  
		<!-- Theme CSS -->
		<link rel="stylesheet" href="/admin/assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="/admin/assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="/admin/assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="/admin/assets/vendor/modernizr/modernizr.js"></script>
   
  
        <script src="/socket/socket.io.js"></script>

	</head>
	<body>
		<section class="body">
 
			<header class="header">
				<div class="logo-container">
					<div class="navbar-header">

                    <strong><a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'PlsAsk') }}
                    </a></strong>
                </div>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			 
				<div class="header-right">
			  
			
					<ul class="notifications" >
						 
						<li id="notifications">
							<a @click="resetnotification" href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								<i class="fa fa-bell"></i>
								<span class="badge"  v-show="countNotification > 0" >@{{countNotification}}</span>
							</a>
			
							<div  class="dropdown-menu notification-menu large">
								<div class="notification-title">
									<span class="pull-right label label-default" v-show="countNotification > 0">@{{countNotification}}</span>
									Notifications
								</div>
			
								<div class="content">
									<ul>
										<li v-for="allStatus in allStatuses">
											<p class="clearfix mb-xs">

												<span class="message pull-left">
													<a  href="/reviews">@{{ allStatus.review}}</a></span>
													
											</p>
										</li>

									</ul>
									<hr />
			
									<div class="text-right">
										<a href="/reviews" class="view-more">View All</a>
									</div>
								</div>
							</div>

						</li>
						<script>

								var socket = io('https://plsask.com:3000');	
								notifications = new Vue({
									el:'#notifications',
									data:{

										allStatuses : [],
										allStatus : "",
										countNotification : 0,
										user_id : "{!! 'channel_feedback:NewFeedback_' . Auth::user()->id !!}",

									},
									mounted:function(){

										socket.on(this.user_id, function(data){
									 		
									 		this.allStatuses.unshift(data);
									 		this.countNotification += 1;

									 	}.bind(this));

									},
									methods: {

										resetnotification:function(){
											
											this.countNotification = 0;

										}
									},
								})

						</script> 

						
					</ul>
			
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							 
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name">{{ Auth::user()->name }}</span>
								<span class="role">{{ Auth::user()->email }}</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="/profile"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="/mypictures"><i class="fa fa-image"></i> My Pictures</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="/settings" ><i class="fa fa-cog"></i> Settings</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="/password" ><i class="fa fa-key"></i> Password</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="{{ route('logout') }}"
	                                        onclick="event.preventDefault();
	                                                 document.getElementById('logout-form').submit();">
	                                    <i class="fa fa-power-off"></i>
	                                        Logout
	                                </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                        {{ csrf_field() }}
                                    </form>
								</li>
							</ul>
						</div>
					</div>
				</div> 

			</header>
			
			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">

								@if ( $currentmenu === 'dashboard' )
									<li class="nav-parent nav-active">
								@else
									<li class="nav-parent">
								@endif	
										<a href="/dashboard" >
											<i class="fa fa-dashboard" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>

								 
								@if ( $currentmenu === 'profiles' )
									<li class="nav-parent nav-active">
								@else
									<li class="nav-parent">
								@endif
										<a href="/profiles">
											<i class="fa fa-user" aria-hidden="true"></i>
											<span>Profiles</span>
										</a>
									</li>
							
								@if ( $currentmenu === 'groups' )
									<li class="nav-parent nav-active">
								@else
									<li class="nav-parent">
								@endif
										<a href="/groups">
											<i class="fa fa-group" aria-hidden="true"></i>
											<span>Groups</span>
										</a>
									</li>

								@if ( $currentmenu === 'topics' )
									<li class="nav-parent nav-active">
								@else
									<li class="nav-parent">
								@endif
										<a href="/topics">
											<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
											<span>Topics</span>
										</a>
									</li>
							
								@if ( $currentmenu === 'reviews' )
									<li class="nav-parent nav-active">
								@else
									<li class="nav-parent">
								@endif
										<a href="/reviews">
											<i class="fa fa-paper-plane" aria-hidden="true"></i>
											<span>Reviews</span>
										</a>
									</li>							

								</ul>
							</nav>
				  
						</div>
				
						<script>
							// Maintain Scroll Position
							if (typeof localStorage !== 'undefined') {
								if (localStorage.getItem('sidebar-left-position') !== null) {
									var initialPosition = localStorage.getItem('sidebar-left-position'),
										sidebarLeft = document.querySelector('#sidebar-left .nano-content');
									
									sidebarLeft.scrollTop = initialPosition;
								}
							}
						</script>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Topics</h2>
					
						 
					</header>

					<!-- start: page -->
					 
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

														<vue-editor :model="inpDetails" v-on:modelchange="modelChangeEvent"> </vue-editor>
																	 										 
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

														<vue-editor :model="inpDetails" v-on:modelchange="modelChangeEvent"> </vue-editor>
																	 										 
													</div>
												</div>	
												<div class="form-group center">	
													<button type="button" class="btn btn-primary" @click="saveedittopic">Save</button> 
												</div>
											</form>
										
										</div>

									</div> 

									<div v-if="showShare" class="panel-body" v-cloak>
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-dismiss" @click="showShareTopic"></a>
										</div>
										<h4 class="center text-color-light"><strong>@{{inpTopic}}</strong></h4>

										<div class="panel-body">
											<form>   				
														
												<div class="form-group">
													<label class="col-md-3 control-label">Sharable Link ( Please copy paste to facebook, twitter, linkedin, whatsapp etc)</label>
													<div class="col-md-8">			  

														<textarea name="details" class="form-control" rows="2" disabled="disabled">https://plsask.com/showtopics/@{{inpKey}}</textarea>
																	 										 
													</div>
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

															<a :href="'/topics/' + myTopic.key + '/send'"><h5>@{{ myTopic.topic }} </h5></a>

														</td> 
														<td>
															<h5>@{{ myTopic.type }}</h5>
														</td> 
														<td class="actions">
															<h6>	 
																<a v-tooltip="msg1" :href="'/topics/' + myTopic.key + '/send'" class="on-default add-doctor-row"><i class="fa fa-envelope-o"></i></a> 
																<a v-tooltip="msg2"  @click="edittopic(myTopic)" href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a> 
																<a v-tooltip="msg3" @click="deletetopic(myTopic)" href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
																<a v-show="myTopic.type == 'public'" v-tooltip="msg4" href="#" @click="sharetopic(myTopic)" class="on-default add-doctor-row"><i class="fa fa-share-alt"></i></a> 
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
									showShare : false,
									showTopic : false,
									inpTopic : "",
									inpId : "",
									inpKey : "", 
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
									msg4: 'Share',
							        inpDetails: {
							            content: "<div></div>"
							        },

								},
								mounted :function(){

									axios.get('/topics/getmytopic' )
													.then(response => {this.myTopics = response.data});

								},
								methods: { 

									modelChangeEvent: function (model, code) {

							            model.content = code;

							        },
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
										this.showShare = false;
						 
									},
									showShareTopic:function(e){  
										e.preventDefault();							 

										this.showNew = false;
										this.showMy = true;
										this.showAll = false;
										this.showTopic = false;
										this.showEdit = false;
										this.showShare = false;
						 
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
											      details: this.inpDetails.content,
											      type: this.inpType,
											    }

											})
											.then(response => {

												this.myTopics.unshift({

													topic : response.data.topic,
													details : response.data.details,
													type : response.data.type,
													id : response.data.id,
													key : response.data.key,

												});

												this.showNew = false;
												this.showEdit = false;
												this.showShare = false;
												this.showMy = true; 
												this.inpTopic = "";
												this.inpType = "";
												this.inpId = "";
												this.inpKey = "";
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
												this.showShare = false;
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
										this.showShare = false;
										this.showNew = false;
										this.showMy = false; 

										var rowedit = this.myTopics.indexOf(row); 
						  
										this.inpTopic = this.myTopics[rowedit].topic; 
										this.inpType = this.myTopics[rowedit].type;
										this.inpDetails = this.myTopics[rowedit].details;
										this.inpId = this.myTopics[rowedit].id;


									},
									sharetopic:function(row){
										 
										this.showEdit = false;
										this.showShare = true;
										this.showNew = false;
										this.showMy = false; 

										var rowedit = this.myTopics.indexOf(row); 
						  
										this.inpTopic = this.myTopics[rowedit].topic; 
										this.inpType = this.myTopics[rowedit].type;
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
				        <style>  

				            .flex-center {   
				            	align-items: center;
				                display: flex;
				                justify-content: center; 
				                margin-top:100px;
				            }

				            .links > a {
				                color: #636b6f;
				                padding: 0 25px;
				                font-size: 12px;
				                font-weight: 600;
				                letter-spacing: .1rem;
				                text-decoration: none;
				                text-transform: uppercase;
				            } 
				        </style>						
				       	<div class="flex-center position-ref full-height"> 
				            <div class="content"> 
				                <div class="links">
				                    @if (Route::has('login'))
				                        @if (Auth::check())
				                            <a href="{{ url('/dashboard') }}">Home</a>
				                        @else
				                            <a href="{{ url('/register') }}">Register</a>
				                            <a href="{{ url('/login') }}">Login</a>                            
				                        @endif
				                    @endif
				                    <a href="/showtopics">Topics</a>
				                    <a href="/showreviews">Review</a>
				                    <a href="/help">Help</a>
				                </div>
				            </div>
				        </div>

					<!-- end: page -->
				</section>

			</div> 

		</section>

		<!-- Vendor -->
		<script src="/admin/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		
		<script src="/admin/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="/admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="/admin/assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="/admin/assets/vendor/jquery-placeholder/jquery-placeholder.js"></script>
 
		<script src="/admin/assets/javascripts/theme.js"></script>	
		<!-- Theme Custom -->
		<script src="/admin/assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="/admin/assets/javascripts/theme.init.js"></script>

	
	</body>
</html> 