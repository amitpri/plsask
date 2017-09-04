<!doctype html>

 
 <html class="sidebar-left-big-icons sidebar-light "> 
 

	<head>
 
		<meta charset="UTF-8">

		<title>PlsAsk - Help</title>
		<meta name="keywords" content="Please Ask, Help" />
		<meta name="description" content="PlsAsk, Anonymous feedback">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="css/googlefonts_shadow_intro_light.css" rel="stylesheet" type="text/css">

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
					<a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <?php echo e(config('app.name', 'AskPls')); ?>

                    </a>
					
				</div>
			 
				<div class="header-right">
			   
					<span class="separator"></span>
			 
				</div> 

			</header>
			
			<div class="inner-wrapper" id="help"> 

				<section role="main" class="content-body">
				  					 
					<div class="row">
						
						<div class="col-md-6"> 
 
								<section class="panel"> 
									<div class="panel-body">
										<h3 class="text-weight-semibold mt-none text-center">PlsAsk</h3>
										<p class="text-center">PlsAsk means Please Ask. You can ask anything anyone.Just create a topic with details and send to them. The response will be anonymous and you will never know whoe wrote a message.</p>
									</div>
									<br>
									<div class="panel-body"> 
										<p class="text-center">PlsAsk allows you to get genuine feedback about absolutely anything from your relatives, colleagues or friends. You can create private topics for a selected list of people to respond or a public topic to get feedbacks from anyone.</p>
									</div>
								</section> 
						</div>

						<div class="col-md-6">
							<form id="form" action="#" class="form-horizontal">
								<section class="panel">
									<header class="panel-heading"> 

										<h2 class="panel-title">Contact us</h2> 
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-3 control-label">Full Name <span class="required">*</span></label>
											<div class="col-sm-9">
												<input v-model="inpName" type="text" name="fullname" class="form-control"  required/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Email <span class="required">*</span></label>
											<div class="col-sm-9"> 
												<input v-model="inpEmail" type="email" name="email" class="form-control"  required/> 
											</div>
											<div class="col-sm-9">

											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Type</label>
											<div class="col-sm-9">
												 <select class="form-control" v-model="inpType">
												  <option value="Issues">Issues</option>
												  <option value="Questions">Questions</option>
												  <option value="Suggestions">Suggestions</option> 
												  <option value="Appreciations">Appreciations</option> 
												  <option value="Complains">Complains</option> 
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Details <span class="required">*</span></label>
											<div class="col-sm-9">
												<textarea v-model="inpDetails" name="details" rows="5" class="form-control"  required></textarea>
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button @click="submithelp" class="btn btn-primary">Submit</button> 
											</div>
										</div>
									</footer>
								</section>
							</form>
						</div>

					</div> 

					<div class="row">
						<div class="col-md-6">
							<section class="panel panel-featured">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a> 
									</div>

									<h2 class="panel-title">Please explain how it works</h2>
								</header>
								<div class="panel-body">
									<h6>First register and login to the system. Create your network by adding Profiles and creating Groups. Create a topic with the review question and send to the groups.</h6>
								</div>
							</section>
						</div>

						<div class="col-md-6">
							<section class="panel panel-featured">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
										 
									</div>

									<h2 class="panel-title">How to get the feedbacks</h2> 
								</header>
								<div class="panel-body">
									<h6>Please create a topic either of Public or Private categories. Private category topics can only be shared with your network of people added through groups. Public category topics can be reviewed by anyone either through mails, facebook, twitter or even through the search section of PlsAsk </h6>
								</div>
							</section>
						</div> 
					</div>

				</section>

			</div> 

		</section>
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
        <br><br>

		<!-- Vendor -->
		<script src="/admin/assets/vendor/bootstrap/js/bootstrap.js"></script> 

		<script src="/admin/assets/vendor/nanoscroller/nanoscroller.js"></script>
		 
		<script src="/admin/assets/vendor/modernizr/modernizr.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="/admin/assets/javascripts/theme.js"></script>	


		<script>
	
			new Vue({

				el : '#help',
				data : {
					id:"", 
					inpId: "",
					inpName: "<?php echo $users->name ?? null; ?>",
					inpEmail: "<?php echo $users->email ?? null; ?> ",
					inpType: "",
					inpDetails: "",  
				}, 
				methods:{

					submithelp:function(e){

						e.preventDefault();

						axios.get('/help/submit' ,{

								params: {

							      	name : this.inpName, 
							      	email : this.inpEmail, 
							      	type : this.inpType, 
							      	details : this.inpDetails, 

							    	}

								})
							.then(response => {

									this.inpName = "";
									this.inpEmail = "";
									this.inpType = "";
									this.inpDetails = ""; 

									toastr.options = {
						            
							            "timeOut": "1000",
							        };

									toastr.success('We have recieved the message!!',{ fadeAway: 1 });
							});
					
			 
					} 
				}

			})


		</script>
 
	</body>
</html> 