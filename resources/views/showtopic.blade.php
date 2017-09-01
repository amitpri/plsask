<!doctype html>

 
 <html class="sidebar-left-big-icons sidebar-light "> 
 

	<head>
 
		<meta charset="UTF-8">

		<title>ASKPLS - MR Management Portal</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

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
        </style>

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
						<div class="col-lg-12 col-md-12">
						
							 <h2 class="center text-color-light "><strong>{{ $topic->topic }}</strong></h2>
							 <h4 class="center text-color-light ">{{ $topic->details }}</h4>

							 <button @click="addfeedback"  id="addToTable" class="btn btn-primary">Add Feedback <i class="fa fa-plus"></i></button>

						</div>
					</div>
					<div v-if="shownewfeedback"   class="panel-body"> 
						<h4 class="center text-color-light"><strong>Your Feedback</strong></h4>

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

														@{{ feedback.review }} 

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
					inpTopic: "{!! $topic->topic !!}",
					inpTopics: "",
					feedback: "",
					feedbacks: [],
					inpKey:"", 
					shownewfeedback: false,
					inpFeedback : "",
				},
				mounted:function(){

					axios.get('/showtopics/messages',{
					params: {

				      	id: this.inpId,
				      	topic:  this.inpTopic,
				      	 
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


						var c = confirm("Sure to Submit? Please recheck the content!!");

						if( c == true){

							axios.get('/showtopics/postfeedback' ,{
								params: {

							      		feedback: this.inpFeedback,
							      		topicid : this.inpId,
							      		topicname : this.inpTopic, 
							      	 
							    	}
								}).then(response => { 

									this.feedbacks.unshift({
 
										review : response.data.review, 
										created_at : response.data.created_at, 

									})

									toastr.options = {
					            
							            "timeOut": "1000",
							        };

									toastr.success('Thank You!!Your Feedback is Posted!!',{ fadeAway: 1 });	
			 
							});

						}




					}
				},

			})


		</script>
 
	</body>
</html> 