<!doctype html>
 
<html class="sidebar-left-big-icons sidebar-light"> 
 
	<head>
 
		<meta charset="UTF-8">

		<title>{{$topic->topic}}</title>
		<meta name="keywords" content="Please Ask - Topics" />
		<meta name="description" content="Private Anonymous review platform"> 

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="/css/googlefonts_shadow_intro_light.css" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<script src="/admin/assets/vendor/jquery/jquery.js"></script>
		<link rel="stylesheet" href="/admin/assets/vendor/bootstrap/css/bootstrap.css" />	  
		<link rel="stylesheet" href="/admin/assets/stylesheets/theme.css" /> 
		<link rel="stylesheet" href="/admin/assets/stylesheets/skins/default.css" /> 
		<script src="/vue/vue.min.js"></script>
		<script src="/axios/axios.min.js"></script> 
		<script src="/toastr/toastr.min.js"></script> 
        <link href="/toastr/toastr.min.css" rel="stylesheet" type="text/css">

        <style>  

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                margin-top:50px;
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

			[v-cloak] {
			  display: none;
			}
		</style>

		@include('analytics')

	</head>
	<body>

		<section class="body">
 
			<header class="header">
				<div class="logo-container">
					<strong><a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'PlsAsk') }}
                    </a></strong>
					
				</div>
			 
				<div class="header-right">
			   
					<span class="separator"></span>
			 
				</div> 

			</header>
			
			<div class="inner-wrapper" id="feedback"> 

				<section role="main" class="content-body">
					<div class="row">
						<div class="well col-lg-12 col-md-12" v-cloak>
						
							 <h2 class="center text-color-light "><strong>{{ $topic->topic }}</strong></h2>

							 <h6 class="col-md-12 text-center">By : 
							 	<a target="_blank"  :href="'/viewprofile/' + inpUser_key">@{{ inpName }}</a> | 
							 	Category : <a  	 :href="'/showtopics/' + inpCategory">@{{   inpCategory.charAt(0).toUpperCase() + inpCategory.slice(1)  }}</a></h6>
 

							<row><h5 class=" ">{!! nl2br($topic->details) !!}</h5></row>

							 

						</div>
					</div>
					<div class="row">
						<div class="  col-lg-12 col-md-12" v-cloak>
							<button @click="addfeedback"   class="btn btn-primary">Add Feedback <i class="fa fa-plus"></i></button>
						</div>
					</div>
					<div v-if="shownewfeedback"   class="panel-body" v-cloak> 
						<h4 class="center text-color-light"><strong>Your Feedback</strong></h4>

						<div v-if="flg_name" class="col-sm-6">	
							<p class="text-center bg-danger" v-cloak><b>Please enter email id</b></p>
						</div>

						<div class="panel-body">
							<form>  					
										
								<div class="form-group">
									<label class="col-md-1 control-label">Feedback</label>
									<div class="col-md-10">			  

										<textarea name="details" class="form-control" rows="10" v-model="inpFeedback"></textarea>
													 										 
									</div>
								</div>	
								<div class="form-group center">	
									<button type="button" class="btn btn-primary" @click="savefeedback">Submit Feedback</button> 
									<button type="button" class="btn btn-primary" @click="addfeedback">Cancel</button> 
								</div>
							</form>
						
						</div>

					</div> 
					<br>
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<section class="panel">   						
								
								<div  class="panel-body">
									<div class="table-responsive" >
										<table class="table table-striped mb-none">
											<thead>
												<tr>
													<th class="col-md-8">Feedbacks</th> 
													<th class="col-md-2">Date</th>  
												</tr>
											</thead>
											<tbody>
												<tr v-for="feedback in feedbacks">
													<td>

														<div v-html="feedback.review"></div> 

													</td> 
													<td>@{{ feedback.created_at }} </td> 
												</tr>							
											</tbody>
										</table>
									</div>
								</div>
							</section> 	
							<div class="center"><button class="btn btn-default" >Load More</button></div>
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
						</div>
					</div>
				</section>

			</div> 

		</section>
 
 		<script>
	
			new Vue({

				el : '#feedback',
				data : {
					id:"", 
					inpId: "{!! $topic->id !!}",
					inpKey: "{!! $topic->key !!}",
					inpTopic: "",
					inpCategory: "",
					inpDetail: "", 
					feedback: "",
					feedbacks: [], 
					shownewfeedback: false,
					inpFeedback : "",
					flg_name : false,
					inpUser_key : "",
					inpName : "",
				},
				mounted:function(){

					axios.get('/showtopics/showdetails',{
					params: {

				      	id: this.inpId, 
				      	 
				    	}

					})
					.then(response => {

						this.inpTopic  = response.data.topic;
						this.inpId = response.data.id;
						this.inpDetail = response.data.details;
						this.inpName = response.data.name;
						this.inpCategory = response.data.category;
						this.inpUser_key = response.data.user_key;

					});

					axios.get('/showtopics/messages',{
					params: {

				      	id: this.inpId, 
				      	 
				    	}

					})
					.then(response => {this.feedbacks = response.data}); 

				},
				methods: { 

					addfeedback:function(e){  
						e.preventDefault();				

						if ( this.shownewfeedback === true ) {

							this.shownewfeedback = false; 


						} else {

							this.shownewfeedback = true; 

						};

					},
					savefeedback:function(e){


						if( this.inpFeedback == null ){
					
							this.flg_name = true; 

						}else{
							
							this.flg_name = false;

							var c = confirm("Sure to Submit? Please recheck the content!!");

							if( c == true){

								axios.get('/showtopics/postfeedback' ,{
									params: {

								      		feedback: this.inpFeedback,
								      		topicid : this.inpId,
								      		topickey : this.inpKey,
								      		topicname : this.inpTopic, 
								      	 
								    	}
									}).then(response => { 

										this.feedbacks.unshift({
	 
											review : response.data.review, 
											created_at : response.data.created_at, 

										})

										this.feedback = "";
										this.shownewfeedback = false; 


										toastr.options = {
						            
								            "timeOut": "1000",
								        };

										toastr.success('Thank You!!Your Feedback is Posted!!',{ fadeAway: 1 });	
				 
								});

							}

						}

					}
				},

			})

		</script>
 
	</body>

</html> 