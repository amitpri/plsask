<!doctype html>
 <html class="sidebar-left-big-icons sidebar-light "> 

	<head>
 
		<meta charset="UTF-8">

		<title>PlsAsk - Topic</title>
		<meta name="keywords" content="Please Ask, Feedback management system" />
		<meta name="description" content="Please Ask, Feedback management system"> 

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="/css/googlefonts_shadow_intro_light.css" rel="stylesheet" type="text/css">

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

			<div id="feedback">

				<div v-show="showSpinner" class="text-center"><img src="/images/ajax_loader.gif"></div>
				
				<div v-show="showContent" class="inner-wrapper" > 

					<section role="main" class="content-body">
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="search-control-wrapper">
									<form action="pages-search-results.html">
										<div class="form-group">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="Search Topics" v-model="searchquery"  @keyup="filteredtopics" >

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
							<div class="col-lg-6 col-md-6">
								<div class="search-control-wrapper">
									<div class="form-group">
								 
										<div class="col-md-8"> 
											<label class="radio-inline">
											  <input type="radio" name="type" value="personal" v-model="inpCategory">  Personal
											</label>
											<label class="radio-inline">
											  <input type="radio" name="type" value="professional" v-model="inpCategory">  Professional
											</label> 
											<label class="radio-inline">
											  <input type="radio" name="type" value="food" v-model="inpCategory">  Food
											</label>
											<label class="radio-inline">
											  <input type="radio" name="type" value="movies" v-model="inpCategory">  Movies
											</label> 
											<label class="radio-inline">
											  <input type="radio" name="type" value="politics" v-model="inpCategory">  Politics
											</label> 
											<label class="radio-inline">
											  <input type="radio" name="type" value="products" v-model="inpCategory">  Products
											</label> 
											<label class="radio-inline">
											  <input type="radio" name="type" value="activities" v-model="inpCategory">  Activities
											</label> 
											<label class="radio-inline">
											  <input type="radio" name="type" value="current" v-model="inpCategory">  Current Affairs
											</label>
											
										</div>

									</div>
								</div> 
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<section class="panel">   						
									<h4 class="center text-color-light "><strong>Topics</strong></h4>
									<div  class="panel-body">
										<div class="table-responsive" >
											<table class="table table-striped mb-none">
												<thead>
													<tr>
														<th class="col-md-8">Topic</th> 
														<th class="col-md-2">Category</th> 
														<th class="col-md-2">Created By</th>  
													</tr>
												</thead>
												<tbody>
													<tr v-for="topic in topics" v-cloak>
														<td>
															<a target="_blank" :href="'/showtopics/' + topic.key ">{{ topic.topic }} </a>
														</td> 
														<td>
															<a :href="'/showtopics/' + topic.category ">{{ topic.category.charAt(0).toUpperCase() + topic.category.slice(1)}}</a> 
														</td>

														<td><a target="_blank" :href="'/viewprofile/' + topic.user_key ">{{ topic.name }}</a> </td> 
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

			</div> 

		</section> 

 
 		<script>
	
			new Vue({

				el : '#feedback',
				data : {
					id:"", 
					inpId: "", 
					topic: "",
					topics: [],
					inpKey:"", 
					inpCategory: "<?php echo $category ?? 'personal'; ?>", 
					searchquery : "",
					row_count : 10,					
					showSpinner : true,
					showContent : false,
				},
				mounted:function(){
 

					axios.get('/showtopics/default',{

						params: {
 
					      	category : this.inpCategory,

					    	}

						})
					.then(response => {

						this.topics = response.data;						
						this.showSpinner = false; 
						this.showContent = true;

					}); 

				},
				methods:{

					filteredtopics:function(){

						axios.get('/showtopics/filtered' ,{

								params: {

							      	topics : this.searchquery, 
							      	category : this.inpCategory,

							    	}

								})
							.then(response => {

								this.topics = response.data;


								this.showSpinner = false; 
								this.showContent = true;

							});
					
			 
					},
					morerows:function(){

						axios.get('/showtopics/getmore' ,{

								params: {
							      row_count: this.row_count,
							      topics : this.searchquery, 
							      category : this.inpCategory,
							    }

							}).then(response => {

								for (var i = 0;  i <= response.data.length - 1; i++ ) {

									this.topics.push({

											id : response.data[i].id, 
											user_id : response.data[i].user_id, 
											topic : response.data[i].topic, 
											name : response.data[i].name,  
											category : response.data[i].category,  
											key : response.data[i].key,
											user_key : response.data[i].user_key,
											

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