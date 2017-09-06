<!doctype html>
 

<html class="sidebar-left-big-icons sidebar-light "> 

	<head>
 
		<meta charset="UTF-8">

		<title>PlsAsk - Private Anonymous Review Platform</title>
		<meta name="keywords" content="Pls Ask" />
		<meta name="description" content="View Profile">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

 
		<link rel="stylesheet" href="/admin/assets/vendor/bootstrap/css/bootstrap.css" />

		<link rel="stylesheet" href="/admin/assets/vendor/font-awesome/css/font-awesome.css" /> 

		<!-- Specific Page Vendor CSS -->

			@yield('content_pagecss')


		<!-- Theme CSS -->
		<link rel="stylesheet" href="/admin/assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="/admin/assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="/admin/assets/stylesheets/theme-custom.css">
 

		<!--
		<script src="https://unpkg.com/vue@2.3.0"></script>   -->

		<script src="/vue/vue.min.js"></script> 

     	<script src="/axios/axios.min.js"></script>
        <style>
			[v-cloak] {
			  display: none;
			}
		</style>

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
			  
			
			
				</div> 

			</header>
			
			<div class="inner-wrapper">
			
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header"> 
					
						 
					</header>

					<!-- start: page -->
					 
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
						 
										<p>@{{ inpDetails}}</p> 

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
									</ul>
									<div class="tab-content">
										<div id="personal" class="tab-pane active">
											<form class="form-horizontal" method="get">
												<h4 class="mb-xlg">Personal Information</h4>
												
												<fieldset> 
													<div class="form-group">
														<label class="col-md-3 control-label" for="name">Name</label>
														<div class="col-md-8">

															<h5>@{{inpName}}</h5>
															
														</div>
													</div>
													
													  
													<div class="form-group">
														<label class="col-md-3 control-label" for="city">City</label>
														<div class="col-md-8">

															<h5>@{{inpCity}}</h5>

														</div>
													</div>
													 
													<div class="form-group">
														<label class="col-md-3 control-label" for="profileFirstName">Country</label>
														<div class="col-md-8">

															<h5>@{{inpCountry}}</h5>

														</div>
													</div>
													 
													<div class="form-group">
														<label class="col-md-3 control-label" for="profileBio">About </label>
														<div class="col-md-8">

												           <h5>@{{inpDetails}}</h5>

														</div>
													</div>								
												</fieldset>
												{!! Form::close() !!}
											</form>
										</div>  
										<div id="social" class="tab-pane">

											<form class="form-horizontal" method="get">
												<h4 class="mb-xlg">Social Media Details</h4>
												
												<fieldset>
													<div class="form-group">
														<label class="col-md-3 control-label" for="whatsapp">Whatsapp</label>
														<div class="col-md-8">
															
															<h5>@{{inpWhatsapp}}</h5>

														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="facebook">Facebook</label>
														<div class="col-md-8">
															
															<h5>@{{inpFacebook}}</h5>

														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="twitter">Twitter</label>
														<div class="col-md-8">

															<h5>@{{inpTwitter}}</h5>

															
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="linkedin">Linkedin</label>
														<div class="col-md-8">

															<h5>@{{inpLinkedin}}</h5>

														</div>
													</div> 							
												</fieldset>
											</form>
												 

										</div>
										<div id="company" class="tab-pane">

											<form class="form-horizontal" method="get">
												<h4 class="mb-xlg">Company Information</h4>
												
												<fieldset>
													<div class="form-group">
														<label class="col-md-3 control-label" for="profileCompany">Company</label>
														<div class="col-md-8">
															
															<h5>@{{inpCompany}}</h5>

														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="name"> Role</label>
														<div class="col-md-8">

															<h5>@{{inpRole}}</h5>

															
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="email"> Designation</label>
														<div class="col-md-8">

															<h5>@{{inpDesignation}}</h5>

														</div>
													</div>								
												</fieldset> 
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

									inpId : {!! $id !!},
									inpName : "",
									inpEmail : "",
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
									showprofile : false,
							
								}, 

								mounted :function(){

										axios.get('/viewprofile/details' ,{

												params: {

											      	id : this.inpId, 

											    	}

												}).then(response => {
													
													this.inpId = response.data.id;
													this.inpName = response.data.name;
													this.inpEmail = response.data.email; 
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
													
								}
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
		<script src="/admin/assets/vendor/jquery/jquery.js"></script>
		<script src="/admin/assets/vendor/bootstrap/js/bootstrap.js"></script>
		
		
	</body>
</html>