<!doctype html>

 
 <html class="sidebar-left-big-icons sidebar-light "> 
 

	<head>
 
		<meta charset="UTF-8">

		<title>PlsAsk - Reviews</title>
		<meta name="keywords" content="PlsAsk" />
		<meta name="description" content="PlsAsk Feedback Messages">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="css/googlefonts_shadow_intro_light.css" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->>
		<link rel="stylesheet" href="/admin/assets/vendor/bootstrap/css/bootstrap.css" />	  
		<link rel="stylesheet" href="/admin/assets/stylesheets/theme.css" /> 
		<link rel="stylesheet" href="/admin/assets/stylesheets/skins/default.css" /> 
		<script src="/vue/vue.min.js"></script>
		<script src="/axios/axios.min.js"></script> 

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
						<div class="col-lg-6 col-md-6">
							<div class="search-control-wrapper">
								<form action="pages-search-results.html">
									<div class="form-group">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Search Topics" v-model="searchquery"  @keyup="filteredreviews" >

											<span class="input-group-btn">
												<button class="btn btn-primary" type="button">Search</button>
											</span>
										</div>
									</div>
								</form>
							</div> 
						</div>
					</div>
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
												<tr v-for="review in reviews">
													<td>

														<p><h5><strong>@{{ review.review }}</strong></h5></p>
														<p><h6><a :href="'/showtopics/' + review.topic_key">@{{ review.topic }}</a></h6></p>

													</td> 
													<td>@{{  review.created_at }}</td> 
												</tr>							
											</tbody>
										</table>
									</div>
								</div>
							</section> 	
							<div class="center"><button class="btn btn-default" @click="morerows">Load More</button></div>
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
					inpId: "",
					inpTopics: "",
					review: "",
					reviews: [],
					inpKey:"", 
					row_count : 10,
					searchquery : "",
				},
				mounted:function(){

					axios.get('/showreviews/default')
					.then(response => {this.reviews = response.data}); 

				},
				methods:{

					filteredreviews:function(){

						axios.get('/showreviews/filtered' ,{

								params: {

							      	review : this.searchquery, 

							    	}

								})
							.then(response => {this.reviews = response.data});
					
			 
					},
					morerows:function(){

						axios.get('/showreviews/getmore' ,{

								params: {
							      row_count: this.row_count,
							    }

							}).then(response => {

								for (var i = 0;  i <= response.data.length - 1; i++ ) {

									this.reviews.push({

											review : response.data[i].review, 
											topic : response.data[i].topic, 
											topic_id : response.data[i].topic_id,  

										});
								}						

							});
		 

						this.row_count = this.row_count + 10;
						
					}

				}

			})


		</script>
	</body>
</html> 