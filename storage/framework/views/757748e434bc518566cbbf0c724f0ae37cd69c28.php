<?php $__env->startSection('formname'); ?>

<h2>Topics Review Messages</h2>

<?php $__env->stopSection(); ?> 
 
<style>
	[v-cloak] {
	  display: none;
	}
</style>
<?php $__env->startSection('content_page'); ?>


<div class="row"  id="messages" > 
	<div class="row">
		<section class="panel">

			<div class="panel-body" > 
			 	<h4 class="text-center">{{ topicname }}</h4>
			</div>
		</section>
	</div>
	<div class="col-md-12 col-lg-12 col-xl-12">
		<div class="row"> 
			<div class="col-md-12 col-lg-12 col-xl-12">
				<section class="panel">

					<div class="panel-body" v-cloak> 
						<div class="table-responsive">

							<table class="table table-striped mb-none">
								<p v-if="reviews.length < 1" class="text-center"><b>No Review receieved</b></p>
								<thead v-if="reviews.length >= 1">
									<tr> 
										<th class="col-md-9">Messages</th> 
										<th class="col-md-2">Date</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="(review,index) in reviews"> 
										<td>
											<h5>{{ review.review }}</h5> 
										</td>
										<td><span class="">{{ review.created_at }}</span></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</section>
			</div>
		</div> 
	</div>
</div>
<script>
	
new Vue({

	el : '#messages',
	data : {
		id:"",
		review: "",
		reviews: [],   
		searchquery: "",
		topicname : "",
		inpId : "",
		inpTopicId: "<?php echo $topic->id; ?>",
	},
	mounted:function(){
 
		axios.get('/topicname' ,{

					params: {

				      	topic_id : this.inpTopicId, 

				    	}

					})
			.then(response => {

				this.topicname = response.data.topic;				 

			});

		axios.get('/reviewstopics/default' ,{

					params: {

				      	topic_id : this.inpTopicId, 

				    	}

					})
			.then(response => {
				this.reviews = response.data;
				this.showFeedbackSpinner = false; 
				this.showFeedback = true;

			});
	},
	methods:{

		     
		filteredtopics:function(){

			axios.get('/reviews/filtered' ,{

					params: {

				      	topics : this.searchquery, 

				    	}

					})
				.then(response => {this.reviews = response.data});
		
 
		} 
	}

})


</script> 

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mr.manage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>