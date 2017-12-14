<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>iStayToday - Last Minutes Hotels Booking</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 72px;
            }

            .title2 {
                font-size: 45px;
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

            .m-b-md2 {
                margin-bottom: 30px;
            }
        </style>

        <?php echo $__env->make('analytics', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </head>
    <body>
        <div class="flex-center position-ref full-height"> 
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>">Login</a>
                        <a href="<?php echo e(route('register')); ?>">Register</a>
                        <a href="<?php echo e(route('register')); ?>">Contact</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="content">
                <div class="title m-b-md">
                    <b>iStayToday </b>
                </div>
                <div class="title2 m-b-md2">
                     Last Minutes Hotels | Short Stay | Hourly Booking
                </div>

                <div class="links col-md-6">
                    <a href="/">Delhi / NCR</a>
                    <a href="/">Bangalore</a>
                    <a href="/">Chennai</a>
                    <a href="/">Kolkata</a>
                    <a href="/">Mumbai</a>
                    <a href="/">Hyderabad</a> 
                    <a href="/">Pune</a>
                    <a href="/">Chandigarh</a> 
                </div>

                <div class="links col-md-6">
                    <a href="/">Goa</a>
                    <a href="/">Ootie</a>
                    <a href="/">Coorg</a>
                    <a href="/">Delhi / NCR</a>
                    <a href="/">Bangalore</a>
                    <a href="/">Chennai</a>

                    <a href="/">Delhi / NCR</a>
                    <a href="/">Bangalore</a>
                    <a href="/">Chennai</a>
                </div>

                <div class="links col-md-6">
                    <a href="/">Delhi / NCR</a>
                    <a href="/">Bangalore</a>
                    <a href="/">Chennai</a>
                    <a href="/">Delhi / NCR</a>
                    <a href="/">Bangalore</a>
                    <a href="/">Chennai</a>

                    <a href="/">Delhi / NCR</a>
                    <a href="/">Bangalore</a>
                    <a href="/">Chennai</a>
                </div>
            </div>
        </div>
    </body>
</html>
