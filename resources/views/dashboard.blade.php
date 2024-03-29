@extends('layouts.mr.manage')

@section('formname')

<h2>Dashboard</h2>

@stop  

@section('content_page')

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
									<div class="h4 text-weight-bold mb-none">{{ $dashboard->feedbacktotal or 0 }}</div>
									<p class="text-xs text-muted mb-none">Total Feedbacks</p>
								</div>
								<div class="col-md-6">
									<div class="h4 text-weight-bold mb-none">{{ $dashboard->feedbacktoday or 0 }}</div>
									<p class="text-xs text-muted mb-none">Feedbacks recieved today</p>
								</div>
							</div>
						</section>
						<section class="panel"> 
							<div class="panel-body">
								<div class="col-md-6">
									<div class="h4 text-weight-bold mb-none">{{ $dashboard->visittotal or 0 }}</div>
									<p class="text-xs text-muted mb-none">Total Visits</p>
								</div>
								<div class="col-md-6">
									<div class="h4 text-weight-bold mb-none">{{ $dashboard->visittoday or 0 }}</div>
									<p class="text-xs text-muted mb-none">Visits today</p>
								</div>
							</div>
						</section>
						<section class="panel">
							<div class="panel-body">
								<div class="col-md-6">
									<div class="h4 text-weight-bold mb-none">{{ $dashboard->topics or 0 }}</div>
									<p class="text-xs text-muted mb-none">Topics</p>
								</div>
								<div class="col-md-6">
									<div class="h4 text-weight-bold mb-none">{{ $dashboard->profiles or 0 }}</div>
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
										<td><a href="/reviews"><div v-html="review.review"></div></a></td> 
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

@stop
