<?php $__env->startSection('formname'); ?>

<h2>Settings</h2>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrump'); ?>

<a href="/mr/settings">Settings</a>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_pagejs'); ?>

  <script src="/admin/assets/vendor/autosize/autosize.js"></script>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content_page'); ?>


	<div class="row" id="settings">

		<div class="col-md-12 col-lg-12" >

			<div class="tabs"> 
				<div class="tab-content">
					<div id="status" class="tab-pane active">
						 
			 			<?php echo Form::model($settings,[ 'method' => 'patch', 'class' => 'form-horizontal form-bordered']); ?>


							<section class="panel"> 
								<div class="panel-body">
									<div class="form-group">
										<label class="col-sm-3 control-label">Profile Searchable <span class="required">*</span></label>
										<div class="col-sm-9">
											<div class="radio-custom radio-primary">
												
												<?php echo Form::radio('searchable', 'Yes','',['v-on:click' => 'methodSearchable','v-model' => 'inpSearchable']); ?>


												<label for="profile">Yes</label>
											</div>
											<div class="radio-custom radio-primary">
												
												<?php echo Form::radio('searchable', 'No','',['v-on:click' => 'methodSearchable','v-model' => 'inpSearchable']); ?>


												<label for="profile">No</label>
											</div>
											 
											 
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Share Profile with Recipients <span class="required">*</span></label>
										<div class="col-sm-9">
											<div class="radio-custom radio-primary">
												
												<?php echo Form::radio('status', 'Yes','',['v-on:click' => 'methodShare','v-model' => 'inpShare']); ?>


												<label for="profile">Yes</label>
											</div>
											<div class="radio-custom radio-primary">
												
												<?php echo Form::radio('status', 'No','',['v-on:click' => 'methodShare','v-model' => 'inpShare']); ?>


												<label for="profile">No</label>
											</div> 
											 
										</div>
									</div>     
								</div>
								<footer class="panel-footer">
									<div class="row">
										<div class="col-sm-9 col-sm-offset-3">
											<button class="btn btn-primary">Submit</button>
											 
										</div>
									</div>
								</footer>
							</section>
						
						<?php echo Form::close(); ?>



					</div> 
					   
				</div>
			</div>
		</div>
		 

	</div>			

	<script>
		
		Vuesettings = new Vue({
			el: '#settings',
			data: {

				inpSearchable : "<?php echo $settings->searchable; ?>",
				inpShare: "<?php echo $settings->share; ?>",			    
		
			},
			methods: {

				methodSearchable:function(){  

					axios.get('/settings/searchable' ,{

						params: {
					      val: this.inpSearchable,
					    }

					})
					.then(function(response){
						this.inpSearchable = response.data;

						toastr.options = {
				            
				            "timeOut": "1000",
				        };

						toastr.success('Setting changes are Saved!!',{ fadeAway: 1 });

					});
				},
				methodShare:function(){  

					axios.get('/settings/share' ,{

						params: {
					      val: this.inpShare,
					    }

					})
					.then(function(response){
						this.inpShare = response.data;

						toastr.options = {
				            
				            "timeOut": "1000",
				        };

						toastr.success('Setting changes is Saved!!',{ fadeAway: 1 });

					});
				}			      

			}
		});

	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mr.manage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>