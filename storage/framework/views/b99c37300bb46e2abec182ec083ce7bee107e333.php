<!doctype html>
 

<html class="sidebar-left-big-icons sidebar-light "> 

	<head>
 
		<meta charset="UTF-8">

		<title>PlsAsk - Private Anonymous Review Platform</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="css/googlefonts_shadow_intro_light.css" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<script src="/admin/assets/vendor/jquery/jquery.js"></script>
		<link rel="stylesheet" href="/admin/assets/vendor/bootstrap/css/bootstrap.css" />

		<link rel="stylesheet" href="/admin/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="/admin/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="/admin/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!-- Specific Page Vendor CSS -->

			<?php echo $__env->yieldContent('content_pagecss'); ?>


		<!-- Theme CSS -->
		<link rel="stylesheet" href="/admin/assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="/admin/assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="/admin/assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="/admin/assets/vendor/modernizr/modernizr.js"></script>

		<!--
		<script src="https://unpkg.com/vue@2.3.0"></script>   -->

		<script src="/vue/vue.min.js"></script> 

     	<script src="/axios/axios.min.js"></script>

        <script src="/toastr/toastr.min.js"></script> 
        <link href="/toastr/toastr.min.css" rel="stylesheet" type="text/css">

         
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>

        <script src="/socket/socket.io.js"></script>

	</head>
	<body>
		<section class="body">
 
			<header class="header">
				<div class="logo-container">
					<div class="navbar-header">

                    <strong><a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <?php echo e(config('app.name', 'PlsAsk')); ?>

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
								<span class="badge"  v-show="countNotification > 0" >{{countNotification}}</span>
							</a>
			
							<div  class="dropdown-menu notification-menu large">
								<div class="notification-title">
									<span class="pull-right label label-default" v-show="countNotification > 0">{{countNotification}}</span>
									Notifications
								</div>
			
								<div class="content">
									<ul>
										<li v-for="allStatus in allStatuses">
											<p class="clearfix mb-xs">

												<span class="message pull-left">
													<a target="_blank" :href="'/profile/' + allStatus.id">{{ allStatus.data}}</a></span>
													
											</p>
										</li>

									</ul>
									<hr />
			
									<div class="text-right">
										<a href="/notifications" class="view-more">View All</a>
									</div>
								</div>
							</div>

						</li>
						<script>

								var socket = io('http://127.0.0.1:3000');	
								notifications = new Vue({
									el:'#notifications',
									data:{

										allStatuses : [],
										allStatus : "",
										countNotification : 0,

									},
									mounted:function(){

										axios.get('/topmenu/notification/getall' )
														.then(response => {this.allStatuses = response.data});
							  
									 	socket.on('channel_1:NewStatus_1', function(data){
									 		
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
								<span class="name"><?php echo e(Auth::user()->name); ?></span>
								<span class="role"><?php echo e(Auth::user()->email); ?></span>
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
									<a role="menuitem" tabindex="-1" href="<?php echo e(route('logout')); ?>"
	                                        onclick="event.preventDefault();
	                                                 document.getElementById('logout-form').submit();">
	                                    <i class="fa fa-power-off"></i>
	                                        Logout
	                                </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" >
                                        <?php echo e(csrf_field()); ?>

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

								<?php if( $currentmenu === 'dashboard' ): ?>
									<li class="nav-parent nav-active">
								<?php else: ?>
									<li class="nav-parent">
								<?php endif; ?>	
										<a href="/dashboard" >
											<i class="fa fa-dashboard" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>

								 
								<?php if( $currentmenu === 'profiles' ): ?>
									<li class="nav-parent nav-active">
								<?php else: ?>
									<li class="nav-parent">
								<?php endif; ?>
										<a href="/profiles">
											<i class="fa fa-user" aria-hidden="true"></i>
											<span>Profiles</span>
										</a>
									</li>
							
								<?php if( $currentmenu === 'groups' ): ?>
									<li class="nav-parent nav-active">
								<?php else: ?>
									<li class="nav-parent">
								<?php endif; ?>
										<a href="/groups">
											<i class="fa fa-group" aria-hidden="true"></i>
											<span>Groups</span>
										</a>
									</li>

								<?php if( $currentmenu === 'topics' ): ?>
									<li class="nav-parent nav-active">
								<?php else: ?>
									<li class="nav-parent">
								<?php endif; ?>
										<a href="/topics">
											<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
											<span>Topics</span>
										</a>
									</li>
							
								<?php if( $currentmenu === 'reviews' ): ?>
									<li class="nav-parent nav-active">
								<?php else: ?>
									<li class="nav-parent">
								<?php endif; ?>
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
						<h2><?php echo $__env->yieldContent('formname'); ?></h2>
					
						 
					</header>

					<!-- start: page -->
					 
						<?php echo $__env->yieldContent('content_page'); ?>
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

					<!-- end: page -->
				</section>

			</div> 

		</section>

		<!-- Vendor -->
		<script src="/admin/assets/vendor/jquery/jquery.js"></script>
		<script src="/admin/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="/admin/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="/admin/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="/admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="/admin/assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="/admin/assets/vendor/jquery-placeholder/jquery-placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		
		<?php echo $__env->yieldContent('content_pagejs'); ?>
		
		<!-- Theme Base, Components and Settings -->
		<script src="/admin/assets/javascripts/theme.js"></script>	
		<!-- Theme Custom -->
		<script src="/admin/assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="/admin/assets/javascripts/theme.init.js"></script>

		<!-- Examples -->

		<?php echo $__env->yieldContent('content_examplejs'); ?>
	
	</body>
</html>