<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>Ask Please : Medical Representatives Connected</title>	

		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="Ask Please | ASKPLS | Medical Representatives Connected">
		<meta name="author" content="ASKPLS.COM">

		<!-- Favicon -->
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="/img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="/vendor/animate/animate.min.css">
		<link rel="stylesheet" href="/vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="/vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="/vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="/vendor/magnific-popup/magnific-popup.min.css">

		<link rel="stylesheet" href="/admin/assets/vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="/admin/assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="/css/theme.css">
		<link rel="stylesheet" href="/css/theme-elements.css">
		<link rel="stylesheet" href="/css/theme-blog.css">
		<link rel="stylesheet" href="/css/theme-shop.css">

		<!-- Current Page CSS -->

		<!-- Skin CSS -->
		<link rel="stylesheet" href="/css/skins/skin-shop-5.css"> 

		<!-- Demo CSS -->
		<link rel="stylesheet" href="/css/demos/demo-shop-5.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="/css/mrcustomindex.css">

		<!-- Head Libs -->
		<script src="/vendor/modernizr/modernizr.min.js"></script>

		<script src="https://unpkg.com/vue@2.3.0"></script> 
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


		<script src="/vendor/jquery/jquery.min.js"></script>

		<script src="js/jquery.easy-autocomplete.js"></script> 
		<link rel="stylesheet" href="css/easy-autocomplete.css"> 


	</head>
	<body>

		<div class="body">

			<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 100, 'stickySetTop': '-100px', 'stickyChangeLogo': false}">
				<div class="header-body">
					<div class="header-top">
						<div class="container">
								

							@if (Auth::guest())

							<div class="top-menu-area">
								<a href="#">Links <i class="fa fa-caret-down"></i></a>
								<ul class="top-menu">
									<li><a id="modal_trigger" href="#modal">Login / Sign Up</a></li> 
									<li><a href="/help">Help</a></li>
								</ul>
							</div>
							<p class="welcome-msg"></p>
						

							@else

							<div class="top-menu-area">
								<a href="#">Links <i class="fa fa-caret-down"></i></a>
								<ul class="top-menu">
									<li><a href="/mr/dashboard">Dashboard</a></li>
									<li><a href="/mr/help">Help</a></li>
									<li><a href="{{ route('logout') }}"
					                        onclick="event.preventDefault();
					                        document.getElementById('logout-form').submit();">
					                            Logout
					                        </a>
					                        <form id="logout-form" action="{{ route('logout') }}" method="POST" >{{ csrf_field() }}</form>
									</li>
								</ul>
							</div>
							<p class="welcome-msg">Amit Priyadarshi</p>

							@endif

						</div>
					</div>
					<div class="header-container container">
						<div class="header-row">
							<div class="header-column">
								<div class="header-logo">
									<a href="/">
										<img alt="Porto" width="111" height="51" src="/img/demos/shop/logo-shop.png">
									</a>
								</div>
							</div>
							<div class="header-column"> 
								<div  class="col-md-push-1  col-md-9">
									<h1><strong>
											<span class="text-primary">Social Media for Medical Representatives</span> 
									</strong></h1>  
									
								</div>

								<div class="form-group ">
									<div class="col-md-9  ">
										<div class="input-group">

											<input id="provider-remote" type="text" class="form-control  " name="q"  placeholder="Search your Company & Join the network">

											<span class="input-group-btn  col-lg-pull-1 " id="provider-remote">
												<button id="btnjoin"  class="btn btn-primary" style="z-index: 100" type="submit">Join</i></button>
											</span>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>					
				</div>
			</header>

			<div id="modal" class="popupContainer" style="display:none;">
				<header class="popupHeader">
						
						<span class="modal_close"><i class="fa fa-times"></i></span>

				</header>

				<section class="popupBody">

					<div class="user_login">

						<div class="action_btns">
								<div class="one_half"><a href="#" id="login_form1" class="btn"><b>Login</b></a></div>
								<div class="one_half last"><a href="#" id="register_form1" class="btn">Sign up</a></div>
						</div>

						</br>

						<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                      {{ csrf_field() }}

							<label class="font-weight-normal">Email Address <span class="required">*</span></label>
							<input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
							<br />

							<label class="font-weight-normal">Password <span class="required">*</span></label>
                            <input id="password" type="password" class="form-control" name="password" style="border-radius: 0px;" required>

							<br />

							<div class="checkbox">
									<input id="remember" type="checkbox" />
									<label for="remember">Remember me on this computer</label>
							</div>

							<div class="action_btns">

								<div class="one_half"><input type="submit" class="btn btn_red" value="Login"></div>
									
								
							</div>
						</form>

						<a href="#" class="forgot_password">Forgot password?</a>

					</div>

					<div class="user_register">

						<div class="action_btns">
								<div class="one_half"><a href="#" id="login_form2" class="btn">Login</a></div>
								<div class="one_half last"><a href="#" id="register_form2" class="btn"><b>Sign up</b></a></div>
						</div>

						<form class="form-horizontal " role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        	<br>
                         
                        	<label for="company" class="font-weight-normal">Company Name <span class="required">*</span></label>
                        	<div class="form-group">
								<input id="company" type="text" class="col-md-9 col-md-push-1" style="border-radius: 0px;" name="company" value="" required autofocus>									
							</div>
							 
						
							<label for="name" class="font-weight-normal">Your Name <span class="required">*</span></label>
							<div class="form-group">
                        		<input id="name" type="text" class="form-control col-md-9 col-md-push-1" style="border-radius: 0px;" name="name" value="{{ old('name') }}" required autofocus>
                        	</div>
                            

                            <label class="font-weight-normal">Contacts <span class="required">*</span></label>
						    <div class="form-inline"> 
                            	<div class="form-group col-md-8">
							    	<input type="email" class="form-control col-md-push-1 " id="email" name="email" placeholder="Email Id" required style="border-radius: 0px;" required autofocus>
							  	</div>                          	
							  	<div class="form-group">
								    <input type="phone" class="form-control col-md-4 col-md-push-1 " id="phone" placeholder="Phone" id="password_confirmation" style="border-radius: 0px;" name="phone" required>
								</div>
                            </div>

                            <br>
							
							<label class="font-weight-normal">Password <span class="required">*</span></label>
                            <div class="form-inline">                             	
                            	<div class="form-group col-md-8">
							    	<input type="password" class="form-control  col-md-push-1" style="border-radius: 0px;" id="password" placeholder="Password" required >
							  	</div>                          	
							  	<div class="form-group">
								    <input type="password" class="form-control col-md-4 col-md-push-1"  style="border-radius: 0px;"id="exampleInputPassword3" placeholder="Confirm Password" id="password_confirmation"  name="password_confirmation" required>
								</div>
                            	 
                            </div>

                            <br>

							<div class="action_btns">
								
								<div class="one_half"><input type="submit" class="btn btn_red" value="Register"></div>

							</div>
						</form>
					</div>
				</section>
			</div>

				@yield('content')

			<footer class="short" id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-9">
							
							<hr class="light">
							<div class="row">
								<div class="col-md-3">
									<h5>Blog</h5>
									<ul class="list list-icons list-icons-sm">
										<li><i class="fa fa-caret-right"></i> <a href="blog-full-width.html">Blog Full Width</a></li>
										<li><i class="fa fa-caret-right"></i> <a href="blog-large-image.html">Blog Large Image</a></li>
										<li><i class="fa fa-caret-right"></i> <a href="blog-medium-image.html">Blog Medium Image</a></li>
										<li><i class="fa fa-caret-right"></i> <a href="blog-post.html">Single Post</a></li>
									</ul>
								</div>
								<div class="col-md-3">
									<h5>Pages</h5>
									<ul class="list list-icons list-icons-sm">
										<li><i class="fa fa-caret-right"></i> <a href="page-full-width.html">Full width</a></li>
										<li><i class="fa fa-caret-right"></i> <a href="page-left-sidebar.html">Left sidebar</a></li>
										<li><i class="fa fa-caret-right"></i> <a href="page-right-sidebar.html">Right sidebar</a></li>
										<li><i class="fa fa-caret-right"></i> <a href="page-custom-header.html">Custom Header</a></li>
									</ul>
								</div>
								<div class="col-md-3">
									<h5>Portfolio</h5>
									<ul class="list list-icons list-icons-sm">
										<li><i class="fa fa-caret-right"></i> <a href="portfolio-2-columns.html">2 Columns</a></li>
										<li><i class="fa fa-caret-right"></i> <a href="portfolio-3-columns.html">3 Columns</a></li>
										<li><i class="fa fa-caret-right"></i> <a href="portfolio-4-columns.html">4 Columns</a></li>
										<li><i class="fa fa-caret-right"></i> <a href="portfolio-single-small-slider.html">Single Project</a></li>
									</ul>
								</div>
								<div class="col-md-3">
									<h5>Extra Pages</h5>
									<ul class="list list-icons list-icons-sm">
										<li><i class="fa fa-caret-right"></i> <a href="page-team.html">Team</a></li>
										<li><i class="fa fa-caret-right"></i> <a href="page-services.html">Services</a></li>
										<li><i class="fa fa-caret-right"></i> <a href="page-careers.html">Careers</a></li>
										<li><i class="fa fa-caret-right"></i> <a href="page-faq.html">FAQ</a></li>
										<li><i class="fa fa-caret-right"></i> <a href="sitemap.html">Sitemap</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<h5 class="mb-sm">Contact Us</h5>
							<span class="phone">(800) 123-4567</span>
							<p class="mb-none">International: (333) 456-6670</p>
							<p class="mb-none">Fax: (222) 531-8999</p>
							<ul class="list list-icons mt-xl">
								<li><i class="fa fa-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, United States</li>
								<li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></li>
							</ul>
							<ul class="social-icons mt-xl">
								<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
								<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
								<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<!-- Vendor -->

		<script src="/vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="/vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="/vendor/jquery-cookie/jquery-cookie.min.js"></script>
		<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="/vendor/common/common.min.js"></script>
		<script src="/vendor/jquery.validation/jquery.validation.min.js"></script>
		<script src="/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
		<script src="/vendor/jquery.gmap/jquery.gmap.min.js"></script>
		<script src="/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
		<script src="/vendor/isotope/jquery.isotope.min.js"></script>
		<script src="/vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="/vendor/vide/vide.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="/js/theme.js"></script>


		<script src="/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script src="/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

		<!-- Current Page Vendor and Views -->
		<script src="/js/views/view.contact.js"></script>



		<!-- Demo -->
		<script src="/js/demos/demo-shop-5.js"></script>
		
		<!-- Theme Custom -->
		<script src="/js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="/js/theme.init.js"></script>


		<script src="https://andwecode.com/wp-content/uploads/2015/10/jquery.leanModal.min_.js"></script>


		<script>

			$("#modal_trigger").leanModal({
					top: 100,
					overlay: 0.6,
					closeButton: ".modal_close"
			});

			$(function() {
					// Calling Login Form
					$("#login_form").click(function() {
							$(".user_login").show();
							return false;
					});

					$("#register_form1").click(function() {
							$(".user_register").show();
							$(".user_login").hide();
							return false;
					});

					$("#login_form2").click(function() {
							$(".user_register").hide();
							$(".user_login").show();
							return false;
					});

					// Calling Register Form
					$("#register_form").click(function() {
							$(".user_register").show();
							$(".header_title").text('Register');
							return false;
					});

					// Going back to Social Forms
					$(".back_btn").click(function() {
							$(".user_login").hide();
							$(".user_register").hide();
							$(".header_title").text('Login');
							return false;
					});
			});

		</script>
 

		<script>
		var options = {

			url: function(phrase) {

				return "/mr/searchajax/company/" + phrase;

			},

		    categories: [{
		        header: "<a style='color:black' href='/mr/registernew/'>Cannot find your Company. Click here to create one</a>"
		    }],			

			getValue: "name",

		    template: {
		        type: "custom",
		        method: function(value, item) {

						return "<a href='/mr/registernew/" + item.name + "'>" + value + "</a>";

					}
		    },
		    theme: "square"
		};

		$("#provider-remote").easyAutocomplete(options);

	    $("#btnjoin").click(function(){
	    	var inp = $("#provider-remote").val();

	        $(location).attr('href', '/mr/registernew/' + inp)
	    });

		</script>

		@yield('script')

	</body>
</html>
