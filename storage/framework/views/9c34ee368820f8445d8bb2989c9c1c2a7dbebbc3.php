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
					<strong><a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <?php echo e(config('app.name', 'PlsAsk')); ?>

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
													<th class="col-md-2">Published By</th>  
												</tr>
											</thead>
											<tbody>
												<tr v-for="review in reviews">
													<td>

														<p><h5><strong>{{ review.review }}</strong></h5></p>
														<p><h6><a :href="'/showtopics/' + review.topic_id">{{ review.topic }}</a></h6></p>

													</td> 
													<td>Amit</td> 
												</tr>							
											</tbody>
										</table>
									</div>
								</div>
							</section> 	
							<div class="center"><button class="btn btn-default" @click="morenotifications">Load More</button></div>
							<div class="flex-center position-ref full-height"> 
					            <div class="content"> 
					                <div class="links">
					                    <?php if(Route::has('login')): ?>
					                        <?php if(Auth::check()): ?>
					                            <a href="<?php echo e(url('/dashboard')); ?>">Home</a>
					                        <?php else: ?>
					                            <a href="<?php echo e(url('/register')); ?>">Register</a>
					                            <a href="<?php echo e(url('/login')); ?>">Login</a>                            
					                        <?php endif; ?>
					                    <?php endif; ?>
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
					
			 
					} 
				}

			})


		</script>
	</body>
</html> 