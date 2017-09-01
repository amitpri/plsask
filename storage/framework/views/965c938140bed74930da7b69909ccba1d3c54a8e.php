<style>             

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

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="text-center">
             <?php if( $error == 0): ?>

				<p class="h4 title text-primary center">Your Account is now Activated!!</p> 

			<?php endif; ?>
			<?php if( $error == 1): ?>

				<p class="h4 title text-info center">Your Account is already Activated!!</p>

			<?php endif; ?>
			<?php if( $error == 2): ?>

				<p class="h4 title text-danger center">The key you entered is wrong. Please check or contact support!!</p>

			<?php endif; ?>		
 
        </div>
        <div class="links text-center" style="margin-top:100px;">
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
<?php $__env->stopSection(); ?>


 
										
																				
										
 

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>