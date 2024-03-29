<!doctype html>

 
 <html class="sidebar-left-big-icons sidebar-light "> 
 

	<head>
 
		<meta charset="UTF-8">

		<title>PlsAsk - Feedback</title>
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

		<?php echo $__env->make('analytics', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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
				  
					 
						<div class="row" id="mrforum">
							<div class="col-lg-12 col-md-12">

								<section class="panel"> 

									<div  class="panel-body"> 
										<h2 class="center text-color-light"><strong><?php echo e($topic->topic); ?></strong></h2>

										<h4 class="center text-color-light"><?php echo e($topic->details); ?></h4>

										<div class="panel-body" v-if="published" v-cloak>
											<form> 
														
												<div class="form-group">
													<label class="col-md-1 control-label">Your Feedback</label>
													<div class="col-md-10">			  

														<textarea name="details" class="form-control" rows="10" v-model="inpReview"></textarea>
																	 										 
													</div>
												</div>	
												<div class="form-group center">	
													<button v-if="published" type="button" class="btn btn-primary" @click="draftfeedback">Save as Draft</button> 
													<button type="button" class="btn btn-primary" @click="savefeedback">Publish</button> 
												</div>
											</form>
										
										</div>

										<div class="panel-body" v-if="publishmessage" v-cloak>
											<form> 
														
												<div class="form-group center">	
													<p class="text-danger">You already have submitted your feedback</p> 
												</div>

												<div class="form-group">
													<label class="col-md-1 control-label">Your Feedback</label>
													<div class="col-md-10">			  

														<textarea name="details" class="form-control" rows="10" v-model="inpReview" disabled="disabled"></textarea>
																	 										 
													</div>
												</div>	
												
											</form>
										
										</div>

									</div>  

								</section> 	


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
		 
		<script src="/admin/assets/vendor/modernizr/modernizr.js"></script>
 
		<script src="/admin/assets/javascripts/theme.js"></script>	
		<!-- Theme Custom -->
		<script src="/admin/assets/javascripts/theme.custom.js"></script>
 
		<script src="/admin/assets/javascripts/theme.init.js"></script>

		<script>
	
			new Vue({

				el : '#feedback',

				data : {
					id:"", 
					inpId: "<?php echo $topicmail->id; ?>", 
					inpReview: "",
					inpKey: "<?php echo $topic->key; ?>",  
					inpUser_id : "<?php echo $topic->user_id; ?>", 
					inpProfile_id : "<?php echo $topicmail->profile_id; ?>", 
					inpTopic_id : "<?php echo $topicmail->topic_id; ?>", 
					inpTopic : "<?php echo $topic->topic; ?>", 
					inpMailkey : "<?php echo $topicmail->mailkey; ?>", 
					published : true,
					publishmessage : false,
					},

				mounted:function(){

					axios.get('/feedback/default',{
						params: {

					      		user_id : this.inpUser_id, 
					      		profile_id : this.inpProfile_id, 
					      		topic_id : this.inpTopic_id, 
					      		id : this.inpId, 
					      		mailkey : this.inpMailkey,
					      	 
					    	}
					})
					.then(response => {

						this.inpReview = response.data.review;

						if( response.data.published == 1 ){

							this.published =  false;
							this.publishmessage = true;

						}

					}); 

				},
				methods:{

					draftfeedback:function(profile){

						axios.get('/feedback/draftfeedback' ,{
						params: {

					      		review: this.inpReview, 
					      		user_id : this.inpUser_id, 
					      		profile_id : this.inpProfile_id, 
					      		topic_id : this.inpTopic_id, 
					      		topic : this.inpTopic,
					      		id : this.inpId, 
					      		mailkey : this.inpMailkey,
					      		key : this.inpKey,
					      	 
					    	}
						}).then(function(response){
								 
								toastr.options = {
						            
						            "timeOut": "1000",
						        };

								toastr.success('Message is Saved as Draft!!',{ fadeAway: 1 });

						});

					},
					savefeedback:function(profile){

						var c = confirm("Sure to Publish? You will not be able to modify it later");				 

						if( c == true){
 
							axios.get('/feedback/savefeedback' ,{
							params: {

						      		review: this.inpReview, 
						      		user_id : this.inpUser_id, 
						      		profile_id : this.inpProfile_id, 
						      		topic_id : this.inpTopic_id, 
						      		topic : this.inpTopic,
						      		id : this.inpId, 
						      		mailkey : this.inpMailkey, 
						      		key : this.inpKey,
						      	 
						    	}
							}).then(function(response){
 
									toastr.options = {
							            
							            "timeOut": "1000",
							        };

									toastr.success('Message is Published!!',{ fadeAway: 1 });

							});

							this.published =  false;
						}
					}
				}

			})


		</script>
 
	</body>
</html> 