<?php $__env->startSection('formname'); ?>

<h2>Dashboard</h2>

<?php $__env->stopSection(); ?>  

<?php $__env->startSection('content_page'); ?>

<div class="row" id="dashboard"> 
	<div class="col-md-6 col-lg-12 col-xl-6">
		<div class="row">
			<div class="col-md-12 col-lg-6 col-xl-6">
				<section class="panel panel-transparent">
					<header class="panel-heading"> 

						<h2 class="panel-title">My Stats</h2>

					</header>
					<div class="panel-body">
						<section class="panel">
							<div class="panel-body">
								<div class="col-md-6">
									<div class="h4 text-weight-bold mb-none"><?php echo e(isset($dashboard->feedbacktotal) ? $dashboard->feedbacktotal : 0); ?></div>
									<p class="text-xs text-muted mb-none">Total Feedbacks</p>
								</div>
								<div class="col-md-6">
									<div class="h4 text-weight-bold mb-none"><?php echo e(isset($dashboard->feedbacktoday) ? $dashboard->feedbacktoday : 0); ?></div>
									<p class="text-xs text-muted mb-none">Feedbacks recieved today</p>
								</div>
							</div>
						</section>
						<section class="panel"> 
							<div class="panel-body">
								<div class="col-md-6">
									<div class="h4 text-weight-bold mb-none"><?php echo e(isset($dashboard->visittotal) ? $dashboard->visittotal : 0); ?></div>
									<p class="text-xs text-muted mb-none">Total Visits</p>
								</div>
								<div class="col-md-6">
									<div class="h4 text-weight-bold mb-none"><?php echo e(isset($dashboard->visittoday) ? $dashboard->visittoday : 0); ?></div>
									<p class="text-xs text-muted mb-none">Visits today</p>
								</div>
							</div>
						</section>
						<section class="panel">
							<div class="panel-body">
								<div class="col-md-6">
									<div class="h4 text-weight-bold mb-none"><?php echo e(isset($dashboard->topics) ? $dashboard->topics : 0); ?></div>
									<p class="text-xs text-muted mb-none">Topics</p>
								</div>
								<div class="col-md-6">
									<div class="h4 text-weight-bold mb-none"><?php echo e(isset($dashboard->profiles) ? $dashboard->profiles : 0); ?></div>
									<p class="text-xs text-muted mb-none">Profiles</p>
								</div>
							</div>
						</section>
					</div>
				</section> 
			</div>
			<div class="col-md-12 col-lg-6 col-xl-6">
				<section class="panel">
					<header class="panel-heading panel-heading-transparent">
						 
						<h2 class="panel-title">Latest Reviews</h2>
					</header>
					<div class="panel-body">
						<div class="table-responsive">
							<div v-show="showFeedbackSpinner" class="text-center"><img src="/images/ajax_loader.gif"></div>
							<table v-show="showFeedback" class="table table-striped mb-none">
								<p v-if="reviews.length < 1" class="text-center"><b>No Feedback</b></p>
								<tbody>
									<tr v-for="(review,index) in reviews"> 
										<td><a href="/reviews">{{ review.review }}</a></td> 
									</tr> 
								</tbody>
							</table>
						</div>
					</div>
				</section>
				<div class="row text-center"><a href="/reviews" class="btn btn-default">All Reviews</a></div>
			</div>

		</div> 
	</div>
</div>
<script>
	
new Vue({

	el : '#dashboard',
	data : {
		id:"",
		review: "",
		reviews: [],      
		inpId : "",
		showFeedback : false,
		showFeedbackSpinner : true,
	},
	mounted:function(){
 
		axios.get('/reviews/default' )
			.then(response => {
				this.reviews = response.data;								
				this.showFeedbackSpinner = false; 
				this.showFeedback = true;

		});
	} 

})


</script>  

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mr.manage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>