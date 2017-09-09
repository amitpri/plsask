<?php $__env->startSection('formname'); ?>

<h2>Reviews</h2>

<?php $__env->stopSection(); ?> 
 
<style>
	[v-cloak] {
	  display: none;
	}
</style>
<?php $__env->startSection('content_page'); ?>


<div class="row"> 
	<div id="messages" class="col-md-12 col-lg-12 col-xl-12">
		<div class="row"> 
			<div class="col-md-12 col-lg-12 col-xl-12">
				<section class="panel">

					<div class="panel-body" v-cloak>
						<div class="row"> 
							<div class="col-sm-3 pull-right">							
								 <form id="search">
								    <input type="text" class="form-control " placeholder="Search Topics" name="query" v-model="searchquery"  @keyup="filteredtopics" >
								  </form>
							</div>
						</div>
						<div class="table-responsive">

							<table class="table table-striped mb-none">
								<p v-if="reviews.length < 1" class="text-center"><b>No Review available</b></p>
								<thead v-if="reviews.length >= 1">
									<tr>
										<th class="col-md-1">#</th>
										<th class="col-md-9">Messages</th> 
										<th class="col-md-2">Date</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="(review,index) in reviews">
										<td>{{index + 1}}</td>
										<td>
											<h5><strong>{{ review.review }}</strong></h5>
											<h6><a :href="'reviews/topics/' + review.topic_key">{{ review.topic }}</h6></a>
										</td>
										<td><span class=""><h5>{{ review.created_at }}</h5></span></td>
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
		inpDoctorid: "",
		inpDoctor: "",
		inpSpeciality: "",
		inpDetails: "",  
		inpeditname: "", 
		searchquery: "",
		inpId : "",
	},
	mounted:function(){
 
		axios.get('/reviews/default' )
							.then(response => {this.reviews = response.data});
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