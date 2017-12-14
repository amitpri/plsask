<!doctype html>
 

<html class="sidebar-left-big-icons sidebar-light "> 

	<head>
 
		<meta charset="UTF-8">

		<title>iStayToday - My Bookings</title>
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
 

		<script src="/vue/vue.min.js"></script> 

     	<script src="/axios/axios.min.js"></script>

        <script src="/toastr/toastr.min.js"></script> 
        <link href="/toastr/toastr.min.css" rel="stylesheet" type="text/css">
 

        <script src="/socket/socket.io.js"></script>

        <?php echo $__env->make('analytics', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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
									<a role="menuitem" tabindex="-1" href="/settings" ><i class="fa fa-cog"></i> Settings</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="/password" ><i class="fa fa-key"></i> Password</a>
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
											<span>My Bookings</span>
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