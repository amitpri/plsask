<?php $__env->startSection('formname'); ?>

<h2>Manage Profiles</h2> 

<?php $__env->stopSection(); ?>
 

<?php $__env->startSection('content_page'); ?>


 <div class="row">

	<div class="col-md-12">
		<div class="row">			
		
			<div class="col-md-12 col-lg-12 col-xl-12">
				<section class="panel">
					<div class="panel-body"> 
						<p>The following records are loaded. If you see any record didnt go through then please check the data and try reloading again.  Please note maximum of 100records are allowed to be upploaded in a single file</p>
					</div>
				</section>
				<section class="panel">

					<div class="panel-body"> 			 

						<div class="form-group">

							<div class="col-md-12 center">
 								
 								<div class="panel-body">
								 
									<table class="table table-bordered table-striped mb-none" id="datatable-editable">
										<thead>
											<tr> 
												<th>Name</th>
												<th>Email Id</th>
												<th>Phone</th>
												<th>Notes</th> 
											</tr>
										</thead>
										<tbody>


										<?php $__currentLoopData = $inserts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
											<tr> 
												
												<td class="doctor"><?php echo e($insert['name']); ?></td> 
												
												<td class="details"><?php echo e($insert['emailid']); ?></td>	 

												<td class="details"><?php echo e($insert['phone']); ?></td>	 

												<td class="details"><?php echo e($insert['notes']); ?></td> 

												 
											</tr> 
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tbody>
									</table>

								</div> 
								 

							</div>
						</div>

					</div>
				</section> 
			</div>
		</div>
	</div>
</div>
 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mr.manage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>